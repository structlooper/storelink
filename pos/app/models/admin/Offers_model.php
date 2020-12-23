<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Offers_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_offers(){
        $this->db->select('*');
        $this->db->from('sma_offers');
        return $this->db->get()->result_array();
    }
    public function get_all_static_offers(){
        $this->db->select('*');
        $this->db->from('sma_static_offers');
        return $this->db->get()->result_array();
    }
    public function save_new_offer(){
        $title = $_POST['offer_title'];
        $desc = $_POST['offer_desc'];
        $offer_products = $_POST['offer_products'];
        $offer_products = explode('_',$offer_products);

        $file = $_FILES['offer_image'];
        if(gettype($file) == NULL or sizeof($file) == 0 ){
            return ['status' => 0, 'msg' => 'image is not valid'];
        }else{
            $tempname = $_FILES["offer_image"]["tmp_name"];
            $filename = rand(10,10000).$_FILES['offer_image']['name'];
            $folder = "banners/offers/".$filename;
            if (move_uploaded_file($tempname, $folder))  {
                $data['offer_title'] = $title;
                $data['offer_desc'] = $desc;
                $data['offer_amount'] = $_POST['offer_amount'];
                $data['offer_type'] = $_POST['offer_type'];
                $data['offer_desc'] = $desc;
                $data['offer_image'] = base_url($folder);
                $data['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('sma_offers',$data);
                $banner_id = $this->db->insert_id();
                if(!is_null($banner_id)){
                    if (sizeof($offer_products) > 1){
                        foreach ($offer_products as $key => $prod_1){
                            if($key == 0){
                                continue;
                            }else{
                                $this->db->insert('sma_offer_products',['offer_id'=>$banner_id,'product_id'=>$prod_1]);
                            }
                        }
                    }
                    return ['status' => 1 , 'msg' => 'offer saved successfully'];
                }else{
                    return ['status' => 0, 'msg' => 'internal issue offer not saved'];
                }
            }else{
                return ['status' => 0, 'msg' => 'Failed to upload image'];
            }
        }
    }
    public function save_new_static_offer(){
        $title = $_POST['offer_title'];
        $desc = $_POST['offer_desc'];
        $offer_products = $_POST['offer_products'];
        $offer_products = explode('_',$offer_products);

        $file = $_FILES['offer_image'];
        if(gettype($file) == NULL or sizeof($file) == 0 ){
            return ['status' => 0, 'msg' => 'image is not valid'];
        }else{
            $tempname = $_FILES["offer_image"]["tmp_name"];
            $filename = rand(10,10000).$_FILES['offer_image']['name'];
            $folder = "banners/offers/".$filename;
            if (move_uploaded_file($tempname, $folder))  {
                $data['offer_title'] = $title;
                $data['offer_desc'] = $desc;
                $data['offer_amount'] = $_POST['offer_amount'];
                $data['offer_type'] = $_POST['offer_type'];
                $data['offer_desc'] = $desc;
                $data['offer_image'] = base_url($folder);
                $data['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('sma_static_offers',$data);
                $banner_id = $this->db->insert_id();
                if(!is_null($banner_id)){
                    if (sizeof($offer_products) > 1){
                        foreach ($offer_products as $key => $prod_1){
                            if($key == 0){
                                continue;
                            }else{
                                $this->db->insert('sma_static_offers_products',['offer_id'=>$banner_id,'product_id'=>$prod_1]);
                            }
                        }
                    }
                    return ['status' => 1 , 'msg' => 'offer saved successfully'];
                }else{
                    return ['status' => 0, 'msg' => 'internal issue offer not saved'];
                }
            }else{
                return ['status' => 0, 'msg' => 'Failed to upload image'];
            }
        }
    }
    public function get_offer_by_id($id){
        $this->db->select('*');
        $this->db->from('sma_offers');
        $this->db->where('offer_id',$id);
        $offer_details = $this->db->get()->result_array()[0];
        return $offer_details;
    }
    public function get_static_offer_by_id($id){
        $this->db->select('*');
        $this->db->from('sma_static_offers');
        $this->db->where('offer_id',$id);
        $offer_details = $this->db->get()->result_array()[0];
        return $offer_details;
    }
    public function update_offer($id){
        $title = $_POST['offer_title'];
        $offer_products = $_POST['offer_products'];
        $offer_products = explode('_',$offer_products);
        if (sizeof($offer_products) > 1){
            $this->db->where('offer_id',$id);
            $this->db->delete('sma_offer_products');
            foreach ($offer_products as $key => $prod_1){
                if($key == 0){
                    continue;
                }else{
                    $this->db->insert('sma_offer_products',['offer_id'=>$id,'product_id'=>$prod_1]);

                }
            }
//            return ['status' => 1, 'msg' => 'Offer Product changed successfully'];
        }

        $file = $_FILES["offer_image"];
        // print_r(($file['name']));exit;
        if(gettype($file['name']) == NULL or $file['name'] == "" or sizeof($file) == 0 ){
            $image = $_POST['current_image'];
        }else{
            $tempname = $_FILES["offer_image"]["tmp_name"];
            $filename = rand(10,10000).$_FILES['offer_image']['name'];
            $folder = "banners/offers/".$filename;
            if (move_uploaded_file($tempname, $folder))  {
                $image= base_url($folder);
            }else{
                return ['status' => 0, 'msg' => 'Failed to upload image'];
            }
        }

        $data['offer_title'] = $title;
        $data['offer_amount'] = $_POST['offer_amount'];
        $data['offer_type'] = $_POST['offer_type'];
        $data['offer_desc'] = $_POST['offer_desc'];
        $data['offer_image'] = $image;
        $this->db->where('offer_id',$id);
        $this->db->update('sma_offers',$data);
        return ['status' => 1 , 'msg' => 'offer updated successfully'];

    }
    public function update_static_offer($id){
        $title = $_POST['offer_title'];
        $offer_products = $_POST['offer_products'];
        $offer_products = explode('_',$offer_products);
        if (sizeof($offer_products) > 1){
            $this->db->where('offer_id',$id);
            $this->db->delete('sma_static_offers_products');
            foreach ($offer_products as $key => $prod_1){
                if($key == 0){
                    continue;
                }else{
                    $this->db->insert('sma_static_offers_products',['offer_id'=>$id,'product_id'=>$prod_1]);

                }
            }
//            return ['status' => 1, 'msg' => 'Offer Product changed successfully'];
        }

        $file = $_FILES["offer_image"];
        // print_r(($file['name']));exit;
        if(gettype($file['name']) == NULL or $file['name'] == "" or sizeof($file) == 0 ){
            $image = $_POST['current_image'];
        }else{
            $tempname = $_FILES["offer_image"]["tmp_name"];
            $filename = rand(10,10000).$_FILES['offer_image']['name'];
            $folder = "banners/offers/".$filename;
            if (move_uploaded_file($tempname, $folder))  {
                $image= base_url($folder);
            }else{
                return ['status' => 0, 'msg' => 'Failed to upload image'];
            }
        }

        $data['offer_title'] = $title;
        $data['offer_amount'] = $_POST['offer_amount'];
        $data['offer_type'] = $_POST['offer_type'];
        $data['offer_desc'] = $_POST['offer_desc'];
        $data['offer_image'] = $image;
        $this->db->where('offer_id',$id);
        $this->db->update('sma_static_offers',$data);

        return ['status' => 1 , 'msg' => 'offer updated successfully'];

    }

    public function remove_offer_on_products($offer_id){
        $this->db->where('offer_id',$offer_id);
        $this->db->delete('sma_offer_products');
        if($this->db->affected_rows() == 1){
            return ['status' => 1 ];
        }else{
            return ['status' => 0, ];
        }
    }
    public function remove_static_offer_on_products($offer_id){
        $this->db->where('offer_id',$offer_id);
        $this->db->delete('sma_static_offers_products');
        if($this->db->affected_rows() == 1){
            return ['status' => 1 ];
        }else{
            return ['status' => 0, ];
        }
    }
    public function delete_offer($id){
        $result = $this->remove_offer_on_products($id);
        $this->db->where('offer_id',$id);
        $this->db->delete('sma_offers');
        if($this->db->affected_rows() == 1){
            return ['status' => 1,'msg' => 'Offer deleted successfully' ];
        }else{
            return ['status' => 0, 'msg' => 'internal error offer not deleted'];
        }
    }
    public function delete_static_offer($id){
        $result = $this->remove_static_offer_on_products($id);
        $this->db->where('offer_id',$id);
        $this->db->delete('sma_static_offers');
        if($this->db->affected_rows() == 1){
            return ['status' => 1,'msg' => 'Offer deleted successfully' ];
        }else{
            return ['status' => 0, 'msg' => 'internal error offer not deleted'];
        }
    }

    public function get_offer_products($id){
        $this->db->select('*');
        $this->db->from('sma_offer_products');
        $this->db->join('sma_products','sma_products.id = sma_offer_products.product_id');
        $this->db->where('sma_offer_products.offer_id',$id);
        $offer_products = $this->db->get()->result_array();
        return $offer_products;
    }
    public function get_static_offer_products($id){
        $this->db->select('*');
        $this->db->from('sma_static_offers_products');
        $this->db->join('sma_products','sma_products.id = sma_static_offers_products.product_id');
        $this->db->where('sma_static_offers_products.offer_id',$id);
        $offer_products = $this->db->get()->result_array();
        return $offer_products;
    }

}