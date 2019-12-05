<?php
class Api_model extends CI_Model
{
	function get()
	{
		$this->db->order_by('id_mobil', 'DESC');
		return $this->db->get('t_mobil');
	}

	function get_id($id_mobil)
	{
		$this->db->where('id_mobil', $id_mobil);
		$query = $this->db->get('t_mobil');
		return $query->result_array();
	}

	public function search($criteria, $cari)
	{
		// $criteria = $this->input->post('criteria');
		// $cari = $this->input->post('cari');

		$this->db->select('*');
		$this->db->from('t_mobil');
		$this->db->like($criteria, $cari, 'BOTH');
		$query = $this->db->get();
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('t_mobil', $data);
	}

	function update($id_mobil, $data)
	{
		$this->db->where('id_mobil', $id_mobil);
		$this->db->update('t_mobil', $data);
	}

	function delete($id_mobil)
	{
		$this->db->where('id_mobil', $id_mobil);
		$this->db->delete('t_mobil');
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>