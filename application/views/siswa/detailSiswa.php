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
                <h3>Data Siswa</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail : <?= $show->nis_lokal . ' - ' . $show->nama_siswa . ' - ' . $show->nama_kelas ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Back</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">NIS</th>
                                        <td>:</td>
                                        <td><?= $show->nis_lokal ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td>:</td>
                                        <td><?= $show->nama_siswa ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Foto</th>
                                        <td>:</td>
                                        <td>
                                            <img style="margin: 0;width: 150px; height: 170px "
                                                src="<?= base_url('build/images/siswa/' . $show->foto) ?>" alt="img">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NISN</th>
                                        <td>:</td>
                                        <td><?= $show->nisn ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No Induk</th>
                                        <td>:</td>
                                        <td><?= $show->no_induk ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status Siswa</th>
                                        <td>:</td>
                                        <td><?= $show->status_siswa ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kelas</th>
                                        <td>:</td>
                                        <td><?= $show->nama_kelas ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Kelamin <br>Agama</th>
                                        <td>:</td>
                                        <td><?= $show->jk . '<br>' . $show->agama ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TTL</th>
                                        <td>:</td>
                                        <td><?= $show->tempat_lahir .', '. date('d F Y', strtotime($show->tgl_lahir)) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td>:</td>
                                        <td><?= $show->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jarak Rumah <br>Ke Sekolah</th>
                                        <td>:</td>
                                        <td><?= $show->jarak_rumahsekolah ?> KM</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kendaraan</th>
                                        <td>:</td>
                                        <td><?= $show->kendaraan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cita - Cita <br>Hobi</th>
                                        <td>:</td>
                                        <td><?= $show->cita_cita.',<br>'.$show->hobi ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Saudara</th>
                                        <td>:</td>
                                        <td><?= $show->jumlah_saudara.' Bersaudara' ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="clearfix"></div>
                            <h2>Sekolah Asal</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Sekolah</th>
                                        <td>:</td>
                                        <td><?= $show->sekolah_asal ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Sekolah</th>
                                        <td>:</td>
                                        <td><?= $show->jenis_sekolahasal ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status Sekolah</th>
                                        <td>:</td>
                                        <td><?= $show->status_sekolahasal ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kabupaten Sekolah</th>
                                        <td>:</td>
                                        <td><?= $show->kabupaten_sekolahasal ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No Ujian Sebelumnya</th>
                                        <td>:</td>
                                        <td><?= $show->no_ujiansebelumnya ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NPSN Sebelumnya</th>
                                        <td>:</td>
                                        <td><?= $show->npsn_sekolahasal ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Blanko SKHUN</th>
                                        <td>:</td>
                                        <td><?= $show->blanko_skhunasal ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No Ijazah</th>
                                        <td>:</td>
                                        <td><?= $show->no_ijazahasal ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nilai UN</th>
                                        <td>:</td>
                                        <td><?= $show->nilai_un ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Kelulusan</th>
                                        <td>:</td>
                                        <td><?= $show->tgl_kelulusan ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Orang tua / Wali</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat Ortu / Wali</th>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if ($show->nik_ayah != 0 || $show->nik_ayah != NULL) {
                                                echo $show->alamat . '<br>' 
                                                . $this->Wilayah_m->showProvinsi($show->provinsi_ayah). ' - '.$this->Wilayah_m->showKabupaten($show->kabupaten_ayah) . ', '.$this->Wilayah_m->showKecamatan($show->kecamatan_ayah). ', '.$this->Wilayah_m->showDesa($show->desa_ayah);
                                            }
                                            elseif ($show->nik_ibu != 0 || $show->nik_ibu != NULL) {
                                                echo $show->alamat . '<br>' 
                                                . $this->Wilayah_m->showProvinsi($show->provinsi_ibu). ' - '.$this->Wilayah_m->showKabupaten($show->kabupaten_ibu) . ', '.$this->Wilayah_m->showKecamatan($show->kecamatan_ibu). ', '.$this->Wilayah_m->showDesa($show->desa_ibu);
                                            }
                                            elseif ($show->nik_wali != 0 || $show->nik_wali != NULL) {
                                                echo $show->alamat . '<br>' 
                                                . $this->Wilayah_m->showProvinsi($show->provinsi_wali). ' - '.$this->Wilayah_m->showKabupaten($show->kabupaten_wali) . ', '.$this->Wilayah_m->showKecamatan($show->kecamatan_wali). ', '.$this->Wilayah_m->showDesa($show->desa_wali);
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telp Ortu / Wali</th>
                                        <td>:</td>
                                        <td><?= $show->phone_ortuwali ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kode POS</th>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if ($show->kodepos_ayah != 0 || $show->kodepos_ayah != NULL) {
                                                echo $show->kodepos_ayah ;
                                            }
                                            elseif ($show->kodepos_ibu != 0 || $show->kodepos_ibu != NULL) {
                                                echo $show->kodepos_ibu;
                                            }
                                            elseif ($show->kodepos_wali != 0 || $show->kodepos_wali != NULL) {
                                                echo $show->kodepos_wali;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No KK</th>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if ($show->nokk_ayah != 0 || $show->nokk_ayah != NULL) {
                                                echo $show->nokk_ayah ;
                                            }
                                            elseif ($show->nokk_ibu != 0 || $show->nokk_ibu != NULL) {
                                                echo $show->nokk_ibu;
                                            }
                                            elseif ($show->nokk_wali != 0 || $show->nokk_wali != NULL) {
                                                echo $show->nokk_wali;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <table class="table">
                                <tbody>
                                    <!-- ======= Ayah ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Ayah</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">NIK</th>
                                        <td>:</td>
                                        <td><?= $show->nik_ayah ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>:</td>
                                        <td><?= $show->nama_ayah ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pendidikan</th>
                                        <td>:</td>
                                        <td><?= $show->pendidikan_ayah ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pekerjaan</th>
                                        <td>:</td>
                                        <td><?= $show->pekerjaan_ayah ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penghasilan Rp.</th>
                                        <td>:</td>
                                        <td><?= $show->penghasilan_ayah ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Lahir</th>
                                        <td>:</td>
                                        <td><?= date('d F Y', strtotime($show->tgllahir_ayah)) ?></td>
                                    </tr>
                                    <!-- ======= Ibu ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Ibu</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">NIK</th>
                                        <td>:</td>
                                        <td><?= $show->nik_ibu ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>:</td>
                                        <td><?= $show->nama_ibu ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pendidikan</th>
                                        <td>:</td>
                                        <td><?= $show->pendidikan_ibu ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pekerjaan</th>
                                        <td>:</td>
                                        <td><?= $show->pekerjaan_ibu ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penghasilan Rp.</th>
                                        <td>:</td>
                                        <td><?= $show->penghasilan_ibu ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Lahir</th>
                                        <td>:</td>
                                        <td><?= date('d F Y', strtotime($show->tgllahir_ibu)) ?></td>
                                    </tr>
                                    <!-- ======= Wali ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Wali</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">NIK</th>
                                        <td>:</td>
                                        <td><?= $show->nik_wali ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>:</td>
                                        <td><?= $show->nama_wali ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pendidikan</th>
                                        <td>:</td>
                                        <td><?= $show->pendidikan_wali ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pekerjaan</th>
                                        <td>:</td>
                                        <td><?= $show->pekerjaan_wali ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penghasilan Rp.</th>
                                        <td>:</td>
                                        <td><?= $show->penghasilan_wali ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Lahir</th>
                                        <td>:</td>
                                        <td><?= date('d F Y', strtotime($show->tgllahir_wali)) ?></td>
                                    </tr>
                                    <!-- ======= Wali ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Lain - Lain</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">No KKS / KPS</th>
                                        <td>:</td>
                                        <td><?= $show->no_kks ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No KPH</th>
                                        <td>:</td>
                                        <td><?= $show->no_kph ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No KIP</th>
                                        <td>:</td>
                                        <td><?= $show->no_kip ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" scope="row" style="color: rgba(0,0,0,.4)">Program Indonesia Pintar (PIP)</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status Penerima</th>
                                        <td>:</td>
                                        <td><?= $show->pid_status_penerima ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Periode Penerima</th>
                                        <td>:</td>
                                        <td><?= $show->pid_periode ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alasan Menerima</th>
                                        <td>:</td>
                                        <td><?= $show->pid_alasan_menerima ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" scope="row" style="color: rgba(0,0,0,.4)">Prestasi tertinggi yang pernah diraih</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bidang Prestasi</th>
                                        <td>:</td>
                                        <td><?= $show->bidang_prestasi ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Peringkat Prestasi</th>
                                        <td>:</td>
                                        <td><?= $show->peringkat_prestasi ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tingkat Prestasi</th>
                                        <td>:</td>
                                        <td><?= $show->tingkat_prestasi ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tahun Prestasi</th>
                                        <td>:</td>
                                        <td><?= $show->tahun_prestasi ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" scope="row" style="color: rgba(0,0,0,.4)">Beasiswa</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status Beasiswa</th>
                                        <td>:</td>
                                        <td><?= $show->status_beasiswa ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sumber Beasiswa</th>
                                        <td>:</td>
                                        <td><?= $show->sumber_beasiswa ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Beasiswa</th>
                                        <td>:</td>
                                        <td><?= $show->jenis_beasiswa ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jangka Waktu Beasiswa</th>
                                        <td>:</td>
                                        <td><?= $show->jangka_waktu_beasiswa ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Besar Beasiswa</th>
                                        <td>:</td>
                                        <td>Rp. <?= $show->besar_uang_beasiswa ?></td>
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