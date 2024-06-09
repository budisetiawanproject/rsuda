<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Asisten extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
        $this->load->model('m_wilayah');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '6') {
            $data['session'] = $this->session->userdata('role');
            $data['akses'] = $this->db->get('t_role')->result_array();
            $data['pegawai'] = $this->db->get('t_pegawai')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pegawai/asisten_dokter');
            $this->load->view('templates/footer');
        }
    }
}
