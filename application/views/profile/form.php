
<script src="<?= base_url() ?>vendors/tinymce/tinymce.min.js"></script>
<div class="right_col" role="main" style="min-height: 2098px;">
<?php if ($this->session->flashdata('berhasil')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
    data-judul="Data Sekolah"></div>
<?php } if ($this->session->flashdata('gagal')) { ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
    data-judul="Data Sekolah"></div>
<?php } ?>
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Update Data Profile</h3>  
            </div>
        </div>
        <div class="clearfix"></div>
        <form method="POST" class="form-horizontal form-label-left" action="<?= base_url('profile/updateData') ?>">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <h2><strong>Visi</strong></h2>
                <div class="x_content" style="margin-bottom: 50px">
                <script type="text/javascript">
                    tinymce.init({
                    selector: 'textarea',
                    height: 300,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table contextmenu paste code'
                    ],
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

                    });
                </script>
                <div class="col-md-12">
                    <textarea name="visi" rows="3">
                    <?= $dataSekolah->visi ?>
                    </textarea>
                </div>
                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                </div>
                <h2><strong>Misi</strong></h2>
                <div class="x_content">
                  <div id="alerts"></div>
                  <script type="text/javascript">
                        tinymce.init({
                        selector: 'textarea',
                        height: 300,
                        plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table contextmenu paste code'
                        ],
                        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

                        });
                    </script>
                    <div class="col-md-12">
                        <textarea name="misi" rows="3">
                        <?= $dataSekolah->misi ?>
                        </textarea>
                    </div>
                </div>
                <br>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="textarea" required="required" name="deskripsi" class="form-control col-md-7 col-xs-12"><?= $dataSekolah->deskripsi ?></textarea>
                    </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Sekolah
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="nama_sekolah" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $dataSekolah->nama_sekolah ?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Akreditasi
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="akreditasi" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $dataSekolah->akreditasi ?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Ijin
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="nomor_ijin" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $dataSekolah->nomor_ijin ?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Berdiri (MM/DD/YY)
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="tgl_berdiri" class="form-control col-md-7 col-xs-12" required="required" type="date" value="<?= $dataSekolah->tgl_berdiri ?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="alamat" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $dataSekolah->alamat ?>">
                  </div>
                </div>
                <div style="padding: 0" class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label  class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                    <div class="col-md-12 col-xs-12">
                        <select id="provinsi" name="provinsi" class="select2_single form-control" tabindex="-1">
                            <option value=" ">Pilih Provinsi</option>
                            <?php foreach ($provinsi as $prov) { ?>
                                <option value="<?= $prov->id ?>" <?php if($dataSekolah->provinsi == $prov->id) { echo'selected'; } ?>><?= $prov->nama ?></option>
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
                                    $getKab = $this->db->where('provinsi_id',$dataSekolah->provinsi)->get('wilayah_kabupaten')->result();
                                    foreach ($getKab as $showKab) { ?>
                                    <option value="<?= $showKab->id ?>" <?= ($showKab->id == $dataSekolah->kabupaten) ? 'selected' : NULL; ?>><?= $showKab->nama ?></option>
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
                                    $getKec = $this->db->where('kabupaten_id',$dataSekolah->kabupaten)->get('wilayah_kecamatan')->result();
                                foreach ($getKec as $showKec) { ?>
                                    <option value="<?= $showKec->id ?>" <?= ($showKec->id == $dataSekolah->kecamatan) ? 'selected' : NULL; ?>><?= $showKec->nama ?></option>
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
                                    $getDes = $this->db->where('kecamatan_id',$dataSekolah->kecamatan)->get('wilayah_desa')->result();
                                    foreach ($getDes as $showDes) { ?>
                                    <option value="<?= $showDes->id ?>" <?= ($showDes->id == $dataSekolah->desa) ? 'selected' : NULL; ?>><?= $showDes->nama ?></option>
                                <?php }
                            ?>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="telp" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $dataSekolah->telp ?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="fax" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $dataSekolah->fax ?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="email" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $dataSekolah->email ?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Sekolah
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="status_sekolah" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $dataSekolah->status_sekolah ?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Yayasan
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="yayasan" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?= $dataSekolah->yayasan ?>">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
              </div>
            </div>
        </div>
        </form>
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
