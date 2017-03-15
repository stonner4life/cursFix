<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Graduate School, Chulalongkorn University</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>



<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">หน้าหลัก</a>

            @else
                <a href="{{ url('/login') }}">เข้าสู่ระบบ</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Graduate School, Chulalongkorn University
        </div>

          @if( Auth::check() && Auth::user()->role==1 )

            <div class="links">

                {{--<a href="/roomlist">รายละเอียดห้องเรียนและห้องชุม</a>--}}
                {{--<a href="/roomlist/create">สร้างห้องเรียนและห้องประชุม</a>--}}
                {{--<a href="/roomtasks">รายละเอียดการจองห้องเรียนและห้องประชุม</a>--}}
                {{--<a href="/roomtasks/create">จองห้องเรียนและห้องประชุม</a>--}}

                @else
                    {{--<div class="links">--}}
                        {{--<a href="/alllists">รายละเอียด ห้องประชุมและยานพาหนะ</a>--}}
                @endif






            @if($flash = session('message'))
                <div id="flash-message" class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{$flash}}
                </div>



        </div>
    </div>
</div>

@endif

</body>



<script src="/js/app.js"></script>
{{--Slide up the flash--}}
<script>
    $('div.alert').not('.alert.important').delay(2000).slideUp(300);
</script>

</html>
