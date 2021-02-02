<link href="<?= base_url() ?>vendors/datatables.net/jquery.dataTables.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>vendors/datatables.net/fixedColumns.dataTables.min.css" rel="stylesheet" />
<style>
body {
  padding-right: 0px !important
}
.modal-open {
  overflow-y: auto;
}
th,
td {
  white-space: nowrap;
}

div.dataTables_wrapper {
  width: 100%;
  margin: 0 auto;
}
</style>
<div class="right_col" role="main">
    <?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Absen"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Absen"></div>
    <?php } ?>
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kelas <strong><?= $kelas->nama_kelas ?></strong></h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= (isset($mapel->id)) ? $mapel->nama_mapel.' - '.$bulan.'/'.$tahun : 'Rekap Tahun - '.$tahun?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?= site_url('Administrasi/spp') ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Ganti Kelas </a>
                    <p class="text-muted font-13 m-b-30">
                    <div id="show">
                        
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    <script>
      $('#show').load("<?php echo site_url('administrasi/tampilSPP/'.$kelas->id.'/'.$tahun); ?>");
        </script>
    <!-- Datatables -->
    <script src="<?= base_url() ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net/js/dataTables.fixedColumns.min.js"></script>

    
