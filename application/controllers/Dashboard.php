<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        set_zone();
        $this->load->model('DataSekolah_m');
    }
    public function index()
    {
        $data = [
            'sekolah'       => $this->DataSekolah_m->getSekolah(),
            'gelombang'     => $this->db->get('tbl_gelombangppdb')->result(),
            'tipe_kelas'    => $this->db->get('tbl_tipekls')->result(),
            'alumni'        => $this->db->get('tbl_testialumni')->result(),
            'quotes'        => $this->db->get('tbl_quotes')->row(),
            'kelebihan'     => $this->db->get('tbl_kelebihansekolah')->result()
        ];
        $this->load->view('dashboard/index',$data);
    }
    public function files()
    {
        $this->load->model('Files_m');
        $data = [
            'sekolah'       => $this->DataSekolah_m->getSekolah(),
            'num_file'      => $this->Files_m->get_num_umum(),
            'file'          => $this->Files_m->get_umum()
        ];
        $this->load->view('dashboard/files',$data);
    }
    public function whatsapp()
    {
        $nama = $this->input->post('nama');
        $text = $this->input->post('text');

        $link = 'https://api.whatsapp.com/send?phone=6281271130255&text=Saya%20'.$nama.',%0A'.$text;
        redirect ($link);

    }
}