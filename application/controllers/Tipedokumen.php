<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Tipedokumen extends CI_Controller
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
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['kode_role'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['tipe'] = $this->db->get('tbl_tipe_dokumen')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('tipedokumen/index');
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $tipe = $this->input->post('tipe');
            $input = [
                'dokumen'          => $tipe
            ];
            $this->db->set($input);
            $this->db->insert('tbl_tipe_dokumen');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Berhasil Tambah tipe dokumen
                            </div>');
            redirect('tipedokumen');
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $id = $this->input->post('id');
            $tipe = $this->input->post('tipe');
            $update = [
                'dokumen'          => $tipe
            ];
            $this->db->set($update);
            $this->db->where(['id_dok' => $id], 'tbl_tipe_dokumen');
            $this->db->update('tbl_tipe_dokumen');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil di Update
                      </div>');
            redirect('tipedokumen');
        }
    }

    public function hapus()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            if ($data['user']['akses'] == '1' or $data['user']['akses'] == '4') {
                $kode = $this->input->post('kode');
                $this->db->where(['id_dok' => $kode], 'tbl_tipe_dokumen');
                $this->db->delete('tbl_tipe_dokumen');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
                redirect('tipedokumen');
            }
        }
    }
}
