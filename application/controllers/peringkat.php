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

		
			
			$data['title']="Peringkat Lolos";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();

		//generate pagination 
		$this->load->library('pagination');
		$config['base_url']=$this->config->base_url().'peringkat/index';
		$config['per_page']=9000;
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
		$limit=1;
		$count=$this->m_calon->peringkat();
		$data['count']=count($count);


		//parsing data ke tabel
		if ($data['username']=="admin") {
		// jika admin
		$x=0;
		foreach ($query as $row) {
			// $checkbox="<input type=\"checkbox\" name=\"bulkaction\" value=\"".$row['calon_id']."\">";
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

	// 		$diskualifikasi="
 // <a id=\"modal-".$row['calon_id']."\" href=\"#modal-container-".$row['calon_id']."\" data-toggle=\"modal\"><img src=\"".$this->config->base_url()."assets/img/rm.png\" width=\"20px\"></a>		
	// 		<div class=\"modal fade\" id=\"modal-container-".$row['calon_id']."\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
	// 			<div class=\"modal-dialog\">
	// 				<div class=\"modal-content\">
	// 					<div class=\"modal-header\">
	// 						 <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
	// 						<h4 class=\"modal-title\" id=\"myModalLabel\">
	// 							Diskualifikasi
	// 						</h4>
	// 					</div>
	// 					<div class=\"modal-body\">
	// 					No. Registrasi : ".$row['calon_id']."
	// 					<br>Nama : ".$row['calon_nama']."
	// 					<br>Email : ".$row['calon_email']."
	// 					<br><hr>
	// 					Mohon maaf, anda didiskualifikasi karena :
	// 						<br><br><form method=\"POST\" name=\"form-".$row['calon_id']."\" action=\"".$this->config->base_url()."peringkat/delete/".$row['calon_id']."\" \">
	// 							<textarea style=\"width:540px;height:150px\" name=\"pesan\" placeholder=\"Tuliskan alasan diskualifikasi\"></textarea>
	// 					</div>
	// 					<div class=\"modal-footer\">
	// 						<input type=\"hidden\" name=\"email\" value=\"".$row['calon_email']."\">
	// 						 <input type=\"button\" class=\"btn btn-default\" value=\"Batal\" data-dismiss=\"modal\">  <input class=\"btn btn-danger\" type=\"submit\" name=\"submit\" value=\"Diskualifikasi dan kirim email pemberitahuan\">
	// 						</form>
	// 					</div>
	// 				</div>
					
	// 			</div>
	// 		</div>";
			$checkbox="<input type=\"checkbox\" name=\"bulkaction[]\" value=\"".$row['calon_id']."\" onclick=\"javacript:EnableDisableButton(this,value);\">";

			// $nilai_g=((40/100)*($nilai_f*$multipler))+((60/100)*($nilai_e*$multipler));
			

			$this->table->add_row(
			$checkbox,
			$peringkat,
			$row['calon_id'],
			$row['calon_nama'],
			$row['calon_aa_skor'],
			$row['calon_asal'],
			$v_email,
			$v_nilai
			// $diskualifikasi
			
				);
			$x=$x+1;
		}
		} else {
		// bukan admin
		redirect('/');	
		}

		//template buat taruh class bootstrap
		$tmpl = array ( 'table_open'  => '<table class="table table-hover table-striped">','table_close'  => '</table>'  );
		$this->table->set_template($tmpl); 
		if ($data['username']=="admin") {
			$this->table->set_heading('','Peringkat','No. Registrasi','Nama','Skor nilai','Sekolah asal','Verifikasi email','Valid');
		} else {
			$this->table->set_heading('Peringkat','Nama','Sekolah Asal');	
		}
		$data['table']=$this->table->generate();
		$this->load->model('m_calon');
			$data['standar_nilai']="6.0";

			$this->load->view('header', $data);
			$this->load->view('v_peringkat', $data);
			if ($data['username']!="admin") {
				$this->load->view('sidebar');
			}
			$this->load->view('footer');

		// }
	}
