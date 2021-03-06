<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['group','articul','barcode','bordercode','din_iso','diameter_dm','long_dm','material','storge','add_storage','person_add','edit_storage', 'storage' , 'person_edit','product_price','product_retail_price','product_wholesale_price','product_minimum_price','product_revers_price','product_neto_mass_in_parcel_amount','product_neto_mass_in_parcel','product_neto_mass_all','product_bruto_mass_in_parcel_amount','product_bruto_mass_in_parcel','product_bruto_mass_all'];
}
