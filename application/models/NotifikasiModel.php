<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotifikasiModel extends CI_Model {
    public function tambah_notifikasi($data) {
        $this->db->insert('notification', $data);
    }

    public function get_notifikasi_by_id($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'desc'); // Urutkan berdasarkan timestamp desc (terbaru dulu)
        return $this->db->get('notification')->result();
    }
    

    public function count_notif_by_id($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('notification');
    }

    public function get_notifikasi_unread($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_read', 'UNREAD');
        $this->db->order_by('created_at', 'desc');
        return $this->db->get('notification')->result();
    }
}


