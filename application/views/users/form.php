<div class="right_col" role="main">
<?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Mapel"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Mapel"></div>
    <?php } ?>
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Formulir Pendaftaran</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Form</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <!-- Smart Wizard -->
                  <form method="POST" action="<?= site_url(); ?><?= (isset($getForm)) ? 'Users_form/updateForm' : 'Users_form/insertForm' ?>" class="form-horizontal form-label-left" novalidate>
                  <p style="font-size: 17px">Form wajib diisi jika berisi tanda <strong>*</strong></p>
                  <div id="wizard" class="form_wizard wizard_horizontal">
                    <ul class="wizard_steps">
                      <li>
                        <a href="#step-1">
                          <span class="step_no">1</span>
                          <span class="step_descr">
                            Data Pribadi
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-2">
                          <span class="step_no">2</span>
                          <span class="step_descr">
                            Orangtua / Wali
                          </span>
                        </a>
                      </li>
                    </ul>
                    <!-- ============================ STEP 1 ============================= -->
                      <div id="step-1">
                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">ID Pendaftaran
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="id_datappdb" value="<?= $user['id'] ?>" class="form-control col-md-7 col-xs-12" style="display: none">
                                <input type="text" disabled value="<?= $user['id'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Nama Lengkap <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="nama_lengkap" value="<?= (isset($getForm)) ? $getForm->nama_lengkap : NULL ?>" required class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Nama Panggilan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="nama_panggilan" value="<?= (isset($getForm)) ? $getForm->nama_panggilan : NULL ?>" required class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">TTL <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input id="tempat_lahir" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" data-validate-words="1" name="tempat_lahir" required="required" value="<?= (isset($getForm)) ? $getForm->tempat_lahir : NULL ?>" type="text">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input id="tgl_lahir" class="form-control col-md-7 col-xs-12" name="tgl_lahir" required="required" value="<?= (isset($getForm)) ? $getForm->tgl_lahir : NULL ?>" type="date">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin / Agama *</label>
                          <div style="padding: 0" class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group col-md-6 col-sm-12 col-xs-12" data-toggle="buttons">
                              <label class="btn btn-primary <?php if (isset($getForm)) { if($getForm->jk == 'Laki-Laki') { echo'active'; }} ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="jk" value="Laki-Laki" <?php if (isset($getForm)) { if($getForm->jk == 'Laki-Laki') { echo'checked'; }} ?>> Laki-Laki
                              </label>
                              <label class="btn btn-primary <?php if (isset($getForm)) { if($getForm->jk == 'Perempuan') { echo'active'; }} ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="jk" value="Perempuan" <?php if (isset($getForm)) { if($getForm->jk == 'Perempuan') { echo'checked'; }} ?>> Perempuan
                              </label>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <select name="agama" class="select2_single form-control" tabindex="-1">
                                  <option value="Islam" <?php if (isset($getForm)) { if($getForm->agama == 'Islam') { echo'selected'; }} ?>>Islam</option>
                                  <option value="Kristen" <?php if (isset($getForm)) { if($getForm->agama == 'Kristen') { echo'selected'; }} ?>>Kristen</option>
                                  <option value="Hindu" <?php if (isset($getForm)) { if($getForm->agama == 'Hindu') { echo'selected'; }} ?>>Hindu</option>
                                  <option value="Budha" <?php if (isset($getForm)) { if($getForm->agama == 'Budha') { echo'selected'; }} ?>>Budha</option>
                                  <option value="Konghucu" <?php if (isset($getForm)) { if($getForm->agama == 'Konghucu') { echo'selected'; }} ?>>Konghucu</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" required="required" name="alamat" class="form-control col-md-7 col-xs-12"><?= (isset($getForm)) ? $getForm->alamat : NULL ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tinggal Dengan *</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="tinggal_dengan" class="select2_single form-control" tabindex="-1">
                                <option value="Orang Tua" <?php if (isset($getForm)) { if($getForm->tinggal_dengan == 'Orang Tua') { echo'selected'; }} ?>>Orang Tua</option>
                                <option value="Wali" <?php if (isset($getForm)) { if($getForm->tinggal_dengan == 'Wali') { echo'selected'; }} ?>>Wali</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Gol Darah
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="gol_darah" value="<?= (isset($getForm)) ? $getForm->gol_darah : NULL ?>" required class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cita-Cita / Hobi <span class="required">*</span>
                            </label>
                            <div style="padding: 0" class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-4 col-xs-12">
                                    <input id="cita-cita" class="form-control col-md-7 col-xs-12" name="cita_cita" required="required" type="text" value="<?= (isset($getForm)) ? $getForm->cita_cita : NULL ?>" placeholder="Cita-Cita">
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <input id="hobi" class="form-control col-md-7 col-xs-12" name="hobi" required="required" type="text" placeholder="Hobi" value="<?= (isset($getForm)) ? $getForm->hobi : NULL ?>">
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Jumlah Saudara <span class="required">*</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-8">
                                <input type="number" name="jumlah_saudara" data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12" value="<?= (isset($getForm)) ? $getForm->jumlah_saudara : NULL ?>">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-4">
                                <input disabled type="text" value="Orang" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Anak Ke- <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-8">
                                <input type="number" name="anak_ke" data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12" value="<?= (isset($getForm)) ? $getForm->anak_ke : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Berat Badan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-8">
                                <input type="number" name="bb" data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12" value="<?= (isset($getForm)) ? $getForm->bb : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="telephone" name="telp" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Disertai Whatsapp" value="<?= (isset($getForm)) ? $getForm->telp : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Bakat
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="bakat" value="<?= (isset($getForm)) ? $getForm->bakat : NULL ?>" required class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Sekolah Asal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="sekolah_asal" value="<?= (isset($getForm)) ? $getForm->sekolah_asal : NULL ?>" required class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                      </div>
                    <!-- ==================================  STEP 2  ==================================== -->
                    <div style="height: 1000px" id="step-2">
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Data Orang Tua / Wali</label>
                        </div>
                        <div style="padding: 0" class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                            <div class="col-md-12 col-xs-12">
                                <select id="provinsi" name="provinsi" class="select2_single form-control" tabindex="-1">
                                    <option value=" ">Pilih Provinsi</option>
                                    <?php foreach ($provinsi as $prov) { ?>
                                        <option value="<?= $prov->id ?>" <?php if (isset($getForm)) { if($getForm->provinsi == $prov->id) { echo'selected'; }} ?>><?= $prov->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Kabupaten</label>
                            <div class="col-md-12 col-xs-12">
                                <select id="kabupaten" name="kabupaten" class="select2_single form-control" tabindex="-1">
                                    <option value=" ">Pilih Provinsi Dahulu</option>
                                    <?php 
                                        if (isset($getForm)) {
                                            $getKab = $this->db->where('provinsi_id',$getForm->provinsi)->get('wilayah_kabupaten')->result();
                                        }
                                        foreach ($getKab as $showKab) { ?>
                                            <option value="<?= $showKab->id ?>" <?= ($showKab->id == $getForm->kabupaten) ? 'selected' : NULL; ?>><?= $showKab->nama ?></option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div style="padding: 0" class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan</label>
                            <div class="col-md-12 col-xs-12">
                                <select id="kecamatan" name="kecamatan" class="select2_single form-control" tabindex="-1">
                                    <option value=" ">Pilih Kabupaten Dahulu</option>
                                    <?php 
                                        if (isset($getForm)) {
                                            $getKec = $this->db->where('kabupaten_id',$getForm->kabupaten)->get('wilayah_kecamatan')->result();
                                        }
                                        foreach ($getKec as $showKec) { ?>
                                            <option value="<?= $showKec->id ?>" <?= ($showKec->id == $getForm->kecamatan) ? 'selected' : NULL; ?>><?= $showKec->nama ?></option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Desa</label>
                            <div class="col-md-12 col-xs-12">
                                <select id="desa" name="desa" class="select2_single form-control" tabindex="-1">
                                    <option value=" ">Pilih Kecamatan Dahulu</option>
                                    <?php 
                                        if (isset($getForm)) {
                                            $getDes = $this->db->where('kecamatan_id',$getForm->kecamatan)->get('wilayah_desa')->result();
                                        }
                                        foreach ($getDes as $showDes) { ?>
                                            <option value="<?= $showDes->id ?>" <?= ($showDes->id == $getForm->desa) ? 'selected' : NULL; ?>><?= $showDes->nama ?></option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="telephone" name="telp_ortuwali" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Disertai Whatsapp" value="<?= (isset($getForm)) ? $getForm->telp_ortuwali : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" required="required" name="alamat_ortuwali" class="form-control col-md-7 col-xs-12"><?= (isset($getForm)) ? $getForm->alamat_ortuwali : NULL ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Ayah</label>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input required name="nik_ayah" placeholder="NIK Ayah" class="form-control col-md-7 col-xs-12" type="number" value="<?= (isset($getForm)) ? $getForm->nik_ayah : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nama_ayah" placeholder="Nama Ayah" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->nama_ayah : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pendidikan_ayah" placeholder="Pendidikan Ayah" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->pendidikan_ayah : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->pekerjaan_ayah : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">TTL
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="tempatlahir_ayah" placeholder="Tempat Lahir" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->tempatlahir_ayah : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input id="tgllahir_ayah" class="form-control col-md-7 col-xs-12" name="tgllahir_ayah" type="date" value="<?= (isset($getForm)) ? $getForm->tgllahir_ayah : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="penghasilan_ayah" class="select2_single form-control" tabindex="-1">
                                <option value="" >Pilih Penghasilan</option>
                                <option value="100.000 - 500.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ayah == '100.000 - 500.000') { echo'selected'; }} ?>>100.000 - 500.000</option>
                                <option value="500.000 - 1.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ayah == '500.000 - 1.000.000') { echo'selected'; }} ?>>500.000 - 1.000.000</option>
                                <option value="1.000.000 - 1.500.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ayah == '1.000.000 - 1.500.000') { echo'selected'; }} ?>>1.000.000 - 1.500.000</option>
                                <option value="1.500.000 - 2.500.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ayah == '1.500.000 - 2.500.000') { echo'selected'; }} ?>>1.500.000 - 2.500.000</option>
                                <option value="2.500.000 - 5.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ayah == '2.500.000 - 5.000.000') { echo'selected'; }} ?>>2.500.000 - 5.000.000</option>
                                <option value="5.000.000 - 10.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ayah == '5.000.000 - 10.000.000') { echo'selected'; }} ?>>5.000.000 - 10.000.000</option>
                                <option value="Lebih Dari > 10.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ayah == 'Lebih Dari > 10.000.000') { echo'selected'; }} ?>>Lebih Dari > 10.000.000</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Ibu</label>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input required name="nik_ibu" placeholder="NIK Ibu" class="form-control col-md-7 col-xs-12" type="number" value="<?= (isset($getForm)) ? $getForm->nik_ibu : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nama_ibu" placeholder="Nama Ibu" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->nama_ibu : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pendidikan_ibu" placeholder="Pendidikan Ibu" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->pendidikan_ibu : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->pekerjaan_ibu : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">TTL
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="tempatlahir_ibu" placeholder="Tempat Lahir" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->tempatlahir_ibu : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input id="tgllahir_ibu" class="form-control col-md-7 col-xs-12" name="tgllahir_ibu" type="date" value="<?= (isset($getForm)) ? $getForm->tgllahir_ibu : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="penghasilan_ibu" class="select2_single form-control" tabindex="-1">
                                <option value="" >Pilih Penghasilan</option>
                                <option value="100.000 - 500.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ibu == '100.000 - 500.000') { echo'selected'; }} ?>>100.000 - 500.000</option>
                                <option value="500.000 - 1.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ibu == '500.000 - 1.000.000') { echo'selected'; }} ?>>500.000 - 1.000.000</option>
                                <option value="1.000.000 - 1.500.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ibu == '1.000.000 - 1.500.000') { echo'selected'; }} ?>>1.000.000 - 1.500.000</option>
                                <option value="1.500.000 - 2.500.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ibu == '1.500.000 - 2.500.000') { echo'selected'; }} ?>>1.500.000 - 2.500.000</option>
                                <option value="2.500.000 - 5.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ibu == '2.500.000 - 5.000.000') { echo'selected'; }} ?>>2.500.000 - 5.000.000</option>
                                <option value="5.000.000 - 10.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ibu == '5.000.000 - 10.000.000') { echo'selected'; }} ?>>5.000.000 - 10.000.000</option>
                                <option value="Lebih Dari > 10.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_ibu == 'Lebih Dari > 10.000.000') { echo'selected'; }} ?>>Lebih Dari > 10.000.000</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Wali</label>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nik_wali" placeholder="NIK Wali" class="form-control col-md-7 col-xs-12" type="number" value="<?= (isset($getForm)) ? $getForm->nik_wali : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nama_wali" placeholder="Nama Wali" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->nama_wali : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pendidikan_wali" placeholder="Pendidikan Wali" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->pendidikan_wali : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pekerjaan_wali" placeholder="Pekerjaan Wali" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->pekerjaan_wali : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">TTL
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="tempatlahir_wali" placeholder="Tempat Lahir" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getForm)) ? $getForm->tempatlahir_wali : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input id="tgllahir_wali" class="form-control col-md-7 col-xs-12" name="tgllahir_wali" type="date" value="<?= (isset($getForm)) ? $getForm->tgllahir_wali : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="penghasilan_wali" class="select2_single form-control" tabindex="-1">
                                <option value="" >Pilih Penghasilan</option>
                                <option value="100.000 - 500.000" <?php if (isset($getForm)) { if($getForm->penghasilan_wali == '100.000 - 500.000') { echo'selected'; }} ?>>100.000 - 500.000</option>
                                <option value="500.000 - 1.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_wali == '500.000 - 1.000.000') { echo'selected'; }} ?>>500.000 - 1.000.000</option>
                                <option value="1.000.000 - 1.500.000" <?php if (isset($getForm)) { if($getForm->penghasilan_wali == '1.000.000 - 1.500.000') { echo'selected'; }} ?>>1.000.000 - 1.500.000</option>
                                <option value="1.500.000 - 2.500.000" <?php if (isset($getForm)) { if($getForm->penghasilan_wali == '1.500.000 - 2.500.000') { echo'selected'; }} ?>>1.500.000 - 2.500.000</option>
                                <option value="2.500.000 - 5.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_wali == '2.500.000 - 5.000.000') { echo'selected'; }} ?>>2.500.000 - 5.000.000</option>
                                <option value="5.000.000 - 10.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_wali == '5.000.000 - 10.000.000') { echo'selected'; }} ?>>5.000.000 - 10.000.000</option>
                                <option value="Lebih Dari > 10.000.000" <?php if (isset($getForm)) { if($getForm->penghasilan_wali == 'Lebih Dari > 10.000.000') { echo'selected'; }} ?>>Lebih Dari > 10.000.000</option>
                            </select>
                          </div>
                        </div>
                    </div>
                </div>
                <!-- End SmartWizard Content -->
            </form>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
    $(document).ready(function(){
        $("#provinsi").change(function(){
        var url1 = "<?= site_url('Wilayah/addAjaxKabupaten'); ?>/"+$(this).val();
        var url2 = "<?= site_url('Wilayah/hapusAjaxKecamatan'); ?>/"+$(this).val();
        var url3 = "<?= site_url('Wilayah/hapusAjaxDesa'); ?>/"+$(this).val();
        $("#kabupaten").load(url1);
        $("#kecamatan").load(url2);
        $("#desa").load(url3);
        return false;
        })

        $("#kabupaten").change(function(){
        var url1 = "<?= site_url('Wilayah/addAjaxKecamatan'); ?>/"+$(this).val();
        var url2 = "<?= site_url('Wilayah/hapusAjaxDesa'); ?>/"+$(this).val();
        $("#kecamatan").load(url1);
        $("#desa").load(url2);
        return false;
        })

        $('#kecamatan').change(function(){
        var url = "<?= site_url('Wilayah/addAjaxDesa'); ?>/"+$(this).val();
        $("#desa").load(url);
        return false;
        })
    });
    </script>
    <script src="<?= base_url() ?>vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url() ?>vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="<?= base_url() ?>vendors/validator/validator.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url() ?>vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="<?= base_url() ?>vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>