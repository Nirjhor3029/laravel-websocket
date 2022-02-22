<?php

namespace App\Http\Controllers;

use App\Events\GetRequestEvent;
use App\Events\ShowEvent;
use Illuminate\Http\Request;

class TriggerController extends Controller
{
    public function index()
    {
        return view('trigger');
    }
    public function trigger(Request $request)
    {
        // return $request->all();
        $data = $request->text;
        event(new GetRequestEvent($data));
        event(new ShowEvent($data));
    }
}