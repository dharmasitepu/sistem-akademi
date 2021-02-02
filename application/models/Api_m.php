<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_m extends CI_Model
{
    public function showSiswa($nis, $limit = null)
    {
        ($nis != 'all') ? $data = $this->db->where('nis_lokal',$nis) : null;
        $data = $this->db->order_by('nis_lokal', 'ASC')
                        ->select('nis_lokal, nama_siswa, kelas, jk, agama, phone_ortuwali, foto, alamat, status_siswa, nik_ayah, nik_ibu, nik_wali, nama_kelas')
                        ->from('tbl_siswa')
                        ->join('tbl_kelas', 'tbl_kelas.id = tbl_siswa.kelas', 'left');
        ($limit != null) ? $data = $this->db->limit($limit) : null; 
        $data = $this->db->get()->result_array();
        return $data;
    }
    public function getSiswa($nis, $limit = null)
    {
        $data = $this->db->order_by('nis_lokal', 'ASC');
        ($nis != 'all') ? $data = $this->db->where('nis_lokal',$nis) : null;
        $data = $this->db->select('*')
                        ->from('tbl_siswa')
                        ->join('tbl_kelas', 'tbl_kelas.id = tbl_siswa.kelas', 'left')
                        ->join('tbl_ayah', 'tbl_ayah.nik_ayah = tbl_siswa.nik_ayah', 'left')
                        ->join('tbl_ibu', 'tbl_ibu.nik_ibu = tbl_siswa.nik_ibu', 'left')
                        ->join('tbl_wali', 'tbl_wali.nik_wali = tbl_siswa.nik_wali', 'left')
                        ->join('tbl_sekolahasal', 'tbl_sekolahasal.nis_siswa = tbl_siswa.nis_lokal', 'left');
        ($limit != null) ? $data = $this->db->limit($limit) : null ;
        $data = $this->db->get()->result_array();
        return $data;
    }
}