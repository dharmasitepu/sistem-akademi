<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOpratorGuru();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataAkun_m');
        $this->load->library(array('form_validation'));
    }
    public function index()
    {
        $data = array(
            'title'         => 'Profile PPDB',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah(),
            'user'          => $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array(),
        );
        $dataIndex = array(
            'user'          => $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array(),
            'getProfile'    => $this->DataAkun_m->getProfile($data['user']['id'])
        );
        $this->load->view('templates/header', $data);
        $this->load->view('akun/profil', $dataIndex);
        $this->load->view('templates/footer-full');
    }
    public function update()
    {
        if ($_FILES['image']['size'] == 0) {
            if ($this->DataAkun_m->updateProfile($this->input->post())) {
                $this->session->set_flashdata('berhasil','Profile Berhasil diupdate');
                helper_log('edit','Mengedit profile pribadi');
            }
            else {
                $this->session->set_flashdata('gagal','Profile Gagal diupdate');
            }
        }
        else{
            $foto 	  = $_FILES['image'];
            $config['upload_path'] 		= './build/images/users/';
            $config['allowed_types'] 	= 'jpg|png|jpeg';
            $config['max_size'] 		= 4048;
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
                if ($this->DataAkun_m->updateProfile($this->input->post(),$foto)) {
                    $this->session->set_flashdata('berhasil','Profile Berhasil diupdate');
                    helper_log('edit','Mengedit dan mengupload foto profile');
                }
                else {
                    $this->session->set_flashdata('gagal','Profile Gagal diupdate');
                }
            }
        }
        redirect('profil_akun');
    }
    public function changePass()
    {
        $show = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array();
        if (password_verify($this->input->post('passlama'),$show['password'])) {
            $this->form_validation->set_rules('passbaru', 'Password', 'required|trim|min_length[5]|max_length[20]',[
                'min_length' => 'Password terlalu Pendek !',
                'max_length' => 'Password terlalu Panjang !'
            ]);
            $this->form_validation->set_rules('konfirmpass', 'Password', 'required|trim|matches[passbaru]',[
                'matches' => 'Password yang anda masukkan Tidak Sama !'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('gagal',form_error('passbaru').form_error('konfirmpass'));
            } 
            else {
                $this->db->where('username',$this->session->userdata('username'))->update('tbl_login',['password' => password_hash($this->input->post('konfirmpass'),PASSWORD_DEFAULT)]);
                $this->session->set_flashdata('berhasil','Password anda Berhasil diGanti');
                helper_log('edit','Mengganti password akun pribadi');
            }
        }
        else{
            $this->session->set_flashdata('gagal','Password yang anda masukkan Salah ');
        }
        redirect('profil_akun');
    }
}