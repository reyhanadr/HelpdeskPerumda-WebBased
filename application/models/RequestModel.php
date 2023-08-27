<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RequestModel extends CI_Model {

    public function getExistingRequestByPerangkat($perangkat_id) {
        $this->db->where('perangkat_id', $perangkat_id);
        $this->db->where('status', "PENDING");
        return $this->db->get('supportticket')->row(); // Ganti 'nama_tabel_request' dengan nama tabel yang sesuai
    }

    public function getTicketsWithDetails($username) {
        $this->db->select('supportticket.*, users.user_id as user_id, users.nama, roles.nama_role, perangkat.nama_perangkat, problemcategories.nama_kategori, departments.nama_departemen');
        $this->db->from('supportticket');
        $this->db->join('users', 'users.user_id = supportticket.user_id');
        $this->db->join('roles', 'roles.role_id = users.role_id');
        $this->db->join('perangkat', 'perangkat.id = supportticket.perangkat_id');
        $this->db->join('problemcategories', 'problemcategories.kategori_id = supportticket.kategori_id');
        $this->db->join('departments', 'departments.departemen_id = supportticket.department_id');
        $this->db->where('users.username', $username); // Filter berdasarkan username
        return $this->db->get()->result();
    }
    public function getLastReqID(){
        $this->db->select_max('request_id');
        $this->db->like('request_id', 'REQ', 'after'); // Hanya ambil ID yang dimulai dengan "REQ"
        $this->db->where('LENGTH(request_id)', 7); // Filter hanya ID produk dengan panjang 5 karakter
        $query = $this->db->get('supportticket');
        $result = $query->row_array();
    
        // Jika tidak ada data dengan ID "JM", kembalikan nilai awal yaitu "JM000"
        if ($result['request_id'] === null) {
            return 'REQ0001';
        }
    
        return $result['request_id'];
    }
    public function getKategori() {
        $this->db->select('kategori_id, nama_kategori');
        $query = $this->db->get('problemcategories');
        return $query->result();
    }

    public function simpan_request($data_request) {
        $this->db->insert('supportticket', $data_request);
    }

    public function tambah_notifikasi($data) {
        $this->db->insert('notification', $data);
    }
    
    public function updateStatusPerangkat($perangkat_id, $status) {
        $data = array(
            'status_perangkat' => $status
        );

        $this->db->where('id', $perangkat_id);
        $this->db->update('perangkat', $data);
    }

    public function getRequestById($request_id) {
        $this->db->select('supportticket.*, perangkat.nama_perangkat, problemcategories.nama_kategori, departments.nama_departemen');
        $this->db->from('supportticket');
        $this->db->join('perangkat', 'perangkat.id = supportticket.perangkat_id');
        $this->db->join('problemcategories', 'problemcategories.kategori_id = supportticket.kategori_id');
        $this->db->join('departments', 'departments.departemen_id = supportticket.department_id');
        $this->db->where('request_id', $request_id);
        return $this->db->get()->row();
    }
    

    public function updateRequest($request_id, $data) {
        $this->db->where('request_id', $request_id);
        $this->db->update('supportticket', $data);
    }

    public function updateStatusToRunning($request_id, $newStatus) {
        $data = array('status' => $newStatus);
        $this->db->where('request_id', $request_id);
        $this->db->update('supportticket', $data);
    }
    public function searchRequest($keyword) {
        $this->db->select('supportticket.*, users.nama, perangkat.nama_perangkat, problemcategories.nama_kategori, departments.nama_departemen');
        $this->db->from('supportticket');
        $this->db->join('users', 'supportticket.user_id = users.user_id', 'left');
        $this->db->join('perangkat', 'supportticket.perangkat_id = perangkat.id', 'left');
        $this->db->join('problemcategories', 'perangkat.kategori_id = problemcategories.kategori_id', 'left');
        $this->db->join('departments', 'supportticket.department_id = departments.departemen_id', 'left');
        
        $this->db->like('users.nama', $keyword); // Tambahkan alias 'users' sebelum kolom
        $this->db->like('perangkat.nama_perangkat', $keyword); // Tambahkan alias 'perangkat' sebelum kolom
        $this->db->or_like('problemcategories.nama_kategori', $keyword); // Tambahkan alias 'problemcategories' sebelum kolom
        $this->db->or_like('departments.nama_departemen', $keyword); // Tambahkan alias 'departments' sebelum kolom
        $this->db->or_like('supportticket.status', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.deskripsi_permasalahan', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.prioritas', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.foto', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.tanggal_dibuat', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.tanggal_ditangani', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.catatan', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        
        return $this->db->get()->result();
    }
    
}
