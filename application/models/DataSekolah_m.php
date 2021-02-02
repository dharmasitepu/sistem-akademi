<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSekolah_m extends CI_Model
{
    public function getSekolah()
    {
        return $this->db->get('tbl_profile')->row();
    }
    public function getIsiChat()
    {
        return $this->db->where('tipe','default')->get('tbl_chatwhatsapp')->row();
    }
    public function getPeserta()
    {
        return $this->db->select('tbl_loginppdb.*,tbl_statuspendaftar.*,tbl_siswa.kelas')->from('tbl_loginppdb')
                        ->join('tbl_statuspendaftar','tbl_loginppdb.id = tbl_statuspendaftar.id_status','left')
                        ->join('tbl_siswa','tbl_siswa.nis_lokal = tbl_loginppdb.nis','left')
                        ->get()->result();
    }
}
