<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pergudangan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->library('secure');
		$this->load->model('m_gudang', 'gudang');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['code'] = $this->session->userdata('actid');
		$data['dec'] = $this->secure->decrypt_url($data['code']);
		$data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
		$data['stoks'] = $this->gudang->getall('t_restok');

		if (empty($data['user'])) {
			redirect('auth/logout');
		} else if ($data['user']['us_role_id'] == '9') {
			$data['session'] = $this->session->userdata('role');

			$this->load->view('templates/head');
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('pergudangan/index', $data);
			$this->load->view('templates/footer');
		}
	}

	public function rincianBarang($id)
	{
		$data['code'] = $this->session->userdata('actid');
		$data['dec'] = $this->secure->decrypt_url($data['code']);
		$data['user'] = $this->db->get_where('v_user', ['us_id' => $data['dec']])->row_array();
		$data['stok'] = $this->gudang->getWhere('t_restok', 'id', $id);
		$data['barangs'] = $this->gudang->getall('t_barang');
		$data['rincian_barang'] = $this->gudang->getrincianstok($id);
		$data['sum_rs'] = $this->gudang->getsumrs($id);

		// var_dump($data['sum_rs']);
		// die;


		if (empty($data['user'])) {
			redirect('auth/logout');
		} else if ($data['user']['us_role_id'] == '9') {
			$data['session'] = $this->session->userdata('role');

			$this->load->view('templates/head');
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('pergudangan/rincianbarang', $data);
			$this->load->view('templates/footer');
		}
	}

	public function getDataBarang()
	{
		$result = $data['barangs'] = $this->gudang->getall('t_barang');
		echo json_encode($result);
	}

	public function insertRinciStok()
	{
		$data = [
			'id_nota' => $this->input->post('id_nota'),
			'id_barang' => $this->input->post('id_barang'),
			'jumlah' => $this->input->post('jumlah'),
			'harga' => $this->input->post('harga'),
			'total' => $this->input->post('total'),

		];



		$this->db->insert('t_rinci_stok', $data);
		redirect(base_url('pergudangan/rincianbarang/') . $data['id_nota']);
	}

	public function getData()
	{
		$result = $this->db->get('t_restok')->result_array();
		echo json_encode($result);
	}


	public function insert()
	{
		$upload_image = $_FILES['file_nota']['name'];

		if ($upload_image) {

			$config['upload_path']          = './files/file_nota';
			$config['allowed_types']        = 'jpg|gif|png';
			$config['encrypt_name']        = true;
			$config['remove_space']        = true;
			$config['max_size']             = 5024;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file_nota')) {
				$new_file_nota_name = $this->upload->data('file_name');
				# code...
			} else {
				echo $this->upload->display_errors();
			}

			# code...
		}

		$data = [
			'id' => time() . rand(1, 10000000),
			'no_nota' => $this->input->post('no_nota', true),
			'tgl_nota' => $this->input->post('tgl_nota', true),
			'supplier' => $this->input->post('supplier', true),
			'total_harga' => $this->input->post('total_harga', true),
			'is_bayar' => 1,
			'file_nota' => $new_file_nota_name,
			'file_kwitansi' => null,
		];

		$this->db->insert('t_restok', $data);
		$this->session->set_flashdata('message', 'Tambah Data Berhasil');
		redirect(base_url('pergudangan'));
	}


	public function addBarang()
	{
		$data = [
			'nama_barang' => $this->input->post('nama_barang'),
		];
		$result = $this->db->insert('t_barang', $data);
		echo json_encode($result);
	}
}
