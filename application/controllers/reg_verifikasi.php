<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reg_verifikasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	function index()
	{
		// if (!$this->tank_auth->is_logged_in()) {
		// 	redirect('/auth/login/');
		// } else {
			
			$data['title']="Terima kasih sudah mendaftar";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			$this->load->model('m_calon');
			$data['standar_nilai']="6.0";
			$this->load->view('header', $data);
			$this->load->view('v_reg_verifikasi', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');


		// }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */