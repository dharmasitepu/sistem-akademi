<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataChat_m extends CI_Model
{
    public function saveChat($id,$data)
    {
        return $this->db->where('id',$id)->update('tbl_chatwhatsapp', $data);
    }
}
