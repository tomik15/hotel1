<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Registration extends Authenticatable{

	use Notifiable;


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name','surname', 'room','payments','date_of_arrival','date_of_departure',
    ];
     
}
