<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice;
use App\Products;
use Auth;

use Faker\Generator as Faker;

use BrianFaust\Invoice\Entities\Vendor;
use BrianFaust\Invoice\Entities\Owner;
use BrianFaust\Invoice\ProductCollection;
use BrianFaust\Invoice\Entities\Transaction;
use BrianFaust\Invoice\Entities\Invoice as GenInvoice;

use Mpdf\Mpdf;
use Carbon\Carbon;

class InvoiceController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generator($id = false)
    {

        if ($id){
            $processedInvoice = invoice::where('id' , $id);

            if ($processedInvoice->count() > 0){

                $invoiceDetail = $processedInvoice->first();


                $vendor = new Vendor([
                    'name' => 'WestVint',
                    'address' => 'WestVint iela',
                    'city' => 'Kristoffer Brown',
                    'country' => 'WildWest',
                    'phone' => '29886586',
                    'email' => 'west@brown.lv'
                ]);

                $owner = new Owner([
                    'name' => $invoiceDetail->client_name,
                    'address' => $invoiceDetail->factadress,
                    'city' => $invoiceDetail->factadress,
                    //'country' => 'Kristoffer Brown',
                    // /'phone' => '29886586',
                    //'email' => 'kristoffer@brown.lv'
                ]);

                $productProcessor =  json_decode($invoiceDetail->product_list , true);

                $productCollectionPack = array();

                $absoluteInvoiceTotal = 0;

                foreach ($productProcessor as $key => $productIntro) {

                    $absoluteInvoiceTotal = $absoluteInvoiceTotal + $productIntro['allqty-price'];

                    $productCollectionPack[] = array(
                        'sku' => md5($productIntro['name']),
                        'name' => $productIntro['name'],
                        'quantity' => $productIntro['quantity'],
                        'unit_price' => $productIntro['oqty-price'].' €',
                        'total' => $productIntro['allqty-price'].' €'
                    );
                }

                $products = new ProductCollection($productCollectionPack);

                // pvp is and nav ! pagaidam Hardcoded
                $tax = 18;
                $taxSum = ($absoluteInvoiceTotal/100) * $tax;

                $transaction = new Transaction([
                    'id' => $id,
                    'subtotal' => $absoluteInvoiceTotal,
                    'discount' => 0,
                    'delivery' => 0,
                    'tax' => $tax,
                    'total' => $taxSum + $absoluteInvoiceTotal,
                    'created_at' => Carbon::now(),
                ]);

                $invoice = new GenInvoice($vendor, $owner, $products, $transaction);
                $invoice->useLocale('en_US');
                $invoice->useCurrency('USD');
                $invoice->useView('receipt');

                return $invoice->download();
                //return $invoice->view();

                // $mpdf = new Mpdf();
                // $mpdf->WriteHTML('<h1>Hello world!</h1>');
                // $mpdf->Output();
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = invoice::all();
        return view('invoice.index',compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fullRequest = $request->all();

        unset($fullRequest['_token']);

        $productListArray = array();

        foreach ($fullRequest['product'] as $productInstanceKey => $productInstance) {
            $productListArray[] = array(
                'name' => $productInstance,
                'quantity' => $fullRequest['qty'][$productInstanceKey] ,
                'oqty-price' => $fullRequest['oqty-price'][$productInstanceKey],
                'allqty-price' => $fullRequest['allqty-price'][$productInstanceKey]
            );
        }

        $fullRequest['product_list'] = json_encode($productListArray);

        //remove direct miracles
        unset($fullRequest['articul']);
        unset($fullRequest['moreinfo']);
        unset($fullRequest['price-name']);
        unset($fullRequest['price-name']);

        invoice::create($fullRequest);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        //@fix nedaģelka
        if (invoice::where('id' , $id)->first()->delete()){
            return back();            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
