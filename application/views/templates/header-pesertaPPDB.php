<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="<?= base_url('build/images/').$dataSekolah->logo ?>" type="image/ico" />

    <title><?= $title.'&nbsp; | &nbsp;'.$dataSekolah->nama_sekolah?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>vendors/fontawesome5/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url() ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?= base_url() ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    
    <link href="<?= base_url() ?>vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>


    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>build/css/custom.min.css" rel="stylesheet">
    
    
    <!-- jQuery -->
    <script src="<?= base_url() ?>vendors/jquery/dist/jquery.min.js"></script>
    
    <!-- PNotify -->
    <link href="<?= base_url() ?>vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?= base_url() ?>vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?= base_url() ?>vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    
  </head>
  <body class="nav-md">
  
  <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" style="overflow: visible;"><div id="mCSB_1" class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position: relative; top: 0px; left: 0px;" dir="ltr">
          <div class="left_col scroll-view">
          <div style="height: 50px" class="navbar nav_title" style="border: 0;">
              <a style="height: 100%; font-size: 17px; line-height: 20px; padding-top: 10px" href="<?= site_url('') ?>" class="site_title"><span><?= $dataSekolah->nama_sekolah ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url('build/images/users/'.$user['image'])?>" alt="..." class="img-circle profile_img mCS_img_loaded">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $user['name'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section active">
                <h3>Master</h3>
                <ul class="nav side-menu" style="">
                  <li class="<?= ($title == 'Dashboard PPDB') ? 'active' : NULL ; ?>"><a href="<?= site_url('users') ?>"><i class="fa fa-home"></i>Dashboard</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <?php if ($user['status'] != 'Ditolak') { ?>
                  <li class="<?= ($title == 'Pembayaran PPDB') ? 'active' : NULL ; ?>"><a href="<?= site_url('users_pembayaran') ?>"><i class="fa fa-dollar"></i>Pembayaran</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <li class="<?= ($title == 'Form PPDB') ? 'active' : NULL ; ?>"><a href="<?= site_url('users_form') ?>"><i class="fa fa-file"></i><strong>Form ( W A J I B )</strong></a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <li class="<?= ($title == 'Profile PPDB') ? 'active' : NULL ; ?>"><a href="<?= site_url('users_profile') ?>"><i class="fa fa-user"></i>Profile</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <?php } ?>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a style="width: 100%" data-toggle="tooltip" data-placement="top" href="<?= base_url('auth/logout') ?>" data-original-title="Logout">
                <span class="fas fa-sign-out-alt" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div></div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 0px; max-height: 494px; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url('build/images/users/'.$user['image'])?>" alt=""><?= $user['username'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?= base_url('users_profile') ?>"> Profile</a></li>
                    <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
