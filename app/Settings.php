<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'westvint_name',
    	'westvint_person',
    	'westvint_persstatuss',
    	'westvint_juradress',
    	'westvint_regnr',
        'westvint_pvnregnr',
    	'westvint_bank',
    	'westvint_bank-code',
    	'westvint_bank-accnr'
    	];
}
