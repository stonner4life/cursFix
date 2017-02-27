@extends('layouts.app')

@section('content')
<div class="container">
    @if( Auth::check() && Auth::user()->role==1 )
      @include('layouts.adminhome')
        @else
        @include('layouts.userhome')
    @endif
</div>
@endsection
