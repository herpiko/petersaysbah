<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
<<<<<<< HEAD
		$this->load->model('m_calon');
=======
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
	}

	function index($action=NULL)
	{
<<<<<<< HEAD

=======
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

		// mesti login dan admin
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
<<<<<<< HEAD
			if ($this->m_calon->get_level($data['user_id'])!='admin') {
=======
			if (!$data['username']=="admin") {
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
			redirect('/auth/login/');
			} else {

			$this->load->model('m_pengaturan');
			$tetapan=$this->m_pengaturan->baca();
			$this->load->model('m_calon');
<<<<<<< HEAD
			$data['standar_nilai']="6.0";
=======
			$data['standar_nilai']=$this->m_calon->standar_nilai();
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
			
			$data['dayatampung']=$tetapan[0]['nilai'];
			$data['tglbuka']=$tetapan[1]['nilai'];
			$data['tgltutup']=$tetapan[2]['nilai'];
			$data['tglpengumuman']=$tetapan[3]['nilai'];
			
			$data['title']="Pengaturan";

<<<<<<< HEAD
			if ($action==1) {
				$data['notif']="Setelan baru telah disimpan";
			} else {
				$data['notif']="0"	;
			}

=======
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
			$data['base_url']=$this->config->base_url();
			$this->load->view('header', $data);
			$this->load->view('v_pengaturan', $data);
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
<<<<<<< HEAD
				$action=1;
		$this->index($action);
=======
		$this->index();
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */