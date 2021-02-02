        <style>
          .green{
            backgound-color: green;
          }
        </style>
        <div class="right_col" role="main" style="min-height: 1098px;">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?= ($username) ? 'Edit' :'Tambah' ?> Akun Calon Peserta</h3>
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
                    <h2><?= ($username) ? 'Edit' :'Daftarkan' ?> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <h2><a href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Kembali</a></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form method="post" action="<?= site_url(($username) ? 'ppdb/updatePPDB' : 'ppdb/insertPPDB' ); ?>" class="form-horizontal form-label-left" novalidate>
                      <p>Isikan data sesuai dengan data calon peserta PPDB
                      </p>
                      <span class="section">Form Login PPDB</span>
                      <input value="<?= ($id) ? $id : NULL?>" name="id" hidden type="text">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="20,1" data-validate-words="1" value="<?= ($username) ? $username : NULL?>" name="username" placeholder="Min 5 Character" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" value="<?= ($email) ? $email : NULL?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <?php if($username) { ?>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3"></label>
                        <label for="password" class="control-label col-md-6" style="text-align:left; color:#b10000">Kosongkan Password jika tidak Diubah</label>
                      </div>
                      <?php } ?>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3"><?= ($username) ? 'New ' : NULL?>Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="7" class="form-control col-md-7 col-xs-12" <?= ($username) ? NULL :'required="required"'?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" <?= ($username) ? NULL :'required="required"'?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="telephone" value="<?= ($telp) ? $telp : NULL?>" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"  placeholder="Disertai Whatsapp">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <?php if($username){ }
                          else { ?>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <?php } ?>
                          <button id="send" type="submit" class="btn btn-success"><?= ($username) ? 'Ubah' : 'Submit' ?></button>
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