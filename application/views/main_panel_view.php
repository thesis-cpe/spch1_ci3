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
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/bootstrap/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/ionicons.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/dist/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/dist/css/skins/skin-blue.min.css');?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                <?php include_once 'template/header.php'; ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <?php include_once 'template/side_bar.php'; ?>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ส่วนควบคุมหลัก
                        <small>รวมเมนูทั้งระบบ</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> ส่วนควบคุมหลัก</a></li>
                        <!-- <li class="active">Here</li> -->
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">เมนู</h3>


                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            
                            <div class="row">
                                <!--ข้อมูลหลัก-->
                                <div class="col-sm-3">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h4>ข้อมูลหลัก</h4>

                                           <p>&nbsp;</p> 
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-database"></i>
                                        </div>
                                        <a href="main_data" class="small-box-footer">
                                            แสดงข้อมูลลูกค้าและพนักงาน <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--เปิดงาน-->
                                <div class="col-sm-3">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h4>เปิดโครงการ</h4>

                                           <p>&nbsp;</p> 
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa fa-group"></i>
                                        </div>
                                        <a href="project" class="small-box-footer">
                                            เปิดโครงการและจัดการทีมงาน <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--งานประจำวัน-->
                                 <div class="col-sm-3">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h4>งานประจำวัน</h4>

                                           <p>&nbsp;</p> 
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-tasks"></i>
                                        </div>
                                        <a href="dailywork" class="small-box-footer">
                                            บันทึกข้อมูลงานประจำวัน <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--รายงาน-->
                                <div class="col-sm-3">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h4>รายงาน</h4>

                                           <p>&nbsp;</p> 
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-line-chart"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            รายงานของระบบ <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                   <!--เพิ่มข้อมูลลูกค้า-->
                                <div class="col-sm-3">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h4>เพิ่มข้อมูลลูกค้า</h4>

                                           <p>&nbsp;</p> 
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                        <a href="add-customer.php" class="small-box-footer">
                                            เพิ่มข้อมูลกิจการของลูกค้าเข้าสู่ระบบ <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                     <!--เพิ่มข้อมูลพนักงาน-->
                                <div class="col-sm-3">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h4>เพิ่มพนักงาน</h4>

                                           <p>&nbsp;</p> 
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <a href="add-employee.php" class="small-box-footer">
                                            เพิ่มข้อมูลพนักงานเข้าสู่ระบบ <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /Your Page Content Here -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <?php include_once 'template/footer.php'; ?>
            <!-- .Main Footer -->


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url('dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url('dashboard/lte/bootstrap/js/bootstrap.min.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('dashboard/lte/dist/js/app.min.js');?>"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
    </body>
</html>

    

    
 