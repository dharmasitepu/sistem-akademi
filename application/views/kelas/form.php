<style>
          .green{
            backgound-color: green;
          }
        </style>
        <div class="right_col" role="main" style="min-height: 1098px;">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?= ($nama_kelas) ? 'Edit' :'Tambah' ?> Data Kelas</h3>
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
                    <h2><?= ($nama_kelas) ? 'Edit' :'Tambahkan' ?> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <h2><a href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Kembali</a></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form method="post" action="<?= site_url(($nama_kelas) ? 'kelas/updateKelas' : 'kelas/insertKelas' ); ?>" class="form-horizontal form-label-left" novalidate>
                      <p>Isikan data sesuai dengan data data kelas yang Valid
                      </p>
                      <span class="section">Form Daftar Kelas</span>
                      <input value="<?= ($id) ? $id : NULL?>" name="id" hidden type="text">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Nama Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input autocomplete="off" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="20,1" data-validate-words="1" value="<?= ($nama_kelas) ? $nama_kelas : NULL?>" name="nama_kelas" placeholder="Nama Kelas ex. 7A" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="kelas" class="form-control">
                                <?= ($tingkat) 
                                ? NULL
                                : '<option value="">Pilih Kelas</option>'; ?>
                                <option value="7" <?= ($tingkat == 7) ? 'selected' : NULL; ?>>7</option>
                                <option value="8" <?= ($tingkat == 8) ? 'selected' : NULL; ?>>8</option>
                                <option value="9" <?= ($tingkat == 9) ? 'selected' : NULL; ?>>9</option>
								<option value="9" <?= ($tingkat == 10) ? 'selected' : NULL; ?>>10</option>
								<option value="9" <?= ($tingkat == 11) ? 'selected' : NULL; ?>>11</option>
								<option value="9" <?= ($tingkat == 12) ? 'selected' : NULL; ?>>12</option>
                            </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Wali Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="wali_kelas" class="form-control">
                                <?= ($wali_kelas)
                                ? NULL
                                : '<option value="">Pilih Wali</option>';
                                foreach ($getWali as $showWali) { ?>
                                  <option value="<?= $showWali->nama_guru ?>" <?= ($wali_kelas == $showWali->nama_guru) ? 'selected' : NULL; ?>><?= $showWali->nama_guru ?></option>
                                <?php } ?>
                                <!-- <option value="Wayan Sudarsa M.Pd" <?= ($wali_kelas == 'Wayan Sudarsa M.Pd') ? 'selected' : NULL; ?>>Wayan Sudarsa M.Pd</option>
                                <option value="Pradnyana Amabara S.Pd" <?= ($wali_kelas == 'Pradnyana Amabara S.Pd') ? 'selected' : NULL; ?>>Pradnyana Amabara S.Pd</option> -->
                            </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <?php if($nama_kelas){ }
                          else { ?>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <?php } ?>
                          <button id="send" type="submit" class="btn btn-success"><?= ($nama_kelas) ? 'Ubah' : 'Submit' ?></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>      
    <!-- NProgress -->
    <script src="<?= base_url() ?>vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="<?= base_url() ?>vendors/validator/validator.js"></script>