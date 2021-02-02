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
                        if($show->access != 1){
                        if($show->kelas == 1000){
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
                      <?php }else{ if($show->kelas == $this->session->userdata('kelas')){ ?>
                        <tr>
                          <th><?= $i++ ?></th>
                          <td><?=  $this->session->userdata('kelas') ?></td>
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
                          <?php
                      }}
                    }} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    
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
    
