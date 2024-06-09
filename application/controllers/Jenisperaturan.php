<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Jenisperaturan extends CI_Controller
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
            $data['jenis'] = $this->db->get('tbl_jns_peraturan')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('jenisperaturan/index');
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $jns = $this->input->post('jns');
            $input = [
                'jns_peraturan'          => $jns
            ];
            $this->db->set($input);
            $this->db->insert('tbl_jns_peraturan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');
            redirect('jenisperaturan');
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $id = $this->input->post('id');
            $jns = $this->input->post('jns');
            $update = [
                'jns_peraturan'          => $jns
            ];
            $this->db->set($update);
            $this->db->where(['id_jns' => $id], 'tbl_jns_peraturan');
            $this->db->update('tbl_jns_peraturan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil di Update
                      </div>');
            redirect('jenisperaturan');
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
                $this->db->where(['id_jns' => $kode], 'tbl_jns_peraturan');
                $this->db->delete('tbl_jns_peraturan');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
                redirect('jenisperaturan');
            }
        }
    }
}
