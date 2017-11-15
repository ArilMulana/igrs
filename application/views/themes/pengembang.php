<!doctype html>
<html>
  <head>
   <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="icon" href="<?php echo base_url('assets/images/logoRK.png')?>" type="png" sizes="16x16">
  <title><?php echo $title; ?></title>

  <?php
  /** -- Copy from here -- */
  if(!empty($meta))
  foreach($meta as $name=>$content){
    echo "\n\t\t";
    ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
       }
  echo "\n";

  if(!empty($canonical))
  {
    echo "\n\t\t";
    ?><link rel="canonical" href="<?php echo $canonical?>" /><?php
  }
  echo "\n\t";

  foreach($css as $file){
    echo "\n\t\t";
    ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
  } echo "\n\t";

  foreach($js as $file){
      echo "\n\t\t";
      ?><script src="<?php echo $file; ?>"></script><?php
  } echo "\n\t";
  ?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" type="text/css" />
<style type="text/css">
 .navbar-nav>.user-menu>.dropdown-menu>li.user-header {
    height: auto;
    padding: 10px;
    text-align: center;
}

.navbar-nav > .user-menu > .dropdown-menu {
  border-top-right-radius: 0;
  border-top-left-radius: 0;
  padding: 1px 0 0 0;
  border-top-width: 0;
  width: 280px;
}
</style>
</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" ><img src="<?php echo base_url('assets/bukalapak.jpg')?>" style="width: 80%;height: 50%;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>IGRS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $sesdat['nama_pemilik']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg')?>"  class="img-circle" alt="User Image">

                <p>
                  <?php echo $sesdat['nama_pemilik']; ?>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $sesdat['nama_pemilik']; ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?php echo site_url('pengembang/permainan'); ?>">
            <i class="fa fa-book"></i>
            <span>Permainan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('pengembang/profil'); ?>"> 
            <i class="fa fa-book"></i>
            <span>Profil Perushaan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('home'); ?>"> 
            <i class="fa fa-home"></i>
            <span>Halaman Depan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Keluar</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Boxed</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Tip!</h4>
        <p>Add the layout-boxed class to the body tag to get this layout. The boxed layout is helpful when working on
          large screens because it prevents the site from stretching very wide.</p>
      </div>
      <!-- Default box -->
      <?= $output;?>
      <!-- /.box -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Default Web Division &copy; <?php echo date("Y");?></strong> All rights
    reserved.
  </footer>
</div>

<script type="text/javascript" src="<?= base_url()?>assets/dist/js/app.min.js"></script>

</body>
</html>

