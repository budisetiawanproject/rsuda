<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Pegawai extends CI_Controller
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
        } else if ($data['user']['us_role_id'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['akses'] = $this->db->get('t_role')->result_array();
            $data['pegawai'] = $this->db->get('t_pegawai')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pegawai/index');
            $this->load->view('templates/footer');
        }
    }


    public function tambah()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['provinsi'] = $this->m_wilayah->get_all_provinsi();
            $data['kp'] = $this->db->get('t_kategori_pegawai')->result_array();

            $this->load->view('templates/headtable');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pegawai/tambah');
            $this->load->view('templates/footertable');
        }
    }


    public function prosesadd()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $w = date('YmdHis');
            $kode = 'PG' . $w;

            $provb = $this->input->post('provb');
            $kabb = $this->input->post('kabb');
            $kecb = $this->input->post('kecb');
            $kelb = $this->input->post('kelb');


            $provnama = $this->db->get_where('wilayah_provinsi', ['id' => $provb])->row_array();
            $kabnama = $this->db->get_where('wilayah_kabupaten', ['id' => $kabb])->row_array();
            $kecnama = $this->db->get_where('wilayah_kecamatan', ['id' => $kecb])->row_array();
            $kelnama = $this->db->get_where('wilayah_desa', ['id' => $kelb])->row_array();


            $data = [
                'peg_id' => $kode,
                'kp_id' => htmlspecialchars($this->input->post('kp')),
                'peg_nik' => htmlspecialchars($this->input->post('nik')),
                'peg_nip' => htmlspecialchars($this->input->post('nip')),
                'peg_nama' => htmlspecialchars($this->input->post('nama')),
                'peg_gelar_depan' => htmlspecialchars($this->input->post('gelardepan')),
                'peg_gelar_belakang' => htmlspecialchars($this->input->post('gelarbelakang')),
                'peg_tempat_lahir' => htmlspecialchars($this->input->post('tempatlahir')),
                'peg_tgl_lahir' => htmlspecialchars($this->input->post('tgllahir')),
                'peg_jenkel' => htmlspecialchars($this->input->post('jenkel')),
                'peg_prov' => $provnama['nama'],
                'peg_kab' => $kabnama['nama'],
                'peg_kec' => $kecnama['nama'],
                'peg_kel' => $kelnama['nama'],
                'peg_alamat' => htmlspecialchars($this->input->post('alamat')),
                'peg_agama' => htmlspecialchars($this->input->post('agama')),
                'peg_status' => htmlspecialchars($this->input->post('status')),
                'peg_nohp' => htmlspecialchars($this->input->post('nohp')),
                'peg_pendidikan' => htmlspecialchars($this->input->post('pendidikan')),
                'peg_email' => htmlspecialchars($this->input->post('email')),
                'peg_tgl_gabung' => htmlspecialchars($this->input->post('tglgabung')),
                'peg_sts_peg' => htmlspecialchars($this->input->post('statuspeg')),
            ];
            $this->db->set($data);
            $this->db->insert('t_pegawai');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Tambah
                        </div>');
            redirect('pegawai');
        }
    }


    public function tambah2()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $singkatan = $this->input->post('singkatan');
            $input = [
                'singkatan'          => $singkatan
            ];
            $this->db->set($input);
            $this->db->insert('tbl_singkatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');
            redirect('singkatan');
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $id = $this->input->post('id');
            $singkatan = $this->input->post('singkatan');
            $update = [
                'singkatan'          => $singkatan
            ];
            $this->db->set($update);
            $this->db->where(['id_singkatan' => $id], 'tbl_singkatan');
            $this->db->update('tbl_singkatan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil di Update
                      </div>');
            redirect('singkatan');
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


    public function useradd()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $id = $this->input->post('id');
            $ambil = $this->db->get_where('t_pegawai', ['peg_id' => $id])->row_array();
            $cekuser = $this->db->get_where('t_user', ['us_ket' => $id])->row_array();
            $cek = $this->input->post('nik');
            if ($cekuser) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Sudah Memiliki Akun
              </div>');
                redirect('pegawai');
            } else {
                if ($cek == '') {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Gagal Membuat Akun NIK tidak Boleh Kosong
                  </div>');
                    redirect('pegawai');
                } else {
                    $data = [
                        'us_nama' => $ambil['peg_nama'],
                        'us_email' => $ambil['peg_email'],
                        'us_image' => 'default.jpg',
                        'us_username' => htmlspecialchars($this->input->post('nik')),
                        'us_pass' => password_hash($this->input->post('nik'), PASSWORD_DEFAULT),
                        'us_role_id' => htmlspecialchars($this->input->post('role')),
                        'us_active' => 1,
                        'us_date_created' => time(),
                        'us_ket' => $id
                    ];

                    $this->db->insert('t_user', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Daftar Akun
                      </div>');
                    redirect('pegawai');
                }
            }
        }
    }
}
