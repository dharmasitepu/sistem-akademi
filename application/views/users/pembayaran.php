        <style>
          .green{
            backgound-color: green;
          }
        </style>
        <?php if ($this->session->flashdata('berhasil')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
          data-judul="Data Mapel"></div>
        <?php } if ($this->session->flashdata('gagal')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
          data-judul="Data Mapel"></div>
        <?php } ?>
        <div class="right_col" role="main" style="min-height: 1098px;">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pembayaran PPDB</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <?= form_open_multipart(site_url('Users_pembayaran/insertPembayaran')); ?>
                    <div class="form-horizontal form-label-left" novalidate>
                      <p>Isikan data sesuai dengan data data Pembayaran yang Valid
                      </p>
                      <span class="section">Form Pembayaran</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">ID Pendaftaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input disabled type="text" class="form-control" value="<?= $user['id'] ?>">
                          <input style="display: none" name="id_ppdb" type="text" class="form-control" value="<?= $user['id'] ?>">
                        </div>
                      </div>
                      <div id="data_siswa">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label style="text-align: center; color: red" class="col-md-12 col-sm-12 col-xs-12" for="username">Masukkan keterangan yang benar !
                          </label>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Ket:</label><br>
                            <?php $i=1; $is=1; foreach ($getGelombang as $showGelombang) {
                              echo"<label> ".$showGelombang->nama." : Rp.".number_format($showGelombang->harga,0,'','.')." || ".$showGelombang->mulai."/".$showGelombang->akhir."</label><br>";
                              $gel[$is++] = $showGelombang->mulai;
                              $gel[$is++] = $showGelombang->akhir;
                              $harga[$i++] = $showGelombang->harga;
                            }
                            ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Gelombang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="display: none" name="gelombang" type="text" class="form-control" value="<?= (date('Y-m-d') <= $gel[2]) ? '1' : '2' ?>">
                          <input disabled type="text" class="form-control" value="<?= (date('Y-m-d') <= $gel[2]) ? '1' : '2' ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Biaya <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="display: none" type="text" class="form-control" value="<?= (date('Y-m-d') <= $gel[2]) ? $harga[1] : $harga[2] ?>">
                          <input disabled type="text" class="form-control" value="<?php $biaya = (date('Y-m-d') <= $gel[2]) ? $harga[1] : $harga[2]; echo'Rp. '.number_format($biaya,0,'','.') ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Pembayaran Rp.
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="jml_pembayaran" type="text" class="form-control" placeholder="Masukkan jumlah pembayaran anda" value="" required>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Bukti
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="bukti_pembayaran" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button id="send" type="submit" class="btn btn-success"><?= (isset($nama_mapel)) ? 'Ubah' : 'Submit' ?></button>
                        </div>
                      </div>
                    </div>
                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
                <div style="min-height: 50px" class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>
                        Menunggu
                        <span style="color: white;" class="badge bg-blue"><?= $numPendingPPDB ?></span>
                      </h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: block">
                      <p class="text-muted font-13 m-b-30">
                      <table style="font-size: 14px" id="datatables" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="90px">ID</th>
                            <th width="190px">Username</th>
                            <th>Telp</th>
                            <th width="140px">Gelombang</th>  
                            <th width="120px">Dibayarkan</th>
                            <th>Tgl Pembayaran</th>
                            <th width="55px">Bukti</th>
                          </tr>
                        </thead>
                          <tbody>
                          <?php 
                          $i = 1;
                          foreach ($getPendingPPDB as $showPPDB) { $i++; 
                          $kurang = ($showPPDB->harga)-($showPPDB->jml_pembayaran);
                          ?>
                          <tr>
                            <th><?= $showPPDB->id_ppdb ?></th>
                            <td><?= $showPPDB->username?></td>
                            <td>
                              <?= $showPPDB->telp ?>
                            </td>
                            <td><strong><?= $showPPDB->gelombang ?></strong> - <?= "Rp. " . number_format($showPPDB->harga,0,'','.') ?></td>
                            <td><?= "Rp. " . number_format($showPPDB->jml_pembayaran,0,'','.') ?></td>
                            <td><?= $showPPDB->tgl_pembayaran ?></td>
                            <td><button class="btn btn-warning btn-sm btn-bukti" data-foto="<?= $showPPDB->bukti_pembayaran ?>" data-id="<?= $showPPDB->id ?>" data-username="<?= $showPPDB->username ?>" data-tgl_pembayaran="<?= $showPPDB->tgl_pembayaran ?>">
                            <i class="fa fa-eye"></i> Lihat</button></td>
                          </tr>
                        <?php } ?>
                        <!-- Small modal -->
                        <div id="modalbukti" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel2">Bukti Pembayaran</h4>
                                </div>
                                <div class="modal-body">
                                  <span id="id_ppdb"></span>
                                  <span id="username_ppdb"></span>
                                  <p id="tgl_pembayaran"></p>
                                  <img id="imagess" style="margin: 0;width: 100%; height: 100% " 
                                  src="" alt="img">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- /modals -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
          </div>
          <div class="row">
                <div style="min-height: 50px" class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>
                        Status Pembayaran
                      </h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: block">
                    <p class="text-muted font-13 m-b-30">
                      <table style="font-size: 14px" id="datatables2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="90px">ID</th>
                            <th width="190px">Username</th>
                            <th>Telp</th>
                            <th width="140px">Gelombang</th>  
                            <th width="250px">Setoran</th>
                            <th width="120px">Kurang</th>
                            <th width="55px">Bukti</th>
                          </tr>
                        </thead>
                          <tbody>
                          <?php 
                          $i = 1;
                          foreach ($getStatusPPDB as $showStatusPPDB) { $i++; 
                          ?>
                          <tr>
                            <th><?= $showStatusPPDB->id ?></th>
                            <td><?= $showStatusPPDB->username?></td>
                            <td>
                              <?= $showStatusPPDB->telp ?>                              
                            </td>
                            <td><strong>
                              <?php if($show = $m_Administrasi->getTotalBayar($showStatusPPDB->id)->row()){
                                echo $show->gelombang."</strong> / Rp. " . number_format($show->harga,0,'','.');
                              } ?>
                            </td>
                            <td>
                            <?php
                              $kurangs = 0;
                              if($show = $m_Administrasi->getTotalBayar($showStatusPPDB->id)->result()){
                                $is = 0;
                                unset($totalbayar);
                                foreach ($show as $shows) {
                                  echo " &nbsp;Rp. " . number_format($shows->jml_pembayaran,0,'','.').' / '.$shows->tgl_pembayaran; ?><br>
                                  <?php
                                  $totalbayar[$is++]=$shows->jml_pembayaran;
                                  $hargas = $shows->harga;
                                }
                                $kurangst = $hargas - array_sum($totalbayar);
                                $kurangs = ($kurangst == 0) ? 'Lunas !' : $kurangs = $kurangst;
                              }
                              elseif ($kurangs == 0) {
                                $kurangs = 'Belum Bayar';
                              }
                              ?>
                            </td>
                            <td><?= (is_numeric($kurangs)) ? "Rp. " . number_format($kurangs,0,'','.') : $kurangs ?></td>
                            <td>
                            <?php
                              if($show = $m_Administrasi->getTotalBayar($showStatusPPDB->id)->result());
                              $is = 1;
                              foreach ($show as $shows) { ?>
                                <button class="btn btn-warning btn-sm btn-buktis" data-foto="<?= $shows->bukti_pembayaran ?>" data-id="<?= $showStatusPPDB->id ?>" data-username="<?= $showStatusPPDB->username ?>" data-tgl_pembayaran="<?= $shows->tgl_pembayaran ?>">
                                <i class="fa fa-eye"></i> Lihat</button>
                              <?php }
                              ?>
                            </td>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                        <!-- Small modal -->
                        <div id="modalbuktis" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel2">Bukti Pembayaran</h4>
                                </div>
                                <div class="modal-body">
                                  <span id="id_ppdb2"></span>
                                  <span id="username_ppdb2"></span>
                                  <p id="tgl_pembayaran2"></p>
                                  <img id="imagesss" style="margin: 0;width: 100%; height: 100% " 
                                  src="" alt="img">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- /modals -->
              </div>
            </div>
        </div>
        <script>
        $('.btn-bukti').on('click', function () {
            var id = $(this).data('id');
            var username = $(this).data('username');
            var tgl_pembayaran = $(this).data('tgl_pembayaran');
            var foto = $(this).data('foto');
            $('#modalbukti').modal();
            $('#id_ppdb').text('ID : '+id);
            $('#username_ppdb').text(', '+username);
            $('#tgl_pembayaran').text('Tanggal Pembayaran : '+tgl_pembayaran);
            $('#imagess').attr('src',"<?= base_url('build/images/bukti-pembayaran/ppdb/') ?>"+foto);
        });
        $('.btn-buktis').on('click', function () {
            var id = $(this).data('id');
            var username = $(this).data('username');
            var tgl_pembayaran = $(this).data('tgl_pembayaran');
            var foto = $(this).data('foto');
            $('#modalbuktis').modal();
            $('#id_ppdb2').text('ID : '+id);
            $('#username_ppdb2').text(', '+username);
            $('#tgl_pembayaran2').text('Tanggal Pembayaran : '+tgl_pembayaran);
            $('#imagesss').attr('src',"<?= base_url('build/images/bukti-pembayaran/ppdb/') ?>"+foto);
        })
        </script>
    <!-- validator -->
    <script src="<?= base_url() ?>vendors/validator/validator.js"></script>
    <!-- jquery.inputmask -->
    <script src="<?= base_url() ?>vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    
    
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
    <script>
      $(document).ready(function () {
        $("#datatables").DataTable({
          "language": {
            "lengthMenu": "_MENU_ Data per Halaman",
            "zeroRecords": "Maaf - Data tidak ditemukan",
            "search": "Cari Data : ",
            "info": "Menampilkan _START_ sampai _END_ dari _MAX_ data",
            "infoEmpty": "Tidak ada data dalam table ini",
            "infoFiltered": "(Pencarian dari _MAX_ data)",
            "paginate": {
              "previous": "Sebelumnya",
              "next": "Selanjutnya"
            }
          }
        });
      });
    </script>
    <script>
      $(document).ready(function () {
        $("#datatables2").DataTable({
          "language": {
            "lengthMenu": "_MENU_ Data per Halaman",
            "zeroRecords": "Maaf - Data tidak ditemukan",
            "search": "Cari Data : ",
            "info": "Menampilkan _START_ sampai _END_ dari _MAX_ data",
            "infoEmpty": "Tidak ada data dalam table ini",
            "infoFiltered": "(Pencarian dari _MAX_ data)",
            "paginate": {
              "previous": "Sebelumnya",
              "next": "Selanjutnya"
            }
          }
        });
      });
    </script>