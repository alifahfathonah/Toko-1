<?php 
/**
* 
*/
class Reseller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ssp');
        $this->load->model('Produk_model');
	}

	function data() {
		// nama tabel
        $table = 'produk';
        // nama PK
        $primaryKey = 'id_produk';
        // list field
        $columns = array(
            array('db' => 'foto', 
                'dt'   => 'gambar',
                'formatter' => function( $d) {
                    return "<img width='200px' class='rounded-circle' src='". base_url()."/assets/images/produk/".$d.'.jpg'."'>";}),
            array('db' => 'judul_produk', 'dt' => 'nama'),
            array('db' => 'harga_diskon', 'dt' => 'harga'),
            array('db' => 'stok', 'dt' => 'stock'),
            array(
                'db' => 'id_produk',
                'dt' => 'detail',
                'formatter' => function( $d) {
                    return 
                    anchor('toko/reseller/read/'.$d,'<i class="fa fa-eye"></i>','class="btn btn-success"');
                }
            ),
            array(
                'db' => 'id_produk',
                'dt' => 'tambah',
                'formatter' => function( $d) {
                    return 
                    anchor('toko/reseller/tambah/'.$d,'<i class="fa fa-tag"></i>','class="btn btn-primary"');
                }
            )
        );

        $sql_details = array(
            'user'  => $this->db->username,
            'pass'  => $this->db->password,
            'db'    => $this->db->database,
            'host'  => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}

	function index() {
		$this->template->load('toko/template','toko/dashboard'																	);
	}

	function transaksi() {
		$this->template->load('toko/template','toko/v_produk_list');
	}

    function read() {
        $id = $this->uri->segment(4);
        $data['produk'] = $this->Produk_model->get_by_id($id);
        $this->template->load('toko/template','toko/v_produk_detail',$data);
    }
}