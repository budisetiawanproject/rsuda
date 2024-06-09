<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Role extends CI_Controller
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
            $data['role'] = $this->db->get('t_role')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('role/index');
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $nama = $this->input->post('nama');
            $input = [
                'role_name' => $nama
            ];
            $this->db->set($input);
            $this->db->insert('t_role');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');
            redirect('role');
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $update = [
                'role_name'          => $nama
            ];
            $this->db->set($update);
            $this->db->where(['role_id' => $id], 't_role');
            $this->db->update('t_role');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil di Update
                      </div>');
            redirect('role');
        }
    }

    public function hapus()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            if ($data['user']['us_role_id'] == '1') {
                $kode = $this->input->post('kode');
                $cek = $this->db->query("SELECT * FROM t_user WHERE us_role_id = '$kode'")->row_array();
                if ($cek) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Data Tidak Bisa Di Hapus Karena Di gunakan
                      </div>');
                    redirect('role');
                } else {
                    $this->db->where(['role_id' => $kode], 't_role');
                    $this->db->delete('t_role');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
                    redirect('role');
                }
            }
        }
    }
}
