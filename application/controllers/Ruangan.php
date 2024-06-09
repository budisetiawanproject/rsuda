<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Ruangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
    }

    public function kelas()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['kelas'] = $this->db->get('t_kelas_perawatan')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ruangan/kelas');
            $this->load->view('templates/footer');
        }
    }

    public function kelasadd()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $w = date('YmdHis');
            $kode = 'KL' . $w;
            $kelas = $this->input->post('nama');
            $input = [
                'klp_id' => $kode,
                'klp_nama' => $kelas,
            ];
            $this->db->set($input);
            $this->db->insert('t_kelas_perawatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');
            redirect('ruangan/kelas');
        }
    }

    public function kelasedit()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $id = $this->input->post('id');
            $unit = $this->input->post('nama');
            $update = [
                'klp_nama'          => $unit
            ];
            $this->db->set($update);
            $this->db->where(['klp_id' => $id], 't_kelas_perawatan');
            $this->db->update('t_kelas_perawatan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil di Update
                      </div>');
            redirect('ruangan/kelas');
        }
    }

    public function kelasdel()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            if ($data['user']['us_role_id'] == '1') {
                $kode = $this->input->post('kode');
                $cek = $this->db->query("SELECT * FROM t_kamar WHERE klp_id = '$kode'")->row_array();
                if ($cek) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Data Tidak Bisa Di Hapus Karena Di gunakan
                      </div>');
                    redirect('ruangan/kelas');
                } else {
                    $this->db->where(['klp_id' => $kode], 't_kelas_perawatan');
                    $this->db->delete('t_kelas_perawatan');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
                    redirect('ruangan/kelas');
                }
            }
        }
    }


    public function kamar()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['kamar'] = $this->db->get('v_kamar')->result_array();
            $data['kelas'] = $this->db->get('t_kelas_perawatan')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ruangan/kamar');
            $this->load->view('templates/footer');
        }
    }

    public function kamaradd()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $w = date('YmdHis');
            $kode = 'KM' . $w;
            $kelas = $this->input->post('klp');
            $kamar = $this->input->post('nama');
            $input = [
                'kamar_id' => $kode,
                'klp_id' => $kelas,
                'kamar_nama' => $kamar,
            ];
            $this->db->set($input);
            $this->db->insert('t_kamar');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');
            redirect('ruangan/kamar');
        }
    }

    public function kamaredit()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $id = $this->input->post('id');
            $kelas = $this->input->post('klp');
            $kamar = $this->input->post('nama');
            $update = [
                'klp_id'          => $kelas,
                'kamar_nama'      => $kamar
            ];
            $this->db->set($update);
            $this->db->where(['kamar_id' => $id], 't_kamar');
            $this->db->update('t_kamar');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil di Update
                      </div>');
            redirect('ruangan/kamar');
        }
    }

    public function kamardel()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            if ($data['user']['us_role_id'] == '1') {
                $kode = $this->input->post('kode');
                $cek = $this->db->query("SELECT * FROM t_bed WHERE bed_id = '$kode'")->row_array();
                if ($cek) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Data Tidak Bisa Di Hapus Karena Di gunakan
                      </div>');
                    redirect('ruangan/kamar');
                } else {
                    $this->db->where(['kamar_id' => $kode], 't_kamar');
                    $this->db->delete('t_kamar');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
                    redirect('ruangan/kamar');
                }
            }
        }
    }

    public function bed()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['bed'] = $this->db->get('v_bed')->result_array();
            $data['kamar'] = $this->db->get('v_kamar')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ruangan/bed');
            $this->load->view('templates/footer');
        }
    }

    public function bedadd()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $w = date('YmdHis');
            $kode = 'BED' . $w;
            $kamar = $this->input->post('kamar');
            $bed = $this->input->post('nama');
            $input = [
                'bed_id' => $kode,
                'kamar_id' => $kamar,
                'bed_nama' => $bed,
                'bed_tersedia' => '1'
            ];
            $this->db->set($input);
            $this->db->insert('t_bed');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');
            redirect('ruangan/bed');
        }
    }
}
