<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataGuru_m');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Data Guru',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $guru = array(
            'getGuru'       => $this->DataGuru_m->getGuru(),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('guru/index', $guru);
        $this->load->view('templates/footer-full');
    }
    public function detailGuru($id)
    {
        $this->load->model('Wilayah_m');
        $data = array(
            'title'         => 'Detail Guru',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $datas = array(
            'show'          => $this->DataGuru_m->getGuruNip($id)
        );
        $this->load->view('templates/header', $data);
        $this->load->view('guru/detailGuru' , $datas);
        $this->load->view('templates/footer-full');
    }
    public function form($nip = NULL)
    {
        $data = array(
            'title'         => 'Form Guru',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $dataForm = array(
            'provinsi' 	=> $this->db->order_by('nama','asc')->get('wilayah_provinsi')->result()
        );
        if ($nip != NULL) {
            $dataForm['getGuru'] = $this->DataGuru_m->getGuruNip($nip);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('guru/form', $dataForm);
        $this->load->view('templates/footer-full');
    }
    public function insertGuru()
    {
        $nip       = $this->input->post('nip');
        $nik       = $this->input->post('nik');
        $ceknip    = $this->db->where('nip', $nip)->get('tbl_guru')->num_rows();
        $ceknik    = $this->db->where('nik', $nik)->get('tbl_guru')->num_rows();
        if ($ceknip > 0) {
            $this->session->set_flashdata('gagal', 'Ditambahkan - NIP Sudah Digunakan');
            redirect('form');
        }
        elseif ($ceknik > 0) {
            $this->session->set_flashdata('gagal', 'Ditambahkan - NIK Sudah Digunakan');
            redirect('form');
        }
        else {
            if($this->DataGuru_m->addGuru($this->input->post()))
            {
                $this->session->set_flashdata('berhasil', 'Ditambahkan - Nama : '.$this->input->post('nama_guru'));
                helper_log('add','Menambahkan data guru','NIP : ' . $nip);
                redirect('guru');
            }
            else{
                $this->session->set_flashdata('gagal', 'Ditambahkan - Nama : '.$this->input->post('nama_guru'));
                redirect('form');
            }
        }
    }
    public function updateGuru()
    {
        if($this->DataGuru_m->updateGuru($this->input->post()))
        {
            $this->session->set_flashdata('berhasil', 'Diubah - Nama : '.$this->input->post('nama_guru'));
            helper_log('edit','Mengedit data guru','NIP : ' . $this->input->post('nip'));
        }
        else{
            $this->session->set_flashdata('gagal', 'Diubah - Nama : '.$this->input->post('nama_guru'));
        }
        redirect('guru');
    }
    public function deleteGuru($nip,$foto)
    {
        if ($this->DataGuru_m->deleteGuru($nip)){
            $this->session->set_flashdata('berhasil', 'Dihapus - Nip : '.$nip);
            helper_log('delete','Menghapus data guru','NIP : ' . $nip);
            if ($foto != 'default-male.jpg' && $foto != 'default-female.jpg') {
                $targetFile = './build/images/guru/'.$foto;
                unlink($targetFile);
            }
        }
        else{
            $this->session->set_flashdata('gagal', 'Dihapus - Nip : '.$nip);
        }
        redirect('guru');
    }
    public function updatePhoto($nip,$foto_awal)
    {
        $nama     = $this->input->post('nama');
        $foto 	  = $_FILES['foto_guru'];
        if ($foto = '') {
            $this->session->set_flashdata('gagal','Foto Tidak Ditemukan');
        }
        else{
            $config['upload_path'] 		= './build/images/guru';
            $config['allowed_types'] 	= 'jpg|png|jpeg';
            $config['max_size'] 		= 2048;
            $config['file_name'] 		= 'nip'.$nip.'-'.date('Y-m-d');

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('foto_guru')) {
                $this->session->set_flashdata('gagal','Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img');
            }
            else {
                if ($foto_awal != 'default-male.jpg' && $foto_awal != 'default-female.jpg') {
                    $targetFile = './build/images/guru/'.$foto_awal;
                    unlink($targetFile);
                }
                $foto = array('foto' => $this->upload->data('file_name') );
                if ($this->DataGuru_m->updatePhoto($nip,$foto)) {
                    $this->session->set_flashdata('berhasil','Upload Foto Berhasil <br>Nip &nbsp;&nbsp;&nbsp;&nbsp;: '.$nip.'<br>Nama : '.$nama);
                    helper_log('upload','Mengupload foto guru','NIP : ' . $nip);
                }
            }
        }
        redirect('guru');
    }
    public function deleteFoto($nip,$jk,$foto)
    {
        $targetFile = './build/images/guru/'.$foto;
        unlink($targetFile);
        $newPhoto   = ($jk == 'Laki-Laki' || $jk == 'L' || $jk == 'l' || $jk == 'Laki - Laki' || $jk == 'Laki%20-%20Laki') ? 'default-male.jpg' : 'default-female.jpg' ;
        $data       = array( 'foto' => $newPhoto );
        if ($this->DataGuru_m->updatePhoto($nip,$data)) {
            $this->session->set_flashdata('berhasil','Foto Berhasil Dihapus <br>Nip : '.$nip);
            helper_log('delete','Menghapus foto guru','NIP : ' . $nip);
        }
        else{
            $this->session->set_flashdata('gagal','Foto Gagal Dihapus');
        }
        redirect('guru');
    }
}