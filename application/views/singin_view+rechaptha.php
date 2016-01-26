
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Authorization Access Only | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/plugins/iCheck/square/blue.css">
        <!--reCAPTCHA-->
         <script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a ><b>Authorize Access Only!</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

             <!--   <form action="#" method="post"> -->
             <?php echo form_open('login/check_auth');?>
                    <div class="form-group has-feedback">
                        <input name="user" type="text" class="form-control" placeholder="username" required/>
                        <span class="fa  fa-user  form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="pass" type="password" class="form-control" placeholder="password" required/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="g-recaptcha" data-sitekey="6LcfABUTAAAAAMVUvAQTGMm1zhMr9dq379_s1Spk"></div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-xs-4">
                         <!--   <button name="btnLogin" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>  -->
                         <input name="btnLogin" type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In"/>
                        </div>
                        <!-- /.col -->
                    </div>
                


            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url();?>dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url();?>dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url();?>dashboard/lte/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
        

    </body>
</html>





