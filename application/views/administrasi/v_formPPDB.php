<style>
          .green{
            backgound-color: green;
          }
        </style>
        <div class="right_col" role="main" style="min-height: 1098px;">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?= (isset($nama_mapel)) ? 'Edit' :'Tambah' ?> Pembayaran PPDB</h3>
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
                  <div class="x_title">
                    <h2><a href="<?= site_url('administrasi/ppdb') ?>"><i class="fa fa-arrow-left"></i> Kembali</a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a href="<?= site_url('administrasi/pembayaranPPDB') ?>" class="collapse-link"><i class="fa fa-refresh"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?= form_open_multipart(site_url((isset($nama_kelas)) ? 'administrasi/updatePPDB' : 'administrasi/insertPPDB' )); ?>
                    <div class="form-horizontal form-label-left" novalidate>
                      <p>Isikan data sesuai dengan data data Pembayaran yang Valid
                      </p>
                      <span class="section">Form Pembayaran</span>
                      <?php if (isset($id)) { ?>
                          <!-- <input value="<?= $id ?>" name="id" hidden type="text">
                          <input value="<?= $nama_mapel ?>" name="nama_awal" hidden type="text"> -->
                      <?php } ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">ID Pendaftaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="id_ppdb" id="id_daftar" type="text" class="form-control" data-inputmask="'mask' : '****-***'" value="<?= (isset($getGuru)) ? $getGuru->no_npwp : NULL ?>" required>
                          <input style="display: none" name="tgl_pembayaran" type="date" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div>
                      </div>
                      <div id="data_siswa">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label style="text-align: center; color: red" class="col-md-12 col-sm-12 col-xs-12" for="username">Masukkan ID yang vilid !
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
                          <?php if(isset($nama_mapel)){ }
                          else { ?>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <?php } ?>
                          <button id="send" type="submit" class="btn btn-success"><?= (isset($nama_mapel)) ? 'Ubah' : 'Submit' ?></button>
                        </div>
                      </div>
                    </div>
                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>     
    <script>
      $('#id_daftar').on('keyup', function () {
        var id = $(this).val();
        $.ajax({
            url  : '<?= site_url("administrasi/cekIdPPDB/") ?>'+id,
            type : 'POST',
            data : {id:id},
            success: function(data){
                $('#data_siswa').html(data);
            }
        });
      });
    </script>
    <!-- validator -->
    <script src="<?= base_url() ?>vendors/validator/validator.js"></script>
    <!-- jquery.inputmask -->
    <script src="<?= base_url() ?>vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    