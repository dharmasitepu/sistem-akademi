<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataGuru_m extends CI_Model
{
    public function getGuruNip($nip)
    {
        return $this->db->where('nip',$nip)->get('tbl_guru')->row();
    }
    public function getGuru()
    {
        return $this->db->order_by('nip', 'ASC')->get('tbl_guru')->result();
        }
    public function getGuruDikit()
    {
        return $this->db->select('nip, nama_guru')->from('tbl_guru')->get()->result();
    }
    public function getNamaGuru($nip = NULL)
    {
        if ($nip != NULL) {
            if ($row = $this->db->where('nip',$nip)->get('tbl_guru')->row()) {
                return $row->nama_guru;
            }
            else{
                return 'Guru Tidak Ditemukan';
            }
        }
        else{
            return false;   
        }
    }
    public function updatePhoto($nip,$data)
    {
        return $this->db->where('nip',$nip)->update('tbl_guru',$data);
    }
    public function getAllDataGuru()
    {
        return $this->db->order_by('nip', 'ASC')
                        ->get('tbl_guru')->result();
    }
    public function getDataGuru($nip)
    {
        return $this->db->where('nip',$nip)
                        ->get('tbl_guru')->result();
    }
    public function addGuru($i)
    {
        $phone  = preg_replace('/^0/', '+62', $i['nomer']);
        $photo  = ($i['jk'] == 'Laki-Laki' || $i['jk'] == 'Laki - Laki' || $i['jk'] == 'L' || $i['jk'] == 'l' ) ? 'default-male.jpg' : 'default-female.jpg';
        $dataGuru = array(  
            'nip'                   => $i['nip'], 
            'nuptk'                 => $i['nuptk'], 
            'nama_guru'             => $i['nama_guru'], 
            'nik'                   => $i['nik'], 
            'no_npwp'               => $i['no_npwp'], 
            'nama_npwp'             => $i['nama_npwp'], 
            'kewarganegaraan'       => $i['kewarganegaraan'], 
            'pernikahan'            => $i['pernikahan'], 
            'tempat_lahir'          => $i['tempat_lahir'], 
            'tgllahir_guru'         => $i['tgllahir_guru'],
            'jk'                    => $i['jk'], 
            'agama'                 => $i['agama'],
            'foto'                  => $photo,
            'nama_ibu'              => $i['nama_ibu'], 
            'nip_suamiistri'        => $i['nip_suamiistri'], 
            'nama_suamiistri'       => $i['nama_suamiistri'], 
            'pekerjaan_suamiistri'  => $i['pekerjaan_suamiistri'], 
            'jenjang_pendidikan'    => $i['jenjang_pendidikan'], 
            'kelompok_prodi'        => $i['kelompok_prodi'],
            'alamat'                => $i['alamat'],
            'provinsi_guru'         => $i['provinsi_guru'],
            'kabupaten_guru'        => $i['kabupaten_guru'],
            'kecamatan_guru'        => $i['kecamatan_guru'],
            'desa_guru'             => $i['desa_guru'],
            'kode_pos'              => $i['kode_pos'],
            'rt'                    => $i['rt'],
            'rw'                    => $i['rw'],
            'no_hp'                 => $phone,
            'status_kepegawaian'    => $i['status_kepegawaian'],
            'no_niy'                => $i['no_niy'],
            'jenis_ptk'             => $i['jenis_ptk'],
            'sk_pengangkatan'       => $i['sk_pengangkatan'],
            'tgl_pengangkatan'      => $i['tgl_pengangkatan'],
            'lembaga_pengangkat'    => $i['lembaga_pengangkat'],
            'sk_cpns'               => $i['sk_cpns'],
            'tgl_cpns'              => $i['tgl_cpns'],
            'tgl_pns'               => $i['tgl_pns'],
            'golongan'              => $i['golongan'],
            'sumber_gaji'           => $i['sumber_gaji'],
            'no_kartupegawai'       => $i['no_kartupegawai'],
            'kartu_istrisuami'      => $i['kartu_istrisuami'],
            'telp_rumah'            => $i['telp_rumah'],
            'email'                 => $i['email'],
            'nama_bank'             => $i['nama_bank'],
            'rekening'              => $i['rekening'],
            'atas_nama'             => $i['atas_nama']
        );
        return $this->db->insert('tbl_guru', $dataGuru);
    }
    public function updateGuru($i)
    {
        $phone  = preg_replace('/^0/', '+62', $i['nomer']);

        $photo  = ($i['fotos'] == 'default-male.jpg' || $i['fotos'] == 'default-female.jpg') 
                ? (($i['jk'] == 'Laki-Laki' || $i['jk'] == 'Laki - Laki' || $i['jk'] == 'L' || $i['jk'] == 'l' ) ? 'default-male.jpg' : 'default-female.jpg') 
                : $i['fotos'];
        $dataGuru = array(
            'nuptk'                 => $i['nuptk'], 
            'nama_guru'             => $i['nama_guru'], 
            'nik'                   => $i['nik'], 
            'no_npwp'               => $i['no_npwp'], 
            'nama_npwp'             => $i['nama_npwp'], 
            'kewarganegaraan'       => $i['kewarganegaraan'], 
            'pernikahan'            => $i['pernikahan'], 
            'tempat_lahir'          => $i['tempat_lahir'], 
            'tgllahir_guru'         => $i['tgllahir_guru'],
            'jk'                    => $i['jk'], 
            'agama'                 => $i['agama'],
            'foto'                  => $photo,
            'nama_ibu'              => $i['nama_ibu'], 
            'nip_suamiistri'        => $i['nip_suamiistri'], 
            'nama_suamiistri'       => $i['nama_suamiistri'], 
            'pekerjaan_suamiistri'  => $i['pekerjaan_suamiistri'], 
            'jenjang_pendidikan'    => $i['jenjang_pendidikan'], 
            'kelompok_prodi'        => $i['kelompok_prodi'],
            'alamat'                => $i['alamat'],
            'provinsi_guru'         => $i['provinsi_guru'],
            'kabupaten_guru'        => $i['kabupaten_guru'],
            'kecamatan_guru'        => $i['kecamatan_guru'],
            'desa_guru'             => $i['desa_guru'],
            'kode_pos'              => $i['kode_pos'],
            'rt'                    => $i['rt'],
            'rw'                    => $i['rw'],
            'no_hp'                 => $phone,
            'status_kepegawaian'    => $i['status_kepegawaian'],
            'no_niy'                => $i['no_niy'],
            'jenis_ptk'             => $i['jenis_ptk'],
            'sk_pengangkatan'       => $i['sk_pengangkatan'],
            'tgl_pengangkatan'      => $i['tgl_pengangkatan'],
            'lembaga_pengangkat'    => $i['lembaga_pengangkat'],
            'sk_cpns'               => $i['sk_cpns'],
            'tgl_cpns'              => $i['tgl_cpns'],
            'tgl_pns'               => $i['tgl_pns'],
            'golongan'              => $i['golongan'],
            'sumber_gaji'           => $i['sumber_gaji'],
            'no_kartupegawai'       => $i['no_kartupegawai'],
            'kartu_istrisuami'      => $i['kartu_istrisuami'],
            'telp_rumah'            => $i['telp_rumah'],
            'email'                 => $i['email'],
            'nama_bank'             => $i['nama_bank'],
            'rekening'              => $i['rekening'],
            'atas_nama'             => $i['atas_nama']
        );
        return $this->db->where('nip',$i['nip'])->update('tbl_guru', $dataGuru);
    }
    public function deleteGuru($nip)
    {
        return $this->db->where('nip',$nip)->delete('tbl_guru');
    }
}
