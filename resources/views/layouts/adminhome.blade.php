
<div class="panel panel-default">
    <div class="panel-heading" align="center">เลือกทำรายการ</div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <a href="#" data-toggle="modal" data-target="#myModal">
                    <div  class="panel panel-danger">
                        <div class="panel-heading" align="center">
                            <span class="glyphicon glyphicon-blackboard"style="font-size: 120px;" ></span>
                        </div>
                        <div class="panel-body" align="center">
                            จองห้องประชุม
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="" data-toggle="modal" data-target="#carTaskModal">
                    <div  class="panel panel-primary">
                        <div class="panel-heading" align="center">
                            <span class="glyphicon glyphicon-road" style="font-size: 120px;" ></span>
                        </div>
                        <div class="panel-body" align="center">
                            จองยานพาหนะ
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-4">
                <a href="">
                    <div  class="panel panel-success">
                        <div class="panel-heading" align="center">
                            <span class="glyphicon glyphicon-camera" style=" font-size: 120px;"></span>
                        </div>
                        <div class="panel-body" align="center">
                            จองเจ้าหน้าที่ถ่ายรูป
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="#" data-toggle="modal" data-target="#roomModal">
                    <div  class="panel panel-danger">
                        <div class="panel-heading" align="center">
                            <span class="glyphicon glyphicon-cog"style="font-size: 120px;" ></span>
                        </div>
                        <div class="panel-body" align="center">
                            เพิ่มห้องประชุม
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="">
                    <div  class="panel panel-primary">
                        <div class="panel-heading" align="center">
                            <span class="glyphicon glyphicon-cog" style="font-size: 120px;" ></span>
                        </div>
                        <div class="panel-body" align="center">
                            เพิ่มยานพาหนะ
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-4">
                <a href="">
                    <div  class="panel panel-success">
                        <div class="panel-heading" align="center">
                            <span class="glyphicon glyphicon-cog" style=" font-size: 120px;"></span>
                        </div>
                        <div class="panel-body" align="center">
                            เพิ่มเจ้าหน้าที่ถ่ายรูป
                        </div>
                    </div>
                </a>
            </div>

            @include('layouts.addroommodal')
        </div>


           @include('layouts.cartaskmodal')



    </div>
         @include('layouts.roomtaskmodal')

</div>