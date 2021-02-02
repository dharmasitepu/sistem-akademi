<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileSiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataSekolah_m');
        $this->load->model('Files_m');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Files Privat', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'files' => $this->Files_m->get_private_siswa(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('files/siswa', $dataIsi);
        $this->load->view('templates/footer-full');
    }
}
