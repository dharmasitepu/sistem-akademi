<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_adminOprator();
		$this->load->model('DataSekolah_m');
		$this->load->model('DataChat_m');
	}
	public function index()
	{
		$data = array(
			'title' 		=> 'Settings', 
			'dataSekolah' 	=> $this->DataSekolah_m->getSekolah()
		);
		$this->load->view('templates/header', $data);
		$this->load->view('settings/index');
		$this->load->view('templates/footer-full');
	}
	public function chat()
	{
		$data = array(
			'title' 		=> 'Chat Settings', 
			'dataSekolah' 	=> $this->DataSekolah_m->getSekolah()
		);
		$dataChat = array(
			'isiChat' 		=> $this->DataSekolah_m->getIsiChat()
		);
		$this->load->view('templates/header', $data);
		$this->load->view('settings/settings-chat', $dataChat);
		$this->load->view('templates/footer-full');
	}
	public function saveChat()
	{
		$id = $this->input->post('id');
		$data = array(
			'isi' => $this->input->post('textDefault')
		);
		if ($this->DataChat_m->saveChat($id,$data)) {
			$this->session->set_flashdata('berhasil', 'Disave');
			helper_log('edit','Mengganti format chat Whatsapp');
		}
		redirect('settings/chat');
	}
}

