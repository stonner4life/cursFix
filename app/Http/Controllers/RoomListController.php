<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use App\Room;
use App\Devices;
use App\RoomDevice;
use Illuminate\Support\Facades\Auth;

class RoomListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index(){
        $roomlist = Room::orderBy('created_at', 'dsc')->get();
        return view('roomlist.index', compact('roomlist'));
    }

    public function create(){
        $devices = Devices::pluck('name','id');
        return view('roomlist.create', compact('devices'));
    }
    public function store(RoomRequest $request)
    {

        $roomlist = Room::create($request->all());
        $deviceIds = $request->input('devices');
        $roomlist->devices()->attach($deviceIds);
        //$roomlist = Auth::user()->Rooms()->create($request->all());

       // $roomlist = Room::create($request->all());


        //Create new post by Make request
        // --->>OPTIONAL
        // $roomtasks = new RoomTask;
        // $roomtasks->roomname = request('roomname');
        // $roomtasks->description = request('description');
        // Save it to database
        // $roomtasks->save()



        //Validate

//        $this->validate(request(), [
//            'description' => 'required|min:10'
//        ]);
//
//        Room::create([
//        'roomname'=>request('roomname'),
//        'image'=>request('image'),
//        'capacity'=>request('capacity'),
//        'description'=>request('description')
//    ]);



        //Redirect to Home page

        return redirect('/roomlist');

    }

}
