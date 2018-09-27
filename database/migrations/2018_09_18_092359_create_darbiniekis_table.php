<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDarbiniekisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('darbiniekis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('surname');
            $table->string('adress');
            $table->date('birthday');
            $table->string('contract');
            $table->string('phone');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('password-repeat');
            $table->string('statuss');                  
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
        Schema::dropIfExists('darbiniekis');
    }
}
