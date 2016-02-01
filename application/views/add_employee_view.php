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
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/ionicons.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--Datpicker-->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/plugins/datepicker/datepicker3.css">
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
            <form name="formAddEm" action="<?php echo base_url();?>index.php/main_data/insert_emp" method="POST" enctype="multipart/form-data" OnSubmit="return fncSubmit();" >
     <?php //echo form_open_multipart('main_data/insert_emp') ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        เพิ่มพนักงาน
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/main_data"><i class="fa fa-dashboard"></i> ข้อมูลหลัก</a></li>
                        <li class="active">เพิ่มพนักงาน</li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!--รูปประจำตัว-->
                        <div class="col-sm-3">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">รูปพนักงาน</h3>
                                </div>
                                <div class="box-body box-profile">
                                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>dashboard/lte/dist/img/avatar5.png" title="รูปประจำตัว">
                                    <div style="padding-top: 9px"></div>
                                    <input required="" type="file" class="form-control input-sm" name="fileEmPhoto"/>
                                </div>
                            </div>



                        </div>
                        <!--ข้อมูลพนักงาน-->
                        <div class="col-sm-9">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">ข้อมูลพนักงาน</h3>
                                </div>
                                <div class="box-body">
                                    <!--ชื่อ-นามสกุล-->

                                    <div class="row">

                                        <div class="col-sm-3">
                                            <label>ชื่อ:</label>
                                            <select class="form-control" name="selTitle">
                                                <option value="นาย">นาย</option>
                                                <option value="นาง">นาง</option>
                                                <option value="นางสาว">นางสาว</option>
                                            </select>

                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-sm-3">
                                            <label>&nbsp;</label>
                                            <input required="" name="txtEmName" type="text" class="form-control" placeholder="ชื่อ">

                                            <!-- /input-group -->
                                        </div>
                                        <!-- /.col-lg-6 -->
                                        <div class="col-sm-3">
                                            <label>&nbsp;</label>
                                            <input required="" name="txtEmLastName" type="text" class="form-control " placeholder="นามสกุล">
                                            <!-- /input-group -->
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>สถานการทำงาน:</label>
                                            <select name="selStatus" class="form-control">
                                                <option value="คงอยู่">คงอยู่</option>
                                                <option value="ลาออก">ลาออก</option>
                                            </select>
                                        </div>
                                        <!-- /.col-lg-6 -->
                                    </div>  
                                    <!--.ชื่อ-นามสกุล-->
                                    <br>
                                    <div class="row">
                                        
                                        <div class="col-sm-2">
                                            <label>สถานะในระบบ:</label>
                                            <select name="selRole" class="form-control">
                                                <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                                                <option value="ผู้ใช้งาน">ผู้ใช้งาน</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>&nbsp;</label>
                                            <input type="text" class="form-control" name="txtEmId" placeholder="หมายเลขพนักงาน" required="">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>&nbsp;</label>
                                            <input type="text" class="form-control" name="txtAuditId" placeholder="หมายเลขผู้ทำบัญชี" required="">
                                        </div>
                                        
                                        <!--PassWord-->
                                       <div class="col-sm-2">
                                            <label>&nbsp;</label>
                                            <input maxlength="16" minlength="6" type="password" class="form-control" name="txtPassword" placeholder="รหัสผ่าน" required="">
                                        </div>
                                        
                                        <!--PassWord-->
                                       <div class="col-sm-2">
                                            <label>&nbsp;</label>
                                            <input maxlength="16" minlength="6" type="password" class="form-control" name="txtPassword2" placeholder="ยืนยันรหัสผ่าน" required="">
                                       </div>

                                    </div> 
                                      <!-- /.class row  สถานการทำงาน-->
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                          <!-- /.col-sm-9 ข้อมูลพนักงาน -->
                    </div>        
                 <!-- /.class row -->



                    <!--ข้อมูลส่วนบุคคล-->
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title">ข้อมูลส่วนบุคคล</h3>
                        </div>
                        <div class="box-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>เลขประจำตัวประชาชน:</label>
                                    <input class="form-control" name="txtNationId" placeholder="หมายเลข 13 หลัก" maxlength="13">
                                </div>
                                <div class="col-sm-3">
                                    <label>สถานะสมรส :</label>
                                    <select name="selMarieStatus" class="form-control">
                                        <option value="โสด">โสด</option>
                                        <option value="สมรส">สมรส</option>
                                        <option value="หย่าร้าง">หย่าร้าง</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <textarea name="txtareaAddr1" rows="1" cols="40" class="form-control" placeholder="ที่อยู่ตามทะเบียนบ้าน"></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <textarea name="txtareaAddr2" rows="1" cols="40" class="form-control" placeholder="ที่อยู่ปัจจุบัน"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>ข้อมูลการติดต่อ:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input name="txtTel" type="text" class="form-control" placeholder="หมายเลขโทรศัพท์">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input name="txtEmail" type="email" class="form-control" placeholder="example@exam.com">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>บุคคลที่ติดต่อได้:</label>

                                    <input name="txtNameFriend" type="text" class="form-control" placeholder="ชื่อบุคคลที่ติดต่อได้">

                                </div>

                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input name="txtTelFriend" type="text" class="form-control" placeholder="หมายเลขโทรศัพท์">
                                    </div>
                                </div>
                            </div>

                            <!--ข้อมูลการศึกษา-->
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>ระดับการศึกษา:</label>
                                    <select class="form-control" name="selGaduLevel">
                                        <option value="ประถมต้น">ประถมต้น</option>
                                        <option value="ประถมปลาย">ประถมปลาย</option>
                                        <option value="มัธยมต้น">มัธยมต้น</option>
                                        <option value="มัธยมปลาย">มัธยมปลาย</option>
                                        <option value="ปวช">ปวช</option>
                                        <option value="ปวส">ปวส</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label>สาขาที่จบ:</label>

                                    <input name="txtMajor" type="text" class="form-control" placeholder="บัญชี">

                                </div>
                                <div class="col-sm-3">
                                    <label>เกรดเฉลี่ยรวม:</label>

                                    <input name="txtGpa" type="text" class="form-control" placeholder="4.00">

                                </div>
                                <div class="col-sm-3">
                                    <label>สถาบัน:</label>

                                    <input name="txtInstitute" type="text" class="form-control" placeholder="มหาวิทยาลัยเกษตรศาสตร์">

                                </div>
                            </div>

                            <!--.ข้อมูลการศึกษา-->

                            <!--ข้อมูลเกี่ยวกับการทำงาน-->
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>เริ่มปฏิบัติงาน:</label>

                                   <!-- <input  data-provide="datepicker" name="datInWork" type="text" class="form-control datepicker" placeholder="" data-date-format="dd/mm/yyyy">-->
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        <input required="" name="datInWork" type="text" class="form-control" placeholder="01/01/2016">

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>

                                    <input name="txtCoast" type="text" class="form-control" placeholder="อัตราเงินเดือน">

                                </div>
                                <div class="col-sm-3">
                                    <label>ค่าแรงต่อวัน:</label>

                                    <input name="txtRateCoast" type="text" class="form-control" placeholder="จำนวนบาทต่อวัน">

                                </div>
                                <div class="col-sm-3">
                                    <label>จำวนวนวันทำงาน:</label>

                                    <input name="txtWorkDay" type="text" class="form-control" placeholder="จำนวนวันต่อเดือน">

                                </div>
                            </div>
                            <!--.ข้อมูลเกี่ยวกับการทำงาน-->

                            <!--เงื่อนไขวันหยุดและสวัสดิการ+หมายเหตุ-->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>&nbsp;</label>
                                    <textarea name="txtareaCondition" rows="3" cols="30" class="form-control" placeholder="เงื่อนไขวันหยุดและสวัสดิการ"></textarea>
                                </div>

                                <div class="col-sm-6">
                                    <label>&nbsp;</label>
                                    <textarea name="txtareaMark" rows="3" cols="30" class="form-control" placeholder="หมายเหตุ"></textarea>
                                </div>

                            </div>

                        <!--.เงื่อนไขวันหยุดและสวัสดิการ+หมายเหตุ-->

                        </div>
                        <!-- /.box-body -->

                        <!--Div Footer-->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">ล้างข้อมูล</button>
                            <input type="submit" name="btnsubmit" class="btn btn-success pull-right" value="บันทึก"/>
                        </div>
                        <!--.Div Footer-->
                
                 
                    </div>




                    <!-- .Your Page Content Here -->
                </section>
                
                
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
       </form><!--Form-->
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
        <script src="<?php echo base_url();?>dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url();?>dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>dashboard/lte/dist/js/app.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
        <!--Datpicker-->
        <script src="<?php echo base_url();?>dashboard/lte/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Check PassWord-->
        <script>
                            function fncSubmit()
                            {
                                if (document.formAddEm.txtPassword.value == "")
                                {
                                alert('โปรดสร้างรหัสผ่าน');
                                        document.formAddEm.txtPassword.focus();
                                        return false;
                                }
                                if (document.formAddEm.txtPassword2.value == "")
                                {
                                alert('โปรดยืนยันรหัสผ่าน');
                                        document.formAddEm.txtPassword2.focus();
                                        return false;
                                }
                                if (document.formAddEm.txtPassword.value != document.formAddEm.txtPassword2.value)
                                {
                                alert('โปรดยืนยันรหัสผ่านอีกครั้ง');
                                        document.formAddEm.txtPassword.focus();
                                        return false;
                                }
                                document.formAddEm.submit();
                                
                            }
        </script>
    </body>
</html>
