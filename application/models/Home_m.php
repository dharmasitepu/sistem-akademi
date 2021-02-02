<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model
{
    public function getNum()
    {
        return array(
            'num_siswa'     => $this->db->get('tbl_siswa')->num_rows(),
            'num_guru'      => $this->db->get('tbl_guru')->num_rows(),
            'num_kelas'     => $this->db->get('tbl_kelas')->num_rows(),
            'num_akunppdb'  => $this->db->get('tbl_loginppdb')->num_rows()
        );
    }
    public function getNumSPP($tahun, $bulan)
    {
        return $this->db->where('tahun', $tahun)->where('bulan', $bulan)->get('tbl_statusbayarspp')->num_rows();
    }
    public function getNumPPDB($tahun, $bulan)
    {
        $sql = $this->db->select('tgl_pembayaran')->like('tgl_pembayaran', $tahun)->get('tbl_statusbayarppdb')->result();
        $i = 1 ;
        foreach ($sql as $get) {
            $tgl = explode('-',$get->tgl_pembayaran);
            if ($bulan == $tgl[1]) {
                $data[$i++] = $bulan;
            }
        }
        return (isset($data)) ? count($data) : 0;
    }
}
