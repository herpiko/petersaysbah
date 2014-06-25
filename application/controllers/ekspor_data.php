<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ekspor_data extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {

			if ($this->tank_auth->get_username()!='admin') {
				redirect('/auth/login/');
			} else {

			$this->load->model('m_calon');
			
			// $data['standar_nilai']="6.0";

			// $data['title']="Lembar Registrasi";
			// $data['is_logged_in']=$this->tank_auth->is_logged_in();
			// $data['user_id']	= $this->tank_auth->get_user_id();
			// $data['username']	= $this->tank_auth->get_username();
			// $data['base_url']=$this->config->base_url();
			// // $this->load->view('header', $data);
			// $this->load->view('v_cetak', $data);
			// // $this->load->view('sidebar');
			// // $this->load->view('footer');

			$this->load->library('export');
			$this->load->model('m_calon');
			$sql_mentah = $this->m_calon->get_excel();
			// $sql_mentah=$sql->result_array();
			
			$sql=array();
			$x=0;
			foreach ($sql_mentah as $key) {
				
				//hitungskor
				$this->load->model('m_sch');
				$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
				$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
				$key['calon_aa_skor']=$skor;
				// ksort($key);
				$sql[$x]=$key;
				// $sql[$x]=$skor;
				$x=$x+1;
			}
			
		
			// arsort($sql);

			$sql_revised=array();
			$i=0;
			foreach ($sql as $key) {
				if ($key['calon_status']=='dis') {
					$key['calon_status']='Diskualifikasi';
				}
				if ($key['calon_status']==1) {
					$key['calon_status']='Data valid';
				}
				$sql_revised[$i]=$key;
				$i++;
			}
			// print_r($sql_revised);
			$this->export->to_excel($sql_revised, 'data_peserta_psb'); 
			

			}
		}
  
	}
	function lolos()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {

			if ($this->tank_auth->get_username()!='admin') {
				redirect('/auth/login/');
			} else {

			$this->load->model('m_calon');
			
			// $data['standar_nilai']="6.0";

			// $data['title']="Lembar Registrasi";
			// $data['is_logged_in']=$this->tank_auth->is_logged_in();
			// $data['user_id']	= $this->tank_auth->get_user_id();
			// $data['username']	= $this->tank_auth->get_username();
			// $data['base_url']=$this->config->base_url();
			// // $this->load->view('header', $data);
			// $this->load->view('v_cetak', $data);
			// // $this->load->view('sidebar');
			// // $this->load->view('footer');

			$this->load->library('export');
			$this->load->model('m_calon');
			$sql_mentah = $this->m_calon->get_excel_lolos();
			// $sql_mentah=$sql->result_array();
			
			$sql=array();
			$x=0;
			foreach ($sql_mentah as $key) {
				
				//hitungskor
				$this->load->model('m_sch');
				$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
				$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
				$key['calon_aa_skor']=$skor;
				// ksort($key);
				$sql[$x]=$key;
				// $sql[$x]=$skor;
				$x=$x+1;
			}
			
		
			// arsort($sql);

			$sql_revised=array();
			$i=0;
			foreach ($sql as $key) {
				if ($key['calon_status']=='dis') {
					$key['calon_status']='Diskualifikasi';
				}
				if ($key['calon_status']==1) {
					$key['calon_status']='Data valid';
				}
				$sql_revised[$i]=$key;
				$i++;
			}

			// print_r($sql_revised);
			$sql_final=array();
			$j=0;
			foreach ($sql_revised as $key) {
				$newkey=array();
				// print_r($key);
				$newkey['calon_id']=$key['calon_id'];
				$newkey['calon_waktu']=$key['calon_waktu'];
				$newkey['calon_email']=$key['calon_email'];
				$newkey['calon_passwd']=$key['calon_passwd'];
				$newkey['calon_nama']=$key['calon_nama'];
				$newkey['calon_panggilan']=$key['calon_panggilan'];
				$newkey['calon_kelamin']=$key['calon_kelamin'];
				$newkey['calon_tempatlahir']=$key['calon_tempatlahir'];
				$newkey['calon_tanggallahir']=$key['calon_tanggallahir'];
				$newkey['calon_agama']=$key['calon_agama'];
				$newkey['calon_alamat']=$key['calon_alamat'];
				$newkey['calon_asal']=$key['calon_asal'];
				$newkey['calon_nis']=$key['calon_nis'];
				$newkey['calon_nama_ayah']=$key['calon_nama_ayah'];
				$newkey['calon_nama_ibu']=$key['calon_nama_ibu'];
				$newkey['calon_pendidikan_ayah']=$key['calon_pendidikan_ayah'];
				$newkey['calon_pendidikan_ibu']=$key['calon_pendidikan_ibu'];
				$newkey['calon_pekerjaan_ayah']=$key['calon_pekerjaan_ayah'];
				$newkey['calon_pekerjaan_ibu']=$key['calon_pekerjaan_ibu'];
				$newkey['calon_alamat_ortu']=$key['calon_alamat_ortu'];
				$newkey['calon_notelp']=$key['calon_notelp'];
				$newkey['calon_nilai_a']=$key['calon_nilai_a'];
				$newkey['calon_nilai_b']=$key['calon_nilai_b'];
				$newkey['calon_nilai_c']=$key['calon_nilai_c'];
				$newkey['calon_nilai_d']=$key['calon_nilai_d'];
				$newkey['calon_nilai_f']=$key['calon_nilai_f'];
				$newkey['calon_nilai_e']=$key['calon_nilai_e'];
				$newkey['calon_status']=$key['calon_status'];
				$newkey['calon_alasandis']=$key['calon_alasandis'];
				$newkey['calon_aa_skor']=$key['calon_aa_skor'];

				$sql_final[$j]=$newkey;
				$j++;
			}
			// print_r($sql_final);
			$this->export->to_excel($sql_final, 'data_peserta_psb'); 
			

			}
		}
  
	}
	function tidaklolos()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {

			if ($this->tank_auth->get_username()!='admin') {
				redirect('/auth/login/');
			} else {

			$this->load->model('m_calon');
			
			// $data['standar_nilai']="6.0";

			// $data['title']="Lembar Registrasi";
			// $data['is_logged_in']=$this->tank_auth->is_logged_in();
			// $data['user_id']	= $this->tank_auth->get_user_id();
			// $data['username']	= $this->tank_auth->get_username();
			// $data['base_url']=$this->config->base_url();
			// // $this->load->view('header', $data);
			// $this->load->view('v_cetak', $data);
			// // $this->load->view('sidebar');
			// // $this->load->view('footer');

			$this->load->library('export');
			$this->load->model('m_calon');
			$sql_mentah = $this->m_calon->get_excel_tidaklolos();
			// $sql_mentah=$sql->result_array();
			
			$sql=array();
			$x=0;
			foreach ($sql_mentah as $key) {
				
				//hitungskor
				$this->load->model('m_sch');
				$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
				$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
				$key['calon_aa_skor']=$skor;
				// ksort($key);
				$sql[$x]=$key;
				// $sql[$x]=$skor;
				$x=$x+1;
			}
			
		
			// arsort($sql);

			$sql_revised=array();
			$i=0;
			foreach ($sql as $key) {
				if ($key['calon_status']=='dis') {
					$key['calon_status']='Diskualifikasi';
				}
				if ($key['calon_status']==1) {
					$key['calon_status']='Data valid';
				}
				$sql_revised[$i]=$key;
				$i++;
			}

			// print_r($sql_revised);
			$sql_final=array();
			$j=0;
			foreach ($sql_revised as $key) {
				$newkey=array();
				// print_r($key);
				$newkey['calon_id']=$key['calon_id'];
				$newkey['calon_waktu']=$key['calon_waktu'];
				$newkey['calon_email']=$key['calon_email'];
				$newkey['calon_passwd']=$key['calon_passwd'];
				$newkey['calon_nama']=$key['calon_nama'];
				$newkey['calon_panggilan']=$key['calon_panggilan'];
				$newkey['calon_kelamin']=$key['calon_kelamin'];
				$newkey['calon_tempatlahir']=$key['calon_tempatlahir'];
				$newkey['calon_tanggallahir']=$key['calon_tanggallahir'];
				$newkey['calon_agama']=$key['calon_agama'];
				$newkey['calon_alamat']=$key['calon_alamat'];
				$newkey['calon_asal']=$key['calon_asal'];
				$newkey['calon_nis']=$key['calon_nis'];
				$newkey['calon_nama_ayah']=$key['calon_nama_ayah'];
				$newkey['calon_nama_ibu']=$key['calon_nama_ibu'];
				$newkey['calon_pendidikan_ayah']=$key['calon_pendidikan_ayah'];
				$newkey['calon_pendidikan_ibu']=$key['calon_pendidikan_ibu'];
				$newkey['calon_pekerjaan_ayah']=$key['calon_pekerjaan_ayah'];
				$newkey['calon_pekerjaan_ibu']=$key['calon_pekerjaan_ibu'];
				$newkey['calon_alamat_ortu']=$key['calon_alamat_ortu'];
				$newkey['calon_notelp']=$key['calon_notelp'];
				$newkey['calon_nilai_a']=$key['calon_nilai_a'];
				$newkey['calon_nilai_b']=$key['calon_nilai_b'];
				$newkey['calon_nilai_c']=$key['calon_nilai_c'];
				$newkey['calon_nilai_d']=$key['calon_nilai_d'];
				$newkey['calon_nilai_f']=$key['calon_nilai_f'];
				$newkey['calon_nilai_e']=$key['calon_nilai_e'];
				$newkey['calon_status']=$key['calon_status'];
				$newkey['calon_alasandis']=$key['calon_alasandis'];
				$newkey['calon_aa_skor']=$key['calon_aa_skor'];

				$sql_final[$j]=$newkey;
				$j++;
			}
			// print_r($sql_final);
			$this->export->to_excel($sql_final, 'data_peserta_psb'); 
			

			}
		}
  
	}

	function diskualifikasi()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {

			if ($this->tank_auth->get_username()!='admin') {
				redirect('/auth/login/');
			} else {

			$this->load->model('m_calon');
			

			$this->load->library('export');
			$this->load->model('m_calon');
			$sql_mentah = $this->m_calon->get_excel_diskualifikasi();
			// $sql_mentah=$sql->result_array();
			
			$sql=array();
			$x=0;
			foreach ($sql_mentah as $key) {
				
				//hitungskor
				$this->load->model('m_sch');
				$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
				$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
				$key['calon_aa_skor']=$skor;
				// ksort($key);
				$sql[$x]=$key;
				// $sql[$x]=$skor;
				$x=$x+1;
			}
			
		
			// arsort($sql);

			$sql_revised=array();
			$i=0;
			foreach ($sql as $key) {
				if ($key['calon_status']=='dis') {
					$key['calon_status']='Diskualifikasi';
				}
				if ($key['calon_status']==1) {
					$key['calon_status']='Data valid';
				}
				$sql_revised[$i]=$key;
				$i++;
			}

			// print_r($sql_revised);
			$sql_final=array();
			$j=0;
			foreach ($sql_revised as $key) {
				$newkey=array();
				// print_r($key);
				$newkey['calon_id']=$key['calon_id'];
				$newkey['calon_waktu']=$key['calon_waktu'];
				$newkey['calon_email']=$key['calon_email'];
				$newkey['calon_passwd']=$key['calon_passwd'];
				$newkey['calon_nama']=$key['calon_nama'];
				$newkey['calon_panggilan']=$key['calon_panggilan'];
				$newkey['calon_kelamin']=$key['calon_kelamin'];
				$newkey['calon_tempatlahir']=$key['calon_tempatlahir'];
				$newkey['calon_tanggallahir']=$key['calon_tanggallahir'];
				$newkey['calon_agama']=$key['calon_agama'];
				$newkey['calon_alamat']=$key['calon_alamat'];
				$newkey['calon_asal']=$key['calon_asal'];
				$newkey['calon_nis']=$key['calon_nis'];
				$newkey['calon_nama_ayah']=$key['calon_nama_ayah'];
				$newkey['calon_nama_ibu']=$key['calon_nama_ibu'];
				$newkey['calon_pendidikan_ayah']=$key['calon_pendidikan_ayah'];
				$newkey['calon_pendidikan_ibu']=$key['calon_pendidikan_ibu'];
				$newkey['calon_pekerjaan_ayah']=$key['calon_pekerjaan_ayah'];
				$newkey['calon_pekerjaan_ibu']=$key['calon_pekerjaan_ibu'];
				$newkey['calon_alamat_ortu']=$key['calon_alamat_ortu'];
				$newkey['calon_notelp']=$key['calon_notelp'];
				$newkey['calon_nilai_a']=$key['calon_nilai_a'];
				$newkey['calon_nilai_b']=$key['calon_nilai_b'];
				$newkey['calon_nilai_c']=$key['calon_nilai_c'];
				$newkey['calon_nilai_d']=$key['calon_nilai_d'];
				$newkey['calon_nilai_f']=$key['calon_nilai_f'];
				$newkey['calon_nilai_e']=$key['calon_nilai_e'];
				$newkey['calon_status']=$key['calon_status'];
				$newkey['calon_alasandis']=$key['calon_alasandis'];
				$newkey['calon_aa_skor']=$key['calon_aa_skor'];

				$sql_final[$j]=$newkey;
				$j++;
			}
			// print_r($sql_final);
			$this->export->to_excel($sql_final, 'data_peserta_psb'); 
			

			}
		}
  
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */