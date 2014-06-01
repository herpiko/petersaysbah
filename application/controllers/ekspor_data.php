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
			
<<<<<<< HEAD
			// $data['standar_nilai']="6.0";
=======
			// $data['standar_nilai']=$this->m_calon->standar_nilai();
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0

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
<<<<<<< HEAD
			$sql=$sql->result_array();
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
=======
			$this->export->to_excel($sql, 'nameForFile'); 
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
			

			}
		}
  
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */