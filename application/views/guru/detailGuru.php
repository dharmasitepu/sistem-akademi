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
                <h3>Data Guru</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= '(' . $show->nip . ') ' . $show->nama_guru ?> </h2>
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
                                        <th scope="row">NIP</th>
                                        <td>:</td>
                                        <td><?= $show->nip ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td>:</td>
                                        <td><?= $show->nama_guru ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Foto</th>
                                        <td>:</td>
                                        <td>
                                            <img style="margin: 0;width: 150px; height: 170px "
                                                src="<?= base_url('build/images/guru/' . $show->foto)?>" alt="img">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NUPTK</th>
                                        <td>:</td>
                                        <td><?= $show->nuptk ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NIK / No KTP</th>
                                        <td>:</td>
                                        <td><?= $show->nik ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NPWP</th>
                                        <td>:</td>
                                        <td><?= $show->no_npwp ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama pada NPWP</th>
                                        <td>:</td>
                                        <td><?= $show->nama_npwp ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Kelamin <br>Agama</th>
                                        <td>:</td>
                                        <td><?= $show->jk . '<br>' . $show->agama ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TTL</th>
                                        <td>:</td>
                                        <td><?= $show->tempat_lahir . ', ' . date('d F Y', strtotime($show->tgllahir_guru)) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td>:</td>
                                        <td>
                                        <?= $show->alamat.'<br>'.$this->Wilayah_m->showProvinsi($show->provinsi_guru).' - '.$this->Wilayah_m->showKabupaten($show->kabupaten_guru).', '.$this->Wilayah_m->showKecamatan($show->kecamatan_guru).', '.$this->Wilayah_m->showDesa($show->desa_guru) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">RT / RW <br>Kode POS</th>
                                        <td>:</td>
                                        <td><?= $show->rt . ' / ' . $show->rw . '<br>' . $show->kode_pos ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenjang Pendidikan</th>
                                        <td>:</td>
                                        <td><?= $show->jenjang_pendidikan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kewarganegaraan</th>
                                        <td>:</td>
                                        <td><?= $show->kewarganegaraan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status Pernikahan</th>
                                        <td>:</td>
                                        <td><?= $show->pernikahan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Program Studi</th>
                                        <td>:</td>
                                        <td><?= $show->kelompok_prodi ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>:</td>
                                        <td><?= $show->email ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telephone Pribadi</th>
                                        <td>:</td>
                                        <td><?= $show->no_hp ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telephone Rumah</th>
                                        <td>:</td>
                                        <td><?= $show->telp_rumah ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <table class="table">
                                <tbody>
                                    <!-- ======= Ayah ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Kepegawaian</th>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="180px">Status</th>
                                        <td width="10px">:</td>
                                        <td><?= $show->status_kepegawaian ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NIY / NIGK</th>
                                        <td>:</td>
                                        <td><?= $show->no_niy ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis PTK</th>
                                        <td>:</td>
                                        <td><?= $show->jenis_ptk ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mulai Bertugas PNS</th>
                                        <td>:</td>
                                        <td><?= $show->tgl_pns ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">SK Pengangkatan Kepegawaian</th>
                                        <td>:</td>
                                        <td><?= $show->sk_pengangkatan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Pengangkatan</th>
                                        <td>:</td>
                                        <td><?= date('d F Y', strtotime($show->tgl_pengangkatan)) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lembaga Pengangkat</th>
                                        <td>:</td>
                                        <td><?= $show->lembaga_pengangkat ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">SK CPNS</th>
                                        <td>:</td>
                                        <td><?= $show->sk_cpns ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mulai Bertugas CPNS</th>
                                        <td>:</td>
                                        <td><?= date('d F Y', strtotime($show->tgl_cpns)) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Golongan</th>
                                        <td>:</td>
                                        <td><?= $show->golongan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sumber Gaji</th>
                                        <td>:</td>
                                        <td><?= $show->sumber_gaji ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kartu PNS</th>
                                        <td>:</td>
                                        <td><?= $show->no_kartupegawai ?></td>
                                    </tr>
                                    <!-- ======= Lain Lain ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">Lain - Lain</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kartu Suami / Istri</th>
                                        <td>:</td>
                                        <td><?= $show->kartu_istrisuami ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Ibu</th>
                                        <td>:</td>
                                        <td><?= $show->nama_ibu ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NIP Suami / Istri</th>
                                        <td>:</td>
                                        <td><?= $show->nip_suamiistri ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Suami / Istri</th>
                                        <td>:</td>
                                        <td><?= $show->nama_suamiistri ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pekerjaan Suami / Istri</th>
                                        <td>:</td>
                                        <td><?= $show->pekerjaan_suamiistri ?></td>
                                    </tr>
                                    <!-- ======= ATM ===== -->
                                    <tr>
                                        <th colspan="3" style="text-align: center" scope="row">ATM</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Bank</th>
                                        <td>:</td>
                                        <td><?= $show->nama_bank ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No Rekening</th>
                                        <td>:</td>
                                        <td><?= $show->rekening ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Atas Nama</th>
                                        <td>:</td>
                                        <td><?= $show->atas_nama ?></td>
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