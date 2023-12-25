<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class FestivalController extends Controller
{
    public function index()
    {
        $event = Event::orderBy('created_at', 'ASC')->get();

        return view('festivals.index', compact('event'));
    }
}
