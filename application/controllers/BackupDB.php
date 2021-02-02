<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackupDB extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_adminOprator();
  }
  // backup database.sql
  public function db()
  {
    $this->load->dbutil();

    $prefs = array('format' => 'zip', 'filename' => 'Database-backup_' . date('Y-m-d_H-i'));
    $backup = $this->dbutil->backup($prefs);
    if(!write_file('./backup/db/BD-backup_' . date('Y-m-d_H-i-s') . '.zip', $backup)){
      $this->session->set_flashdata('gagal','Database Gagal di BACKUP');
    }
    else{
      $this->session->set_flashdata('berhasil','Database Berhasil di BACKUP');
      helper_log('backup','Backup Database','');
    }
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
    $prefs = array(
      'format' => 'zip',
      'filename' => 'backup-db.sql'
    );
    $this->_base_classes =& is_loaded();
    $backup = $this->dbutil->backup($prefs);
  
    $db_name = 'backup-db-' . date("Y-m-d:H-i-s").'.zip'; // file name
      
    $this->load->helper('download');
    force_download($db_name, $backup);
    redirect($uri);
  }
}