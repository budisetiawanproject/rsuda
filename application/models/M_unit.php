<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_unit extends CI_Model
{

    function get_kategori()
    {
        $hasil = $this->db->query("SELECT * FROM t_unit_kategori");
        return $hasil;
    }

    function get_subkategori($id)
    {
        $hasil = $this->db->query("SELECT * FROM t_dokter WHERE uk_id='$id'");
        return $hasil->result();
    }
}
