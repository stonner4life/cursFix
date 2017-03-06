@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">เพิ่มผู้ใช้ในระบบ</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ชื่อ</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">อีเมล</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">ยืนยัน รหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">บทบาท</label>

                        <div class="col-md-6">
                            <select id="role" type="text" class="form-control" name="role" required>
                                <option value="1">ผู้ดูแลระบบ</option>
                                <option value="2">กลุ่มภารกิจบริหารและธุรการ</option>
                                <option value="3">กลุ่มภารกิจ คลัง พัสดุและงบประมาณ</option>
                                <option value="4">ฝ่ายวิชาการ</option>
                                <option value="5">กลุ่มภารกิจคุณภาพการศึกษา</option>
                                <option value="6">กลุ่มภารกิจสนับสนุนบัณฑิตศึกษา</option>
                                <option value="7">กลุ่มภารกิจหลักสูตรสหสาขาวิชา</option>
                                <option value="8">พนักงานขับรถ</option>
                                <option value="9">พนักงานถ่ายรูป</option>
                                <option value="10">แม่บ้าน</option>
                                <option value="11">สหสาขาวิชา</option>
                            </select>
                        </div>
                       </div>

                        <div class="form-group">
                            <label for="sub_role" class="col-md-4 control-label">สหสาขาวิชา</label>
                        <div class="col-md-6">
                            <select id="sub_role" type="text" class="form-control" name="sub_role" required>
                                
                                <option value="0">ไม่มี</option>
                                <option value="1">เงินทุนสหสาขาวิชาสรีรวิทยา</option>
                                <option value="2">เงินทุนสหสาขาวิทยาศาสตร์สิ่งแวดล้อม ทรัพยากร</option>
                                <option value="3">เงินทุนสหสาขาวิชาเภสัชวิทยา</option>
                                <option value="4">ดเงินทุนสหสาขาวิชาจุลชีววิทยาทางการแพทย์</option>
                                <option value="5">เงินทุนสหสาขาวิชายุโรปศึกษา</option>
                                <option value="6">เงินทุนสหสาขาวิชาการจัดการสิ่งแวดล้อม</option>
                                <option value="7">เงินทุนสหสาขาวิชาจัดการทางวัฒนธรรม</option>
                                <option value="8">เงินทุนสหสาขาวิชาอังกฤษเป็นภาษานานาชาติ</option>
                            </select>
                        </div>
                </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    สมัครมาชิก
                                </button>
                                <button href="{{ URL::previous() }}" class="btn btn-primary pull-right" >กลับ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
