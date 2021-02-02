<div class="right_col" role="main" style="min-height: 2098px;">
    <?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Mapel"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Mapel"></div>
    <?php } ?>
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                    <?php if ($user['formulir'] == 'Sudah') { 
                            if ($user['status'] == 'Disetujui') {
                            $kelas = $this->db->get_where('tbl_siswa',['nis_lokal' => $user['nis']])->row()->kelas;
                            $nama_kelas = ($a = $this->db->get_where('tbl_kelas',['id' => $kelas])->row()) ? $a->nama_kelas : 'Maaf kelas telah Dihapus';
                    ?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                                <strong>Selamat !</strong> Anda Telah diterima ke kelas : <?= $nama_kelas ?>.
                            </div>
                    <?php }
                            elseif ($user['status'] == 'Menunggu') { ?>
                            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                                <strong>Menunggu Konfirmasi !</strong> Dimohon untuk selalu login di web ini untuk melihat pemberitahuan .
                            </div>
                    <?php } elseif ($user['status'] == 'Ditolak') { 
                            $alasan = $this->db->get_where('tbl_statuspendaftar',['id_status' => $user['id']])->row()->alasan;   
                    ?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                                <strong>Maaf Pendaftaran Anda Ditolak !</strong><?= (!empty($alasan)) ? ' &nbsp;Keterangan : '.$alasan : NULL ?>
                            </div>
                    <?php }
                    } else{ ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                            <strong>Dimohohon ,</strong> untuk segera mengisi formulir pendaftaran !
                            <a style="color: white; position: absolute; right: 35px; font-weight: 600" href="<?= base_url('users_form') ?>">Formulir <i class="fa fa-arrow-right"></i></a>
                        </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                    </div>
                    <?php if ($user['status'] != 'Ditolak') { ?>
                    <div class="x_content" style="display: block;">
                        <h2>Pengumuman</h2>
                        <div class="well" style="overflow: auto">
                        <h2>Halo, <strong><?= $user['name'] ?></strong>
                        <?= $showPengumuman->pengumuman ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <h2>INFORMASI</h2>
                        <div class="clearfix"></div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_content">
                                <?= $showPengumuman->informasi ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

    
