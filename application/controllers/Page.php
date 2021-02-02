<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function req_login()
    {
        $this->load->view('please_login');
    }
    public function access_denied()
    {
        $this->load->view('access_denied');
    }
}
