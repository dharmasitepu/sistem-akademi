<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller
{
	public function addAjaxKabupaten($idProvinsi)
	{
		$query = $this->db->order_by('nama','asc')
						  ->where("provinsi_id = '$idProvinsi'")
						  ->get('wilayah_kabupaten')
						  ->result();
 		$data  = '<option value="">- Silahkan Pilih Kabupaten -</option>';
 		foreach ($query as $key) {
 			$data .= '<option value="'.$key->id.'">'.$key->nama.'</option>';
 		}
 		echo $data;
	}
	public function addAjaxKecamatan($idKabupaten)
	{
		$query = $this->db->order_by('nama','asc')
						  ->where("kabupaten_id = '$idKabupaten'")
						  ->get('wilayah_kecamatan')
						  ->result();
 		$data  = '<option value="">- Silahkan Pilih Kecamatan -</option>';
 		foreach ($query as $key) {
 			$data .= '<option value="'.$key->id.'">'.$key->nama.'</option>';
 		}
 		echo $data;
	}
	public function addAjaxDesa($idKecamatan)
	{
		$query = $this->db->order_by('nama','asc')
						  ->where("kecamatan_id = '$idKecamatan'")
						  ->get('wilayah_desa')
						  ->result();
 		$data  = '<option value="">- Silahkan Pilih Desa -</option>';
 		foreach ($query as $key) {
 			$data .= '<option value="'.$key->id.'">'.$key->nama.'</option>';
 		}
 		echo $data;
	}
	public function hapusAjaxKecamatan()
	{
		echo '<option value="">- Pilih Kabupaten Terlebih Dulu -</option>';
	}
	public function hapusAjaxDesa()
	{
		echo '<option value="">- Pilih Kecamatan Terlebih Dulu -</option>';
	}
}