@extends('layouts.app')

        <!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>

@section('content')

    <h1>Edit:{!! $roomtasks->roomname !!}</h1>
    <hr>


    {{--<h1>Edit Room Details</h1>--}}
    {{--'url'=>'roomtasks/'. $roomtasks->id--}}

    {{--{!! Form::model($roomtasks, ['method'=>'PATCH','action' =>'RoomTaskController@update',$roomtasks->id]) !!}--}}
    {{--@include('roomtasks.form',['submitButtonText'=>'Update Room'])--}}
     {{--{!! Form::close() !!}--}}



    <form method="POST" action="/roomtasks/{{$roomtasks->id}}/edit" >

        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="roomname">Room name:</label>
            <textarea class="form-control" name="roomname" rows="1" >  {{ $roomtasks->roomname }}</textarea>

            {{--<select class="form-control" name="roomname">--}}
                {{--<option >Floors 11 ,Room 1102</option>--}}
                {{--<option>Floors 12 ,Room 1201</option>--}}
                {{--<option>Floors 13 ,Room 1302</option>--}}
                {{--<option>Floors 14 ,Room 1420</option>--}}
                {{--<option>Floors 15 ,Room 1554</option>--}}
            {{--</select>--}}

        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="2" > {{ $roomtasks->description }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        @include('layouts.errors');

    </form>



@endsection
</body>

</html>
