<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_ppdb();
        $this->load->model('DataSekolah_m');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Dashboard PPDB',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah(),
            'user'          => $this->db->get_where('tbl_loginppdb', ['username' => $this->session->userdata('username')])->row_array()
        );
        $dataIsi = array(
            'user'          => $this->db->get_where('tbl_loginppdb', ['username' => $this->session->userdata('username')])->row_array(),
            'showPengumuman'  => $this->db->get('tbl_pengumumanppdb')->row()
        );
        $this->load->view('templates/header-pesertaPPDB', $data);
        $this->load->view('users/index', $dataIsi);
        $this->load->view('templates/footer-pesertaPPDB');
    } 
}
