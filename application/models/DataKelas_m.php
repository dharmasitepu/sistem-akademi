<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKelas_m extends CI_Model
{
    public function getKelas($kelas = NULL)
    {
        if ($kelas != NULL) {
            $query = $this->db->where('id',$kelas);
        }
        $query = $this->db->order_by('nama_kelas', 'ASC')->get('tbl_kelas')->result();
        return $query;
    }
    public function showKelas($id)
    {
        if ($query = $this->db->where('id',$id)->get('tbl_kelas')->row()) {
            return $query;
        }
        else{
            return error_reporting(0);
        }
    }
    public function insertKelas($data)
    {
        return $this->db->insert('tbl_kelas', $data);
    }
    public function updateKelas($id,$data)
    {
        return $this->db->where('id',$id)->update('tbl_kelas',$data);
    }
    public function deleteKelas($id)
    {
        return $this->db->where('id',$id)->delete('tbl_kelas');
    }
}
