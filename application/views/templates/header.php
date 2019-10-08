
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judul?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('')?>assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/manual/css/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/manual/css/buttons.dataTables.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/manual/css/jquery-ui.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <link rel="icon" href="<?php echo base_url()?>assets/manual/img/LogoDapurSunda.png" type="image/png/x-icon" sizes="360x360">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- jQuery 3 -->
  <script
  src="<?php echo base_url()?>assets/manual/js/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

  <!-- jQuery UI 1.11.4 -->
<div class="wrapper">
<script type="text/javascript" src="<?php echo base_url()?>assets/manual/js/datatables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
    <?php include("menu/navbar.php"); ?>

  <!-- Left side column. contains the logo and sidebar -->

    <?php include('menu/left-bar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">