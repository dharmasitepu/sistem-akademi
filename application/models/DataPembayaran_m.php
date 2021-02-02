<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPembayaran_m extends CI_Model
{
    ///// PPDB /////
    public function getPendingPPDB()
    {
        return $this->db->select('tbl_pendingppdb.*, tbl_loginppdb.*, tbl_gelombangppdb.harga')
                        ->from('tbl_pendingppdb')
                        ->join('tbl_loginppdb','tbl_loginppdb.id = tbl_pendingppdb.id_ppdb','left')
                        ->join('tbl_gelombangppdb', 'tbl_gelombangppdb.id_gelombang = tbl_pendingppdb.gelombang','left')
                        ->get()->result();
    }
    public function getStatusPPDB()
    {
        return $this->db->select('*')->from('tbl_loginppdb')
                        ->get()->result();
    }
    public function getTotalBayar($id)
    {
        return $this->db->where('id_ppdb',$id)
                        ->select('*')->from('tbl_statusbayarppdb')
                        ->join('tbl_gelombangppdb','tbl_gelombangppdb.id_gelombang = tbl_statusbayarppdb.gelombang', 'left')
                        ->get();
    }
    public function insertPembayaranPPDB($data)
    {
        $bayar  = str_replace('.','',$data['jml_pembayaran']);
        $bayar  = str_replace(',','',$bayar);
        $data   = array(
            'id_ppdb'           => $data['id_ppdb'],
            'tgl_pembayaran'    => $data['tgl_pembayaran'],
            'gelombang'         => $data['gelombang'],
            'jml_pembayaran'    => $bayar,
            'bukti_pembayaran'  => ''
        );
        return $this->db->insert('tbl_statusbayarppdb',$data);
    }
    public function getNumPendingPPDB()
    {
        return $this->db->get('tbl_pendingppdb')->num_rows();
    }
    public function aprovePendingPPDB($id)
    {
        $data = $this->db->where('id_pending',$id)->get('tbl_pendingppdb')->row();
        $oper = array(
            'id_ppdb' => $data->id_ppdb,
            'gelombang' => $data->gelombang,
            'jml_pembayaran' => $data->jml_pembayaran,
            'tgl_pembayaran' => $data->tgl_pembayaran,
            'bukti_pembayaran' => $data->bukti_pembayaran
        );
        $this->db->insert('tbl_statusbayarppdb',$oper);

        return $this->db->where('id_pending',$id)->delete('tbl_pendingppdb');
    }
    public function updateBiayaPPDB($id,$p)
    {
        $bayar = str_replace('.','',$p['harga']);
        $bayar = str_replace(',','',$bayar);
        $data = array(
            'nama'    => $p['nama'],
            'harga'    => $bayar,
            'mulai'    => $p['mulai'],
            'akhir'    => $p['akhir']
        );
        return $this->db->where('id_gelombang',$id)->update('tbl_gelombangppdb',$data);
    }
    public function updateBiayaSPP($id,$p)
    {
        $bayar = str_replace('.','',$p['total']);
        $bayar = str_replace(',','',$bayar);
        $data = array(
            'total'    => $bayar
        );
        return $this->db->where('id',$id)->update('tbl_hargaspp',$data);
    }
    public function deletePendingPPDB($id)
    {
        return $this->db->where('id_pending',$id)->delete('tbl_pendingppdb');
    }
    public function deleteStatusPPDB($id)
    {
        return $this->db->where('id_status',$id)->delete('tbl_statusbayarppdb');
    }

    ///////////////////// S P P ////////////////////////
    public function getStatusSPP()
    {
        return $this->db->select('tbl_siswa.nis_lokal, tbl_siswa.nama_siswa, tbl_siswa.kelas, tbl_statusbayarspp.*, tbl_kelas.nama_kelas')
                        ->order_by('tbl_siswa.nis_lokal','ASC')
                        ->from('tbl_siswa')
                        ->join('tbl_statusbayarspp','tbl_statusbayarspp.nis_spp = tbl_siswa.nis_lokal','left')
                        ->join('tbl_kelas','tbl_kelas.id = tbl_siswa.kelas','left')
                        ->get()->result();
    }
    public function numHistorySPP()
    {
        return $this->db->get('tbl_statusbayarspp')->num_rows();
    }
    public function getHistorySPP()
    {
        return $this->db->select('tbl_siswa.nis_lokal, tbl_siswa.nama_siswa, tbl_siswa.kelas, tbl_statusbayarspp.*, tbl_kelas.nama_kelas')
                        ->order_by('tbl_statusbayarspp.tgl_pembayaran','DESC')
                        ->from('tbl_statusbayarspp')
                        ->join('tbl_siswa','tbl_statusbayarspp.nis_spp = tbl_siswa.nis_lokal','left')
                        ->join('tbl_kelas','tbl_kelas.id = tbl_siswa.kelas','left')
                        ->get()->result();
    }
    public function getHistorySPPSiswa($nis)
    {
        return $this->db->where('nis_spp',$nis)->get('tbl_statusbayarspp')->result();
    }
    public function getFullHistorySPPSiswa($nis,$bulan,$tahun)
    {
        return $this->db->where('nis_spp',$nis)->where('bulan',$bulan)->where('tahun',$tahun)->get('tbl_statusbayarspp')->result();
    }
    public function getSPP($nis,$kelas,$bulan,$tahun)
    {
        $getSPP = $this->db->where('nis_spp',$nis)
                                ->where('kelas',$kelas)->where('bulan',$bulan)->where('tahun',$tahun)
                                ->get('tbl_statusbayarspp')->num_rows();
        if ($getSPP > 0) {
            $color ='btn-success';
            $icon = '<i class="fas fa-check"></i>';
        }
        else {
            $color ='btn-default';
            $icon = '...';
        }
        return array('color'=> $color,'icon' => $icon);
    }
    public function showBiayaSPP($kelas)
    {
        return $this->db->select('tbl_hargaspp.total')->where('tbl_kelas.id',$kelas)->from('tbl_hargaspp')
                            ->join('tbl_kelas','tbl_kelas.tingkat = tbl_hargaspp.kelas','left')
                            ->get()->row()->total;
    }
    public function saveSPP()
    {
        $where = array(
            'nis_spp'   => $this->input->post('nis'), 
            'kelas'     => $this->input->post('kelas'), 
            'bulan'     => $this->input->post('bulan'), 
            'tahun'     => $this->input->post('tahun')
        );
        $text = $this->input->post('text');
        if ($text == 'Kosongkan') {
            $q = $this->db->where($where)->delete('tbl_statusbayarspp');
        }
        else{
            $data = array(
                'nis_spp'   => $this->input->post('nis'), 
                'jml_pembayaran' => $text,
                'tgl_pembayaran' => date('Y/m/d'),
                'kelas'     => $this->input->post('kelas'), 
                'bulan'     => $this->input->post('bulan'), 
                'tahun'     => $this->input->post('tahun')
            ); 
            $cek = $this->db->where($where)->get('tbl_statusbayarspp')->num_rows();
            if ($cek > 0) {
                $q = $this->db->where($where)->update('tbl_statusbayarspp',$data);
            }
            else{
                $q = $this->db->insert('tbl_statusbayarspp',$data);
            }
        }
        return $q;
    }
}
