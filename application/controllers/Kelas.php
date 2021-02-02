<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataKelas_m');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Kelas', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );  
        $kelas = array(
            'getKelas'      => $this->DataKelas_m->getKelas() 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('kelas/index', $kelas);
        $this->load->view('templates/footer-full');
    }
    public function form()
    {
        $data = array(
            'title'         => 'Kelas', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataKelas = array(
            'id'            => NULL, 
            'nama_kelas'    => NULL, 
            'tingkat'       => NULL, 
            'wali_kelas'    => NULL
        );  
        if ($this->input->get('nama_kelas')) {
            $dataKelas = array(
                'id'            => $this->input->get('id'), 
                'nama_kelas'    => $this->input->get('nama_kelas'), 
                'tingkat'       => $this->input->get('kelas'), 
                'wali_kelas'    => $this->input->get('wali_kelas')
            );
        }
        $dataKelas['getWali'] = $this->db->select('nama_guru')->from('tbl_guru')->get()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('kelas/form', $dataKelas);
        $this->load->view('templates/footer-full');
    }
    public function insertKelas()
    {
        $data = array(
            'nama_kelas'    => $this->input->post('nama_kelas'), 
            'tingkat'       => $this->input->post('kelas'), 
            'wali_kelas'    => $this->input->post('wali_kelas')
        );
        if ($this->DataKelas_m->insertKelas($data)) {
            $this->session->set_flashdata('berhasil','Ditambahkan Nama Kelas : '.$data['nama_kelas']);
            helper_log('add','Menambahkan data kelas','Nama Kelas : ' . $data['nama_kelas']);
        }
        redirect('kelas');
    }
    public function updateKelas()
    {
        $id   = $this->input->post('id'); 
        $data = array(
            'nama_kelas'    => $this->input->post('nama_kelas'), 
            'tingkat'       => $this->input->post('kelas'), 
            'wali_kelas'    => $this->input->post('wali_kelas')
        );
        if ($this->DataKelas_m->updateKelas($id,$data)) {
            $this->session->set_flashdata('berhasil','Diubah Nama Kelas : '.$data['nama_kelas']);
            helper_log('edit','Mengedit data kelas','Nama Kelas : ' . $data['nama_kelas']);
        }
        redirect('kelas');
    }
    public function deleteKelas($id)
    {
        if ($this->DataKelas_m->deleteKelas($id)) {
            $this->session->set_flashdata('berhasil','Dihapus');
            helper_log('delete','Menghapus data kelas','ID  : ' . $id);
        }
        redirect('kelas');
    }
}