<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>AuraSystems - Payroll</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="Aura Systems">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/skin/default_skin/css/theme.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>

            <!-- Begin: Content -->
            <section id="content">

                <div class="admin-form theme-info" id="login1">

                    <div class="row mb15 table-layout">

                        <div class="col-xs-12 va-m pln">
                            <a href="dashboard" title="Return to Dashboard">
                                <img src="<?=base_url()?>assets/assets/img/logos/logo_white.png" title="Aura Payroll" class="img-responsive w250">
                            </a>
                        </div>

               
                    </div>

                    <div class="panel panel-warning mt10 br-n">

                        <div class="panel-heading heading-border bg-white">
                          <?php echo validation_errors('<p class="error">'); ?>           
                        </div>

                        <!-- end .form-header section -->
                        <?php 
                            $attributes = array('class' => 'panel-body wrapper-lg bg-light p30');
                            echo form_open("Dashboard/login", $attributes); ?>
                        <div class="form-group">
                            <label for="email" class="field-label text-muted fs18 mb10">Email:</label>
                            <label for="email" class="field prepend-icon">
                                 <input type="email" placeholder="test@example.com" class="gui-input" id="email" name="email" value="" />
                                 <label for="email" class="field-icon"><i class="fa fa-envelope"></i></label>
                            </label>
                            
                        </div>
                        <div class="form-group">
                                
                               <label for="password" class="field-label text-muted fs18 mb10">Password:</label>
                               
                            <label for="password" class="field prepend-icon">
                                <input type="password" id="inputPassword" placeholder="Type Your password" class="gui-input" id="pass" name="pass" value="" />
                                <label for="password" class="field-icon"><i class="fa fa-lock"></i> </label>
                            </label>
                        </div>
                        <div class="panel-footer clearfix p10 ph15">
                            <button type="submit" class="button btn-warning mr10 pull-right">Sign In</button>
                            <label class="switch block switch-warning pull-left input-align mt10">
                                <input type="checkbox" name="remember" id="remember" checked>
                                <label for="remember" data-on="YES" data-off="NO"></label>
                                <span>Remember me</span>
                            </label>
                        </div>
                            <?php echo form_close(); ?>
                
                    </div>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?=base_url()?>assets/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?=base_url()?>assets/assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="<?=base_url()?>assets/assets/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/assets/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/assets/js/pages/login/TweenLite.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/assets/js/pages/login/login.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="<?=base_url()?>assets/assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/assets/js/main.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/assets/js/demo.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
            Demo.init();

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 3,
                    y: window.innerHeight / 4
                },
            });


        });
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>
