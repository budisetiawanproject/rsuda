<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Berita extends CI_Controller
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
            $data['session'] = $this->session->userdata('role');
            $data['peraturan'] = $this->db->get('tbl_peraturan')->result_array();

            $data['tipe'] = $this->db->get('tbl_tipe_dokumen')->result_array();
            $data['jenis'] = $this->db->get('tbl_jns_peraturan')->result_array();
            $data['singkatan'] = $this->db->get('tbl_singkatan')->result_array();
            $data['status'] = $this->db->get('tbl_status')->result_array();
            $data['bidang'] = $this->db->get('tbl_bidang_hukum')->result_array();

            $data['berita'] = $this->db->get('tbl_berita')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('berita/berita');
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $judul = $this->input->post('judul');
            $file = $this->input->post('file');
            $isi = $this->input->post('isi');

            $config['upload_path']          = 'upload_berita/';
            $config['allowed_types']        = 'png||jpg||jpeg';
            $config['encrypt_name']         = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $nama = $this->upload->data("file_name");
                $input = [
                    'judul_berita'          => $judul,
                    'isi_berita'            => $isi,
                    'gambar_berita'         => $nama,
                    'tgl_berita'            => date("Y-m-d"),
                    'lihat'                 => '0',
                    'slug'                  => url_title($judul)
                ];
                $this->db->set($input);
                $this->db->insert('tbl_berita');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Berhasil Tambah Berita
                            </div>');
                redirect('berita');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Gagal Upload dan Membuat berita
                            </div>');
                redirect('berita');
            }
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
                $img = $this->input->post('img');
                $hapus = unlink('upload_berita/'.$img);
                if ($hapus) {
                    $this->db->where(['id_berita' => $kode], 'tbl_berita');
                    $this->db->delete('tbl_berita');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus
                      </div>');
                    redirect('berita');
                } else {
                    $this->db->where(['id_berita' => $kode], 'tbl_berita');
                    $this->db->delete('tbl_berita');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Data Berhasil Di Hapus
                      </div>');
                    redirect('berita');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Hanya Admin yang bisa menghapus
                      </div>');
                redirect('berita');
            }
        }
    }
}
