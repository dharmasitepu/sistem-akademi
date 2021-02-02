<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        $this->load->model('Ppdb_m');
        $this->load->model('Wilayah_m');
        $this->load->model('DataKelas_m');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Data PPDB',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $ppdb = array(
            'getPeserta'    => $this->DataSekolah_m->getPeserta(),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('ppdb/index' , $ppdb);
        $this->load->view('templates/footer-full');
    }
    public function kelompok()
    {
        $data = array(
            'title'         => 'Data PPDB',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $ppdb = array(
            'getKelompok'    => $this->Ppdb_m->getKelompok(),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('ppdb/kelompok' , $ppdb);
        $this->load->view('templates/footer-full');
    }
    public function addKelompok()
    {
        if ($this->Ppdb_m->addKlmpk($this->input->post())) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan ! Kelompok : '.$this->input->post('nama_kelompok'));
        }
        redirect('ppdb/kelompok');
    }
    public function updateKelas($id)
    {
        if ($this->db->where('nis_lokal',$id)->update('tbl_siswa',['kelas' => $this->input->post('kelas')])) {
            $this->session->set_flashdata('berhasil', 'Kelas Berhasil Diganti ');
            helper_log('edit','Mengedit data kelas calon PPDB','ID : '.$id);
        }
        redirect('ppdb');
    }
    public function detail($id)
    {
        $data = array(
            'title'         => 'Data PPDB',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $ppdb = array(
            'show'          => $this->Ppdb_m->detailPendaftar($id)
        );
        $this->load->view('templates/header', $data);
        $this->load->view('ppdb/detail' , $ppdb);
        $this->load->view('templates/footer-full');
    }
    public function resetStatus($id)
    {
        if ($this->Ppdb_m->reset_Status($id)) {
            $this->session->set_flashdata('berhasil', 'Berhasil Dibatalkan');
        }
        redirect('ppdb');
    }
    public function setujuiPendaftar($id)
    {
        $cek = $this->db->get_where('tbl_siswa',['nis_lokal' => $this->input->post('nis_lokal')])->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('gagal', 'Di Setujui, Nis : '.$this->input->post('nis_lokal').' Sudah digunakan');
        }
        else {
            if ($this->Ppdb_m->setujuiPendaftaran($id,$this->input->post())) {
                $this->session->set_flashdata('berhasil', 'Berhasil DiSetujui');
            }
        }
        redirect('ppdb');
    }
    public function tolakPendaftar($id)
    {
        if ($this->Ppdb_m->tolakPendaftaran($id,$this->input->post())) {
            $this->session->set_flashdata('berhasil', 'Berhasil DiTolak');
        }
        redirect('ppdb');
    }
    public function Peserta()
    {
        $data = array(
            'title'         => 'Tambah PPDB', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataUpdate = array(
            'id'        => NULL,
            'username'  => NULL,
            'email'     => NULL,
            'telp'      => NULL
        );
        if($this->input->get('username'))
        {
            $dataUpdate = array(
                'id'        => $this->input->get('id'),
                'username'  => $this->input->get('username'),
                'email'     => $this->input->get('email'),
                'telp'      => $this->input->get('telp')
            );
        }
        $this->load->view('templates/header', $data);
        $this->load->view('ppdb/form', $dataUpdate);
        $this->load->view('templates/footer-full');
    }
    public function Pengumuman()
    {
        $data = array(
            'title'         => 'Data PPDB',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() ,
            'showPengumuman'  => $this->db->get('tbl_pengumumanppdb')->row()
        );
        $this->load->view('templates/header', $data);
        $this->load->view('ppdb/pengumuman');
        $this->load->view('templates/footer-full');
    }
    public function updatePengumuman()
    {
        if ($this->Ppdb_m->updatepengumuman($this->input->post())) {
            $this->session->set_flashdata('berhasil', 'Berhasil Di update');
            helper_log('edit','Mengedit pengumuman PPDB');
        }
        redirect('ppdb/pengumuman');
    }
    public function insertPPDB()
    {
        $user       = $this->input->post('username');
        $email      = $this->input->post('email');
        $pass       = $this->input->post('password');
        $telp       = $this->input->post('phone');
        $telephone  = preg_replace('/^0/', '+62', $telp);
        $cekuser    = $this->db->where('username', $user)->get('tbl_loginppdb')->num_rows();
        $cekuser1   = $this->db->where('username', $user)->get('tbl_login')->num_rows();
        $cekemail   = $this->db->where('email', $email)->get('tbl_loginppdb')->num_rows();
        $cekemail1  = $this->db->where('email', $email)->get('tbl_login')->num_rows();
        $ceknomor   = $this->db->where('telp', $telephone)->get('tbl_loginppdb')->num_rows();
        if ($cekuser > 0) {
            $this->session->set_flashdata('gagal', 'Ditambahkan - Username Sudah Digunakan');
        }
        elseif ($cekuser1 > 0) {
            $this->session->set_flashdata('gagal', 'Ditambahkan - Username Sudah Digunakan');
        }
        elseif ($cekemail > 0) {
            $this->session->set_flashdata('gagal', 'Ditambahkan - Email Sudah Digunakan');
        }
        elseif ($cekemail1 > 0) {
            $this->session->set_flashdata('gagal', 'Ditambahkan - Email Sudah Digunakan');
        }
        elseif ($ceknomor > 0) {
            $this->session->set_flashdata('gagal', 'Ditambahkan - Nomor Sudah Digunakan');
        }
        else{
            // Cek Last ID
            $cekId = $this->db->like('id',date('Y'))->select('id')->order_by('id','DESC')->limit(1)->get('tbl_loginppdb')->row()->id;
            if ($cekId != NULL) {
                $id = explode('-',$cekId);
                $ids = $id[1];
                $idPPDB = date('Y').'-'.str_pad($ids+1, 3, '0', STR_PAD_LEFT);
            }
            else{
                $idPPDB = date('Y').'-001';
            }
            $dataLogin = array(
                'id'            => $idPPDB,
                'username'      => $user,
                'name'          => 'default',
                'image'          => 'default',
                'password'      => password_hash($pass, PASSWORD_BCRYPT),
                'email'         => $email, 
                'telp'          => $telephone,
                'active'        => 1,
                'formulir'      => 'Belum',
                'status'        => 'Menunggu',
                'role_id'       => 2,
                'waktu_daftar'  => date('Y/m/d H:i:s'),
                'waktu_update'  => date('0000-00-00 00:00:00'),
                'nis'           => ''
            );
            $this->Ppdb_m->insertDataPPDB($dataLogin);
            $this->session->set_flashdata('berhasil', 'Ditambahkan - Username : '.$user);
            helper_log('add','Menambahkan akun PPDB','User : ' . $user);
        }
        redirect('ppdb');
    }
    public function updatePPDB()
    {
        $id = $this->input->post('id');
        $telp       = $this->input->post('phone');
        $telephone  = preg_replace('/^0/', '+62', $telp);
        $data = array(
            'username'      => $this->input->post('username'),
            'email'         => $this->input->post('email'),
            'telp'          => $telephone
        );
        if($this->input->post('password'))
        {
            $pass = $this->input->post('password');
            $data['password'] = password_hash($pass, PASSWORD_BCRYPT);
        }
        if ($this->Ppdb_m->updateAkun($id, $data)) {
            $this->session->set_flashdata('berhasil', 'Diubah - ID : '.$id);
            helper_log('edit','Mengedit data login PPDB','ID : ' . $id);
        }
        redirect('ppdb');
    }
    public function deleteLoginPPDB($id)
    {
        if ($this->Ppdb_m->deleteAkun($id)) {
            $this->session->set_flashdata('berhasil', 'Dihapus - ID : '.$id);
            helper_log('delete','Menghapus data login PPDB','ID : ' . $id);
        }
        redirect('ppdb');
    }
}