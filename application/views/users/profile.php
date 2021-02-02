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
                <h3>Edit Profile</h3>
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
                    <h2>Form </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button data-toggle="modal" data-target="#changePass" class="btn btn-warning"><i class="fa fa-edit"></i> Ganti Password</button>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?= form_open_multipart('users_profile/update'); ?>
                    <div class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">ID
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" value="<?= $getProfile->id ?>" name="id" type="text" style="display: none">
                          <input class="form-control col-md-7 col-xs-12" value="<?= $getProfile->id ?>" disabled type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Email
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" value="<?= $getProfile->email ?>" name="email" type="text" style="display: none">
                          <input class="form-control col-md-7 col-xs-12" value="<?= $getProfile->email ?>" disabled type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" value="<?= $getProfile->username ?>" name="username" type="text" style="display: none">
                          <input class="form-control col-md-7 col-xs-12" value="<?= $getProfile->username ?>" disabled type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Nama <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="20,1" data-validate-words="1" value="<?= $getProfile->name ?>" name="name" placeholder="Min 5 Character" required="required" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="telephone" value="<?= $getProfile->telp ?>" name="telp" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Disertai Whatsapp">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto (JPG)</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <img src="<?= base_url('build/images/users/'.$getProfile->image) ?>" style="width:40%;height:40%" class="img-responsive">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto (JPG) Baru *</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="image" class="form-control">
                      <input type="text" name="fotoawal" value="<?= $getProfile->image ?>" style="display: none">
                          <b>*)</b> Biarkan kosong bila tidak ingin mengganti
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-success">Update</button>
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
        <!-- Small modal -->
        <div id="changePass" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <?= form_open_multipart('Users_profile/changePass'); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Ganti Password</h4>
              </div>
              <div class="modal-body">
                <p>Password Lama:</p>
                <input type="password" name="passlama" class="form-control">
                <hr>
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
    <!-- NProgress -->
    <script src="<?= base_url() ?>vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="<?= base_url() ?>vendors/validator/validator.js"></script>