<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_adminOprator();
        $this->load->model('DataSekolah_m');
        $this->load->model('Home_m');
    }
    public function index()
    {
        $data = array(
            'title'         => 'Dashboard', 
            'dataSekolah'   => $this->DataSekolah_m->getSekolah()
        );
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $this->Home_m->getNum());
        $this->load->view('templates/footer-full');
        
    }
    public function chartAdministrasi($tahun, $params = 'Default')
    {
        $out = "<script>
            var ctx = document.getElementById('administrasiChart');";
            if ($params == 'Default') {
                $out .="ctx.height = 85;";
            }
            else{
                $out .="ctx.height = 331;";
            }
        $out .="var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [{
                        label: 'Pembayaran SPP ',
                        backgroundColor: 'rgba(38, 185, 154, 0.31)',
                        borderColor: 'rgba(38, 185, 154, 0.7)',
                        pointBorderColor: 'rgba(38, 185, 154, 0.7)',
                        pointBackgroundColor: 'rgba(38, 185, 154, 0.7)',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(220,220,220,1)',
                        pointBorderWidth: 1,
                        data: [";
                        for ($bulan = 1; $bulan <= 12 ; $bulan++) { 
                            $month = str_pad($bulan, 2,'0', STR_PAD_LEFT);
                            $out .= "'".$this->Home_m->getNumSPP($tahun, $month)."',";
                        }
                $out .="]
                    }, {
                        label: 'Pembayaran PPDB ',
                        backgroundColor: 'rgba(3, 88, 106, 0.3)',
                        borderColor: 'rgba(3, 88, 106, 0.70)',
                        pointBorderColor: 'rgba(3, 88, 106, 0.70)',
                        pointBackgroundColor: 'rgba(3, 88, 106, 0.70)',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(151,187,205,1)',
                        pointBorderWidth: 1,
                        data: [";
                        for ($bulan = 1; $bulan <= 12 ; $bulan++) { 
                            $month = str_pad($bulan, 2,'0', STR_PAD_LEFT);
                            $out .= "'".$this->Home_m->getNumPPDB($tahun, $month)."',";
                        }
                $out .="]
                    }]
                },
            });
    
        </script>";
        echo $out;
    }
}
