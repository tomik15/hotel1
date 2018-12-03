<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Show_info extends Authenticatable
{
	use Notifiable;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'show_rooms_id','show_vybavy_id',
    ];
}
