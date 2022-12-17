<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Authenticatable
{

    protected $guard = "subscriber";
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];
     protected $casts = [
         'status' => 'boolean'
     ];
}
