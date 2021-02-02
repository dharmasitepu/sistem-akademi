<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_ppdb();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataUsers_m');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Formulir PPDB',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah(),
            'user'          => $this->db->get_where('tbl_loginppdb', ['username' => $this->session->userdata('username')])->row_array(),
        );
        $dataIndex = array(
            'user'          => $this->db->get_where('tbl_loginppdb', ['username' => $this->session->userdata('username')])->row_array(),
            'provinsi' 	    => $this->db->order_by('nama','asc')->get('wilayah_provinsi')->result(),
        );
        if (!empty($query = $this->db->get_where('tbl_datappdb', ['id_datappdb' => $data['user']['id']])->row())) {
            $dataIndex['getForm'] = $query;
        }
        $this->load->view('templates/header-pesertaPPDB', $data);
        $this->load->view('users/form', $dataIndex);
        $this->load->view('templates/footer-pesertaPPDB');
    }
    public function insertForm()
    {
        if ($this->DataUsers_m->insertForm($this->input->post('id_datappdb'),$this->input->post())) {
            $this->session->set_flashdata('berhasil','Formulir pendaftaran Berhasil ditambahkan');
            helper_log('ppdb','Mengisi formulir pendaftaran');
        }
        else {
            $this->session->set_flashdata('gagal','Formulir pendaftaran Gagal ditambahkan');
        };
        redirect('Users_form');
    }
    public function updateForm()
    {
        if ($this->DataUsers_m->updateForm($this->input->post('id_datappdb'),$this->input->post())) {
            $this->session->set_flashdata('berhasil','Formulir pendaftaran Berhasil diupdate');
            helper_log('ppdb','Mengedit form pendaftaran');
        }
        else {
            $this->session->set_flashdata('gagal','Formulir pendaftaran Gagal diupdate');
        };
        redirect('Users_form');
    }
}
