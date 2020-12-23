<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Deliveryboy_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    public function get_all_deliveryboy(){
        $this->db->select('*');
        $this->db->from('sma_drivers');
        $this->db->where('approval',"1");
        $this->db->where('status',"1");
        $drivers = $this->db->get()->result_array();
        return ['status' => true,'msg' => 'delivery boys' , 'data' => $drivers];
    }
    public function order_already_asgn($order_id){
        $this->db->select('*');
        $this->db->from('sma_deliveries');
        $this->db->where('sale_id',$order_id);
        $order_details = $this->db->get()->result_array();
        return ['status' => true , 'msg' => 'order' , 'data' => $order_details];
    }
    public function assign_delivery_boy(){
        $order_id = $_GET['order_id'];
        $driver_id = $_GET['driver_id'];
        $result = $this->order_already_asgn($order_id);
        if (sizeof($result['data']) > 0){
            return ['status' => false,'msg' => 'Order already assigned!','data' => []];
        }
        if (is_null($order_id) or $order_id == '' or $order_id == 'undefined' or is_null($driver_id) or $driver_id == '' or $driver_id == 'undefined'){
            return ['status' => false,'msg' => 'not a valid request','data' => []];
        }
        $this->db->select('*');
        $this->db->from('sma_sales');
        $this->db->where('id',$order_id);
        $this->db->where('pos',0);
        $this->db->where('api',1);
        $order_details = $this->db->get()->result_array()[0];
//        print_r($order_details);exit;


        $this->db->select('*');
        $this->db->from('sma_drivers');
        $this->db->where('id',$driver_id);
        $this->db->where('approval',"1");
        $this->db->where('status',"1");
        $driver_details = $this->db->get()->result_array()[0];
        if (sizeof($order_details) == 0 or sizeof($driver_details)  == 0) {
            return ['status' => false, 'msg' => 'not a valid request', 'data' => []];
        }
//        print_r($driver_details);exit;
        $data['date'] = date('Y-m-d H:i:s');
        $data['sale_id'] = $order_id;
        $data['do_reference_no'] = "ASSIGN/ORDER".date('Y/m/d');
        $data['sale_reference_no'] = $order_details['reference_no'];
        $data['customer'] = $order_details['customer'];
        $data['address'] = $order_details['address_id'];
        $data['note'] = $order_details['note'];
        $data['status'] = "ASSIGNED";
        $data['delivered_by'] = $driver_id;
        $data['created_by'] = "ADMIN";

        $this->db->insert('sma_deliveries',$data);
        $this_id = $this->db->insert_id();
        if($this_id == 0){
            return ['status'=> false,'msg'=>'order not assigned','data' => []];
        }

        $this->db->where('id',$order_id);
        $this->db->update('sma_sales',['sale_status' => 'ASSIGNED']);


        return ['status' => true,'msg'=> 'order assigned successfully','data' =>[]];

    }


}