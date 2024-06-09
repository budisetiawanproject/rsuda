<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Profil extends CI_Controller
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
        } else {

            $data['profil'] = $this->db->get('v_user')->row_array();
            $data['session'] = $this->session->userdata('role');

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('profil/index', $data);
            $this->load->view('templates/footer');
        }
    }
    public function foto()
    {
        $kode = $this->input->post('kode');
        $ambil = $this->secure->decrypt_url($kode);
        $cek = $this->db->get_where('tbl_user', ['user_id' => $ambil])->row_array();
        if ($cek['foto'] == '') {
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = '4096';
            $config['remove_spaces']        = true;
            $config['encrypt_name']        = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $namafoto = $this->upload->data('file_name');
                $update = [
                    'foto'          => $namafoto
                ];
                $this->db->set($update);
                $this->db->where(['user_id' => $ambil], 'tbl_user');
                $this->db->update('tbl_user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Foto Berhasil dirubah
                            </div>');
                redirect('profil');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Foto Gagal dirubah
                            </div>');
                redirect('profil');
            }
        } else {
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = '4096';
            $config['file_name']            = $cek['foto'];
            $config['overwrite']            = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                // $namafoto = $this->upload->data('file_name');
                // $update = [
                //     'foto'          => $namafoto
                // ];
                // $this->db->set($update);
                // $this->db->where(['user_id' => $kode], 'tbl_user');
                // $this->db->update('tbl_user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Foto Berhasil dirubah
                            </div>');
                redirect('profil');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Foto Gagal dirubah
                            </div>');
                redirect('profil');
            }
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('id');
            $id = $this->encryption->decrypt($kode);
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            //$pass = $this->input->post('pass');
            //$pd = $this->input->post('pd');
            $hp = $this->input->post('hp');
            $email = $this->input->post('email');
            //'pass'          => password_hash($pass, PASSWORD_DEFAULT),
            $update = [
                'nip_nik'       => $nip,
                'nama'          => $nama,
                'username'      => $username,
                'no_hp'         => $hp,
                'email'         => $email
            ];
            $this->db->set($update);
            $this->db->where(['user_id' => $id], 'tbl_user');
            $this->db->update('tbl_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil di Update
                      </div>');
            redirect('profil');
        }
    }

    public function ps()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('id');
            $id = $this->secure->decrypt_url($kode);
            $nip = $this->input->post('nip');
            $pass = $this->input->post('pass');
            $update = [
                'pass'       => password_hash($pass, PASSWORD_DEFAULT),
            ];
            $this->db->set($update);
            $this->db->where(['user_id' => $id], 'tbl_user');
            $this->db->update('tbl_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Password Berhasil di Rubah
                      </div>');
            redirect('profil');
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
                $this->db->where(['id_singkatan' => $kode], 'tbl_singkatan');
                $this->db->delete('tbl_singkatan');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
                redirect('singkatan');
            }
        }
    }
}
