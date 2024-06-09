<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('secure');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('auth/loginnew');
    }

    public function daftar()
    {
        $this->load->view('auth/daftarnew');
    }

    public function register()
    {
        $username = htmlspecialchars($this->input->post('username'), ENT_QUOTES);
        $usr = $this->db->get_where('t_user', ['us_username' => $username])->row_array();
        if ($usr) {
            $this->session->set_flashdata('message', '<div class="relative p-3 pr-12 text-sm bg-red-500 border border-transparent rounded-md text-red-50">
        <span class="font-bold">Maaf Username Sudah Digunakan</span>
            </div>');
            redirect('auth/daftar');
        } else {
            $data = [
                'us_nama' => htmlspecialchars($this->input->post('nama')),
                'us_email' => htmlspecialchars($this->input->post('email')),
                'us_image' => 'default.jpg',
                'us_username' => htmlspecialchars($this->input->post('username')),
                'us_pass' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
                'us_role_id' => 7,
                'us_active' => 1,
                'us_date_created' => time()
            ];

            $this->db->insert('t_user', $data);
            $this->session->set_flashdata('message', '<div class="relative p-3 pr-12 text-sm bg-green-500 border border-transparent rounded-md text-green-50">
        <span class="font-bold">Berhasil Daftar Akun</span>
            </div>');
            redirect('auth');
        }
    }


    public function cbnew()
    {
        $this->load->library('encryption');

        $username = htmlspecialchars($this->input->post('username'), ENT_QUOTES);
        $pass = $this->input->post('pass');
        $usr = $this->db->get_where('t_user', ['us_username' => $username])->row_array();
        if ($usr) {
            if ($usr['us_active'] == '1') {
                if (password_verify($pass, $usr['us_pass'])) {
                    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    // Selamat Berhasil Login
                    // </div>');
                    $data = [
                        'user'      => $usr['us_username'],
                        'role'      => $usr['us_role_id'],
                        'actid'     => $this->secure->encrypt_url($usr['us_id'])
                    ];

                    $this->session->set_userdata($data);
                    if ($usr['us_active'] == '1') {
                        redirect('dashboard');
                    } else {
                        redirect('dashboard');
                    }
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="relative p-3 pr-12 text-sm bg-red-500 border border-transparent rounded-md text-red-50">
                    <span class="font-bold">Maaf Password Salah</span>
                        </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="relative p-3 pr-12 text-sm bg-red-500 border border-transparent rounded-md text-red-50">
                    <span class="font-bold">Maaf User Tidak Aktif</span>
                        </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="relative p-3 pr-12 text-sm bg-red-500 border border-transparent rounded-md text-red-50">
                    <span class="font-bold">Maaf User Tidak Terdaftar</span>
                        </div>');
            redirect('auth');
        }
    }



    public function cb()
    {
        $this->load->library('encryption');
        $captchaResult = $this->input->post('captchaResult');
        $firstNumber = $this->input->post('firstNumber');
        $secondNumber = $this->input->post('secondNumber');
        $checkTotal = $firstNumber + $secondNumber;
        if ($captchaResult == $checkTotal) {
            $username = htmlspecialchars($this->input->post('username'), ENT_QUOTES);
            $pass = $this->input->post('pass');
            $usr = $this->db->get_where('t_user', ['us_username' => $username])->row_array();
            if ($usr) {
                if ($usr['us_active'] == '1') {
                    if (password_verify($pass, $usr['us_pass'])) {
                        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        // Selamat Berhasil Login
                        // </div>');
                        $data = [
                            'user'      => $usr['us_username'],
                            'role'      => $usr['us_role_id'],
                            'actid'     => $this->secure->encrypt_url($usr['us_id'])
                        ];

                        $this->session->set_userdata($data);
                        if ($usr['us_active'] == '1') {
                            redirect('dashboard');
                        } else {
                            redirect('dashboard');
                        }
                        redirect('dashboard');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Maaf Password Salah
                        </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Maaf User Tidak Aktif
                        </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Maaf User Tidak Terdaftar
                        </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Maaf Penjumlahan Anda Salah
                        </div>');
            redirect('auth');
        }
    }

    public function cek()
    {
        $captchaResult = $this->input->post('captchaResult');
        $firstNumber = $this->input->post('firstNumber');
        $secondNumber = $this->input->post('secondNumber');
        $checkTotal = $firstNumber + $secondNumber;
        if ($captchaResult == $checkTotal) {
            $nip = $this->input->post('username');
            $pass = $this->input->post('pass');
            $peg = $this->db->get_where('tb_user_peg', ['username' => $nip])->row_array();
            $thl = $this->db->get_where('tb_user_thl', ['username' => $nip])->row_array();

            if ($peg or $thl) {
                if ($peg['is_active'] == '1' or $thl['is_active'] == '1') {
                    if (password_verify($pass, $peg['password']) or password_verify($pass, $thl['password'])) {
                        // echo $peg['username'];
                        // die;
                        $pw = $this->db->get_where('tb_user_peg', ['username' => $nip])->row_array();
                        if ($pw['ket'] == '0') {
                            $data['username'] = $nip;
                            $this->load->view('auth/rubahpass', $data);
                        } else {
                            $data = [
                                'nip'       => $peg['username'],
                                'role_id'   => $peg['role_id'],
                                'thl'       => $thl['username'],
                                'role_thl'   => $thl['role_id']
                            ];

                            $this->session->set_userdata($data);
                            if ($peg['role_id'] == '1') {
                                redirect('dashboard');
                            } else {
                                redirect('dashboard');
                            }
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Maaf Password Anda Salah
                        </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Maaf Akun Anda Belum Aktif
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Maaf User Tidak Terdaftar
              </div>');
                redirect('auth');
            }
        } else {
            // echo '<h2 class="red">Wrong Captcha. Try Again</h2>';
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Penjumlahan Anda Salah
              </div>');
            redirect('auth');
        }
    }


    public function rubahpass()
    {
        $captchaResult = $this->input->post('captchaResult');
        $firstNumber = $this->input->post('firstNumber');
        $secondNumber = $this->input->post('secondNumber');
        $checkTotal = $firstNumber + $secondNumber;
        if ($captchaResult == $checkTotal) {
            $nip = $this->input->post('username');
            $pass1 = $this->input->post('pass1');
            $pass2 = $this->input->post('pass2');
            $peg = $this->db->get_where('tb_user_peg', ['username' => $nip])->row_array();
            $thl = $this->db->get_where('tb_user_thl', ['username' => $nip])->row_array();
            if ($pass1 == $pass2) {
                $update = array(
                    'password'      => password_hash($this->input->post('pass2'), PASSWORD_DEFAULT),
                    'ket'           => '1'
                );
                $this->db->set($update);
                $this->db->where(['username' => $nip], 'tb_user_peg');
                $this->db->update('tb_user_peg');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil Rubah Password, Silahkan Login dengan password yang baru
              </div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal Rubah Password
              </div>');
                redirect('auth');
            }
        } else {
            // echo '<h2 class="red">Wrong Captcha. Try Again</h2>';
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Penjumlahan Anda Salah
              </div>');
            redirect('auth');
        }
    }


    public function registrasi()
    {
        $captchaResult = $this->input->post('captchaResult');
        $firstNumber = $this->input->post('firstNumber');
        $secondNumber = $this->input->post('secondNumber');
        $checkTotal = $firstNumber + $secondNumber;

        $pass1 = $this->input->post('pass1');
        $pass2 = $this->input->post('pass2');

        if ($captchaResult == $checkTotal) {
            if ($pass1 == $pass2) {
                $input = [
                    'nip' => htmlspecialchars($this->input->post('nip', true)),
                    'pass' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
                    'kode_pd' => $this->input->post('pd')
                ];
                $this->db->set($input);
                $this->db->insert('tb_register');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil Register
              </div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal Registrasi
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Penjumlahan Anda Salah
              </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('actid');

        $this->session->set_flashdata('message', '<div class="relative p-3 pr-12 text-sm bg-red-500 border border-transparent rounded-md text-red-50">
        <span class="font-bold">Anda Sudah Logout Silahkan Login Kembali</span>
            </div>');
        redirect('auth');
    }
}