function latest()
	{
			
		$data['title']="Keseluruhan Peserta Didik Baru";
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$data['subtitle']="Minus diskualifikasi, diurutkan berdasarkan pendaftar terakhir.";
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();

		//generate pagination 
		$this->load->library('pagination');
		$config['base_url']=$this->config->base_url().'peringkat/latest';
		$config['per_page']=9000;
		$config['total_rows']=$this->m_calon->get_total();
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		// //ambil query
		$query=$this->m_calon->peringkat_by_waktu($config['per_page']);
		
		//cek apakah query kosong atau tidak, beri nilai ke $is_table_empty
		if (empty($query)) {
			$data['is_table_empty']=TRUE;
		}
		else {
			$data['is_table_empty']=FALSE;
		}
		

		//hitung jumlah sms
		$limit=1;
		$count=$this->m_calon->peringkat_out();
		$count_lolos=$this->m_calon->peringkat();
		$count_lolos=count($count_lolos);
		$data['count']=count($count);


		//parsing data ke tabel
		if ($data['username']=="admin") {
		// jika admin
		$x=0;
		foreach ($query as $row) {
			// $checkbox="<input type=\"checkbox\" name=\"bulkaction\" value=\"".$row['calon_id']."\">";
			$no=$x+1;
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

			$checkbox="<input type=\"checkbox\" name=\"bulkaction[]\" value=\"".$row['calon_id']."\" onclick=\"javacript:EnableDisableButton(this,value);\">";

			$this->table->add_row(
			$checkbox,

			$no,
			$row['calon_waktu'],
			$row['calon_id'],
			$row['calon_nama'],
			$row['calon_aa_skor'],
			$row['calon_asal'],
			$v_email,
			$v_nilai

			
				);
			$x=$x+1;
		}
		} else {
		// bukan admin
		
		redirect('/');	
		}

		//template buat taruh class bootstrap
		$tmpl = array ( 'table_open'  => '<table class="table table-hover table-striped">','table_close'  => '</table>'  );
		$this->table->set_template($tmpl); 
		if ($data['username']=="admin") {
			$this->table->set_heading('','No.','Waktu Pendaftaran','Nomor Registrasi','Nama','Skor nilai','Sekolah asal','Verifikasi email','Valid');
		} 
		$data['table']=$this->table->generate();
		$this->load->model('m_calon');
			if (!isset($no)) {
				$no=0;
			}
			$data['subtitle']="Minus diskualifikasi, diurutkan berdasarkan pendaftar terakhir.<br>Total : ".$no." orang";

			$this->load->view('header', $data);
			$this->load->view('v_peringkat', $data);
			if ($data['username']!="admin") {
				$this->load->view('sidebar');
			}
			$this->load->view('footer');

		// }
	}
function out()
	{
			
		$data['title']="Peringkat tidak lolos";
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();

		//generate pagination 
		$this->load->library('pagination');
		$config['base_url']=$this->config->base_url().'peringkat/out';
		$config['per_page']=9000;
		$config['total_rows']=$this->m_calon->get_total();
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		// //ambil query
		$query=$this->m_calon->peringkat_out($config['per_page']);
		
		//cek apakah query kosong atau tidak, beri nilai ke $is_table_empty
		if (empty($query)) {
			$data['is_table_empty']=TRUE;
		}
		else {
			$data['is_table_empty']=FALSE;
		}
		

		//hitung jumlah sms
		$limit=1;
		$count=$this->m_calon->peringkat_out();
		$count_lolos=$this->m_calon->peringkat();
		$count_lolos=count($count_lolos);
		$data['count']=count($count);


		//parsing data ke tabel
		if ($data['username']=="admin") {
		// jika admin
		$x=$count_lolos;
		foreach ($query as $row) {
			// $checkbox="<input type=\"checkbox\" name=\"bulkaction\" value=\"".$row['calon_id']."\">";
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

			$checkbox="<input type=\"checkbox\" name=\"bulkaction[]\" value=\"".$row['calon_id']."\" onclick=\"javacript:EnableDisableButton(this,value);\">";

			$this->table->add_row(
			$checkbox,

			$peringkat,
			$row['calon_id'],
			$row['calon_nama'],
			$row['calon_aa_skor'],
			$row['calon_asal'],
			$v_email,
			$v_nilai

			
				);
			$x=$x+1;
		}
		} else {
		// bukan admin
		
		redirect('/');	
		}

		//template buat taruh class bootstrap
		$tmpl = array ( 'table_open'  => '<table class="table table-hover table-striped">','table_close'  => '</table>'  );
		$this->table->set_template($tmpl); 
		if ($data['username']=="admin") {
			$this->table->set_heading('','Peringkat','No. Registrasi','Nama','Skor nilai','Sekolah asal','Verifikasi email','Valid');
		} 
		$data['table']=$this->table->generate();
		$this->load->model('m_calon');
			$data['standar_nilai']="6.0";

			$this->load->view('header', $data);
			$this->load->view('v_peringkat', $data);
			if ($data['username']!="admin") {
				$this->load->view('sidebar');
			}
			$this->load->view('footer');

		// }
	}

