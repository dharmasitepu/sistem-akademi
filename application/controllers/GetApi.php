<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetApi extends CI_Controller
{
    public function showSiswa($username = null, $password = null, $nis = 'all', $limit = null)
    {
        if ($username == 'dioclaude' && $password == 'DioGanteng') {
            $this->load->model('Api_m');
            $result = $this->Api_m->showSiswa($nis,$limit);
            $data = ($result) ? ['response' => true, 'data' => $result]
                : ['response' => false, 'data' => 'Nis tidak ditemukan'];
        }
        else {
            $data = ['response' => false, 'data' => 'akses ditolak'];
        }
        echo json_encode($data);
    }
    public function getSiswa($username = null, $password = null, $nis = 'all', $limit = null)
    {
        if ($username == 'dioclaude' && $password == 'DioGanteng') {
            $this->load->model('Api_m');
            $result = $this->Api_m->getSiswa($nis,$limit);
            $data = ($result) ? ['response' => true, 'data' => $result]
                : ['response' => false, 'data' => 'Nis tidak ditemukan'];
        }
        else {
            $data = ['response' => false, 'data' => 'akses ditolak'];
        }
        echo json_encode($data);
    }
}