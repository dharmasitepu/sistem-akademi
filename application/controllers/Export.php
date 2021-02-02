<?php
ini_set('max_execution_time', 0); 
ini_set('memory_limit','204M');
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        $this->load->model('DataSiswa_m');
        $this->load->model('DataGuru_m');
        $this->load->model('Wilayah_m');
        date_default_timezone_set('Asia/Jakarta');
        $this->bulan = (date('m') == 1)  ? 'Januari'
                     : ((date('m') == 2) ? 'Februari' 
                     : ((date('m') == 3) ? 'Maret'
                     : ((date('m') == 4) ? 'April'
                     : ((date('m') == 5) ? 'Mei'
                     : ((date('m') == 6) ? 'Juni'
                     : ((date('m') == 7) ? 'Juli'
                     : ((date('m') == 8) ? 'Agustus'
                     : ((date('m') == 9) ? 'September'
                     : ((date('m') == 10)? 'Oktober'
                     : ((date('m') == 11)? 'November'
                     : ((date('m') == 12)? 'Desember' : NULL
                     )))))))))));
    }


    // =================================================== SISWA ====================================================
    public function fullSiswa($nis = NULL){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $showSekolah = $this->DataSekolah_m->getSekolah();

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
                     ->setLastModifiedBy('My Notes Code')
                     ->setTitle("Data Siswa")
                     ->setSubject("Siswa")
                     ->setDescription("Laporan Semua Data Siswa")
                     ->setKeywords("Data Siswa");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
          'font' => array('bold' => true), // Set font nya jadi bold
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );

        //  =================================== SET Style ===============================
        if ($nis == 'format') {
          $excel->setActiveSheetIndex(0)->setCellValue('A1', "Format Import Data Siswa ".$showSekolah->nama_sekolah); // Set kolom A1 dengan tulisan "DATA SISWA"
        }
        else{
          $excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Lengkap Siswa ".$showSekolah->nama_sekolah); // Set kolom A1 dengan tulisan "DATA SISWA"
        }
        $excel->getActiveSheet()->mergeCells('A1:J2'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->mergeCells('A3:M3');
        $excel->getActiveSheet()->mergeCells('N3:W3');
        $excel->getActiveSheet()->mergeCells('X3:AC3');
        $excel->getActiveSheet()->mergeCells('AD3:AM3');
        $excel->getActiveSheet()->mergeCells('AN3:AS3');
        $excel->getActiveSheet()->mergeCells('A4:A5');
        $excel->getActiveSheet()->mergeCells('B4:B5');
        $excel->getActiveSheet()->mergeCells('C4:C5');
        $excel->getActiveSheet()->mergeCells('D4:D5');
        $excel->getActiveSheet()->mergeCells('E4:E5');
        $excel->getActiveSheet()->mergeCells('F4:F5');
        $excel->getActiveSheet()->mergeCells('G4:G5');
        $excel->getActiveSheet()->mergeCells('H4:H5');
        $excel->getActiveSheet()->mergeCells('I4:I5');
        $excel->getActiveSheet()->mergeCells('J4:J5');
        $excel->getActiveSheet()->mergeCells('K4:K5');
        $excel->getActiveSheet()->mergeCells('L4:L5');
        $excel->getActiveSheet()->mergeCells('M4:M5');
        $excel->getActiveSheet()->mergeCells('N4:N5');
        $excel->getActiveSheet()->mergeCells('O4:O5');
        $excel->getActiveSheet()->mergeCells('P4:P5');
        $excel->getActiveSheet()->mergeCells('Q4:Q5');
        $excel->getActiveSheet()->mergeCells('R4:R5');
        $excel->getActiveSheet()->mergeCells('S4:S5');
        $excel->getActiveSheet()->mergeCells('T4:T5');
        $excel->getActiveSheet()->mergeCells('U4:U5');
        $excel->getActiveSheet()->mergeCells('V4:V5');
        $excel->getActiveSheet()->mergeCells('W4:W5');
        $excel->getActiveSheet()->mergeCells('X4:X5');
        $excel->getActiveSheet()->mergeCells('Y4:Y5');
        $excel->getActiveSheet()->mergeCells('Z4:Z5');
        $excel->getActiveSheet()->mergeCells('AA4:AA5');
        $excel->getActiveSheet()->mergeCells('AB4:AB5');
        $excel->getActiveSheet()->mergeCells('AC4:AC5');
        $excel->getActiveSheet()->mergeCells('AD4:AD5');
        $excel->getActiveSheet()->mergeCells('AE4:AH4');
        $excel->getActiveSheet()->mergeCells('AI4:AL4');
        $excel->getActiveSheet()->mergeCells('AM4:AM5');
        $excel->getActiveSheet()->mergeCells('AN4:AN5');
        $excel->getActiveSheet()->mergeCells('AO4:AO5');
        $excel->getActiveSheet()->mergeCells('AP4:AP5');
        $excel->getActiveSheet()->mergeCells('AQ4:AQ5');
        $excel->getActiveSheet()->mergeCells('AR4:AR5');
        $excel->getActiveSheet()->mergeCells('AS4:AS5');
        $excel->getActiveSheet()->mergeCells('AT3:AT5');
        $excel->getActiveSheet()->mergeCells('AU3:AU5');
        $excel->getActiveSheet()->mergeCells('AV3:AV5');
        $excel->getActiveSheet()->mergeCells('AW3:AY3');
        $excel->getActiveSheet()->mergeCells('AW4:AW5');
        $excel->getActiveSheet()->mergeCells('AX4:AX5');
        $excel->getActiveSheet()->mergeCells('AY4:AY5');
        $excel->getActiveSheet()->mergeCells('AZ3:BC3');
        $excel->getActiveSheet()->mergeCells('AZ4:AZ5');
        $excel->getActiveSheet()->mergeCells('BA4:BA5');
        $excel->getActiveSheet()->mergeCells('BB4:BB5');
        $excel->getActiveSheet()->mergeCells('BC4:BC5');
        $excel->getActiveSheet()->mergeCells('BD3:BH3');
        $excel->getActiveSheet()->mergeCells('BD4:BD5');
        $excel->getActiveSheet()->mergeCells('BE4:BE5');
        $excel->getActiveSheet()->mergeCells('BF4:BF5');
        $excel->getActiveSheet()->mergeCells('BG4:BG5');
        $excel->getActiveSheet()->mergeCells('BH4:BH5');
        $excel->getActiveSheet()->mergeCells('BI3:BI5');
        $excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('P')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('V')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('W')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('AC')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('BI')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "Data Pribadi Siswa"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('N3', "Asal Sekolah Sebelumnya"); // Set kolom A3 dengan tulisan "NO"
        if ($nis != 'format') {
        $excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); // Set kolom A3 dengan tulisan "NO"
        }
        $excel->setActiveSheetIndex(0)->setCellValue('B4', "NIS Lokal"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C4', "NISN"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D4', "Nomor Induk"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E4', "Nama Siswa"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F4', "TTL"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G4', "Jenis Kelamin"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H4', "Phone"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I4', "Hobi"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('J4', "Status Siswa"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('K4', "Jarak Rumah ke Sekolah"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('L4', "Transportasi"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('M4', "Agama"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('N4', "Nama Sekolah"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('O4', "Jenis Sekolah"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('P4', "Status Sekolah"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('Q4', "Kabupaten / Kota"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('R4', "Nomor Peserta Ujian"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('S4', "NPSN Sekolah"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('T4', "No Blanko SKHU Sebelumnya"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('U4', "No Ijazah Asal"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('V4', "Nilai UN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('W4', "Tanggal Kelulusan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('X3', "Alamat Orang Tua / Wali Siswa"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('X4', "Alamat"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('Y4', "Provinsi"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('Z4', "Kabupaten"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AA4', "Kecamatan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AB4', "Desa"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AC4', "Kode POS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AD3', "Orang Tua Siswa"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AD4', "NO KK"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AE4', "Ayah"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AE5', "Nama"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AF5', "NIK"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AG5', "Pendidikan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AH5', "Pekerjaan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AI4', "Ibu"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AI5', "Nama"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AJ5', "NIK"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AK5', "Pendidikan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AL5', "Pekerjaan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AM4', "Penghasilan Rata-Rata"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AN3', "Wali Siswa"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AN4', "NIK"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AO4', "Nama"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AP4', "Tanggal Lahir"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AQ4', "Pendidikan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AR4', "Pekerjaan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AS4', "Penghasilan Rata-Rata"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AT3', "No KKS / KPS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AU3', "No Kartu PKH"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AV3', "No Kartu Indonesia Pintar"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AW3', "Program Indonesia Pintar (PIP)"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AW4', "Status Penerima"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AX4', "Alasan Menerima"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AY4', "Periode Menerima"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AZ3', "Prestasi tertinggi yang pernah Diraih"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('AZ4', "Bidang Prestasi"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BA4', "Tingkat Prestasi"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BB4', "Peringkat yang diraih"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BC4', "Tahun Meraih"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BD3', "Beasiswa Yang Diterima"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BD4', "Status Beasiswa"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BE4', "Sumber Beasiswa"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BF4', "Jenis Beasiswa"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BG4', "Jangka Waktu"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BH4', "Besar Uang Diterima (Rp)"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('BI3', "ID Kelas"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3:W4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');
        $excel->getActiveSheet()->getStyle('X3:AC4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('92D050');
        $excel->getActiveSheet()->getStyle('AD3:AM5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');
        $excel->getActiveSheet()->getStyle('AN3:AS5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('92D050');
        $excel->getActiveSheet()->getStyle('AT3:BH5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('BFBFBF');
        $excel->getActiveSheet()->getStyle('BI3:BI5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');
        $excel->getActiveSheet()->getStyle('A3:M3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('X3:AC3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AD3:AM3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('A3:M3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N3:W3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('A4:A5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B4:B5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C4:C5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D4:D5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E4:E5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F4:F5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G4:G5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H4:H5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I4:I5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J4:J5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K4:K5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L4:L5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M4:M5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N4:N5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O4:O5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P4:P5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Q4:Q5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('R4:R5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('S4:S5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('T4:T5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('U4:U5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('V4:V5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('W4:W5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('X4:X5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Y4:Y5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Z4:Z5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AA4:AA5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AB4:AB5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AC4:AC5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AD4:AD5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AE4:AH4')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AE5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AF5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AG5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AH5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AI4:AL4')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AI5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AJ5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AK5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AL5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AM4:AM5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AN3:AS3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AN4:AN5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AO4:AO5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AP4:AP5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AQ4:AQ5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AR4:AR5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AS4:AS5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AT3:AT5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AU3:AU5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AV3:AV5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AW3:AY3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AW4:AW5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AX4:AX5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AY4:AY5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AZ3:BC3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('AZ4:AZ5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BA4:BA5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BB4:BB5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BC4:BC5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BD3:BH3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BD4:BD5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BE4:BE5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BF4:BF5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BG4:BG5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BH4:BH5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('BI3:BI5')->applyFromArray($style_col);

        // ================================== ADD Data ============================
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        if ($nis != NULL) {
            $siswa = $this->DataSiswa_m->getDataSiswa($nis);
        }
        else{
            $siswa = $this->DataSiswa_m->getAllDataSiswa();
        }
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($siswa as $data){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis_lokal);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nisn);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->no_induk);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nama_siswa);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tempat_lahir.', '.$data->tgl_lahir);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jk);
          $excel->getActiveSheet()->setCellValueExplicit('H'.$numrow, $data->phone_ortuwali, PHPExcel_Cell_DataType::TYPE_STRING);
          $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->hobi);
          $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->status_siswa);
          $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->jarak_rumahsekolah.' Km');
          $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->kendaraan);
          $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->agama);
          $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->sekolah_asal);
          $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->jenis_sekolahasal);
          $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->status_sekolahasal);
          $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->kabupaten_sekolahasal);
          $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->no_ujiansebelumnya);
          $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->npsn_sekolahasal);
          $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->blanko_skhunasal);
          $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->no_ijazahasal);
          $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->nilai_un);
          $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->tgl_kelulusan);
          $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->alamat);
          if ($data->provinsi_ayah) {
            $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $this->Wilayah_m->getProv($data->provinsi_ayah));
            $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $this->Wilayah_m->getKab($data->kabupaten_ayah));
            $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $this->Wilayah_m->getKec($data->kecamatan_ayah));
            $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $this->Wilayah_m->getDes($data->desa_ayah));
            $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->kodepos_ayah);
          }
          elseif ($data->provinsi_ibu) {
            $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $this->Wilayah_m->getProv($data->provinsi_ibu));
            $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $this->Wilayah_m->getKab($data->kabupaten_ibu));
            $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $this->Wilayah_m->getKec($data->kecamatan_ibu));
            $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $this->Wilayah_m->getDes($data->desa_ibu));
            $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->kodepos_ibu);
          }
          elseif ($data->provinsi_wali) {
            $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $this->Wilayah_m->getProv($data->provinsi_wali));
            $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $this->Wilayah_m->getKab($data->kabupaten_wali));
            $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $this->Wilayah_m->getKec($data->kecamatan_wali));
            $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $this->Wilayah_m->getDes($data->desa_wali));
            $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->kodepos_wali);
          }
          if ($data->nik_ayah || $data->nik_ibu) {
            $excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->nokk_ayah);
            $excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->nama_ayah);
            $excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data->nik_ayah);
            $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->pendidikan_ayah);
            $excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->pekerjaan_ayah);
            $excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->nama_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->nik_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->pendidikan_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->pekerjaan_ibu);
            $excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data->penghasilan_ayah);
          }
          if ($data->nik_wali) {
            $excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->nik_wali);
            $excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->nama_wali);
            $excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->tgllahir_wali);
            $excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->pendidikan_wali);
            $excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data->pekerjaan_wali);
            $excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->penghasilan_wali);
          }
          $excel->setActiveSheetIndex(0)->setCellValue('AT'.$numrow, $data->no_kks);
          $excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->no_kph);
          $excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, $data->no_kip);
          $excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data->pid_status_penerima);
          $excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data->pid_alasan_menerima);
          $excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data->pid_periode);
          $excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data->bidang_prestasi);
          $excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->tingkat_prestasi);
          $excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->peringkat_prestasi);
          $excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->tahun_prestasi);
          $excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, $data->status_beasiswa);
          $excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->sumber_beasiswa);
          $excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->jenis_beasiswa);
          $excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->jangka_waktu_beasiswa);
          $excel->setActiveSheetIndex(0)->setCellValue('BH'.$numrow, $data->besar_uang_beasiswa);
          $excel->setActiveSheetIndex(0)->setCellValue('BI'.$numrow, $data->kelas);
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AD'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AF'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AH'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AI'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AJ'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AK'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AL'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AM'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AN'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AO'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AP'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AQ'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AR'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AS'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AT'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AU'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AV'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AW'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AX'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AY'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('AZ'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('BA'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('BB'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('BC'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('BD'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('BE'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('BF'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('BG'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('BH'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('BI'.$numrow)->applyFromArray($style_row);
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('R')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('S')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('T')->setWidth(28); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('U')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('V')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('W')->setWidth(18); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('X')->setWidth(35); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AB')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AC')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AD')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AE')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AF')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AG')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AH')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AI')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AK')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AL')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AM')->setWidth(25); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AN')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AO')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AP')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AR')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AS')->setWidth(25); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AT')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AU')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AV')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AW')->setWidth(25); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AX')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AY')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('BA')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('BB')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('BC')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('BD')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('BE')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('BF')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('BG')->setWidth(25); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('BH')->setWidth(25); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('BI')->setWidth(15); // Set width kolom E
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          if ($nis == 'format') {
            helper_log('export','Export format import','Data Siswa');
            header('Content-Disposition: attachment; filename="Format Import Data Siswa.xlsx"'); // Set nama file excel nya  
          }
          elseif ($nis != NULL) {
            helper_log('export','Export 1 data siswa','NIS : ' . $nis);
            header('Content-Disposition: attachment; filename="Siswa NIS '.$nis.' '.date("Y:").$this->bulan.date(':d').'.xlsx"'); // Set nama file excel nya  
          }
          else{
            helper_log('export','Export seluruh data siswa');
            header('Content-Disposition: attachment; filename="Data Lengkap Siswa '.date("Y:").$this->bulan.date(':d').'.xlsx"'); // Set nama file excel nya
          }
          header('');
          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
    }

    public function fullGuru($nip = NULL){
      // Load plugin PHPExcel nya
      include APPPATH.'third_party/PHPExcel/PHPExcel.php';
      
      $showSekolah = $this->DataSekolah_m->getSekolah();

      // Panggil class PHPExcel nya
      $excel = new PHPExcel();
      // Settingan awal fil excel
      $excel->getProperties()->setCreator('My Notes Code')
                   ->setLastModifiedBy('My Notes Code')
                   ->setTitle("Data Guru")
                   ->setSubject("Guru")
                   ->setDescription("Laporan Semua Data Guru")
                   ->setKeywords("Data Guru");
      // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
      $style_col = array(
        'font' => array('bold' => true), // Set font nya jadi bold
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
          'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
          'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
          'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
          'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
        )
      );
      // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
      $style_row = array(
        'alignment' => array(
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
          'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
          'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
          'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
          'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
        )
      );

      //  =================================== SET Style ===============================
      if ($nip == 'format') {
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "Format Import Data Guru ".$showSekolah->nama_sekolah); // Set kolom A1 dengan tulisan "DATA SISWA"
      }
      else{
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Lengkap Guru ".$showSekolah->nama_sekolah); // Set kolom A1 dengan tulisan "DATA SISWA"
      }
      $excel->getActiveSheet()->mergeCells('A1:J2'); // Set Merge Cell pada kolom A1 sampai E1
      $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
      $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
      $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); // Set text center untuk kolom A1
      $excel->getActiveSheet()->mergeCells('A3:F3');
      $excel->getActiveSheet()->mergeCells('G3:V3');
      $excel->getActiveSheet()->mergeCells('W3:AK3');
      $excel->getActiveSheet()->mergeCells('AL3:AQ3');
      $excel->getActiveSheet()->mergeCells('A4:A5');
      $excel->getActiveSheet()->mergeCells('B4:B5');
      $excel->getActiveSheet()->mergeCells('C4:C5');
      $excel->getActiveSheet()->mergeCells('D4:D5');
      $excel->getActiveSheet()->mergeCells('E4:E5');
      $excel->getActiveSheet()->mergeCells('F4:F5');
      $excel->getActiveSheet()->mergeCells('G4:G5');
      $excel->getActiveSheet()->mergeCells('H4:H5');
      $excel->getActiveSheet()->mergeCells('I4:I5');
      $excel->getActiveSheet()->mergeCells('J4:J5');
      $excel->getActiveSheet()->mergeCells('K4:K5');
      $excel->getActiveSheet()->mergeCells('L4:L5');
      $excel->getActiveSheet()->mergeCells('M4:M5');
      $excel->getActiveSheet()->mergeCells('N4:N5');
      $excel->getActiveSheet()->mergeCells('O4:O5');
      $excel->getActiveSheet()->mergeCells('P4:P5');
      $excel->getActiveSheet()->mergeCells('Q4:Q5');
      $excel->getActiveSheet()->mergeCells('R4:R5');
      $excel->getActiveSheet()->mergeCells('S4:S5');
      $excel->getActiveSheet()->mergeCells('T4:T5');
      $excel->getActiveSheet()->mergeCells('U4:U5');
      $excel->getActiveSheet()->mergeCells('V4:V5');
      $excel->getActiveSheet()->mergeCells('W4:W5');
      $excel->getActiveSheet()->mergeCells('X4:X5');
      $excel->getActiveSheet()->mergeCells('Y4:Y5');
      $excel->getActiveSheet()->mergeCells('Z4:Z5');
      $excel->getActiveSheet()->mergeCells('AA4:AA5');
      $excel->getActiveSheet()->mergeCells('AB4:AB5');
      $excel->getActiveSheet()->mergeCells('AC4:AC5');
      $excel->getActiveSheet()->mergeCells('AD4:AD5');
      $excel->getActiveSheet()->mergeCells('AE4:AE5');
      $excel->getActiveSheet()->mergeCells('AF4:AF5');
      $excel->getActiveSheet()->mergeCells('AG4:AG5');
      $excel->getActiveSheet()->mergeCells('AH4:AH5');
      $excel->getActiveSheet()->mergeCells('AI4:AI5');
      $excel->getActiveSheet()->mergeCells('AJ4:AJ5');
      $excel->getActiveSheet()->mergeCells('AK4:AK5');
      $excel->getActiveSheet()->mergeCells('AL4:AL5');
      $excel->getActiveSheet()->mergeCells('AM4:AM5');
      $excel->getActiveSheet()->mergeCells('AN4:AN5');
      $excel->getActiveSheet()->mergeCells('AO4:AO5');
      $excel->getActiveSheet()->mergeCells('AP4:AP5');
      $excel->getActiveSheet()->mergeCells('AQ4:AQ5');
      $excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('N')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('P')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('R')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('U')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('X')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('Y')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('Z')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('AB')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('AE')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('AJ')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('AK')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('AH')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('AL')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('AM')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      $excel->getActiveSheet()->getStyle('AP')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1
      // Buat header tabel nya pada baris ke 3
      $excel->setActiveSheetIndex(0)->setCellValue('A3', "Identitas Pendidik"); // Set kolom A3 dengan tulisan "NO"
      $excel->setActiveSheetIndex(0)->setCellValue('A4', "Nama Lengkap"); // Set kolom A3 dengan tulisan "NO"
      $excel->setActiveSheetIndex(0)->setCellValue('B4', "NIK"); // Set kolom B3 dengan tulisan "NIS"
      $excel->setActiveSheetIndex(0)->setCellValue('C4', "Jenis Kelamin"); // Set kolom C3 dengan tulisan "NAMA"
      $excel->setActiveSheetIndex(0)->setCellValue('D4', "Tempat Lahir"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
      $excel->setActiveSheetIndex(0)->setCellValue('E4', "Tanggal Lahir"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('F4', "Nama Ibu"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('G3', "Data Pribadi"); // Set kolom A3 dengan tulisan "NO"
      $excel->setActiveSheetIndex(0)->setCellValue('G4', "Alamat"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('H4', "RT"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('I4', "RW"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('J4', "Desa"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('K4', "Kecamatan"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('L4', "Kabupaten"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('M4', "Provinsi"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('N4', "Kode Pos"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('O4', "Agama"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('P4', "NPWP"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('Q4', "Nama Wajib Pajak"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('R4', "Kewarganegaraan"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('S4', "Status Pernikahan"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('T4', "Nama Suami / Istri"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('U4', "NIP Suami / Istri"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('V4', "Pekerjaan Suami / Istri"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('W3', "Kepegawaian"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('W4', "Status Kepegawaian"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('X4', "NIP"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('Y4', "NIY / NIGK"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('Z4', "NUPTK"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AA4', "Jenis PTK"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AB4', "SK Pengangkatan"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AC4', "Tanggal Pegangkatan"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AD4', "Lembaga Pengangkat"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AE4', "SK CPNS"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AF4', "Mulai CPNS"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AG4', "Mulai PNS"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AH4', "Golongan"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AI4', "Sumber Gaji"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AJ4', "Kartu Pegawai"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AK4', "Kartu Istri / Suami"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AL3', "Kontak"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AL4', "Telp Rumah"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AM4', "Telp Pribadi"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AN4', "Email"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AO4', "Nama Bank"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AP4', "No Rekening"); // Set kolom E3 dengan tulisan "ALAMAT"
      $excel->setActiveSheetIndex(0)->setCellValue('AQ4', "Atas Nama"); // Set kolom E3 dengan tulisan "ALAMAT"
      // Apply style header yang telah kita buat tadi ke masing-masing kolom header
      $excel->getActiveSheet()->getStyle('A3:F4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');
      $excel->getActiveSheet()->getStyle('G3:V4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('92D050');
      $excel->getActiveSheet()->getStyle('W3:AK5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');
      $excel->getActiveSheet()->getStyle('AL3:AQ5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('92D050');
      $excel->getActiveSheet()->getStyle('A3:F3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('G3:V3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('W3:AK3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AL3:AQ3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A3:M3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('N3:W3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A4:A5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B4:B5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C4:C5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('D4:D5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('E4:E5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('F4:F5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('G4:G5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('H4:H5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('I4:I5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('J4:J5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('K4:K5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('L4:L5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('M4:M5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('N4:N5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('O4:O5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('P4:P5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('Q4:Q5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('R4:R5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('S4:S5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('T4:T5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('U4:U5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('V4:V5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('W4:W5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('X4:X5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('Y4:Y5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('Z4:Z5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AA4:AA5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AB4:AB5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AC4:AC5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AD4:AD5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AE4:AE5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AF4:AF5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AG4:AG5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AH4:AH5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AI4:AI5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AJ4:AJ5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AK4:AK5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AL4:AL5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AM4:AM5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AN4:AN5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AO4:AO5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AP4:AP5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('AQ4:AQ5')->applyFromArray($style_col);
      // ================================== ADD Data ============================
      // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
      if ($nip != NULL) {
          $guru = $this->DataGuru_m->getDataGuru($nip);
      }
      else{
          $guru = $this->DataGuru_m->getAllDataGuru();
      }
      $no = 1; // Untuk penomoran tabel, di awal set dengan 1
      $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
      foreach($guru as $data){ // Lakukan looping pada variabel siswa
        $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->nama_guru);
        $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nik);
        $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->jk);
        $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tempat_lahir);
        $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tgllahir_guru);
        $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->nama_ibu);
        $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->alamat);
        $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->rt);
        $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->rw);
        $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $this->Wilayah_m->getDes($data->desa_guru));
        $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $this->Wilayah_m->getKec($data->kecamatan_guru));
        $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $this->Wilayah_m->getKab($data->kabupaten_guru));
        $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $this->Wilayah_m->getProv($data->provinsi_guru));
        $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->kode_pos);
        $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->agama);
        $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->no_npwp);
        $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->nama_npwp);
        $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->kewarganegaraan);
        $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->pernikahan);
        $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->nama_suamiistri);
        $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->nip_suamiistri);
        $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->pekerjaan_suamiistri);
        $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->status_kepegawaian);
        $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->nip);
        $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->no_niy);
        $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->nuptk);
        $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->jenis_ptk);
        $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->sk_pengangkatan);
        $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->tgl_pengangkatan);
        $excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->lembaga_pengangkat);
        $excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->sk_cpns);
        $excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data->tgl_cpns);
        $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->tgl_pns);
        $excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->golongan);
        $excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->sumber_gaji);
        $excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->no_kartupegawai);
        $excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->kartu_istrisuami);
        $excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->telp_rumah);
        $excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data->no_hp);
        $excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->email);
        $excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->nama_bank);
        $excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->rekening);
        $excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->atas_nama);
        
        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AD'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AF'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AH'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AI'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AJ'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AK'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AL'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AM'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AN'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AO'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AP'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('AQ'.$numrow)->applyFromArray($style_row);
        
        $no++; // Tambah 1 setiap kali looping
        $numrow++; // Tambah 1 setiap kali looping
      }
      // Set width kolom
      $excel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // Set width kolom A
      $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
      $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
      $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
      $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('G')->setWidth(35); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('P')->setWidth(25); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(25); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('R')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('S')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('T')->setWidth(25); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('U')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('V')->setWidth(25); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('W')->setWidth(18); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('X')->setWidth(35); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AB')->setWidth(25); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AC')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AD')->setWidth(25); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AE')->setWidth(25); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AF')->setWidth(15); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AG')->setWidth(15); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AH')->setWidth(15); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AI')->setWidth(25); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AK')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AL')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AM')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AN')->setWidth(35); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AO')->setWidth(15); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AP')->setWidth(20); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(20); // Set width kolom E
      
      // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
      $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
      // Set orientasi kertas jadi LANDSCAPE
      $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
      // Set judul file excel nya
      $excel->getActiveSheet(0)->setTitle("Laporan Data Guru");
      $excel->setActiveSheetIndex(0);
      // Proses file excel
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if ($nip == 'format') {
          helper_log('export','Export format import data Guru');
          header('Content-Disposition: attachment; filename="Format Import Guru.xlsx"'); // Set nama file excel nya
        }
        elseif ($nip != NULL) {
          helper_log('export','Export 1 data guru','NIP : ' . $nip);
          header('Content-Disposition: attachment; filename="Guru NIP '.$nip.' '.date("Y:").$this->bulan.date(':d').'.xlsx"'); // Set nama file excel nya  
        }
        else{
          helper_log('export','Export semua data Guru');
          header('Content-Disposition: attachment; filename="Data Lengkap Guru '.date("Y:").$this->bulan.date(':d').'.xlsx"'); // Set nama file excel nya
        }
        // header('Cache-Control: max-age=0'); Read Only
        header('');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
  }
}
