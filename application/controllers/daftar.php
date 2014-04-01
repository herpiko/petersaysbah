<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller
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
		
			
			$data['title']="Formulir Pendaftaran";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();


			$this->load->view('header', $data);
			$this->load->view('v_daftar', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');


		// }
	}

	function submit()
	{
		$this->load->model('m_calon');

		$email=$this->input->post('email');
		$passwd=$this->input->post('passwd');
		$nama=$this->input->post('nama');
		$tempatlahir=$this->input->post('tempatlahir');
		$tanggallahir=$this->input->post('tanggallahir');
		$kelamin=$this->input->post('kelamin');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$nohp=$this->input->post('nohp');
		$asal=$this->input->post('asal');
		$nilai=$this->input->post('nilai');
		$nilai_a=$this->input->post('nilai_a');
		$nilai_b=$this->input->post('nilai_b');
		$nilai_c=$this->input->post('nilai_c');
		$nilai_d=$this->input->post('nilai_d');
		$nilai_e=$this->input->post('nilai_e');
		$nilai_f=$this->input->post('nilai_f');

		$this->m_calon->submit($email,$passwd,$nama,$tempatlahir,$tanggallahir,$kelamin,$alamat,$notelp,$nohp,$asal,$nilai,$nilai_a,$nilai_b,$nilai_c,$nilai_d,$nilai_e,$nilai_f);

		$data['title']="Formulir Pendaftaran";
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$this->load->view('header', $data);
		$this->load->view('v_submitted', $data);
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */