<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Posisiproduk extends CI_Controller
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
        //$data['tgl'] = date('Y-m-d H:i:s');
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else {
            $data['session'] = $this->session->userdata('role');
            if ($data['session'] == '7') {
                $data['usul'] = $this->db->get_where('v_pengajuan', ['to_op' => '7'])->result_array();
                $data['paraf'] = $this->db->get('tbl_paraf')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('posisi_produk/index');
                $this->load->view('templates/footer');
            }
        }
    }

    public function simpan()
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
            $nama = $this->input->post('namauser');
            $role = $this->input->post('role');
            $paraf = $this->input->post('paraf');

            $namarole = $this->db->get_where('tbl_role', ['kode_role' => $role])->row_array();;            
            $cekparaf = $this->db->get_where('tbl_paraf', ['kode_paraf' => $paraf])->row_array();
            $cekrole = $this->db->get_where('v_user', ['kode_role' => $role])->row_array();
            if ($cekrole) {
                if($cekparaf['jabatan']=='Wali Kota Bitung'){
                    //data ada
                $update = [
                    'status'          => 'Tanda Tangan',
                    'kode_paraf'      => $cekparaf['kode_paraf'],
                    'posisi_produk'   => $cekparaf['jabatan'],
                    'to_op'           => $role,
                    'updated_at'      => date('Y-m-d H:i:s')
                ];
                $this->db->set($update);
                $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                $this->db->update('tbl_pengajuan');

                $input = [
                    'pengajuan_id'      => $kode,
                    'rec_user_id'       => $id,
                    'rec_user_nama'     => $nama,
                    'rec_status'        => 'Tanda Tangan',
                    'rec_ket'           => $paraf,
                    'rec_pesan'         => '',
                    'rec_op'            => $cekparaf['jabatan'],
                    'rec_tgl'           => date('Y-m-d'),
                    'rec_waktu'         => date('H:i:s')
                ];
                $this->db->set($input);
                $this->db->insert('tbl_riwayat_pengajuan');


                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil di Proses
                            </div>');
                redirect('posisiproduk');
                } else {
                    //data ada
                $update = [
                    'status'          => 'Paraf',
                    'kode_paraf'      => $cekparaf['kode_paraf'],
                    'posisi_produk'   => $cekparaf['jabatan'],
                    'to_op'           => $role,
                    'updated_at'      => date('Y-m-d H:i:s')
                ];
                $this->db->set($update);
                $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                $this->db->update('tbl_pengajuan');

                $input = [
                    'pengajuan_id'      => $kode,
                    'rec_user_id'       => $id,
                    'rec_user_nama'     => $nama,
                    'rec_status'        => 'Paraf',
                    'rec_ket'           => $paraf,
                    'rec_pesan'         => 'Posisi Berada di ',
                    'rec_op'            => $cekparaf['jabatan'],
                    'rec_tgl'           => date('Y-m-d'),
                    'rec_waktu'         => date('H:i:s')
                ];
                $this->db->set($input);
                $this->db->insert('tbl_riwayat_pengajuan');


                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Berhasil di Proses
                            </div>');
                redirect('posisiproduk');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Jabatan Tidak Ada
                            </div>');
                redirect('posisiproduk');
            }
        }
    }

}