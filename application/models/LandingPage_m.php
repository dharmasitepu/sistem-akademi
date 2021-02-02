<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage_m extends CI_Model
{
    public function activity_kelas($id, $tipe)
    {
        return $this->db->where('id',$id)->update('tbl_tipekls',['active' => $tipe]);
    }
    public function update_tipekelas($id,$post)
    {
        return $this->db->where('id',$id)->update('tbl_tipekls',$post);
    }
    public function update_fotoalumni($id,$foto)
    {
        return $this->db->where('id',$id)->update('tbl_testialumni', $foto);
    }
    public function updateAlumni($id,$data)
    {
        return $this->db->where('id',$id)->update('tbl_testialumni', $data);
    }
    public function updateQuotes($id,$data)
    {
        return $this->db->where('id',$id)->update('tbl_quotes', $data);
    }
    public function update_fotoquotes($foto)
    {
        return $this->db->where('id',1)->update('tbl_quotes', $foto);
    }
    // Kelebihan
    public function num_kelebihan()
    {
        return $this->db->get('tbl_kelebihansekolah')->num_rows();
    }
    public function insert_kelebihan($data)
    {
        return $this->db->insert('tbl_kelebihansekolah', $data);
    }
    public function update_kelebihan($id,$data)
    {
        return $this->db->where('id',$id)->update('tbl_kelebihansekolah',$data);
    }
    public function delete_kelebihan($id)
    {
        return $this->db->delete('tbl_kelebihansekolah',['id' => $id]);
    }
}
