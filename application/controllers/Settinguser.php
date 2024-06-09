<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Settinguser extends CI_Controller
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
        } else if ($data['user']['us_role_id'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['usert'] = $this->db->get('v_user')->result_array();
            $data['role'] = $this->db->get('t_role')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/index');
            $this->load->view('templates/footer');
        } else {
            redirect('dashboard');
        }
    }

    public function tambah()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['kode_role'] == '1') {
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $pass = $this->input->post('pass');
            $pd = $this->input->post('pd');
            $hp = $this->input->post('hp');
            $email = $this->input->post('email');
            $role = $this->input->post('role');
            $aktif = $this->input->post('aktif');
            $input = [
                'nip_nik'       => $nip,
                'nama'          => $nama,
                'username'      => $username,
                'pass'          => password_hash($pass, PASSWORD_DEFAULT),
                'skpd'          => $pd,
                'no_hp'         => $hp,
                'email'         => $email,
                'akses'         => $role,
                'aktif'         => $aktif
            ];
            $this->db->set($input);
            $this->db->insert('tbl_user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');
            redirect('settinguser');
        } else {
            redirect('dashboard');
        }
    }

    public function edit()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $role = $this->input->post('role');
            $aktif = $this->input->post('aktif');

            $update = [
                'us_nama'          => $nama,
                'us_username'      => $username,
                'us_email'         => $email,
                'us_role_id'       => $role,
                'us_active'        => $aktif
            ];
            $this->db->set($update);
            $this->db->where(['us_id' => $id], 't_user');
            $this->db->update('t_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil di Update
                          </div>');
            redirect('settinguser');
        } else {
            redirect('dashboard');
        }
    }

    public function hapus()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $kode = $this->input->post('kode');
            $this->db->where(['us_id' => $kode], 't_user');
            $this->db->delete('t_user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
            redirect('settinguser');
        } else {
            redirect('dashboard');
        }
    }
}
