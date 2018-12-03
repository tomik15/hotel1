<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vybava  extends Authenticatable
{
	use Notifiable;


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'stav','typ', 'cena',
    ];
     
    //
}
