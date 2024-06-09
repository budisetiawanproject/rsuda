<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Registrasidata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
        $this->load->model('m_wilayah');
        $this->load->library('form_validation');
        $this->load->model('m_unit');
    }
    public function regirja()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '3') {
            $data['session'] = $this->session->userdata('role');
            $data['regis'] = $this->db->get_where('v_registrasi', ['unit_nama' => 'Poli', 'reg_status' => 'Registrasi'])->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('registrasidata/irja');
            $this->load->view('templates/footer');
        }
    }

    public function regugd()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '4') {
            $data['session'] = $this->session->userdata('role');
            $data['regis'] = $this->db->get_where('v_registrasi', ['unit_nama' => 'UGD', 'reg_status' => 'Registrasi'])->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('registrasidata/ugd');
            $this->load->view('templates/footer');
        }
    }

    public function regirna()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '3') {
            $data['session'] = $this->session->userdata('role');
            $data['regis'] = $this->db->get('v_registrasi')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('registrasidata/index');
            $this->load->view('templates/footer');
        }
    }


    public function perawatirja()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '3') {
            $data['session'] = $this->session->userdata('role');
            $page = $this->uri->segment(3);
            $data['reg'] = $this->db->get_where('v_registrasi', ['reg_id' => $page])->row_array();
            $birthDate = new DateTime($data['reg']['pas_tgl_lahir']);
            $today = new DateTime("today");
            if ($birthDate > $today) {
                exit("0 tahun 0 bulan 0 hari");
            }
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
            $data['umur'] = $y . " tahun " . $m . " bulan " . $d . " hari";


            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('registrasidata/perawat_irja');
            $this->load->view('templates/footer');
        }
    }


    public function perawatugd()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '4') {
            $data['session'] = $this->session->userdata('role');
            $page = $this->uri->segment(3);
            $data['reg'] = $this->db->get_where('v_registrasi', ['reg_id' => $page])->row_array();

            $birthDate = new DateTime($data['reg']['pas_tgl_lahir']);
            $today = new DateTime("today");
            if ($birthDate > $today) {
                exit("0 tahun 0 bulan 0 hari");
            }
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
            $data['umur'] = $y . " tahun " . $m . " bulan " . $d . " hari";

            $data['ugd'] = $this->db->get_where('t_pegawai', ['peg_id' => $data['user']['us_ket']])->row_array();
            $data['jku'] = $this->db->get('t_jenis_kasus_ugd')->result_array();
            $data['uk'] = $this->db->get_where('v_unit_kategori', ['unit_ket' => 'Pemeriksaan Penunjang'])->result_array();
            $data['dokter'] = $this->db->get_where('v_dokter', ['uk_nama' => 'UGD'])->result_array();

            $data['tgl'] = date('Y-m-d');
            $data['waktu'] = date('H:i:s');


            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('registrasidata/perawat_ugd');
            $this->load->view('templates/footer');
        }
    }


    public function prosesugd()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $w = date('YmdHis');
            $kode = 'UGD' . $w;
            $tgl = date('Y-m-d');
            $waktu = date('H:i:s');
            $idreg = htmlspecialchars($this->input->post('noreg'));

            // $jenis = $this->input->post('ary');
            // $array = implode(", ", $jenis);
            // echo $array;
            // die;

            $input = [
                'ugd_id' => $kode,
                'pas_id' => $this->input->post('pasid'),
                'rm_tgl_kunjungan' => $tgl,
                'rm_waktu_kunjungan' => $waktu,
                'rm_tekanan_Darah' => htmlspecialchars($this->input->post('td')),
                'rm_frekuensi_nadi' => htmlspecialchars($this->input->post('fa')),
                'rm_suhu' => htmlspecialchars($this->input->post('st')),
                'rm_frekuensi_nafas' => htmlspecialchars($this->input->post('fn')),
                'rm_berat_badan' => htmlspecialchars($this->input->post('bb')),
                'rm_tinggi_badan' => htmlspecialchars($this->input->post('tb')),
                'rm_imt' => htmlspecialchars($this->input->post('imt')),
                'rm_anamnesis_perawat' => htmlspecialchars($this->input->post('ap')),
                'rm_op_perawat' => $data['user']['us_ket'],
                'rm_op_tgl' => date('Y-m-d'),
                'rm_op_waktu' => date('H:i:s'),
            ];
            $this->db->set($input);
            $this->db->insert('t_rekam_medis');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');

            $update = [
                'reg_status'          => 'Antrian Dokter'
            ];
            $this->db->set($update);
            $this->db->where(['reg_id' => $idreg], 't_registrasi');
            $this->db->update('t_registrasi');

            redirect('registrasidata');
        }
    }






    public function prosesirja()
    {
        $data['user'] = $this->db->get_where('v_user', ['us_username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['us_username'] == '') {
            redirect('auth/logout');
        } else {
            $w = date('YmdHis');
            $kode = 'IRJA' . $w;
            $tgl = date('Y-m-d');
            $waktu = date('H:i:s');
            $idreg = htmlspecialchars($this->input->post('noreg'));

            $input = [
                'rm_id' => $kode,
                'reg_id' => $idreg,
                'rm_tgl_kunjungan' => $tgl,
                'rm_waktu_kunjungan' => $waktu,
                'rm_tekanan_Darah' => htmlspecialchars($this->input->post('td')),
                'rm_frekuensi_nadi' => htmlspecialchars($this->input->post('fa')),
                'rm_suhu' => htmlspecialchars($this->input->post('st')),
                'rm_frekuensi_nafas' => htmlspecialchars($this->input->post('fn')),
                'rm_berat_badan' => htmlspecialchars($this->input->post('bb')),
                'rm_tinggi_badan' => htmlspecialchars($this->input->post('tb')),
                'rm_imt' => htmlspecialchars($this->input->post('imt')),
                'rm_anamnesis_perawat' => htmlspecialchars($this->input->post('ap')),
                'rm_op_perawat' => $data['user']['us_ket'],
                'rm_op_tgl' => date('Y-m-d'),
                'rm_op_waktu' => date('H:i:s'),
            ];
            $this->db->set($input);
            $this->db->insert('t_rekam_medis');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');

            $update = [
                'reg_status'          => 'Antrian Dokter'
            ];
            $this->db->set($update);
            $this->db->where(['reg_id' => $idreg], 't_registrasi');
            $this->db->update('t_registrasi');

            redirect('registrasidata/regirja');
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

    function add_ajax_dok($id_dok)
    {
        $query = $this->db->get_where('t_dokter', array('uk_id' => $id_dok));
        $data = "<option value=''>Pilih Dokter</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->dok_id . "'>" . $value->dok_gelar_depan . ' ' . $value->dok_nama . ' ' . $value->dok_gelar_belakang . "</option>";
        }
        echo $data;
    }


    function add_ajax_kab($id_prov)
    {
        $query = $this->db->get_where('wilayah_kabupaten', array('provinsi_id' => $id_prov));
        $data = "<option value=''>- Select Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    function add_ajax_kec($id_kab)
    {
        $query = $this->db->get_where('wilayah_kecamatan', array('kabupaten_id' => $id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    function add_ajax_des($id_kec)
    {
        $query = $this->db->get_where('wilayah_desa', array('kecamatan_id' => $id_kec));
        $data = "<option value=''> - Pilih Desa - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }
}
