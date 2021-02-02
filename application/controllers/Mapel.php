<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataGuru_m');
        $this->load->model('Mapel_m');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Mata Pelajaran', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $isi = array(
            'getMapel' => $this->Mapel_m->getMapel(), 
            'modelGuru' => $this->DataGuru_m
        );
        $this->load->view('templates/header', $data);
        $this->load->view('mapel/index', $isi);
        $this->load->view('templates/footer-full');
    }
    public function form($id = NULL, $nama_mapel = NULL, $kelas = NULL, $gol = NULL, $guru1 = NULL, $guru2 = NULL, $guru3 = NULL, $guru4 = NULL)
    {
        
        $data = array(
            'title'         => 'Mapel', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataMapel = array(
            'id'    => NULL,
            'nama_mapel'    => NULL,
            'kelas'    => NULL,
            'gol'    => NULL,
            'guru'    => $this->DataGuru_m->getGuruDikit(),
            'guru1'     => NULL,
            'guru2'     => NULL,
            'guru3'     => NULL,
            'guru4'     => NULL
        );
        if ($this->input->get('nama_mapel')) {
            $dataMapel = array(
                'id'        => $this->input->get('id'),
                'nama_mapel'=> $this->input->get('nama_mapel'),
                'kelas'     => $this->input->get('kelas'),
                'gol'       => $this->input->get('gol'),
                'guru'      => $this->DataGuru_m->getGuruDikit(),
                'guru1'     => $this->input->get('guru1'),
                'guru2'     => $this->input->get('guru2'),
                'guru3'     => $this->input->get('guru3'),
                'guru4'     => $this->input->get('guru4')
            );
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mapel/form',$dataMapel);
        $this->load->view('templates/footer-full');
    }
    public function insertMapel()
    {
        $cek_mapel = $this->db->where('nama_mapel',$this->input->post('nama_mapel'))->get('tbl_mapel')->num_rows();
        if ($cek_mapel > 0) {
            $this->session->set_flashdata('gagal','Ditambahkan Nama Mapel : '.$this->input->post('nama_mapel').' Sudah Ada');
        }
        else{
            if ($this->Mapel_m->insertMapel($this->input->post())) {
                $this->session->set_flashdata('berhasil','Ditambahkan Nama Mapel : '.$this->input->post('nama_mapel'));
                helper_log('add','Menambahkan data mapel','Nama mapel : '.$this->input->post('nama_mapel'));
            }
            else{
                $this->session->set_flashdata('gagal','Ditambahkan Nama Mapel : '.$this->input->post('nama_mapel'));
            }
        }
        redirect('mapel');
    }
    public function updateMapel()
    {   
        if ($this->input->post('nama_mapel') != $this->input->post('nama_awal')) {
            $cek_mapel = $this->db->where('nama_mapel',$this->input->post('nama_mapel'))->get('tbl_mapel')->num_rows();
            if ($cek_mapel > 0) {
                $this->session->set_flashdata('gagal','Dirubah Nama Mapel : '.$this->input->post('nama_mapel').' Sudah Ada');
            }
        }
        else{
            if ($this->Mapel_m->updateMapel($this->input->post('id'),$this->input->post())) {
                $this->session->set_flashdata('berhasil','Dirubah Nama Mapel : '.$this->input->post('nama_mapel'));
                helper_log('edit','Mengedit data mapel','Nama mapel : '.$this->input->post('nama_mapel'));
            }
            else{
                $this->session->set_flashdata('gagal','Dirubah Nama Mapel : '.$this->input->post('nama_mapel'));
            }
        }
        redirect('mapel');
    }
    public function deleteMapel($id)
    {
        $nama_mapel = $this->input->get('nama');
        if ($this->Mapel_m->deleteMapel($id)) {
            $this->session->set_flashdata('berhasil','Dihapus Nama Mapel : '.$nama_mapel);
            helper_log('delete','Menghapus data mapel','Nama mapel : ' . $nama_mapel);
        }
        else {
            $this->session->set_flashdata('gagal','Dihapus Nama Mapel : '.$nama_mapel);
        }
        redirect('mapel');
    }
}