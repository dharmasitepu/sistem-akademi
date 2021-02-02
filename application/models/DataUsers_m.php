<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataUsers_m extends CI_Model
{
    public function getPendingPPDB($id)
    {
        return $this->db->where('id_ppdb',$id)
                        ->select('tbl_pendingppdb.*, tbl_loginppdb.*, tbl_gelombangppdb.harga')
                        ->from('tbl_pendingppdb')
                        ->join('tbl_loginppdb','tbl_loginppdb.id = tbl_pendingppdb.id_ppdb','left')
                        ->join('tbl_gelombangppdb', 'tbl_gelombangppdb.id_gelombang = tbl_pendingppdb.gelombang','left')
                        ->get()->result();
    }
    public function getStatusPPDB($id)
    {
        return $this->db->where('id',$id)->select('*')->from('tbl_loginppdb')
                        ->get();
    }
    public function numPendingPPDB($id)
    {
        return $this->db->where('id_ppdb',$id)->get('tbl_pendingppdb')->num_rows();
    }
    public function getProfile($id)
    {
        return $this->db->get_where('tbl_loginppdb', ['id' => $id])->row();
    }
    public function insertForm($id,$data)
    {
        $update = array('formulir' => 'Sudah','waktu_update' => date('Y/m/d H:i:s') );
        $this->db->where('id',$id)->update('tbl_loginppdb',$update);
        return $this->db->insert('tbl_datappdb',$data);
    }
    public function updateForm($id,$data)
    {
        $update = array('formulir' => 'Sudah','waktu_update' => date('Y/m/d H:i:s') );
        $this->db->where('id',$id)->update('tbl_loginppdb',$update);
        return $this->db->where('id_datappdb',$id)->update('tbl_datappdb',$data);
    }
    public function updateProfile($p,$foto = NULL)
    {
        $where = array(
            'id'        => $p['id'],
            'username'  => $p['username'],
            'email'     => $p['email']
        );
        $telp  = preg_replace('/^0/', '+62', $p['telp']);
        $data = array(
            'name' => $this->input->post('name'), 
            'telp' => $telp,
        );
        if ($foto != NULL) {
            $data['image'] = $foto;
        }
        return $this->db->where($where)->update('tbl_loginppdb',$data);
    }
    public function insertPembayaran($p,$foto = NULL)
    {   
        date_default_timezone_set('Asia/Jakarta');
        $bayar = str_replace('.','',$p['jml_pembayaran']);
        $bayar = str_replace(',','',$bayar);
        $data = array(
            'id_ppdb'        => $p['id_ppdb'],
            'gelombang'      => $p['gelombang'],
            'jml_pembayaran' => $bayar, 
            'tgl_pembayaran' => date('Y/m/d H:i:s'),
        );
        if ($foto != NULL) {
            $data['bukti_pembayaran'] = $foto;
        }
        return $this->db->insert('tbl_pendingppdb',$data);
    }
}
