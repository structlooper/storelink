<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    private $Settings;

    public function __construct()
    {
        parent::__construct();
        $this->Settings = $this->getSettings();
        $this->load->config('rest');
    }

    protected function getSettings()
    {
        $q = $this->db->get('settings');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

    public function addApiKey($data)
    {
        return $this->db->insert('api_keys', $data);
    }

    public function deleteApiKey($id)
    {
        return $this->db->delete('api_keys', ['id' => $id]);
    }

    public function generateKey()
    {
        return $this->_generate_key();
    }

    public function getApiKey($value, $field = 'key')
    {
        return  $this->db->get_where('api_keys', [$field => $value])->row();
    }

    public function getApiKeys()
    {
        return $this->db->get('api_keys')->result();
    }

    public function getUser($value, $field = 'id')
    {
        $q = $this->db->get_where('users', [$field => $value]);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

    public function updateUserApiKey($user_id, $data)
    {
        return $this->db->update('api_keys', $data, ['user_id' => $user_id]);
    }

    private function _delete_key($key)
    {
        return $this->db
            ->where($this->config->item('rest_key_column'), $key)
            ->delete($this->config->item('rest_keys_table'));
    }

    private function _generate_key()
    {
        do {
            $salt = base_convert(bin2hex($this->security->get_random_bytes(64)), 16, 36);

            if ($salt === false) {
                $salt = hash('sha256', time() . mt_rand());
            }

            $new_key = substr($salt, 0, $this->config->item('rest_key_length'));
        } while ($this->_key_exists($new_key));

        return $new_key;
    }

    private function _get_key($key)
    {
        return $this->db
            ->where($this->config->item('rest_key_column'), $key)
            ->get($this->config->item('rest_keys_table'))
            ->row();
    }

    private function _insert_key($key, $data)
    {
        $data[$this->config->item('rest_key_column')] = $key;
        $data['date_created']                         = function_exists('now') ? now() : time();

        return $this->db
            ->set($data)
            ->insert($this->config->item('rest_keys_table'));
    }

    private function _key_exists($key)
    {
        return $this->db
            ->where($this->config->item('rest_key_column'), $key)
            ->count_all_results($this->config->item('rest_keys_table')) > 0;
    }

    private function _update_key($key, $data)
    {
        return $this->db
            ->where($this->config->item('rest_key_column'), $key)
            ->update($this->config->item('rest_keys_table'), $data);
    }
    public function get_app_about_settings(){
        $this->db->select('*');
        $this->db->from('sma_app_settings');
        $app_settings = $this->db->get()->result_array();
        return ['status' => true,'msg' => 'app about','data' => $app_settings];
    }
    public function update_app_settings(){
        $data['about_us'] = $_POST['about_us'];
        $data['terms_condition'] = $_POST['terms_condition'];
        $data['privacy_policy'] = $_POST['privacy_policy'];
        if($data['about_us'] == '' or $data['terms_condition'] == '' or $data['privacy_policy'] == ''){
            return['status'=> 0,'msg' => 'all fields are required','data' => [] ];
        }
        $this->db->where('key_name','about_us');
        $this->db->update('sma_app_settings',['value' => $data['about_us'],'updated_at' => date('Y-m-d')]);
        $this->db->where('key_name','terms_condition');
        $this->db->update('sma_app_settings',['value' => $data['terms_condition'],'updated_at' => date('Y-m-d')]);
        $this->db->where('key_name','privacy_policy');
        $this->db->update('sma_app_settings',['value' => $data['privacy_policy'],'updated_at' => date('Y-m-d')]);
        return [ 'status' => 1,'msg' => 'app settings updated successfully','data' => []];
    }
}
