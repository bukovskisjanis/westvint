<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name','factadress','devadress','pvnregnr','regnr','phonenr','email','bankname','bankcode','bankaccnr','description'];
}
																							