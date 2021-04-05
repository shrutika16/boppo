<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSeats extends Model
{
    protected $table = 'event_seats';
    public $timestamps = true;
    protected $fillable = ['event_id', 'seat_category_id', 'seat_no_from', 'seat_no_to', 'seat_price', 'total_price'];

    public function category() {
        return $this->belongsTo('App\SeatsCategories', 'seat_category_id');
    }
}
