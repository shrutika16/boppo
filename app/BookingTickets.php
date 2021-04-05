<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingTickets extends Model
{
    protected $table = 'booking_tickets';
    public $timestamps = true;

    protected $fillable = [
        'booking_id',
        'seat_category_id',
        'seat_number',
        'seat_price'
    ];
}
