<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
use App\Devices;
use Illuminate\Support\Facades\Auth;
use App;
use App\RoomTask;
use DB;
class RoomTaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','edit']]);
    }

    public function index()
    {
        $roomtasks = RoomTask::orderBy('created_at', 'dsc')->get();
        return view('roomtasks.index', compact('roomtasks'));
    }


    public function show(RoomTask $roomtasks)
    { //Find id of $roomtasks wildcard

        return view('roomtasks.show', compact('roomtasks'));

    }

    public function create()
    {
        return view('roomtasks.create');

    }

    public function store(RoomRequest $request)
    {

        $devices = Devices::pluck('name','id');

        $room =request("room_id");
        $d1 =request('start_at');
        $d2 =request('finish_at');

        ///////between booked/////
        $db = DB::table('room_tasks')
             ->where('room_id', '=', $room)
             ->where('start_at', '<=', $d1)
             ->where('finish_at', '>=', $d2)->first();
        //////Before start_at to less than finish at////
          $db2 = DB::table('room_tasks')
               ->where('room_id', '=', $room)
               ->where('start_at', '>=', $d1)
               ->where('start_at', '<=', $d2)
               ->where('finish_at', '>=', $d2)->first();
        ////// Between booked to after or equal to finish_at
          $db3 = DB::table('room_tasks')
               ->where('room_id', '=', $room)
               ->where('start_at', '<=', $d1)
               ->where('finish_at', '>=', $d1)
               ->where('finish_at', '<=', $d2)->first();
        ////// Before start_at to after finish_at
           $db4 = DB::table('room_tasks')
               ->where('room_id', '=', $room)
               ->where('start_at', '>=', $d1)
               ->where('finish_at', '<=', $d2)
               ->first();

            if($db != null)
            {
                session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่1');
                return view('home', compact('roomtasks','devices'));
            }
            else if ($db2 != null){
                session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม2');
                return view('home', compact('roomtasks','devices'));

            }
            else if ($db3 != null){
                session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่3');
                return view('home', compact('roomtasks','devices'));
            }
            else if ($db4 != null){
                session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่4');
                return view('home', compact('roomtasks','devices'));
            }
            else
            {

                RoomTask::create([
                    'room_id'=>request('room_id'),
                    'start_at'=>request('start_at'),
                    'finish_at'=>request('finish_at'),
                    'topic'=>request('topic'),
                    'capacity'=>request('capacity'),
                    'description'=>request('description'),
                    'user_id'=>auth()->id()
                ]);
                session()->flash('message','จองห้องสำเร็จ โปรดรอการอณุมัติ'); //FLASH
                return redirect('datatables/show');

            }

    }


    public function edit($id)
    {

        $roomtasks = RoomTask::find($id);
        if(Auth::user()->id === $roomtasks->user_id) {
            $devices = Devices::pluck('name','id');

            return view('roomtasks.edit',compact('roomtasks','devices'));
        } else {
            return redirect('/roomtasks');
        }

//
//        $roomtasks = RoomTask::findorfail($id);
//        return view('roomtasks.edit',compact('roomtasks'));


        //return $id;

    }



    public function update(RoomRequest $request,$id){
        $roomtasks = RoomTask::findOrFail($id);
        $roomtasks->update($request->all());
            return redirect('roomtasks');
        }



}
