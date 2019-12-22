<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_produk_model', 'produk');
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
			redirect('admin');
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
		$this->form_validation->set_rules('image', 'image', 'required');

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
	public function login()
	{
		$this->load->view('./admin/header');
		$this->load->view('./admin/login');
		$this->load->view('./admin/footer');
	}
}
