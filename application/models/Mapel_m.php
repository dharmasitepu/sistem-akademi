<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_m extends CI_Model
{
    public function showMapel($id)
    {
        return $this->db->where('id',$id)->get('tbl_mapel')->row();
    }
    public function showMapelKelas($id)
    {
        return $this->db->where('kelas',$id)->get('tbl_mapel')->row();
    }
    public function getMapel()
    {
        return $this->db->get('tbl_mapel')->result();
    }
    public function getMapelNip($nip)
    {
        return $this->db->where('guru1',$nip)->or_where('guru2',$nip)->or_where('guru3',$nip)->or_where('guru4',$nip)->get('tbl_mapel')->result();
    }
    public function insertMapel($data)
    {
        return $this->db->insert('tbl_mapel',$data);
    }
    public function updateMapel($id,$d)
    {
        $p = array(
            'nama_mapel'=> htmlentities($d['nama_mapel']), 
            'kelas'     => $d['kelas'], 
            'gol'       => $d['gol'], 
            'guru1'     => $d['guru1'], 
            'guru2'     => $d['guru2'], 
            'guru3'     => $d['guru3'], 
            'guru4'     => $d['guru4']
        );
        return $this->db->where('id',$id)->update('tbl_mapel',$p);
    }
    public function deleteMapel($id)
    {
        return $this->db->where('id',$id)->delete('tbl_mapel');
    }
}
