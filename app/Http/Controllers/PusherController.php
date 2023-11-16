<?php

namespace App\Http\Controllers;

use App\Events\messageEvent;
use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;

class PusherController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }
    public function broadcast(Request $request)
    {
        //broadcast(new PusherBroadcast($request->get('message')))->toOthers();

        event(new messageEvent($request->get('message')));
        return view('chat.broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('chat.receive', ['message' => $request->get('message')]);
    }
}
