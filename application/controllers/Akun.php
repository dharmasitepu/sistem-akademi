<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_admin();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataAkun_m');
        $this->load->library(array('form_validation'));
    }
    public function index()
    {
        $data = array(
            'title'         => 'Data Akun', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'getAkun'       => $this->DataAkun_m->getAllAkun()
        );
        $this->load->view('templates/header', $data);
        $this->load->view('akun/index', $dataIsi);
        $this->load->view('templates/footer-full');  
    }
    public function addAccount()
    {
        $data = array(
            'title'         => 'Tambah Akun', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $this->load->view('templates/header', $data);
        $this->load->view('akun/form');
        $this->load->view('templates/footer-full');  
    }
    public function aktifkanAkun($user)
    {
        
        if ($this->DataAkun_m->activeAccount($user)) {
            $this->session->set_flashdata('berhasil','Berhasil Diaktifkan '.$user);
            helper_log('edit','Mengaktifkan akun','User : ' . $user);
            redirect('akun/index','refresh');
        }  
    }
    public function nonaktifkanAkun($user)
    {
        if ($this->DataAkun_m->nonactiveAccount($user)) {
            $this->session->set_flashdata('berhasil','Berhasil Dinonaktifkan '.$user);
            helper_log('edit','Menonaktifkan akun','User : ' . $user);
            redirect('akun/index','refresh');
        }  
    }
    public function hapusAkun($user)
    {
        if ($this->DataAkun_m->deleteAccount($user)) {
            $this->session->set_flashdata('berhasil','Berhasil Dihapus '.$user);
            helper_log('delete','Menghapus akun','User : ' . $user);
            redirect('akun','refresh');
        }  
    }
    public function changePass($username)
    {
        $show = $this->db->get_where('tbl_login', ['username' => $username])->row_array();
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
            helper_log('edit','Mengganti password','User : ' . $username);
        }
        redirect('akun');
    }
    public function addNip($username)
    {
        $cekNis = $this->db->get_where('tbl_guru', ['nip' => $this->input->post('nip')])->num_rows();
        if ($cekNis > 0) {
            $cekDouble = $this->db->get_where('tbl_login', ['nip' => $this->input->post('nip')])->num_rows();
            if ($cekDouble > 0) {
                $this->session->set_flashdata('gagal','Nip Guru : '.$this->input->post('nip').' Sudah digunakan ');
            }
            else{
                $this->db->where('username',$username)->update('tbl_login',['nip' => $this->input->post('nip')]);
                $this->session->set_flashdata('berhasil','Nip Berhasil Ditambahkan');
                helper_log('edit','Menambahkan NIP akun','User : ' . $username);
            }
        }
        else{
            $this->session->set_flashdata('gagal','Nip Guru : '.$this->input->post('nip').' Tidak ditemukan ');
        }
        redirect('akun');
    }
    public function deleteNip($nip)
    {
        if ($this->db->where('nip',$nip)->update('tbl_login',['nip' => ''])) {
            $this->session->set_flashdata('berhasil','Nip : '.$nip.' Berhasil Dihapus ');
            helper_log('delete','Menghapus NIP akun','NIP : ' . $nip);
        }
        else{
            $this->session->set_flashdata('gagal','Nip : '.$nip.' Gagal Dihapus ');
        }
        redirect('akun');
    }
    public function insertAkun()
    {
        /////////////////// FORM VALIDATION //////////////
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_loginppdb.username]|is_unique[tbl_login.username]',[
            'is_unique' => 'Username already in use !'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|is_unique[tbl_loginppdb.telp]|is_unique[tbl_login.telp]',[
            'is_unique' => 'Phone already in use !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_loginppdb.email]|is_unique[tbl_login.email]',[
            'is_unique' => 'Email already in use !'
        ]);
        $this->form_validation->set_rules('role_id', 'Role Id', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|max_length[20]',[
            'min_length' => 'Password too Short !',
            'max_length' => 'Password too Long !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',[
            'matches' => "Password don't match !"
        ]);
        ///////////////// Condition //////////////
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Data Akun', 
                'dataSekolah'   => $this->DataSekolah_m->getSekolah()
            );
            $this->load->view('templates/header', $data);
            $this->load->view('akun/form');
            $this->load->view('templates/footer-full');
        } else {
            $telp       = htmlspecialchars($this->input->post('phone', true));
            $telephone  = preg_replace('/^0/', '+62', $telp);
            $data = array(
                'username'      => htmlspecialchars($this->input->post('username', true)),
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'image'         => 'default.jpg',
                'email'         => htmlspecialchars($this->input->post('email', true)), 
                'telp'          => $telephone,
                'password'      => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'active'        => 1,
                'role_id'       => $this->input->post('role_id'),
                'tgl_daftar'    => date('Y/m/d H:i:s'),
                'nip'           => ''
            );
            if ($this->DataAkun_m->insertRegister($data)) {
                $this->session->set_flashdata('berhasil','Login : '.$data['username'].' Berhasil Ditambahkan ');
                helper_log('add','Menambahkan akun','User : ' . $data['username']);
                redirect('akun','refresh');
            }
            else {
                $this->session->set_flashdata('gagal','Login : '.$data['username'].' Gagal Ditambahkan ');
                redirect('akun/form','refresh');
            }
        }
    }
}