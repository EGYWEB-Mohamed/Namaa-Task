<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subscriber extends Authenticatable
{

    use HasFactory;

    protected $guard = "subscriber";
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];
}
