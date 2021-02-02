<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        set_zone();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataLogin_m');
        $this->load->model('DataAktivitas_m');
    }
    public function user()
    {
        $data = array(
            'title'         => 'History Login',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('history/user');
        $this->load->view('templates/footer-full');
    }
    public function aktivitas()
    {
        $data = array(
            'title'         => 'History Aktivitas',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('history/aktivitas');
        $this->load->view('templates/footer-full');
    }
    function get_login() {
        $list = $this->DataLogin_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $show) {
            $no++;
            $row = array();
            // Logo for browser
            $browser = strtolower($show->browser);
            $logo   = (strpos($browser,'chrome') !== FALSE) ? 'fab fa-chrome'
                    : ((strpos($browser,'firefox') !== FALSE) ? 'fab fa-firefox-browser'
                    : ((strpos($browser,'safari') !== FALSE) ? 'fab fa-safari'
                    : ((strpos($browser, 'edge') !== FALSE) ? 'fab fa-edge' : 'fab fa-safari')));
            // Logo for OS
            $os = strtolower($show->os);
            $logos  = (strpos($os,'mac') !== FALSE) ? 'fab fa-apple'
                    : ((strpos($os,'windows') !== FALSE) ? 'fab fa-windows'
                    : ((strpos($os,'android') !== FALSE) ? 'fab fa-android'
                    : ((strpos($os,'ios') !== FALSE) ? 'fab fa-apple'
                    : ((strpos($os, 'linux') !== FALSE) ? 'fab fa-linux' : 'fab fa-android'))));
            // Logo for tipe
            $logotipe = ($show->tipe == 'login') ? 'fa fa-sign-in' : 'fa fa-sign-out' ;
            $color    = ($show->tipe == 'login') ? 'blue' : 'red' ;

            $row[] = $no;
            $row[] = '<td>' . $show->username . '<br>' . $show->role . '</td>';
            $row[] = '<td><div class="'.$color.'"><i class="'.$logotipe.'"></i> ' . $show->tipe . '</div></td>';
            $row[] = '<td>' . date('Y:m:d H:i:s', $show->time) . '<br>' . selisihWaktu('now',date('Y:m:d H:i:s', $show->time)) . ' yang lalu</td>';
            $row[] = '<td>' . $show->ip_address . '</td>';
            $row[] = '<td><i class="'.$logos.'"></i> ' . $show->os . '</td>';
            $row[] = '<td><i class="'.$logo.'"></i> ' . $show->browser . '</td>';
            $row[] = '<td>
                        <a style="width: 100%" href="' . site_url(). 'history/deleteHistoryUser/'.$show->id_users.'"
                        class="btn btn-danger btn-sm tombol-konfirm" style="float: left;"
                        data-judul="Untuk menghapus History ?" data-konfirm="Yakin, Hapus History !"><i
                        class="fa fa-trash"></i> Hapus</a>            
                    </td>';

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->DataLogin_m->count_all(),
            "recordsFiltered" => $this->DataLogin_m->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function deleteHistoryUser($id)
    {
        if ($this->DataLogin_m->deleteHistoryUser($id)) {
            $this->session->set_flashdata('berhasil','History user berhasil dihapus');
            helper_log('delete','Menghapus history user');
        }
        else {
            $this->session->set_flashdata('gagal','History user gagal dihapus');
        }
        redirect('history/user');
    }

    // Log Aktivitas
    function get_aktivitas() {
        $list = $this->DataAktivitas_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $show) {
            $no++;
            $row = array();
            // Logo for browser
            $tipe   = strtolower($show->tipe);
            $color = '';
            // set Logo
            ($tipe == 1) ? $logo = 'fas fa-plus'
            : (($tipe == 2) ? $logo = 'fas fa-edit' 
            : (($tipe == 3) ? $logo = 'fas fa-trash' 
            : (($tipe == 4) ? $logo = 'fas fa-file-import' 
            : (($tipe == 5) ? $logo = 'fas fa-file-export' 
            : (($tipe == 6) ? $logo = 'fas fa-image' 
            : (($tipe == 7) ? $logo = 'fas fa-dollar' 
            : (($tipe == 8) ? $logo = 'fas fa-database' 
            : (($tipe == 9) ? $logo = 'fas fa-file-pdf' 
            : (($tipe == 10) ? $logo = 'fa fa-user' 
            : $logo = 'fas fa-history')))))))));
            // Set Tipe
            ($tipe == 1) ? $tipes = 'Add'
            : (($tipe == 2) ? $tipes = 'Edit' 
            : (($tipe == 3) ? $tipes = 'Delete' 
            : (($tipe == 4) ? $tipes = 'Import' 
            : (($tipe == 5) ? $tipes = 'Export' 
            : (($tipe == 6) ? $tipes = 'Upload' 
            : (($tipe == 7) ? $tipes = 'Bayar' 
            : (($tipe == 8) ? $tipes = 'Backup' 
            : (($tipe == 9) ? $tipes = 'Print' 
            : (($tipe == 10) ? $tipes = 'PPDB' 
            : $tipes = 'fas fa-history')))))))));

            $row[] = $no;
            $row[] = '<td>' . $show->user . '</td>';
            $row[] = '<td><div class="'.$color.'"><i class="'.$logo.'"></i> ' . $tipes . '</div></td>';
            $row[] = '<td>' .  $show->time . '<br>' . selisihWaktu(now(), $show->time) . ' yang lalu</td>';
            $row[] = '<td>' . $show->desc . '</td>';
            $row[] = '<td>' . $show->ket . '</td>';
            $row[] = '<td>
                        <a style="width: 100%" href="' . site_url(). 'history/deleteHistoryAktivitas/'.$show->id.'"
                        class="btn btn-danger btn-sm tombol-konfirm" style="float: left;"
                        data-judul="Untuk menghapus History ?" data-konfirm="Yakin, Hapus History !"><i
                        class="fa fa-trash"></i> Hapus</a>            
                    </td>';

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->DataAktivitas_m->count_all(),
            "recordsFiltered" => $this->DataAktivitas_m->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    // public function deleteHistoryAktivitas($id)
    // {
    //     if ($this->DataAktivitas_m->deleteHistoryAktivitas($id)) {
    //         $this->session->set_flashdata('berhasil','History aktivitas berhasil dihapus');
    //     }
    //     else {
    //         $this->session->set_flashdata('gagal','History aktivitas gagal dihapus');
    //     }
    //     redirect('history/aktivitas');
    // }
}