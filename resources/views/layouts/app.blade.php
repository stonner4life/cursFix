<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="{{ asset('favicon.png') }}" >

<head>
    <script data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link data-require="bootstrap@3.3.2" data-semver="3.3.2" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <script data-require="bootstrap@3.3.2" data-semver="3.3.2" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/style.css" />
    <script src="/js/moment-2.10.3.js"></script>
    <script src="/js/bootstrap-datetimepicker.js"></script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{--Kanit Font--}}
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <!-- Styles -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/kanit.css" rel="stylesheet">

    <!--FOR SELECT2.IO-->
    {{--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>--}} {{--  cannot use version dupicate--}}
    <!-- Scripts -->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style>
        .blog-post {
            margin-bottom: 4rem;
        }
        .blog-post-title {
            margin-bottom: .25rem;
            font-size: 2.5rem;
        }
        .blog-post-meta {
            margin-bottom: 1.25rem;
            color: #999;
        }

         .se-pre-con {
             position: fixed;
             left: 0px;
             top: 0px;
             width: 100%;
             height: 100%;
             z-index: 9999;
             background: url(/images/Preloader_3.gif) center no-repeat #fff;
         }

    </style>


</head>

<body >
<div class="se-pre-con"></div>
@include('layouts.nav')

@include('layouts.flash')


@yield('content')


@include('layouts.footer')



<!-- App scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

        <script type="text/javascript">
            $('#good_List').select2({
                width: '100%',
                placeholder:' เพิ่มอุปกรณโสตฯ',

            });
        </script>

    {{--Slide up the flash--}}
    <script>
    $('div.alert').not('.alert.important').delay(3000).slideUp(300);
    </script>


<script type="text/javascript">
    $(function () {

        $('#start_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $('#finish_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $("#start_at").on("dp.change", function (e) {
            $('#finish_at').data("DateTimePicker").minDate(e.date);
        });
        $("#finish_at").on("dp.change", function (e) {
            $('#start_at').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>

 {{--Show GIF while load--}}
<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });
    });
</script>
</body>
</html>
