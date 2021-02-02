<style>
    #loader {
        border: 20px solid #f3f3f3;
        border-radius: 50%;
        border-top: 20px solid #444444;
        width: 150px;
        height: 150px;
        animation: spin 1s linear infinite;
        z-index: 9999;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

    .center {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

    .bungkus {
        position: absolute;
        z-index: 999;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        visibility: hidden;
    }

    .text-loading {
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: auto;
        color: white;
        text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>
<div class="bungkus">
    <div id="loader" class="center"></div>
    <h3 class="text-loading">
        Exporting...
        <br>
        Please wait until page not reload
        <br>
        <button style="margin-top: 10px" class="btn btn-success" id="close">OKE</button>
    </h3>
</div>
<div class="right_col" role="main" style="min-height: 2098px;">
    <?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Siswa"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Siswa"></div>
    <?php } ?>
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Siswa</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Data Siswa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <a style="color: green" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Export to Excel <i class="fa fa-file-excel-o"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <!-- <li><a style="text-align: left" class="btn" href="<?= site_url('settings/chat') ?>"><i style="color:green; font-weight: 500" class="fa fa-file-excel-o"></i> &nbsp;Export Data Singkat</a></li> -->
                          <li><a id="exportExcel" style="text-align: left" class="btn" href="<?= site_url('export/fullSiswa') ?>"><i style="color:green; font-weight: 500" class="fa fa-table"></i> &nbsp;Export Data Lengkap</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a style="text-align: left" class="btn" href="<?= site_url('settings/chat') ?>"><i style="color:green; font-weight: 500" class="fab fa-whatsapp"></i> &nbsp;Costum Chat</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?= base_url('siswa/form') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> &nbsp; Add Data</a>
                    <a href="<?= base_url('ImportSiswa') ?>" class="btn btn-success"><i class="fas fa-file-import"></i> &nbsp; Import From Excel</a>
                    <p class="text-muted font-13 m-b-30">
                    <table style="font-size: 14px" id="datatable-ex" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="50px">#</th>
                          <th width="50px">Foto</th>
                          <th width="180px">Nis / Nama Siswa</th>
                          <th width="50px">Kelas</th>
                          <th width="120px">Nomor Ortu / Wali.</th>
                          <!-- <th width="115px">Kelamin | Agama.</th> -->
                          <th width="155px">Alamat.</th>
                          <th width="90px">Status Siswa.</th>
                          <th width="108px"></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div id="modalFoto" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <form method="POST" action="<?= base_url('siswa/updatePhoto') ?>" enctype="multipart/form-data"> 
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Ganti Foto</h4>
            </div>
            <div class="modal-body">
              <p>Nis &nbsp;&nbsp;&nbsp;&nbsp;: <span id="nissiswa"></span></p>
              <p>Nama : <span id="namasiswa"></span></p>
              <p>Foto &nbsp;&nbsp;: <span id="fotosiswa">
                
                </span>
              </p><br>
              <p>Format jpg/png/jpeg. Maks size 2Mb.</p>
              <input id="in_nis" name="nis" type="text" hidden>
              <input id="in_foto" name="foto_awal" type="text" hidden>
              <input id="in_nama" name="nama" type="text" hidden>
              <input type="file" name="foto_siswa" required="required" class="form-control col-md-7 col-xs-12"><br><br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ganti Foto</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <script>
      function editFoto(nis,nama,foto,jk) {
        if (foto != 'default-female.jpg' && foto != 'default-male.jpg') {
          isi = ' <a class="tombol-konfirm" style="color: red" href="<?= base_url('siswa/deleteFoto/') ?>' + nis + '/' + jk + '/' + foto + '" data-judul="Untuk menghapus Foto ?" data-konfirm="Yakin, Hapus Foto !">Hapus</a>';
        }
        else{
          isi = '';
        }
        $("#modalFoto").modal('show');
        $("#nissiswa").html(nis);
        $("#namasiswa").html(nama);
        $("#fotosiswa").html(foto + isi);
        $("#in_nis").val(nis);
        $("#in_foto").val(foto);
        $("#in_nama").val(nama);
      }
    </script>
    
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
    <script src="<?= base_url() ?>vendors/jszip/dist/jszip.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#datatable-ex").DataTable({
          "processing": true,
          "serverside": true,
          "order": [], 
          "ajax": {
              "url": "<?= base_url('siswa/get_ajax') ?>",
              "type": "POST"
          },
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
    <script>
        $("#exportExcel").click(function () {
            document.querySelector(".bungkus").style.visibility = "visible";
        });
        $("#close").click(function () {
            document.querySelector(".bungkus").style.visibility = "hidden";
        });
    </script>