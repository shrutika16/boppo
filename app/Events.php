<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    public $timestamps = true;

    protected $fillable = ['name', 'no_of_seats', 'event_datetime', 'deleted_at'];

    public function seats() {
        return $this->hasMany('App\EventSeats', 'event_id')->orderBy('seat_no_from', 'ASC');
    }

    public function bookings() {
        return $this->hasMany('App\Bookings', 'event_id');
    }
}
