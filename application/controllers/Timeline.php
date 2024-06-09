<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Timeline extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
    }
    public function detail()
    {

        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        //$data['tgl'] = date('Y-m-d H:i:s');
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else {
            $url = $this->uri->segment(3);
            $ambil = $this->secure->decrypt_url($url);
            $cek = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $ambil])->row_array();
            $data['session'] = $this->session->userdata('role');
            if ($cek) {
                $data['riwayat'] = $this->db->get_where('tbl_riwayat_pengajuan', ['pengajuan_id' => $ambil])->result_array();
                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('timeline/index');
                $this->load->view('templates/footer');
            } else {
                redirect('dashboard');
            }
        }
    }
}
