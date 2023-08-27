<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
    public function get_user($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users'); // Ganti 'users' dengan nama tabel user Anda
        return $query->row();
    }

    public function getUserById($username) {
        $this->db->select('users.*, roles.nama_role, departments.nama_departemen');
        $this->db->from('users');
        $this->db->join('roles', 'roles.role_id = users.role_id');
        $this->db->join('departments', 'departments.departemen_id = users.departemen_id');
        $this->db->where('users.username', $username);
        return $this->db->get()->row();
    }
    
    public function updateProfil($username, $data){
        $this->db->where('username', $username);
        $this->db->update('users', $data);
        return $this->db->affected_rows() > 0;
    }
    public function count_fixed_by_user_n_status($user_id, $status_perangkat) {
        $this->db->where('user_id', $user_id);
        $this->db->where('status', $status_perangkat);
        return $this->db->count_all_results('supportticket');
    }
    public function count_perangkat_byuserid($user_id){
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('perangkat');
    }


}
