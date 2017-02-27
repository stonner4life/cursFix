<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarTask;
use Datatables;
use DB;
use User;
use Auth;


class CarTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','edit']]);
    }

    public function index()
    {
        $cartasks = CarTask::all();
        return view('cartasks.index', compact('cartasks'));
    }


    public function show(CarTask $cartasks)
    { //Find id of $roomtasks wildcard

        return view('cartasks.show', compact('cartasks'));

    }

    public function create()
    {
        return view('cartasks.create');

    }

    public function store(CarTask $request)
    {

      $cartasks = CarTask::with('user');
        $car =request("vehicle");
        $d1 =request('start_at');
        $d2 =request('finish_at');

        ///////between booked/////
        $db = DB::table('cars')
            ->where('vehicle', '=', $car)
            ->where('start_at', '<=', $d1)
            ->where('finish_at', '>=', $d2)->first();
        //////Before start_at to less than finish at////
        $db2 = DB::table('cars')
            ->where('vehicle', '=', $car)
            ->where('start_at', '>=', $d1)
            ->where('start_at', '<=', $d2)
            ->where('finish_at', '>=', $d2)->first();
        ////// Between booked to after or equal to finish_at
        $db3 = DB::table('cars')
            ->where('vehicle', '=', $car)
            ->where('start_at', '<=', $d1)
            ->where('finish_at', '>=', $d1)
            ->where('finish_at', '<=', $d2)->first();
        ////// Before start_at to after finish_at
        $db4 = DB::table('cars')
            ->where('vehicle', '=', $car)
            ->where('start_at', '>=', $d1)
            ->where('finish_at', '<=', $d2)
            ->first();

        if($db != null)
        {
            session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่1');
            return view('cartasks.index', compact('cartasks'));
        }
        else if ($db2 != null){
            session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม2');
            return view('cartasks.index', compact('cartasks'));

        }
        else if ($db3 != null){
            session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่3');
            return view('cartasks.index', compact('cartasks'));
        }
        else if ($db4 != null){
            session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่4');
            return view('cartasks.index', compact('cartasks'));
        }
        else
        {

            CarTask::create([
                'user_id'=>auth()->id(),
                'description'=>request('description'),
                'purpose'=>request('purpose'),
                'place'=>request('place'),
                'contactNumber'=>request('contactNumber'),
                'passenger'=>request('passenger'),
                'start_at'=>request('start_at'),
                'finish_at'=>request('finish_at'),
                'vehicle'=>request('vehicle'),
                'driver'=>request('driver'),
                'status'=>request('status'),


            ]);
            session()->flash('message','จองรถยนต์สำเร็จ โปรดรอการอณุมัติ'); //FLASH
            return redirect('cartasks');

        }

    }


    public function edit($id)
    {

        $cartasks = CarTask::find($id);
        if(Auth::user()->id === $cartasks->user_id) {
            return view('roomtasks.edit',compact('cartasks'));
        } else {
            session()->flash('messagedanger','ไม่สามารถเข้าถึงได้');
            return redirect('/roomtasks');
        }

//
//        $roomtasks = RoomTask::findorfail($id);
//        return view('roomtasks.edit',compact('roomtasks'));


        //return $id;

    }



    public function update(Request $request,$id){
        $cartasks = Car::findOrFail($id);
        $cartasks->update($request->all());
        return redirect('roomtasks');
    }

    public function ToggleStatus($id)
    {
        $cartasks = CarTask::findOrFail($id);
        $cartasks->status = !$cartasks->status;
        $cartasks->save();
        return redirect()->back();
    }

    public function getCarTask()
    {
//        $cartasks = CarTask::with('user');
//        if (request()->ajax()) {
//            return Datatables::of($cartasks)
//                ->addColumn('action', function ($cartasks) {
//                    return '<a href="/cartasks/togglestatus/' . $cartasks->id . '" class="btn btn-xs btn-warning">
//                <i class="glyphicon glyphicon-refresh"></i> เปลี่ยนสถาณะ</a>
//
//                 <a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#carModal' . $cartasks->id . '">
//                 <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดเพิ่มเติมนะ</a>';
//                })
//                ->make(true);
//        }
//        return view('datatables.cartask', compact('cartasks'));
        $cartasks = CarTask::with('user');
        return Datatables::of($cartasks)
                ->addColumn('action', function ($cartasks) {
                    return '<a href="/cartasks/togglestatus/' . $cartasks->id . '" class="btn btn-xs btn-warning">
                <i class="glyphicon glyphicon-refresh"></i> เปลี่ยนสถาณะ</a>
                
                 <a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#carModal'.$cartasks->id.'">   
                 <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดเพิ่มเติมนะ</a>';
                })
                ->make(true);

    }

    public function getbyId()
    {

        $cartasks = CarTask::with('user')->where('user_id', Auth::user()->id);

        return Datatables::of($cartasks)
            ->addColumn('action', function ($cartasks) {

                return '<a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#carModal' . $cartasks->id . '"> 
                   <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดการจอง </a>';


            })
            ->make(true);

    }


}
