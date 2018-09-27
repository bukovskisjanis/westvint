<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Darbinieki extends Model
{
    protected $fillable = ['firstname','surname','adress','birthday','contract','phone','email','username','password','password-repeat','statuss'];
}