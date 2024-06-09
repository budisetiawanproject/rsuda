<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pencarian_model extends CI_Model
{

    public function ambil_data($keyword)
    {
        $this->db->select('*');
        $this->db->from('tbl_peraturan');
        if (!empty($keyword)) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('singkatan', $keyword);
            $this->db->or_like('tahun_peraturan', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
