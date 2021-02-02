<div class="right_col" role="main">
<?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Guru"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Guru"></div>
    <?php } ?>
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Form <?= (isset($getSiswa)) ? 'Ubah' : 'Tambah' ?> Siswa</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?= (isset($getSiswa)) ? 'Ubah' : 'Tambah' ?> Data Siswa</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <h2><a href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Kembali</a></h2>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <!-- Smart Wizard -->
                  <form method="POST" action="<?= site_url(); ?><?= (isset($getSiswa)) ? 'siswa/updateSiswa' : 'siswa/insertSiswa' ?>" class="form-horizontal form-label-left" novalidate>
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
                            Sekolah Sebelumnya
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-3">
                          <span class="step_no">3</span>
                          <span class="step_descr">
                              Orang Tua 
                            </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-4">
                          <span class="step_no">4</span>
                          <span class="step_descr">
                               Lain - Lain
                            </span>
                        </a>
                      </li>
                    </ul>
                    <!-- ============================ STEP 1 ============================= -->
                      <div id="step-1">
                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NIS <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php if (isset($getSiswa)) { ?>
                                    <input type="number" id="nissn" name="nis_lokal" value="<?= (isset($getSiswa)) ? $getSiswa->nis_lokal : NULL ?>" class="form-control col-md-7 col-xs-12" style="display: none">
                                    <input type="number" id="nisn" name="nis_lokal" disabled value="<?= (isset($getSiswa)) ? $getSiswa->nis_lokal : NULL ?>" class="form-control col-md-7 col-xs-12">
                                <?php } else { ?>
                                    <input type="number" id="nissnn" name="nis_lokal" required class="form-control col-md-7 col-xs-12">
                                <?php } ?>   
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NISN <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="nissnn" name="nisn" value="<?= (isset($getSiswa)) ? $getSiswa->nisn : NULL ?>" required class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No Induk <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="no_induk" name="no_induk" required="required" value="<?= (isset($getSiswa)) ? $getSiswa->no_induk : NULL ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Lengkap <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nama_lengkap" class="form-control col-md-7 col-xs-12" name="nama_siswa" required="required" value="<?= (isset($getSiswa)) ? $getSiswa->nama_siswa : NULL ?>" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">TTL <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input id="tempat_lahir" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" data-validate-words="1" name="tempat_lahir" required="required" value="<?= (isset($getSiswa)) ? $getSiswa->tempat_lahir : NULL ?>" type="text">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input id="tgl_lahir" class="form-control col-md-7 col-xs-12" name="tgl_lahir" required="required" value="<?= (isset($getSiswa)) ? $getSiswa->tgl_lahir : NULL ?>" type="date">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelas *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="kelas" class="select2_single form-control" tabindex="-1">
                                <option value="0">-  Pilih Kelas  -</option>
                                <?php
                                foreach ($kelas as $showKelas) {  ?>
                                <option <?php if (isset($getSiswa)) { if($getSiswa->kelas == $showKelas->id) { echo'selected'; }} ?> value="<?= $showKelas->id ?>"><?= $showKelas->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin / Agama *</label>
                          <div style="padding: 0" class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group col-md-6 col-sm-12 col-xs-12" data-toggle="buttons">
                              <label class="btn btn-primary <?php if (isset($getSiswa)) { if($getSiswa->jk == 'Laki-Laki') { echo'active'; }} ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="jk" value="Laki-Laki" <?php if (isset($getSiswa)) { if($getSiswa->jk == 'Laki-Laki') { echo'checked'; }} ?>> Laki-Laki
                              </label>
                              <label class="btn btn-primary <?php if (isset($getSiswa)) { if($getSiswa->jk == 'Perempuan') { echo'active'; }} ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="jk" value="Perempuan" <?php if (isset($getSiswa)) { if($getSiswa->jk == 'Perempuan') { echo'checked'; }} ?>> Perempuan
                              </label>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <select name="agama" class="select2_single form-control" tabindex="-1">
                                  <option value="Islam" <?php if (isset($getSiswa)) { if($getSiswa->agama == 'Islam') { echo'selected'; }} ?>>Islam</option>
                                  <option value="Kristen" <?php if (isset($getSiswa)) { if($getSiswa->agama == 'Kristen') { echo'selected'; }} ?>>Kristen</option>
                                  <option value="Hindu" <?php if (isset($getSiswa)) { if($getSiswa->agama == 'Hindu') { echo'selected'; }} ?>>Hindu</option>
                                  <option value="Budha" <?php if (isset($getSiswa)) { if($getSiswa->agama == 'Budha') { echo'selected'; }} ?>>Budha</option>
                                  <option value="Konghucu" <?php if (isset($getSiswa)) { if($getSiswa->agama == 'Konghucu') { echo'selected'; }} ?>>Konghucu</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" required="required" name="alamat" class="form-control col-md-7 col-xs-12"><?= (isset($getSiswa)) ? $getSiswa->alamat : NULL ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Jarak Rumah - Sekolah <span class="required">*</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-8">
                                <input type="number" name="jarak_rumahsekolah" required="required" data-validate-minmax="1,100" value="<?= (isset($getSiswa)) ? $getSiswa->jarak_rumahsekolah : NULL ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-4">
                                <input disabled type="text" value="KM" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Kendaraan *</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="kendaraan" class="select2_single form-control" tabindex="-1">
                                <option value="Jalan Kaki" <?php if (isset($getSiswa)) { if($getSiswa->kendaraan == 'Jalan Kaki') { echo'selected'; }} ?>>Jalan Kaki</option>
                                <option value="Sepeda" <?php if (isset($getSiswa)) { if($getSiswa->kendaraan == 'Sepeda') { echo'selected'; }} ?>>Sepeda</option>
                                <option value="Sepeda Motor" <?php if (isset($getSiswa)) { if($getSiswa->kendaraan == 'Sepeda Motor') { echo'selected'; }} ?>>Sepeda Motor</option>
                                <option value="Mobil" <?php if (isset($getSiswa)) { if($getSiswa->kendaraan == 'Mobil') { echo'selected'; }} ?>>Mobil</option>
                                <option value="Angkutan Umum" <?php if (isset($getSiswa)) { if($getSiswa->kendaraan == 'Angkutan Umum') { echo'selected'; }} ?>>Angkutan Umum</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cita-Cita / Hobi <span class="required">*</span>
                            </label>
                            <div style="padding: 0" class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-4 col-xs-12">
                                    <input id="cita-cita" class="form-control col-md-7 col-xs-12" name="cita_cita" required="required" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->cita_cita : NULL ?>" placeholder="Cita-Cita">
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <input id="hobi" class="form-control col-md-7 col-xs-12" name="hobi" required="required" type="text" placeholder="Hobi" value="<?= (isset($getSiswa)) ? $getSiswa->hobi : NULL ?>">
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Jumlah Saudara <span class="required">*</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-8">
                                <input type="number" id="jarak" name="jumlah_saudara" data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->jumlah_saudara : NULL ?>">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-4">
                                <input disabled type="text" value="Orang" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Siswa *</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="status_siswa" class="select2_single form-control" tabindex="-1">
                                <option value="Siswa Baru" <?php if (isset($getSiswa)) { if($getSiswa->status_siswa == 'Siswa Baru') { echo'selected'; }} ?>>Siswa Baru</option>
                                <option value="Pindahan" <?php if (isset($getSiswa)) { if($getSiswa->status_siswa == 'Pindahan') { echo'selected'; }} ?>>Pindahan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <!-- =================================== STEP 2 ================================ -->
                    <div style="height:450px"  id="step-2"> 
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Sekolah Asal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="sekolah_asal" id="nama_sekolah_asal" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->sekolah_asal : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Sekolah Asal *</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="jenis_sekolahasal" class="select2_single form-control" tabindex="-1">
                                <option value="Sekolah Nasional" <?php if (isset($getSiswa)) { if($getSiswa->jenis_sekolahasal == 'Sekolah Nasional') { echo'selected'; }} ?>>Sekolah Nasional</option>
                                <option value="Sekolah Nasional Plus" <?php if (isset($getSiswa)) { if($getSiswa->jenis_sekolahasal == 'Sekolah Nasional Plus') { echo'selected'; }} ?>>Sekolah Nasional Plus</option>
                                <option value="Sekolah Internasional" <?php if (isset($getSiswa)) { if($getSiswa->jenis_sekolahasal == 'Sekolah Internasional') { echo'selected'; }} ?>>Sekolah Internasional</option>
                                <option value="Sekolah Alam" <?php if (isset($getSiswa)) { if($getSiswa->jenis_sekolahasal == 'Sekolah Alam') { echo'selected'; }} ?>>Sekolah Alam</option>
                                <option value="Madrasah" <?php if (isset($getSiswa)) { if($getSiswa->jenis_sekolahasal == 'Madrasah') { echo'selected'; }} ?>>Madrasah</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Sekolah *</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="status_sekolahasal" class="select2_single form-control" tabindex="-1">
                                <option value="">Akreditasi</option>
                                <option value="A" <?php if (isset($getSiswa)) { if($getSiswa->status_sekolahasal == 'A') { echo'selected'; }} ?>>A</option>
                                <option value="B" <?php if (isset($getSiswa)) { if($getSiswa->status_sekolahasal == 'B') { echo'selected'; }} ?>>B</option>
                                <option value="C" <?php if (isset($getSiswa)) { if($getSiswa->status_sekolahasal == 'C') { echo'selected'; }} ?>>C</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kabupaten Sekolah Asal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="kabupaten_sekolahasal" id="kab_sekolah_asal" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->kabupaten_sekolahasal : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No Ujian Sebelumnya <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="no_ujiansebelumnya" name="no_ujiansebelumnya" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->no_ujiansebelumnya : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NPSN Sekolah Sebelumnya <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="npsn_sekolahasal" name="npsn_sekolahasal" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->npsn_sekolahasal : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Blanko SKHU Sebelumnya <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="blanko_skhunasal" name="blanko_skhunasal" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->blanko_skhunasal : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No Ijazah Sebelumnya <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="no_ijazahasal" name="no_ijazahasal" required="required" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->no_ijazahasal : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Nilai UN Sebelumnya <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nilai_un" name="nilai_un" required="required" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->nilai_un : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Kelulusan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tgl_kelulusan" class="form-control col-md-7 col-xs-12" name="tgl_kelulusan" required="required" type="date" value="<?= (isset($getSiswa)) ? $getSiswa->tgl_kelulusan : NULL ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ==================================  STEP 3  ==================================== -->
                    <div style="height: 1200px" id="step-3">
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Data Orang Tua</label>
                        </div>
                        <div style="padding: 0" class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                            <div class="col-md-12 col-xs-12">
                                <select id="provinsi" name="provinsi" class="select2_single form-control" tabindex="-1">
                                    <option value=" ">Pilih Provinsi</option>
                                    <?php foreach ($provinsi as $prov) { ?>
                                        <option value="<?= $prov->id ?>" <?php if (isset($getSiswa)) { if($getSiswa->provinsi_ayah == $prov->id) { echo'selected'; }} ?>><?= $prov->nama ?></option>
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
                                        if (isset($getSiswa)) {
                                            $getKab = $this->db->where('provinsi_id',$getSiswa->provinsi_ayah)->get('wilayah_kabupaten')->result();
                                        }
                                        foreach ($getKab as $showKab) { ?>
                                            <option value="<?= $showKab->id ?>" <?= ($showKab->id == $getSiswa->kabupaten_ayah) ? 'selected' : NULL; ?>><?= $showKab->nama ?></option>
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
                                        if (isset($getSiswa)) {
                                            $getKec = $this->db->where('kabupaten_id',$getSiswa->kabupaten_ayah)->get('wilayah_kecamatan')->result();
                                        }
                                        foreach ($getKec as $showKec) { ?>
                                            <option value="<?= $showKec->id ?>" <?= ($showKec->id == $getSiswa->kecamatan_ayah) ? 'selected' : NULL; ?>><?= $showKec->nama ?></option>
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
                                        if (isset($getSiswa)) {
                                            $getDes = $this->db->where('kecamatan_id',$getSiswa->kecamatan_ayah)->get('wilayah_desa')->result();
                                        }
                                        foreach ($getDes as $showDes) { ?>
                                            <option value="<?= $showDes->id ?>" <?= ($showDes->id == $getSiswa->desa_ayah) ? 'selected' : NULL; ?>><?= $showDes->nama ?></option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Kode POS <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="kodepos" name="kodepos" required="required"  class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->kodepos_ayah : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No KK <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="no_kk" name="no_kk" required="required"  class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->nokk_ayah : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Disertai Whatsapp" value="<?= (isset($getSiswa)) ? $getSiswa->phone_ortuwali : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Ayah</label>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nik_ayah" placeholder="NIK Ayah" class="form-control col-md-7 col-xs-12" type="number" value="<?= (isset($getSiswa)) ? $getSiswa->nik_ayah : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nama_ayah" placeholder="Nama Ayah" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->nama_ayah : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pendidikan_ayah" placeholder="Pendidikan Ayah" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->pendidikan_ayah : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->pekerjaan_ayah : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Lahir
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tgllahir_ayah" class="form-control col-md-7 col-xs-12" name="tgllahir_ayah" type="date" value="<?= (isset($getSiswa)) ? $getSiswa->tgllahir_ayah : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="penghasilan_ayah" class="select2_single form-control" tabindex="-1">
                                <option value="" >Pilih Penghasilan</option>
                                <option value="100.000 - 500.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ayah == '100.000 - 500.000') { echo'selected'; }} ?>>100.000 - 500.000</option>
                                <option value="500.000 - 1.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ayah == '500.000 - 1.000.000') { echo'selected'; }} ?>>500.000 - 1.000.000</option>
                                <option value="1.000.000 - 1.500.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ayah == '1.000.000 - 1.500.000') { echo'selected'; }} ?>>1.000.000 - 1.500.000</option>
                                <option value="1.500.000 - 2.500.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ayah == '1.500.000 - 2.500.000') { echo'selected'; }} ?>>1.500.000 - 2.500.000</option>
                                <option value="2.500.000 - 5.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ayah == '2.500.000 - 5.000.000') { echo'selected'; }} ?>>2.500.000 - 5.000.000</option>
                                <option value="5.000.000 - 10.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ayah == '5.000.000 - 10.000.000') { echo'selected'; }} ?>>5.000.000 - 10.000.000</option>
                                <option value="Lebih Dari > 10.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ayah == 'Lebih Dari > 10.000.000') { echo'selected'; }} ?>>Lebih Dari > 10.000.000</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea required="required" name="alamat_ayah" class="form-control col-md-7 col-xs-12"><?= (isset($getSiswa)) ? $getSiswa->alamat_ayah : NULL ?></textarea>
                            </div>
                        </div>
                        <!-- == IBU == -->
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Ibu</label>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nik_ibu" placeholder="NIK Ibu" class="form-control col-md-7 col-xs-12" type="number" value="<?= (isset($getSiswa)) ? $getSiswa->nik_ibu : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nama_ibu" placeholder="Nama Ibu" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->nama_ibu : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pendidikan_ibu" placeholder="Pendidikan Ibu" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->pendidikan_ibu : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->pekerjaan_ibu : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Lahir
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tgllahir_ibu" class="form-control col-md-7 col-xs-12" name="tgllahir_ibu" type="date" value="<?= (isset($getSiswa)) ? $getSiswa->tgllahir_ibu : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="penghasilan_ibu" class="select2_single form-control" tabindex="-1">
                                <option value="" >Pilih Penghasilan</option>
                                <option value="100.000 - 500.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ibu == '100.000 - 500.000') { echo'selected'; }} ?>>100.000 - 500.000</option>
                                <option value="500.000 - 1.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ibu == '500.000 - 1.000.000') { echo'selected'; }} ?>>500.000 - 1.000.000</option>
                                <option value="1.000.000 - 1.500.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ibu == '1.000.000 - 1.500.000') { echo'selected'; }} ?>>1.000.000 - 1.500.000</option>
                                <option value="1.500.000 - 2.500.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ibu == '1.500.000 - 2.500.000') { echo'selected'; }} ?>>1.500.000 - 2.500.000</option>
                                <option value="2.500.000 - 5.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ibu == '2.500.000 - 5.000.000') { echo'selected'; }} ?>>2.500.000 - 5.000.000</option>
                                <option value="5.000.000 - 10.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ibu == '5.000.000 - 10.000.000') { echo'selected'; }} ?>>5.000.000 - 10.000.000</option>
                                <option value="Lebih Dari > 10.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_ibu == 'Lebih Dari > 10.000.000') { echo'selected'; }} ?>>Lebih Dari > 10.000.000</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea required="required" name="alamat_ibu" class="form-control col-md-7 col-xs-12"><?= (isset($getSiswa)) ? $getSiswa->alamat_ibu : NULL ?></textarea>
                            </div>
                        </div>
                        <!-- == Wali == -->
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Wali</label>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nik_wali" placeholder="NIK Wali" class="form-control col-md-7 col-xs-12" type="number" value="<?= (isset($getSiswa)) ? $getSiswa->nik_wali : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="nama_wali" placeholder="Nama Wali" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->nama_wali : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pendidikan_wali" placeholder="Pendidikan Wali" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->pendidikan_wali : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pekerjaan_wali" placeholder="Pekerjaan Wali" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->pekerjaan_wali : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Lahir
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tgllahir_wali" class="form-control col-md-7 col-xs-12" name="tgllahir_wali" type="date" value="<?= (isset($getSiswa)) ? $getSiswa->tgllahir_wali : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="penghasilan_wali" class="select2_single form-control" tabindex="-1">
                                <option value="" >Pilih Penghasilan</option>
                                <option value="100.000 - 500.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_wali == '100.000 - 500.000') { echo'selected'; }} ?>>100.000 - 500.000</option>
                                <option value="500.000 - 1.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_wali == '500.000 - 1.000.000') { echo'selected'; }} ?>>500.000 - 1.000.000</option>
                                <option value="1.000.000 - 1.500.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_wali == '1.000.000 - 1.500.000') { echo'selected'; }} ?>>1.000.000 - 1.500.000</option>
                                <option value="1.500.000 - 2.500.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_wali == '1.500.000 - 2.500.000') { echo'selected'; }} ?>>1.500.000 - 2.500.000</option>
                                <option value="2.500.000 - 5.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_wali == '2.500.000 - 5.000.000') { echo'selected'; }} ?>>2.500.000 - 5.000.000</option>
                                <option value="5.000.000 - 10.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_wali == '5.000.000 - 10.000.000') { echo'selected'; }} ?>>5.000.000 - 10.000.000</option>
                                <option value="Lebih Dari > 10.000.000" <?php if (isset($getSiswa)) { if($getSiswa->penghasilan_wali == 'Lebih Dari > 10.000.000') { echo'selected'; }} ?>>Lebih Dari > 10.000.000</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="alamat_wali" class="form-control col-md-7 col-xs-12"><?= (isset($getSiswa)) ? $getSiswa->alamat_wali : NULL ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- ==================================== STEP 4 ================================== -->
                    <div id="step-4">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No KKS / KPS
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="no_kks" name="no_kks" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->no_kks : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No KPH
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="no_kph" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->no_kph : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No KIP <br> (Kartu Indonesia Pintar)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="no_kip" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->no_kip : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Program Indonesia Pintar (PIP)</label>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pid_status_penerima" placeholder="Status Penerima" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->pid_status_penerima : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="pid_periode" placeholder="Periode Penerima" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->pid_periode : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alasan Menerima PIP <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="pid_alasan_menerima" class="form-control col-md-7 col-xs-12"><?= (isset($getSiswa)) ? $getSiswa->pid_alasan_menerima : NULL ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Prestasi Tertinggi Yang Pernah Diraih</label>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="bidang_prestasi" placeholder="Bidang Prestasi" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->bidang_prestasi : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="peringkat_prestasi" placeholder="Peringkat Prestasi" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->peringkat_prestasi : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tingkat Prestasi</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="tingkat_prestasi" class="select2_single form-control" tabindex="-1">
                                <option value=""> - Pilih Tingkat - </option>
                                <option value="Kecamatan" <?php if (isset($getSiswa)) { if($getSiswa->tingkat_prestasi == 'Kecamatan') { echo'selected'; }} ?>>Kecamatan</option>
                                <option value="Kabupaten" <?php if (isset($getSiswa)) { if($getSiswa->tingkat_prestasi == 'Kabupaten') { echo'selected'; }} ?>>Kabupaten</option>
                                <option value="Provinsi" <?php if (isset($getSiswa)) { if($getSiswa->tingkat_prestasi == 'Provinsi') { echo'selected'; }} ?>>Provinsi</option>
                                <option value="Nasional" <?php if (isset($getSiswa)) { if($getSiswa->tingkat_prestasi == 'Nasional') { echo'selected'; }} ?>>Nasional</option>
                                <option value="Internasional" <?php if (isset($getSiswa)) { if($getSiswa->tingkat_prestasi == 'Internasional') { echo'selected'; }} ?>>Internasional</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Prestasi</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="tahun_prestasi" class="select2_single form-control" tabindex="-1">
                                <option value=""> - Pilih Tahun - </option>
                                <?php for ($i=2010; $i < 2021; $i++) { ?>
                                    <option <?php if (isset($getSiswa)) { if($getSiswa->tahun_prestasi == $i) { echo'selected'; }} ?> value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="number" style="text-align: center">Beasiswa</label>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="status_beasiswa" placeholder="Status Beasiswa" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->status_beasiswa : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="sumber_beasiswa" placeholder="Sumber Beasiswa" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->sumber_beasiswa : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="jenis_beasiswa" placeholder="Jenis Beasiswa" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->jenis_beasiswa : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="jangka_waktu_beasiswa" placeholder="Jangka Waktu Beasiswa" class="form-control col-md-7 col-xs-12" type="text" value="<?= (isset($getSiswa)) ? $getSiswa->jangka_waktu_beasiswa : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Besar Uang Beasiswa <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="besar_uang_beasiswa" name="besar_uang_beasiswa" class="form-control col-md-7 col-xs-12" value="<?= (isset($getSiswa)) ? $getSiswa->besar_uang_beasiswa : NULL ?>">
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