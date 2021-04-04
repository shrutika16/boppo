<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    public function seats() {
        return $this->hasMany('App\EventSeats', 'event_id')->orderBy('seat_no_from', 'ASC');
    }
}
