<?php
ini_set('max_execution_time', 0); 
ini_set('memory_limit','204M');
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportGuru extends CI_Controller
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
            'title'         => 'Import Data Guru',
            'dataSekolah'   => $this->DataSekolah_m->getSekolah() 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('import/importGuru');
        $this->load->view('templates/footer-full');
    }
    function import(){
        if(isset($_FILES["file"]["name"])){
          $num = 0;
          $path = $_FILES["file"]["tmp_name"];
          $object = PHPExcel_IOFactory::load($path);
          foreach($object->getWorksheetIterator() as $worksheet){
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for($row=6; $row<=$highestRow; $row++){
               $nama            = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
               $nik             = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
               $jk              = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
               $tempatLahir     = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
               $tanggalLahir    = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
               $namaIbu         = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
               $alamat          = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
               $rt              = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
               $rw              = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
               $desa            = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
               $kecamatan       = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
               $kabupaten       = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
               $provinsi        = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
               $kode_pos        = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
               $agama           = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
               $npwp            = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
               $namanpwp        = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
               $kewarganegaraan = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
               $pernikahan      = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
               $nama_suamiistri = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
               $nip_suamiistri  = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
               $pekerjaan_suamiistri = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
               $status_kepegawaian   = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
               $nip             = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
               $niy             = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
               $nuptk           = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
               $jenis_ptk       = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
               $sk_pengangkatan = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
               $tgl_pengangkatan = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
               $lembaga_pengangkat = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
               $sk_cpns         = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
               $mulai_cpns      = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
               $mulai_pns       = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
               $golongan        = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
               $sumber_gaji     = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
               $kartu_pegawai   = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
               $kartu_suamiistri= $worksheet->getCellByColumnAndRow(36, $row)->getValue();
               $telp_rumah      = $worksheet->getCellByColumnAndRow(37, $row)->getValue();
               $phone           = $worksheet->getCellByColumnAndRow(38, $row)->getValue();
               $email           = $worksheet->getCellByColumnAndRow(39, $row)->getValue();
               $nama_bank       = $worksheet->getCellByColumnAndRow(40, $row)->getValue();
               $no_rek          = $worksheet->getCellByColumnAndRow(41, $row)->getValue();
               $atas_nama       = $worksheet->getCellByColumnAndRow(42, $row)->getValue();
               $data = array(
                'nama_guru'     => $nama,
                'nik'           => $nik,
                'jk'            => ($jk != NULL) ? (($jk == 'Laki-Laki' || $jk == 'Laki - Laki' || $jk == 'L' || $jk == 'l'  || $jk == 'Laki') ? 'Laki-Laki' : 'Perempuan') : '',
                'tempat_lahir'  => ($tempatLahir != NULL) ? $tempatLahir : '',
                'tgllahir_guru' => ($tanggalLahir != NULL) ? date('Y-m-d', strtotime($tanggalLahir)) : '0000-00-00',
                'nama_ibu'      => ($namaIbu != NULL) ? $namaIbu : '',
                'alamat'        => ($alamat != NULL) ? $alamat : '',
                'rt'            => ($rt != NULL) ? $rt : 0 ,
                'rw'            => ($rw != NULL) ? $rw : 0 ,
                'desa_guru'     => ($desa != NULL) ? $desa : '',
                'kecamatan_guru'=> ($kecamatan != NULL) ? $kecamatan : '',
                'kabupaten_guru'=> ($kabupaten != NULL) ? $kabupaten : '',
                'provinsi_guru' => ($provinsi != NULL) ? $provinsi : '',
                'kode_pos'      => ($kode_pos != NULL) ? $kode_pos : 0,
                'agama'         => ($agama != NULL) ? $agama : '',
                'no_npwp'       => ($npwp != NULL) ? $npwp : 0,
                'nama_npwp'     => ($namanpwp != NULL) ? $namanpwp : '',
                'kewarganegaraan' => ($kewarganegaraan != NULL) ? $kewarganegaraan : '',
                'pernikahan'      => ($pernikahan != NULL) ? $pernikahan : '',
                'nama_suamiistri' => ($nama_suamiistri != NULL) ? $nama_suamiistri : '',
                'nip_suamiistri'  => ($nip_suamiistri != NULL) ? $nip_suamiistri : '',
                'pekerjaan_suamiistri' => ($pekerjaan_suamiistri != NULL) ? $pekerjaan_suamiistri : '',
                'status_kepegawaian'   => ($status_kepegawaian != NULL) ? $status_kepegawaian : '',
                'nip'           => ($nip != NULL) ? $nip : 0,
                'no_niy'        => ($niy != NULL) ? $niy : 0,
                'nuptk'         => ($nuptk != NULL) ? $nuptk : 0,
                'jenis_ptk'     => ($jenis_ptk != NULL) ? $jenis_ptk : '',
                'sk_pengangkatan'       => ($sk_pengangkatan != NULL) ? $sk_pengangkatan : '',
                'tgl_pengangkatan'      => ($tgl_pengangkatan != NULL) ? date('Y-m-d', strtotime($tgl_pengangkatan)) : '0000-00-00',
                'lembaga_pengangkat'    => ($lembaga_pengangkat != NULL) ? $lembaga_pengangkat : '',
                'sk_cpns'       => ($sk_cpns != NULL) ? $sk_cpns : '',
                'tgl_cpns'      => ($mulai_cpns != NULL) ? date('Y-m-d', strtotime($mulai_cpns)) : '0000-00-00',
                'tgl_pns'       => ($mulai_pns != NULL) ? date('Y-m-d', strtotime($mulai_pns)) : '0000-00-00',
                'golongan'      => ($golongan != NULL) ? $golongan : '',
                'sumber_gaji'   => ($sumber_gaji != NULL) ? $sumber_gaji : '',
                'no_kartupegawai'   => ($kartu_pegawai != NULL) ? $kartu_pegawai : 0,
                'kartu_istrisuami'  => ($kartu_suamiistri != NULL) ? $kartu_suamiistri : 0,
                'telp_rumah'    => ($telp_rumah != NULL) ? $telp_rumah : 0,
                'no_hp'         => ($phone != NULL) ? preg_replace('/^0/', '+62', $phone) : 0,
                'email'         => ($email != NULL) ? $email : '',
                'nama_bank'     => ($nama_bank != NULL) ? $nama_bank : '',
                'rekening'      => ($no_rek != NULL) ? $no_rek : 0,
                'atas_nama'     => ($sk_cpns != NULL) ? $atas_nama : '',
                'jenjang_pendidikan' => '',
                'kelompok_prodi' => 0,
                );
                $cekNIK = $this->db->get_where('tbl_guru', ['nik' => $data['nik']])->num_rows();
                if ($cekNIK > 0) {
                    $this->db->where('nik', $data['nik'])->update('tbl_guru', $data);
                    $num++;
                }
                else{
                    if ($data['nip'] != NULL) {
                        $cekNIP = $this->db->get_where('tbl_guru', ['nip' => $data['nip']])->num_rows();
                        if ($cekNIP > 0) {
                            $this->db->where('nip', $data['nip'])->update('tbl_guru', $data);
                            $num++;
                        }
                        else{ 
                            $data['foto'] = ($jk == 'Laki-Laki' || $jk == 'Laki - Laki' || $jk == 'L' || $jk == 'l' || $jk == 'Laki' || $jk == 'laki') ? 'default-male.jpg' : 'default-female.jpg';
                            $this->db->insert('tbl_guru', $data);
                            $num++;
                        }
                    }
                    else{
                        $data['foto'] = ($jk == 'Laki-Laki' || $jk == 'Laki - Laki' || $jk == 'L' || $jk == 'l' || $jk == 'Laki' || $jk == 'laki') ? 'default-male.jpg' : 'default-female.jpg';
                        $this->db->insert('tbl_guru', $data);
                        $num++;
                    }
                }
            }
        }
        $this->session->set_flashdata('berhasil', $num.' Data Guru Berhasil Di Import');
        helper_log('import','Mengimport data guru', $num.' Data Guru Berhasil Di Import');
        redirect('guru');
        }
    }
}

