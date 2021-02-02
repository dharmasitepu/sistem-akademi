<div class="right_col" role="main" style="min-height: 2098px;">
<?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Login Pendaftaran"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Login Pendaftaran"></div>
    <?php } ?>
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Calon Peserta PPDB</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Peserta</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li class="dropdown">
                        <a style="color: green" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Export <i class="fa fa-print"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a style="text-align: left" class="btn" href="<?= base_url() ?>settings/chat"><i style="color:green; font-weight: 500" class="fa fa-file-excel-o"></i> &nbsp;Export Excel</a></li>
                          <li><a style="text-align: left" class="btn" href="<?= base_url() ?>export/fullSiswa"><i style="color:green; font-weight: 500" class="fa fa-file-pdf"></i> &nbsp;Export PDF</a></li>
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
                    <p class="text-muted font-13 m-b-30">
                    <table style="font-size: 14px" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="100px">ID</th>
                          <th width="130px">Username</th>
                          <th>Email</th>
                          <th width="160px">Telp</th>
                          <th width="155px">Waktu Daftar</th>
                          <th width="155px">Waktu Update</th>
                          <th width="80px">Formulir</th>
                          <th width="90px">Status</th>
                          <th width="90px"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $i = 1;
                      foreach ($getPeserta as $showPeserta) { $i++; ?>
                        <tr>
                          <th><?= $showPeserta->id ?></th>
                          <td>
                          <?php echo $showPeserta->username; if($showPeserta->status == 'Disetujui'){ echo '<br>Kelas : <br>'.$this->DataKelas_m->showKelas($showPeserta->kelas)->nama_kelas;  ?> <a style="color: blue" data-toggle="modal" href="#kelas-<?= $showPeserta->id ?>"><i class="fa fa-edit"></i></a><?php } ?>
                          </td>
                          <td><?php echo $showPeserta->email; ?>
                          <!-- <?php if($showPeserta->status == 'Disetujui'){ echo '<br>Klmpk :';  ?><?php } ?> -->
                        </td>
                          <td>
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-2">
                                  <a href="<?= sendWhatsapp($showPeserta->telp) ?>" target="_blank" style="color: green; font-weight: 600; font-size: 18px; padding-left: 4px; button: none; margin: 0; background: transparent; border: none;">
                                    <i class="fab fa-whatsapp"></i>
                                  </a>
                                </div>
                                <div class="col-md-8">
                                  <?= $showPeserta->telp ?>                              
                                </div>
                              </div>  
                            </div>
                          </td>
                          <td><?= $showPeserta->waktu_daftar ?></td>
                          <td><?= $showPeserta->waktu_update ?></td>
                          <td style="padding: 8px 0 0 20px">
                            <?=
                              ($showPeserta->formulir == 'Belum') 
                              ? 'Belum' 
                              : '<a class="btn btn-warning btn-sm" href="'.base_url('ppdb/detail/'.$showPeserta->id).'" data-toggle="tooltip" data-placement="top" data-original-title="Lihat Data PPDB"><i class="fa fa-eye"></i></a>' ;
                            ?>
                          </td>
                          <td>
                            <?php
                              if ($showPeserta->status == 'Menunggu' && $showPeserta->formulir == 'Belum') {
                                echo 'Menunggu';
                              }
                              elseif ($showPeserta->status == 'Ditolak') {
                                echo 'Ditolak'; ?>
                                <div class="btn-group">
                                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#alasan-<?= $showPeserta->id ?>" type="button"><i class="fa fa-eye"></i></button>
                                  <a href="<?= base_url('ppdb/resetStatus/'.$showPeserta->id) ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Reset Aksi"><i class="fa fa-refresh"></i></a>
                                </div>
                                <?php
                              }
                              elseif($showPeserta->status == 'Disetujui'){ echo 'Disetujui'; ?>
                                <!-- <div class="btn-group">
                                  <a href="<?= base_url('ppdb/resetStatus/'.$showPeserta->id) ?>" style="width: 60px" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i></a>
                                </div> -->
                              <?php
                              }
                              else{
                            ?>
                            <div class="btn-group">
                              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#setuju-<?= $showPeserta->id ?>"><i class="fa fa-check"></i></button>
                              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tolak-<?= $showPeserta->id ?>" type="button"><i class="fa fa-close"></i></button>
                            </div>
                            <?php } ?>
                          </td>
                          <td>
                            <div class="btn-group">
                              <?php 
                                $sendPhone = str_replace("+", "%2B", $showPeserta->telp);
                              ?>
                              <a href="<?= site_url(); ?>ppdb/Peserta/?id=<?= $showPeserta->id ?>&username=<?= $showPeserta->username ?>&email=<?= $showPeserta->email ?>&telp=<?= $sendPhone ?>"
                                  class="btn btn-primary btn-sm" style="width: 30px" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data"><i class="fa fa-pencil"></i></a>
                              <a href="<?= site_url(); ?>ppdb/deleteLoginPPDB/<?php echo $showPeserta->id ?>"
                                  class="btn btn-danger btn-sm tombol-konfirm" style="float: left;"  data-toggle="tooltip" data-placement="top" data-original-title="Hapus Data"
                                  data-judul="Untuk menghapus Akun ?" data-konfirm="Yakin, Hapus Data !" style="width: 30px"><i
                                  class="fa fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                         <!-- Small modal -->
                         <div id="setuju-<?= $showPeserta->id ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel2">Pilih Kelas</h4>
                                </div>
                                <form method="post" action="<?= base_url('ppdb/setujuiPendaftar/'.$showPeserta->id) ?>">
                                <div class="modal-body">
                                  <p>Nis Siswa</p>
                                  <input required type="number" name="nis_lokal" class="form-control">
                                  <p>Pilih Kelas</p>
                                  <select class="form-control" name="kelas">
                                    <?php
                                      $getKelas = $this->db->order_by('nama_kelas','ASC')->get('tbl_kelas')->result();
                                      foreach ($getKelas as $showKelas) { ?>
                                      <option value="<?= $showKelas->id ?>"><?= $showKelas->nama_kelas.' - '.$this->db->get_where('tbl_siswa',['kelas' => $showKelas->id])->num_rows().' Siswa' ?></option>
                                      <?php } ?>
                                  </select>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Masukkan Siswa</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- /modals -->
                        <!-- Small modal -->
                        <div id="tolak-<?= $showPeserta->id ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                            <?= form_open_multipart('ppdb/tolakPendaftar/'.$showPeserta->id); ?>
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Tolak Pendaftar</h4>
                              </div>
                              <div class="modal-body">
                                <p>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $showPeserta->id ?></p>
                                <p>Nama : <?= $showPeserta->name ?></p><hr>
                                <p>Alasan Ditolak.</p>
                                <input name="alasan" type="text" class="form-control">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Tolak Pendaftar</button>
                              </div>
                            <?= form_close(); ?>
                            </div>
                          </div>
                        </div>
                        <!-- /modals -->
                        <!-- Small modal -->
                        <div id="alasan-<?= $showPeserta->id ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Pendaftaran Ditolak</h4>
                              </div>
                              <div class="modal-body">
                                <p>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $showPeserta->id ?></p>
                                <p>Nama : <?= $showPeserta->name ?></p><br>
                                <p>Alasan : <?= $showPeserta->alasan ?></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /modals -->
                        <?php if($showPeserta->status == 'Disetujui'){  ?>
                          <!-- Small modal -->
                          <div id="kelas-<?= $showPeserta->id ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel2">Pilih Kelas</h4>
                                </div>
                                <form method="post" action="<?= base_url('ppdb/updateKelas/'.$showPeserta->nis) ?>">
                                <div class="modal-body">
                                  <p>Pilih Kelas</p>
                                  <select class="form-control" name="kelas">
                                    <?php
                                      $getKelas = $this->db->order_by('nama_kelas','ASC')->get('tbl_kelas')->result();
                                      foreach ($getKelas as $showKelas) { ?>
                                      <option <?= ($showKelas->id == $showPeserta->kelas) ? 'selected' : NULL ?> value="<?= $showKelas->id ?>"><?= $showKelas->nama_kelas ?> - (<?= $this->db->get_where('tbl_siswa',['kelas' => $showKelas->id])->num_rows(); ?>) Siswa</option>
                                      <?php } ?>
                                  </select>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Ganti Kelas</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- /modals -->
                        <?php }
                      } ?>
                      </tbody>
                    </table>
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