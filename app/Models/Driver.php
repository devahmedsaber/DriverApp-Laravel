<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';

    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'phone', 'card_id', 'city',
        'transportation_type', 'avatar_image', 'card_image', 'car_image', 'transport_image',
    ];
}
