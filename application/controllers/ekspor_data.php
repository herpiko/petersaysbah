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
			
			// $data['standar_nilai']=$this->m_calon->standar_nilai();

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
			$sql = $this->m_calon->get_all();
			$this->export->to_excel($sql, 'nameForFile'); 
			

			}
		}
  
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */