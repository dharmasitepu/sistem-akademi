<div class="right_col" role="main" style="min-height: 2098px;">
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
                <h3>Data Mapel</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Master Data Mapel</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <h2><a href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Kembali</a></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?= site_url('mapel/form') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Mapel Baru</a>
                    <p class="text-muted font-13 m-b-30">
                    <table style="font-size: 15px" id="datatables" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="50px">#</th>
                          <th>Nama Mapel</th>
                          <th>Guru Mapel</th>
                          <th width="140px" style="text-align: center">Kelas</th>
                          <th width="120px" style="text-align: center">Golongan</th>
                          <th width="160px"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $i = 1;
                      foreach ($getMapel as $showMapel) { ?>
                        <tr>
                          <th><?= $i++ ?></th>
                          <td><?= $showMapel->nama_mapel ?></td>
                          <td><?php echo ($modelGuru->getNamaGuru($showMapel->guru1) != NULL) ? $modelGuru->getNamaGuru($showMapel->guru1) : NULL; 
                                    echo ($modelGuru->getNamaGuru($showMapel->guru2) != NULL) ? ', '.$modelGuru->getNamaGuru($showMapel->guru2) : NULL; 
                                    echo ($modelGuru->getNamaGuru($showMapel->guru3)) ? ', '.$modelGuru->getNamaGuru($showMapel->guru3) : NULL; 
                                    echo ($modelGuru->getNamaGuru($showMapel->guru4) != NULL) ? ', '.$modelGuru->getNamaGuru($showMapel->guru4) : NULL; ?>
                          </td>
                          <td style="text-align: center"><?= ($showMapel->kelas == 0)? 'Semua Kelas' : $showMapel->kelas ?></td>
                          <td style="text-align: center"><?= $showMapel->gol ?></td>
                          <td>
                            <div class="btn-group">
                              <a href="<?= site_url('mapel/form?id='.$showMapel->id.'&nama_mapel='.$showMapel->nama_mapel.'&kelas='.$showMapel->kelas.'&gol='.$showMapel->gol.'&guru1='.$showMapel->guru1.'&guru2='.$showMapel->guru2.'&guru3='.$showMapel->guru3.'&guru4='.$showMapel->guru4) ?>"
                                  class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Ubah</a>
                              <a href="<?= site_url('mapel/deleteMapel/'.$showMapel->id.'?nama='.$showMapel->nama_mapel); ?>"
                                  class="btn btn-danger btn-sm tombol-konfirm" style="float: left;"
                                  data-judul="Untuk menghapus Mapel ?" data-konfirm="Yakin, Hapus Mapel !"><i
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
    
