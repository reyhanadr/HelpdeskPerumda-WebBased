<?php

class DepartemenModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('DepartemenModel');
    }

    public function getAllData()
	{
		return $this->db->get('departments')->result();
	}

	public function tambah_data()
	{
		$query = $this->db->select_max('departemen_id')->get('departments');
		$result = $query->row();
		$last_departemen_id = $result->departemen_id;

		// Membuat nomor berikutnya
		$new_departemen_id = $last_departemen_id + 1;
		$data = array(
			'departemen_id' => $new_departemen_id,
			'nama_departemen' => $this->input->post('nama', true)
		);
		$this->db->insert('departments', $data);
	}

	public function ubah_data()
	{
		$data = array(
			'nama_departemen' => $this->input->post('nama', true)
		);
		$this->db->where('departemen_id', $this->input->post('id', true));
		$this->db->update('departments', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('departments', ['departemen_id' => $id]);
	}

	public function detail_data($id)
	{
		return $this->db->get_where('departments', ['departemen_id' => $id])->row_array();
	}
}