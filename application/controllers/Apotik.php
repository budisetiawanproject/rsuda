<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apotik extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_gudang', 'gudang');
		$this->load->library('form_validation');
	}

	public function inputData()
	{
		$data['code'] = $this->session->userdata('actid');
		$data['dec'] = $this->secure->decrypt_url($data['code']);
		$data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();

		if (empty($data['user'])) {
			redirect('auth/logout');
		} else if ($data['user']['us_role_id'] == '9') {
			$data['session'] = $this->session->userdata('role');

			$this->load->view('templates/head');
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('apotik/inputdata',);
			$this->load->view('templates/footer');
		}
	}
}
