<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Registrasi extends CI_Controller
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
    public function index()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '2') {
            $data['session'] = $this->session->userdata('role');
            $data['tgl'] = date('Y-m-d');
            $tgl = date('Y-m-d');
            $data['regis'] = $this->db->get_where('v_registrasi', ['reg_tgl' => $tgl])->result_array();
            $data['total'] = $this->db->query("SELECT COUNT(*) AS total FROM v_registrasi WHERE reg_tgl = '$tgl'")->row_array();

            $key = $this->input->post('key');


            if ($key == '') {
                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('registrasi/index');
                $this->load->view('templates/footer');
            } else {
                $data['pasien'] = $this->db->query("SELECT * FROM t_pasien WHERE pas_no_rm LIKE '%$key%' or Id_bpjs LIKE '%$key%' or pas_nik LIKE '%$key%' or pas_nama LIKE '%$key%' ")->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('registrasi/index');
                $this->load->view('templates/footer');
            }
        }
    }

    public function register()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '2') {
            $data['session'] = $this->session->userdata('role');
            $page = $this->uri->segment(3);
            $kode = $this->secure->decrypt_url($page);
            $data['pr'] = $this->db->get_where('t_pasien', ['pas_id' => $kode])->row_array();

            $birthDate = new DateTime($data['pr']['pas_tgl_lahir']);
            $today = new DateTime("today");
            if ($birthDate > $today) {
                exit("0 tahun 0 bulan 0 hari");
            }
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
            $data['umur'] =  $y . " tahun " . $m . " bulan " . $d . " hari";

            $data['unit'] = $this->db->get('t_unit_kategori')->result_array();
            $data['ambil'] = $this->m_unit->get_kategori();


            $this->load->view('templates/headtable');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('registrasi/register');
            $this->load->view('templates/footertable');
        }
    }

    public function addregister()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '2') {
            $data['session'] = $this->session->userdata('role');
            $data['provinsi'] = $this->m_wilayah->get_all_provinsi();
            $data['unit'] = $this->db->get('t_unit_kategori')->result_array();
            $data['ambil'] = $this->m_unit->get_kategori();

            $tanggal = date('Y-m-d');
            $waktu = date('H:i:s');

            $w = date('YmdHis');
            $kode = 'REG' . $w;

            $id = htmlspecialchars($this->input->post('id'));
            $ambildata = $this->db->get_where('t_pasien', ['pas_id' => $id])->row_array();


            //echo 'tidak jalan';
            $data = [
                'reg_id' => $kode,
                'pas_id' => htmlspecialchars($this->input->post('id')),
                'reg_pembayaran' => htmlspecialchars($this->input->post('bayar')),
                'reg_byr_nama' => htmlspecialchars($this->input->post('bayarnama')),
                'reg_tgl_datang' => htmlspecialchars($this->input->post('tgl')),
                'reg_waktu_datang' => htmlspecialchars($this->input->post('waktu')),
                'reg_nama_perujuk' => htmlspecialchars($this->input->post('namaperujuk')),
                'uk_id' => htmlspecialchars($this->input->post('unittujuan')),
                'dok_id' => htmlspecialchars($this->input->post('drtujuan')),
                'reg_status' => 'Registrasi',
                'reg_petugas' => $data['user']['us_nama'],
                'reg_tgl' => $tanggal,
                'reg_waktu' => $waktu,
            ];
            $this->db->set($data);
            $this->db->insert('t_registrasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Berhasil Registrasi
                            </div>');
            redirect('registrasi');
        }
    }


    public function registeredit()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '2') {
            $data['session'] = $this->session->userdata('role');
            $page = $this->uri->segment(3);
            $kode = $this->secure->decrypt_url($page);
            $data['pr'] = $this->db->get_where('v_registrasi', ['reg_id' => $page])->row_array();

            $birthDate = new DateTime($data['pr']['pas_tgl_lahir']);
            $today = new DateTime("today");
            if ($birthDate > $today) {
                exit("0 tahun 0 bulan 0 hari");
            }
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
            $data['umur'] =  $y . " tahun " . $m . " bulan " . $d . " hari";

            $data['unit'] = $this->db->get('t_unit_kategori')->result_array();
            $data['ambil'] = $this->m_unit->get_kategori();


            $this->load->view('templates/headtable');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('registrasi/editregistrasi');
            $this->load->view('templates/footertable');
        }
    }


    public function editregister()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '2') {
            $data['session'] = $this->session->userdata('role');
            $data['provinsi'] = $this->m_wilayah->get_all_provinsi();
            $data['unit'] = $this->db->get('t_unit_kategori')->result_array();
            $data['ambil'] = $this->m_unit->get_kategori();

            $tanggal = date('Y-m-d');
            $waktu = date('H:i:s');

            $w = date('YmdHis');
            $kode = 'REG' . $w;

            $id = htmlspecialchars($this->input->post('id'));
            $ambildata = $this->db->get_where('t_pasien', ['pas_id' => $id])->row_array();


            //echo 'tidak jalan';
            $update = [
                'reg_pembayaran' => htmlspecialchars($this->input->post('bayar')),
                'reg_byr_nama' => htmlspecialchars($this->input->post('bayarnama')),
                'reg_tgl_datang' => htmlspecialchars($this->input->post('tgl')),
                'reg_waktu_datang' => htmlspecialchars($this->input->post('waktu')),
                'reg_nama_perujuk' => htmlspecialchars($this->input->post('namaperujuk')),
                'uk_id' => htmlspecialchars($this->input->post('unittujuan')),
                'dok_id' => htmlspecialchars($this->input->post('drtujuan')),
                'reg_status' => 'Registrasi',
                'reg_petugas' => $data['user']['us_nama'],
                'reg_tgl' => $tanggal,
                'reg_waktu' => $waktu,
            ];
            $this->db->set($update);
            $this->db->where(['reg_id' => $id], 't_registrasi');
            $this->db->update('t_registrasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Berhasil Update Registrasi
                            </div>');
            redirect('registrasi');
        }
    }


    public function ugd()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['regis'] = $this->db->get_where('v_registrasi', ['unit_nama' => 'UGD', 'reg_status' => 'Registrasi'])->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('registrasi/ugd');
            $this->load->view('templates/footer');
        }
    }


    public function addpasien()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['provinsi'] = $this->m_wilayah->get_all_provinsi();
            $data['unit'] = $this->db->get('t_unit_kategori')->result_array();
            $data['ambil'] = $this->m_unit->get_kategori();


            $this->form_validation->set_rules('rm', 'Rm', 'required|trim', [
                'required' => 'Data Tidak Boleh Kosong'
            ]);
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
                'required' => 'Data Tidak Boleh Kosong'
            ]);

            $w = date('YmdHis');
            $kode = 'P' . $w;

            $provb = $this->input->post('provb');
            $kabb = $this->input->post('kabb');
            $kecb = $this->input->post('kecb');
            $kelb = $this->input->post('kelb');
            $alamatb = $this->input->post('alamatb');


            $provnama = $this->db->get_where('wilayah_provinsi', ['id' => $provb])->row_array();
            $kabnama = $this->db->get_where('wilayah_kabupaten', ['id' => $kabb])->row_array();
            $kecnama = $this->db->get_where('wilayah_kecamatan', ['id' => $kecb])->row_array();
            $kelnama = $this->db->get_where('wilayah_desa', ['id' => $kelb])->row_array();



            if ($this->form_validation->run() == false) {
                $this->load->view('templates/headtable');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('pasien/addpasien');
                $this->load->view('templates/footertable');
            } else {
                //echo 'tidak jalan';
                $data = [
                    'pas_id' => $kode,
                    'pas_no_rm' => htmlspecialchars($this->input->post('rm')),
                    'Id_simrs' => htmlspecialchars($this->input->post('idsimrs')),
                    'Id_bpjs' => htmlspecialchars($this->input->post('nobpjs')),
                    'pas_nik' => htmlspecialchars($this->input->post('nik')),
                    'pas_nama' => htmlspecialchars($this->input->post('nama')),
                    'pas_tempat_lahir' => htmlspecialchars($this->input->post('tempatlahir')),
                    'pas_tgl_lahir' => htmlspecialchars($this->input->post('tgllahir')),
                    'pas_jenkel' => htmlspecialchars($this->input->post('jenkel')),
                    'pas_prov' => $provnama['nama'],
                    'pas_kab' => $kabnama['nama'],
                    'pas_kec' => $kecnama['nama'],
                    'pas_kel' => $kelnama['nama'],
                    'pas_alamat' => htmlspecialchars($this->input->post('alamat')),
                    'pas_nohp' => htmlspecialchars($this->input->post('nohp')),
                    'pas_status_kawin' => htmlspecialchars($this->input->post('status')),
                    'pas_pendidikan' => htmlspecialchars($this->input->post('pendidikan')),
                    'pas_email' => htmlspecialchars($this->input->post('email')),
                    'pas_pekerjaan' => htmlspecialchars($this->input->post('pekerjaan')),
                    'pas_nama_ibu' => htmlspecialchars($this->input->post('namaibu')),
                    'pas_pj_nama' => htmlspecialchars($this->input->post('pjnama')),
                    'pas_pj_hp' => htmlspecialchars($this->input->post('pjhp')),
                    'pas_pj_hubungan' => htmlspecialchars($this->input->post('pjhubungan')),
                    'pas_pembayaran' => htmlspecialchars($this->input->post('bayar')),
                    'pas_byr_nama' => htmlspecialchars($this->input->post('bayarnama')),
                    'pas_tgl_datang' => htmlspecialchars($this->input->post('tgldatang')),
                    'pas_nama_perujuk' => htmlspecialchars($this->input->post('namaperujuk')),
                    'uk_id' => htmlspecialchars($this->input->post('unittujuan')),
                    'dok_id' => htmlspecialchars($this->input->post('drtujuan')),
                    'pas_menyatakan' => htmlspecialchars($this->input->post('menyatakan')),
                    'pas_petugas' => htmlspecialchars($this->input->post('petugas')),
                    'pas_sts' => htmlspecialchars($this->input->post('statuspasien')),
                ];
                $this->db->set($data);
                $this->db->insert('t_pasien');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil Tambah
                            </div>');
                redirect('pasien');
            }
        }
    }



    public function prosesreg()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['us_role_id'] == '1') {
            $data['session'] = $this->session->userdata('role');
            $data['provinsi'] = $this->m_wilayah->get_all_provinsi();
            $data['unit'] = $this->db->get('t_unit_kategori')->result_array();
            $data['ambil'] = $this->m_unit->get_kategori();

            $w = date('YmdHis');
            $kode = 'REG' . $w;

            $id = htmlspecialchars($this->input->post('id'));
            $ambildata = $this->db->get_where('t_pasien', ['pas_id' => $id])->row_array();


            //echo 'tidak jalan';
            $data = [
                'reg_id' => $kode,
                'pas_id' => htmlspecialchars($this->input->post('id')),
                'reg_no_rm' => $ambildata['pas_no_rm'],
                'Id_simrs' => $ambildata['Id_simrs'],
                'reg_pembayaran' => $ambildata['pas_pembayaran'],
                'reg_byr_nama' => $ambildata['pas_byr_nama'],
                'reg_tgl_datang' => $ambildata['pas_tgl_datang'],
                'reg_nama_perujuk' => $ambildata['pas_nama_perujuk'],
                'uk_id' => $ambildata['uk_id'],
                'dok_id' => $ambildata['dok_id'],
                'reg_status' => 'Registrasi',
                'reg_petugas' => $data['user']['us_nama'],
            ];
            $this->db->set($data);
            $this->db->insert('t_registrasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Berhasil Registrasi
                            </div>');
            redirect('pasien');
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
