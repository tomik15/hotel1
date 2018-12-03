<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sluzby extends Authenticatable
{
    //
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'nazov','opakovanie', 'cas','cena',
    ];
     
}
