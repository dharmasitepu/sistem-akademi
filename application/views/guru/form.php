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
              <h3>Form <?= (isset($getGuru)) ? 'Ubah' : 'Tambah' ?> Guru</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?= (isset($getGuru)) ? 'Ubah' : 'Tambah' ?> Data Guru</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <h2><a href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Kembali</a></h2>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <!-- Smart Wizard -->
                  <?= form_open_multipart( (isset($getGuru)) ? 'guru/updateGuru' : 'guru/insertGuru' ) ?>
                  <div class="form-horizontal form-label-left">
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
                            Kepegawaian
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-3">
                          <span class="step_no">3</span>
                          <span class="step_descr">
                              Alamat
                            </span>
                        </a>
                      </li>
                    </ul>
                    <!-- ============================ STEP 1 ============================= -->
                      <div id="step-1">
                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NIP <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php if (isset($getGuru)) { ?>
                                    <input type="number" name="nip" value="<?= (isset($getGuru)) ? $getGuru->nip : NULL ?>" class="form-control col-md-7 col-xs-12" style="display: none">
                                    <input type="number" name="nip" disabled value="<?= (isset($getGuru)) ? $getGuru->nip : NULL ?>" class="form-control col-md-7 col-xs-12">
                                <?php } else { ?>
                                    <input type="number" name="nip" required class="form-control col-md-7 col-xs-12">
                                <?php } ?>   
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NUPTK
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="nuptk" value="<?= (isset($getGuru)) ? $getGuru->nuptk : NULL ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NIK / No KTP <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="nik" required="required" value="<?= (isset($getGuru)) ? $getGuru->nik : NULL ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">NPWP</label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input name="no_npwp" type="text" class="form-control" data-inputmask="'mask' : '**-***-***-*-***-***'" value="<?= (isset($getGuru)) ? $getGuru->no_npwp : NULL ?>">
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input name="nama_npwp" type="text" class="form-control" placeholder="nama yang tercantum pada NPWP" value="<?= (isset($getGuru)) ? $getGuru->nama_npwp : NULL ?>">
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Lengkap <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="nama_guru" required="required" value="<?= (isset($getGuru)) ? $getGuru->nama_guru : NULL ?>" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">TTL <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" data-validate-length-range="3" data-validate-words="1" name="tempat_lahir" required="required" value="<?= (isset($getGuru)) ? $getGuru->tempat_lahir : NULL ?>" type="text">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="tgllahir_guru" required="required" value="<?= (isset($getGuru)) ? $getGuru->tgllahir_guru : NULL ?>" type="date">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenjang Pendidikan *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="jenjang_pendidikan" class="select2_single form-control" tabindex="-1">
                                <option>-  Pilih Jenjang  -</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenjang_pendidikan == 'SLTP') { echo'selected'; }} ?> value="SLTP">SLTP</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenjang_pendidikan == 'SLTA') { echo'selected'; }} ?> value="SLTA">SLTA</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenjang_pendidikan == 'D1') { echo'selected'; }} ?> value="D1">D1</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenjang_pendidikan == 'D2') { echo'selected'; }} ?> value="D2">D2</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenjang_pendidikan == 'D3') { echo'selected'; }} ?> value="D3">D3</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenjang_pendidikan == 'D4') { echo'selected'; }} ?> value="D4">D4</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenjang_pendidikan == 'S1') { echo'selected'; }} ?> value="S1">S1</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenjang_pendidikan == 'S2') { echo'selected'; }} ?> value="S2">S2</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenjang_pendidikan == 'S3') { echo'selected'; }} ?> value="S3">S3</option>
                            </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kewarganegaraan / Pernikahan *</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <select name="kewarganegaraan" class="select2_single form-control" tabindex="-1">
                                  <option>-  Pilih Kewarganegaraan  -</option>
                                  <option <?php if (isset($getGuru)) { if($getGuru->kewarganegaraan == 'Indonesia') { echo'selected'; }} ?> value="Indonesia">Indonesia</option>
                                  <option <?php if (isset($getGuru)) { if($getGuru->kewarganegaraan == 'WNA') { echo'selected'; }} ?> value="WNA">WNA</option>
                              </select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <select name="pernikahan" class="select2_single form-control" tabindex="-1">
                                  <option>-  Pilih Status Pernikahan  -</option>
                                  <option <?php if (isset($getGuru)) { if($getGuru->pernikahan == 'Menikah') { echo'selected'; }} ?> value="Menikah">Menikah</option>
                                  <option <?php if (isset($getGuru)) { if($getGuru->pernikahan == 'Belum Menikah') { echo'selected'; }} ?> value="Belum Menikah">Belum Menikah</option>
                                  <option <?php if (isset($getGuru)) { if($getGuru->pernikahan == 'Cerai') { echo'selected'; }} ?> value="Cerai">Cerai</option>
                              </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Program Studi <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="kelompok_prodi" required="required" value="<?= (isset($getGuru)) ? $getGuru->kelompok_prodi : NULL ?>" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin / Agama *</label>
                          <div style="padding: 0" class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group col-md-6 col-sm-12 col-xs-12" data-toggle="buttons">
                              <label class="btn btn-primary <?php if (isset($getGuru)) { if($getGuru->jk == 'Laki-Laki') { echo'active'; }} ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="jk" value="Laki-Laki" <?php if (isset($getGuru)) { if($getGuru->jk == 'Laki-Laki') { echo'checked'; }} ?>> Laki-Laki
                              </label>
                              <label class="btn btn-primary <?php if (isset($getGuru)) { if($getGuru->jk == 'Perempuan') { echo'active'; }} ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="jk" value="Perempuan" <?php if (isset($getGuru)) { if($getGuru->jk == 'Perempuan') { echo'checked'; }} ?>> Perempuan
                              </label>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <select name="agama" class="select2_single form-control" tabindex="-1">
                                  <option value="Islam" <?php if (isset($getGuru)) { if($getGuru->agama == 'Islam') { echo'selected'; }} ?>>Islam</option>
                                  <option value="Kristen" <?php if (isset($getGuru)) { if($getGuru->agama == 'Kristen') { echo'selected'; }} ?>>Kristen</option>
                                  <option value="Hindu" <?php if (isset($getGuru)) { if($getGuru->agama == 'Hindu') { echo'selected'; }} ?>>Hindu</option>
                                  <option value="Budha" <?php if (isset($getGuru)) { if($getGuru->agama == 'Budha') { echo'selected'; }} ?>>Budha</option>
                                  <option value="Konghucu" <?php if (isset($getGuru)) { if($getGuru->agama == 'Konghucu') { echo'selected'; }} ?>>Konghucu</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Ibu <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="nama_ibu" required="required" value="<?= (isset($getGuru)) ? $getGuru->nama_ibu : NULL ?>" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NIP Suami / Istri 
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="nip_suamiistri" required="required" value="<?= (isset($getGuru)) ? $getGuru->nip_suamiistri : NULL ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Suami / Istri
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" name="nama_suamiistri" required="required" value="<?= (isset($getGuru)) ? $getGuru->nama_suamiistri : NULL ?>" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Pekerjaan Suami / Istri
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" name="pekerjaan_suamiistri" required="required" value="<?= (isset($getGuru)) ? $getGuru->pekerjaan_suamiistri : NULL ?>" type="text">
                          </div>
                        </div>
                      </div>
                      <!-- ==================================  STEP 2  ==================================== -->
                      <div id="step-2">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Kepegawaian *</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="status_kepegawaian" class="select2_single form-control" tabindex="-1">
                                <option>-  Pilih Status  -</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'PNS') { echo'selected'; }} ?> value="PNS">PNS</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'PNS Diperbantukan') { echo'selected'; }} ?> value="PNS Diperbantukan">PNS Diperbantukan</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'PNS DEPAG') { echo'selected'; }} ?> value="PNS DEPAG">PNS DEPAG</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'GTY/PTY') { echo'selected'; }} ?> value="GTY/PTY">GTY/PTY</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'GTT/PTT Provinsi') { echo'selected'; }} ?> value="GTT/PTT Provinsi">GTT/PTT Provinsi</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'GTT/PTT Kota') { echo'selected'; }} ?> value="GTT/PTT Kota">GTT/PTT Kota</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'Guru Bantu Pusat') { echo'selected'; }} ?> value="Guru Bantu Pusat">Guru Bantu Pusat</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'Guru Honor Sekolah') { echo'selected'; }} ?> value="Guru Honor Sekolah">Guru Honor Sekolah</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'Tenaga Honor Sekolah') { echo'selected'; }} ?> value="Tenaga Honor Sekolah">Tenaga Honor Sekolah</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->status_kepegawaian == 'CPNS') { echo'selected'; }} ?> value="CPNS">CPNS</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NIY / NIGK
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="no_niy" required="required" value="<?= (isset($getGuru)) ? $getGuru->no_niy : NULL ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis PTK *</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="jenis_ptk" class="select2_single form-control" tabindex="-1">
                                <option>-  Pilih Jenis  -</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Guru Kelas') { echo'selected'; }} ?> value="Guru Kelas">Guru Kelas</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Guru Mata Pelajaran') { echo'selected'; }} ?> value="Guru Mata Pelajaran">Guru Mata Pelajaran</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Guru BK') { echo'selected'; }} ?> value="Guru BK">Guru BK</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Guru Inklusi') { echo'selected'; }} ?> value="Guru Inklusi">Guru Inklusi</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Tenaga Administrasi') { echo'selected'; }} ?> value="Tenaga Administrasi">Tenaga Administrasi</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Guru Pendamping') { echo'selected'; }} ?> value="Guru Pendamping">Guru Pendamping</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Guru Magang') { echo'selected'; }} ?> value="Guru Magang">Guru Magang</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Guru TIK') { echo'selected'; }} ?> value="Guru TIK">Guru TIK</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Kepala Sekolah') { echo'selected'; }} ?> value="Kepala Sekolah">Kepala Sekolah</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->jenis_ptk == 'Lainnya') { echo'selected'; }} ?> value="Lainnya">Lainnya</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">SK Pengangkatan Kepegawaian
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="sk_pengangkatan" required="required" value="<?= (isset($getGuru)) ? $getGuru->sk_pengangkatan : NULL ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Pengangkatan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="tgl_pengangkatan" required="required" value="<?= (isset($getGuru)) ? $getGuru->tgl_pengangkatan : NULL ?>" type="date">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Lembaga Pengangkat</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="lembaga_pengangkat" class="select2_single form-control" tabindex="-1">
                                <option>-  Pilih Lembaga  -</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->lembaga_pengangkat == 'Pemerintah Pusat') { echo'selected'; }} ?> value="Pemerintah Pusat">Pemerintah Pusat</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->lembaga_pengangkat == 'Pemerintah Provinsi') { echo'selected'; }} ?> value="Pemerintah Provinsi">Pemerintah Provinsi</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->lembaga_pengangkat == 'Pemerintah Kabupaten/Kota') { echo'selected'; }} ?> value="Pemerintah Kabupaten/Kota">Pemerintah Kabupaten/Kota</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->lembaga_pengangkat == 'Ketua Yayasan') { echo'selected'; }} ?> value="Ketua Yayasan">Ketua Yayasan</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->lembaga_pengangkat == 'Kepala Sekolah') { echo'selected'; }} ?> value="Kepala Sekolah">Kepala Sekolah</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->lembaga_pengangkat == 'Komite Sekolah') { echo'selected'; }} ?> value="Komite Sekolah">Komite Sekolah</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->lembaga_pengangkat == 'Lainnya') { echo'selected'; }} ?> value="Lainnya">Lainnya</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">SK CPNS
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="sk_cpns" required="required" value="<?= (isset($getGuru)) ? $getGuru->sk_cpns : NULL ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mulai Bertugas CPNS
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="tgl_cpns" required="required" value="<?= (isset($getGuru)) ? $getGuru->tgl_cpns : NULL ?>" type="date">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mulai Bertugas PNS
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="tgl_pns" required="required" value="<?= (isset($getGuru)) ? $getGuru->tgl_pns : NULL ?>" type="date">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Golongan
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" name="golongan" placeholder="Contoh IV/e" required="required" value="<?= (isset($getGuru)) ? $getGuru->golongan : NULL ?>" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Sumber Gaji</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="sumber_gaji" class="select2_single form-control" tabindex="-1">
                                <option>-  Pilih Sumber  -</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->sumber_gaji == 'APBN') { echo'selected'; }} ?> value="APBN">APBN</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->sumber_gaji == 'APBD Provinsi') { echo'selected'; }} ?> value="APBD Provinsi">APBD Provinsi</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->sumber_gaji == 'APBD Kabupaten/Kota') { echo'selected'; }} ?> value="APBD Kabupaten/Kota">APBD Kabupaten/Kota</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->sumber_gaji == 'Yayasan') { echo'selected'; }} ?> value="Yayasan">Yayasan</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->sumber_gaji == 'Sekolah') { echo'selected'; }} ?> value="Sekolah">Sekolah</option>
                                <option <?php if (isset($getGuru)) { if($getGuru->sumber_gaji == 'Lembaga Donor') { echo'selected'; }} ?> value="Lembaga Donor">Lembaga Donor</option>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Kartu Pegawai PNS
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="no_kartupegawai" required="required" value="<?= (isset($getGuru)) ? $getGuru->no_kartupegawai : NULL ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Kartu Istri / Suami
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="kartu_istrisuami" required="required" value="<?= (isset($getGuru)) ? $getGuru->kartu_istrisuami : NULL ?>" class="form-control col-md-7 col-xs-12">
                            <input type="text" name="fotos" required="required" style="visibility: hidden; height: 0px; margin: 0px" value="<?= (isset($getGuru)) ? $getGuru->foto : NULL ?>" class="form-control col-md-7 col-xs-12">      
                          </div>
                        </div>
                      </div>
                    <!-- ==================================  STEP 3  ==================================== -->
                    <div id="step-3">
                        <div style="padding: 0" class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                            <div class="col-md-12 col-xs-12">
                                <select id="provinsi" name="provinsi_guru" class="select2_single form-control" tabindex="-1">
                                    <option value=" ">Pilih Provinsi</option>
                                    <?php foreach ($provinsi as $prov) { ?>
                                        <option value="<?= $prov->id ?>" <?php if (isset($getGuru)) { if($getGuru->provinsi_guru == $prov->id) { echo'selected'; }} ?>><?= $prov->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Kabupaten</label>
                            <div class="col-md-12 col-xs-12">
                                <select id="kabupaten" name="kabupaten_guru" class="select2_single form-control" tabindex="-1">
                                    <option value=" ">Pilih Provinsi Dahulu</option>
                                    <?php 
                                        if (isset($getGuru)) {
                                            $getKab = $this->db->where('provinsi_id',$getGuru->provinsi_guru)->get('wilayah_kabupaten')->result();
                                        }
                                        foreach ($getKab as $showKab) { ?>
                                            <option value="<?= $showKab->id ?>" <?= ($showKab->id == $getGuru->kabupaten_guru) ? 'selected' : NULL; ?>><?= $showKab->nama ?></option>
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
                                <select id="kecamatan" name="kecamatan_guru" class="select2_single form-control" tabindex="-1">
                                    <option value=" ">Pilih Kabupaten Dahulu</option>
                                    <?php 
                                        if (isset($getGuru)) {
                                            $getKec = $this->db->where('kabupaten_id',$getGuru->kabupaten_guru)->get('wilayah_kecamatan')->result();
                                        }
                                        foreach ($getKec as $showKec) { ?>
                                            <option value="<?= $showKec->id ?>" <?= ($showKec->id == $getGuru->kecamatan_guru) ? 'selected' : NULL; ?>><?= $showKec->nama ?></option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Desa</label>
                            <div class="col-md-12 col-xs-12">
                                <select id="desa" name="desa_guru" class="select2_single form-control" tabindex="-1">
                                    <option value=" ">Pilih Kecamatan Dahulu</option>
                                    <?php 
                                        if (isset($getGuru)) {
                                            $getDes = $this->db->where('kecamatan_id',$getGuru->kecamatan_guru)->get('wilayah_desa')->result();
                                        }
                                        foreach ($getDes as $showDes) { ?>
                                            <option value="<?= $showDes->id ?>" <?= ($showDes->id == $getGuru->desa_guru) ? 'selected' : NULL; ?>><?= $showDes->nama ?></option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" required="required" name="alamat" class="form-control col-md-7 col-xs-12"><?= (isset($getGuru)) ? $getGuru->alamat : NULL ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">RT / RW
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="telephone" name="rt" required="required" placeholder="RT" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?= (isset($getGuru)) ? $getGuru->rt : NULL ?>">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="telephone" name="rw" required="required" placeholder="RW" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?= (isset($getGuru)) ? $getGuru->rw : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Kode POS <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="kodepos" name="kode_pos" required="required"  class="form-control col-md-7 col-xs-12" value="<?= (isset($getGuru)) ? $getGuru->kode_pos : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?= (isset($getGuru)) ? $getGuru->email : NULL ?>">
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone Pribadi <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="telephone" name="nomer" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Disertai Whatsapp" value="<?= (isset($getGuru)) ? $getGuru->no_hp : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone Rumah
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="telephone" name="telp_rumah" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?= (isset($getGuru)) ? $getGuru->telp_rumah : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" for="telephone">ATM
                            </label>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Bank
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" name="nama_bank" required="required" value="<?= (isset($getGuru)) ? $getGuru->nama_bank : NULL ?>" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No Rekening
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="rekening" required="required"  class="form-control col-md-7 col-xs-12" value="<?= (isset($getGuru)) ? $getGuru->rekening : NULL ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Atas Nama
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" name="atas_nama" required="required" value="<?= (isset($getGuru)) ? $getGuru->atas_nama : NULL ?>" type="text">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End SmartWizard Content -->
            <?= form_close(); ?>
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
    <!-- jquery.inputmask -->
    <script src="<?= base_url() ?>vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    