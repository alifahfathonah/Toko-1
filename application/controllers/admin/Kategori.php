<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Kategori_model');

    $this->data['module'] = 'Kategori';

    if (!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
    // elseif($this->ion_auth->is_user()){redirect('admin/auth/login', 'refresh');}
  }

  public function index()
  {
    $this->data['title'] = 'Data '.$this->data['module'];
    $this->load->view('back/kategori/kategori_list', $this->data);
  }

  public function ajax_list()
	{
		//get_datatables terletak di model
    $list = $this->Kategori_model->get_datatables();
    $data = array();
		$no = $_POST['start'];

    // Membuat loop/ perulangan
    foreach ($list as $data_kategori) {
			$no++;
			$row = array();
      $row[] = '<p style="text-align: center">'.$no.'</p>';
      $row[] = '<p style="text-align: left">'.$data_kategori->judul_kategori.'</p>';

      // Penambahan tombol edit dan hapus
      $row[] = '
      <p style="text-align: center">
      	<a class="btn btn-sm btn-warning" href="'.base_url('admin/kategori/update/').$data_kategori->id_kategori.'" title="Edit"><i class="fa fa-pencil"></i></a>
        <a class="btn btn-sm btn-danger" href="'.base_url('admin/kategori/delete/').$data_kategori->id_kategori.'" title="Hapus" onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"><i class="glyphicon glyphicon-remove"></i></a>
			</p>';

      $data[] = $row;
    }

    $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Kategori_model->count_all(),
              "recordsFiltered" => $this->Kategori_model->count_filtered(),
              "data" => $data
              );
    //output to json format
    echo json_encode($output);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah Data '.$this->data['module'];
    $this->data['action']         = site_url('admin/kategori/create_action');
    $this->data['button_submit']  = 'Simpan';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_kategori'] = array(
      'name'  => 'id_kategori',
      'id'    => 'id_kategori',
      'type'  => 'hidden',
    );
    $this->data['slug_kat'] = array(
      'name'  => 'slug_kat',
      'id'    => 'slug_kat',
      'type'  => 'text',
    );
    $this->data['judul_kategori'] = array(
      'name'  => 'judul_kategori',
      'id'    => 'judul_kategori',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('judul_kategori'),
    );

    $this->load->view('back/kategori/kategori_add', $this->data);
  }

  public function create_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->create();
    }
      else
      {
        /* 4 adalah menyatakan tidak ada file yang diupload*/
        if ($_FILES['foto']['error'] <> 4)
        {
          $nmfile = strtolower(url_title($this->input->post('judul_kategori'))).date('YmdHis');

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/images/kategori/';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);

          if (!$this->upload->do_upload('foto'))
          {
            //file gagal diupload -> kembali ke form tambah
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert">'.$error['error'].'</div>');

            $this->create();
          }
            //file berhasil diupload -> lanjutkan ke query INSERT
            else
            {
              $foto = $this->upload->data();
              $thumbnail                = $config['file_name'];
              // library yang disediakan codeigniter
              $config['image_library']  = 'gd2';
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/images/kategori/'.$foto['file_name'].'';
              // membuat thumbnail
              $config['create_thumb']   = TRUE;
              // rasio resolusi
              $config['maintain_ratio'] = FALSE;
              // lebar
              $config['width']          = 400;
              // tinggi
              $config['height']         = 400;

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $data = array(
                'judul_kategori'    => $this->input->post('judul_kategori'),
                'slug_kat'          => strtolower(url_title($this->input->post('judul_kategori'))),
                'icon'              => $nmfile,
                'icon_type'         => $foto['file_ext'],
                'uploader'          => $this->session->userdata('username')
              );

              // eksekusi query INSERT
              $this->Kategori_model->insert($data);
              // set pesan data berhasil dibuat
              $this->session->set_flashdata('message', '<div class="alert alert-success alert">Data berhasil dibuat</div>');
              redirect(site_url('admin/kategori'));
            }
        }
        else // Jika file upload kosong
        {
            $data = array(
                'judul_kategori'    => $this->input->post('judul_kategori'),
                'slug_kat'          => strtolower(url_title($this->input->post('judul_kategori')))
              );

          // eksekusi query INSERT
          $this->Produk_model->insert($data);
          // set pesan data berhasil dibuat
          $this->session->set_flashdata('message', '<div class="alert alert-success alert">Data berhasil dibuat</div>');
          redirect(site_url('admin/kategori'));
        }
      }
  }

  public function update($id)
  {
    $row = $this->Kategori_model->get_by_id($id);
    $this->data['kategori'] = $this->Kategori_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Ubah Data '.$this->data['module'];
      $this->data['action']         = site_url('admin/kategori/update_action');
      $this->data['button_submit']  = 'Simpan';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_kategori'] = array(
        'name'  => 'id_kategori',
        'id'    => 'id_kategori',
        'type'  => 'hidden',
      );
      $this->data['slug_kat'] = array(
        'name'  => 'slug_kat',
        'id'    => 'id_kategori',
        'type'  => 'text',
      );
      $this->data['judul_kategori'] = array(
        'name'  => 'judul_kategori',
        'id'    => 'judul_kategori',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->load->view('back/kategori/kategori_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
        redirect(site_url('admin/kategori'));
      }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->update($this->input->post('id_kategori'));
    }
      else
      {
        $nmfile = strtolower(url_title($this->input->post('judul_kategori'))).date('YmdHis');
        $id['id_kategori'] = $this->input->post('id_kategori');

        /* Jika file upload diisi */
        if ($_FILES['foto']['error'] <> 4)
        {
          $nmfile = strtolower(url_title($this->input->post('judul_kategori'))).date('YmdHis');

          //load uploading file library
          $config['upload_path']      = './assets/images/kategori/';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);

          // Jika file gagal diupload -> kembali ke form update
          if (!$this->upload->do_upload('foto'))
          {
            //file gagal diupload -> kembali ke form update
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert">'.$error['error'].'</div>');

            $this->update($this->input->post('id_kategori'));
          }
            // Jika file berhasil diupload -> lanjutkan ke query INSERT
            else
            {
              $delete = $this->Kategori_model->del_by_id($this->input->post('id_kategori'));

              $dir        = "assets/images/kategori/".$delete->icon.$delete->icon_type;
              $dir_thumb  = "assets/images/kategori/".$delete->icon.'_thumb'.$delete->icon_type;

              if(file_exists($dir))
              {
                // Hapus foto dan thumbnail
                unlink($dir);
                unlink($dir_thumb);
              }

              $foto = $this->upload->data();
              // library yang disediakan codeigniter
              $thumbnail                = $config['file_name'];
              //nama yang terupload nantinya
              $config['image_library']  = 'gd2';
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/images/kategori/'.$foto['file_name'].'';
              // membuat thumbnail
              $config['create_thumb']   = TRUE;
              // rasio resolusi
              $config['maintain_ratio'] = FALSE;
              // lebar
              $config['width']          = 400;
              // tinggi
              $config['height']         = 400;

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $data = array(
                'judul_kategori'  => $this->input->post('judul_kategori'),
                'slug_kat'  => strtolower(url_title($this->input->post('judul_kategori'))),
                'icon'            => $nmfile,
                'icon_type'       => $foto['file_ext'],
                'updater'         => $this->session->userdata('username')
              );

              $this->Kategori_model->update($this->input->post('id_kategori'), $data);
              $this->session->set_flashdata('message', '
              <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
              </div>');
              redirect(site_url('admin/kategori'));
            }
        }
          // Jika file upload kosong
          else
          {
            $data = array(
              'judul_kategori'    => $this->input->post('judul_kategori'),
              'slug_kat'          => strtolower(url_title($this->input->post('judul_kategori')))
            );

            $this->Kategori_model->update($this->input->post('id_kategori'), $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
              <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
            </div>');
            redirect(site_url('admin/kategori'));
          }
      }
  }

  public function delete($id) {  
    $delete = $this->Kategori_model->del_by_id($id);

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/images/kategori/".$delete->icon.$delete->icon_type;
    $dir_thumb = "assets/images/kategori/".$delete->icon.'_thumb'.$delete->icon_type;

    // Hapus foto
    unlink($dir);
    unlink($dir_thumb);

    // Jika data ditemukan, maka hapus foto dan record nya
    if($delete)
    {
      $this->Kategori_model->delete($id);

      $this->session->set_flashdata('message', '
      <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil dihapus
      </div>');
      redirect(site_url('admin/kategori'));
    }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/kategori'));
      }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('judul_kategori', 'Judul Kategori', 'trim|required');

    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
  }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */
