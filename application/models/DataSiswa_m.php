<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSiswa_m extends CI_Model
{
     // start datatables
     var $column_order = array(null, 'foto', 'nis_lokal', 'nama_kelas', 'phone_ortuwali', 'alamat', 'status_siswa'); //set column field database for datatable orderable
     var $column_search = array('nis_lokal', 'nama_siswa', 'nama_kelas'); //set column field database for datatable searchable
    //  var $column_search = array('*'); //set column field database for datatable searchable
     var $order = array('nis_lokal' => 'asc'); // default order

    private function _get_datatables_query() {
        // $this->db->order_by('nis_lokal', 'ASC');
        $this->db->select('nis_lokal, nama_siswa, kelas, jk, agama, phone_ortuwali, foto, alamat, status_siswa, nik_ayah, nik_ibu, nik_wali, nama_kelas');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_kelas', 'tbl_kelas.id = tbl_siswa.kelas', 'left')->order_by('nis_lokal','ASC');
        $i = 0;
         foreach ($this->column_search as $item) { // loop column
             if(@$_POST['search']['value']) { // if datatable send POST for search
                 if($i===0) { // first loop
                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                     $this->db->like($item, $_POST['search']['value']);
                 } else {
                     $this->db->or_like($item, $_POST['search']['value']);
                 }
                 if(count($this->column_search) - 1 == $i) //last loop
                     $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('tbl_siswa');
        return $this->db->count_all_results();
    }
    // end datatables
    public function getSiswaDikit($kelas)
    {
        return $this->db->order_by('nama_siswa', 'ASC')
                        ->select('nis_lokal, nama_siswa')->where('kelas',$kelas)
                        ->from('tbl_siswa')
                        ->get()->result();
    }
    public function getSiswa()
    {
        return $this->db->order_by('nis_lokal', 'ASC')
                        ->select('nis_lokal, nama_siswa, kelas, jk, agama, phone_ortuwali, foto, alamat, status_siswa, nik_ayah, nik_ibu, nik_wali, nama_kelas')
                        ->from('tbl_siswa')
                        ->join('tbl_kelas', 'tbl_kelas.id = tbl_siswa.kelas', 'left')
                        ->get()->result();
    }
    public function getSiswaNis($nis)
    {
        return $this->db->order_by('nis_lokal', 'ASC')
                        ->where('nis_lokal',$nis)
                        ->select('*')
                        ->from('tbl_siswa')
                        ->join('tbl_kelas', 'tbl_kelas.id = tbl_siswa.kelas', 'left')
                        ->join('tbl_ayah', 'tbl_ayah.nik_ayah = tbl_siswa.nik_ayah', 'left')
                        ->join('tbl_ibu', 'tbl_ibu.nik_ibu = tbl_siswa.nik_ibu', 'left')
                        ->join('tbl_wali', 'tbl_wali.nik_wali = tbl_siswa.nik_wali', 'left')
                        ->join('tbl_sekolahasal', 'tbl_sekolahasal.nis_siswa = tbl_siswa.nis_lokal', 'left')
                        ->get()->row();
    }
    public function getDataSiswa($nis)
    {
        return $this->db->order_by('nis_lokal', 'ASC')
                        ->where('nis_lokal',$nis)
                        ->select('*')
                        ->from('tbl_siswa')
                        ->join('tbl_kelas', 'tbl_kelas.id = tbl_siswa.kelas', 'left')
                        ->join('tbl_ayah', 'tbl_ayah.nik_ayah = tbl_siswa.nik_ayah', 'left')
                        ->join('tbl_ibu', 'tbl_ibu.nik_ibu = tbl_siswa.nik_ibu', 'left')
                        ->join('tbl_wali', 'tbl_wali.nik_wali = tbl_siswa.nik_wali', 'left')
                        ->join('tbl_sekolahasal', 'tbl_sekolahasal.nis_siswa = tbl_siswa.nis_lokal', 'left')
                        ->get()->result();
    }
    public function getAllDataSiswa()
    {
        return $this->db->order_by('nis_lokal', 'ASC')
                        ->select('*')
                        ->from('tbl_siswa')
                        ->join('tbl_kelas', 'tbl_kelas.id = tbl_siswa.kelas', 'left')
                        ->join('tbl_ayah', 'tbl_ayah.nik_ayah = tbl_siswa.nik_ayah', 'left')
                        ->join('tbl_ibu', 'tbl_ibu.nik_ibu = tbl_siswa.nik_ibu', 'left')
                        ->join('tbl_wali', 'tbl_wali.nik_wali = tbl_siswa.nik_wali', 'left')
                        ->join('tbl_sekolahasal', 'tbl_sekolahasal.nis_siswa = tbl_siswa.nis_lokal', 'left')
                        ->get()->result();
    }
    public function cekDupSiswa($nis, $no_induk)
    {
        if ($nis != NULL) {
            return $this->db->where('nis_lokal', $nis)->get('tbl_siswa')->num_rows();
        }
        if ($no_induk != NULL) {
            return $this->db->where('no_induk', $no_induk)->get('tbl_siswa')->num_rows();
        }
    }
    public function updatePhoto($nis,$data)
    {
        return $this->db->where('nis_lokal',$nis)->update('tbl_siswa',$data);
    }
    public function addSiswa($input)
    {
        try{
        $phone  = preg_replace('/^0/', '+62', $input['phone']);
        $input['jk']    = (isset($input['jk'])) ? $input['jk'] : 'Laki-Laki';
        $photo  = ($input['jk'] == 'Laki-Laki') ? 'default-male.jpg' : 'default-female.jpg';
        $dataSiswa = array(
            'nis_lokal'             => $input['nis_lokal'], 
            'nisn'                  => $input['nisn'], 
            'no_induk'              => $input['no_induk'], 
            'nama_siswa'            => strip_tags($input['nama_siswa']), 
            'tempat_lahir'          => $input['tempat_lahir'], 
            'tgl_lahir'             => $input['tgl_lahir'], 
            'kelas'                 => $input['kelas'], 
            'jk'                    => $input['jk'], 
            'agama'                 => $input['agama'], 
            'alamat'                => $input['alamat'], 
            'phone_ortuwali'        => $phone, 
            'foto'                  => $photo,
            'jarak_rumahsekolah'    => ($input['jarak_rumahsekolah'] != "") ? $input['jarak_rumahsekolah'] : 0, 
            'kendaraan'             => $input['kendaraan'], 
            'status_siswa'          => $input['status_siswa'],
            'hobi'                  => $input['hobi'],
            'cita_cita'             => $input['cita_cita'],
            'jumlah_saudara'        => ($input['jumlah_saudara'] != "") ? $input['jumlah_saudara'] : 0,
            'nik_ayah'              => $input['nik_ayah'],
            'nik_ibu'               => $input['nik_ibu'],
            'nik_wali'              => $input['nik_wali'],
            'no_kks'                => $input['no_kks'],
            'no_kph'                => $input['no_kph'],
            'no_kip'                => $input['no_kip'],
            'pid_status_penerima'   => $input['pid_status_penerima'],
            'pid_alasan_menerima'   => $input['pid_alasan_menerima'],
            'pid_periode'           => $input['pid_periode'],
            'bidang_prestasi'       => $input['bidang_prestasi'],
            'tingkat_prestasi'      => $input['tingkat_prestasi'],
            'peringkat_prestasi'    => $input['peringkat_prestasi'],
            'tahun_prestasi'        => $input['tahun_prestasi'],
            'status_beasiswa'       => $input['status_beasiswa'],
            'sumber_beasiswa'       => $input['sumber_beasiswa'],
            'jenis_beasiswa'        => $input['jenis_beasiswa'],
            'jangka_waktu_beasiswa' => $input['jangka_waktu_beasiswa'],
            'besar_uang_beasiswa'   => $input['besar_uang_beasiswa']
        );
        $dataSekolah = array(
            'nis_siswa'             => $input['nis_lokal'], 
            'nisn'                  => $input['nisn'], 
            'sekolah_asal'          => $input['sekolah_asal'], 
            'jenis_sekolahasal'     => $input['jenis_sekolahasal'], 
            'status_sekolahasal'    => $input['status_sekolahasal'], 
            'kabupaten_sekolahasal' => $input['kabupaten_sekolahasal'], 
            'no_ujiansebelumnya'    => $input['no_ujiansebelumnya'], 
            'npsn_sekolahasal'      => $input['npsn_sekolahasal'], 
            'blanko_skhunasal'      => $input['blanko_skhunasal'], 
            'no_ijazahasal'         => $input['no_ijazahasal'], 
            'nilai_un'              => $input['nilai_un'], 
            'tgl_kelulusan'         => $input['tgl_kelulusan'] 
        );
        if ($input['nik_ayah']) {
            $dataAyah = array(
                'nik_ayah'          => $input['nik_ayah'], 
                'nokk_ayah'         => $input['no_kk'], 
                'kodepos_ayah'      => $input['kodepos'], 
                'nama_ayah'         => $input['nama_ayah'], 
                'tgllahir_ayah'     => $input['tgllahir_ayah'], 
                'pendidikan_ayah'   => $input['pendidikan_ayah'], 
                'pekerjaan_ayah'    => $input['pekerjaan_ayah'], 
                'penghasilan_ayah'  => $input['penghasilan_ayah'], 
                'alamat_ayah'       => $input['alamat_ayah'], 
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
                'nokk_ibu'         => $input['no_kk'], 
                'kodepos_ibu'      => $input['kodepos'], 
                'nama_ibu'         => $input['nama_ibu'], 
                'tgllahir_ibu'     => $input['tgllahir_ibu'], 
                'pendidikan_ibu'   => $input['pendidikan_ibu'], 
                'pekerjaan_ibu'    => $input['pekerjaan_ibu'], 
                'penghasilan_ibu'  => $input['penghasilan_ibu'], 
                'alamat_ibu'       => $input['alamat_ibu'], 
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
                'nokk_wali'         => $input['no_kk'], 
                'kodepos_wali'      => $input['kodepos'], 
                'nama_wali'         => $input['nama_wali'], 
                'tgllahir_wali'     => $input['tgllahir_wali'], 
                'pendidikan_wali'   => $input['pendidikan_wali'], 
                'pekerjaan_wali'    => $input['pekerjaan_wali'], 
                'penghasilan_wali'  => $input['penghasilan_wali'], 
                'alamat_wali'       => $input['alamat_wali'], 
                'provinsi_wali'     => $input['provinsi'], 
                'kabupaten_wali'    => $input['kabupaten'], 
                'kecamatan_wali'    => $input['kecamatan'], 
                'desa_wali'         => $input['desa']
            );
            $this->db->insert('tbl_wali', $dataWali);
        }
        if ($this->db->insert('tbl_siswa', $dataSiswa)) {
            $this->db->insert('tbl_sekolahasal',$dataSekolah);
            return true;
        }
        }
        catch (Exception $th) {
            return $th->getMessage();
        }
    }
    public function updateSiswa($input)
    {
        $phone  = preg_replace('/^0/', '+62', $input['phone']);
        $dataSiswa = array(
            'nis_lokal'             => $input['nis_lokal'], 
            'nisn'                  => $input['nisn'], 
            'no_induk'              => $input['no_induk'], 
            'nama_siswa'            => strip_tags($input['nama_siswa']), 
            'tempat_lahir'          => $input['tempat_lahir'], 
            'tgl_lahir'             => $input['tgl_lahir'], 
            'kelas'                 => $input['kelas'], 
            'jk'                    => $input['jk'], 
            'agama'                 => $input['agama'], 
            'alamat'                => $input['alamat'], 
            'phone_ortuwali'        => $phone,
            'jarak_rumahsekolah'    => $input['jarak_rumahsekolah'], 
            'kendaraan'             => $input['kendaraan'], 
            'status_siswa'          => $input['status_siswa'],
            'hobi'                  => $input['hobi'],
            'cita_cita'             => $input['cita_cita'],
            'jumlah_saudara'        => $input['jumlah_saudara'],
            'nik_ayah'              => $input['nik_ayah'],
            'nik_ibu'               => $input['nik_ibu'],
            'nik_wali'              => $input['nik_wali'],
            'no_kks'                => $input['no_kks'],
            'no_kph'                => $input['no_kph'],
            'no_kip'                => $input['no_kip'],
            'pid_status_penerima'   => $input['pid_status_penerima'],
            'pid_alasan_menerima'   => $input['pid_alasan_menerima'],
            'pid_periode'           => $input['pid_periode'],
            'bidang_prestasi'       => $input['bidang_prestasi'],
            'tingkat_prestasi'      => $input['tingkat_prestasi'],
            'peringkat_prestasi'    => $input['peringkat_prestasi'],
            'tahun_prestasi'        => $input['tahun_prestasi'],
            'status_beasiswa'       => $input['status_beasiswa'],
            'sumber_beasiswa'       => $input['sumber_beasiswa'],
            'jenis_beasiswa'        => $input['jenis_beasiswa'],
            'jangka_waktu_beasiswa' => $input['jangka_waktu_beasiswa'],
            'besar_uang_beasiswa'   => $input['besar_uang_beasiswa']
        );
        $dataSekolah = array(
            'nis_siswa'             => $input['nis_lokal'], 
            'nisn'                  => $input['nisn'], 
            'sekolah_asal'          => $input['sekolah_asal'], 
            'jenis_sekolahasal'     => $input['jenis_sekolahasal'], 
            'status_sekolahasal'    => $input['status_sekolahasal'], 
            'kabupaten_sekolahasal' => $input['kabupaten_sekolahasal'], 
            'no_ujiansebelumnya'    => $input['no_ujiansebelumnya'], 
            'npsn_sekolahasal'      => $input['npsn_sekolahasal'], 
            'blanko_skhunasal'      => $input['blanko_skhunasal'], 
            'no_ijazahasal'         => $input['no_ijazahasal'], 
            'nilai_un'              => $input['nilai_un'], 
            'tgl_kelulusan'         => $input['tgl_kelulusan'] 
        );
        if ($input['nik_ayah']) {
            $dataAyah = array(
                'nik_ayah'          => $input['nik_ayah'], 
                'nokk_ayah'         => $input['no_kk'], 
                'kodepos_ayah'      => $input['kodepos'], 
                'nama_ayah'         => $input['nama_ayah'], 
                'tgllahir_ayah'     => $input['tgllahir_ayah'], 
                'pendidikan_ayah'   => $input['pendidikan_ayah'], 
                'pekerjaan_ayah'    => $input['pekerjaan_ayah'], 
                'penghasilan_ayah'  => $input['penghasilan_ayah'], 
                'alamat_ayah'       => $input['alamat_ayah'], 
                'provinsi_ayah'     => $input['provinsi'], 
                'kabupaten_ayah'    => $input['kabupaten'], 
                'kecamatan_ayah'    => $input['kecamatan'], 
                'desa_ayah'         => $input['desa']
            );
            $cekAyah = $this->db->where('nik_ayah',$dataAyah['nik_ayah'])->get('tbl_ayah')->num_rows();
            if ($cekAyah > 0) {
                $this->db->where('nik_ayah',$dataAyah['nik_ayah'])->update('tbl_ayah', $dataAyah);
            }
            else {
                $this->db->insert('tbl_ayah', $dataAyah);
            }
        }
        if ($input['nik_ibu']) {
            $dataIbu = array(
                'nik_ibu'          => $input['nik_ibu'], 
                'nokk_ibu'         => $input['no_kk'], 
                'kodepos_ibu'      => $input['kodepos'], 
                'nama_ibu'         => $input['nama_ibu'], 
                'tgllahir_ibu'     => $input['tgllahir_ibu'], 
                'pendidikan_ibu'   => $input['pendidikan_ibu'], 
                'pekerjaan_ibu'    => $input['pekerjaan_ibu'], 
                'penghasilan_ibu'  => $input['penghasilan_ibu'], 
                'alamat_ibu'       => $input['alamat_ibu'], 
                'provinsi_ibu'     => $input['provinsi'], 
                'kabupaten_ibu'    => $input['kabupaten'], 
                'kecamatan_ibu'    => $input['kecamatan'], 
                'desa_ibu'         => $input['desa']
            );
            $cekIbu = $this->db->where('nik_ibu',$dataIbu['nik_ibu'])->get('tbl_ibu')->num_rows();
            if ($cekIbu > 0) {
                $this->db->where('nik_ibu',$dataIbu['nik_ibu'])->update('tbl_ibu', $dataIbu);
            }
            else {
                $this->db->insert('tbl_ibu', $dataIbu);
            }
        }
        if ($input['nik_wali']) {
            $dataWali = array(
                'nik_wali'          => $input['nik_wali'], 
                'nokk_wali'         => $input['no_kk'], 
                'kodepos_wali'      => $input['kodepos'], 
                'nama_wali'         => $input['nama_wali'], 
                'tgllahir_wali'     => $input['tgllahir_wali'], 
                'pendidikan_wali'   => $input['pendidikan_wali'], 
                'pekerjaan_wali'    => $input['pekerjaan_wali'], 
                'penghasilan_wali'  => $input['penghasilan_wali'], 
                'alamat_wali'       => $input['alamat_wali'], 
                'provinsi_wali'     => $input['provinsi'], 
                'kabupaten_wali'    => $input['kabupaten'], 
                'kecamatan_wali'    => $input['kecamatan'], 
                'desa_wali'         => $input['desa']
            );
            $cekWali = $this->db->where('nik_wali',$dataWali['nik_wali'])->get('tbl_wali')->num_rows();
            if ($cekWali > 0) {
                $this->db->where('nik_wali',$dataWali['nik_wali'])->update('tbl_wali', $dataWali);
            }
            else {
                $this->db->insert('tbl_wali', $dataWali);
            }
        }
        if ($this->db->where('nis_lokal',$dataSiswa['nis_lokal'])->update('tbl_siswa', $dataSiswa)) {
            $this->db->where('nis_siswa',$dataSiswa['nis_lokal'])->update('tbl_sekolahasal',$dataSekolah);
            return 'Berhasil';
        }
    }
    public function deleteSiswa($nis = NULL, $nik_ayah = NULL, $nik_ibu = NULL, $nik_wali = NULL)
    {
        if ($nis != NULL) {
            $this->db->where('nis_lokal',$nis)->delete('tbl_siswa');
            $this->db->where('nis_siswa',$nis)->delete('tbl_sekolahasal');
        }
        if ($nik_ayah != NULL) {
            $this->db->where('nik_ayah',$nik_ayah)->delete('tbl_ayah');
        }
        if ($nik_ibu != NULL) {
            $this->db->where('nik_ibu',$nik_ibu)->delete('tbl_ibu');
        }
        if ($nik_wali != NULL) {
            $this->db->where('nik_wali',$nik_wali)->delete('tbl_wali');
        }
        return 'Berhasil';
    }
}
