@extends('layouts.app')

        <!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>

@section('content')

<div class="container">
    <h1>เพิ่มห้องใหม่</h1>
    <hr>

    <form method="post" action="/roomlist">

        {{ csrf_field() }}
        <div class="form-group">
            <label for="image" class="control-label"> รูปห้อง:</label>
            <input id="input-1" type="file" class="file" name="image">
        </div>

        <div class="form-group">
            <label for="roomname">ชื่อห้อง:</label>
            <textarea class="form-control" name="roomname" rows="1" ></textarea>
        </div>

        <div class="form-group">
            <label for="capacity">ความจุ:</label>
            <textarea class="form-control" name="capacity" rows="1" ></textarea>
        </div>

        <div class="form-group">
            <label for="description">รายละเอียด:</label>
            <textarea class="form-control" name="description" rows="2" ></textarea>
        </div>

        <div class="form-group">
        {!! Form::label('devices','อุปกรณ์โสตฯ:') !!}
        {!! Form::select('devices[]',$devices,null,['clsss'=>'form-control','multiple']) !!}
        </div>


        {{--<div class="form-group">--}}
            {{--<label for="devices">อุปกรณ์โสตฯ:</label>--}}
            {{--<label class="checkbox-inline" name="devices">--}}
                {{--@foreach($devices as $devicess)--}}
                {{--<input type="checkbox" value="" name="devices">--}}
                {{--{{ $devicess->name }}--}}
                {{--@endforeach--}}
            {{--</label>--}}
        {{--</div>--}}


        <div class="form-group">
            <button type="submit" class="btn btn-primary">เพิ่ม</button>
        </div>

        @include('layouts.errors')

    </form>

</div>
@endsection
</body>


</html>
