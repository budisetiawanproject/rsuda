<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Dokter extends CI_Controller
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
            $data['dokter'] = $this->db->get('t_dokter')->result_array();
            $data['akses'] = $this->db->get('t_role')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dokter/index');
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
            $data['unit'] = $this->db->get('v_unit_kategori')->result_array();

            $this->load->view('templates/headtable');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dokter/tambah');
            $this->load->view('templates/footertable');
        }
    }

    public function pemeriksaan()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '6') {
            $data['session'] = $this->session->userdata('role');
            $data['provinsi'] = $this->m_wilayah->get_all_provinsi();
            $data['unit'] = $this->db->get('v_unit_kategori')->result_array();
            $reg = $this->uri->segment(3);
            $rm = $this->uri->segment(4);
            $data['reg'] = $this->db->get_where('v_rekam_medis', ['rm_id' => $rm])->row_array();
            $data['pr'] = $this->db->get_where('v_registrasi', ['reg_id' => $reg])->row_array();

            $birthDate = new DateTime($data['pr']['pas_tgl_lahir']);
            $today = new DateTime("today");
            if ($birthDate > $today) {
                exit("0 tahun 0 bulan 0 hari");
            }
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
            $data['umur'] =  $y . " tahun " . $m . " bulan " . $d . " hari";

            $data['rujuk'] = $this->db->get('v_unit_kategori')->result_array();
            $data['rekam'] = $this->db->get_where('v_rekam_medis', ['pas_id' => $data['reg']['pas_id']])->result_array();

            $this->load->view('templates/headtable');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dokter/pemeriksaan');
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
            $kode = 'D' . $w;

            $provb = $this->input->post('provb');
            $kabb = $this->input->post('kabb');
            $kecb = $this->input->post('kecb');
            $kelb = $this->input->post('kelb');


            $provnama = $this->db->get_where('wilayah_provinsi', ['id' => $provb])->row_array();
            $kabnama = $this->db->get_where('wilayah_kabupaten', ['id' => $kabb])->row_array();
            $kecnama = $this->db->get_where('wilayah_kecamatan', ['id' => $kecb])->row_array();
            $kelnama = $this->db->get_where('wilayah_desa', ['id' => $kelb])->row_array();


            $data = [
                'dok_id' => $kode,
                'uk_id' => htmlspecialchars($this->input->post('unit')),
                'dok_nik' => htmlspecialchars($this->input->post('nik')),
                'dok_nip' => htmlspecialchars($this->input->post('nip')),
                'dok_nama' => htmlspecialchars($this->input->post('nama')),
                'dok_gelar_depan' => htmlspecialchars($this->input->post('gelardepan')),
                'dok_gelar_belakang' => htmlspecialchars($this->input->post('gelarbelakang')),
                'dok_tempat_lahir' => htmlspecialchars($this->input->post('tempatlahir')),
                'dok_tgl_lahir' => htmlspecialchars($this->input->post('tgllahir')),
                'dok_jenkel' => htmlspecialchars($this->input->post('jenkel')),
                'dok_prov' => $provnama['nama'],
                'dok_kab' => $kabnama['nama'],
                'dok_kec' => $kecnama['nama'],
                'dok_kel' => $kelnama['nama'],
                'dok_alamat' => htmlspecialchars($this->input->post('alamat')),
                'dok_agama' => htmlspecialchars($this->input->post('agama')),
                'dok_status' => htmlspecialchars($this->input->post('status')),
                'dok_nohp' => htmlspecialchars($this->input->post('nohp')),
                'dok_pendidikan' => htmlspecialchars($this->input->post('pendidikan')),
                'dok_email' => htmlspecialchars($this->input->post('email')),
                'dok_tgl_gabung' => htmlspecialchars($this->input->post('tglgabung')),
                'dok_sts_peg' => htmlspecialchars($this->input->post('statuspeg')),
            ];
            $this->db->set($data);
            $this->db->insert('t_dokter');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Tambah
                        </div>');
            redirect('dokter');
        }
    }


    public function pasien()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '6') {
            $data['session'] = $this->session->userdata('role');
            $data['provinsi'] = $this->m_wilayah->get_all_provinsi();
            $data['reg'] = $this->db->get_where('v_rekam_medis', ['dok_id' => $data['user']['us_ket']])->result_array();

            $this->load->view('templates/headtable');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dokter/pasien');
            $this->load->view('templates/footertable');
        }
    }

    public function prosesrm()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '5') {
            $id = $this->input->post('id');
            $idreg = $this->input->post('reg');
            $ad = $this->input->post('ad');
            $dd = $this->input->post('dd');
            $ro = $this->input->post('ro');
            $update = [
                'rm_anamnesis_dokter'    => $ad,
                'rm_diagnosa_dokter'     => $dd,
                'rm_obat'                => $ro,
                'rm_tgl'                 => date('Y-m-d'),
                'rm_waktu'               => date('H:i:s'),
                'rm_status'              => 'Antrian Apotik'
            ];
            $this->db->set($update);
            $this->db->where(['rm_id' => $id], 't_rekam_medis');
            $this->db->update('t_rekam_medis');

            $ambil = [
                'reg_status'              => 'Antrian Apotik'
            ];
            $this->db->set($ambil);
            $this->db->where(['reg_id' => $idreg], 't_registrasi');
            $this->db->update('t_registrasi');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil di Update
                      </div>');
            redirect('dokter/pasien');
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
            $ambil = $this->db->get_where('t_dokter', ['dok_id' => $id])->row_array();
            $cekuser = $this->db->get_where('t_user', ['us_ket' => $id])->row_array();
            $cek = $this->input->post('nik');
            if ($cekuser) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Sudah Memiliki Akun
              </div>');
                redirect('dokter');
            } else {
                if ($cek == '') {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Gagal Membuat Akun NIK tidak Boleh Kosong
                  </div>');
                    redirect('dokter');
                } else {
                    $data = [
                        'us_nama' => $ambil['dok_nama'],
                        'us_email' => $ambil['dok_email'],
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
                    redirect('dokter');
                }
            }
        }
    }
}
