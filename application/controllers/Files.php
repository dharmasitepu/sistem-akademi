<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        set_zone();
        $this->load->model('DataSekolah_m');
        $this->load->model('Files_m');
    }

    // FIlE UMUM
    public function umum()
    {
        $data = array(
            'title'         => 'Files Umum', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'files' => $this->Files_m->get_umum(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('files/umum', $dataIsi);
        $this->load->view('templates/footer-full');
    }
    // Privat
    public function private()
    {
        $data = array(
            'title'         => 'Files Privat', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $dataIsi = array(
            'files' => $this->Files_m->get_private(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('files/private', $dataIsi);
        $this->load->view('templates/footer-full');
    }

    // Method
    public function addFiles($type)
    {
        if ($type == 'umum') {
            $file_name      = $this->input->post('file_name');
            $uploaded_by    = $this->session->userdata('username');
            $file 	        = $_FILES['files'];
            if ($file = '') {
                $this->session->set_flashdata('gagal','File Tidak Ditemukan');
            }
            else{
                $config['upload_path'] 		= './build/files/umum/';
                $config['allowed_types'] 	= 'rar|pdf|zip|docx|docs|txt|pptx|xlsx|xls|img|jpg|jpeg|png';
                $config['max_size'] 		= 10000;
                $config['file_name'] 		= $file_name.'-'.date('Y-m-d');

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('files')) {
                    $this->session->set_flashdata('gagal','Upload File Gagal, Pastikan file dibawah 10Mb dan Berformat <br>rar | pdf | zip | docx | docs | txt | pptx | xlsx | xls | img | jpg | jpeg | png');
                }
                else {
                    // $targetFile = './build/files/umum/'.$foto_awal;
                    // unlink($targetFile);
                    $file = [
                        'file_name'     => $file_name,
                        'upload_name'   => $this->upload->data('file_name'),
                        'uploaded_by'   => $uploaded_by,
                        'access'        => 0,
                        'kelas'         => 1001,
                        'uploaded_at'   => date('Y:m:d H:i:s')
                    ];
                    if ($this->Files_m->add_file($file)) {
                        $this->session->set_flashdata('berhasil','Upload Files Berhasil<br>File : '.$file_name);
                        helper_log('upload','Mengupload File untuk Umum','File : '. $file_name);
                    }
                    else{
                        $this->session->set_flashdata('gagal','Upload File Gagal, Terjadi masalah pada database');
                    }
                }
            }
            redirect('Files/umum');
        }
        elseif ($type == 'private') {
            $file_name      = $this->input->post('file_name');
            $access         = $this->input->post('access');
            $kelas          = ($this->input->post('kelas') != NULL) ? $this->input->post('kelas') : 1001;
            $uploaded_by    = $this->session->userdata('username');
            $file 	        = $_FILES['files'];
            if ($file = '') {
                $this->session->set_flashdata('gagal','File Tidak Ditemukan');
            }
            else{
                $config['upload_path'] 		= './build/files/private/';
                $config['allowed_types'] 	= 'rar|pdf|zip|docx|docs|txt|pptx|xlsx|xls|img|jpg|jpeg|png';
                $config['max_size'] 		= 10000;
                $config['file_name'] 		= $file_name.'-'.date('Y-m-d');

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('files')) {
                    $this->session->set_flashdata('gagal','Upload File Gagal, Pastikan file dibawah 10Mb dan Berformat <br>rar | pdf | zip | docx | docs | txt | pptx | xlsx | xls | img | jpg | jpeg | png');
                }
                else {
                    $file = [
                        'file_name'     => $file_name,
                        'upload_name'   => $this->upload->data('file_name'),
                        'uploaded_by'   => $uploaded_by,
                        'access'        => $access,
                        'kelas'         => $kelas,
                        'uploaded_at'   => date('Y:m:d H:i:s')
                    ];
                    if ($this->Files_m->add_file($file)) {
                        $this->session->set_flashdata('berhasil','Upload Files Berhasil<br>File : '.$file_name);
                        helper_log('upload','Mengupload File untuk Umum','File : '. $file_name);
                    }
                    else{
                        $this->session->set_flashdata('gagal','Upload File Gagal, Terjadi masalah pada database');
                    }
                }
            }
            redirect('Files/private');
        }
    }
    public function editFiles($type)
    {
        if ($type == 'umum') {
            $file_name      = $this->input->post('file_name');
            $id             = $this->input->post('id');
            $file_awal      = $this->input->post('file_awal');
            $uploaded_by    = $this->session->userdata('username');
            $file 	        = $_FILES['files'];
            if ($_FILES['files']['name'] == "") {
                $file = [
                    'file_name'     => $file_name,
                ];
                if ($this->Files_m->edit_file($id,$file)) {
                    $this->session->set_flashdata('berhasil','Edit Files Berhasil<br>File : '.$file_name);
                    helper_log('upload','Edit File untuk Umum','File : '. $file_name);
                }
                else{
                    $this->session->set_flashdata('gagal','Edit File Gagal, Terjadi masalah pada database');
                }
            }
            else{
                $config['upload_path'] 		= './build/files/umum/';
                $config['allowed_types'] 	= 'rar|pdf|zip|docx|docs|txt|pptx|xlsx|xls|img|jpg|jpeg|png';
                $config['max_size'] 		= 10000;
                $config['file_name'] 		= $file_name.'-'.date('Y-m-d');

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('files')) {
                    $this->session->set_flashdata('gagal','Upload File Gagal, Pastikan file dibawah 10Mb dan Berformat <br>rar | pdf | zip | docx | docs | txt | pptx | xlsx | xls | img | jpg | jpeg | png');
                }
                else {
                    $targetFile = './build/files/umum/'.$file_awal;
                    unlink($targetFile);
                    $file = [
                        'file_name'     => $file_name,
                        'upload_name'   => $this->upload->data('file_name'),
                        'uploaded_by'   => $uploaded_by,
                        'uploaded_at'   => date('Y:m:d H:i:s')
                    ];
                    if ($this->Files_m->edit_file($id,$file)) {
                        $this->session->set_flashdata('berhasil','Upload Files Berhasil<br>File : '.$file_name);
                        helper_log('upload','Mengupload File untuk Umum','File : '. $file_name);
                    }
                    else{
                        $this->session->set_flashdata('gagal','Upload File Gagal, Terjadi masalah pada database');
                    }
                }
            }
            redirect('Files/umum');
        }
        if ($type == 'private') {
            $id             = $this->input->post('id');
            $file_name      = $this->input->post('file_name');
            $file_awal      = $this->input->post('file_awal');
            $uploaded_by    = $this->session->userdata('username');
            $access         = $this->input->post('access');
            $kelas          = ($this->input->post('kelas') != NULL) ? $this->input->post('kelas') : 1000;
            $file 	        = $_FILES['files'];
            if ($_FILES['files']['name'] == "") {
                $file = [
                    'file_name'     => $file_name,
                    'access'        => $access,
                    'kelas'         => $kelas
                ];
                if ($this->Files_m->edit_file($id,$file)) {
                    $this->session->set_flashdata('berhasil','Edit Files Berhasil<br>File : '.$file_name);
                    helper_log('upload','Edit File untuk Umum','File : '. $file_name);
                }
                else{
                    $this->session->set_flashdata('gagal','Edit File Gagal, Terjadi masalah pada database');
                }
            }
            else{
                $config['upload_path'] 		= './build/files/private/';
                $config['allowed_types'] 	= 'rar|pdf|zip|docx|docs|txt|pptx|xlsx|xls|img|jpg|jpeg|png';
                $config['max_size'] 		= 10000;
                $config['file_name'] 		= $file_name.'-'.date('Y-m-d');

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('files')) {
                    $this->session->set_flashdata('gagal','Upload File Gagal, Pastikan file dibawah 10Mb dan Berformat <br>rar | pdf | zip | docx | docs | txt | pptx | xlsx | xls | img | jpg | jpeg | png');
                }
                else {
                    $targetFile = './build/files/umum/'.$file_awal;
                    unlink($targetFile);
                    $file = [
                        'file_name'     => $file_name,
                        'upload_name'   => $this->upload->data('file_name'),
                        'uploaded_by'   => $uploaded_by,
                        'uploaded_at'   => date('Y:m:d H:i:s')
                    ];
                    if ($this->Files_m->edit_file($id,$file)) {
                        $this->session->set_flashdata('berhasil','Upload Files Berhasil<br>File : '.$file_name);
                        helper_log('upload','Mengupload File untuk Umum','File : '. $file_name);
                    }
                    else{
                        $this->session->set_flashdata('gagal','Upload File Gagal, Terjadi masalah pada database');
                    }
                }
            }
            redirect('Files/private');
        }
    }
    public function deleteFile($type,$id,$upload_name)
    {
        if ($this->Files_m->delete_file($id)) {
            unlink('./build/files/'.$type.'/'.$upload_name);
            $this->session->set_flashdata('berhasil','Delete Files Berhasil<br>File : '.$upload_name);
            helper_log('delete','Delete File untuk Umum','File : '. $upload_name);
        }
        else{
            $this->session->set_flashdata('gagal','Delete File Gagal, Terjadi masalah pada database');
        }
        redirect('Files/' . $type);
    }

    public function s_kelas()
    {
        $this->load->model('DataKelas_m');
        $kelas = $this->DataKelas_m->getKelas();
        $out ='';

        $out.='<div class="item form-group">
            <label for="password" class="control-label col-md-3" style="text-align: right">Kelas </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <select name="kelas" class="form-control">
                    <option value="1000">Semua Kelas</option>';
                    foreach ($kelas as $show) {
                        $out .='<option value="'.$show->id.'">'.$show->nama_kelas.'</option>';
                    }
                $out.='</select>
            </div>
        </div>';
        echo $out;
    }

}
