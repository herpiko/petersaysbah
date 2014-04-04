<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Peringkat extends CI_Controller
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
		$config['base_url']=$this->config->base_url().'peringkat/index';
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
		if ($data['username']=="admin") {
		// jika admin
		$x=0;
		foreach ($query as $row) {
			$peringkat=$x+1;
			$hapus='';

			$hapus=anchor('peringkat/delete/'.$row['calon_id'],'<img src="'.$this->config->base_url().'assets/img/rm.png" width="20px">',array('onclick'=>"return confirm('Anda yakin ingin mendiskualifikasi?')"));
			$calon_nama=$row['calon_nama'];
			$row['calon_nama']=anchor('peringkat/profil/'.$row['calon_id'],'<span class="icon-remove">'.$calon_nama.'</span>');
			$calon_email=$row['calon_email'];
			if ($this->m_calon->verifikasi_email($calon_email)=="1") {
			$v_email="<img src=\"".$this->config->base_url()."assets/img/m1.png\" width=\"20px\">";	
			} else {
				$v_email="<img src=\"".$this->config->base_url()."assets/img/m0.png\" width=\"20px\">";
			}
			
			if ($this->m_calon->verifikasi_nilai($row['calon_id'])=="1") {
			$v_nilai="<img src=\"".$this->config->base_url()."assets/img/v1.png\" width=\"20px\">";	
			} else {
				$v_nilai="<img src=\"".$this->config->base_url()."assets/img/v0.png\" width=\"20px\">";
			}

			$diskualifikasi="
 <a id=\"modal-".$row['calon_id']."\" href=\"#modal-container-".$row['calon_id']."\" data-toggle=\"modal\"><img src=\"".$this->config->base_url()."assets/img/rm.png\" width=\"20px\"></a>		
			<div class=\"modal fade\" id=\"modal-container-".$row['calon_id']."\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
				<div class=\"modal-dialog\">
					<div class=\"modal-content\">
						<div class=\"modal-header\">
							 <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
							<h4 class=\"modal-title\" id=\"myModalLabel\">
								Diskualifikasi
							</h4>
						</div>
						<div class=\"modal-body\">
						No. Registrasi : ".$row['calon_id']."
						<br>Nama : ".$row['calon_nama']."
						<br>Email : ".$row['calon_email']."
							<br><br><form method=\"POST\" name=\"form-".$row['calon_id']."\" action=\"#\">
								<textarea style=\"width:540px;height:150px\" name=\"pesan_diskualifikasi\" placeholder=\"Tuliskan pesan email mengenai alasan diskualifikasi\"></textarea>
							</form>
						</div>
						<div class=\"modal-footer\">
							 <input type=\"button\" class=\"btn btn-default\" value=\"Batal\" data-dismiss=\"modal\"> <input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Diskualifikasi dan kirim email pemberitahuan\">
							</form>
						</div>
					</div>
					
				</div>
			</div>";

			$this->table->add_row(
			$peringkat,
			$row['calon_id'],
			$row['calon_nama'],
			$row['calon_nilai'],
			$row['calon_nilai_e'],
			$row['calon_asal'],
			$v_email,
			$v_nilai,
			$diskualifikasi
			
				);
			$x=$x+1;
		}
		} else {
		// bukan admin
		$x=0;
		foreach ($query as $row) {
			$peringkat=$x+1;
			
			$this->table->add_row(
			$peringkat,
			$row['calon_id'],
			$row['calon_nama'],
			$row['calon_nilai'],
			$row['calon_nilai_e'],
			$row['calon_asal']			
				);
			$x=$x+1;
		}	
		}

		//template buat taruh class bootstrap
		$tmpl = array ( 'table_open'  => '<table class="table table-hover table-striped">','table_close'  => '</table>'  );
		$this->table->set_template($tmpl); 
		if ($data['username']=="admin") {
			$this->table->set_heading('Peringkat','No. Registrasi','Nama','Nilai','Nilai Rata-rata','Sekolah Asal','Verifikasi email','Verifikasi nilai');
		} else {
			$this->table->set_heading('Peringkat','No. Registrasi','Nama','Nilai','Nilai Rata-rata','Sekolah Asal');	
		}
		$data['table']=$this->table->generate();

			$this->load->view('header', $data);
			$this->load->view('v_peringkat', $data);
			if (!$data['username']=="admin") {
				$this->load->view('sidebar');
			}
			$this->load->view('footer');

		// }
	}

	function delete($id)
	{

				$data['title']="Peringkat";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		if (!$data['username']=="admin") {
		 	redirect('/auth/login/');
		} else {


		$this->load->model('m_calon');
		$this->m_calon->delete($id);
		$this->index();
		}}
	}

	function verifikasi($id)
	{

			$data['title']="Peringkat";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		if (!$data['username']=="admin") {
		 	redirect('/auth/login/');
		} else {


		$this->load->model('m_calon');
		$this->m_calon->verifikasi_nilai_set($id,"1");
		$this->profil($id);
		}}
	}

		function verifikasi_unset($id)
	{

			$data['title']="Peringkat";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		if (!$data['username']=="admin") {
		 	redirect('/auth/login/');
		} else {


		$this->load->model('m_calon');
		$this->m_calon->verifikasi_nilai_set($id,"0");
		$this->profil($id);
		}}
	}

	function profil($id){

		$data['title']="Profil";
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		if (!$data['username']=="admin") {
		 	redirect('/auth/login/');
		} else {


		$this->load->model('m_calon');
		$profil=$this->m_calon->profil($id);
		
		$data['calon_id']=$profil[0]['calon_id'];
		$data['calon_email']=$profil[0]['calon_email'];
		$data['calon_nama']=$profil[0]['calon_nama'];
		$data['calon_tempatlahir']=$profil[0]['calon_tempatlahir'];
		$data['calon_tanggallahir']=$profil[0]['calon_tanggallahir'];
		$data['calon_kelamin']=$profil[0]['calon_kelamin'];
		$data['calon_alamat']=$profil[0]['calon_alamat'];
		$data['calon_notelp']=$profil[0]['calon_notelp'];
		$data['calon_nohp']=$profil[0]['calon_nohp'];
		$data['calon_asal']=$profil[0]['calon_asal'];
		$data['calon_nilai']=$profil[0]['calon_nilai'];
		$data['calon_nilai_a']=$profil[0]['calon_nilai_a'];
		$data['calon_nilai_b']=$profil[0]['calon_nilai_b'];
		$data['calon_nilai_c']=$profil[0]['calon_nilai_c'];
		$data['calon_nilai_d']=$profil[0]['calon_nilai_d'];
		$data['calon_nilai_e']=$profil[0]['calon_nilai_e'];
		$data['calon_nilai_f']=$profil[0]['calon_nilai_f'];
		$data['calon_status']=$profil[0]['calon_status'];


		$this->load->view('header', $data);
		$this->load->view('v_peringkat_profil', $data);
		// $this->load->view('sidebar');
		$this->load->view('footer');


		}}


	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */