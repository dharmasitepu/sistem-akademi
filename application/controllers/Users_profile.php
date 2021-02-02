<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_ppdb();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataUsers_m');
        $this->load->library(array('form_validation'));
    }
    public function index()
    {
        $data = array(
            'title'         => 'Profile PPDB',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah(),
            'user'          => $this->db->get_where('tbl_loginppdb', ['username' => $this->session->userdata('username')])->row_array(),
        );
        $dataIndex = array(
            'user'          => $this->db->get_where('tbl_loginppdb', ['username' => $this->session->userdata('username')])->row_array(),
            'getProfile'    => $this->DataUsers_m->getProfile($data['user']['id'])
        );
        $this->load->view('templates/header-pesertaPPDB', $data);
        $this->load->view('users/profile', $dataIndex);
        $this->load->view('templates/footer-pesertaPPDB');
    }
    public function update()
    {
        if ($_FILES['image']['size'] == 0) {
            if ($this->DataUsers_m->updateProfile($this->input->post())) {
                $this->session->set_flashdata('berhasil','Profile pendaftaran Berhasil diupdate');
                helper_log('ppdb','Mengedit profile pendaftaran');
            }
            else {
                $this->session->set_flashdata('gagal','Profile pendaftaran Gagal diupdate');
            }
        }
        else{
            $foto 	                    = $_FILES['image'];
            $config['upload_path'] 		= './build/images/users/';
            $config['allowed_types'] 	= 'jpg|png|jpeg';
            $config['max_size'] 		= 5048;
            $config['file_name'] 		= $this->input->post('username').'-'.date('Y-m-d');

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('gagal','Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img');
            }
            else {
                if ($this->input->post('fotoawal') != 'default.jpg') {
                    $targetFile = './build/images/users/'.$this->input->post('fotoawal');
                    unlink($targetFile);
                }
                $foto =  $this->upload->data('file_name');
                if ($this->DataUsers_m->updateProfile($this->input->post(),$foto)) {
                    $this->session->set_flashdata('berhasil','Profile pendaftaran Berhasil diupdate');
                    helper_log('ppdb','Mengedit profile pendaftaran');
                }
                else {
                    $this->session->set_flashdata('gagal','Profile pendaftaran Gagal diupdate');
                }
            }
        }
        redirect('users_profile');
    }
    public function changePass()
    {
        $show = $this->db->get_where('tbl_loginppdb', ['username' => $this->session->userdata('username')])->row_array();
        if (password_verify($this->input->post('passlama'),$show['password']) == TRUE) {
            $this->form_validation->set_rules('passbaru', 'Password', 'required|trim|min_length[5]|max_length[20]',[
                'min_length' => 'Password terlalu Pendek !',
                'max_length' => 'Password terlalu Panjang !'
            ]);
            $this->form_validation->set_rules('konfirmpass', 'Password', 'required|trim|matches[passbaru]',[
                'matches' => "Password yang anda masukkan Tidak Sama !"
            ]);
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('gagal',form_error('passbaru').form_error('konfirmpass'));
            } 
            else {
                $this->db->where('username',$this->session->userdata('username'))->update('tbl_loginppdb',['password' => password_hash($this->input->post('konfirmpass'),PASSWORD_DEFAULT)]);
                $this->session->set_flashdata('berhasil','Password anda Berhasil diGanti');
                helper_log('ppdb','Mengganti password akun');
            }
        }
        else{
            $this->session->set_flashdata('gagal','Password yang anda masukkan Salah ');
        }
        redirect('Users_profile');
    }
}
