<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banners_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
       
    }
    public function get_all_primary_banners(){
        $this->db->select('*');
        $this->db->from('sma_primary_banner');
        $result = $this->db->get()->result_array();
        return ['status' => true, 'msg' => 'Primary Banners' , 'data' => $result];
    }
    public function get_all_secondary_banners(){
        $this->db->select('*');
        $this->db->from('sma_secondary_banner');
        $result = $this->db->get()->result_array();
        return ['status' => true, 'msg' => 'Secondary Banners' , 'data' => $result];
    }
    
}