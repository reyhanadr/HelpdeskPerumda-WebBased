<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChatModel extends CI_Model {
    public function startChat($user_id, $sesi_pesan, $kategori_id, $message) {
        $data_message = array(
            'sesi_pesan' => $sesi_pesan,
            'sender_id' => $user_id,
            'kategori_id' => $kategori_id,
            'message' => $message,
            'timestamp' => date('Y-m-d H:i:s')
        );
        $data_history= array(
            'sesi_pesan' => $sesi_pesan,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('messages', $data_message);
        $this->db->insert('historymessage', $data_history);
    }
    // public function getChats($user_id) {
    //     $this->db->select('messages.*, users.user_id, users.nama, users.foto_user, users.role_id');
    //     $this->db->from('messages');
    //     $this->db->join('users', 'users.user_id = messages.sender_id');
    //     $this->db->where('sender_id', $user_id);
    //     return $this->db->get()->result();
    // }

    public function getChatsBySesi($user_id, $sesi_pesan) {
        $this->db->select('messages.*, users.user_id, users.nama, users.foto_user, users.role_id');
        $this->db->from('messages');
        $this->db->join('users', 'users.user_id = messages.sender_id');
        $this->db->where('sesi_pesan', $sesi_pesan); // Tambahkan kondisi untuk sesi percakapan
        $this->db->where('sender_id', $user_id);
        return $this->db->get()->result();
        
    }

    public function getChatsByRole($sesi_pesan, $role_id) {
        $this->db->select('messages.*, users.user_id, users.nama, users.foto_user, users.role_id');
        $this->db->from('messages');
        $this->db->join('users', 'users.user_id = messages.sender_id');
        $this->db->where('sesi_pesan', $sesi_pesan); // Tambahkan kondisi untuk sesi percakapan
        $this->db->where('users.role_id', $role_id);
        return $this->db->get()->result();
    }

    public function getKategoriIdBySesiPesan($sesi_pesan) {
        $this->db->select('kategori_id');
        $this->db->from('messages'); // Ganti dengan nama tabel yang sesuai
        $this->db->where('sesi_pesan', $sesi_pesan);
        $this->db->order_by('id', 'DESC'); // Urutkan berdasarkan id secara menurun
        $this->db->limit(1); // Ambil hanya 1 baris (data akhir)
        $result = $this->db->get()->row();
    
        if ($result) {
            return $result->kategori_id;
        } else {
            return null; // Kembalikan null jika tidak ada data
        }
    }
    
    
    

    // public function getChatTeknisi($role_id) {
    //     $this->db->select('messages.*, users.user_id, users.nama, users.foto_user, users.role_id');
    //     $this->db->from('messages');
    //     $this->db->join('users', 'users.user_id = messages.sender_id');
    //     $this->db->where('users.role_id', $role_id);
    //     return $this->db->get()->result();
    // }

    public function save_message($data) {
        $this->db->insert('messages', $data);
        return $this->db->insert_id();
    }
    public function getLastSesiPesan(){
        $this->db->select_max('sesi_pesan');
        $this->db->like('sesi_pesan', 'PES', 'after'); // Hanya ambil ID yang dimulai dengan "REQ"
        $this->db->where('LENGTH(sesi_pesan)', 7); // Filter hanya ID produk dengan panjang 5 karakter
        $query = $this->db->get('messages');
        $result = $query->row_array();
    
        // Jika tidak ada data dengan ID "REQ", kembalikan nilai awal yaitu "JM000"
        if ($result['sesi_pesan'] === null) {
            return 'PES0001';
        }
    
        return $result['sesi_pesan'];
    }

    
    public function getKategoriById($kategori_id) {
        $this->db->select('kategori_id, nama_kategori');

        $this->db->where('kategori_id', $kategori_id);

        return $this->db->get('problemcategories')->row();

    }
    // public function get_messages($sender_id, $receiver_id) {
    //     $this->db->where("(sender_id = $sender_id AND receiver_id = $receiver_id) OR (sender_id = $receiver_id AND receiver_id = $sender_id)");
    //     $this->db->order_by('timestamp', 'ASC');
    //     return $this->db->get('messages')->result_array();
    // }
}