<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settingsupdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('settings', function (Blueprint $table) {
          $table->string('westvint_person')->nullable();
          $table->string('westvint_persstatuss')->nullable();
          $table->string('westvint_juradress')->nullable();
          $table->string('westvint_regnr')->nullable();
          $table->string('westvint_pvnregnr')->nullable();
          $table->string('westvint_bank')->nullable();
          $table->string('westvint_bank-code')->nullable();
          $table->string('westvint_bank-accnr')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
