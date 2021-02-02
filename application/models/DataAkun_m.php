<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAkun_m extends CI_Model
{
    public function getAkun($user)
    {
        return $this->db->get_where('tbl_login',['username' => $user])->row();
    }
    public function getAllAkun()
    {
        return $this->db->order_by('role_id','ASC')
                        ->select('*')->from('tbl_login')
                        ->join('tbl_role','tbl_role.id = tbl_login.role_id','left')
                        ->get()->result();
    }
    public function activeAccount($user)
    {
        return $this->db->where('username',$user)->update('tbl_login',['active' => 1]);
    }
    public function nonactiveAccount($user)
    {
        return $this->db->where('username',$user)->update('tbl_login',['active' => 0]);
    }
    public function getProfile($id)
    {
        return $this->db->get_where('tbl_login', ['id' => $id])->row();
    }
    public function insertRegister($data)
    {
        return $this->db->insert('tbl_login', $data);
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
            'name' => htmlentities($this->input->post('name')), 
            'telp' => htmlentities($telp),
        );
        if ($foto != NULL) {
            $data['image'] = $foto;
        }
        return $this->db->where($where)->update('tbl_login',$data);
    }
    public function deleteAccount($username)
    {
        return $this->db->where('username', $username)->delete('tbl_login');
    }
}
