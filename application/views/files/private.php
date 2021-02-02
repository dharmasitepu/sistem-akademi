<script src="<?= base_url() ?>vendors/tinymce/tinymce.min.js"></script>
<div class="right_col" role="main" style="min-height: 2098px;">
    <?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Biaya PPDB"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Biaya PPDB"></div>
    <?php } ?>
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data File Private</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Master Data File Private</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="javascript:history.back()" class="collapse-link"><h2><i class="fa fa-arrow-left"></i> Back</h2></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <button data-toggle="modal" data-target="#add" class="btn btn-success"><i class="fa fa-upload"></i> &nbsp; Upload File</button>
                    <p class="text-muted font-13 m-b-30">
                    <table style="font-size: 15px" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama File</th>
                          <th>Uploaded By</th>
                          <th>Uploaded At</th>
                          <th>Enable Access</th>
                          <th width="240px"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1;
                      foreach ($files as $show) {
                        $akses = ($show->access == 1) ? 'Guru' 
                                :(($show->access == 2) ? (($show->kelas == 1000) ? 'Semua Siswa' : 'Siswa Kelas '.$this->db->get_where('tbl_kelas',['id' => $show->kelas])->row()->nama_kelas )
                                :(($show->access == 3) ? 'Guru Dan Siswa': NULL));
                        ?>
                        <tr>
                          <th><?= $i++ ?></th>
                          <td><?= $show->file_name ?></td>
                          <td><?= ($show->uploaded_by == $this->session->userdata('username')) ? '<strong>Anda</strong>' : $show->uploaded_by ?></td>
                          <td><?= selisihWaktu('now',$show->uploaded_at) ?> yang lalu</td>
                          <td><?= $akses ?></td>
                          <td>
                          <div class="btn-group">
                          <?php if($this->session->userdata('role_id') != 1 && $this->session->userdata('role_id') != 3){ 
                            if($show->uploaded_by == $this->session->userdata('username')){ ?>
                            <a data-toggle="modal" href="#edit<?= $show->id ?>"
                                class="btn btn-primary btn-sm" style=""><i class="fa fa-pencil"></i> Ubah</a>
                            <?php } ?>
                            <a href="<?= base_url('download/file/private/' . $show->upload_name) ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</a>
                            <?php if($show->uploaded_by == $this->session->userdata('username')){ ?>
                            <a href="<?= base_url('Files/deleteFile/private/' . $show->id . '/' . $show->upload_name ) ?>" class="btn btn-danger btn-sm tombol-konfirm" data-judul="Untuk menghapus File ?" data-konfirm="Yakin, Hapus File !">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                          <?php }}else{ ?>
                            <a data-toggle="modal" href="#edit<?= $show->id ?>"
                                class="btn btn-primary btn-sm" style=""><i class="fa fa-pencil"></i> Ubah</a>
                            <a href="<?= base_url('download/file/private/' . $show->upload_name) ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</a>
                            <a href="<?= base_url('Files/deleteFile/private/' . $show->id . '/' . $show->upload_name ) ?>" class="btn btn-danger btn-sm tombol-konfirm" data-judul="Untuk menghapus File ?" data-konfirm="Yakin, Hapus File !">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                          <?php } ?>
                          </div>
                          </td>
                        </tr>
                        <!-- Small modal -->
                        <div id="edit<?= $show->id ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <?= form_open_multipart('Files/editFiles/private'); ?>
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Edit File <?= $show->file_name ?></h4>
                              </div>
                              <div class="modal-body form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Nama File </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input required type="text" class="form-control" name="file_name" value="<?= $show->file_name ?>">
                                        <input hidden type="text" name="file_awal" value="<?= $show->upload_name ?>">
                                        <input hidden type="text" name="id" value="<?= $show->id ?>">
                                    </div>
                                </div>
                                <div class="col-md-offset-3 col-md-9">
                                    <span><strong>Jika ingin mengubah file, bisa masukkan file yang baru !</strong></span>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">File </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="file" class="form-control" name="files">
                                    </div>
                                </div>
                                <div class="col-md-offset-3 col-md-9">
                                    <span>File Yang diijinkan : </span>
                                    <p>rar | pdf | zip | docx | docs | txt | pptx | xlsx | xls | img | jpg | jpeg | png</p>
                                    <p>Max size : 10MB</p>
                                </div>
                                <br><br>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Enable ACCESS </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select name="access" class="form-control kakas" data-id="#kelas<?= $show->id ?>">
                                            <option <?= ($show->access == 1) ? 'selected' : NULL; ?> value="1">Guru</option>
                                            <option <?= ($show->access == 2) ? 'selected' : NULL; ?> value="2">Siswa</option>
                                            <option <?= ($show->access == 3) ? 'selected' : NULL; ?> value="3">Guru & Siswa</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="display: <?= ($show->access != 2) ? 'none' : NULL; ?>" id="kelas<?= $show->id ?>">
                                <?php
                                    $kelas = $this->db->order_by('nama_kelas', 'ASC')->get('tbl_kelas')->result(); ?>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3" style="text-align: right">Kelas </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select name="kelas" class="form-control">
                                                <option value="1000">Semua Kelas</option>
                                                <?php foreach ($kelas as $shows) { ?>
                                                    <option <?= ($show->kelas == $shows->id) ? 'selected' : NULL ?> value="<?= $shows->id ?>"><?= $shows->nama_kelas ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <br>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
                              </div>
                            <?= form_close(); ?>
                            </div>
                          </div>
                        </div>
                        <!-- /modals -->
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
                    <!-- Small modal -->
                        <div id="add" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <?= form_open_multipart('Files/addFiles/private'); ?>
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Upload File Private</h4>
                              </div>
                              <div class="modal-body form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Nama File </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input required type="text" class="form-control" name="file_name">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">File </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input required type="file" class="form-control" name="files">
                                    </div>
                                </div>
                                <div class="col-md-offset-3 col-md-9">
                                    <span>File Yang diijinkan : </span>
                                    <p>rar | pdf | zip | docx | docs | txt | pptx | xlsx | xls | img | jpg | jpeg | png</p>
                                    <p>Max size : 10MB</p>
                                </div>
                                <br><br>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Enable ACCESS </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select name="access" id="access1" class="form-control" data-id="kelas">
                                            <option value="1">Guru</option>
                                            <option value="2">Siswa</option>
                                            <option value="3">Guru & Siswa</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="kelas"></div>
                              </div>
                              <br>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload</button>
                              </div>
                            <?= form_close(); ?>
                            </div>
                          </div>
                        </div>
                        <!-- /modals -->
    
    <!-- Datatables -->
    <script src="<?= base_url() ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script>
        $('.kakas').change(function () {
            var accesss = $(this).val();
            var text = $($(this).data('id'));
            if (accesss == 2) {   
                text.css('display', 'block');
            }
            else{
                text.css('display', 'none');
            }
        });
        $('#access1').change(function () {
            var access = $(this).val();
            if (access == 2) {   
                $('#kelas').load("<?= base_url('Files/s_kelas/') ?>");
            }
            else{
                $('#kelas').html('');
            }
        });
    </script>
    
