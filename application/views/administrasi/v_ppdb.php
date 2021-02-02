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
                <h3>Pembayaran PPDB</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
              <div class="row">
                <div style="min-height: 50px" class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>
                        Pembayaran Belum Di Konfirmasi
                        <span style="color: white;" class="badge bg-blue"><?= $numPendingPPDB ?></span>
                      </h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <div class="x_content" style="display: none">
                      <p class="text-muted font-13 m-b-30">
                      <table style="font-size: 14px" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="90px">ID</th>
                            <th width="190px">Username</th>
                            <th>Telp</th>
                            <th width="140px">Gelombang</th>  
                            <th width="120px">Dibayarkan</th>
                            <th>Tgl Pembayaran</th>
                            <th width="120px">Sisa</th>
                            <th width="55px">Bukti</th>
                            <th width="120px"></th>
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
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-2">
                                    <a href="<?= sendWhatsapp($showPPDB->telp) ?>" target="_blank" style="color: green; font-weight: 600; font-size: 18px; padding: 0 4px">
                                      <i class="fab fa-whatsapp"></i>
                                    </a>
                                  </div>
                                  <div class="col-md-8">
                                    <?= $showPPDB->telp ?>                              
                                  </div>
                                </div>  
                              </div>
                            </td>
                            <td><strong><?= $showPPDB->gelombang ?></strong> - <?= "Rp. " . number_format($showPPDB->harga,0,'','.') ?></td>
                            <td><?= "Rp. " . number_format($showPPDB->jml_pembayaran,0,'','.') ?></td>
                            <td><?= $showPPDB->tgl_pembayaran ?></td>
                            <td><?= "Rp. " . number_format($kurang,0,'','.') ?></td>
                            <td><button class="btn btn-warning btn-sm btn-bukti" data-foto="<?= $showPPDB->bukti_pembayaran ?>" data-id="<?= $showPPDB->id ?>" data-username="<?= $showPPDB->username ?>" data-tgl_pembayaran="<?= $showPPDB->tgl_pembayaran ?>">
                            <i class="fa fa-eye"></i> Lihat</button></td>
                            <td>
                              <div class="btn-group">
                                <a href="<?= site_url('administrasi/aprovePendingPPDB/'.$showPPDB->id_pending) ?>"
                                    class="btn btn-success btn-sm" style="width: 30px"><i class="fa fa-check"></i></a>
                                <a href="<?= site_url(); ?>administrasi/deletePendingPPDB/<?= $showPPDB->id_pending ?>"
                                    class="btn btn-danger btn-sm tombol-konfirm" style="float: left;"
                                    data-judul="Untuk menghapus Pembayaran ?" data-konfirm="Yakin, Hapus Data !" style="width: 30px"><i
                                    class="fa fa-close"></i></a>
                              </div>
                            </td>
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
            <div class="clearfix"></div>
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
                    <div class="x_content" style="display: block">
                    <a href="<?= site_url('administrasi/pembayaranPPDB') ?>" class="btn btn-success"><i class="fa fa-dollar"></i> Lakukan Pembayaran PPDB</a>
                    <a href="<?= site_url('administrasi/BiayaPPDB') ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Ganti Biaya PPDB</a>
                      <p class="text-muted font-13 m-b-30">
                      <table style="font-size: 14px" id="datatable-responsives" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="90px">ID</th>
                            <th width="190px">Username</th>
                            <th width="100px">Telp</th>
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
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-1">
                                    <a href="<?= sendWhatsapp($showStatusPPDB->telp) ?>" target="_blank" style="color: green; font-weight: 600; font-size: 18px; padding: 0">
                                    <i class="fab fa-whatsapp"></i>
                                    </a>
                                  </div>
                                  <div class="col-md-8">
                                    <?= $showStatusPPDB->telp ?>                              
                                  </div>
                                </div>  
                              </div>
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
                                  echo " &nbsp;Rp. " . number_format($shows->jml_pembayaran,0,'','.').' / '.$shows->tgl_pembayaran; ?>
                                     <a href="<?= site_url(); ?>administrasi/deleteStatusPPDB/<?= $shows->id_status.'/'.$shows->bukti_pembayaran ?>" class="red tombol-konfirm" style="float: left;"
                                    data-judul="Untuk menghapus Pembayaran ?" data-konfirm="Yakin, Hapus Data !" style="width: 30px"><i
                                    class="fa fa-trash"></i></a>
                                     <a href="<?= site_url(); ?>ExportPdf/kwitansiPPDB/<?= $shows->id_status ?>" class="green" style="float: left; margin-left: 10px"><i
                                    class="fa fa-print"></i></a><br>
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
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
    
    <!-- Datatables -->
    <script src="<?= base_url() ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url() ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url() ?>vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>vendors/pdfmake/build/vfs_fonts.js"></script>
    <script>
      $('#datatable-responsives').DataTable();
    </script>