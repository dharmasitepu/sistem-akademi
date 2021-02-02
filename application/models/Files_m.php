<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files_m extends CI_Model
{
    public function get_umum()
    {
        return $this->db->order_by('uploaded_at','DESC')->where('access',0)->get('tbl_files')->result();
    }
    public function get_num_umum()
    {
        return $this->db->where('access',0)->get('tbl_files')->num_rows();
    }
    public function get_private()
    {
        return $this->db->order_by('uploaded_at','DESC')->where('access !=',0)->get('tbl_files')->result();
    }
    public function get_private_siswa()
    {
        return $this->db->order_by('uploaded_at','DESC')->where('access',2)->or_where('access',3)->get('tbl_files')->result();
    }
    public function add_file($data)
    {
        return $this->db->insert('tbl_files', $data);
    }
    public function edit_file($id,$data)
    {
        return $this->db->where('id',$id)->update('tbl_files',$data);
    }
    public function delete_file($id)
    {
        return $this->db->delete('tbl_files',['id' => $id]);
    }
}
