@extends('layouts.app')

        <!DOCTYPE html>
<html lang="en">
        <head>
          <title></title>
        </head>
        <body>

          @section('content')

              {{--{!! Form::open(['url'=>'roomtasks']) !!}--}}
              {{--@include('roomtasks.form',['submitButtonText'=>'Add Room'])--}}
              {{--{!! Form::close() !!}--}}


              <h1>Book Room</h1>
                  <hr>

              <form method="post" action="/roomtasks">

                  {{ csrf_field() }}

                  <div class="form-group">
                      <label for="roomname">Room name:</label>
                      <select class="form-control" name="roomname">
                          <option>Floors 11 ,Room 1102</option>
                          <option>Floors 12 ,Room 1201</option>
                          <option>Floors 13 ,Room 1302</option>
                          <option>Floors 14 ,Room 1420</option>
                          <option>Floors 15 ,Room 1554</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" name="description" rows="2" ></textarea>
                  </div>

                  <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>

                  @include('layouts.errors');

              </form>


              {{--{!! Form::open(['url'=>'roomtasks']) !!}--}}
              {{--@include('roomtasks.form',['submitButtonText'=>'Add Room'])--}}
              {{--{!! Form::close() !!}--}}

          @endsection
        </body>

</html>
