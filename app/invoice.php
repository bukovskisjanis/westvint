<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
    	'factadress',
    	'regnr',
    	'pvnregnr',
    	'bankname',
    	'bankcode',
    	'bankaccnr',
    	'devadress',
    	'delivery-type',
    	'paymentmethod',
    	'delivery-model',
    	'payment-date',
    	'dev-entry-date',
    	'articul',
    	'moreinfo',
    	'price-name' ,
    	'jobtitle',
    	'client_name' ,
    	'namesurname',
        'product_list',
        'vendor_company',
        'vendor_representative',
        'vendor_jobtitle',
        'moreinfo',
        'total_netto' ,
        'total_brutto'
    	];

}
