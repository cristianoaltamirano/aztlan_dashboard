<?php
/**
 * Created by PhpStorm.
 * User: calta
 * Date: 31/3/2017
 * Time: 01:00
 */

?>

<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title>aztlan | dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/pages/css/login.min.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="<?php echo base_url(); ?>lib/img/logo-big.png" alt=""/> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" method="post" action="user_login_process">
        <h3 class="form-title font-green">Ingresar</h3>

        <?php
        if (isset($error_message)) {
            echo '<div class="alert alert-danger display-hide" style="display: block">';
            echo '<button class="close" data-close="alert"></button>';
            echo "<div class='error_msg'>";
            echo $error_message;
            $error_message = '';
            echo "</div>";
            echo "</div>";
        }else{
            echo '<div class="alert alert-danger display-hide">';
            echo '<button class="close" data-close="alert"></button>';
            echo '<span> Llena usuario y password. </span>';
            echo '</div>';
        }
        ?>


        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Usuario</label>
            <div id="error-user" class="hidden alert alert-danger" role="alert">Debes ingresar tu usuario</div>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                   placeholder="Usuario" name="username" id="user"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div id="error-pass" class="hidden alert alert-danger" role="alert">Debes ingresar un password</div>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="Password" name="password" id="password"/></div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">Ingresar</button>
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1"/>Recordar
                <span></span>
            </label>
        </div>
    </form>
    <!-- END LOGIN FORM -->
</div>
<div class="copyright">© 2017 Asociación Civil Aztlan, Centro Cultural de Psicología.</div>
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/pages/scripts/login.min.js" type="text/javascript"></script>

</body>

</html>
