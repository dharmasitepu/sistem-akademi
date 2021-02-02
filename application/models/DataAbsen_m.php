<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAbsen_m extends CI_Model
{
    public function cekNumAbsen($jenis,$bulan,$nis,$mapel = NULL)
    {
        if ($jenis == 'Hadir') {
            if ($mapel != NULL) {
                return $this->db->where('kehadiran','Terlambat')->where('nis',$nis)->where('bulan',$bulan)->where('mapel',$mapel)->or_where('kehadiran','Hadir')->where('nis',$nis)->where('bulan',$bulan)->where('mapel',$mapel)
                                ->get('tbl_absenmapel')->num_rows();
            }
            else {
                return $this->db->where('kehadiran',$jenis)->where('nis',$nis)->where('bulan',$bulan)->or_where('kehadiran','Terlambat')->where('nis',$nis)->where('bulan',$bulan)
                                ->get('tbl_absen')->num_rows();
            }
        }
        else{
            if ($mapel != NULL) {
                return $this->db->where('nis',$nis)->where('kehadiran',$jenis)->where('bulan',$bulan)->where('mapel',$mapel)
                                ->get('tbl_absenmapel')->num_rows();
            }
            else {
                return $this->db->where('nis',$nis)->where('kehadiran',$jenis)->where('bulan',$bulan)
                                ->get('tbl_absen')->num_rows();
            }
        }
    }
    public function saveAbsen(){
        $data = array(
            'nis'       => $this->input->post('nis'), 
            'kelas'     => $this->input->post('kelas'), 
            'kehadiran' => $this->input->post('kehadiran'), 
            'tgl'       => $this->input->post('tgl'), 
            'bulan'     => $this->input->post('bulan'), 
            'tahun'     => $this->input->post('tahun')
        );
        // Delete
        if ($data['kehadiran'] == 'Kosongkan') {
            if ($this->input->post('mapel') != NULL) {
                $data['mapel'] = $this->input->post('mapel');
                $out  = $this->db->where('nis',$data['nis'])->where('kelas',$data['kelas'])->where('mapel',$data['mapel'])->where('tgl',$data['tgl'])->where('bulan',$data['bulan'])->where('tahun',$data['tahun'])
                                 ->delete('tbl_absenmapel');
            }
            else {
                $out  = $this->db->where('nis',$data['nis'])->where('kelas',$data['kelas'])->where('tgl',$data['tgl'])->where('bulan',$data['bulan'])->where('tahun',$data['tahun'])
                                 ->delete('tbl_absen');
            }
        }
        // Insert / Update
        else{
            // Tbl Mapel
            if ($this->input->post('mapel') != NULL) {
                $data['mapel'] = $this->input->post('mapel');
                $cekNis  = $this->db->where('nis',$data['nis'])->where('kelas',$data['kelas'])->where('mapel',$data['mapel'])->where('tgl',$data['tgl'])->where('bulan',$data['bulan'])->where('tahun',$data['tahun'])
                                    ->get('tbl_absenmapel')->num_rows();
                if ($cekNis > 0) {
                    $out = $this->db->where('nis',$data['nis'])->where('kelas',$data['kelas'])->where('mapel',$data['mapel'])->where('tgl',$data['tgl'])->where('bulan',$data['bulan'])->where('tahun',$data['tahun'])
                                    ->update('tbl_absenmapel',$data);
                }
                else {
                    $out = $this->db->insert('tbl_absenmapel',$data);
                }
            }
            // Tb Umum
            else{
                $cekNis  = $this->db->where('nis',$data['nis'])->where('kelas',$data['kelas'])->where('tgl',$data['tgl'])->where('bulan',$data['bulan'])->where('tahun',$data['tahun'])
                                    ->get('tbl_absen')->num_rows();
                if ($cekNis > 0) {
                    $out = $this->db->where('nis',$data['nis'])->where('kelas',$data['kelas'])->where('tgl',$data['tgl'])->where('bulan',$data['bulan'])->where('tahun',$data['tahun'])
                                    ->update('tbl_absen',$data);
                }
                else {
                    $out = $this->db->insert('tbl_absen',$data);
                }
            }
        }
        return $out;
    }
    public function getAbsen($nis,$kelas,$tgl,$bulan,$tahun,$mapel = NULL)
    {
        if ($mapel != NULL) {
            $kehadiran = $this->db->where('nis',$nis)
                                  ->where('kelas',$kelas)->where('tgl',$tgl)->where('bulan',$bulan)->where('tahun',$tahun)->where('mapel',$mapel)
                                  ->get('tbl_absenmapel')->row();
        }
        else{
            $kehadiran = $this->db->where('nis',$nis)
                                  ->where('kelas',$kelas)->where('tgl',$tgl)->where('bulan',$bulan)->where('tahun',$tahun)
                                  ->get('tbl_absen')->row();
        }
        if (!empty($kehadiran)) {
            $kehadirann = $kehadiran->kehadiran;
            if ($kehadirann == 'Hadir') {
                $color ='btn-success';
                $icon = '<i class="fas fa-check"></i>';
            }
            elseif ($kehadirann == 'Terlambat') {
                $color ='btn-warning';
                $icon = '<i class="fas fa-clock"></i>';
            }
            elseif ($kehadirann == 'Sakit') {
                $color ='btn-info';
                $icon = '<i class="fas fa-plus-square"></i>';
            }
            elseif ($kehadirann == 'Ijin') {
                $color ='btn-primary';
                $icon = '<i class="fas fa-envelope"></i>';
            }
            elseif ($kehadirann == 'Tanpa Keterangan') {
                $color ='btn-danger';
                $icon = '<i class="fas fa-close"></i>';
            }
        }
        else {
            $color ='btn-default';
            $icon = '...';
        }
        return array('color'=> $color,'icon' => $icon);
    }
}
