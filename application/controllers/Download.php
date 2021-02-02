<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function file($path,$nama_file)
    {
        if($this->uri->segment(3)){
            $uri = '/'.$this->uri->segment(3);
            if($this->uri->segment(4)){
                $uri .= '/'.$this->uri->segment(4);
                if($this->uri->segment(5)){
                    $uri .= '/'.$this->uri->segment(5);
                    if($this->uri->segment(6)){
                        $uri .= '/'.$this->uri->segment(6);
                    }
                }
            }
        }
        $this->load->helper('download');
        force_download('build/files/'.$path.'/'.$nama_file,NULL);
        // redirect($uri);
    }
}
