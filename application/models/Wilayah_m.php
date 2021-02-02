<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Wilayah_m extends CI_Model
{
	public function showProvinsi($idProvinsi = NULL)
	{
		if ($idProvinsi != NULL) {
			$isi = $this->db->where("id = '$idProvinsi'")->get('wilayah_provinsi')->result();
			if ($isi) {
				foreach ($isi as $key) {
					$nas = $key->nama;
				}
			}
			else {
				$nas = '(Kosong)';
			}
		}
		else{
			$nas = '(Kosong)';
		}
		return $nas;
	}
	public function showKabupaten($idKabupaten = NULL)
	{
		if ($idKabupaten != NULL) {
			$isi = $this->db->where("id = '$idKabupaten'")->get('wilayah_kabupaten')->result();
			if ($isi) {
				foreach ($isi as $key) {
					$nas = $key->nama;
				}
			}
			else {
				$nas = '(Kosong)';
			}
		}
		else{
			$nas = '(Kosong)';
		}
		return $nas;
	}
	public function showKecamatan($idKecamatan = NULL)
	{
		if ($idKecamatan != NULL) {
			$isi = $this->db->where("id = '$idKecamatan'")->get('wilayah_kecamatan')->result();
			if ($isi) {
				foreach ($isi as $key) {
					$nas = $key->nama;
				}
			}
			else {
				$nas = '(Kosong)';
			}
		}
		else{
			$nas = '(Kosong)';
		}
		return $nas;
	}
	public function showDesa($idDesa = NULL)
	{
		if ($idDesa != NULL) {
			$isi = $this->db->where("id = '$idDesa'")->get('wilayah_desa')->result();
			if ($isi) {
				foreach ($isi as $key) {
					$nas = $key->nama;
				}
			}
			else {
				$nas = '(Kosong)';
			}
		}
		else{
			$nas = '(Kosong)';
		}
		return $nas;
	}
	public function getProv($id = NULL)
	{
		$query = $this->db->where('id',$id)->get('wilayah_provinsi')->row();
		return ($query) ? $query->nama : '';
	}
	public function getKab($id = NULL)
	{
		$query = $this->db->where('id',$id)->get('wilayah_kabupaten')->row();
		return ($query) ? $query->nama : '';
	}
	public function getKec($id = NULL)
	{
		$query = $this->db->where('id',$id)->get('wilayah_kecamatan')->row();
		return ($query) ? $query->nama : '';
	}
	public function getDes($id = NULL)
	{
		$query = $this->db->where('id',$id)->get('wilayah_desa')->row();
		return ($query) ? $query->nama : '';
	}
}