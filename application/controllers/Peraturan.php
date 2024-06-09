<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Peraturan extends CI_Controller
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
            $data['peraturan'] = $this->db->get('tbl_peraturan')->result_array();

            $data['tipe'] = $this->db->get('tbl_tipe_dokumen')->result_array();
            $data['jenis'] = $this->db->get('tbl_jns_peraturan')->result_array();
            $data['singkatan'] = $this->db->get('tbl_singkatan')->result_array();
            $data['status'] = $this->db->get('tbl_status')->result_array();
            $data['bidang'] = $this->db->get('tbl_bidang_hukum')->result_array();


            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('peraturan/peraturan');
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
            date_default_timezone_set('asia/makassar');
            $tipe = $this->input->post('tipe');
            $judul = $this->input->post('judul');
            $teu = $this->input->post('teu');
            $nomor = $this->input->post('nomor');
            $jenis = $this->input->post('jenis');
            $singkatan = $this->input->post('singkatan');
            $tempat = $this->input->post('tempat');
            $tahun = $this->input->post('tahun');
            $tgl = $this->input->post('tgl');
            $sumber = $this->input->post('sumber');
            $subjek = $this->input->post('subjek');
            $status = $this->input->post('status');
            $ket = $this->input->post('ket');
            $bahasa = $this->input->post('bahasa');
            $lokasi = $this->input->post('lokasi');
            $bidang = $this->input->post('bidang');
            $lampiran = $this->input->post('lampiran');
            $abstrak = $this->input->post('abstrak');
            $berlaku = $this->input->post('berlaku');
            $akses = $this->input->post('akses');
            $panggil = $this->input->post('panggil');
            $penerbit = $this->input->post('penerbit');
            $deskripsi = $this->input->post('deskripsi');
            $isbn =  $this->input->post('isbn');
            $buku = $this->input->post('buku');
            $url = $this->input->post('url');

            $namafolder = 'upload_lampiran';

            $path_direktori = $this->db->get_where('tb_path', ['kode_path' => 4])->row_array();
            $path_is = $this->db->get_where('tb_path', ['kode_path' => 2])->row_array();
            $path_mk = $this->db->get_where('tb_path', ['kode_path' => 3])->row_array();


            // $config['upload_path']          = '../upload_lampiran/';
            // $config['allowed_types']        = 'pdf';
            // $config['file_name']            = $berkas;
            // $dd = $this->load->library('upload', $config);

            // $nama = url_title($judul, '-', true);
            // var_dump($nama);
            // die;

            $config['upload_path']          = 'upload_lampiran/';
            $config['allowed_types']        = 'pdf';
            //$config['file_name']            = $berkas;
            $config['remove_spaces']            = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran')) {
                $namalampiran = $this->upload->data('file_name');
                $jenis_ambil = $this->db->get_where('tbl_jns_peraturan', ['id_jns' => $jenis])->row_array();
                $input = [
                    'tipe_dokumen'      => $tipe,
                    'judul'             => $judul,
                    'pengarang'         => $teu,
                    'nomor'             => $nomor,
                    'jenis_peraturan'   => $jenis_ambil['jns_peraturan'],
                    'singkatan'         => $singkatan,
                    'tmpt_penetapan'    => $tempat,
                    'tahun_peraturan'   => $tahun,
                    'tgl_peraturan'     => $tgl,
                    'sumber'            => $sumber,
                    'subjek'            => $subjek,
                    'status'            => $status,
                    'ket_status'        => $ket,
                    'bahasa'            => $bahasa,
                    'lokasi'            => $lokasi,
                    'bidang_hukum'      => $bidang,
                    'lampiran'          => $namalampiran,
                    'ket'               => $akses,
                    'berlaku'           => $berlaku,
                    'tgl_pembuatan'     => date("Y-m-d"),
                    'id_jns'            => $jenis
                ];
                $this->db->set($input);
                $this->db->insert('tbl_peraturan');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Tambah Produk Hukum
                        </div>');
                redirect('peraturan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Gagal Tambah Produk Hukum
                        </div>');
                redirect('peraturan');
            }
        } else {
            redirect('auth/logout');
        }
    }
    public function updatelampiran()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['kode_role'] == '1') {
            $kode = $this->input->post('kode');
            $file = $this->input->post('file');
            $namafolder = 'upload_lampiran';

            $path_direktori = $this->db->get_where('tb_path', ['kode_path' => 4])->row_array();
            $path_is = $this->db->get_where('tb_path', ['kode_path' => 2])->row_array();
            $path_mk = $this->db->get_where('tb_path', ['kode_path' => 3])->row_array();

            $ambil = $this->db->get_where('tbl_peraturan', ['id_peraturan' => $kode])->row_array();

            $config['upload_path']          = 'upload_lampiran/';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $ambil['lampiran'];
            $config['overwrite']            = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Update Lampiran
                        </div>');
                redirect('peraturan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Gagal Update Lampiran
                        </div>');
                redirect('peraturan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Hanya Admin yang bisa Update Lampiran
          </div>');
            redirect('peraturan');
        }
    }

    public function hapus()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else if ($data['user']['kode_role'] == '1') {
            if ($data['user']['kode_role'] == '1') {
                $kode = $this->input->post('kode');
                $file = $this->db->get_where('tbl_peraturan', ['id_peraturan' => $kode])->row_array();
                $path = 'upload_lampiran/' . $file['lampiran'];
                chmod($path, 0777);
                $hapus = unlink($path);
                if ($hapus) {
                    $this->db->where(['id_peraturan' => $kode], 'tbl_peraturan');
                    $this->db->delete('tbl_peraturan');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
                    redirect('peraturan');
                } else {
                    $this->db->where(['id_peraturan' => $kode], 'tbl_peraturan');
                    $this->db->delete('tbl_peraturan');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Data Gagal Di Hapus
                      </div>');
                    redirect('peraturan');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Hanya Admin yang bisa menghapus
                      </div>');
                redirect('peraturan');
            }
        }
    }
}
