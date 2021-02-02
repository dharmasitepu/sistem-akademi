<?php
ini_set('max_execution_time', 0); 
ini_set('memory_limit','204M');
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportSiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    }
    public function index()
    {
        $data = array(
            'title'         => 'Import Data Siswa',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('import/importSiswa');
        $this->load->view('templates/footer-full');
    }
    function import(){
        if(isset($_FILES["file"]["name"])){
          $numInsert = 0;
          $numUpdate = 0;
          $path = $_FILES["file"]["tmp_name"];
          $object = PHPExcel_IOFactory::load($path);
          foreach($object->getWorksheetIterator() as $worksheet){
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for($row=6; $row<=$highestRow; $row++){
               $nis_lokal           = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
               $nisn                = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
               $no_induk            = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
               $nama_siswa          = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
               $ttl                 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
               $jk                  = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
               $phone               = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
               $hobi                = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
               $status_siswa        = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
               $jarak_rumahsekolah  = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
               $kendaraan           = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
               $agama               = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
               $sekolah_asal        = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
               $jenis_sekolahasal   = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
               $status_sekolahasal  = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
               $kabupaten_sekolahasal = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
               $no_ujiansebelumnya  = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
               $npsn_sekolahasal    = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
               $blanko_skhunasal    = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
               $no_ijazahasal       = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
               $nilai_un            = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
               $tgl_kelulusan       = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
               $alamat              = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
               $provinsi            = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
               $kabupaten           = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
               $kecamatan           = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
               $desa                = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
               $kodepos             = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
               $no_kk               = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
               $nama_ayah           = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
               $nik_ayah            = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
               $pendidikan_ayah     = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
               $pekerjaan_ayah      = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
               $nama_ibu            = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
               $nik_ibu             = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
               $pendidikan_ibu      = $worksheet->getCellByColumnAndRow(36, $row)->getValue();
               $pekerjaan_ibu       = $worksheet->getCellByColumnAndRow(37, $row)->getValue();
               $penghasilan_ortu    = $worksheet->getCellByColumnAndRow(38, $row)->getValue();
               $nik_wali            = $worksheet->getCellByColumnAndRow(39, $row)->getValue();
               $nama_wali           = $worksheet->getCellByColumnAndRow(40, $row)->getValue();
               $tgllahir_wali       = $worksheet->getCellByColumnAndRow(41, $row)->getValue();
               $pendidikan_wali     = $worksheet->getCellByColumnAndRow(42, $row)->getValue();
               $pekerjaan_wali      = $worksheet->getCellByColumnAndRow(43, $row)->getValue();
               $penghasilan_wali    = $worksheet->getCellByColumnAndRow(44, $row)->getValue();
               $no_kks              = $worksheet->getCellByColumnAndRow(45, $row)->getValue();
               $no_kph              = $worksheet->getCellByColumnAndRow(46, $row)->getValue();
               $no_kip              = $worksheet->getCellByColumnAndRow(47, $row)->getValue();
               $pid_status_penerima = $worksheet->getCellByColumnAndRow(48, $row)->getValue();
               $pid_alasan_penerima = $worksheet->getCellByColumnAndRow(49, $row)->getValue();
               $pid_periode         = $worksheet->getCellByColumnAndRow(50, $row)->getValue();
               $bidang_prestasi     = $worksheet->getCellByColumnAndRow(51, $row)->getValue();
               $tingkat_prestasi    = $worksheet->getCellByColumnAndRow(52, $row)->getValue();
               $peringkat_prestasi  = $worksheet->getCellByColumnAndRow(53, $row)->getValue();
               $tahun_prestasi      = $worksheet->getCellByColumnAndRow(54, $row)->getValue();
               $status_beasiswa     = $worksheet->getCellByColumnAndRow(55, $row)->getValue();
               $sumber_beasiswa     = $worksheet->getCellByColumnAndRow(56, $row)->getValue();
               $jenis_beasiswa      = $worksheet->getCellByColumnAndRow(57, $row)->getValue();
               $jangka_waktu_beasiswa = $worksheet->getCellByColumnAndRow(58, $row)->getValue();
               $besar_uang_beasiswa = $worksheet->getCellByColumnAndRow(59, $row)->getValue();
               $kelas               = $worksheet->getCellByColumnAndRow(60, $row)->getValue();
                if ($nis_lokal != 0) {
                $dataTTL = ($ttl != NULL ) ? explode(',',$ttl) : NULL;
                $dataSiswa = array(
                    'nis_lokal'             => ($nis_lokal != NULL) ? $nis_lokal : 0,
                    'nisn'                  => ($nisn != NULL) ? $nisn : 0,
                    'no_induk'              => ($no_induk != NULL) ? $no_induk : 0,
                    'nama_siswa'            => ($nama_siswa != NULL) ? $nama_siswa : '',
                    'tempat_lahir'          => ($dataTTL != NULL) ? ((isset($dataTTL[0])) ? $dataTTL[0] : '') : '',
                    'tgl_lahir'             => ($dataTTL != NULL) ? ((isset($dataTTL[1])) ? date('Y-m-d', strtotime($dataTTL[1])) : '') : '',
                    'jk'                    => ($jk == 'Laki-Laki' || $jk == 'Laki - Laki' || $jk == 'L' || $jk == 'l' || $jk == 'Laki' || $jk == 'laki') ? 'Laki-Laki' : 'Perempuan',
                    'status_siswa'          => ($status_siswa != NULL) ? $status_siswa : '',
                    'phone_ortuwali'        => ($phone != NULL) ? $phone : '',
                    'cita_cita'             => '',
                    'kelas'                 => ($kelas != NULL) ? $kelas : 0,
                    'alamat'                => ($alamat != NULL) ? $alamat : '',
                    'hobi'                  => ($hobi != NULL) ? $hobi : '',
                    'jumlah_saudara'        => 0,
                    'jarak_rumahsekolah'    => ($jarak_rumahsekolah != NULL) ? (int) filter_var($jarak_rumahsekolah, FILTER_SANITIZE_NUMBER_INT) : 0,
                    'kendaraan'             => ($kendaraan != NULL) ? $kendaraan : '',
                    'agama'                 => ($agama != NULL) ? $agama : '',
                    'nik_ayah'              => ($nik_ayah != NULL) ? $nik_ayah : 0,
                    'nik_ibu'               => ($nik_ibu != NULL) ? $nik_ibu : 0,
                    'nik_wali'              => ($nik_wali != NULL) ? $nik_wali : 0,
                    'no_kks'                => ($no_kks != NULL) ? $no_kks : 0,
                    'no_kph'                => ($no_kph != NULL) ? $no_kph : 0,
                    'no_kip'                => ($no_kip != NULL) ? $no_kip : 0,
                    'pid_status_penerima'   => ($pid_status_penerima != NULL) ? $pid_status_penerima : '',
                    'pid_alasan_menerima'   => ($pid_alasan_penerima != NULL) ? $pid_alasan_penerima : '',
                    'pid_periode'           => ($pid_periode != NULL) ? $pid_periode : '',
                    'bidang_prestasi'       => ($bidang_prestasi != NULL) ? $bidang_prestasi : '',
                    'tingkat_prestasi'      => ($tingkat_prestasi != NULL) ? $tingkat_prestasi : '',
                    'peringkat_prestasi'    => ($peringkat_prestasi != NULL) ? $peringkat_prestasi : '',
                    'tahun_prestasi'        => ($tahun_prestasi != NULL) ? $tahun_prestasi : '',
                    'status_beasiswa'       => ($status_beasiswa != NULL) ? $status_beasiswa : '',
                    'sumber_beasiswa'       => ($sumber_beasiswa != NULL) ? $sumber_beasiswa : '',
                    'jenis_beasiswa'        => ($jenis_beasiswa != NULL) ? $jenis_beasiswa : '',
                    'jangka_waktu_beasiswa' => ($jangka_waktu_beasiswa != NULL) ? $jangka_waktu_beasiswa : '',
                    'besar_uang_beasiswa'   => ($besar_uang_beasiswa != NULL) ? $besar_uang_beasiswa : '',
                );
                $dataSekolahAsal = array(
                    'nis_siswa'             => ($nis_lokal != NULL) ? $nis_lokal : 0, 
                    'nisn'                  => ($nisn != NULL) ? $nisn : 0,
                    'sekolah_asal'          => ($sekolah_asal != NULL) ? $sekolah_asal : '',
                    'jenis_sekolahasal'     => ($jenis_sekolahasal != NULL) ? $jenis_sekolahasal : '',
                    'status_sekolahasal'    => ($status_sekolahasal != NULL) ? $status_sekolahasal : '',
                    'kabupaten_sekolahasal' => ($kabupaten_sekolahasal != NULL) ? $kabupaten_sekolahasal : '',
                    'no_ujiansebelumnya'    => ($no_ujiansebelumnya != NULL) ? $no_ujiansebelumnya : '',
                    'npsn_sekolahasal'      => ($npsn_sekolahasal != NULL) ? $npsn_sekolahasal : '',
                    'blanko_skhunasal'      => ($blanko_skhunasal != NULL) ? $blanko_skhunasal : '',
                    'no_ijazahasal'         => ($no_ijazahasal != NULL) ? $no_ijazahasal : '',
                    'nilai_un'              => ($nilai_un != NULL) ? $nilai_un : 0,
                    'tgl_kelulusan'         => ($tgl_kelulusan != NULL) ? date('Y-m-d', strtotime($tgl_kelulusan)) : '0000-00-00',
                );
                if ($nik_ayah != NULL) {
                    $dataAyah = array(
                        'nik_ayah' => ($nik_ayah != NULL) ? $nik_ayah : 0,
                        'nokk_ayah' => ($no_kk != NULL) ? $no_kk : 0, 
                        'kodepos_ayah' => ($kodepos != NULL) ? $kodepos : 0, 
                        'nama_ayah' => ($nama_ayah != NULL) ? $nama_ayah : 0,
                        'tgllahir_ayah' => '0000-00-00',
                        'pendidikan_ayah' => ($pendidikan_ayah != NULL) ? $pendidikan_ayah : 0,
                        'pekerjaan_ayah' => ($pekerjaan_ayah != NULL) ? $pekerjaan_ayah : 0,
                        'penghasilan_ayah' => ($penghasilan_ortu != NULL) ? $penghasilan_ortu : 0,
                        'alamat_ayah' => ($alamat != NULL) ? $alamat : 0,
                        'provinsi_ayah' => ($provinsi != NULL) ? $provinsi : 0,
                        'kabupaten_ayah' => ($kabupaten != NULL) ? $kabupaten : 0,
                        'kecamatan_ayah' => ($kecamatan != NULL) ? $kecamatan : 0,
                        'desa_ayah' => ($desa != NULL) ? $desa : 0,
                    );
                    $cekNikAyah = $this->db->get_where('tbl_ayah', ['nik_ayah' => $dataAyah['nik_ayah']])->num_rows();
                    if ($cekNikAyah > 0) {
                        $this->db->where('nik_ayah', $dataAyah['nik_ayah'])->update('tbl_ayah', $dataAyah);
                    }
                    else {
                        $this->db->insert('tbl_ayah', $dataAyah);
                    }
                }
                if ($nik_ibu != NULL) {
                    $dataIbu = array(
                        'nik_ibu' => ($nik_ibu != NULL) ? $nik_ibu : 0,
                        'nokk_ibu' => ($no_kk != NULL) ? $no_kk : 0, 
                        'kodepos_ibu' => ($kodepos != NULL) ? $kodepos : 0, 
                        'nama_ibu' => ($nama_ibu != NULL) ? $nama_ibu : 0,
                        'tgllahir_ibu' => '0000-00-00',
                        'pendidikan_ibu' => ($pendidikan_ibu != NULL) ? $pendidikan_ibu : 0,
                        'pekerjaan_ibu' => ($pekerjaan_ibu != NULL) ? $pekerjaan_ibu : 0,
                        'penghasilan_ibu' => ($penghasilan_ortu != NULL) ? $penghasilan_ortu : 0,
                        'alamat_ibu' => ($alamat != NULL) ? $alamat : 0,
                        'provinsi_ibu' => ($provinsi != NULL) ? $provinsi : 0,
                        'kabupaten_ibu' => ($kabupaten != NULL) ? $kabupaten : 0,
                        'kecamatan_ibu' => ($kecamatan != NULL) ? $kecamatan : 0,
                        'desa_ibu' => ($desa != NULL) ? $desa : 0,
                    );
                    $cekNikIbu = $this->db->get_where('tbl_ibu', ['nik_ibu' => $dataIbu['nik_ibu']])->num_rows();
                    if ($cekNikIbu > 0) {
                        $this->db->where('nik_ibu', $dataIbu['nik_ibu'])->update('tbl_ibu', $dataIbu);
                    }
                    else {
                        $this->db->insert('tbl_ibu', $dataIbu);
                    }
                }
                if ($nik_wali != NULL) {
                    $dataWali = array(
                        'nik_wali' => ($nik_wali != NULL) ? $nik_wali : 0,
                        'nokk_wali' => ($no_kk != NULL) ? $no_kk : 0, 
                        'kodepos_wali' => ($kodepos != NULL) ? $kodepos : 0, 
                        'nama_wali' => ($nama_wali != NULL) ? $nama_wali : 0,
                        'tgllahir_wali' => ($tgllahir_wali != NULL) ? date('Y-m-d', strtotime($tgllahir_wali)) : '0000-00-00',
                        'pendidikan_wali' => ($pendidikan_wali != NULL) ? $pendidikan_wali : 0,
                        'pekerjaan_wali' => ($pekerjaan_wali != NULL) ? $pekerjaan_wali : 0,
                        'penghasilan_wali' => ($penghasilan_wali != NULL) ? $penghasilan_wali : 0,
                        'alamat_wali' => ($alamat != NULL) ? $alamat : 0,
                        'provinsi_wali' => ($provinsi != NULL) ? $provinsi : 0,
                        'kabupaten_wali' => ($kabupaten != NULL) ? $kabupaten : 0,
                        'kecamatan_wali' => ($kecamatan != NULL) ? $kecamatan : 0,
                        'desa_wali' => ($desa != NULL) ? $desa : 0,
                    );
                    $cekNikWali = $this->db->get_where('tbl_wali', ['nik_wali' => $dataWali['nik_wali']])->num_rows();
                    if ($cekNikWali > 0) {
                        $this->db->where('nik_wali', $dataWali['nik_wali'])->update('tbl_wali', $dataWali);
                    }
                    else {
                        $this->db->insert('tbl_wali', $dataWali);
                    }
                }
                $cekNIS = $this->db->get_where('tbl_siswa', ['nis_lokal' => $dataSiswa['nis_lokal']])->num_rows();
                if ($cekNIS > 0) {
                    $this->db->where('nis_lokal', $dataSiswa['nis_lokal'])->update('tbl_siswa', $dataSiswa);
                    $this->db->where('nis_siswa', $dataSiswa['nis_lokal'])->update('tbl_sekolahasal', $dataSekolahAsal);
                    $numUpdate++;
                }
                else{
                    $dataSiswa['foto'] = ($jk == 'Laki-Laki' || $jk == 'Laki - Laki' || $jk == 'L' || $jk == 'l' || $jk == 'Laki' || $jk == 'laki') ? 'default-male.jpg' : 'default-female.jpg';
                    $this->db->insert('tbl_siswa', $dataSiswa);
                    $this->db->insert('tbl_sekolahasal', $dataSekolahAsal);
                    $numInsert++;
                }
                }
            }
        }
        $this->session->set_flashdata('berhasil', $numInsert.' Data Siswa Berhasil Ditambahkan. <br>' . $numUpdate . ' Data Siswa Berhasil DiUpdate.');
        helper_log('import','Mengimport data siswa', $numInsert.' Data Siswa Berhasil Ditambahkan.' . $numUpdate . ' Data Siswa Berhasil DiUpdate.');
        redirect('Siswa');
        }
    }
}

