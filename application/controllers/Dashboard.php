<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
    }
    public function index()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else {

            $data['session'] = $this->session->userdata('role');
            if ($data['session'] == '2') {
                // $data['total'] = $this->db->query("SELECT STATUS, COUNT(*) AS total FROM tbl_pengajuan WHERE STATUS = 'Terkirim'")->row_array();
                // $data['berlaku'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM tbl_peraturan WHERE berlaku = 'Berlaku'")->row_array();
                // $data['tidak'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM tbl_peraturan WHERE berlaku = 'Tidak Berlaku'")->row_array();
                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('dashboard/dashboard_main');
                $this->load->view('templates/footer');
            } else {
                // $data['total'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM tbl_peraturan")->row_array();
                // $data['berlaku'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM tbl_peraturan WHERE berlaku = 'Berlaku'")->row_array();
                // $data['tidak'] = $this->db->query("SELECT COUNT(*) AS jumlah FROM tbl_peraturan WHERE berlaku = 'Tidak Berlaku'")->row_array();
                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('dashboard/dashboard');
                $this->load->view('templates/footer');
            }
        }
    }
}
