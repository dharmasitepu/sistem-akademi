<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_ppdb();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataUsers_m');
        $this->load->model('DataPembayaran_m');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Pembayaran PPDB',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah(),
            'user'          => $this->db->get_where('tbl_loginppdb', ['username' => $this->session->userdata('username')])->row_array(),
        );
        $dataIndex = array(
            'user'          => $this->db->get_where('tbl_loginppdb', ['username' => $this->session->userdata('username')])->row_array(),
            'getGelombang' => $this->db->get('tbl_gelombangppdb')->result(), 
            'numPendingPPDB' => $this->DataUsers_m->numPendingPPDB($data['user']['id']),
            'getPendingPPDB' => $this->DataUsers_m->getPendingPPDB($data['user']['id']),
            'getStatusPPDB'  => $this->DataUsers_m->getStatusPPDB($data['user']['id'])->result(),
            'm_Administrasi' => $this->DataPembayaran_m
        );
        $this->load->view('templates/header-pesertaPPDB', $data);
        $this->load->view('users/pembayaran', $dataIndex);
        $this->load->view('templates/footer-pesertaPPDB');
    }
    public function insertPembayaran()
    {
        if ($_FILES['bukti_pembayaran']['size'] == 0) {
            $this->session->set_flashdata('gagal','Masukkan bukti pembayaran terlebih dahulu');
        }
        else{
            $foto  = $_FILES['bukti_pembayaran'];
            $config['upload_path'] 		= './build/images/bukti-pembayaran/ppdb/';
            $config['allowed_types'] 	= 'jpg|png|jpeg';
            $config['max_size'] 		= 5048;
            $config['file_name'] 		= $this->input->post('id_ppdb').'-'.date('Y-m-d');

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('bukti_pembayaran')) {
                $this->session->set_flashdata('gagal','Upload Foto Gagal, Pastikan file dibawah 2Mb dan Berformat jpg,png,img');
            }
            else {
                $foto =  $this->upload->data('file_name');
                if ($this->DataUsers_m->insertPembayaran($this->input->post(),$foto)) {
                    $this->session->set_flashdata('berhasil','Pembayaran berhasil dilakukan, Harap menunggu konfirmasi');
                    helper_log('ppdb','Melakukan Pembayaran PPDB','ID : '.$this->input->post('id_ppdb'));
                }
                else {
                    $this->session->set_flashdata('gagal','Pembayaran gagal dilakukan');
                }
            }
        }
        redirect('users_pembayaran');
    }
}
