<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_gudang extends CI_Model
{

	public function getAll($table)
	{
		return $this->db->get($table)->result_array();
	}

	public function getWhere($table, $where, $some)
	{
		return $this->db->get_where($table, [$where => $some])->result_array();
	}

	public function insert($data)
	{
		return $this->db->insert('t_restok', $data);
	}
	public function getrincianstok($id)
	{
		$this->db->select('*');
		$this->db->from('t_rinci_stok');
		$this->db->where('id_nota', $id);
		$this->db->join('t_barang', 't_rinci_stok.id_barang = t_barang.id');
		return $this->db->get()->result_array();
	}

	public function getsumrs($id)
	{
		$this->db->select('total');
		$this->db->select_sum('total');
		$this->db->from('t_rinci_stok');
		$this->db->where('id_nota', $id);
		return $this->db->get()->result_array();
	}
}
