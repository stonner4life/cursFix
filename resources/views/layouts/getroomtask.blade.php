
@foreach ($roomtasks as $roomtask )

    <div class="modal fade" id="myModal{{$roomtask->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{$roomtask->room_id}}</h4>
                </div>
                <div class="modal-body">
                    <p><strong>เริ่มประชุม:</strong>   {{$roomtask->start_at}}</p>
                    <p><strong>สิ้นสุด:</strong> {{$roomtask->finish_at}}</p>
                    <p><strong>จำนวนผู้เข้าประชุม: </strong>{{$roomtask->capacity}} คน </p>
                    <p><strong>รายละเอียดการประชุม:</strong></p>
                    <p>{{$roomtask->description}}</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

@endforeach