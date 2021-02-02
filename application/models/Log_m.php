<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_m extends CI_Model
{
    public function saveLog($params)
    {
        $query = $this->db->insert('tbl_log',$params);
        return $this->db->affected_rows($query);
    }
    public function saveHistoryUser($params)
    {
        $query = $this->db->insert('tbl_historyuser',$params);
        return $this->db->affected_rows($query);
    }
}
