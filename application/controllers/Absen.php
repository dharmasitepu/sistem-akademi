<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOpratorGuru();
        $this->load->model('DataAbsen_m');
        $this->load->model('DataSekolah_m');
        $this->load->model('DataSiswa_m');
        $this->load->model('Mapel_m');
        $this->load->model('DataKelas_m');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        if ($this->session->userdata('role_id') == 4) {
            $nip  = $this->db->get_where('tbl_login',['username' => $this->session->userdata('username')])->row()->nip;
            if ($nip != NULL) {
                $data = array(
                    'title'         => 'Absen', 
                    'dataSekolah'   => $this->DataSekolah_m->getSekolah()
                );  
                $absen = array(
                    'getMapel'      => $this->Mapel_m->getMapelNip($nip), 
                    'getKelas'      => $this->DataKelas_m->getKelas()
                );
                $this->load->view('templates/header', $data);
                $this->load->view('absen/index',$absen);
                $this->load->view('templates/footer-full');
            }
            else{
                redirect('profil_akun');
            }
        }
        else{
            $data = array(
                'title'         => 'Absen', 
                'dataSekolah'   => $this->DataSekolah_m->getSekolah()
            );  
            $absen = array(
                'getMapel'      => $this->Mapel_m->getMapel(), 
                'getKelas'      => $this->DataKelas_m->getKelas()
            );
            $this->load->view('templates/header', $data);
            $this->load->view('absen/index',$absen);
            $this->load->view('templates/footer-full');
        }
    }
    public function showKelas()
    {
        $mapel = $this->input->post('mapel');
        $out ='
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Kelas <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="kelas" name="kelas" class="form-control">
              <option value="Dio">-- Pilih Kelas --</option>';
              if ($mapel == 0) {
                $getKelas = $this->db->get('tbl_kelas')->result();
                foreach ($getKelas as $showKelas) { 
                $out .='<option value="'.$showKelas->id.'">'.$showKelas->nama_kelas.'</option>';
                }
              }
              else{
                $Kelas = $this->db->get_where('tbl_mapel',['id' => $mapel])->row()->kelas;
                    if ($Kelas == 0) {
                        $getKelas = $this->db->get('tbl_kelas')->result();
                        foreach ($getKelas as $showKelas) { 
                        $out .='<option value="'.$showKelas->id.'">'.$showKelas->nama_kelas.'</option>';
                        }
                    }
                    else{
                        $getKelas = $this->db->get_where('tbl_kelas',['tingkat' => $Kelas])->result();
                        foreach ($getKelas as $showKelas) { 
                            $out .='<option value="'.$showKelas->id.'">'.$showKelas->nama_kelas.'</option>';
                        }
                    }
                }
        $out .='</select>
          </div>
        </div>
        <script>
        $("#kelas").on("change", function () {
            if( $(this).val() == "Dio" || $("#mapel").val() == "Dio")
            {
                $("#cek").attr("disabled", true);
            }
            else
            {
                $("#cek").removeAttr("disabled");
            }
        });
        </script>
        ';
        echo $out;
    }
    public function showAbsen()
    {
        $this->load->model('Mapel_m');
        $kelas = $this->input->post('kelas');
        $mapel = ($this->input->post('mapel')) ? $this->input->post('mapel') : NULL;
        $jenis = ($this->input->post('jenis')) ? $this->input->post('jenis') : NULL; 
        $bulan = ($this->input->post('bulan')) ? $this->input->post('bulan') : date('m'); 
        $tahun = ($this->input->post('tahun')) ? $this->input->post('tahun') : date('Y');
        if($kelas == NULL){
            $this->session->set_flashdata('gagal','Gagal menuju form Absen, Pilih kelas Dan Mata Pelajaran Dahulu');
            redirect('absen');
        }
        $data = array(
            'title'         => 'Absen', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );  
        $absen = array(
            'kelas' => $this->DataKelas_m->showKelas($kelas),
            'mapel' => $this->Mapel_m->showMapel($mapel),
            'jenis' => $jenis,
            'bulan' => $bulan,
            'tahun' => $tahun
        );
        $this->load->view('templates/header', $data);
        $this->load->view('absen/show-full-absen', $absen);
        $this->load->view('templates/footer-full');
    }
    public function saveAbsen($kelas = NULL, $tgl = NULL, $bulan = NULL, $tahun = NULL, $jenis = NULL, $nis = NULL, $nama = NULL, $mapel = NULL){
        json_encode($this->DataAbsen_m->saveAbsen());
        echo $this->tampilTd($kelas, $tgl, $bulan, $tahun, $jenis, $nis, $nama, $mapel);
    }
    public function tampilTd($kelas = NULL, $tgl = NULL, $bulan = NULL, $tahun = NULL, $jenis = NULL, $nis = NULL, $nama = NULL, $mapel = NULL)
    {
        $button = $this->DataAbsen_m->getAbsen($nis,$kelas,$tgl,$bulan,$tahun,$mapel);
        $out ='
        <button data-toggle="modal" data-target="#absenday'.$nis.$tgl.'" class="btn btn-sm btn-modal '.$button['color'].'" data-nis="'.$nis.'" data-nama="'.$nama.'" 
        data-kelas="'.$kelas.'" data-tgl="'.$tgl.'" data-month="'.$bulan.'" data-year="'.$tahun.'" style="width: 35px">
        '.$button['icon'].'</button>';
        echo $out;
    }
    public function tampilAbsen($kelas = NULL, $bulan = NULL, $tahun = NULL, $jenis = NULL, $mapel = NULL){ 
        $getSiswa = $this->DataSiswa_m->getSiswaDikit($kelas);
        $sekarang = (date('m') == $bulan && date('Y') == $tahun) ? 'Ada' : 'Tada';
        $d=cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun); 
        $out ='<table id="example" class="stripe row-border order-column" cellspacing="0" width="100%">
                <thead>
                    <tr>';
                        if ($jenis == 'now') {
                            $out.='<th width="20px">( No )</th>';
                            $out .='<th style="text-align: center; width: 25px !important">Hari Ini</th>';
                            $out.='<th>Nama Lengkap</th>';
                        }
                        elseif ($jenis == 'rekaps'){
                            $out.='<th>( No )</th>
                            <th>Nama Lengkap</th>';
                            for($day = 1; $day <= $d; $day++) { 
                                $out .='<th style="text-align: center; width: 25px !important">'; if($sekarang == 'Ada'){ if($day == date('d')) { $out .="<i class='fas fa-arrow-down'></i>"; } else{ $out.=$day; } }else{ $out.=$day; } $out .='</th>';
                            }
                        }
                        elseif ($jenis == 'rekap'){
                            $out.='<th>( No )</th>
                            <th>Nama Lengkap</th>';
                            for($day = 1; $day <= $d; $day++) { 
                                $time = $tahun.'-'.$bulan.'-'.$day;
                                $out .='<th style="text-align: center; width: 25px !important">'; if($sekarang == 'Ada'){ if(date('D', strtotime($time)) == 'Sun'){$out.='Minggu';}elseif($day == date('d')) { $out .="<i class='fas fa-arrow-down'></i>"; } else{ $out.=$day; } }else{ $out.=$day; } $out .='</th>';
                            }   
                        }
            $out .='</tr>
                </thead>
                <tbody>';
		    $i = 1; foreach ($getSiswa as $showSiswa) {
            $out .= '<tr>';
                        if ($jenis == "now") {
                            $out.='
                            <td>'.$i++.'</td>';
                            $out.='<td>';
                            if (date('D') != 'Sun') {
                                $button = $this->DataAbsen_m->getAbsen($showSiswa->nis_lokal,$kelas,date('d'),$bulan,$tahun,($mapel != NULL) ? $mapel : NULL);
                                $out.='<div id="showTd'.date('d').$showSiswa->nis_lokal.'" class="btn-group">';
                                $out.='
                                <button data-toggle="modal" data-target="#absenday'.$showSiswa->nis_lokal.date('d').'" class="btn btn-sm btn-modal '.$button['color'].'" data-nis="'.$showSiswa->nis_lokal.'" data-nama="'.$showSiswa->nama_siswa.'" 
                                data-kelas="'.$kelas.'" data-tgl="'.date('d').'" data-month="'.$bulan.'" data-year="'.$tahun.'" style="width: 35px">
                                '.$button['icon'].'</button>
                                </div>';
                            }
                            else{
                                $out.='Libur';
                            }
                            $out .='</td>';
                            $out.='
                            <td>'.$showSiswa->nama_siswa.'</td>';
                            $out .='<div id="absenday'.$showSiswa->nis_lokal.date('d').'" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-modals="'.$showSiswa->nis_lokal.date('d').'" class="close"><span>×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Tentukan Absen</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tgl : '.date('d').'</p>
                                        <p>Nama : '.$showSiswa->nama_siswa.'</p>
                                        <button class="btnAbsen btn btn-success" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.date('d').'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.date('d').'" data-nama="'.$showSiswa->nama_siswa.'" data-original-title="Hadir" style="width: 45px;"><i class="fas fa-check"></i></button>
                                        <button class="btnAbsen btn btn-warning" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.date('d').'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.date('d').'" data-nama="'.$showSiswa->nama_siswa.'" data-original-title="Terlambat" style="width: 45px;"><i class="fas fa-clock"></i></button>
                                        <button class="btnAbsen btn btn-info" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.date('d').'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.date('d').'" data-nama="'.$showSiswa->nama_siswa.'" data-original-title="Sakit" style="width: 45px;"><i class="fas fa-plus-square"></i></button>
                                        <button class="btnAbsen btn btn-primary" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.date('d').'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.date('d').'" data-nama="'.$showSiswa->nama_siswa.'" data-original-title="Ijin" style="width: 45px;"><i class="fas fa-envelope"></i></button>
                                        <button class="btnAbsen btn btn-danger" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.date('d').'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.date('d').'" data-nama="'.$showSiswa->nama_siswa.'" data-original-title="Tanpa Keterangan" style="width: 45px;"><i class="fas fa-close"></i></button>
                                        <button class="btnAbsen btn btn-default" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.date('d').'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.date('d').'" data-nama="'.$showSiswa->nama_siswa.'" data-original-title="Kosongkan" style="width: 260px">....</button>
                                    </div>
                                    </div>
                                </div>
                            </div>';
                        }
                        elseif ($jenis == 'rekap') {
                            $out .='
                            <td>'.$i++.'</td>
                            <td>'.$showSiswa->nama_siswa.'</td>';
                            for($day = 1; $day <= $d; $day++) {
                                $time = $tahun.'-'.$bulan.'-'.$day;
                            $out .='
                            <td'; 
                            if($sekarang == 'Ada'){ if (date('d') == $day) { $out.=' style="background-color: #fff1c3" '; } }
                            $out.='>';
                            if (date('D',strtotime($time)) != 'Sun') {
                                $out.='<div id="showTd'.$day.$showSiswa->nis_lokal.'" class="btn-group">';
                                $button = $this->DataAbsen_m->getAbsen($showSiswa->nis_lokal,$kelas,$day,$bulan,$tahun,($mapel != NULL) ? $mapel : NULL);
                                $out.='
                                <button data-toggle="modal" data-target="#absenday'.$showSiswa->nis_lokal.$day.'" class="btn btn-sm btn-modal '.$button['color'].'" data-nis="'.$showSiswa->nis_lokal.'" data-nama="'.$showSiswa->nama_siswa.'" 
                                data-kelas="'.$kelas.'" data-tgl="'.$day.'" data-month="'.$bulan.'" data-year="'.$tahun.'" style="width: 35px">
                                '.$button['icon'].'</button>
                                </div>';
                            }
                            $out .='</td>
                            <div id="absenday'.$showSiswa->nis_lokal.$day.'" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-modals="'.$showSiswa->nis_lokal.$day.'" class="close"><span>×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Tentukan Absen</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tgl : '.$day.'</p>
                                        <p>Nama : '.$showSiswa->nama_siswa.'</p>
                                        <button class="btnAbsen btn btn-success" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.$day.'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.$day.'" data-original-title="Hadir" style="width: 45px;"><i class="fas fa-check"></i></button>
                                        <button class="btnAbsen btn btn-warning" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.$day.'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.$day.'" data-original-title="Terlambat" style="width: 45px;"><i class="fas fa-clock"></i></button>
                                        <button class="btnAbsen btn btn-info" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.$day.'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.$day.'" data-original-title="Sakit" style="width: 45px;"><i class="fas fa-plus-square"></i></button>
                                        <button class="btnAbsen btn btn-primary" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.$day.'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.$day.'" data-original-title="Ijin" style="width: 45px;"><i class="fas fa-envelope"></i></button>
                                        <button class="btnAbsen btn btn-danger" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.$day.'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.$day.'" data-original-title="Tanpa Keterangan" style="width: 45px;"><i class="fas fa-close"></i></button>
                                        <button class="btnAbsen btn btn-default" data-nis="'.$showSiswa->nis_lokal.'" data-mapel="'.$mapel.'" data-tgl="'.$day.'" data-kelas="'.$kelas.'" data-bulan="'.$bulan.'" data-tahun="'.$tahun.'" data-jenis="'.$jenis.'" data-modals="'.$showSiswa->nis_lokal.$day.'" data-original-title="Kosongkan" style="width: 260px">....</button>
                                    </div>
                                    </div>
                                </div>
                            </div>';
                            }
                        }
                        elseif ($jenis == 'rekaps') {
                            $out .='
                            <td>'.$i++.'</td>
                            <td>'.$showSiswa->nama_siswa.'<br>{ Sakit : '.$dataAbsen1=$this->DataAbsen_m->cekNumAbsen('Sakit',$bulan,$showSiswa->nis_lokal,$mapel).' } { Ijin : '.$dataAbsen2=$this->DataAbsen_m->cekNumAbsen('Ijin',$bulan,$showSiswa->nis_lokal,$mapel).' }<br>{ Alfa : '.$dataAbsen3=$this->DataAbsen_m->cekNumAbsen('Tanpa Keterangan',$bulan,$showSiswa->nis_lokal,$mapel).' } { Hadir : '.$dataAbsen4=$this->DataAbsen_m->cekNumAbsen('Hadir',$bulan,$showSiswa->nis_lokal,$mapel).'}</td>';
                            for($day = 1; $day <= $d; $day++) {
                            $out .='
                            <td'; 
                            if($sekarang == 'Ada'){ if (date('d') == $day) { $out.=' style="background-color: #fff1c3" '; } }
                            $out.='> 
                                <div id="showTd'.$day.$showSiswa->nis_lokal.'" class="btn-group">';
                                $button = $this->DataAbsen_m->getAbsen($showSiswa->nis_lokal,$kelas,$day,$bulan,$tahun,($mapel != NULL) ? $mapel : NULL);
                                $out.='
                                <button class="btn btn-sm btn-modal '.$button['color'].'" style="width: 35px">
                                '.$button['icon'].'</button>
                                </div>
                            </td>';
                            }
                        }
                        $out .='</tr>';
            } 
            $out .= '</tbody></table>';
            $out .= "<script>
            $(document).ready(function() {
                $('#example').DataTable({
                    scrollY: true,
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: true
                });
                
            });
            $('.btnAbsen').on('click',function(){
                var nis   = $(this).data('nis');
                var kelas = $(this).data('kelas');
                var nama = $(this).data('nama');
                var jenis = $(this).data('jenis');
                var mapel = $(this).data('mapel');
                var tgl   = $(this).data('tgl');
                var bulan = $(this).data('bulan');
                var tahun = $(this).data('tahun');
                var text  = $(this).data('original-title');
                var modal  = $(this).data('modals');
                $.ajax({
                    url  : '".site_url("Absen/saveAbsen/")."'+kelas+'/'+tgl+'/'+bulan+'/'+tahun+'/'+jenis+'/'+nis+'/'+nama+'/'+mapel,
                    type : 'POST',
                    data : {nis:nis, kelas:kelas, mapel:mapel, kehadiran:text, tgl:tgl, bulan:bulan, tahun:tahun},
                    success: function(data){
                        $('#absenday'+modal).modal('hide');
                        $('.modal-backdrop').remove();
                        $('#showTd'+tgl+nis).html(data);
                    }
                });
                return false;
            });
            $('.close').on('click',function(){
                var modal  = $(this).data('modals');
                $('#absenday'+modal).modal('hide');
                $('.modal-backdrop').remove();
            });
            </script>";
        echo $out;
    }
    public function tampilOpRekap()
    {
        $out = '<select name="tahun" class="form-control">';
        for ($tahun=(date('Y')-2); $tahun <= (date('Y')+2) ; $tahun++) { 
            $out .='<option ';(date('Y') == $tahun) ? $out .='selected ' : NULL ; $out.='value="'.$tahun.'">'.$tahun.'</option>';
        }
        $out .='</select>
                <select name="bulan" class="form-control">';
        for ($bulan=01; $bulan <= 12 ; $bulan++) { 
            $out .='<option ';(date('m') == str_pad($bulan, 2, "0", STR_PAD_LEFT)) ? $out .='selected ' : NULL ; $out.='value="'.str_pad($bulan, 2, "0", STR_PAD_LEFT).'">'.$bulan.'</option>';
        }
        $out .='</select>';
        echo $out;
    }
    public function tampilOpRekapBulanan()
    {
        $out = '<select name="tahun" class="form-control">';
        for ($tahun=(date('Y')-2); $tahun <= (date('Y')+2) ; $tahun++) { 
            $out .='<option ';(date('Y') == $tahun) ? $out .='selected ' : NULL ; $out.='value="'.$tahun.'">'.$tahun.'</option>';
        }
        $out .='</select>
                <select name="bulan" class="form-control">';
        for ($bulan=01; $bulan <= 12 ; $bulan++) { 
            $out .='<option ';(date('m') == str_pad($bulan, 2, "0", STR_PAD_LEFT)) ? $out .='selected ' : NULL ; $out.='value="'.str_pad($bulan, 2, "0", STR_PAD_LEFT).'">'.$bulan.'</option>';
        }
        $out .='</select>';
        echo $out;
    }
    
}