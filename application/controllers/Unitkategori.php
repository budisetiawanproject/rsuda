<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Unitkategori extends CI_Controller
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
            $data['unit'] = $this->db->get('t_unit')->result_array();
            $data['unitkategori'] = $this->db->get('v_unit_kategori')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('unit_kategori/index');
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $w = date('YmdHis');
            $kode = 'UK' . $w;
            $unit = $this->input->post('unit');
            $nama = $this->input->post('nama');
            $input = [
                'uk_id' => $kode,
                'unit_id' => $unit,
                'uk_nama' => $nama,
            ];
            $this->db->set($input);
            $this->db->insert('t_unit_kategori');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');
            redirect('unitkategori');
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $id = $this->input->post('id');
            $unit = $this->input->post('unit');
            $nama = $this->input->post('nama');
            $update = [
                'unit_id' => $unit,
                'uk_nama' => $nama,
            ];
            $this->db->set($update);
            $this->db->where(['uk_id' => $id], 't_unit_kategori');
            $this->db->update('t_unit_kategori');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil di Update
                      </div>');
            redirect('unitkategori');
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
                $cek = $this->db->query("SELECT * FROM t_dokter WHERE uk_id = '$kode'")->row_array();
                if ($cek) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Data Tidak Bisa Di Hapus Karena Di gunakan
                      </div>');
                    redirect('unitkategori');
                } else {
                    $this->db->where(['uk_id' => $kode], 't_unit_kategori');
                    $this->db->delete('t_unit_kategori');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
                    redirect('unitkategori');
                }
            }
        }
    }
}
