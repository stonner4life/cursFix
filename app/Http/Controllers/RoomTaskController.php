<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;

use App;
use App\RoomTask;

class RoomTaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
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

    public function store()
    {


        //Create new post by Make request
        // --->>OPTIONAL
        // $roomtasks = new RoomTask;
        // $roomtasks->roomname = request('roomname');
        // $roomtasks->description = request('description');
        // Save it to database
        // $roomtasks->save()

        //Validate

        $this->validate(request(), [
            'description' => 'required|min:10'
        ]);

        RoomTask::create([
            'roomname'=>request('roomname'),
                'description'=>request('description'),
                'user_id'=>auth()->id()
            ]);

        //Redirect to Home page

        return redirect('/roomtasks');

    }


    public function edit($id)
    {
        $roomtasks = RoomTask::findorfail($id);
        return view('roomtasks.edit',compact('roomtasks'));
    }



    public function update(RoomRequest $request,$id){
        $roomtasks = RoomTask::findOrFail($id);
        $roomtasks->update($request->all());
            return redirect('roomtasks');
        }

//        $this->validate(request(), [
//            'description' => 'required|min:10'
//        ]);
//
//        RoomTask::update(request(['roomname', 'description']));
//
//        return redirect('/roomtasks');
//



}
