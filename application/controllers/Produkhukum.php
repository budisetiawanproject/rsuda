<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Produkhukum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
    }
    public function daftar()
    {
        // $data['code'] = $this->session->userdata('actid');
        // $data['dec'] = $this->encryption->decrypt($data['code']);
        // $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        // $data['session'] = $this->session->userdata('role');

        $url = $this->uri->segment(3);
        $code = $this->secure->decrypt_url($url);
        // echo $code;
        // die;
        $data['peraturan'] = $this->db->get_where('tbl_peraturan', ['singkatan' => $code, 'ket' => 'Publik'])->result_array();
        $data['jns'] = $this->db->get_where('tbl_peraturan', ['singkatan' => $code])->row_array();
        $data['jenis'] = $this->db->get('tbl_jns_peraturan')->result_array();
        
        $data['perda'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM tbl_peraturan WHERE singkatan = 'PERDA'")->row_array();
        $data['perwa'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM tbl_peraturan WHERE singkatan = 'PERWA'")->row_array();
        $data['sk'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM tbl_peraturan WHERE singkatan = 'SK WALIKOTA'")->row_array();


        //$data['kategori'] = $this->db->query('SELECT singkatan, jenis_peraturan, COUNT(singkatan) AS jumlah FROM tbl_peraturan GROUP BY singkatan')->result_array();
        $data['kategori'] = $this->db->query('SELECT * FROM tbl_jns_peraturan')->result_array();


        $data['slide'] = $this->db->get('tbl_slide')->result_array();
        $data['wisata'] = $this->db->get('tbl_wisata')->result_array();
        $data['berita'] = $this->db->query('SELECT * FROM tbl_berita ORDER BY tgl_berita DESC LIMIT 3')->result_array();
        $data['produk'] = $this->db->query('SELECT * FROM tbl_peraturan  WHERE ket = "Publik" ORDER BY tgl_peraturan DESC LIMIT 10')->result_array();
        $data['download'] = $this->db->query('SELECT * FROM tbl_peraturan  WHERE ket = "Publik" ORDER BY download DESC LIMIT 10')->result_array();

        $data['hari'] = date('d - m - Y');
        $this->load->view('frontend/templates/headtable', $data);
        $this->load->view('frontend/daftarproduk');
        $this->load->view('frontend/templates/sidebar');
        $this->load->view('frontend/templates/footer');
    }
}