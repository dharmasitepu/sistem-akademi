<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        $this->load->model('Wilayah_m');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Profile', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $this->load->view('templates/header', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer-full');
    }
    public function update()
    {
        $data = array(
            'title'         => 'Profile', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah(),
            'provinsi' 	=> $this->db->order_by('nama','asc')->get('wilayah_provinsi')->result()
        );
        $this->load->view('templates/header', $data);
        $this->load->view('profile/form', $data);
        $this->load->view('templates/footer-full');
    }
    public function updateData()
    {
        if($this->db->where('id',1)->update('tbl_profile', $this->input->post()))
        {
            $this->session->set_flashdata('berhasil', 'Di Upadate');
            helper_log('edit','Mengedit data sekolah');
            redirect('profile');
        }
        else{
            $this->session->set_flashdata('gagal', 'Di Upadate');
            redirect('profile/updateData');
        }
    }
    public function updatePhoto()
    {
        $foto_awal= $this->input->post('foto_awal');
        $foto 	  = $_FILES['photo'];
        if ($foto = '') {
            $this->session->set_flashdata('gagal','Foto Tidak Ditemukan');
        }
        else{
            $config['upload_path'] 		= './build/images';
            $config['allowed_types'] 	= 'jpg|png|jpeg';
            $config['max_size'] 		= 3048;
            $config['file_name'] 		= 'logo-sekolah'.date('Y-m-d');

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('gagal','Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img');
            }
            else {
                $targetFile = './build/images/'.$foto_awal;
                unlink($targetFile);
                $foto = array('logo' => $this->upload->data('file_name') );
                if ($this->db->where('id',1)->update('tbl_profile',$foto)) {
                    $this->session->set_flashdata('berhasil','Upload Foto Berhasil');
                    helper_log('upload','Mengupload foto profile sekolah');
                }
            }
        }
        redirect('profile');
    }
}
