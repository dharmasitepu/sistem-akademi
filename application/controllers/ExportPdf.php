<?php
class ExportPdf extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->library('Pdf');
    }
 
    public function KwitansiPPDB($id)
    {
        $sekolah = $this->db->get('tbl_profile')->row();
        $show = $this->db->get_where('tbl_statusbayarppdb',['id_status' => $id])->row();
        helper_log('cetak','Cetak bukti pembayaran PPDB','ID PPDB : '. $show->id_ppdb. ', ID pembayaran : ' . $id);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');
 
        $tabel = '
        <table style="width:100%"
         //border="1"
         >
              <tr>
                    <td width="20%"><img style="height: 80px" src="'.base_url('build/images/'.$sekolah->logo).'" ></td>
                    <td colspan="2" style="text-align: left; width: 80%">
                        <b>'.$sekolah->nama_sekolah.'</b>
                        <br> '.$sekolah->alamat.'
                        <br> Telp. '.$sekolah->telp.'
                        <br> Email : '.$sekolah->email.'
                        <br><hr>
                    </td>
              </tr>
              <br>
              <tr>
                  <td colspan="3" style="text-align: left;">Bukti pembayaran yang sah untuk tagihan berikut :</td><br>
              </tr>
              <br>
              <tr>
                  <td colspan="2">Keterangan</td>
                  <td>: &nbsp;Pembayaran PPDB '.date('Y').'</td>
              </tr>
              <tr>
                  <td colspan="2">Sejumlah</td>
                  <td>: &nbsp;Rp. '. number_format($show->jml_pembayaran,0,'','.') .',00</td>
              </tr>
              <tr>
                  <td colspan="2">Tanggal Pembayaran</td>
                  <td>: &nbsp;'. date("d F Y",strtotime($show->tgl_pembayaran)) .'</td>
              </tr>
              <tr>
                  <td colspan="2">ID Pendaftaran</td>
                  <td>: &nbsp;'. $show->id_ppdb .'</td>
              </tr>
              <br><br>
              <tr>
                  <td colspan="2"></td>
                  <td style="text-align: center;">'.date('d F Y').'<br>
                    Petugas, <br><br><br><br> Panitia
                  </td>
              </tr>
        </table>
        ';
        $pdf->writeHTML($tabel);
        $pdf->Output('kwitansiPPDB.pdf', 'I');
    }
}