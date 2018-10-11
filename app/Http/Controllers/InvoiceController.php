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
    public function generator()
    {

        $faker = new Faker();

        $vendor = new Vendor([
            'name' => 'Kristoffer Brown',
            'address' => 'Kristoffer Brown',
            'city' => 'Kristoffer Brown',
            'country' => 'Kristoffer Brown',
            'phone' => '29886586',
            'email' => 'kristoffer@brown.lv'
        ]);

        $owner = new Owner([
            'name' => 'Kristoffer Brown',
            'address' => 'Kristoffer Brown',
            'city' => 'Kristoffer Brown',
            'country' => 'Kristoffer Brown',
            'phone' => '29886586',
            'email' => 'kristoffer@brown.lv'
        ]);

        $products = new ProductCollection([
            [
                'sku' => '5168834966240078',
                'name' => 'Kristoffer Brown',
                'quantity' => 1,
                'unit_price' => '92,10 €',
                'total' => '92,10 €',
            ]
        ]);

        $transaction = new Transaction([
            'id' => 'zikurats-abele',
            'subtotal' => 9210,
            'discount' => 0,
            'delivery' => 350,
            'tax' => 0,
            'total' => 9560,
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $darbiniekis = invoice::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
