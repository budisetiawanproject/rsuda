<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Kabag extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
    }
    public function proses()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        //$data['tgl'] = date('Y-m-d H:i:s');
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else {
            $data['session'] = $this->session->userdata('role');
            if ($data['session'] == '2') {
                $data['usul'] = $this->db->get_where('v_pengajuan', ['to_op' => '2', 'status' => 'Proses'])->result_array();
                $data['usulproduk'] = $this->db->get_where('v_pengajuan')->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('kabag/proses');
                $this->load->view('templates/footer');
            } else {
                redirect('auth/logout');
            }
        }
    }

    public function terbit()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        //$data['tgl'] = date('Y-m-d H:i:s');
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else {
            $data['session'] = $this->session->userdata('role');
            if ($data['session'] == '2') {
                $data['usul'] = $this->db->get_where('v_pengajuan', ['to_op' => '2', 'status' => 'Proses'])->result_array();
                $data['terbit'] = $this->db->get_where('v_pengajuan', ['status' => 'Terbit'])->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('kabag/terbit');
                $this->load->view('templates/footer');
            } else {
                redirect('auth/logout');
            }
        }
    }
}
