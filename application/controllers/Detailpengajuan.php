<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Detailpengajuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('secure');
    }
    public function detail()
    {

        $data['code'] = $this->session->userdata('actid');
        $data['dec'] = $this->secure->decrypt_url($data['code']);
        $data['user'] = $this->db->get_where('v_user', ['user_id' => $data['dec']])->row_array();
        //$data['tgl'] = date('Y-m-d H:i:s');
        if (empty($data['user'])) {
            redirect('auth/logout');
        } else {
            $url = $this->uri->segment(3);
            $ambil = $this->secure->decrypt_url($url);
            $cek = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $ambil])->row_array();
            $data['session'] = $this->session->userdata('role');
            if ($cek) {
                $data['pg'] = $this->db->get_where('v_pengajuan', ['pengajuan_id' => $ambil])->row_array();
                $data['peg'] = $this->db->get_where('tbl_user', ['log_code' => '29'])->result_array();
                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('detailpengajuan/index');
                $this->load->view('templates/footer');
            } else {
                redirect('dashboard');
            }
        }
    }

    public function proses()
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
            $namarole = $this->input->post('namarole');

            $cekrole = $this->db->get_where('v_user', ['kode_role' => $role])->row_array();
            if ($cekrole) {
                //data ada
                $update = [
                    'status'          => 'Proses',
                    'to_op'          => $role,
                    'updated_at'     => date('Y-m-d H:i:s')
                ];
                $this->db->set($update);
                $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                $this->db->update('tbl_pengajuan');

                
                $input = [
                    'pengajuan_id'      => $kode,
                    'rec_user_id'       => $id,
                    'rec_user_nama'     => $nama,
                    'rec_status'        => 'Proses',
                    'rec_pesan'         => 'Kepada',
                    'rec_op'            => $namarole,
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
                            Jabatan Tidak Ada
                            </div>');
                redirect('usulproduk');
            }
        }
    }


    public function disposisikabag()
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
            $namarole = $this->input->post('namarole');
            //$disposisi = $this->input->post('pegawai');

            
            //$pegawai = $this->db->get_where('tbl_user', ['user_id' => $disposisi])->row_array();
            $cekrole = $this->db->get_where('v_user', ['kode_role' => $role])->row_array();
            if ($cekrole) {
                //data ada
                $update = [
                    'status'          => 'Disposisi',
                    'to_op'          => $role,
                    //'kode_op'          => $disposisi,
                    'updated_at'     => date('Y-m-d H:i:s')
                ];
                $this->db->set($update);
                $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                $this->db->update('tbl_pengajuan');

                $input = [
                    'pengajuan_id'      => $kode,
                    'rec_user_id'       => $id,
                    'rec_user_nama'     => $nama,
                    'rec_status'        => 'Disposisi',
                    'rec_pesan'         => 'Kepada',
                    'rec_op'            => $namarole,
                    //'rec_op_nama'       => $pegawai['nama'],
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
                            Jabatan Tidak Ada
                            </div>');
                redirect('usulproduk');
            }
        }
    }



    public function disposisi()
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
            $namarole = $this->input->post('namarole');
            $disposisi = $this->input->post('pegawai');

            
            $pegawai = $this->db->get_where('tbl_user', ['user_id' => $disposisi])->row_array();
            $cekrole = $this->db->get_where('v_user', ['kode_role' => $role])->row_array();
            if ($cekrole) {
                //data ada
                $update = [
                    'status'          => 'Disposisi',
                    'to_op'          => $role,
                    'kode_op'          => $disposisi,
                    'updated_at'     => date('Y-m-d H:i:s')
                ];
                $this->db->set($update);
                $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                $this->db->update('tbl_pengajuan');

                $input = [
                    'pengajuan_id'      => $kode,
                    'rec_user_id'       => $id,
                    'rec_user_nama'     => $nama,
                    'rec_status'        => 'Disposisi',
                    'rec_pesan'         => 'Kepada',
                    'rec_op'            => $namarole,
                    'rec_op_nama'       => $pegawai['nama'],
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
                            Jabatan Tidak Ada
                            </div>');
                redirect('usulproduk');
            }
        }
    }

    public function selesai()
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

            $pegawai = $this->db->get_where('tbl_user', ['user_id' => $id])->row_array();
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
                        'file_selesai'  => $nama,
                        'status'        => 'Selesai',
                        'to_op'        => '7',
                        'updated_at'    => date('Y-m-d H:i:s')
                    ];
                    $this->db->set($update);
                    $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                    $this->db->update('tbl_pengajuan');

                    $input = [
                        'pengajuan_id'      => $kode,
                        'rec_user_id'       => $id,
                        'rec_user_nama'     => $pegawai['nama'],
                        'rec_status'        => 'Selesai',
                        'rec_pesan'         => 'Silahkan Cetak Produk dan Paraf Koordinasi',
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
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Jabatan Tidak Ada
                            </div>');
                redirect('usulproduk');
            }
        }
    }
}
