<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_produk_model', 'produk');
		$this->load->model('client_transaksi_model', 'trans');
		$this->load->model('client_user_model', 'user');
		$this->load->library('form_validation');
		$this->load->library('session');
		if ($this->session->userdata('level')!="admin") {
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		$data['produk'] = $this->produk->getAllProduk();
		$this->load->view('./template/header_admin', $data, FALSE);
		$this->load->view('./admin/admin', $data);
	}
	public function detail($id)
	{
		$data['produk'] = $this->produk->getbyidProduk($id);
		$this->load->view('./template/header_admin');
		$this->load->view('./admin/detail', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
		$this->form_validation->set_rules('stok', 'stok', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('./template/header_admin');
			$this->load->view('./admin/tambah');
			// $this->load->view('./admin/footer');
		} else {
			$this->produk->addNewProduk();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			// redirect('admin');
		}
	}
	
	public function ubah($id)
	{
		$data['produk'] = $this->produk->getbyidProduk($id);
		$this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
		$this->form_validation->set_rules('stok', 'stok', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('./template/header_admin');
			$this->load->view('./admin/edit', $data);
			// $this->load->view('./admin/footer');
		} else {
			$this->produk->ubahProduk();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin');
		}
	}
	public function delete($id)
	{
		$this->produk->deleteById($id);
		redirect('admin');
	}

	public function pembelian()
	{
		$data['transaksi'] = $this->trans->getAllJoin();
		$this->load->view('./template/header_admin');
		$this->load->view('./admin/transaksi', $data);
	}

	public function deleteTransaksi($id){
		$this->trans->deleteIdTransaksi($id);
		redirect('admin/pembelian');
		
	}

	public function user()
	{
		$data['login'] = $this->user->getAllUser();
		$this->load->view('./template/header_admin');
		$this->load->view('./admin/user', $data);
	}

	public function ubahUser($id)
	{
		$data['login'] = $this->user->getbyidUser($id);
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('level', 'level', 'required');
		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('./template/header_admin');
			$this->load->view('./admin/edituser', $data);
		} else {
			$this->user->ubahUser();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/user');
		}
	}

	public function deleteUser($id)
	{
		$this->user->deleteById($id);
		redirect('admin/user');
	}
}
