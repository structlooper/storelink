<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banners_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_primary_banners(){
        $this->db->select('sma_primary_banner.primary_banner_id,sma_primary_banner.image,sma_primary_banner.title,sma_primary_banner.created_at,sma_primary_banner.descri,sma_categories.name');
        $this->db->from('sma_primary_banner');
        $this->db->join('sma_categories','sma_categories.id = sma_primary_banner.category_id');
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_primary_banners_by_id($primary_banner_id){
        $this->db->select('*');
        $this->db->from('sma_primary_banner');
        $this->db->where('primary_banner_id',$primary_banner_id);
        $data = $this->db->get()->result_array()[0];
        return $data;
    }
    public function get_all_categories(){
        $this->db->select('*');
        $this->db->from('sma_categories');
        return $this->db->get()->result_array();
    }
    public function save_banner_new_banners(){
        $title = $_POST['title'];
        $category_id = $_POST['category_id'];
        $file = $_FILES["image"];
        if(gettype($file) == NULL or sizeof($file) == 0 ){
            return ['status' => 0, 'msg' => 'image is not valid'];
        }elseif($category_id == '' or is_null($category_id) or !is_numeric($category_id)){
            return ['status' => 0, 'msg' => 'Category is invalid'];
        }else{
            $tempname = $_FILES["image"]["tmp_name"];
            $filename = rand(10,10000).$_FILES['image']['name'];
            $folder = "banners/".$filename;
            if (move_uploaded_file($tempname, $folder))  {
                $data['title'] = $title;
                $data['descri'] = $_POST['descri'];
                $data['image'] = base_url($folder);
                $data['category_id'] = $category_id;
                $data['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('sma_primary_banner',$data);
                $banner_id = $this->db->insert_id();
                if(!is_null($banner_id)){
                    return ['status' => 1 , 'msg' => 'banner saved successfully'];
                }else{
                    return ['status' => 0, 'msg' => 'internal issue banner not saved'];
                }
            }else{
                return ['status' => 0, 'msg' => 'Failed to upload image'];
          } 
        }
    }
    public function update_banner_details($id){
        $title = $_POST['title'];
        $file = $_FILES["image"];
        // print_r(($file['name']));exit;
        if(gettype($file['name']) == NULL or $file['name'] == "" or sizeof($file) == 0 ){
            $image = $_POST['current_image'];
        }else{
            $tempname = $_FILES["image"]["tmp_name"];
            $filename = rand(10,10000).$_FILES['image']['name'];
            $folder = "banners/".$filename;
            if (move_uploaded_file($tempname, $folder))  {
                $image= base_url($folder);
            }else{
                return ['status' => 0, 'msg' => 'Failed to upload image'];
            } 
        }
        
                $data['title'] = $title;
                $data['descri'] = $_POST['descri'];
                $data['image'] = $image;
                $data['updated_at'] = date('Y-m-d H:i:s');
                $this->db->where('primary_banner_id',$id);
                $this->db->update('sma_primary_banner',$data);
                if($this->db->affected_rows() == 1){
                    return ['status' => 1 , 'msg' => 'banner updated successfully'];
                }else{
                    return ['status' => 0, 'msg' => 'internal issue banner not updated'];
                }
    }
    public function delete_banner_details($id){
                $this->db->where('primary_banner_id',$id);
                $this->db->delete('sma_primary_banner');
                if($this->db->affected_rows() == 1){
                    return ['status' => 1 , 'msg' => 'banner deleted successfully'];
                }else{
                    return ['status' => 0, 'msg' => 'internal issue banner not updated'];
                }
    }
    public function get_all_brands(){
        $this->db->select('*');
        $this->db->from('sma_brands');
        return $this->db->get()->result_array();
    }
    public function save_secondary_banner(){
        $title = $_POST['title'];
        $category_id = $_POST['brand_id'];
        $file = $_FILES["image"];
        if(gettype($file) == NULL or sizeof($file) == 0 ){
            return ['status' => 0, 'msg' => 'image is not valid'];
        }elseif($category_id == '' or is_null($category_id) or !is_numeric($category_id)){
            return ['status' => 0, 'msg' => 'Brand is invalid'];
        }else{
            $tempname = $_FILES["image"]["tmp_name"];
            $filename = rand(10,10000).$_FILES['image']['name'];
            $folder = "banners/".$filename;
            if (move_uploaded_file($tempname, $folder))  {
                $data['title'] = $title;
                $data['descri'] = $_POST['descri'];
                $data['image'] = base_url($folder);
                $data['brand_id'] = $category_id;
                $data['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('sma_secondary_banner',$data);
                $banner_id = $this->db->insert_id();
                if(!is_null($banner_id)){
                    return ['status' => 1 , 'msg' => 'banner saved successfully'];
                }else{
                    return ['status' => 0, 'msg' => 'internal issue banner not saved'];
                }
            }else{
                return ['status' => 0, 'msg' => 'Failed to upload image'];
          } 
        } 
    }
    public function get_secondary_banners(){
        $this->db->select('sma_secondary_banner.secondary_banner_id,sma_secondary_banner.image,sma_secondary_banner.title,sma_secondary_banner.created_at,sma_secondary_banner.descri,sma_brands.name');
        $this->db->from('sma_secondary_banner');
        $this->db->join('sma_brands','sma_brands.id = sma_secondary_banner.brand_id');
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_secondary_banners_by_id($secondary_banner_id){
        $this->db->select('*');
        $this->db->from('sma_secondary_banner');
        $this->db->where('secondary_banner_id',$secondary_banner_id);
        $data = $this->db->get()->result_array()[0];
        return $data; 
    }
    public function update_secondary_banner_details($id){
         $title = $_POST['title'];
        $file = $_FILES["image"];
        // print_r(($file['name']));exit;
        if(gettype($file['name']) == NULL or $file['name'] == "" or sizeof($file) == 0 ){
            $image = $_POST['current_image'];
        }else{
            $tempname = $_FILES["image"]["tmp_name"];
            $filename = rand(10,10000).$_FILES['image']['name'];
            $folder = "banners/".$filename;
            if (move_uploaded_file($tempname, $folder))  {
                $image= base_url($folder);
            }else{
                return ['status' => 0, 'msg' => 'Failed to upload image'];
            } 
        }
        
                $data['title'] = $title;
                $data['descri'] = $_POST['descri'];
                $data['image'] = $image;
                $data['updated_at'] = date('Y-m-d H:i:s');
                $this->db->where('secondary_banner_id',$id);
                $this->db->update('sma_secondary_banner',$data);
                if($this->db->affected_rows() == 1){
                    return ['status' => 1 , 'msg' => 'banner updated successfully'];
                }else{
                    return ['status' => 0, 'msg' => 'internal issue banner not updated'];
                }
    }
    public function delete_secondary_banner_details($id){
         $this->db->where('secondary_banner_id',$id);
                $this->db->delete('sma_secondary_banner');
                if($this->db->affected_rows() == 1){
                    return ['status' => 1 , 'msg' => 'banner deleted successfully'];
                }else{
                    return ['status' => 0, 'msg' => 'internal issue banner not updated'];
                }
    }
}