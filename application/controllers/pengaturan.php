<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->model('m_calon');
	}

	function index($action=NULL)
	{

			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			// echo "tes";
		//mesti login dan admin
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			if ($this->m_calon->get_level($data['user_id'])!='admin') {
			redirect('/auth/login/');
			} else {

			$this->load->model('m_pengaturan');
			$this->load->model('m_sch');
			$tetapan=$this->m_pengaturan->baca();
			
			

			$this->load->model('m_calon');
			$data['standar_nilai']="6.0";
			
			$data['dayatampung']=$tetapan[0]['nilai'];
			$data['tglbuka']=$tetapan[1]['nilai'];
			$data['tgltutup']=$tetapan[2]['nilai'];
			$data['tglpengumuman']=$tetapan[3]['nilai'];
			
			$data['title']="Pengaturan";

			
			$data['prioritas']=$this->m_sch->get_all();
			$data['base_url']=$this->config->base_url();
			$this->load->view('header', $data);
			$this->load->view('v_pengaturan', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');
			}

		}
	}

	function truncate($action=NULL)
	{

			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			// echo "tes";
		//mesti login dan admin
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			if ($this->m_calon->get_level($data['user_id'])!='admin') {
			redirect('/auth/login/');
			} else {

			$this->load->model('m_calon');
			$this->m_calon->truncate();
			redirect('pengaturan');
		
			}

		}
	}

	function prioritas_sekolah($action=NULL)
	{

			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

		// mesti login dan admin
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			if ($this->m_calon->get_level($data['user_id'])!='admin') {
			redirect('/auth/login/');
			} else {

			$this->load->model('m_pengaturan');
			$this->load->model('m_sch');
			$tetapan=$this->m_pengaturan->baca();
			
			

			$this->load->model('m_calon');
			
			
			$data['title']="Prioritas Asal Sekolah";
			// print_r($tetapan);
			$data['sekolahlain']=$tetapan[4];
			$data['prioritas']=$this->m_sch->get_all();
			$data['base_url']=$this->config->base_url();
			$this->load->view('header', $data);
			$this->load->view('v_pengaturan_sekolah_asal', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');
		

		}

		}
	}

	function simpan(){

	
				$dayatampung=$this->input->post('dayatampung');
				$tglbuka=$this->input->post('tglbuka');
				$tgltutup=$this->input->post('tgltutup');
				$tglpengumuman=$this->input->post('tglpengumuman');
		
				$this->load->model('m_pengaturan');
				$this->m_pengaturan->simpan($dayatampung,$tglbuka,$tgltutup,$tglpengumuman);
				$action=1;
				//$this->index($action);
				redirect('pengaturan');

	}

	function prioritas_simpan(){

	
				$sch_id=$this->input->post('sch_id');
				$sch_name=$this->input->post('sch_name');
				$sch_multipler=$this->input->post('sch_multipler');
		
				$this->load->model('m_sch');
				$this->m_sch->simpan($sch_id,$sch_name,$sch_multipler);
				//$this->index($action);
				 
				redirect('pengaturan/prioritas_sekolah');

	}

	function prioritas_simpan_sekolahlain(){

				$sch_multipler=$this->input->post('sch_multipler');
		
				$this->load->model('m_pengaturan');
				$this->m_pengaturan->simpan_sekolahlain($sch_multipler);
				//$this->index($action);
				 // echo "tes";
				 // echo $sch_multipler;
				redirect('pengaturan/prioritas_sekolah');

	}
	function prioritas_tambah(){
				$sch_name=$this->input->post('sch_name');
				$sch_multipler=$this->input->post('sch_multipler');
		
				$this->load->model('m_sch');
				$this->m_sch->tambah($sch_name,$sch_multipler);
				//$this->index($action);
				 
				redirect('pengaturan/prioritas_sekolah');

	}
	function prioritas_hapus(){

	
				$sch_id=$this->input->post('sch_id');
				
				$this->load->model('m_sch');
				$this->m_sch->hapus($sch_id);
				//$this->index($action);
				 
				redirect('pengaturan/prioritas_sekolah');

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */