<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ระบบรายงานความคืบหน้างาน</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/ionicons.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--Datpicker-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/datepicker/datepicker3.css">
        <!--Googlemap-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/googleMap/googlemap.css">

        <!--jasny-bootstrap-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dashboard/jasny-bootstrap/jasny-bootstrap.min.css"/>
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">
                <?php include_once '/template/header.php'; ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <?php include_once '/template/side_bar.php'; ?>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        เพิ่มข้อมูลลูกค้า
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/main_data"><i class="fa fa-dashboard"></i> ข้อมูลหลัก</a></li>
                        <li class="active">เพิ่มข้อมูลลูกค้า</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php echo form_open_multipart('main_data/update_customer') ?>
                    <input type="hidden"name="hdf" value="<?php echo $id;?>">
                    <!-- Your Page Content Here -->
                    <!--ข้อมูลองค์กร-->
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">ข้อมูลกิจการ</h3>
                        </div>
                        <div class="box-body">

                            <div class="row">
                                <div class="col-sm-9">
                                    <label>ชื่อกิจการ</label>
                                    <input value="<?php echo $customer_detail['customer_name']; ?>" class="form-control" name="txtCusname" placeholder="ชื่อกิจการของลูกค้า"/>
                                </div>
                                <div class="col-sm-3">
                                    <label>สถานะ:</label>
                                    <select class="form-control" name="selCusStatus">
                                        <option <?php if ($customer_detail['customer_status'] == "เจ้าของคนเดียว") {
                        echo "selected";
                    } ?>  value="เจ้าของคนเดียว">เจ้าของคนเดียว</option>
                                        <option <?php if ($customer_detail['customer_status'] == "หสม") {
                        echo "selected";
                    } ?>  value="หสม">หสม</option>
                                        <option <?php if ($customer_detail['customer_status'] == "คณะบุคคล") {
                        echo "selected";
                    } ?>   value="คณะบุคคล">คณะบุคคล</option>
                                        <option <?php if ($customer_detail['customer_status'] == "สมาคม") {
                        echo "selected";
                    } ?>  value="สมาคม">สมาคม</option>
                                        <option <?php if ($customer_detail['customer_status'] == "หจก") {
                        echo "selected";
                    } ?>  value="หจก">หจก</option>
                                        <option <?php if ($customer_detail['customer_status'] == "บจก") {
                        echo "selected";
                    } ?>  value="บจก">บจก</option>
                                        <option <?php if ($customer_detail['customer_status'] == "บมจ") {
                        echo "selected";
                    } ?>  value="บมจ">บมจ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <input value="<?php echo $customer_detail['customer_tax_id']; ?>" class="form-control" name="txtNumTax" placeholder="เลขประจำตัวผู้เสียภาษี" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <input value="<?php echo $customer_detail['customer_band_id']; ?>" class="form-control" name="txtNumBand" placeholder="เลขทะเบียนการค้า" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <textarea  name="txtAddrTh" class="form-control" cols="40" rows="1" placeholder="ที่อยู่ภาษาไทย(ขยายช่องกรอกได้)"><?php echo $customer_detail['customer_addr_th']; ?></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <textarea  name="txtAddrEn" class="form-control" cols="40" rows="1" placeholder="ที่อยู่ภาษาอังกฤษ(ขยายช่องกรอกได้)"><?php echo $customer_detail['customer_addr_en']; ?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input value="<?php echo $customer_detail['customer_tel']; ?>" name="txtCusTel" type="text" class="form-control" placeholder="หมายเลขโทรศัพท์">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fax"></i>
                                        </div>
                                        <input value="<?php echo $customer_detail['customer_fax']; ?>" name="txtCusFax" type="text" class="form-control" placeholder="หมายเลขโทรสาร">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa  fa-globe"></i>
                                        </div>
                                        <input value="<?php echo $customer_detail['customer_web']; ?>" name="txtCusWeb" type="text" class="form-control" placeholder="www.example.com">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input value="<?php echo $customer_detail['customer_mail']; ?>" name="txtCusMail" type="email" class="form-control" placeholder="exam@example.com">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div id="olNameCon">
                                      <?php
                                      if(!empty($sing)):
                                      
                                      foreach ($sing as $rowSign):?>  
                                        <input value="<?php echo $rowSign['name']; ?>" type="text" name="txtNameCon[]" id="txtNameCon1" class="form-control" placeholder="ชื่อผู้มีอำนาจลงนาม"/><label id="lb1">&nbsp;</label>
                                       <?php endforeach;
                                       else: ?>
                                        <input  type="text" name="txtNameCon[]"  class="form-control" placeholder="ชื่อผู้มีอำนาจลงนาม"/><label >&nbsp;</label>
                                     <?php endif;  ?>
                                      
                                    </div>

                                </div>

                                <div class="col-sm-2">
                                    <label>สถานะ:</label>
                                    <div id="selStatus">
                                    <?php 
                                    if(!empty($sing)){
                                    foreach ($sing as $rowSign):?>    
                                        <select class="form-control" name="selStatusCondition[]" id="selStatusCondition1">
                                            <option <?php if($rowSign['status'] == "เจ้าของกิจการ"){echo "selected";}?> value="เจ้าของกิจการ">เจ้าของกิจการ</option>
                                            <option <?php if($rowSign['status'] == "หุ้นส่วนผู้จัดการ"){echo "selected";}?> value="หุ้นส่วนผู้จัดการ">หุ้นส่วนผู้จัดการ</option>
                                            <option <?php if($rowSign['status'] == "กรรมการผู้จัดการ"){echo "selected";}?> value="กรรมการผู้จัดการ">กรรมการผู้จัดการ</option>
                                        </select><label id="lb2">&nbsp;</label>
                                    <?php endforeach;
                                    }else{ ?>
                                            <select class="form-control" name="selStatusCondition[]" >
                                            <option  value="เจ้าของกิจการ">เจ้าของกิจการ</option>
                                            <option value="หุ้นส่วนผู้จัดการ">หุ้นส่วนผู้จัดการ</option>
                                            <option  value="กรรมการผู้จัดการ">กรรมการผู้จัดการ</option>
                                        </select><label >&nbsp;</label>
                                   <?php }
                                    ?>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label>&nbsp;</label>
                                    <ul class="list-inline">
                                        <li><button type="button" id="btnAdd" name="btnAdd" class="btn btn-block btn-default btm-sm"><span class="fa fa-plus"></span></button></li>
                                        <li><button type="button" id="btnDel" name="btnDel" class="btn btn-block btn-default btm-sm"><span class="fa fa-minus"></span></button></li>
                                    </ul> 
                                </div>
                                <div class="col-sm-5">
                                    <label>&nbsp;</label>
                                    <textarea name="txtConditionNam" class="form-control" cols="1" rows="1" placeholder="เงื่อนไขการลงนาม(ขยายช่องกรอกได้)"><?php echo $customer_detail['customer_condition'] ?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>ผู้ติดต่องาน:</label>
                                    <input value="<?php echo $customer_detail['customer_coor_name']; ?>" class="form-control" name="txtContractName" type="text" placeholder="ชื่อผู้ที่ติดต่องาน"/>
                                </div>
                                <div class="col-md-3"> 
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input value="<?php echo $customer_detail['customer_coor_tel']; ?>" name="txtContractTel" type="text" class="form-control" placeholder="หมายเลขโทรศัพท์ผู้ติดต่องาน"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input value="<?php echo $customer_detail['customer_coor_mail']; ?>" name="txtContractMail" type="email" class="form-control" placeholder="exam@example.com"/>
                                    </div>
                                </div>
                                <!-- <div class="col-md-3">
                                     <label>รูปถ่าย:</label>
                                     <input type="file" class="form-control" name="fileImgCustomer">
                                 </div> -->
                            </div>

                            <div class="row">

                                <div class="col-sm-3">
                                    <label>&nbsp;</label>  <!--รับค่าจาก GoogleMap-->
                                    <input value="<?php echo $customer_detail['customer_lat']; ?>" name="txtLat" id="lat_value" class="form-control" placeholder="ละติจูด(ค่าอัตโนมัติเมื่อลากหมุด)" />
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label><!--รับค่าจาก GoogleMap-->
                                    <input value="<?php echo $customer_detail['customer_long']; ?>" name="txtLong" id="lon_value" class="form-control" placeholder="ลองติจูด(ค่าอัตโนมัติเมื่อลากหมุด)" />
                                </div>
                                <div class="col-sm-6">
                                    <label>&nbsp;</label>
                                    <textarea class="form-control" name="txtCustomerMark" cols="40" rows="1" placeholder="หมายเหตุ"><?php echo $customer_detail['customer_note']; ?></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <!--แผนที่-->
                                <div class="col-sm-6">

                                    <div id="map_canvas"></div>
                                </div>
                                <!--รูป-->
                                <div class="col-sm-6">

<!-- <img title="รูปถ่ายสำนักงาน" class="img-responsive" style="height: 350px; width: 100%;" src="<?php //echo base_url();   ?>dashboard/lte/dist/img/boxed-bg.png">  -->
                                    <!--image-->

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 430px; height: 320px;"><?php if(!empty($file) && (file_exists("uploads/$file"))):?><img src="<?php echo base_url();?>/uploads/<?php echo $file;?>"><?php endif;?></div>
                                        <div>
                                            <span class="btn btn-default btn-file btn-sm"><span class="fileinput-new">เลือกรูป</span><span class="fileinput-exists">เปลี่ยน</span><input type="file" name="fileImgCustomer"></span>
                                            <a href="#" class="btn-sm btn btn-default fileinput-exists" data-dismiss="fileinput">ลบ</a>
                                        </div>
                                    </div>
                                    <!--/.image-->
                                </div>

                            </div>

                        </div>
                        <!--Div Footer-->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">ล้างข้อมูล</button>
                            <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                        </div>
                        <!--.Div Footer-->

                    </div>
                    <!-- /.box-body -->



                    </form>
                    <!-- .Your Page Content Here -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
<?php include_once '/template/footer.php'; ?>
            <!-- .Main Footer -->


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dashboard/lte/dist/js/app.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
        <!--Datpicker-->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/datepicker/bootstrap-datepicker.js"></script>
        
        <!--jasny-bootstrap-->
        <script src="<?php echo base_url(); ?>dashboard/jasny-bootstrap/jasny-bootstrap.min.js"></script>

        <!--add element-->
        <script>
            $(document).ready(function () {
                $("#btnAdd").click(function () {
                    $("#olNameCon").append("<label id='lb1'>&nbsp;</label><input type='text' name='txtNameCon[]' id='txtNameCon1' class='form-control' placeholder='ชื่อผู้มีอำนาจลงนาม'/>");
                    $("#selStatus").append("<label id='lb2'>&nbsp;</label><select class='form-control' name='selStatusCondition[]' id='selStatusCondition1'><option value='เจ้าของกิจการ'>เจ้าของกิจการ</option><option value='หุ้นส่วนผู้จัดการ'>หุ้นส่วนผู้จัดการ</option><option value='กรรมการผู้จัดการ'>กรรมการผู้จัดการ</option></select>");
                });
            });
        </script>
        <!--remove element-->
        <script>
            $(document).ready(function () {
                $("#btnDel").click(function () {
                    $("#txtNameCon1").remove();
                    $("#selStatusCondition1").remove();
                    $("#lb1").remove();
                    $("#lb2").remove();
                });
            });
        </script>
        <!--Google Map-->
        <script>

            var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
            var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น

            function initialize() { // ฟังก์ชันแสดงแผนที่
                GGM = new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
                // กำหนดจุดเริ่มต้นของแผนที่
                //var my_Latlng = new GGM.LatLng(19.170210, 99.900722);  //ม.พะเยา  19.0293178, 99.895302
                var my_Latlng = new GGM.LatLng(<?php echo $customer_detail['customer_lat']?>, <?php echo $customer_detail['customer_long'];?>); 
            var my_mapTypeId = GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
                // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
                var my_DivObj = $("#map_canvas")[0];
                // กำหนด Option ของแผนที่
                var myOptions = {
                    zoom: 15, // กำหนดขนาดการ zoom
                    center: my_Latlng, // กำหนดจุดกึ่งกลาง
                    mapTypeId: my_mapTypeId // กำหนดรูปแบบแผนที่
                };
                map = new GGM.Map(my_DivObj, myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map

                var my_Marker = new GGM.Marker({// สร้างตัว marker
                    position: my_Latlng, // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
                    map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
                    draggable: true, // กำหนดให้สามารถลากตัว marker นี้ได้
                    title: "คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
                });

                // กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร
                GGM.event.addListener(my_Marker, 'dragend', function () {
                    var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
                    map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker   
                    $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
                    $("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
                    $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
                });

                // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
                GGM.event.addListener(map, 'zoom_changed', function () {
                    $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value  
                });

            }
            $(function () {
                // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
                // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
                // v=3.2&sensor=false&language=th&callback=initialize
                //  v เวอร์ชัน่ 3.2
                //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
                //  language ภาษา th ,en เป็นต้น
                //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
                $("<script/>", {
                    "type": "text/javascript",
                    src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
                }).appendTo("body");
            });


        </script>
    </body>
</html>
