<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('Blog_model');
		$this->load->model('Cart_model');
		$this->load->model('Company_model');
		$this->load->model('Kategori_model');
		$this->load->model('Kontak_model');
		$this->load->model('Produk_model');
		$this->load->model('Slider_model');

		$this->data['title'] 							= 'Home';

		$this->data['company_data'] 			= $this->Company_model->get_by_company();
		$this->data['produk_new_data'] 			= $this->Produk_model->get_all_new_home();
		$this->data['blog_new_data'] 			= $this->Blog_model->get_all_new_home();
		$this->data['kategori_new_data'] 		= $this->Produk_model->get_all_kategori();
		$this->data['slider_data'] 				= $this->Slider_model->get_all_home();
		$this->data['kontak'] 					= $this->Kontak_model->get_all();
		$this->data['total_cart_navbar'] 		= $this->Cart_model->total_cart_navbar();
		$this->data['company']            		= $this->Company_model->get_by_company();

		$this->load->view('frontend/home/body', $this->data);
	}

	public function mail () {
		if (isset($_POST['submit'])) {
			$data = array ('email' => $this->input->post('email'));
			$this->db->insert('email_visitor',$data);
			redirect ('');
		} else {
			echo "email gagal dikirim";
			redirect('');
		}
	}

}
