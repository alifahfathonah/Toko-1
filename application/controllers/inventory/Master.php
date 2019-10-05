<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Master extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index() {
		$this->template->load('inventory/template','inventory/master/v_produk_list');
	}
}