<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;

class HomeController extends Controller
{
    public function index() {

        $events = Events::get();
        return view('home', compact('events'));

    }
}
