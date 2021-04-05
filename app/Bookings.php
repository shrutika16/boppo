<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = 'bookings';
    public $timestamps = true;

    protected $fillable = [
        'event_id',
        'no_of_seats',
        'total_price'
    ];
}
