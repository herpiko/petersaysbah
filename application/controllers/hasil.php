<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hasil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library(array('table','form_validation'));
		$this->load->model('m_calon');

	}

	function index()
	{
		// if (!$this->tank_auth->is_logged_in()) {
		// 	redirect('/auth/login/');
		// } else {

		
			
			$data['title']="Peringkat";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();

		//generate pagination 
		$this->load->library('pagination');
		$config['base_url']=$this->config->base_url().'hasil/index';
		$config['per_page']=500;
		$config['total_rows']=$this->m_calon->get_total();
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		// //ambil query
		$query=$this->m_calon->peringkat($config['per_page']);
		
		//cek apakah query kosong atau tidak, beri nilai ke $is_table_empty
		if (empty($query)) {
			$data['is_table_empty']=TRUE;
		}
		else {
			$data['is_table_empty']=FALSE;
		}
		

		//hitung jumlah sms
		$count=$this->m_calon->peringkat();
		$data['count']=count($count);


		//parsing data ke tabel
		$x=0;
		foreach ($query as $row) {
			$peringkat=$x+1;
			$hapus='';
			if ($data['username']=="admin") {
			$hapus=anchor('hasil/delete/'.$row['calon_id'],'<i class="icon-remove">diskualifikasi</i>',array('onclick'=>"return confirm('Anda yakin ingin menghapus?')"));
			}
			$this->table->add_row(
			$peringkat,
			$row['calon_nama'],
			$row['calon_nilai'],
			'hitung nilai rata2',
			$row['calon_asal'],
			$hapus
				);
			$x=$x+1;
		}

		//template buat taruh class bootstrap
		$tmpl = array ( 'table_open'  => '<table class="table table-hover table-striped">','table_close'  => '</table>'  );
		$this->table->set_template($tmpl); 
		$this->table->set_heading('Peringkat','Nama','Nilai','Nilai Rata-rata','Sekolah Asal');
		$data['table']=$this->table->generate();

			$this->load->view('header', $data);
			$this->load->view('v_hasil', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');

		// }
	}

	function delete($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		$this->load->model('m_calon');
		$this->m_calon->delete($id);
		
			
			$data['title']="Peringkat";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();

		//generate pagination 
		$this->load->library('pagination');
		$config['base_url']=$this->config->base_url().'hasil/index';
		$config['per_page']=500;
		$config['total_rows']=$this->m_calon->get_total();
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		// //ambil query
		$query=$this->m_calon->peringkat($config['per_page']);
		
		//cek apakah query kosong atau tidak, beri nilai ke $is_table_empty
		if (empty($query)) {
			$data['is_table_empty']=TRUE;
		}
		else {
			$data['is_table_empty']=FALSE;
		}
		

		//hitung jumlah sms
		$count=$this->m_calon->peringkat();
		$data['count']=count($count);


		//parsing data ke tabel
		$x=0;
		foreach ($query as $row) {
			$peringkat=$x+1;
			$hapus='';
			if ($data['username']=="admin") {
			$hapus=anchor('hasil/delete/'.$row['calon_id'],'<i class="icon-remove">hapus</i>',array('onclick'=>"return confirm('Anda yakin ingin menghapus?')"));
			}
			$this->table->add_row(
			$peringkat,
			$row['calon_nama'],
			$row['calon_nilai'],
			'hitung nilai rata2',
			$row['calon_asal'],
			$hapus
				);
			$x=$x+1;
		}

		//template buat taruh class bootstrap
		$tmpl = array ( 'table_open'  => '<table class="table table-hover table-striped">','table_close'  => '</table>'  );
		$this->table->set_template($tmpl); 
		$this->table->set_heading('Peringkat','Nama','Nilai','Nilai Rata-rata','Sekolah Asal');
		$data['table']=$this->table->generate();

			$this->load->view('header', $data);
			$this->load->view('v_hasil', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');

		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */