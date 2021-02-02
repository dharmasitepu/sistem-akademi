<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataKelas_m');
        $this->load->model('DataSiswa_m');
        $this->load->model('Wilayah_m'); 
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Data Siswa',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $siswa = array(
            'getSiswa'      => $this->DataSiswa_m->getSiswa(), 
            'isiChat'       => $this->DataSekolah_m->getIsiChat()
        );
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/index', $siswa);
        $this->load->view('templates/footer-full');
    }
    function get_ajax() {
        $list = $this->DataSiswa_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $show) {
            $no++;
            $row = array();
            $onclick = "editFoto('" . $show->nis_lokal ."','". $show->nama_siswa ."','" . $show->foto . "','" . $show->jk . "')";
            $row[] = $no;
            $row[] = '<img style="margin: 0;width: 75px; height: 90px " src="' . base_url('build/images/siswa/').$show->foto . '" alt="img">';
            $row[] = '<strong>' . $show->nis_lokal . '</strong><br>' .
                      $show->nama_siswa . '<br>' .
                      $show->jk . ' , ' . $show->agama . '<br>
                      <button type="button" class="btn btn-primary btn-sm" onclick="'.$onclick.'" style="height:25px; font-size: 13px; padding: 1px 5px; margin: 2px 0px">
                      <i class="fa fa-pencil"> Ubah Foto</i></button>';
            $row[] = $show->nama_kelas;
            $row[] ='<div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="' . sendWhatsapp($show->phone_ortuwali) . '" style="color: green; font-weight: 600; font-size: 18px; padding: 4px 0 0 4px; margin: 0; background: transparent; border: none; width: 25px; height: 25px;" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                            <div style="padding: 7px 2px" class="col-md-8">' .
                                $show->phone_ortuwali . '                            
                            </div>
                        </div>  
                    </div>';
            $row[] = '<div style="max-width:155px">' . $show->alamat . '</div>';
            $row[] = $show->status_siswa;
            $sendPhone = str_replace("+", "%2B", $show->phone_ortuwali);
            $row[] ='<div class="btn-group">
                        <a href="' . site_url() . 'export/fullSiswa/' . $show->nis_lokal . '"
                            class="btn btn-success btn-sm" style="width: 35px" data-toggle="tooltip" data-placement="top" data-original-title="Export Data to Excel"><i class="fa fa-file-excel-o"></i></a>
                        <a href="' . site_url() . 'siswa/form/' . $show->nis_lokal . '"
                            class="btn btn-primary btn-sm" style="width: 35px" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data Siswa"><i class="fa fa-pencil"></i></a>
                        <a href="' . site_url() . 'siswa/detailSiswa/' . $show->nis_lokal . '" data-toggle="tooltip" data-placement="top" data-original-title="Lihat lebih Lengkap"
                            class="btn btn-warning btn-sm" style="float: left;width: 35px"><i
                            class="fa fa-eye"></i></a>
                        <a href="' . site_url() . 'siswa/hapusSiswa/' . $show->nis_lokal . '/' . $show->nik_ayah . '/' . $show->nik_ibu . '/' . $show->nik_wali . '/' . $show->foto . '" data-toggle="tooltip" data-placement="top" data-original-title="Hapus Data Siswa"
                            class="btn btn-danger btn-sm tombol-konfirm" style="float: left;width: 35px"
                            data-judul="Untuk menghapus Akun ?" data-konfirm="Yakin, Hapus Data !"><i
                            class="fa fa-trash"></i></a>
                    </div>';
            
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->DataSiswa_m->count_all(),
            "recordsFiltered" => $this->DataSiswa_m->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function detailSiswa($id)
    {
        $data = array(
            'title'         => 'Detail Siswa',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $datas = array(
            'show'          => $this->DataSiswa_m->getSiswaNis($id)
        );
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/detailSiswa' , $datas);
        $this->load->view('templates/footer-full');
    }
    public function form($nis = NULL)
    {
        $data = array(
            'title'         => 'Form Siswa',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $dataForm = array(
            'kelas'     => $this->DataKelas_m->getKelas(),
            'provinsi' 	=> $this->db->order_by('nama','asc')->get('wilayah_provinsi')->result()
        );
        if ($nis != NULL) {
            $dataForm['getSiswa'] = $this->DataSiswa_m->getSiswaNis($nis);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/form', $dataForm);
        $this->load->view('templates/footer-full');
    }
    public function insertSiswa()
    {
        $nis       = $this->input->post('nis');
        $no_induk  = $this->input->post('no_induk');
        if($nis != "" && $no_induk!= ""){
            $ceknis    = $this->db->where('nis_lokal', $nis)->get('tbl_siswa')->num_rows();
            $ceknoInduk= $this->db->where('no_induk', $no_induk)->get('tbl_siswa')->num_rows();
            if ($ceknis > 0) {
                $this->session->set_flashdata('gagal', 'Ditambahkan - NIS Sudah Digunakan');
            }
            elseif ($ceknoInduk > 0) {
                $this->session->set_flashdata('gagal', 'Ditambahkan - No Induk Sudah Digunakan');
            }
            else {
                if($this->DataSiswa_m->addSiswa($this->input->post()) == true)
                {
                    $this->session->set_flashdata('berhasil', 'Ditambahkan - Nama : '.$this->input->post('nama_siswa'));
                    helper_log('add','Menambahkan data siswa','Nama : '.$this->input->post('nama_siswa'));
                }
                else{
                    $this->session->set_flashdata('gagal', 'Ditambahkan - Nama : '.$this->input->post('nama_siswa'));
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            redirect('siswa/');
        }else{
            $this->session->set_flashdata('gagal', 'Ditambahkan Masukkan NIS dan NISN terlebih dahulu');
            redirect('siswa/form');
        }
    }
    public function updateSiswa()
    {
        if($this->DataSiswa_m->updateSiswa($this->input->post()))
        {
            $this->session->set_flashdata('berhasil', 'Diubah - Nama : '.strip_tags($this->input->post('nama_siswa')));
            helper_log('edit','Mengedit data siswa','Nama : '.strip_tags($this->input->post('nama_siswa')));
        }
        else{
            $this->session->set_flashdata('gagal', 'Diubah - Nama : '.strip_tags($this->input->post('nama_siswa')));
        }
        redirect('siswa');
    }
    public function hapusSiswa($nis,$nik_ayah,$nik_ibu,$nik_wali,$foto)
    {
        if ($nis) {
            $this->DataSiswa_m->deleteSiswa($nis,$nik_ayah,$nik_ibu,$nik_wali);
            if ($foto != 'default-male.jpg' && $foto != 'default-female.jpg') {
                $targetFile = './build/images/siswa/'.$foto;
                unlink($targetFile);
            }
            $this->session->set_flashdata('berhasil', 'Dihapus - Nis : '.$nis);
            helper_log('delete','Menghapus data siswa','NIS : ' . $nis);
        }
        else{
            $this->session->set_flashdata('gagal', 'Dihapus - Nis : '.$nis);
        }
        redirect('siswa');
    }
    public function updatePhoto()
    {
        $nis     = $this->input->post('nis');
        $foto_awal     = $this->input->post('foto_awal');
        $nama     = $this->input->post('nama');
        $foto 	  = $_FILES['foto_siswa'];
        if ($foto = '') {
            $this->session->set_flashdata('gagal','Foto Tidak Ditemukan');
        }
        else{
            $config['upload_path'] 		= './build/images/siswa';
            $config['allowed_types'] 	= 'jpg|png|jpeg';
            $config['max_size'] 		= 2048;
            $config['file_name'] 		= 'nis'.$nis.'-'.date('Y-m-d');

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('foto_siswa')) {
                $this->session->set_flashdata('gagal','Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img');
            }
            else {
                if ($foto_awal != 'default-male.jpg' && $foto_awal != 'default-female.jpg') {
                    $targetFile = './build/images/siswa/'.$foto_awal;
                    unlink($targetFile);
                }
                $foto = array('foto' => $this->upload->data('file_name') );
                if ($this->DataSiswa_m->updatePhoto($nis,$foto)) {
                    $this->session->set_flashdata('berhasil','Upload Foto Berhasil <br>Nis &nbsp;&nbsp;&nbsp;&nbsp;: '.$nis.'<br>Nama : '.$nama);
                    helper_log('upload','Mengupload foto siswa','NIS : '. $nis);
                }
            }
        }
        redirect('siswa');
    }
    public function deleteFoto($nis,$jk,$foto)
    {
        $targetFile = './build/images/siswa/'.$foto;
        unlink($targetFile);
        $newPhoto   = ($jk == 'Laki-Laki') ? 'default-male.jpg' : 'default-female.jpg' ;
        $data       = array( 'foto' => $newPhoto );
        if ($this->DataSiswa_m->updatePhoto($nis,$data)) {
            $this->session->set_flashdata('berhasil','Foto Berhasil Dihapus <br>Nis : '.$nis);
            helper_log('edit','Mengedit data siswa','NIS : ' . $nis);
        }
        else{
            $this->session->set_flashdata('gagal','Foto Gagal Dihapus');
        }
        redirect('siswa');
    }
}