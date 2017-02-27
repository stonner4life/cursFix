
<!-- Modal -->
<div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="carModalLabel">กรอกรายละเอียดจองยานพาหนะ</h4>
            </div>
            <div class="modal-body">
                <style>
                    .form-control {
                        display: inline-block;
                    }
                </style>

                <form method="post" action="/roomlist">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="image" class="control-label"> :</label>
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
                        {!! Form::select('devices[]',$devices,null,['id'=>'good_List','clsss'=>'form-control','multiple']) !!}
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">เพิ่ม</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    </div>

                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
</div>


