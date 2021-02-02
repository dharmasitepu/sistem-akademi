<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataPembayaran_m');
    }
    ///////// PPDB //////////////
    public function ppdb()
    {
        $data = array(
            'title'         => 'Administrasi PPDB', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );  
        $dataIsi = array(
            'm_Administrasi' => $this->DataPembayaran_m,
            'getPendingPPDB' => $this->DataPembayaran_m->getPendingPPDB(),
            'numPendingPPDB' => $this->DataPembayaran_m->getNumPendingPPDB(),
            'getStatusPPDB'  => $this->DataPembayaran_m->getStatusPPDB(),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('administrasi/v_ppdb', $dataIsi);
        $this->load->view('templates/footer-full'); 
    }
    public function pembayaranPPDB($id = NULL)
    {
        $data = array(
            'title'         => 'Form Administrasi PPDB', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'getGelombang' => $this->db->get('tbl_gelombangppdb')->result(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('administrasi/v_formPPDB', $dataIsi);
        $this->load->view('templates/footer-full');
    }
    public function BiayaPPDB()
    {
        $data = array(
            'title'         => 'Data Biaya PPDB', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'getGelombang' => $this->db->get('tbl_gelombangppdb')->result(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('administrasi/v_biayaPPDB', $dataIsi);
        $this->load->view('templates/footer-full');
    }
    public function BiayaSPP()
    {
        $data = array(
            'title'         => 'Data Biaya SPP', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'getSPP' => $this->db->get('tbl_hargaspp')->result(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('administrasi/v_biayaSPP', $dataIsi);
        $this->load->view('templates/footer-full');
    }
    public function insertPPDB()
    {
        if($this->DataPembayaran_m->insertPembayaranPPDB($this->input->post()))
        {
            $id    = $this->input->post('id_ppdb');
            $foto 	  = $_FILES['bukti_pembayaran'];
            if ($foto = '') {
            }
            else{
                $config['upload_path'] 		= './build/images/bukti-pembayaran/ppdb/';
                $config['allowed_types'] 	= 'jpg|png|jpeg';
                $config['max_size'] 		= 2048;
                $config['file_name'] 		= 'id'.$id.'-'.date('Y-m-d');

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('bukti_pembayaran')) {
                    $this->session->set_flashdata('gagal','Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img');
                }
                $data = array('bukti_pembayaran' => $this->upload->data('file_name') );
                $this->db->where('id_ppdb',$this->input->post('id_ppdb'))->where('gelombang', $this->input->post('gelombang'))
                         ->where('jml_pembayaran',$this->input->post('jml_pembayaran'))->where('tgl_pembayaran', $this->input->post('tgl_pembayaran'))         
                         ->update('tbl_statusbayarppdb',$data);
            }
            $this->session->set_flashdata('berhasil', 'Ditambahkan - ID : '.$this->input->post('id_ppdb'));
            helper_log('bayar','Melakukan pembayaran PPDB','ID : '.$this->input->post('id_ppdb'));
            redirect('administrasi/ppdb');
        }
        else{
            $this->session->set_flashdata('gagal', 'Ditambahkan - ID : '.$this->input->post('id_ppdb'));
            redirect('administrasi/pembayaranPPDB');
        }
    }
    public function u_BiayaPPDB($id)
    {
        if($this->DataPembayaran_m->updateBiayaPPDB($id,$this->input->post())){
            $this->session->set_flashdata('berhasil','Data PPDB Berhasil Diupdate');
            helper_log('bayar','Mengedit pembayaran PPDB','ID : ' . $id);
        }
        else{
            $this->session->set_flashdata('gagal','Data PPDB Gagal Diupdate');
        }
        redirect('Administrasi/BiayaPPDB');
    }
    public function u_BiayaSPP($id)
    {
        if($this->DataPembayaran_m->updateBiayaSPP($id,$this->input->post())){
            $this->session->set_flashdata('berhasil','Data SPP Berhasil Diupdate');
            helper_log('bayar','Mengedit pembayaran SPP','ID : ' . $id);
        }
        else{
            $this->session->set_flashdata('gagal','Data SPP Gagal Diupdate');
        }
        redirect('Administrasi/BiayaSPP');
    }
    public function cekIdPPDB($id = NULL)
    {
        if ($get = $this->db->where('id',$this->input->post('id'))->get('tbl_loginppdb')->row()) {
            $out = '
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input disabled type="text" class="form-control" value="'.$get->username.'">
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Telp <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input disabled type="text" class="form-control" value="'.$get->telp.'">
                </div>
            </div>
            ';
        }
        else {
            $out = '
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <label style="text-align: center; color: red" class="col-md-12 col-sm-12 col-xs-12" for="username">Masukkan ID yang vilids !</label>
                </div>
            </div>';
        }
        echo $out;
    }
    public function aprovePendingPPDB($id)
    {
        if ($this->DataPembayaran_m->aprovePendingPPDB($id)) {
            $this->session->set_flashdata('berhasil','Data Pending Pembayaran Berhasil Disetujui');
            helper_log('bayar','Menyetujui pembayaran PPDB','ID : ' . $id);
        }
        else{
            $this->session->set_flashdata('gagal','Data Pending Pembayaran Gagal Disetujui');
        }
        redirect('administrasi/ppdb');
    }
    public function deletePendingPPDB($id)
    {
        if ($this->DataPembayaran_m->deletePendingPPDB($id)) {
            $this->session->set_flashdata('berhasil','Data Pending Pembayaran Berhasil Dihapus');
            helper_log('bayar','Menghapus pending pembayaran PPDB','ID : ' . $id);
        }
        else{
            $this->session->set_flashdata('gagal','Data Pending Pembayaran Gagal Dihapus');
        }
        redirect('administrasi/ppdb');
    }
    public function deleteStatusPPDB($id,$foto= NULL)
    {
        if ($foto != NULL) {
            $targetFile = './build/images/bukti-pembayaran/ppdb/'.$foto;
            unlink($targetFile);
        }
        if ($this->DataPembayaran_m->deleteStatusPPDB($id)) {
            $this->session->set_flashdata('berhasil','Data Pembayaran Berhasil Dihapus');
            helper_log('bayar','Menghapus pembayaran PPDB','ID : ' . $id);
        }
        else{
            $this->session->set_flashdata('gagal','Data Pembayaran Gagal Dihapus');
        }
        redirect('administrasi/ppdb');
    }


    ///////////////// S P P //////////////////
    public function spp()
    {
        $data = array(
            'title'         => 'Administrasi SPP', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );  
        $dataIsi = array(
            'm_Administrasi' => $this->DataPembayaran_m,
            'numHistorySPP'  => $this->DataPembayaran_m->numHistorySPP(),
            'getHistorySPP'  => $this->DataPembayaran_m->getHistorySPP(),
            // 'getStatusSPP'   => $this->DataPembayaran_m->getStatusSPP(),
            'getKelas'       => $this->db->order_by('nama_kelas','ASC')->get('tbl_kelas')->result(),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('administrasi/v_spp', $dataIsi);
        $this->load->view('templates/footer-full'); 
    }
    public function showPembayaran()
    {
        $this->load->model('DataKelas_m');
        $kelas = $this->input->post('kelas');
        $bulan = ($this->input->post('bulan')) ? $this->input->post('bulan') : date('m'); 
        $tahun = ($this->input->post('tahun')) ? $this->input->post('tahun') : date('Y');
        $data = array(
            'title'         => 'Absen', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );  
        $absen = array(
            'kelas' => $this->DataKelas_m->showKelas($kelas),
            'bulan' => $bulan,
            'tahun' => $tahun
        );
        $this->load->view('templates/header', $data);
        $this->load->view('administrasi/v_detailSPP', $absen);
        $this->load->view('templates/footer-full');
    }
    public function saveSPP($nis = NULL, $text = NULL, $kelas = NULL,$bulan = NULL, $tahun = NULL){
        json_encode($this->DataPembayaran_m->saveSPP());
        echo $this->tampilTd($nis, $text, $kelas,$bulan, $tahun);
    }
    public function tampilTd($nis = NULL, $text = NULL, $kelas = NULL,$bulan = NULL, $tahun = NULL)
    {
        $button = $this->DataPembayaran_m->getSPP($nis,$kelas,$bulan,$tahun);
        $out ='
            <button data-toggle="modal" data-target="#sppMonth'.$nis.$bulan.'" class="btn btn-sm btn-modal '.$button['color'].'" data-nis="'.$nis.'"
            data-kelas="'.$kelas.'" data-month="'.$bulan.'" data-year="'.$tahun.'" style="width: 35px">
            '.$button['icon'].'</button>';
        echo $out;
    }
    public function tampilSPP($kelas = NULL, $tahun = NULL){
        $this->load->model('DataSiswa_m'); 
        $getSiswa = $this->DataSiswa_m->getSiswaDikit($kelas);
        $out ='<table id="example" class="stripe row-border order-column" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>( No ) Nama Lengkap</th>';
                        for($month = 1; $month <= 12; $month++) { 
                            $out .='<th style="text-align: center; width: 25px !important">';  if($month == date('m')) { $out .="<i class='fas fa-arrow-down'></i>"; } else{ $out.=$month; }  $out .='</th>';
                        }
            $out .='</tr>
                </thead>
                <tbody>';
            $i = 1;
            foreach ($getSiswa as $showSiswa) {
            $out .= '<tr>';
                $out .= '<td>( '.$i++.' ) '.$showSiswa->nama_siswa.'</td>';
                for($bulan = 1; $bulan <= 12; $bulan++) {
                $month = str_pad($bulan, 2,'0', STR_PAD_LEFT);
                $out .='
                <td'; 
                if (date('m') == $month) { $out.=' style="background-color: #fff1c3" '; }
                $out.='> 
                    <div id="showTd'.$month.$showSiswa->nis_lokal.'" class="btn-group">';
                    $button = $this->DataPembayaran_m->getSPP($showSiswa->nis_lokal,$kelas,$month,$tahun);
                    $out.='
                    <button data-toggle="modal" data-target="#sppMonth'.$showSiswa->nis_lokal.$month.'" class="btn btn-sm btn-modal '.$button['color'].'" data-nis="'.$showSiswa->nis_lokal.'" data-nama="'.$showSiswa->nama_siswa.'" 
                    data-kelas="'.$kelas.'" data-month="'.$month.'" data-year="'.$tahun.'" style="width: 35px">
                    '.$button['icon'].'</button>
                    </div>
                </td>
                <div id="sppMonth'.$showSiswa->nis_lokal.$month.'" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-modals="'.$showSiswa->nis_lokal.$month.'" class="close"><span>×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Tentukan Absen</h4>
                        </div>
                        <div class="modal-body">
                            <p>Bulan : '.$month.'</p>
                            <p>Nama : '.$showSiswa->nama_siswa.'</p>
                            <p>Harga : <b>Rp. ' . number_format($this->DataPembayaran_m->showBiayaSPP($kelas),0,'','.').'</b></p>
                            <button class="btnAbsen btn btn-success" data-nis="'.$showSiswa->nis_lokal.'" data-kelas="'.$kelas.'" data-bulan="'.$month.'" data-tahun="'.$tahun.'" data-modals="'.$showSiswa->nis_lokal.$month.'" data-original-title="'.$this->DataPembayaran_m->showBiayaSPP($kelas).'" style="width: 47%;"><i class="fas fa-check"></i> Lunas</button>
                            <button class="btnAbsen btn btn-default" data-nis="'.$showSiswa->nis_lokal.'" data-kelas="'.$kelas.'" data-bulan="'.$month.'" data-tahun="'.$tahun.'" data-modals="'.$showSiswa->nis_lokal.$month.'" data-original-title="Kosongkan" style="width: 47%">....</button>
                        </div>
                        </div>
                    </div>
                </div>';
                }
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
                var bulan = $(this).data('bulan');
                var tahun = $(this).data('tahun');
                var text  = $(this).data('original-title');
                var modal  = $(this).data('modals');
                $.ajax({
                    url  : '".site_url("Administrasi/saveSPP/")."'+nis+'/'+text+'/'+kelas+'/'+bulan+'/'+tahun,
                    type : 'POST',
                    data : {nis:nis, text:text, kelas:kelas, bulan:bulan, tahun:tahun},
                    success: function(data){
                        $('#sppMonth'+modal).modal('hide');
                        $('.modal-backdrop').remove();
                        $('#showTd'+bulan+nis).html(data);
                    }
                });
                return false;
            });
            $('.close').on('click',function(){
                var modal  = $(this).data('modals');
                $('#sppMonth'+modal).modal('hide');
                $('.modal-backdrop').remove();
            });
            </script>";
        echo $out;
    }
}
