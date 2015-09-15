<!DOCTYPE html>
<html>
<head>
    <title>Sing - Login</title>
    <link href="<?php echo base_url(); ?>assets/css/application.min.css" rel="stylesheet">
    <!-- as of IE9 cannot parse css files with more that 4K classes separating in two files -->
    <!--[if IE 9]>
    <link href="<?php echo base_url(); ?>assets/css/application-ie9-part2.css" rel="stylesheet">
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
         chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
         https://code.google.com/p/chromium/issues/detail?id=332189
         */
    </script>
</head>
<body class="login-page">

<div class="container">
    <main id="content" class="widget-login-container" role="main">
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-10 col-lg-offset-4 col-sm-offset-3 col-xs-offset-1">
                <h4 class="widget-login-logo animated fadeInUp">
                    <i class="fa fa-circle text-gray"></i>
                    Optimise Hotspot
                    <i class="fa fa-circle text-warning"></i>
                </h4>
                <section class="widget widget-login animated fadeInUp">
                    <header>
                        <h3>Login op Optimise Hotspot</h3>
                    </header>
                    <div class="widget-body">
                        <p class="widget-login-info">
                            Login met uw gebruikersnaam of email!
                        </p>
                        <form class="login-form mt-lg" action="<?php echo site_url('Login/signIn'); ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="user" placeholder="Gebruikersnaam">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="pswd" type="password" name="password" placeholder="Wachtwoord">
                            </div>
                            <?php if(!empty($error)){
                                if($error == 1){ ?>
                                    <p style="color: red">Foutieve gebruikersnaam!</p>
                                <?php }elseif($error == 2){ ?>
                                    <p style="color: red">Foutief wachtwoord!</p>
                                <?php }elseif($error == 3){ ?>
                                    <p style="color: red">Gebruiker geblokkeerd!</p>
                                    <p>Indien u vragen heeft kan u altijd contact opnemen met de administrator.</p>
                                <?php }
                            } ?>
                            <div class="clearfix">
                                <div class="btn-toolbar pull-right">
                                    <button type="submit" class="btn btn-inverse btn-sm">Aanmelden</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <footer class="page-footer">
        2015 &copy; Optimise Hotspot.
    </footer>
</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/widgster/widgster.js"></script>

<!-- common app js -->
<script src="<?php echo base_url(); ?>assets/js/settings.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>

<!-- page specific libs -->
<!-- page specific js -->
</body>
</html>