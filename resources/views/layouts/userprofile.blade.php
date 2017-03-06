@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">แก้ไขข้อมูลผู้ใช้</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/users/{{$users->id}}/edit">

                        {{ method_field('PUT') }}
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">ชื่อ</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{$users->name}}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">อีเมล</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$users->email}}" required>


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label" >รหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">ยืนยัน รหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>



                        <div class="form-group">
                           <div class="col-md-6 col-md-offset-4">
                             <button type="submit" class="btn btn-primary">แก้ไข</button>
                             <button href="{{ URL::previous() }}" class="btn btn-primary pull-right" >กลับ</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
            @include('layouts.errors')
@endsection