function daftardis()
	{
		// if (!$this->tank_auth->is_logged_in()) {
		// 	redirect('/auth/login/');
		// } else {

		
			
			$data['title']="Peserta yang didiskualifikasi";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();

		//generate pagination 
		$this->load->library('pagination');
		$config['base_url']=$this->config->base_url().'peringkat/out';
		$config['per_page']=9000;
		$config['total_rows']=$this->m_calon->get_total();
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		// //ambil query
		$query=$this->m_calon->peringkat_dis($config['per_page']);
		
		//cek apakah query kosong atau tidak, beri nilai ke $is_table_empty
		if (empty($query)) {
			$data['is_table_empty']=TRUE;
		}
		else {
			$data['is_table_empty']=FALSE;
		}
		

		//hitung jumlah sms
		$limit=1;
		$count=$this->m_calon->peringkat_dis();
		$data['count']=count($count);


		//parsing data ke tabel
		if ($data['username']=="admin") {
		// jika admin
		$x=0;
		foreach ($query as $row) {
			// $checkbox="<input type=\"checkbox\" name=\"bulkaction\" value=\"".$row['calon_id']."\">";

	
			$calon_nama=$row['calon_nama'];
			$row['calon_nama']=anchor('peringkat/profil_dis/'.$row['calon_id'],'<span class="icon-remove">'.$calon_nama.'</span>');
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

			
			
			$this->table->add_row(
			$row['calon_id'],
			$row['calon_nama'],
			$row['calon_aa_skor'],
			$row['calon_asal'],
			$row['calon_alasandis']
			
				);
			$x=$x+1;
		}
		} else {
		// bukan admin
		
		redirect('/');	
		}

		//template buat taruh class bootstrap
		$tmpl = array ( 'table_open'  => '<table class="table table-hover table-striped">','table_close'  => '</table>'  );
		$this->table->set_template($tmpl); 
		if ($data['username']=="admin") {
			$this->table->set_heading('No. Registrasi','Nama','Skor nilai','Sekolah asal','Alasan diskualifikasi');
		}
		$data['table']=$this->table->generate();
		$this->load->model('m_calon');
			$data['standar_nilai']="6.0";

			$this->load->view('header', $data);
			$this->load->view('v_peringkat_daftardis', $data);
			if ($data['username']!="admin") {
				$this->load->view('sidebar');
			}
			$this->load->view('footer');

		// }
	}

	function bulkaction(){
		$submit=$this->input->post('submit');
		$current_url=$this->input->post('current_url');
		$bulkaction=$this->input->post('bulkaction');
		// echo $submit;
		// print_r($bulkaction);

		if ($submit=="OK") {
			foreach ($bulkaction as $id) {
				$this->verifikasi_bulk($id);
			}
			redirect($current_url);
		} else {
			$pesan=$this->input->post('pesan_dis');
			foreach ($bulkaction as $id) {
				$this->delete($id,$pesan);
			}
			// echo $current_url;
			redirect($current_url);
		}
		redirect('/');
	}

	function deletedis()
	{
		$data['username']	= $this->tank_auth->get_username();
		$data['user_id']	= $this->tank_auth->get_user_id();
		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		if ($this->m_calon->get_level($data['user_id'])!='admin') {
		 	redirect('/auth/login/');
		} else {
			$this->load->model('m_calon');
			$this->m_calon->delete_dis();
			redirect('peringkat/daftardis');
		}}
	}
	function delete($id,$pesan)
	{
			$this->load->model('m_calon');
			$data['title']="Peringkat";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		if ($this->m_calon->get_level($data['user_id'])!='admin') {
		 	redirect('/auth/login/');
		} else {

			$email=$this->m_calon->get_email($id);

			$this->load->model('m_calon');
			$this->m_calon->alasandis_set($id,$pesan);

			$pesan="Mohon maaf, anda didiskualifikasi karena : ".$pesan;
     

        $this->load->helper('url_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library('email');
        $this->load->helper('url'); 

            // $config['protocol'] = 'sendmail';
            // $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE; 
            $this->email->initialize($config);

            $this->email->from('ppdb@ppdb.sman1dompu.sch.id', 'PSB Online SMA Negeri 1 Dompu');
            $this->email->to($email); 
            $this->email->subject('Diskualifikasi');
            $this->email->message($pesan);  

            $this->email->send();

            // echo $this->email->print_debugger();



		$this->m_calon->delete($id);
		
		}
		}
	}

	function verifikasi_bulk($id)
	{

			$data['title']="Peringkat";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {
		
		if ($this->m_calon->get_level($data['user_id'])!='admin') {
		 	redirect('/auth/login/');
		} else {


		$this->load->model('m_calon');
		$this->m_calon->verifikasi_nilai_set($id,"1");
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
		
		if ($this->m_calon->get_level($data['user_id'])!='admin') {
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

		if ($this->m_calon->get_level($data['user_id'])!='admin') {
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

		if ($this->m_calon->get_level($data['user_id'])!='admin') {
		 	redirect('/auth/login/');
		} else {


		$this->load->model('m_calon');
		$profil=$this->m_calon->profil($id);
		
		$peringkat_status=$this->m_calon->peringkat_status($id);
		if ($peringkat_status[1]<=$peringkat_status[0]) {
			$data['calon_rank']=$peringkat_status[1];
			$data['calon_rank_status']="<span style=\"color:green\">Masuk daftar lulus sementara</span> sampai dengan ".date("d/m/y : H:i:s", time());
		} else {
			$data['calon_rank']=$peringkat_status[1];
			$data['calon_rank_status']="<span style=\"color:red\">Tidak masuk daftar lulus sementara</span> sampai dengan ".date("d/m/y : H:i:s", time());
		}


		$data['calon_id']=$profil[0]['calon_id'];
		$data['calon_email']=$profil[0]['calon_email'];
		$data['calon_nama']=$profil[0]['calon_nama'];
		$data['calon_kelamin']=$profil[0]['calon_kelamin'];
		$data['calon_panggilan']=$profil[0]['calon_panggilan'];
		$data['calon_tempatlahir']=$profil[0]['calon_tempatlahir'];
		$data['calon_tanggallahir']=$profil[0]['calon_tanggallahir'];
		$data['calon_kelamin']=$profil[0]['calon_kelamin'];
		$data['calon_agama']=$profil[0]['calon_agama'];
		$data['calon_alamat']=$profil[0]['calon_alamat'];
		$data['calon_asal']=$profil[0]['calon_asal'];
		$data['calon_nis']=$profil[0]['calon_nis'];

		$data['calon_nama_ayah']=$profil[0]['calon_nama_ayah'];
		$data['calon_nama_ibu']=$profil[0]['calon_nama_ibu'];
		$data['calon_pendidikan_ayah']=$profil[0]['calon_pendidikan_ayah'];
		$data['calon_pendidikan_ibu']=$profil[0]['calon_pendidikan_ibu'];
		$data['calon_pekerjaan_ayah']=$profil[0]['calon_pekerjaan_ayah'];
		$data['calon_pekerjaan_ibu']=$profil[0]['calon_pekerjaan_ibu'];
		$data['calon_alamat_ortu']=$profil[0]['calon_alamat_ortu'];
		$data['calon_notelp']=$profil[0]['calon_notelp'];
		$data['calon_nilai_a']=$profil[0]['calon_nilai_a'];
		$data['calon_nilai_b']=$profil[0]['calon_nilai_b'];
		$data['calon_nilai_c']=$profil[0]['calon_nilai_c'];
		$data['calon_nilai_d']=$profil[0]['calon_nilai_d'];
		$data['calon_nilai_e']=$profil[0]['calon_nilai_e'];
		$data['calon_nilai_f']=$profil[0]['calon_nilai_f'];
		$data['calon_nilai_g']=$profil[0]['calon_aa_skor'];
		$data['calon_status']=$profil[0]['calon_status'];
		$data['calon_selfie']=$profil[0]['calon_selfie'];
		$semester_all=explode("_", $profil[0]['semester_all']); 
		$data['semester_all']=$semester_all;
		// print_r($semester_all);


		$this->load->view('header', $data);
		$this->load->view('v_peringkat_profil', $data);
		// $this->load->view('sidebar');
		$this->load->view('footer');


		}}


	}
function profil_dis($id){

		$data['title']="Profil";
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		if ($this->m_calon->get_level($data['user_id'])!='admin') {
		 	redirect('/auth/login/');
		} else {


		$this->load->model('m_calon');
		$profil=$this->m_calon->profil($id);
		
		$data['calon_id']=$profil[0]['calon_id'];
		$data['calon_email']=$profil[0]['calon_email'];
		$data['calon_nama']=$profil[0]['calon_nama'];
		$data['calon_kelamin']=$profil[0]['calon_kelamin'];
		$data['calon_panggilan']=$profil[0]['calon_panggilan'];
		$data['calon_tempatlahir']=$profil[0]['calon_tempatlahir'];
		$data['calon_tanggallahir']=$profil[0]['calon_tanggallahir'];
		$data['calon_kelamin']=$profil[0]['calon_kelamin'];
		$data['calon_agama']=$profil[0]['calon_agama'];
		$data['calon_alamat']=$profil[0]['calon_alamat'];
		$data['calon_asal']=$profil[0]['calon_asal'];
		$data['calon_nis']=$profil[0]['calon_nis'];
		$data['calon_alasandis']=$profil[0]['calon_alasandis'];

		$data['calon_nama_ayah']=$profil[0]['calon_nama_ayah'];
		$data['calon_nama_ibu']=$profil[0]['calon_nama_ibu'];
		$data['calon_pendidikan_ayah']=$profil[0]['calon_pendidikan_ayah'];
		$data['calon_pendidikan_ibu']=$profil[0]['calon_pendidikan_ibu'];
		$data['calon_pekerjaan_ayah']=$profil[0]['calon_pekerjaan_ayah'];
		$data['calon_pekerjaan_ibu']=$profil[0]['calon_pekerjaan_ibu'];
		$data['calon_alamat_ortu']=$profil[0]['calon_alamat_ortu'];
		$data['calon_notelp']=$profil[0]['calon_notelp'];
		$data['calon_nilai_a']=$profil[0]['calon_nilai_a'];
		$data['calon_nilai_b']=$profil[0]['calon_nilai_b'];
		$data['calon_nilai_c']=$profil[0]['calon_nilai_c'];
		$data['calon_nilai_d']=$profil[0]['calon_nilai_d'];
		$data['calon_nilai_e']=$profil[0]['calon_nilai_e'];
		$data['calon_nilai_f']=$profil[0]['calon_nilai_f'];
		$data['calon_nilai_g']=$profil[0]['calon_nilai_g'];
		$data['calon_status']=$profil[0]['calon_status'];
		$data['calon_selfie']=$profil[0]['calon_selfie'];


		$this->load->view('header', $data);
		$this->load->view('v_peringkat_profil_dis', $data);
		// $this->load->view('sidebar');
		$this->load->view('footer');


		}}


	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */