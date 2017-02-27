<?php

namespace App\Http\Controllers;
use App\Room;
use Illuminate\Http\Request;
use Datatables;
use App\RoomTask;
use DB;
use User;
use Auth;
use App\CarTask;
use App\Devices;

class DatatablesController extends Controller
{
    /**
     * Check Auth
     *
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['getbyId', 'show']]);
        $this->middleware('admin', ['only' => [
            'ToggleStatus'
        ]]);
    }

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $cartasks = CarTask::all();
        $roomtasks = RoomTask::all();
        if (request()->ajax()) {
            return Datatables::of(RoomTask::query())->make(true);
        }

        return view('datatables.index', compact('roomtasks','cartasks'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {

        $roomtasks = RoomTask::with('user');

        return Datatables::of($roomtasks)
            ->addColumn('action', function ($roomtasks) {
                return '<a href="/datatables/togglestatus/' . $roomtasks->id . '" class="btn btn-xs btn-warning">
                <i class="glyphicon glyphicon-refresh"></i> เปลี่ยนสถาณะ</a>
                
                 <a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#myModal' . $roomtasks->id . '">   
                 <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดเพิ่มเติม </a>';
            })
            ->make(true);

    }

    public function ToggleStatus($id)
    {
        $roomtasks = RoomTask::findOrFail($id);
        $roomtasks->status = !$roomtasks->status;
        $roomtasks->save();
        return redirect()->back();
    }


    public function getId()
    {
        $cartasks = CarTask::all();
        $roomtasks = RoomTask::all();

        if (request()->ajax()) {

            return Datatables::of(RoomTask::query())->make(true);

        }
        return view('datatables.show',compact('roomtasks','cartasks'));
    }

    public function getbyId()
    {

        $roomtasks = RoomTask::with('user')->where('user_id', Auth::user()->id);

        return Datatables::of($roomtasks)
            ->addColumn('action', function ($roomtasks) {

                return '<a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#myModal' . $roomtasks->id . '"> 
                   <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดการจอง </a>';


            })
            ->make(true);

    }



}
