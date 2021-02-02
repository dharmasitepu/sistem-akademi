<div class="right_col" role="main" style="min-height: 1098px;">
<?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Sekolah"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Sekolah"></div>
    <?php } ?>
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>Profile Sekolah.</strong></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <!-- start project-detail sidebar -->
                    <div class="col-md-3 col-sm-3 col-xs-12">

                      <section class="panel">
                        <div class="panel-body">
                        <div style="width: 100%; height: 250px; margin-bottom: 30px" class="image">
                          <img style="max-width: 100%; height: 90%" src="<?= base_url('build/images/').$dataSekolah->logo ?>">
                          <a style="width: 100%;" href="#update_foto" data-toggle="modal" class="btn btn-warning">Update Image</a>
                        </div>

                          <p><?= $dataSekolah->deskripsi ?></p>
                          <br>

                          <br>
                          <!-- <h5>Files</h5>
                          <ul class="list-unstyled project_files">
                            <li><a href=""><i class="fa fa-file-word-o"></i> Functional-requirements.docx</a>
                            </li>
                            <li><a href=""><i class="fa fa-file-pdf-o"></i> UAT.pdf</a>
                            </li>
                            <li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a>
                            </li>
                            <li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                            </li>
                            <li><a href=""><i class="fa fa-file-word-o"></i> Contract-10_12_2014.docx</a>
                            </li>
                          </ul>
                        </div> -->

                      </section>
                    </div>
                    <!-- end project-detail sidebar -->

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <!-- end of user messages -->
                        <ul class="messages">
                          <li>
                            <div style="margin-left: 10px;" class="message_wrapper">
                              <h4 style="margin-left: -10px" class="heading">Visi</h4>
                              <blockquote class="message"><?= $dataSekolah->visi ?></blockquote>
                            </div>
                          </li>
                          <li>
                            <div style="margin-left: 10px;" class="message_wrapper">
                              <h4 style="margin-left: -10px" class="heading">Misi</h4>
                              <blockquote class="message"><?= $dataSekolah->misi ?></blockquote>
                            </div>
                          </li>
                        </ul>
                        <!-- end of user messages -->
                        <table style="font-size: 15px" class="table table-striped">
                        <h2 style="texr-align: center">Profile</h2>
                      <tbody>
                        <tr>
                          <th scope="row">Nama Sekolah</th>
                          <td>:</td>
                          <td><?= $dataSekolah->nama_sekolah ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Akreditasi</th>
                          <td>:</td>
                          <td><?= $dataSekolah->akreditasi ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Nomor Ijin</th>
                          <td>:</td>
                          <td><?= $dataSekolah->nomor_ijin ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Tanggal Berdiri</th>
                          <td>:</td>
                          <td><?= $dataSekolah->tgl_berdiri ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Alamat</th>
                          <td>:</td>
                          <td><?= $dataSekolah->alamat.'<br>'.$this->Wilayah_m->showProvinsi($dataSekolah->provinsi).' - '.$this->Wilayah_m->showKabupaten($dataSekolah->kabupaten).', '.$this->Wilayah_m->showKecamatan($dataSekolah->kecamatan).', '.$this->Wilayah_m->showDesa($dataSekolah->desa) ?>.</td>
                        </tr>
                        <tr>
                          <th scope="row">Telephone</th>
                          <td>:</td>
                          <td><?= $dataSekolah->telp ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Fax</th>
                          <td>:</td>
                          <td><?= $dataSekolah->fax ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Email</th>
                          <td>:</td>
                          <td><?= $dataSekolah->email ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Sekolah</th>
                          <td>:</td>
                          <td><?= $dataSekolah->status_sekolah ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Yayasan</th>
                          <td>:</td>
                          <td><?= $dataSekolah->yayasan ?></td>
                        </tr>
                      </tbody>
                    </table>  
                    <div class="text-center mtop20">
                            <a style="width: 100%" href="<?= base_url('profile/update') ?>" class="btn btn-primary">Update Profile</a>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Small modal -->
        <div id="update_foto" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <?= form_open_multipart('profile/updatePhoto'); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Ganti Foto</h4>
              </div>
              <div class="modal-body">
                <p>Update Foto Sekolah</p>
                <p>Sekolah : <?= $dataSekolah->nama_sekolah ?></p>
                <br>
                <p>Format jpg/png/jpeg. Maks size 3Mb.</p>
                <input type="text" name="foto_awal" value="<?= $dataSekolah->logo ?>" style="display: none">
                <input type="file" name="photo" required="required" class="form-control col-md-7 col-xs-12"><br><br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ganti Foto</button>
              </div>
            <?= form_close(); ?>
            </div>
          </div>
        </div>
        <!-- /modals -->