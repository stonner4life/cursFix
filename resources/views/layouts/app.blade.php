<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{--Kanit Font--}}
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/kanit.css" rel="stylesheet">
    {{--For Blog--}}
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
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>

        @include('layouts.nav')

        @yield('content')


        @include('layouts.footer')


    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
