<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Rooms extends Authenticatable
{
	use Notifiable;


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'cislo','poschodie', 'obsadenost_izby','pocet_rezervovanych_lozok','max_kapacita_izby',
    ];
     
    //
}
