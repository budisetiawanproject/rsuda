<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Wisata extends CI_Controller
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

            $data['slide'] = $this->db->get('tbl_wisata')->result_array();

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('wisata/wisata');
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
            $tempat = $this->input->post('tempat');

            $config['upload_path']          = 'img/upload_destinasi_wisata/';
            $config['allowed_types']        = 'png||jpg||jpeg';
            $config['encrypt_name']         = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $nama = $this->upload->data("file_name");
                $input = [
                    'gambar'         => $nama,
                    'judul'          => $tempat,
                    'keterangan'     => $judul,
                    'tgl'            => date("Y-m-d"),
                    'lihat'           => '0'
                ];
                $this->db->set($input);
                $this->db->insert('tbl_wisata');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Berhasil Tambah Destinasi Wisata
                            </div>');
                redirect('wisata');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Gagal Upload dan Membuat Destinasi Wisata
                            </div>');
                redirect('wisata');
            }
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('kode');
            $satu = $this->input->post('satu');
            $dua = $this->input->post('dua');
            $tiga = $this->input->post('tiga');


            $config['upload_path']          = '../upload_gambar/';
            $config['allowed_types']        = 'png||jpg||jpeg';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $nama = $this->upload->data("file_name");

                $update = array(
                    'judul'         => $satu,
                    'sub_judul'     => $dua,
                    'deskripsi'     => $tiga,
                    'gambar'        => $nama,
                    'tgl'           => date("Y-m-d")
                );
                $this->db->set($update);
                $this->db->where(['id_slide' => $kode], 'tbl_slide');
                $this->db->update('tbl_slide');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil di Update
                          </div>');

                redirect('slide');
            } else {
                $update = array(
                    'judul'         => $satu,
                    'sub_judul'     => $dua,
                    'deskripsi'     => $tiga,
                    'tgl'           => date("Y-m-d")
                );
                $this->db->set($update);
                $this->db->where(['id_slide' => $kode], 'tbl_slide');
                $this->db->update('tbl_slide');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil di Update
                          </div>');

                redirect('slide');
            }
        }
    }
}
