<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Detailproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
        $this->load->helper('url', 'download');
    }
    public function produk()
    {
        $url = $this->uri->segment(3);
        $code = $this->secure->decrypt_url($url);

        if ($code == '') {
            redirect('index');
        } else {
            // $data['code'] = $this->session->userdata('actid');
            // $data['dec'] = $this->encryption->decrypt($data['code']);
            // $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
            // $data['session'] = $this->session->userdata('role');
            $data['jenis'] = $this->db->get('tbl_jns_peraturan')->result_array();


            $data['slide'] = $this->db->get('tbl_slide')->result_array();
            $data['wisata'] = $this->db->get('tbl_wisata')->result_array();
            $data['berita'] = $this->db->query('SELECT * FROM tbl_berita ORDER BY tgl_berita DESC LIMIT 3')->result_array();
            $data['produk'] = $this->db->get_where('tbl_peraturan', ['id_peraturan' => $code])->row_array();
            $data['download'] = $this->db->query('SELECT * FROM tbl_peraturan  WHERE ket = "Publik" ORDER BY download DESC LIMIT 10')->result_array();

            $data['hari'] = date('d - m - Y');
            $this->load->view('frontend/templates/head', $data);
            $this->load->view('frontend/detailproduk');
            $this->load->view('frontend/templates/sidebar');
            $this->load->view('frontend/templates/footer');
        }
    }

    public function daftarproduk()
    {
        $data['jenis'] = $this->db->get('tbl_jns_peraturan')->result_array();

        $data['hari'] = date('d - m - Y');
        $this->load->view('frontend/templates/headtable', $data);
        $this->load->view('frontend/daftarproduk');
        $this->load->view('frontend/templates/sidebar');
        $this->load->view('frontend/templates/footer');
    }
    public function download()
    {
        $url = $this->uri->segment(3);
        $code = $this->secure->decrypt_url($url);
        $ambil = $this->db->get_where('tbl_peraturan', ['id_peraturan' => $code])->row_array();
        $download = $ambil['download'] + 1;
        // echo $download;
        // die;
        $update = [
            'download'          => $download
        ];
        $this->db->set($update);
        $this->db->where(['id_peraturan' => $code], 'tbl_peraturan');
        $this->db->update('tbl_peraturan');

        force_download('../upload_lampiran/' . $ambil['lampiran'], NULL);
        redirect('index');
    }
}
