<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group');
            $table->string('standart');
            $table->string('name');
            $table->string('articul');
            $table->string('barcode');
            $table->string('bordercode');
            $table->string('din_iso');
            $table->string('diameter_dm');
            $table->string('long_dm');
            $table->string('material');
            $table->string('storage');
            $table->string('add_storage');
            $table->string('person_add');
            $table->string('edit_storage');
            $table->string('person_edit');
            $table->decimal('product_price');
            $table->decimal('product_retail_price');
            $table->decimal('product_wholesale_price');
            $table->decimal('product_minimum_price');
            $table->decimal('product_revers_price');
            $table->decimal('product_neto_mass_in_parcel_amount');
            $table->decimal('product_neto_mass_in_parcel');
            $table->decimal('product_neto_mass_all');
            $table->decimal('product_bruto_mass_in_parcel_amount');
            $table->decimal('product_bruto_mass_in_parcel');
            $table->decimal('product_bruto_mass_all');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
