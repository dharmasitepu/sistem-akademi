<style>
          .green{
            backgound-color: green;
          }
        </style>
        <?php if ($this->session->flashdata('berhasil')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
        data-judul="Data Siswa"></div>
        <?php } if ($this->session->flashdata('gagal')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
        data-judul="Data Siswa"></div>
        <?php } ?>
        <div class="right_col" role="main" style="min-height: 1098px;">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Absen Siswa</h3>
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
                    <h2>Absen </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form method="post" action="<?= site_url().'absen/showAbsen'?>" class="form-horizontal form-label-left" novalidate>
                      <p>Isikan data sesuai dengan data data kelas yang Valid
                      </p>
                      <br><br>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Mata Pelajaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="mapel" name="mapel" class="form-control">
                            <?php if ($this->session->userdata('role_id') != 4) { ?>
                              <option value="Dio">-- Pilih Jenis --</option>
                              <option value="0">Absen BK</option>
                            <?php }
                            else{ ?>
                              <option value="Dio">-- Pilih Mapel --</option>
                            <?php } ?>
                            <?php foreach ($getMapel as $showMapel) { ?>
                                <option value="<?= $showMapel->id ?>"><?= $showMapel->nama_mapel ?></option>
                            <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div id="show_kelas">
                      
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" data-toggle="modal" data-target="#test" class="btn btn-success" id="cek" disabled>Submit</button>
                        </div>
                      </div>
                      <!-- Small modal -->
                      <div id="test" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Jenis Absen</h4>
                              </div>
                              <div class="modal-body">
                              <select name="jenis" id="jenis" class="form-control">
                                <option value="now">Absen Hari Ini</option>
                                <option value="rekap">Absen Bulanan</option>
                                <option value="rekaps">Rekap Absen</option>
                              </select>
                              <div id="rekap">
                              
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /modals -->
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>     
    <script>
    
        $('#mapel').on('change', function () {
            if( $(this).val() == "Dio")
            {
                $('#show_kelas').html('');
            }
            if( $(this).val() == "Dio" ||  $('#kelas').val() == "Dio")
            {
                $('#cek').attr('disabled', true);
            }
            if ($(this).val() != "Dio" ){
              var mapel = $(this).val();
              $.ajax({
                    url  : '<?= site_url("Absen/showKelas") ?>',
                    type : 'POST',
                    data : {mapel:mapel},
                    success: function(data){
                        $('#show_kelas').html(data);
                    }
                });
                return false;
            }
            else
            {
                $('#cek').removeAttr('disabled');
            }
        });
        $('#jenis').on('change', function () {
            if( $(this).val() == "now")
            {
                $('#rekap').html(' ');
            }
            else if($(this).val() == "rekaps")
            {
                $('#rekap').load("<?php echo site_url('absen/tampilOpRekapBulanan')?>");
            }
            else
            {
                $('#rekap').load("<?php echo site_url('absen/tampilOpRekap')?>");
            }
        });
    </script> 
    <!-- NProgress -->
    <script src="<?= base_url() ?>vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="<?= base_url() ?>vendors/validator/validator.js"></script>