<div class="right_col" role="main" style="min-height: 2098px;">
    <?php if ($this->session->flashdata('berhasil')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
        data-judul="Data Login Pendaftaran"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
        data-judul="Data Login Pendaftaran"></div>
    <?php } ?>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Calon Peserta PPDB</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail ID : <?= $show->id ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="<?= base_url('ppdb') ?>"><i class="fa fa-arrow-left"></i> Back</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Username</th>
                                        <td>:</td>
                                        <td><?= $show->username ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>:</td>
                                        <td><?= $show->name ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Foto</th>
                                        <td>:</td>
                                        <td>
                                            <img style="margin: 0;width: 150px; height: 170px "
                                                src="<?= base_url('build/images/users/').$show->image ?>" alt="img">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>:</td>
                                        <td><?= $show->email ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telp</th>
                                        <td>:</td>
                                        <td><?= $show->phone.' / '.$show->telp ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Didaftarkan</th>
                                        <td>:</td>
                                        <td><?= date('H:i:s - d F Y', strtotime($show->waktu_daftar)) ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Form Diisi</th>
                                        <td>:</td>
                                        <td><?= date('H:i:s - d F Y', strtotime($show->waktu_update)) ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="clearfix"></div>
                            <h2>Form.</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Sekolah Asal</th>
                                        <td>:</td>
                                        <td><?= $show->sekolah_asal ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td>:</td>
                                        <td><?= $show->nama_lengkap ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Panggilan</th>
                                        <td>:</td>
                                        <td><?= $show->nama_panggilan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Kelamin</th>
                                        <td>:</td>
                                        <td><?= $show->jk ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Agama</th>
                                        <td>:</td>
                                        <td><?= $show->agama ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TTL</th>
                                        <td>:</td>
                                        <td><?= $show->tempat_lahir.', '. date('d F Y', strtotime($show->tgl_lahir)) ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Saudara</th>
                                        <td>:</td>
                                        <td><?= $show->jumlah_saudara ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Anak Ke</th>
                                        <td>:</td>
                                        <td><?= $show->anak_ke ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gol Darah</th>
                                        <td>:</td>
                                        <td><?= $show->gol_darah ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td>:</td>
                                        <td><?= $show->alamat.'<br>'.$this->Wilayah_m->showProvinsi($show->provinsi).' - '.$this->Wilayah_m->showKabupaten($show->kabupaten).', '.$this->Wilayah_m->showKecamatan($show->kecamatan).', '.$this->Wilayah_m->showDesa($show->desa) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tinggal Dengan</th>
                                        <td>:</td>
                                        <td><?= $show->tinggal_dengan ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TTL</th>
                                        <td>:</td>
                                        <td><?= $show->tempat_lahir.', '.$show->tgl_lahir ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Berat Badan</th>
                                        <td>:</td>
                                        <td><?= $show->bb.' Kg' ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Hobi</th>
                                        <td>:</td>
                                        <td><?= $show->hobi ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cita - Cita</th>
                                        <td>:</td>
                                        <td><?= $show->cita_cita ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bakat</th>
                                        <td>:</td>
                                        <td><?= $show->bakat ?> </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Orang tua / Wali</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat Ortu / Wali</th>
                                        <td>:</td>
                                        <td><?= $show->alamat_ortuwali.'<br>'.$this->Wilayah_m->showProvinsi($show->provinsi).' - '.$this->Wilayah_m->showKabupaten($show->kabupaten).', '.$this->Wilayah_m->showKecamatan($show->kecamatan).', '.$this->Wilayah_m->showDesa($show->desa) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telp Ortu / Wali</th>
                                        <td>:</td>
                                        <td><?= $show->telp_ortuwali ?> </td>
                                    </tr>
                                    <!-- ======= Ayah ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Ayah</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>:</td>
                                        <td><?= $show->nama_ayah ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pendidikan</th>
                                        <td>:</td>
                                        <td><?= $show->pendidikan_ayah ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pekerjaan</th>
                                        <td>:</td>
                                        <td><?= $show->pekerjaan_ayah ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penghasilan Rp.</th>
                                        <td>:</td>
                                        <td><?= $show->penghasilan_ayah ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TTL</th>
                                        <td>:</td>
                                        <td><?= $show->tempatlahir_ayah.', '.$show->tgllahir_ayah ?> </td>
                                    </tr>
                                    <!-- ======= Ibu ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Ibu</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>:</td>
                                        <td><?= $show->nama_ibu ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pendidikan</th>
                                        <td>:</td>
                                        <td><?= $show->pendidikan_ibu ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pekerjaan</th>
                                        <td>:</td>
                                        <td><?= $show->pekerjaan_ibu ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penghasilan Rp.</th>
                                        <td>:</td>
                                        <td><?= $show->penghasilan_ibu ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TTL</th>
                                        <td>:</td>
                                        <td><?= $show->tempatlahir_ibu.', '.$show->tgllahir_ibu ?> </td>
                                    </tr>
                                    <!-- ======= Wali ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Wali</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>:</td>
                                        <td><?= $show->nama_wali ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pendidikan</th>
                                        <td>:</td>
                                        <td><?= $show->pendidikan_wali ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pekerjaan</th>
                                        <td>:</td>
                                        <td><?= $show->pekerjaan_wali ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penghasilan Rp.</th>
                                        <td>:</td>
                                        <td><?= $show->penghasilan_wali ?> </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TTL</th>
                                        <td>:</td>
                                        <td><?= $show->tempatlahir_wali.', '.$show->tgllahir_wali ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>