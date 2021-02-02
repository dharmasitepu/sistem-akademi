<div class="right_col" role="main" style="min-height: 2098px;">
    <?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Kelas"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Kelas"></div>
    <?php } ?>
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Kelas</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Master Data Kelas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <h2><a href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Kembali</a></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?= site_url('kelas/form') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kelas Baru</a>
                    <p class="text-muted font-13 m-b-30">
                    <table style="font-size: 15px" id="datatables" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Kelas</th>
                          <th>Kelas</th>
                          <th>Siswa</th>
                          <th>Wali</th>
                          <th width="160px"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $i = 1;
                      foreach ($getKelas as $showKelas) { ?>
                        <tr>
                          <th><?= $i++ ?></th>
                          <td><?= $showKelas->nama_kelas ?></td>
                          <td><?= $showKelas->tingkat ?></td>
                          <td>
                            <?= 
                              $this->db->where('kelas',$showKelas->id)->get('tbl_siswa')->num_rows();
                            ?>
                          </td>
                          <td><?= $showKelas->wali_kelas ?></td>
                          <td>
                            <div class="btn-group">
                              <a href="<?= site_url(); ?>kelas/form?id=<?= $showKelas->id ?>&nama_kelas=<?= $showKelas->nama_kelas ?>&kelas=<?= $showKelas->tingkat ?>&wali_kelas=<?= $showKelas->wali_kelas ?>"
                                  class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Ubah</a>
                              <a href="<?= site_url(); ?>kelas/deleteKelas/<?php echo $showKelas->id ?>"
                                  class="btn btn-danger btn-sm tombol-konfirm" style="float: left;"
                                  data-judul="Untuk menghapus Kelas ?" data-konfirm="Yakin, Hapus Kelas !"><i
                                  class="fa fa-trash"></i> Hapus</a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
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
    
    <script>
      $(document).ready(function () {
        $("#datatables").DataTable({
          "language": {
            "lengthMenu": "_MENU_ Data per Halaman",
            "zeroRecords": "Maaf - Data tidak ditemukan",
            "search": "Cari Data : ",
            "info": "Menampilkan _START_ sampai _END_ dari _MAX_ data",
            "infoEmpty": "Tidak ada data dalam table ini",
            "infoFiltered": "(Pencarian dari _MAX_ data)",
            "paginate": {
              "previous": "Sebelumnya",
              "next": "Selanjutnya"
            }
          }
        });
      });
    </script>