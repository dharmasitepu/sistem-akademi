<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb_m extends CI_Model
{
    public function getKelompok()
    {
        return $this->db->get('tbl_kelompokppdb')->result();
    }
    public function updatepengumuman($data)
    {
        return $this->db->where('id','1')->update('tbl_pengumumanppdb',$data);
    }
    public function cekLoginPPDB( $username = NULL, $email = NULL )
    {
        if ($username != NULL) {
            return $this->db->where('username', $username)->get('tbl_loginppdb')->num_rows();
        }
        if ($email != NULL) {
            return $this->db->where('email', $email)->get('tbl_loginppdb')->num_rows();
        }
    }
    public function detailPendaftar($id)
    {
        return $this->db->where('id',$id)
                        ->select('tbl_loginppdb.telp AS phone, tbl_loginppdb.* ,tbl_datappdb.*')
                        ->from('tbl_loginppdb')
                        ->join('tbl_datappdb','tbl_datappdb.id_datappdb = tbl_loginppdb.id','left')
                        ->get()->row();
    }
    public function insertDataPPDB($data)
    {
        return $this->db->insert('tbl_loginppdb', $data);
    }
    public function updateAkun($id, $data)
    {
        return $this->db->where('id', $id)->update('tbl_loginppdb', $data);
    }
    public function deleteAkun($id)
    {
        $this->db->where('id_datappdb', $id)->delete('tbl_datappdb');
        return $this->db->where('id', $id)->delete('tbl_loginppdb');
    }
    public function tolakPendaftaran($id,$data)
    {
        $this->db->where('id',$id)->update('tbl_loginppdb',['status' => 'Ditolak']);
        $cek = $this->db->get_where('tbl_statuspendaftar',['id_status' => $id])->num_rows();
        if ($cek > 0) {
            $this->db->where('id_status',$id)->update('tbl_statuspendaftar',$data);
            return 'Berhasil';
        }
        else{
            $datas = array(
                'id_status' => $id,
                'alasan'    => $data['alasan']
            );
            $this->db->insert('tbl_statuspendaftar',$datas);
            return 'Berhasil';
        }
    }
    public function reset_Status($id)
    {
        $this->db->where('id_status',$id)->delete('tbl_statuspendaftar');
        return $this->db->where('id',$id)->update('tbl_loginppdb',['status' => 'Menunggu']);
    }
    public function addKlmpk($data)
    {
        return $this->db->insert('tbl_kelompokppdb',$data);
    }
    public function setujuiPendaftaran($id,$post)
    {
        $input  = $this->db->get_where('tbl_datappdb',['id_datappdb' => $id])->row_array();
        $phone  = preg_replace('/^0/', '+62', $input['telp']);
        $photo  = ($input['jk'] == 'Laki-Laki') ? 'default-male.jpg' : 'default-female.jpg';
        $dataSiswa = array(
            'nis_lokal'             => $post['nis_lokal'], 
            'nisn'                  => '', 
            'no_induk'              => '', 
            'nama_siswa'            => strip_tags($input['nama_lengkap']), 
            'tempat_lahir'          => $input['tempat_lahir'], 
            'tgl_lahir'             => $input['tgl_lahir'], 
            'kelas'                 => $post['kelas'], 
            'jk'                    => $input['jk'], 
            'agama'                 => $input['agama'], 
            'alamat'                => $input['alamat'], 
            'phone_ortuwali'        => $phone, 
            'foto'                  => $photo,
            'jarak_rumahsekolah'    => 0, 
            'kendaraan'             => '', 
            'status_siswa'          => 'Siswa Baru',
            'hobi'                  => $input['hobi'],
            'cita_cita'             => $input['cita_cita'],
            'jumlah_saudara'        => $input['jumlah_saudara'],
            'nik_ayah'              => $input['nik_ayah'],
            'nik_ibu'               => $input['nik_ibu'],
            'nik_wali'              => $input['nik_wali'],
            'no_kks'                => '',
            'no_kph'                => '',
            'no_kip'                => '',
            'pid_status_penerima'   => '',
            'pid_alasan_menerima'   => '',
            'pid_periode'           => '',
            'bidang_prestasi'       => '',
            'tingkat_prestasi'      => '',
            'peringkat_prestasi'    => '',
            'tahun_prestasi'        => 0,
            'status_beasiswa'       => '',
            'sumber_beasiswa'       => '',
            'jenis_beasiswa'        => '',
            'jangka_waktu_beasiswa' => '',
            'besar_uang_beasiswa'   => ''
        );
        $dataSekolah = array(
            'nis_siswa'             => $post['nis_lokal'], 
            'nisn'                  => '', 
            'sekolah_asal'          => $input['sekolah_asal'], 
            'jenis_sekolahasal'     => '', 
            'status_sekolahasal'    => '', 
            'kabupaten_sekolahasal' => '', 
            'no_ujiansebelumnya'    => '', 
            'npsn_sekolahasal'      => '', 
            'blanko_skhunasal'      => '', 
            'no_ijazahasal'         => '', 
            'nilai_un'              => 0, 
            'tgl_kelulusan'         => ''
        );
        if ($input['nik_ayah']) {
            $dataAyah = array(
                'nik_ayah'          => $input['nik_ayah'], 
                'nokk_ayah'         => '', 
                'kodepos_ayah'      => 0, 
                'nama_ayah'         => $input['nama_ayah'], 
                'tgllahir_ayah'     => $input['tgllahir_ayah'], 
                'pendidikan_ayah'   => $input['pendidikan_ayah'], 
                'pekerjaan_ayah'    => $input['pekerjaan_ayah'], 
                'penghasilan_ayah'  => $input['penghasilan_ayah'], 
                'alamat_ayah'       => $input['alamat_ortuwali'], 
                'provinsi_ayah'     => $input['provinsi'], 
                'kabupaten_ayah'    => $input['kabupaten'], 
                'kecamatan_ayah'    => $input['kecamatan'], 
                'desa_ayah'         => $input['desa']
            );
            $this->db->insert('tbl_ayah', $dataAyah);
        }
        if ($input['nik_ibu']) {
            $dataIbu = array(
                'nik_ibu'          => $input['nik_ibu'], 
                'nokk_ibu'         => '', 
                'kodepos_ibu'      => 0, 
                'nama_ibu'         => $input['nama_ibu'], 
                'tgllahir_ibu'     => $input['tgllahir_ibu'], 
                'pendidikan_ibu'   => $input['pendidikan_ibu'], 
                'pekerjaan_ibu'    => $input['pekerjaan_ibu'], 
                'penghasilan_ibu'  => $input['penghasilan_ibu'], 
                'alamat_ibu'       => $input['alamat_ortuwali'], 
                'provinsi_ibu'     => $input['provinsi'], 
                'kabupaten_ibu'    => $input['kabupaten'], 
                'kecamatan_ibu'    => $input['kecamatan'], 
                'desa_ibu'         => $input['desa']
            );
            $this->db->insert('tbl_ibu', $dataIbu);
        }
        if ($input['nik_wali']) {
            $dataWali = array(
                'nik_wali'          => $input['nik_wali'], 
                'nokk_wali'         => '', 
                'kodepos_wali'      => 0, 
                'nama_wali'         => $input['nama_wali'], 
                'tgllahir_wali'     => $input['tgllahir_wali'], 
                'pendidikan_wali'   => $input['pendidikan_wali'], 
                'pekerjaan_wali'    => $input['pekerjaan_wali'], 
                'penghasilan_wali'  => $input['penghasilan_wali'], 
                'alamat_wali'       => $input['alamat_ortuwali'], 
                'provinsi_wali'     => $input['provinsi'], 
                'kabupaten_wali'    => $input['kabupaten'], 
                'kecamatan_wali'    => $input['kecamatan'], 
                'desa_wali'         => $input['desa']
            );
            $this->db->insert('tbl_wali', $dataWali);
        }
        if ($this->db->insert('tbl_siswa', $dataSiswa)) {
            $this->db->insert('tbl_sekolahasal',$dataSekolah);
            $this->db->where('id',$id)->update('tbl_loginppdb',['status' => 'Disetujui', 'nis' => $post['nis_lokal']]);
            return 'Berhasil';
        }
        // $this->db->where('id',$id)->update('tbl_loginppdb',['status' => 'Disetujui']);
    }
}
