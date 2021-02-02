<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        set_zone();
        $this->load->model('DataSekolah_m');
        $this->load->model('LandingPage_m');
    }
    public function kelas($id = 0, $status = NULL)
    {
        if ($status != NULL) {
            if($this->LandingPage_m->activity_kelas($id,$status)){
                $this->session->set_flashdata('berhasil', 'Data tipe kelas berhasil di ubah');
                helper_log('edit','Mengedit data tipe kelas');
            }
            else {
                $this->session->set_flashdata('gagal', 'Data tipe kelas gagal di ubah');
            }
            return redirect('LandingPage/kelas');
        }
        elseif ($this->input->post('judul_kelas',true)) {
            if ($this->LandingPage_m->update_tipekelas($id, $this->input->post())) {
                $this->session->set_flashdata('berhasil', 'Data tipe kelas berhasil di ubah');
                helper_log('edit','Mengedit data tipe kelas');
            }
            else {
                $this->session->set_flashdata('gagal', 'Data tipe kelas gagal di ubah');
            }
            return redirect('LandingPage/kelas');
        }
        $data = array(
            'title'         => 'Data Tipe Kelas', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'getTipe' => $this->db->get('tbl_tipekls')->result(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('landing-page/kelas', $dataIsi);
        $this->load->view('templates/footer-full');
    }

    // Alumni
    public function alumni()
    {
        $data = array(
            'title'         => 'Data Testi Alumni', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'alumni' => $this->db->get('tbl_testialumni')->result(), 
            'quotes' => $this->db->get('tbl_quotes')->row()
        );
        $this->load->view('templates/header', $data);
        $this->load->view('landing-page/alumni', $dataIsi);
        $this->load->view('templates/footer-full');
    }
    public function update_alumni($id)
    {
        if ($this->LandingPage_m->updateAlumni($id,$this->input->post())) {
            $this->session->set_flashdata('berhasil','Mengedit Data alumni Berhasil <br>Nama : '.$nama);
                helper_log('edit','Mengedit data Alumni','Nama  : '. $nama);
        }
        else {
            $this->session->set_flashdata('gagal','Mengedit Data alumni Gagal <br>Nama : '.$nama);
        }
        redirect('LandingPage/alumni');
    }
    public function update_fotoalumni($id)
    {
        $foto_awal= $this->input->post('foto_lama');
        $nama     = $this->input->post('nama');
        $foto 	  = $_FILES['foto'];
        if ($foto = '') {
            $this->session->set_flashdata('gagal','Foto Tidak Ditemukan');
        }
        else{
            $config['upload_path'] 		= './build/images/alumni';
            $config['allowed_types'] 	= 'jpg|png|jpeg';
            $config['max_size'] 		= 2048;
            $config['file_name'] 		= 'alumni'.$id.'-'.date('Y-m-d');

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('gagal','Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img');
            }
            else {
                if ($foto_awal != 'default-male.jpg') {
                    $targetFile = './build/images/alumni/'.$foto_awal;
                    unlink($targetFile);
                }
                $foto = array('image' => $this->upload->data('file_name') );
                if ($this->LandingPage_m->update_fotoalumni($id,$foto)) {
                    $this->session->set_flashdata('berhasil','Upload Foto Berhasil <br>Nama : '.$nama);
                    helper_log('upload','Mengupload foto Alumni','Nama  : '. $nama);
                }
            }
        }
        redirect('LandingPage/alumni');
    }

    // Quotes
    public function update_quotes($id)
    {
        if ($this->LandingPage_m->updateQuotes($id,$this->input->post())) {
            $this->session->set_flashdata('berhasil','Mengedit Data Quotes Berhasil <br>Nama : '.$nama);
                helper_log('edit','Mengedit Quotes Alumni','Nama  : '. $nama);
        }
        else {
            $this->session->set_flashdata('gagal','Mengedit Data Quotes Gagal <br>Nama : '.$nama);
        }
        redirect('LandingPage/alumni');
    }
    public function update_fotoquotes()
    {
        $foto_awal= $this->input->post('foto_lama');
        $nama     = $this->input->post('nama');
        $foto 	  = $_FILES['foto'];
        if ($foto = '') {
            $this->session->set_flashdata('gagal','Foto Tidak Ditemukan');
        }
        else{
            $config['upload_path'] 		= './build/images/alumni';
            $config['allowed_types'] 	= 'jpg|png|jpeg';
            $config['max_size'] 		= 2048;
            $config['file_name'] 		= 'quotes-'.date('Y-m-d');

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('gagal','Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img');
            }
            else {
                if ($foto_awal != 'default-male.jpg') {
                    $targetFile = './build/images/alumni/'.$foto_awal;
                    unlink($targetFile);
                }
                $foto = array('image' => $this->upload->data('file_name') );
                if ($this->LandingPage_m->update_fotoquotes($foto)) {
                    $this->session->set_flashdata('berhasil','Upload Foto Berhasil <br>Nama : '.$nama);
                    helper_log('upload','Mengupload foto Quotes','Nama  : '. $nama);
                }
            }
        }
        redirect('LandingPage/alumni');
    }

    // Kelebihan
    public function kelebihan()
    {
        $data = array(
            'title'         => 'Data Kelebihan Sekolah', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'kelebihan' => $this->db->get('tbl_kelebihansekolah')->result()
        );
        $this->load->view('templates/header', $data);
        $this->load->view('landing-page/kelebihan', $dataIsi);
        $this->load->view('templates/footer-full');
    }
    public function insertKelebihan()
    {
        if ($this->LandingPage_m->num_kelebihan() > 8) {
            $this->session->set_flashdata('gagal','Data Kelebihan sekolah Gagal Ditambahkan, Maksimal 9 Data');
        }
        else {
            if ($this->LandingPage_m->insert_kelebihan($this->input->post())) {
                $this->session->set_flashdata('berhasil','Berhasil Menambahkan kelebihan sekolah');
                helper_log('add','Menambahkan Kelebihan sekolah');
            }
            else{
                $this->session->set_flashdata('gagal','Data Kelebihan sekolah Gagal Ditambahkan, Terjadi masalah pada database');
            }
        }
        redirect('LandingPage/kelebihan');
    }
    public function updateKelebihan($id)
    {
        if ($this->LandingPage_m->update_kelebihan($id,$this->input->post())) {
            $this->session->set_flashdata('berhasil','Berhasil Mengubah kelebihan sekolah');
            helper_log('edit','Mengubah Kelebihan sekolah');
        }
        else{
            $this->session->set_flashdata('gagal','Data Kelebihan sekolah Gagal Diubah, Terjadi masalah pada database');
        }
        redirect('LandingPage/kelebihan');
    }
    public function deleteKelebihan($id)
    {
        if ($this->LandingPage_m->num_kelebihan() == 1) {
            $this->session->set_flashdata('gagal','Data Kelebihan sekolah Gagal dihapus, Minimal memiliki 1 Data');
        }
        else {
            if ($this->LandingPage_m->delete_kelebihan($id)) {
                $this->session->set_flashdata('berhasil','Berhasil menghapus kelebihan sekolah');
                helper_log('delete','Menghapus Kelebihan sekolah');
            }
            else{
                $this->session->set_flashdata('gagal','Data Kelebihan sekolah Gagal dihapus, Terjadi masalah pada database');
            }
        }
        redirect('LandingPage/kelebihan');
    }
}
