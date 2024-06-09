<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
error_reporting(0);
class Usulproduk extends CI_Controller
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
            if ($data['session'] == '1' || $data['session'] == '5') {
                $data['usul'] = $this->db->get('v_pengajuan')->result_array();
                $data['terkirim'] = $this->db->get_where('v_pengajuan', ['status' => 'Terkirim'])->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('usulproduk/index');
                $this->load->view('templates/footer');
            }
            if ($data['session'] == '2') {
                $data['usul'] = $this->db->get_where('v_pengajuan', ['to_op' => '2', 'status' => 'Proses'])->result_array();
                $data['usulproduk'] = $this->db->get_where('v_pengajuan')->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('usulproduk/index');
                $this->load->view('templates/footer');
            } else if ($data['session'] == '6') {
                $data['usul'] = $this->db->get_where('v_pengajuan', ['unit_kerja' => $data['user']['skpd']])->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('usulproduk/index');
                $this->load->view('templates/footer');
            } else if ($data['session'] == '4') {
                $data['usul'] = $this->db->get_where('v_pengajuan', ['kode_op' => $data['dec']])->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();
                //$data['usulcetak'] = $this->db->get_where('v_pengajuan', ['status' => 'Selesai'])->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('usulproduk/index');
                $this->load->view('templates/footer');
            } else if ($data['session'] == '3') {
                $data['usul'] = $this->db->get_where('v_pengajuan', ['status' => 'Disposisi'])->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('usulproduk/index');
                $this->load->view('templates/footer');
            } else if ($data['session'] == '7') {
                $data['usul'] = $this->db->get_where('v_pengajuan', ['to_op' => '7'])->result_array();
                $data['jns'] = $this->db->get('tbl_jns_peraturan')->result_array();

                $this->load->view('templates/head');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('usulproduk/index');
                $this->load->view('templates/footer');
            }
        }
    }


    public function tambahold()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('kode');
            $pd = $this->input->post('pd');
            $no = $this->input->post('no');
            $tgl = $this->input->post('tgl');
            $jns = $this->input->post('jns');
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');

            $t = date('Ymd');
            $w = date('His');
            $kodeid = $t . $w;


            // if (empty($_FILES['L1'])) {
            //     echo 'lampiran kosong';
            // } else {
            //     echo 'lampiran ada';
            // }

            $user = $this->db->get_where('v_user', ['user_id' => $kode])->row_array();

            $folder = is_dir('berkas_pengajuan/');
            $sub = is_dir('berkas_pengajuan/' . $pd);
            $sub2 = is_dir('berkas_pengajuan/' . $pd . '/' . $tgl);


            if ($folder) { // cek folder utama
                if ($sub) { // cek folder perangakt daerah
                    if ($sub2) { // cek folder tanggal

                        $lokasi = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';

                        $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                        $config['allowed_types']        = 'pdf';
                        $config['overwrite']            = TRUE;
                        $config['remove_spaces']        = TRUE;
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('up')) {
                            $nama = $this->upload->data("file_name");
                            $input = [
                                'pengajuan_id'      => $kodeid,
                                'kode_user'         => $kode,
                                'nama'              => $user['nama'],
                                'unit_kerja'        => $pd,
                                'no_surat'          => $no,
                                'tgl_surat'         => $tgl,
                                'lam_surat'         => $nama,
                                'jenis_peraturan'   => $jns,
                                'judul_produk'      => $judul,
                                'abstraksi'         => $isi,
                                'status'            => 'Terkirim',
                                'log_file'          => $lokasi,
                                'to_op'             => '5',
                                'created_at'        => date('Y-m-d H:i:s'),
                                'updated_at'        => date('Y-m-d H:i:s')
                            ];
                            $this->db->set($input);
                            $this->db->insert('tbl_pengajuan');

                            //data riwayat
                            $usul = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $kodeid])->row_array();
                            $input = [
                                'pengajuan_id'      => $usul['pengajuan_id'],
                                'rec_user_id'       => $user['user_id'],
                                'rec_user_nama'     => $user['nama'],
                                'rec_status'        => $usul['status'],
                                'rec_op'            => 'Operator',
                                'rec_tgl'           => date('Y-m-d'),
                                'rec_waktu'         => date('H:i:s')
                            ];
                            $this->db->set($input);
                            $this->db->insert('tbl_riwayat_pengajuan');

                            //upload lampiran
                            $cek = $this->db->get_where('tbl_pengajuan', ['no_surat' => $no])->row_array();
                            if ($cek) {
                                if (empty($_FILES['L1'])) {
                                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                    Berhasil Mengajukan Produk Hukum
                                    </div>');
                                    redirect('usulproduk');
                                } else {
                                    $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                                    $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                                    $config['overwrite']            = TRUE;
                                    $config['remove_spaces']        = TRUE;
                                    $this->load->library('upload', $config);
                                    if ($this->upload->do_upload('L1')) {
                                        $id = $cek['pengajuan_id'];
                                        $L1 = $this->upload->data("file_name");

                                        $update = [
                                            'lam_1'       => $L1
                                        ];
                                        $this->db->set($update);
                                        $this->db->where(['pengajuan_id' => $id], 'tbl_pengajuan');
                                        $this->db->update('tbl_pengajuan');

                                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                        Berhasil Mengajukan Produk Hukum
                                        </div>');
                                        redirect('usulproduk');
                                    } else {
                                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                        Gagal Upload Lampiran
                                        </div>');
                                        redirect('usulproduk');
                                    }
                                }
                            }
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Gagal Mengajukan Produk Hukum, File Surat Harus pdf
                            </div>');
                            redirect('usulproduk');
                        }
                    } else { // jika tidak ada folder tanggal (sub2)
                        $buat = mkdir('berkas_pengajuan/' . $pd . '/' . $tgl);
                        if ($buat) { // buat folder tanggal

                            $lokasi = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';

                            $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                            $config['allowed_types']        = 'pdf';
                            $config['overwrite']            = TRUE;
                            $config['remove_spaces']        = TRUE;
                            $this->load->library('upload', $config);
                            if ($this->upload->do_upload('up')) {
                                $nama = $this->upload->data("file_name");
                                $input = [
                                    'pengajuan_id'      => $kodeid,
                                    'kode_user'         => $kode,
                                    'nama'              => $user['nama'],
                                    'unit_kerja'        => $pd,
                                    'no_surat'          => $no,
                                    'tgl_surat'         => $tgl,
                                    'lam_surat'         => $nama,
                                    'jenis_peraturan'   => $jns,
                                    'judul_produk'      => $judul,
                                    'abstraksi'         => $isi,
                                    'status'            => 'Terkirim',
                                    'log_file'          => $lokasi,
                                    'to_op'             => '5',
                                    'created_at'        => date('Y-m-d H:i:s'),
                                    'updated_at'        => date('Y-m-d H:i:s')
                                ];
                                $this->db->set($input);
                                $this->db->insert('tbl_pengajuan');

                                //data riwayat
                                $usul = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $kodeid])->row_array();
                                $input = [
                                    'pengajuan_id'      => $usul['pengajuan_id'],
                                    'rec_user_id'       => $user['user_id'],
                                    'rec_user_nama'     => $user['nama'],
                                    'rec_status'        => $usul['status'],
                                    'rec_op'            => 'Operator',
                                    'rec_tgl'           => date('Y-m-d'),
                                    'rec_waktu'         => date('H:i:s')
                                ];
                                $this->db->set($input);
                                $this->db->insert('tbl_riwayat_pengajuan');

                                //upload lampiran
                                $cek = $this->db->get_where('tbl_pengajuan', ['no_surat' => $no])->row_array();
                                if ($cek) {
                                    if (empty($_FILES['L1'])) {
                                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                    Berhasil Mengajukan Produk Hukum
                                    </div>');
                                        redirect('usulproduk');
                                    } else {
                                        $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                                        $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                                        $config['overwrite']            = TRUE;
                                        $config['remove_spaces']        = TRUE;
                                        $this->load->library('upload', $config);
                                        if ($this->upload->do_upload('L1')) {
                                            $id = $cek['pengajuan_id'];
                                            $L1 = $this->upload->data("file_name");

                                            $update = [
                                                'lam_1'       => $L1
                                            ];
                                            $this->db->set($update);
                                            $this->db->where(['pengajuan_id' => $id], 'tbl_pengajuan');
                                            $this->db->update('tbl_pengajuan');

                                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                        Berhasil Mengajukan Produk Hukum
                                        </div>');
                                            redirect('usulproduk');
                                        } else {
                                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                        Gagal Upload Lampiran
                                        </div>');
                                            redirect('usulproduk');
                                        }
                                    }
                                }
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                Gagal Mengajukan Produk Hukum, File Surat Harus pdf
                            </div>');
                                redirect('usulproduk');
                            }
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Tidak Ada Folder Silahkan Hubungi Admin
                                    </div>');
                            redirect('usulproduk');
                        }
                    }
                } else { // jika tidak ada folder PD
                    $buat = mkdir('berkas_pengajuan/' . $pd);
                    if ($buat) { //buat folder PD
                        if ($sub2) { // cek folder tanggal

                            $lokasi = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';

                            $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                            $config['allowed_types']        = 'pdf';
                            $config['overwrite']            = TRUE;
                            $config['remove_spaces']        = TRUE;
                            $this->load->library('upload', $config);
                            if ($this->upload->do_upload('up')) {
                                $nama = $this->upload->data("file_name");
                                $input = [
                                    'pengajuan_id'      => $kodeid,
                                    'kode_user'         => $kode,
                                    'nama'              => $user['nama'],
                                    'unit_kerja'        => $pd,
                                    'no_surat'          => $no,
                                    'tgl_surat'         => $tgl,
                                    'lam_surat'         => $nama,
                                    'jenis_peraturan'   => $jns,
                                    'judul_produk'      => $judul,
                                    'abstraksi'         => $isi,
                                    'status'            => 'Terkirim',
                                    'log_file'          => $lokasi,
                                    'to_op'             => '5',
                                    'created_at'        => date('Y-m-d H:i:s'),
                                    'updated_at'        => date('Y-m-d H:i:s')
                                ];
                                $this->db->set($input);
                                $this->db->insert('tbl_pengajuan');

                                //data riwayat
                                $usul = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $kodeid,])->row_array();
                                $input = [
                                    'pengajuan_id'      => $usul['pengajuan_id'],
                                    'rec_user_id'       => $user['user_id'],
                                    'rec_user_nama'     => $user['nama'],
                                    'rec_status'        => $usul['status'],
                                    'rec_op'            => 'Operator',
                                    'rec_tgl'           => date('Y-m-d'),
                                    'rec_waktu'         => date('H:i:s')
                                ];
                                $this->db->set($input);
                                $this->db->insert('tbl_riwayat_pengajuan');

                                //upload lampiran
                                $cek = $this->db->get_where('tbl_pengajuan', ['no_surat' => $no])->row_array();
                                if ($cek) {
                                    if (empty($_FILES['L1'])) {
                                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                        Berhasil Mengajukan Produk Hukum
                                        </div>');
                                        redirect('usulproduk');
                                    } else {
                                        $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                                        $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                                        $config['overwrite']            = TRUE;
                                        $config['remove_spaces']        = TRUE;
                                        $this->load->library('upload', $config);
                                        if ($this->upload->do_upload('L1')) {
                                            $id = $cek['pengajuan_id'];
                                            $L1 = $this->upload->data("file_name");

                                            $update = [
                                                'lam_1'       => $L1
                                            ];
                                            $this->db->set($update);
                                            $this->db->where(['pengajuan_id' => $id], 'tbl_pengajuan');
                                            $this->db->update('tbl_pengajuan');

                                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Berhasil Mengajukan Produk Hukum
                                            </div>');
                                            redirect('usulproduk');
                                        } else {
                                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                        Gagal Upload Lampiran
                                        </div>');
                                            redirect('usulproduk');
                                        }
                                    }
                                }
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                Gagal Mengajukan Produk Hukum, File Surat Harus pdf
                                </div>');
                                redirect('usulproduk');
                            }
                        } else { // jika tidak ada folder tanggal (sub2)
                            $buat = mkdir('berkas_pengajuan/' . $pd . '/' . $tgl);
                            if ($buat) { // buat folder tanggal

                                $lokasi = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';

                                $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                                $config['allowed_types']        = 'pdf';
                                $config['overwrite']            = TRUE;
                                $config['remove_spaces']        = TRUE;
                                $this->load->library('upload', $config);
                                if ($this->upload->do_upload('up')) {
                                    $nama = $this->upload->data("file_name");
                                    $input = [
                                        'pengajuan_id'      => $kodeid,
                                        'kode_user'         => $kode,
                                        'nama'              => $user['nama'],
                                        'unit_kerja'        => $pd,
                                        'no_surat'          => $no,
                                        'tgl_surat'         => $tgl,
                                        'lam_surat'         => $nama,
                                        'jenis_peraturan'   => $jns,
                                        'judul_produk'      => $judul,
                                        'abstraksi'         => $isi,
                                        'status'            => 'Terkirim',
                                        'log_file'          => $lokasi,
                                        'to_op'             => '5',
                                        'created_at'        => date('Y-m-d H:i:s'),
                                        'updated_at'        => date('Y-m-d H:i:s')
                                    ];
                                    $this->db->set($input);
                                    $this->db->insert('tbl_pengajuan');

                                    //data riwayat
                                    $usul = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $kodeid,])->row_array();
                                    $input = [
                                        'pengajuan_id'      => $usul['pengajuan_id'],
                                        'rec_user_id'       => $user['user_id'],
                                        'rec_user_nama'     => $user['nama'],
                                        'rec_status'        => $usul['status'],
                                        'rec_op'            => 'Operator',
                                        'rec_tgl'           => date('Y-m-d'),
                                        'rec_waktu'         => date('H:i:s')
                                    ];
                                    $this->db->set($input);
                                    $this->db->insert('tbl_riwayat_pengajuan');

                                    //upload lampiran
                                    $cek = $this->db->get_where('tbl_pengajuan', ['no_surat' => $no])->row_array();
                                    if ($cek) {
                                        if (empty($_FILES['L1'])) {
                                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                        Berhasil Mengajukan Produk Hukum
                                        </div>');
                                            redirect('usulproduk');
                                        } else {
                                            $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                                            $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                                            $config['overwrite']            = TRUE;
                                            $config['remove_spaces']        = TRUE;
                                            $this->load->library('upload', $config);
                                            if ($this->upload->do_upload('L1')) {
                                                $id = $cek['pengajuan_id'];
                                                $L1 = $this->upload->data("file_name");

                                                $update = [
                                                    'lam_1'       => $L1
                                                ];
                                                $this->db->set($update);
                                                $this->db->where(['pengajuan_id' => $id], 'tbl_pengajuan');
                                                $this->db->update('tbl_pengajuan');

                                                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Berhasil Mengajukan Produk Hukum
                                            </div>');
                                                redirect('usulproduk');
                                            } else {
                                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                            Gagal Upload Lampiran
                                            </div>');
                                                redirect('usulproduk');
                                            }
                                        }
                                    }
                                } else {
                                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Gagal Mengajukan Produk Hukum, File Surat Harus pdf
                                </div>');
                                    redirect('usulproduk');
                                }
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                        Tidak Ada Folder Silahkan Hubungi Admin
                                        </div>');
                                redirect('usulproduk');
                            }
                        }
                    } else { //jika gagal buat Folder
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Tidak Ada Folder Silahkan Hubungi Admin
                                    </div>');
                        redirect('usulproduk');
                    }
                }
            } else { // jika tidak ada folder
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Tidak Ada Folder Silahkan Hubungi Admin
                                    </div>');
                redirect('usulproduk');
            }
        }
    }

    public function uploadlampiran()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->helper('download');
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('kode');
            $id = $this->input->post('id');
            $ambil = $this->db->get_where('v_pengajuan', ['pengajuan_id' => $kode])->row_array();
            if ($ambil['lam_1'] == '') {
                $config['upload_path']          = $ambil['log_file'];
                $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                $config['overwrite']            = TRUE;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $id = $cek['pengajuan_id'];
                    $L1 = $this->upload->data("file_name");

                    $update = [
                        'lam_1'       => $L1
                    ];
                    $this->db->set($update);
                    $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                    $this->db->update('tbl_pengajuan');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Gagal Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                }
            } else if ($ambil['lam_2'] == '') {
                $config['upload_path']          = $ambil['log_file'];
                $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                $config['overwrite']            = TRUE;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $id = $cek['pengajuan_id'];
                    $L1 = $this->upload->data("file_name");

                    $update = [
                        'lam_2'       => $L1
                    ];
                    $this->db->set($update);
                    $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                    $this->db->update('tbl_pengajuan');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Gagal Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                }
            } else if ($ambil['lam_3'] == '') {
                $config['upload_path']          = $ambil['log_file'];
                $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                $config['overwrite']            = TRUE;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $id = $cek['pengajuan_id'];
                    $L1 = $this->upload->data("file_name");

                    $update = [
                        'lam_3'       => $L1
                    ];
                    $this->db->set($update);
                    $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                    $this->db->update('tbl_pengajuan');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Gagal Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                }
            } else if ($ambil['lam_4'] == '') {
                $config['upload_path']          = $ambil['log_file'];
                $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                $config['overwrite']            = TRUE;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $id = $cek['pengajuan_id'];
                    $L1 = $this->upload->data("file_name");

                    $update = [
                        'lam_4'       => $L1
                    ];
                    $this->db->set($update);
                    $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                    $this->db->update('tbl_pengajuan');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Gagal Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                }
            } else if ($ambil['lam_5'] == '') {
                $config['upload_path']          = $ambil['log_file'];
                $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                $config['overwrite']            = TRUE;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $id = $cek['pengajuan_id'];
                    $L1 = $this->upload->data("file_name");

                    $update = [
                        'lam_5'       => $L1
                    ];
                    $this->db->set($update);
                    $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                    $this->db->update('tbl_pengajuan');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Gagal Upload Lampiran
                    </div>');
                    redirect('usulproduk');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Maaf File Lampiran maksimal 5 file
                    </div>');
                redirect('usulproduk');
            }
        }
    }



    public function download()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        $this->load->helper('download');
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('kode');
            $ambil = $this->db->get_where('v_pengajuan', ['pengajuan_id' => $kode])->row_array();
            force_download($ambil['log_file'] . $ambil['file_selesai'], NULL);
            redirect('usulproduk');
        }
    }

    public function rubahdata()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('kode');
            $no = $this->input->post('no');
            $tgl = $this->input->post('tgl');
            $jns = $this->input->post('jns');
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            $update = [
                'no_surat'          => $no,
                'tgl_surat'         => $tgl,
                'jenis_peraturan'   => $jns,
                'judul_produk'      => $judul,
                'abstraksi'         => $isi,
            ];
            $this->db->set($update);
            $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
            $this->db->update('tbl_pengajuan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Rubah Data
                    </div>');
            redirect('usulproduk');
        }
    }

    public function updatesurat()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('kode');
            $ambil = $this->db->get_where('v_pengajuan', ['pengajuan_id' => $kode])->row_array();


            $config['upload_path']          = $ambil['log_file'];
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['remove_spaces']        = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $lamsurat = $this->upload->data("file_name");
                $update = [
                    'lam_surat'       => $lamsurat
                ];
                $this->db->set($update);
                $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
                $this->db->update('tbl_pengajuan');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil Upload Surat
                    </div>');
                redirect('usulproduk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Gagal Upload Surat
                    </div>');
                redirect('usulproduk');
            }
        }
    }

    public function hapus()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('kode');
            $this->db->where(['pengajuan_id' => $kode], 'tbl_pengajuan');
            $this->db->delete('tbl_pengajuan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Berhasil Dihapus
                    </div>');
            redirect('usulproduk');
        }
    }



    public function tambah()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('user')])->row_array();
        if ($data['user']['username'] == '') {
            redirect('auth/logout');
        } else {
            $kode = $this->input->post('kode');
            $pd = $this->input->post('pd');
            $no = $this->input->post('no');
            $tgl = $this->input->post('tgl');
            $jns = $this->input->post('jns');
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');

            $t = date('Ymd');
            $w = date('His');
            $kodeid = $t . $w;


            // if (empty($_FILES['L1'])) {
            //     echo 'lampiran kosong';
            // } else {
            //     echo 'lampiran ada';
            // }

            $user = $this->db->get_where('v_user', ['user_id' => $kode])->row_array();

            $folder = is_dir('berkas_pengajuan/');
            $sub = is_dir('berkas_pengajuan/' . $pd);
            $sub2 = is_dir('berkas_pengajuan/' . $pd . '/' . $tgl);


            if ($folder) { // cek folder utama
                if ($sub) { // cek folder perangakt daerah
                    if ($sub2) { // cek folder tanggal

                        $lokasi = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';

                        $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                        $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                        $config['overwrite']            = TRUE;
                        $config['remove_spaces']        = TRUE;
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('up')) {
                            $surat = $this->upload->data("file_name");
                            if ($this->upload->do_upload('lam')) {
                                $lampiran = $this->upload->data("file_name");
                                $input = [
                                    'pengajuan_id'      => $kodeid,
                                    'kode_user'         => $kode,
                                    'nama'              => $user['nama'],
                                    'unit_kerja'        => $pd,
                                    'no_surat'          => $no,
                                    'tgl_surat'         => $tgl,
                                    'lam_surat'         => $surat,
                                    'jenis_peraturan'   => $jns,
                                    'judul_produk'      => $judul,
                                    'abstraksi'         => $isi,
                                    'lam_1'             => $lampiran,
                                    'status'            => 'Terkirim',
                                    'log_file'          => $lokasi,
                                    'to_op'             => '5',
                                    'created_at'        => date('Y-m-d H:i:s'),
                                    'updated_at'        => date('Y-m-d H:i:s')
                                ];
                                $this->db->set($input);
                                $this->db->insert('tbl_pengajuan');

                                //data riwayat
                                $usul = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $kodeid])->row_array();
                                $input = [
                                    'pengajuan_id'      => $usul['pengajuan_id'],
                                    'rec_user_id'       => $user['user_id'],
                                    'rec_user_nama'     => $user['nama'],
                                    'rec_status'        => $usul['status'],
                                    'rec_op'            => 'Operator',
                                    'rec_tgl'           => date('Y-m-d'),
                                    'rec_waktu'         => date('H:i:s')
                                ];
                                $this->db->set($input);
                                $this->db->insert('tbl_riwayat_pengajuan');

                                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                    Berhasil Mengajukan Produk Hukum
                                    </div>');
                                redirect('usulproduk');
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                Gagal Upload Lampiran
                                </div>');
                                redirect('usulproduk');
                            }
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Gagal Upload Surat Pengantar
                                </div>');
                            redirect('usulproduk');
                        }
                    } else { // jika tidak ada folder tanggal (sub2)
                        $buat = mkdir('berkas_pengajuan/' . $pd . '/' . $tgl);
                        if ($buat) { // buat folder tanggal

                            $lokasi = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';

                            $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                            $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                            $config['overwrite']            = TRUE;
                            $config['remove_spaces']        = TRUE;
                            $this->load->library('upload', $config);
                            if ($this->upload->do_upload('up')) {
                                $surat = $this->upload->data("file_name");
                                if ($this->upload->do_upload('lam')) {
                                    $lampiran = $this->upload->data("file_name");
                                    $input = [
                                        'pengajuan_id'      => $kodeid,
                                        'kode_user'         => $kode,
                                        'nama'              => $user['nama'],
                                        'unit_kerja'        => $pd,
                                        'no_surat'          => $no,
                                        'tgl_surat'         => $tgl,
                                        'lam_surat'         => $surat,
                                        'jenis_peraturan'   => $jns,
                                        'judul_produk'      => $judul,
                                        'abstraksi'         => $isi,
                                        'lam_1'             => $lampiran,
                                        'status'            => 'Terkirim',
                                        'log_file'          => $lokasi,
                                        'to_op'             => '5',
                                        'created_at'        => date('Y-m-d H:i:s'),
                                        'updated_at'        => date('Y-m-d H:i:s')
                                    ];
                                    $this->db->set($input);
                                    $this->db->insert('tbl_pengajuan');

                                    //data riwayat
                                    $usul = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $kodeid])->row_array();
                                    $input = [
                                        'pengajuan_id'      => $usul['pengajuan_id'],
                                        'rec_user_id'       => $user['user_id'],
                                        'rec_user_nama'     => $user['nama'],
                                        'rec_status'        => $usul['status'],
                                        'rec_op'            => 'Operator',
                                        'rec_tgl'           => date('Y-m-d'),
                                        'rec_waktu'         => date('H:i:s')
                                    ];
                                    $this->db->set($input);
                                    $this->db->insert('tbl_riwayat_pengajuan');

                                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                        Berhasil Mengajukan Produk Hukum
                                        </div>');
                                    redirect('usulproduk');
                                } else {
                                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Gagal Upload Lampiran
                                    </div>');
                                    redirect('usulproduk');
                                }
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                Gagal Upload Surat Pengantar
                                    </div>');
                                redirect('usulproduk');
                            }
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Tidak Ada Folder Silahkan Hubungi Admin
                                    </div>');
                            redirect('usulproduk');
                        }
                    }
                } else { // jika tidak ada folder PD
                    $buat = mkdir('berkas_pengajuan/' . $pd);
                    if ($buat) { //buat folder PD
                        if ($sub2) { // cek folder tanggal

                            $lokasi = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';

                            $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                            $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                            $config['overwrite']            = TRUE;
                            $config['remove_spaces']        = TRUE;
                            $this->load->library('upload', $config);
                            if ($this->upload->do_upload('up')) {
                                $surat = $this->upload->data("file_name");
                                if ($this->upload->do_upload('lam')) {
                                    $lampiran = $this->upload->data("file_name");
                                    $input = [
                                        'pengajuan_id'      => $kodeid,
                                        'kode_user'         => $kode,
                                        'nama'              => $user['nama'],
                                        'unit_kerja'        => $pd,
                                        'no_surat'          => $no,
                                        'tgl_surat'         => $tgl,
                                        'lam_surat'         => $surat,
                                        'jenis_peraturan'   => $jns,
                                        'judul_produk'      => $judul,
                                        'abstraksi'         => $isi,
                                        'lam_1'             => $lampiran,
                                        'status'            => 'Terkirim',
                                        'log_file'          => $lokasi,
                                        'to_op'             => '5',
                                        'created_at'        => date('Y-m-d H:i:s'),
                                        'updated_at'        => date('Y-m-d H:i:s')
                                    ];
                                    $this->db->set($input);
                                    $this->db->insert('tbl_pengajuan');

                                    //data riwayat
                                    $usul = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $kodeid])->row_array();
                                    $input = [
                                        'pengajuan_id'      => $usul['pengajuan_id'],
                                        'rec_user_id'       => $user['user_id'],
                                        'rec_user_nama'     => $user['nama'],
                                        'rec_status'        => $usul['status'],
                                        'rec_op'            => 'Operator',
                                        'rec_tgl'           => date('Y-m-d'),
                                        'rec_waktu'         => date('H:i:s')
                                    ];
                                    $this->db->set($input);
                                    $this->db->insert('tbl_riwayat_pengajuan');

                                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                        Berhasil Mengajukan Produk Hukum
                                        </div>');
                                    redirect('usulproduk');
                                } else {
                                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Gagal Upload Lampiran
                                    </div>');
                                    redirect('usulproduk');
                                }
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                Gagal Upload Surat Pengantar
                                    </div>');
                                redirect('usulproduk');
                            }
                        } else { // jika tidak ada folder tanggal (sub2)
                            $buat = mkdir('berkas_pengajuan/' . $pd . '/' . $tgl);
                            if ($buat) { // buat folder tanggal

                                $lokasi = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';

                                $config['upload_path']          = 'berkas_pengajuan/' . $pd . '/' . $tgl . '/';
                                $config['allowed_types']        = 'pdf||doc||docx||xlsx||xls';
                                $config['overwrite']            = TRUE;
                                $config['remove_spaces']        = TRUE;
                                $this->load->library('upload', $config);
                                if ($this->upload->do_upload('up')) {
                                    $surat = $this->upload->data("file_name");
                                    if ($this->upload->do_upload('lam')) {
                                        $lampiran = $this->upload->data("file_name");
                                        $input = [
                                            'pengajuan_id'      => $kodeid,
                                            'kode_user'         => $kode,
                                            'nama'              => $user['nama'],
                                            'unit_kerja'        => $pd,
                                            'no_surat'          => $no,
                                            'tgl_surat'         => $tgl,
                                            'lam_surat'         => $surat,
                                            'jenis_peraturan'   => $jns,
                                            'judul_produk'      => $judul,
                                            'abstraksi'         => $isi,
                                            'lam_1'             => $lampiran,
                                            'status'            => 'Terkirim',
                                            'log_file'          => $lokasi,
                                            'to_op'             => '5',
                                            'created_at'        => date('Y-m-d H:i:s'),
                                            'updated_at'        => date('Y-m-d H:i:s')
                                        ];
                                        $this->db->set($input);
                                        $this->db->insert('tbl_pengajuan');

                                        //data riwayat
                                        $usul = $this->db->get_where('tbl_pengajuan', ['pengajuan_id' => $kodeid])->row_array();
                                        $input = [
                                            'pengajuan_id'      => $usul['pengajuan_id'],
                                            'rec_user_id'       => $user['user_id'],
                                            'rec_user_nama'     => $user['nama'],
                                            'rec_status'        => $usul['status'],
                                            'rec_op'            => 'Operator',
                                            'rec_tgl'           => date('Y-m-d'),
                                            'rec_waktu'         => date('H:i:s')
                                        ];
                                        $this->db->set($input);
                                        $this->db->insert('tbl_riwayat_pengajuan');

                                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Berhasil Mengajukan Produk Hukum
                                            </div>');
                                        redirect('usulproduk');
                                    } else {
                                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                        Gagal Upload Lampiran
                                        </div>');
                                        redirect('usulproduk');
                                    }
                                } else {
                                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Gagal Upload Surat Pengantar
                                        </div>');
                                    redirect('usulproduk');
                                }
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                        Tidak Ada Folder Silahkan Hubungi Admin
                                        </div>');
                                redirect('usulproduk');
                            }
                        }
                    } else { //jika gagal buat Folder
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Tidak Ada Folder Silahkan Hubungi Admin
                                    </div>');
                        redirect('usulproduk');
                    }
                }
            } else { // jika tidak ada folder
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Tidak Ada Folder Silahkan Hubungi Admin
                                    </div>');
                redirect('usulproduk');
            }
        }
    }
}
