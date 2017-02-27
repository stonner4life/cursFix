
<!-- Modal -->
<div class="modal fade" id="carTaskModal" tabindex="-1" role="dialog" aria-labelledby="carTaskModalLabel" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="carTaskModalLabel">กรอกรายละเอียดการจองยานพาหนะ</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="/cartasks">

                    {{ csrf_field() }}




                    <div class="form-group">
                        <label>ตั้งแต่วัน/เวลา:</label>
                        <div class='input-group date' id='start_at'>
                            <input name="start_at" type='text' class="form-control" />
                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>จนถึงวัน/เวลา:</label>
                        <div class='input-group date' id='finish_at'>
                            <input name="finish_at" type='text' class="form-control" />
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="place">สถานที่:</label>
                        <textarea class="form-control" name="place" rows="1" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">รายละเอียดการเดินทาง:</label>
                        <textarea class="form-control" name="description" rows="2" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="purpose">เพื่อ:</label>
                        <textarea class="form-control" name="purpose" rows="1" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="contactNumber">เบอร์โทรศัพท์ที่ติดต่อได้:</label>
                        <textarea class="form-control" name="contactNumber" rows="1" ></textarea>
                    </div>


                    <div class="form-group">
                        <label for="vehicle">เลือกยานพาหนะ:</label>
                        <select class="form-control" name="vehicle">
                            <option>Ford Mustang GT 500</option>
                            <option>Bugati Veyron</option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="driver">พนักงานขับรถ :</label>
                        <select class="form-control" name="driver">
                            <option>Ken Block</option>
                            <option>Pual Walker</option>
                        </select>
                    </div>





                    <div class="form-group">
                        <label for="passenger">จำนวนผู้โดยสาร:</label>
                        <textarea class="form-control" name="passenger" rows="1" ></textarea>
                    </div>


                    @include('layouts.errors')
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit"  class="btn btn-primary">จอง</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

                        </div>

                    </div>
                </form>



            </div>

        </div>
    </div>
</div>