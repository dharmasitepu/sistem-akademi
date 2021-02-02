<div class="right_col" role="main" style="min-height: 2098px;">
    <?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Akun"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Akun"></div>
    <?php } ?>
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Akun</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Master Data Akun</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?= site_url('Akun/addAccount') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Akun Baru</a>
                    <p class="text-muted font-13 m-b-30">
                      <?php $i = 1;
                      foreach ($getAkun as $show) { ?>
                        <div style="float: left" class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><b><i>No : <?= $i++ ?></i><span style="position: absolute; right: 25px; " text-align="right"><?= $show->role ?></span></b></h4>
                            <div class="left col-md-7 col-xs-12">
                              <h2><?= $show->username ?></h2>
                              <p><?= $show->name ?></p>
                              <p><?= $show->email ?></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-phone"></i> <?= $show->telp ?> </li>
                                </ul>
                              <p>Status : <?= ($show->active == 1) ? '<i class="fa fa-check green"></i> Aktif' : '<i class="fa fa-close red"></i> Nonaktif'; ?></p>
                              <?php if ($show->role_id == 4) { ?>
                              <p>NIP : <?= (empty($show->nip)) ? '<a style="width: 100%" data-toggle="modal" href="#addNip-'.$show->username.'">
                                <i class="fas fa-plus"> </i> Add NIP
                              </a>' : $show->nip.'<a class="red" href="'.base_url("akun/deleteNip/".$show->nip).'">
                              <i class="fas fa-trash"> </i>
                            </a>' ?></p>
                              <?php } ?>
                            </div>
                            <div class="right col-md-5 col-xs-12 text-center">
                              <img style="border-radius: 0;height: 145px; width: 135px" src="<?= base_url('build/images/users/'.$show->image) ?>" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div style="padding-right: 20px; float: right" class="col-xs-12 col-sm-5 emphasis">
                            <?php if ($show->username != 'admin') { ?>
                              <button style="width: 100%" type="button" data-toggle="modal" data-target="#changePass-<?= $show->username ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"> </i> Ubah Password
                              </button>
                            <?php } ?>
                            </div>
                            <div style="float: right" class="col-xs-12 col-sm-7 emphasis">
                              <div class="btn-group">
                              <?php if ($show->username != 'admin') { 
                                 if ($show->active == 1) {
                                ?>
                                <a href="<?= base_url('akun/nonaktifkanAkun/'.$show->username) ?>" class="btn btn-primary btn-sm" style="width: 100px"><i class="fa fa-close"></i> Nonaktifkan</a>
                                <?php
                                 }
                                else{
                                ?>
                                <a href="<?= base_url('akun/aktifkanAkun/'.$show->username) ?>" class="btn btn-primary btn-sm" style="width: 100px"><i class="fa fa-check"></i> Aktifkan</a>
                                <?php } ?>
                                <a href="<?= base_url('akun/hapusAkun/'.$show->username) ?>" class="btn btn-danger btn-sm tombol-konfirm" style="float: left;width: 80px" data-judul="Untuk menghapus Akun ?" data-konfirm="Yakin, Hapus Data !"><i class="fa fa-trash"></i> Delete</a>
                            <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Small modal -->
                        <div id="changePass-<?= $show->username ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                            <?= form_open_multipart('Akun/changePass/'.$show->username); ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Ganti Password</h4>
                            </div>
                            <div class="modal-body">
                                <p>Password Baru</p>
                                <input type="password" name="passbaru" class="form-control">
                                <p>Konfirmasi Password</p>
                                <input type="password" name="konfirmpass" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ganti Password</button>
                            </div>
                            <?= form_close(); ?>
                            </div>
                        </div>
                        </div>
                    <!-- /modals --> 
                    <?php if ($show->role_id == 4) { ?>
                      <!-- Small modal -->
                        <div id="addNip-<?= $show->username ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                            <?= form_open_multipart('Akun/addNip/'.$show->username); ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Tambahkan NIP</h4>
                            </div>
                            <div class="modal-body">
                                <p>Masukkan NIP Valid</p>
                                <input type="text" name="nip" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Tambah Nip</button>
                            </div>
                            <?= form_close(); ?>
                            </div>
                        </div>
                        </div>
                    <!-- /modals --> 

                    <?php }
                    } ?>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    
    <!-- Datatables -->
    <script src="<?= base_url() ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    
