        <style>
          .green{
            backgound-color: green;
          }
        </style>
        <div class="right_col" role="main" style="min-height: 1098px;">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?= ($nama_mapel) ? 'Edit' :'Tambah' ?> Data Mata Pelajaran</h3>
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
                    <h2><?= ($nama_mapel) ? 'Edit' :'Tambahkan' ?> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <h2><a href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Kembali</a></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form method="post" action="<?= site_url(($nama_mapel) ? 'mapel/updateMapel' : 'mapel/insertMapel' ); ?>" class="form-horizontal form-label-left" novalidate>
                      <p>Isikan data sesuai dengan data data Mapel yang Valid
                      </p>
                      <span class="section">Form Daftar Mapel</span>
                      <?php if ($id != NULL) { ?>
                          <input value="<?= $id ?>" name="id" hidden type="text">
                          <input value="<?= $nama_mapel ?>" name="nama_awal" hidden type="text">
                      <?php } ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Nama Pelajaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input autocomplete="off" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="20,1" data-validate-words="1" value="<?= ($nama_mapel) ? $nama_mapel : NULL?>" name="nama_mapel" placeholder="Ex. Bahasa Indonesia" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="kelas" id="kelas" class="form-control">
                                <?= ($kelas != NULL) 
                                ? NULL
                                : '<option value="">Pilih Kelas</option>'; ?>
                                <option value="0" <?= ($kelas == 0) ? 'selected' : NULL; ?>>Semua Kelas</option>
                                <option value="7" <?= ($kelas == 7) ? 'selected' : NULL; ?>>7</option>
                                <option value="8" <?= ($kelas == 8) ? 'selected' : NULL; ?>>8</option>
                                <option value="9" <?= ($kelas == 9) ? 'selected' : NULL; ?>>9</option>
                            </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Golongan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="gol" id="gol" class="form-control">
                            <?= ($gol) 
                                ? NULL
                                : '<option value="">Pilih Golongan</option>'; ?>
                                <option value="A" <?= ($gol == 'A') ? 'selected' : NULL; ?>>A</option>
                                <option value="B" <?= ($gol == 'B') ? 'selected' : NULL; ?>>B</option>
                                <!-- <option value="C" <?= ($gol == 'C') ? 'selected' : NULL; ?>>C</option> -->
                            </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Guru 1 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="guru1" id="guru1" class="form-control">
                                <option value="">Pilih Guru 1</option>
                                <?php foreach ($guru as $showGuru) {
                                  echo'
                                  <option value="'.$showGuru->nip.'"'; echo ($guru1 == $showGuru->nip) ? 'selected' : NULL; echo'>'.$showGuru->nama_guru.'</option>';
                                } ?>
                            </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Guru 2 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="guru2" id="guru2" class="form-control">
                                <option value="">Pilih Guru 2</option>
                                <?php foreach ($guru as $showGuru) {
                                  echo'
                                  <option value="'.$showGuru->nip.'"'; echo ($guru2 == $showGuru->nip) ? 'selected' : NULL; echo'>'.$showGuru->nama_guru.'</option>';
                                } ?>
                            </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Guru 3 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="guru3" id="guru3" class="form-control">
                                <option value="">Pilih Guru 3</option>
                                <?php foreach ($guru as $showGuru) {
                                  echo'
                                  <option value="'.$showGuru->nip.'"'; echo ($guru3 == $showGuru->nip) ? 'selected' : NULL; echo'>'.$showGuru->nama_guru.'</option>';
                                } ?>
                            </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Guru 4 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="guru4" id="guru4" class="form-control">
                                <option value="">Pilih Guru 4</option>
                                <?php foreach ($guru as $showGuru) {
                                  echo'
                                  <option value="'.$showGuru->nip.'"'; echo ($guru4 == $showGuru->nip) ? 'selected' : NULL; echo'>'.$showGuru->nama_guru.'</option>';
                                } ?>
                            </select>
                        </div>
                      </div>
                      <div id="showguru">
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <?php if($nama_mapel){ }
                          else { ?>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <?php } ?>
                          <button id="send" type="submit" class="btn btn-success"><?= ($nama_mapel) ? 'Ubah' : 'Submit' ?></button>
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