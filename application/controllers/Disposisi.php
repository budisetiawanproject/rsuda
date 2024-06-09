<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Disposisi extends CI_Controller
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
        $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        //$data['tgl'] = date('Y-m-d H:i:s');
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else {
            $data['session'] = $this->session->userdata('role');
            if ($data['session'] == '1' || $data['session'] == '5') {
                $data['usul'] = $this->db->get('v_pengajuan')->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('usulproduk/index');
                $this->load->view('templates/footer');
            } if ($data['session'] == '2') {
                $data['usul'] = $this->db->get_where('v_pengajuan',['to_op' => '2'])->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('usulproduk/index');
                $this->load->view('templates/footer');
            }
        }
    }

}
