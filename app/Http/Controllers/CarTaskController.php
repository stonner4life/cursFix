<?php

namespace App\Http\Controllers;

use App\Car;
use App\RoomTask;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\CarTask;
use Datatables;
use DB;
use User;
use Illuminate\Support\Facades\Auth;


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
        $carlists = Car::all();

      $roomtasks = RoomTask::all();
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
            return view('datatables.show',compact('cartasks','roomtasks'));
        }
        else if ($db2 != null){
            session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม2');
            return view('datatables.show',compact('cartasks','roomtasks'));

        }
        else if ($db3 != null){
            session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่3');
            return view('datatables.show',compact('cartasks','roomtasks'));
        }
        else if ($db4 != null){
            session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่4');
            return view('datatables.show',compact('cartasks','roomtasks'));
        }
        else
        {
            $current = Carbon::parse(request('start_at'));
            $dt      = Carbon::parse(request('finish_at'));
            $hours = $current->diffInHours($dt);



            CarTask::create([
                'user_id'=>auth()->id(),
                'role'=>Auth::user()->role,
                'sub_role'=>Auth::user()->sub_role,
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
                'hours'=> $hours,

            ]);
            session()->flash('message','จองรถยนต์สำเร็จ โปรดรอการอณุมัติ'); //FLASH
            //return view('datatables.show',compact('cartasks','roomtasks','carlists'));
            return redirect('datatables/show');

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

        $cartasks = CarTask::with('user','carlist','roles','subroles');
        return Datatables::of($cartasks)
                ->addColumn('action', function ($cartasks) {
                    return '<a href="/cartasks/togglestatus/' . $cartasks->id . '" class="btn btn-xs btn-warning">
                <i class="glyphicon glyphicon-refresh"></i> เปลี่ยนสถาณะ</a>

                 <a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#carModal'.$cartasks->id.'">
                 <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดเพิ่มเติม</a>
                 
                  <a href="/cartasks/destroy/' . $cartasks->id . '  " class="btn btn-xs btn-danger" >
                 <i class="glyphicon glyphicon-exclamation-sign"></i> ลบ </a> ';
                })
                ->make(true);


    }

    public function getbyId()
    {

        $cartasks = CarTask::with('user','carlist')->where('user_id', Auth::user()->id);

        return Datatables::of($cartasks)
            ->addColumn('action', function ($cartasks) {

                return '<a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#carModal' . $cartasks->id . '"> 
                   <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดการจอง </a>
                   
                   <a href="/cartasks/destroy/' . $cartasks->id . '  " class="btn btn-xs btn-danger" >
                 <i class="glyphicon glyphicon-exclamation-sign"></i> ลบ </a> ';


            })
            ->make(true);

    }

    public function destroy($id)
    {
        $cartasks= CarTask::findOrFail($id);
        $cartasks->delete();

        return redirect()->back();
    }
}
