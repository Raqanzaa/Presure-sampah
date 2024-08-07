<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('t_users');
        return $query->row_array();
    }

    public function get_all_users() {
        $query = $this->db->get('t_users');
        return $query->result_array();
    }

    public function insert_user($data) {
        return $this->db->insert('t_users', $data);
    }
    
    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('t_users', $data);
        return $this->db->affected_rows() > 0;  // Return true if rows were affected
    }    

    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->delete('t_users');
    }
}
?>
