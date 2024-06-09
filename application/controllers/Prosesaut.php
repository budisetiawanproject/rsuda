<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Prosesaut extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
    }
    public function upload()
    {
        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        //$data['tgl'] = date('Y-m-d H:i:s');
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('kode');
            $id = $this->input->post('iduser');
            $namauser = $this->input->post('namauser');
            $role = $this->input->post('role');
            $namarole = $this->input->post('namarole');
            $cekrole = $this->db->get_where('v_user', ['kode_role' => $role])->row_array();
            if ($cekrole) {
                //data ada
                $cek = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $kode])->row_array();
                
                $config['upload_path']          = $cek['log_file'];
                $config['allowed_types']        = 'pdf';
                $config['encrypt_name']         = true;
                $config['overwrite']            = TRUE;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $nama = $this->upload->data("file_name");
                    $update = [
                        'file_ttd_aut'  => $nama,
                        'autentikasi' => '1',
                        'to_op'         => '2',
                        'status'        => 'Terbit',
                        'updated_at'    => date('Y-m-d H:i:s')
                    ];
                    $this->db->set($update);
                    $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                    $this->db->update('tbl_pengajuan');

                    $input = [
                        'pengajuan_id'      => $kode,
                        'rec_user_id'       => $id,
                        'rec_user_nama'     => $namauser,
                        'rec_status'        => 'Terbit',
                        'rec_pesan'         => 'Produk Hukum Terbit',
                        'rec_op'            => '',
                        'rec_tgl'           => date('Y-m-d'),
                        'rec_waktu'         => date('H:i:s')
                    ];
                    $this->db->set($input);
                    $this->db->insert('tbl_riwayat_pengajuan');


                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil di Proses
                            </div>');
                    redirect('usulproduk');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Gagal Upload File, File Harus Pdf
                            </div>');
                    redirect('usulproduk');
                }
            }
        }
    }
}