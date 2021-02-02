<?php  
$user = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array();
$uri = $this->uri->segment(1);
if($this->uri->segment(2)){
  $uri .= '/'.$this->uri->segment(2);
  if($this->uri->segment(3)){
    $uri .= '/'.$this->uri->segment(3);
    if($this->uri->segment(4)){
      $uri .= '/'.$this->uri->segment(4);
    }
  }
}
?>
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
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
              <a style="height: 100%; font-size: 17px; line-height: 20px; padding-top: 10px" href="<?= site_url('') ?>" class="site_title"><span><?= $dataSekolah->nama_sekolah ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img style="width: 60px; height: 60px" src="<?= ($this->session->userdata('role_id') != 5) ? base_url('build/images/users/'.$user['image']) : base_url('build/images/users/default-male.jpg') ?>
                " alt="..." class="img-circle profile_img mCS_img_loaded">
              </div>
              <div class="profile_info">
                <span>Selamat datang,</span><?php
                if ($this->session->userdata('role_id') != 5) { ?>
                <h2><?= $user['name'] ?></h2>
                <?php }
                else{ ?>
                <h2><?= $this->session->userdata('username') ?></h2>
                <?php } ?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br>

            <!-- sidebar menu -->
            <div style="margin-top: -20px" id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section active">
                <ul class="nav side-menu" style="">
                <?php
                if ($this->session->userdata('role_id') == 5) { ?>
                <li class="<?= ($title == 'Files') ? 'active' : NULL ; ?>"><a href="<?= site_url('FileSiswa') ?>"><i class="fa fa-file-alt"></i> Files</a>
                  <ul class="nav" style="display: block;">
                  </ul>
                </li>
                <?php }else{
                if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) {
                ?>
                  <li class="<?= ($title == 'Dashboard') ? 'active' : NULL ; ?>"><a href="<?= site_url('home') ?>"><i class="fa fa-home"></i>Dashboard</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <li><a><i class="fa fa-graduation-cap"></i>Guru<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('guru/form') ?>"><i class="fa fa-plus"></i> Tambah Guru</a></li>
                      <li><a href="<?= site_url('guru') ?>"><i class="fa fa-list-ul"></i> Data Guru</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder"></i>PPDB<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('ppdb/pengumuman') ?>"><i class="fa fa-home"></i> Dashboard PPDB</a></li>
                      <li><a href="<?= site_url('ppdb/peserta') ?>"><i class="fa fa-plus"></i> Tambah Calon Peserta</a></li>
                      <li><a href="<?= site_url('ppdb') ?>"><i class="fa fa-folder-open"></i> Data Calon Peserta</a></li>
                      <!-- <li><a href="<?= site_url('ppdb/kelompok') ?>"><i class="fa fa-list"></i> Kelompok PPDB</a></li> -->
                    </ul>
                  </li>
                  <?php } 
                  if ($this->session->userdata('role_id') == 4) {
                    $nip  = $this->db->get_where('tbl_login',['username' => $this->session->userdata('username')])->row()->nip;
                    if ($nip != NULL) { ?>
                      <li class="<?= ($title == 'Absen') ? 'active' : NULL ; ?>"><a href="<?= site_url('absen') ?>"><i class="fa fa-calendar"></i>Absen</a>
                        <ul class="nav" style="display: block;">
                        </ul>
                      </li>
                    <?php
                    } ?>
                    <li class="<?= ($title == 'Files') ? 'active' : NULL ; ?>"><a href="<?= site_url('Files/private') ?>"><i class="fa fa-file-alt"></i> Files</a>
                      <ul class="nav" style="display: block;">
                      </ul>
                    </li>
                    <?php
                  }
                  else { ?>
                  <li class="<?= ($title == 'Absen') ? 'active' : NULL ; ?>"><a href="<?= site_url('absen') ?>"><i class="fa fa-calendar"></i>Absen</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <?php }
                  if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) {
                  ?>
                  <li><a><i class="fa fa-users"></i>Siswa<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('siswa/form') ?>"><i class="fa fa-user-plus"></i> Tambah Siswa</a></li>
                      <li><a href="<?= site_url('siswa/') ?>"><i class="fa fa-table"></i> Data Siswa</a></li>
                    </ul>
                  </li>
                  <li class="<?= ($title == 'Kelas') ? 'active' : NULL ; ?>"><a href="<?= site_url('kelas') ?>"><i class="fa fa-file-alt"></i>Kelas</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <li><a><i class="fa fa-th-list"></i>Mata Pelajaran<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('mapel/form') ?>"><i class="fa fa-plus"></i> Tambah Mapel</a></li>
                      <li><a href="<?= site_url('mapel') ?>"><i class="fa fa-table"></i> Data Mapel</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-dollar"></i>Administrasi<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('administrasi/ppdb') ?>"><i class="fa fa-list-alt"></i> PPDB</a></li>
                      <li><a href="<?= site_url('administrasi/spp') ?>"><i class="fa fa-money"></i> SPP</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file"></i>Files<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('Files/umum') ?>"><i class="fa fa-users"></i> Umum</a></li>
                      <li><a href="<?= site_url('Files/private') ?>"><i class="fa fa-th-list"></i> Private</a></li>
                    </ul>
                  </li>
                  <li class="<?= ($title == 'Profile') ? 'active' : NULL ; ?>"><a href="<?= site_url('profile') ?>"><i class="fa fa-users"></i>Profile Sekolah</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <?php } 
                  if ($this->session->userdata('role_id') == 1) {
                  ?>
                  <li class="<?= ($title == 'Data Akun') ? 'active' : NULL ; ?>"><a href="<?= site_url('akun') ?>"><i class="fas fa-users-cog"></i> &nbsp; Akun Login</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <?php } ?>
                  <li class="<?= ($title == 'Profil Akun') ? 'active' : NULL ; ?>"><a href="<?= site_url('profil_akun') ?>"><i class="fa fa-user"></i>Profil</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                  <?php
                  if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) {
                  ?>
                  <li><a><i class="fa fa-gears"></i>Landing Page<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('LandingPage/kelas') ?>"><i class="fa fa-file-alt"></i> Kelas</a></li>
                      <li><a href="<?= site_url('LandingPage/alumni') ?>"><i class="fa fa-users"></i> Alumni</a></li>
                      <li><a href="<?= site_url('LandingPage/kelebihan') ?>"><i class="fa fa-check"></i> Kelebihan</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-gear"></i>Setting & Aktivitas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('Settings') ?>"><i class="fa fa-gears"></i> Setting</a></li>
                      <li><a href="<?= site_url('history/user') ?>"><i class="fa fa-history"></i> History Login</a></li>
                      <li><a href="<?= site_url('history/aktivitas') ?>"><i class="fa fa-history"></i> History Kegiatan</a></li>
                    </ul>
                  </li>
                  <?php }} ?>
                  <li><a href="<?= site_url('download/file/umum/Sistem_Akademi_1_1.0.apk') ?>"><i class="fas fa-download"></i> &nbsp; Download APK</a>
                    <ul class="nav" style="display: block;">
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <?php
                if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) {
              ?>
              <a style="width: 50%" data-toggle="tooltip" data-placement="top" href="<?= base_url('BackupDB/db/'.$uri) ?>" data-original-title="Backup DB">
                <span class="fas fa-database" aria-hidden="true"></span>
              </a>
              <?php } ?>
              <a style="width: <?= ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) ?'50%' : '100%' ?>" data-toggle="tooltip" data-placement="top" href="<?= base_url('auth/logout') ?>" data-original-title="Logout">
                <span class="fas fa-sign-out-alt" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
      </div>
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
                    <?php
                      if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) {
                    ?>
                    <li><a href="<?= base_url('BackupDB/db') ?>"><i class="fa fa-database pull-right"></i> Backup Database</a></li>
                    <?php } ?>
                    <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
