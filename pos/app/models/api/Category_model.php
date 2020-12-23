<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_all_categories(){
        $this->db->select('*');
        $this->db->from('sma_categories');
        $this->db->where('parent_id',NULL);
        $this->db->or_where('parent_id',0);
        $catgories = $this->db->get()->result_array();
//        $catgories = $this->db->query("SELECT * FROM sma_categories WHERE parent_id IS NULL AND WHERE parent_id  0")->result();
//        print_r($catgories);exit;
        if (sizeof($catgories) > 0) {
            foreach($catgories as $cat){
                $sub_cat = $this->get_all_sub_categories($cat['id']);
                if(sizeof($sub_cat['Categories']) > 0){
                    $name_1 = [];
                    foreach($sub_cat['Categories'] as $sub){
                        $name_1[] = $sub->name;
                    }
                    $name = $name_1;
                }else{
                    $name = [];
                }
                $new['id']=$cat['id'];
                $new['code']=$cat['code'];
                $new['name']=$cat['name'];
                $new['image']=$cat['image'];
                $new['parent_id']=$cat['arent_id'];
                $new['slug']=$cat['slug'];
                $new['description']=$cat['description'];
                $new['image_2']=$cat['image_2'];
                $new['title']=$cat['title'];
                $new['subcategory_name']=$name;
                $final_result[] = $new;
            }
            return [ 'status' => true,'msg' => 'category found','data'=>$final_result];
        } else {
            return [ 'status' => false,'msg' => 'no category found','data'=>[]];
        }
    }
    
    public function get_all_sub_categories($category_id){
        // print_r($category_id);exit;
        $zero = 0;
        $catgories = $this->db->query("SELECT * FROM sma_categories WHERE `parent_id` = '$category_id';");
        if (!is_null($catgories)) {
            return ['Categories' => $catgories->result()];
        } else {
            return array(
                'Categories' => []
            );
        }
    }
    public function check_category_by_id($category_id)
    {
        
         $catgories = $this->db->query("SELECT * FROM sma_categories WHERE `id` = '$category_id';");
        if (!is_null($catgories)) {
            return ['Categories' => $catgories->result()];
        } else {
            return array(
                'Categories' => []
            );
        }
    }
    
    public function get_razorpay_details(){
        $this->db->select('razorpay_key_id,razorpay_key_secrate');
        $this->db->from('sma_settings');
        $settings = $this->db->get()->result_array()[0];
        return ['status' => true,'msg' => 'razorpay data', 'data' => $settings];
    }
    public function get_category_details_by_id(){
        $this->db->select('*');
        $this->db->from('sma_categories');
        $this->db->where('id',$_POST['category_id']);
        $category_details = $this->db->get()->result_array()[0];
        return ['status' => true,'msg' => 'category details' , 'data' => $category_details];
    }
}