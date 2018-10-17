<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('factadress')->nullable();
            $table->string('regnr')->nullable();
            $table->string('pvnregnr')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bankcode')->nullable();
            $table->string('bankaccnr')->nullable();
            $table->string('devadress')->nullable();
            $table->string('delivery-type')->nullable();
            $table->string('paymentmethod')->nullable();
            $table->string('delivery-model')->nullable();
            $table->string('payment-date')->nullable();
            $table->string('dev-entry-date')->nullable();
            $table->text('product_list')->nullable();
            $table->string('jobtitle')->nullable();
            $table->string('client_name')->nullable();
            $table->string('namesurname')->nullable();

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
        Schema::dropIfExists('invoices');
    }
}
