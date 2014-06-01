<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public $data 	= 	array();

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		// parent::__construct(); for CI 2.x users
 
		$this->load->helper('url'); //You should autoload this one ;)
		$this->load->helper('ckeditor');
		$this->load->model('m_calon');
 
 
		//Ckeditor's configuration
		$this->data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'content',
			'path'	=>	'assets/ckeditor/',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
 
		$this->data['ckeditor_2'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'content_2',
			'path'	=>	'js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
				'toolbar' 	=> 	array(	//Setting a custom toolbar
					array('Bold', 'Italic'),
					array('Underline', 'Strike', 'FontSize'),
					array('Smiley'),
					'/'
				)
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 3' => array (
					'name' 		=> 	'Green Title',
					'element' 	=> 	'h3',
					'styles' => array(
						'color' 	=> 	'Green',
						'font-weight' 	=> 	'bold'
					)
				)
 
			)
		);		
 
 
	}

	function index($action=NULL)
	{
		// if (!$this->tank_auth->is_logged_in()) {
		// 	redirect('/auth/login/');
		// } else {

		
			$this->load->model('m_halaman');
			// $this->load->model('m_calon');
			// $data['standar_nilai']="6.0";
			// $this->load->model('m_pengaturan');
			// $tetapan=$this->m_pengaturan->baca();
			// $tglbuka=$tetapan[1]['nilai'];
			// $tgltutup=$tetapan[2]['nilai'];
			// $tglpengumuman=$tetapan[3]['nilai'];

			// $today = date('d-m-Y');
			
			// $tglbuka_d=substr($tglbuka, 0,2);
			// if (substr($tglbuka_d, 0,1)=="0") {
			// 	$tglbuka_d=substr($tglbuka_d, 1,1);
			// }
			// $tglbuka_m=substr($tglbuka, 3,2);
			// if (substr($tglbuka_m, 0,1)=="0") {
			// 	$tglbuka_m=substr($tglbuka_m, 1,1);
			// }

			// $tgltutup_d=substr($tgltutup, 0,2);
			// if (substr($tgltutup_d, 0,1)=="0") {
			// 	$tgltutup_d=substr($tgltutup_d, 1,1);
			// }
			// $tgltutup_m=substr($tgltutup, 3,2);
			// if (substr($tgltutup_m, 0,1)=="0") {
			// 	$tgltutup_m=substr($tgltutup_m, 1,1);
			// }

			// $tglpengumuman_d=substr($tglpengumuman, 0,2);
			// if (substr($tglpengumuman_d, 0,1)=="0") {
			// 	$tglpengumuman_d=substr($tglpengumuman_d, 1,1);
			// }
			// $tglpengumuman_m=substr($tglpengumuman, 3,2);
			// if (substr($tglpengumuman_m, 0,1)=="0") {
			// 	$tglpengumuman_m=substr($tglpengumuman_m, 1,1);
			// }

			// $today_d=substr($today, 0,2);
			// if (substr($today_d, 0,1)=="0") {
			// 	$today_d=substr($today_d, 1,1);
			// }
			// $today_m=substr($today, 3,2);
			// if (substr($today_m, 0,1)=="0") {
			// 	$today_m=substr($today_m, 1,1);
			// }

			// //string pesan
			// $akandibuka="Pendaftaran akan dibuka tanggal ".$tglbuka;
			// $telahdibuka="Pendaftaran telah dibuka dan akan ditutup tanggal ".$tgltutup;
			// $telahditutup="Pendaftaran telah ditutup. Pengumuman akan dirilis tanggal ".$tglpengumuman;
			// $pengumuman="Hasil pengumuman dapat dilihat <a href=\"\">di sini</a>";

			// $pesan="";
			// if ($today_m==$tglbuka_m) {
			// 	if ($tglbuka_m==$tgltutup_m) {
			// 		if ($today_d<$tglbuka_d) {
			// 			$pesan=$akandibuka;
			// 			} else {
			// 				if ($today_d<$tgltutup_d) {
			// 					$pesan=$telahdibuka;
			// 				} else {
			// 					if ($today_d<$tglpengumuman_d) {
			// 						$pesan=$telahditutup;
			// 						}	
			// 					if ($today_d>$tglpengumuman_d) {
			// 						$pesan=$pengumuman;
			// 						}
			// 			}
			// 		}
			// 	} else {
			// 		if ($tglbuka_m<$tgltutup_m) {
			// 			if ($today_m<$tgltutup_m) {
			// 				$pesan=$telahdibuka;
			// 			}
			// 			if ($today_m==$tgltutup_m) {
			// 				if ($today_d<$tgltutup_d) {
			// 					$pesan=$telahdibuka;
			// 				} else {
			// 					if ($today_d<$tglpengumuman_d) {
			// 						$pesan=$telahditutup;
			// 						}	
			// 					if ($today_d>$tglpengumuman_d) {
			// 						$pesan=$pengumuman;
			// 						}
			// 				}
			// 			}
			// 		}
			// 	}
			// }

			// if ($today_m<$tglbuka_m){
			// 	$pesan=$akandibuka;
			// }

			// if ($today_m>$tglbuka_m){
			// 	if ($tglbuka_m<$tgltutup_m) {
			// 			if ($today_m<$tgltutup_m) {
			// 				$pesan=$telahdibuka;
			// 			}
			// 			if ($today_m==$tgltutup_m) {
			// 				if ($today_d<$tgltutup_d) {
			// 					$pesan=$telahdibuka;
			// 				} else {
			// 					if ($today_d<$tglpengumuman_d) {
			// 						$pesan=$telahditutup;
			// 						}	
			// 					if ($today_d>$tglpengumuman_d) {
			// 						$pesan=$pengumuman;
			// 						}
			// 				}
			// 			}
			// 		}
			// }


			// $data['pesan']=$pesan;
			
			$isi=$this->input->post('halaman_isi');
			$halaman=$this->m_halaman->get(0);
			$data['halaman_isi']=$halaman['halaman_isi'];
			$data['halaman_judul']=$halaman['halaman_judul'];
			$data['title']="Selamat Datang";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			$this->load->view('header', $data);
			$this->load->view('v_halaman', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');


		// }
	}
		function update()
	{

			$this->load->model('m_halaman');
			
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
		
	if ($this->m_calon->get_level($data['user_id'])!='admin') {
			redirect('/auth/login/');
		} else {
			$isi=$this->input->post('halaman_isi');
			$halaman=$this->m_halaman->get(0);
			$data['halaman_isi']=$halaman['halaman_isi'];
			$data['halaman_judul']=$halaman['halaman_judul'];
			$this->m_halaman->update(0,$isi);

		}
		redirect('/'.$data['halaman_judul'], 'refresh');

	}

	function edit(){
			$this->load->model('m_halaman');
			$this->load->model('m_calon');
			$data['standar_nilai']="6.0";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
	
		if ($this->m_calon->get_level($data['user_id'])!='admin') {
			redirect('/auth/login/');
		} else {
			$halaman=$this->m_halaman->get(0);
			$data['halaman_isi']=$halaman['halaman_isi'];
			$data['halaman_judul']=$halaman['halaman_judul'];
			$data['title']="Selamat Datang";
			$data['base_url']=$this->config->base_url();
			$this->load->view('header', $data);
			$this->load->view('v_halaman_edit', $this->data);
			$this->load->view('sidebar');
			$this->load->view('footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */