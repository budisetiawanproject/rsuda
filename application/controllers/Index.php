<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Index extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
        $this->load->helper('url', 'download');
    }
    public function index()
    {
        // $data['code'] = $this->session->userdata('actid');
        // $data['dec'] = $this->encryption->decrypt($data['code']);
        // $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        // $data['session'] = $this->session->userdata('role');
        $this->load->view('frontend/templates/head');
        $this->load->view('frontend/templates/header');
        $this->load->view('frontend/index');
        //$this->load->view('frontend/templates/sidebar');
        $this->load->view('frontend/templates/footer');
    }


    public function daftarproduk()
    {
        $data['jenis'] = $this->db->get('tbl_jns_peraturan')->result_array();

        $data['hari'] = date('d - m - Y');
        $this->load->view('frontend/templates/headtable', $data);
        $this->load->view('frontend/daftarproduk');
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

        force_download('upload_lampiran/' . $ambil['lampiran'], NULL);
        redirect('index');
    }
}
