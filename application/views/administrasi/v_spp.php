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
                <h3>Pembayaran SPP</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lakukan Pembayaran </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form method="post" action="<?= site_url('administrasi/showPembayaran')?>" class="form-horizontal form-label-left" novalidate>
                      <br><br>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="kelas" name="kelas" class="form-control">
                              <?php foreach ($getKelas as $showKelas) { ?>
                                  <option value="<?= $showKelas->id ?>"><?= $showKelas->nama_kelas ?></option>
                              <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Tahun <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="tahun" name="tahun" class="form-control">
                              <?php for($tahun = date('Y') - 2; $tahun <= date('Y') + 1; $tahun++){ ?>
                                  <option value="<?= $tahun ?>" <?= ($tahun == date('Y')) ? 'selected' : NULL ?>><?= $tahun ?></option>
                              <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
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
                        Riwayat Pembayaran
                        <span style="color: white;" class="badge bg-blue"><?= $numHistorySPP ?></span>
                      </h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <a href="<?= site_url('Administrasi/BiayaSPP') ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Ganti Biaya SPP</a>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: block">
                      <p class="text-muted font-13 m-b-30">
                      <table style="font-size: 14px" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="90px">#</th>
                            <th width="250px">NIS ~ Nama</th>
                            <th>Kelas</th>
                            <th>Pembayaran</th>
                            <th>Dibayarkan</th>
                            <th>Tgl Pembayaran</th>
                            <th width="110px"></th>
                          </tr>
                        </thead>
                          <tbody>
                          <?php 
                          $i = 1;
                          foreach ($getHistorySPP as $showPPDB) {
                          ?>
                          <tr>
                            <th><?= $i++ ?></th>
                            <td><?= $showPPDB->nis_spp.'<br>'.$showPPDB->nama_siswa ?></td>
                            <td><?= $showPPDB->nama_kelas ?></td>
                            <td><?= 'Bulan : '.$showPPDB->bulan.'<br> Tahun : '.$showPPDB->tahun ?></td>
                            <td><?= "Rp. " . number_format($showPPDB->jml_pembayaran,0,'','.') ?></td>
                            <td><?= $showPPDB->tgl_pembayaran ?></td>
                            <td>
                              <div class="btn-group">
                                <a href="<?= site_url(); ?>administrasi/deletePendingPPDB/<?= $showPPDB->id_status ?>"
                                    class="btn btn-danger btn-sm tombol-konfirm" style="float: left;"
                                    data-judul="Untuk menghapus Pembayaran ?" data-konfirm="Yakin, Hapus Data !" style="width: 30px"><i
                                    class="fa fa-trash"></i> Hapus</a>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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
    <script src="<?= base_url() ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url() ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url() ?>vendors/pdfmake/build/vfs_fonts.js"></script>