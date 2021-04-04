<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSeats extends Model
{
    protected $table = 'event_seats';

    public function category() {
        return $this->belongsTo('App\SeatsCategories', 'seat_category_id');
    }
}
