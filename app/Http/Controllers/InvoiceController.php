<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice;
use App\Settings;
use App\Products;
use App\Client;
use App\histroy;
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
    public function generator($id = false , Request $request)
    {

        if ($id){
            $processedInvoice = invoice::where('id' , $id);

            if ($processedInvoice->count() > 0){

                $invoiceDetail = $processedInvoice->first();

                $jobTitleSettings = Settings::where('id' , $invoiceDetail->vendor_representative);

                if ($jobTitleSettings->count() > 0){
                    $jobTitleSettingsItem = $jobTitleSettings->first();
                }else{
                    $jobTitleSettingsItem = new Settings();
                }

                $vendor = new Vendor([
                    // hardcode - city is represntative name + it job description is country ( :( )
                    //'city' =>  $invoiceDetail->vendor_representative ,
                    //'country' => $invoiceDetail->vendor_jobtitle, jobTitleSettingsItem->westvint_persstatuss
                    'name' => json_encode(
                        array(
                            'vendor_company' => $invoiceDetail->vendor_company,
                            'vendor_representative' => $jobTitleSettingsItem->westvint_person ,
                            'vendor_jobtitle'  => $jobTitleSettingsItem->westvint_persstatuss ,
                            'vendor_reg_nr' => $jobTitleSettingsItem->westvint_regnr,
                            'westvint_juradress' => $jobTitleSettingsItem->westvint_juradress,
                            'vendor_pvnregnr' => $jobTitleSettingsItem->westvint_pvnregnr ,
                            'vendor_westvint_bank' => $jobTitleSettingsItem->westvint_bank,
                            'vendor_bank_code' => $jobTitleSettingsItem->{'westvint_bank-code'},
                            'vendor_bank_accnr' => $jobTitleSettingsItem->{'westvint_bank-accnr'}
                        )
                    ),
                    'address' => $jobTitleSettingsItem->westvint_juradress,
                    'phone' => '29886586',
                    'email' => 'west@brown.lv'
                ]);

                $owner = new Owner([
                    'name' => json_encode(
                        array(
                            'client_company' => $invoiceDetail->client_name,
                            'client_representative' => $invoiceDetail->namesurname,
                            'client_jobtitle' => $invoiceDetail->jobtitle,
                            'client_regnr' => $invoiceDetail->regnr,
                            'client_pvnregnr' => $invoiceDetail->pvnregnr,
                            'client_bankname' => $invoiceDetail->bankname,
                            'client_bankcode' => $invoiceDetail->bankcode,
                            'client_bankaccnr' => $invoiceDetail->bankaccnr,
                            'client_devadress' => $invoiceDetail->devadress,
                        )
                    ),
                    'address' => $invoiceDetail->factadress,
                    // 'phone' => '29886586',
                    //'email' => 'kristoffer@brown.lv'
                ]);

                $productProcessor =  json_decode($invoiceDetail->product_list , true);

                $productCollectionPack = array();

                $absoluteInvoiceTotal = 0;

                if ($productProcessor && is_array($productProcessor)){
                    foreach ($productProcessor as $key => $productIntro) {

                        $absoluteInvoiceTotal = $absoluteInvoiceTotal + $productIntro['allqty-price'];

                        $productCollectionPack[] = array(
                            'sku' => (isset($productIntro['code']) ? $productIntro['code'] : md5($productIntro['name'])),
                            'name' => $productIntro['name'],
                            'quantity' => $productIntro['quantity'],
                            'price' => $productIntro['oqty-price'],
                            'total' => $productIntro['allqty-price']
                        );
                    }
                }

                $products = new ProductCollection($productCollectionPack);

                // pvp is and nav ! pagaidam Hardcoded
                $tax = 18;
                $taxSum = ($absoluteInvoiceTotal/100) * $tax;

                $transaction = new Transaction([
                    'id' => $id,
                    'subtotal' => $absoluteInvoiceTotal,
                    //delivery person name is discount [hardcode]
                    'delivery' => json_encode(array(
                        'type' => $invoiceDetail->{'delivery-type'} ,
                        'method' => $invoiceDetail->{'delivery-method'},
                        'sum_name' => $invoiceDetail->{'price-name'},
                        'notes' => $invoiceDetail->moreinfo,
                        'total_brutto' => $invoiceDetail->total_brutto,
                        'total_netto' => $invoiceDetail->total_netto,
                        'payment_date' => $invoiceDetail->{'payment-date'},
                        'delivery_date' => $invoiceDetail->{'dev-entry-date'}
                    ) , true),
                    'discount' => 0,
                    'tax' => $tax,
                    //'price' =>  $invoiceDetail->unit_price,
                    'total' => $taxSum + $absoluteInvoiceTotal,
                    'created_at' => Carbon::now(),
                ]);

                $invoice = new GenInvoice($vendor, $owner, $products, $transaction);
                $invoice->useLocale('en_US');
                $invoice->useCurrency('USD');
                $invoice->useView('receipt');

                if ($request->has('color') && $request->get('color') == 1){ 
                    return $invoice->download();
                    return $invoice->view();
                }

                $mpdf = new Mpdf();

                // /dd(get_class_methods($mpdf));
                $mpdf->AddSpotColor('PANTONE 534 EC',85,65,47,9); 

                $mpdf->WriteHTML($invoice->view());
                $mpdf->Output();
            }
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('status')){
            $invoice = invoice::where('status' , '=' , $request->get('status'))->get();
        }else{
            $invoice = invoice::all();
        }

        $settings = Settings::all();
        $clients = Client::all();
        $products = Products::all();

        return view('invoice.index',compact('invoice' , 'settings' , 'clients' , 'products'));
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

        if (isset($fullRequest['invoice_id']) && intval($fullRequest['invoice_id']) > 0){
            //different Ravioli on update
            $invoiceRequest = invoice::where('id' , intval($fullRequest['invoice_id']));
            if ($invoiceRequest->count() > 0){

                $historyUpdate = new histroy();
                $historyUpdate->user_id = Auth::user()->id;
                $historyUpdate->invoice_statuss = 'changed';
                $historyUpdate->invoice_id = intval($fullRequest['invoice_id']);
                $historyUpdate->save();

                $processedInvoice = $invoiceRequest->first();

                $oldProductDetails = json_decode($processedInvoice->product_list);

                $newproductDetails = array();

                $invoiceTotal = 0;

                foreach ($fullRequest['product'] as $productInstanceKey => $productInstance) {
                    $newproductDetails[] = array(
                        'code' => $fullRequest['hidden_articul'][$productInstanceKey],
                        'name' => $productInstance,
                        'quantity' => $fullRequest['qty'][$productInstanceKey] ,
                        'oqty-price' => $fullRequest['oqty-price'][$productInstanceKey],
                        'allqty-price' => $fullRequest['allqty-price'][$productInstanceKey],
                        'hidden_brutto' => (isset($fullRequest['hidden_brutto'][$productInstanceKey]) ? $fullRequest['hidden_brutto'][$productInstanceKey] : 0),
                        'hidden_netto' => (isset($fullRequest['hidden_netto'][$productInstanceKey]) ? $fullRequest['hidden_netto'][$productInstanceKey] : 0)               
                    );

                    $invoiceTotal = (float)$fullRequest['allqty-price'][$productInstanceKey] + (float)$invoiceTotal;
                }


                //product pain

                // dd(array(
                //     $oldProductDetails , $newproductDetails
                // ));

                $fullRequest['product_list'] = json_encode($newproductDetails);

                unset($fullRequest['articul']);
                unset($fullRequest['price-name']);
                unset($fullRequest['price-name']);

                //do update
                $processedInvoice->update($fullRequest);
            }
        }else{
            unset($fullRequest['_token']);

            $productListArray = array();

            $invoiceTotal = 0;

            foreach ($fullRequest['product'] as $productInstanceKey => $productInstance) {
                $productListArray[] = array(
                    'code' => $fullRequest['hidden_articul'][$productInstanceKey],
                    'name' => $productInstance,
                    'quantity' => $fullRequest['qty'][$productInstanceKey] ,
                    'oqty-price' => $fullRequest['oqty-price'][$productInstanceKey],
                    'allqty-price' => $fullRequest['allqty-price'][$productInstanceKey],
                    'hidden_brutto' => (isset($fullRequest['hidden_brutto'][$productInstanceKey]) ? $fullRequest['hidden_brutto'][$productInstanceKey] : 0),
                    'hidden_netto' => (isset($fullRequest['hidden_netto'][$productInstanceKey]) ? $fullRequest['hidden_netto'][$productInstanceKey] : 0)               
                );

                ///
                $invoiceTotal = (float)$fullRequest['allqty-price'][$productInstanceKey] + (float)$invoiceTotal;
            }

            $fullRequest['product_list'] = json_encode($productListArray);
            $fullRequest['total_sum'] = $invoiceTotal;
            $fullRequest['last_editor'] = Auth::user()->name;

            $fullRequest['creator_name'] = Auth::user()->name;
            $fullRequest['creator_id'] = Auth::user()->id;

            //remove direct miracles
            unset($fullRequest['articul']);
            unset($fullRequest['price-name']);
            unset($fullRequest['price-name']);

            invoice::create($fullRequest);
        }

        return back();
    }


    public function statuss_change($status , $invoice_id){
        $historyUpdate = new histroy();
        $historyUpdate->user_id = Auth::user()->id;
        $historyUpdate->invoice_statuss = $status;
        $historyUpdate->invoice_id = $invoice_id;
        $historyUpdate->save();

        $invoiceSearch = invoice::where('id' , $invoice_id);
        if ($invoiceSearch->count()){
            $invoice = $invoiceSearch->first();
            $invoice->status = $status;
            $invoice->save();
        }

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
