<div class="right_col" role="main">
    <?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Guru"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Guru"></div>
    <?php } ?>
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Guru</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Data Guru</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <a style="color: green" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Export to Excel <i class="fa fa-file-excel-o"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <!-- <li><a style="text-align: left" class="btn" href="<?= site_url('settings/chat') ?>"><i style="color:green; font-weight: 500" class="fa fa-file-excel-o"></i> &nbsp;Export Data Singkat</a></li> -->
                          <li><a style="text-align: left" class="btn" href="<?= site_url('export/fullGuru') ?>"><i style="color:green; font-weight: 500" class="fa fa-table"></i> &nbsp;Export Data Lengkap</a></li>
                        </ul>
                      </li> 
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a style="text-align: left" class="btn" href="<?= site_url('settings/chat') ?>"><i style="color:green; font-weight: 500" class="fab fa-whatsapp"></i> &nbsp;Costum Chat</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                        <a href="<?= site_url('guru/form') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i>&nbsp; Tambah Data Guru</a>
                        <a href="<?= site_url('ImportGuru') ?>" class="btn btn-success"><i class="fas fa-file-import"></i>&nbsp; Import Data Guru</a>
                        <br><br>
                      </div>
                      <div class="clearfix"></div>
                      <?php $i = 1; foreach ($getGuru as $showGuru) {  ?>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><b><i>No : <?= $i++ ?></i><span style="position: absolute; right: 25px; " text-align="right"><?= $showGuru->nip ?></b></span></h4>
                            <div class="left col-md-7 col-xs-12">
                              <h2><?= $showGuru->nama_guru ?></h2>
                              <p><strong></strong> <?= $showGuru->jenis_ptk ?> / <?= $showGuru->jenjang_pendidikan ?><br><?= $showGuru->agama ?> / <?= $showGuru->jk ?></p>
                              <ul class="list-unstyled">
                                <li><a href="<?= sendWhatsapp($showGuru->no_hp) ?>" target="_blank" style="color: green; font-weight: 600; font-size: 18px; padding: 4px 0 0 0px; margin: 0; background: transparent; border: none; width: 20px; height: 20px;">
                                    <i class="fab fa-whatsapp"></i>
                                  </a> <?= $showGuru->no_hp ?> </li>
                                <li><i style="font-size: 22px" class="fa fa-home"></i> <?= $showGuru->alamat ?> </li>
                              </ul>
                            </div>
                            <div class="right col-md-5 col-xs-12 text-center">
                              <img style="border-radius: 0;height: 145px; width: 135px" src="<?= base_url('build/images/guru/').$showGuru->foto ?>" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div style="padding-right: 20px; float: right" class="col-xs-12 col-sm-5 emphasis">
                              <button style="width: 100%" type="button" data-toggle="modal" data-target="#photo-<?= $showGuru->nip ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-user-edit"> </i> Ubah Foto
                              </button>
                            </div>
                            <div style="float: right" class="col-xs-12 col-sm-7 emphasis">
                              <div class="btn-group">
                                <?php 
                                  $sendPhone = str_replace("+", "%2B", '');
                                ?>
                                <a href="<?= site_url('export/fullGuru/' . $showGuru->nip); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Export Data to Excel"
                                    class="btn btn-success btn-sm" style="width: 35px"><i class="fa fa-file-excel-o"></i></a>
                                <a href="<?= site_url('guru/form/' . $showGuru->nip); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data Guru"
                                    class="btn btn-primary btn-sm" style="width: 35px"><i class="fa fa-pencil"></i></a>
                                <a href="<?= site_url('guru/detailGuru/' . $showGuru->nip); ?> " data-toggle="tooltip" data-placement="top" data-original-title="Lihat lebih Lengkap"
                                    class="btn btn-warning btn-sm" style="float: left;width: 35px"><i
                                    class="fa fa-eye"></i></a>
                                <a href="<?= site_url('guru/deleteGuru/'.$showGuru->nip.'/'.$showGuru->foto) ?>" data-toggle="tooltip" data-placement="top" data-original-title="Hapus Data Guru"
                                    class="btn btn-danger btn-sm tombol-konfirm" style="float: left;width: 35px"
                                    data-judul="Untuk menghapus Akun ?" data-konfirm="Yakin, Hapus Data !"><i
                                    class="fa fa-trash"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Small modal -->
                        <div id="photo-<?= $showGuru->nip ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                            <?= form_open_multipart('guru/updatePhoto/'.$showGuru->nip.'/'.$showGuru->foto); ?>
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Ganti Foto</h4>
                              </div>
                              <div class="modal-body">
                                <p>Nis &nbsp;&nbsp;&nbsp;&nbsp;: <?= $showGuru->nip ?></p>
                                <p>Nama : <?= $showGuru->nama_guru ?></p>
                                <p>Foto &nbsp;&nbsp;: <?php echo $showGuru->foto ?>
                                <?php 
                                  if(($showGuru->foto != 'default-male.jpg') && ($showGuru->foto != 'default-female.jpg')) { ?> 
                                  <a class="tombol-konfirm" style="color: red" href="<?= site_url('guru/deleteFoto/'.$showGuru->nip.'/'.$showGuru->jk.'/'.$showGuru->foto) ?>"
                                    data-judul="Untuk menghapus Foto ?" data-konfirm="Yakin, Hapus Foto !">
                                  Hapus</a>
                                  <?php } ?>
                                </p><br>
                                <p>Format jpg/png/jpeg. Maks size 2Mb.</p>
                                <input name="nama" type="text" hidden value="<?= $showGuru->nama_guru ?>">
                                <input type="file" name="foto_guru" required="required" class="form-control col-md-7 col-xs-12"><br><br>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Hapus Foto</button> -->
                                <button type="submit" class="btn btn-primary">Ganti Foto</button>
                              </div>
                            <?= form_close(); ?>
                            </div>
                          </div>
                        </div>
                        <!-- /modals -->
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>