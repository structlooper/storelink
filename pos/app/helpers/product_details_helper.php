<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_product_details')) {
    function get_product_details($product_id)
    {
        $CI = get_instance();
        $CI->load->api_model('Product_model');
        $result = $CI->Product_model->get_product_details_by_id($product_id);
        return $result['data'];
    }
}
