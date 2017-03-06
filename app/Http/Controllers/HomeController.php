<?php

namespace App\Http\Controllers;

use App\Car;
use App\RoomTask;
use Illuminate\Http\Request;
use App\Devices;
use App\Room;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Devices::pluck('name','id');
        $roomtasks = RoomTask::all();
        $roomlists = Room::all();
        $carlists = Car::all();
        if( Auth::check() && Auth::user()->role==1 ) {
            return view('layouts.adminhome', compact('roomlists', 'devices','carlists','roomtasks'));
        }
        else
        {
            return view('layouts.userhome', compact('roomlists', 'devices','carlists','roomtasks'));
        }
    }
}
