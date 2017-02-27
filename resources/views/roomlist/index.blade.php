@extends('layouts.app')

        <!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
@section('content')
    <h1> &nbsp รายละเอียดห้องเรียนและของประชุม</h1>
    <ul>
        @foreach($roomlist as $roomlists)


            <li>



                <a href="roomlist/{{$roomlists->id}}">

                    <div class="blog-post" >

                        <h2 class="blog-post-title" > {{$roomlists->roomname}}  </h2>
                        <img src="/images/{{$roomlists->image}}" class="img-rounded" width="304" height="236">

                        <p class="blog-post-meta">อัพเดทล่าสุด: {{$roomlists->updated_at->toFormattedDateString()}} </p>
                          <p>รายละเอียด: {{$roomlists->description}}</p>
                     {{--Show devices of spicific room--}}

                        @if(count($roomlists->devices))
                            <p>อุกรณ์โสตฯ: </p>
                            <ul>
                                @foreach($roomlists->devices as $device)

                                    <li>{{$device->name}}</li>
                                @endforeach

                            </ul>
                        @endif
                    </div>
                </a>
            </li>

        @endforeach
        @endsection
    </ul>
</body>

</html>
