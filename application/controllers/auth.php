<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
	}

	function index()
	{
		if ($message = $this->session->flashdata('message')) {
			$this->load->view('auth/general_message', array('message' => $message));
		} else {
			redirect('/auth/login/');
		}
	}

	/**
	 * Login user on the site
	 *
	 * @return void
	 */
	function freeze() {
			$this->load->model('m_calon');
			$data['title']="Pendaftaran belum dibuka";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			$this->load->view('header', $data);
			$this->load->view('v_reg_pesan', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');
	}
	function pra() {
			$this->load->model('m_calon');
			$data['title']="Pendaftaran belum dibuka";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			$this->load->view('header', $data);
			$this->load->view('v_reg_pesan', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');
	}

	function pasca() {
			$this->load->model('m_calon');
			$data['title']="Pendaftaran telah ditutup";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			$this->load->view('header', $data);
			$this->load->view('v_reg_pesan', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');
	}


	function login()
	{
		if ($this->tank_auth->is_logged_in()) {									// logged in
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
					$this->config->item('use_username', 'tank_auth'));
			$data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

			$this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('remember', 'Remember me', 'integer');

			// Get login for counting attempts to login
			if ($this->config->item('login_count_attempts', 'tank_auth') AND
					($login = $this->input->post('login'))) {
				$login = $this->security->xss_clean($login);
			} else {
				$login = '';
			}

			$data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
				if ($data['use_recaptcha'])
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				else
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
			}
			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->login(
						$this->form_validation->set_value('login'),
						$this->form_validation->set_value('password'),
						$this->form_validation->set_value('remember'),
						$data['login_by_username'],
						$data['login_by_email'])) {	
					$username	= $this->tank_auth->get_username();							// success
					if ($username=="admin") {
						redirect('/peringkat/latest');
					} else {
						redirect('/profil');	
					}
					

				} else {
					$errors = $this->tank_auth->get_error_message();
					if (isset($errors['banned'])) {								// banned user
						$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

					} elseif (isset($errors['not_activated'])) {				// not activated user
						redirect('/auth/send_again/');

					} else {													// fail
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
			}
			$data['show_captcha'] = FALSE;
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
				$data['show_captcha'] = TRUE;
				if ($data['use_recaptcha']) {
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$data['captcha_html'] = $this->_create_captcha();
				}
			}

			$data['title']="Login";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			
			$this->load->view('header', $data);
			$this->load->view('v_login', $data);
			$this->load->view('sidebar_login');
			$this->load->view('footer');


		}
	}

	/**
	 * Logout user
	 *
	 * @return void
	 */
	function logout()
	{
		$this->tank_auth->logout();

		$this->_show_message($this->lang->line('auth_message_logged_out'));
	}

	function killyourself()
	{
		$this->tank_auth->logout();
	}

	/**
	 * Register user on the site
	 *
	 * @return void
	 */
	function register()
	{

		


		if ($this->tank_auth->is_logged_in()) {									// logged in
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} elseif (!$this->config->item('allow_registration', 'tank_auth')) {	// registration is off
			$this->_show_message($this->lang->line('auth_message_registration_disabled'));

		} else {
			$use_username = $this->config->item('use_username', 'tank_auth');
			if ($use_username) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
			}
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

			$captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
			$use_recaptcha			= $this->config->item('use_recaptcha', 'tank_auth');
			if ($captcha_registration) {
				if ($use_recaptcha) {
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				} else {
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
				}
			}
			$data['errors'] = array();

			$email_activation = $this->config->item('email_activation', 'tank_auth');

			if ($this->form_validation->run()) {	 					// validation ok	

				if ($_FILES['userfile']['type']=="image/jpg") {
						redirect('/upload_failed');
						exit();
					}	
				if (!is_null($data = $this->tank_auth->create_user(
						$use_username ? $this->form_validation->set_value('username') : '',
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
						$email_activation))) {									// success

					//insert calon data
		$this->load->model('m_calon');


		$email=$this->input->post('email');
		$passwd="";
		$nama=$this->input->post('nama');
		
		$panggilan=$this->input->post('panggilan');
		$kelamin=$this->input->post('kelamin');
		$tempatlahir=$this->input->post('tempatlahir');
		$tanggallahir=$this->input->post('tanggallahir');
		$agama=$this->input->post('agama');
		$nis=$this->input->post('nis');
		$nama_ayah=$this->input->post('nama_ayah');
		$nama_ibu=$this->input->post('nama_ibu');
		$pendidikan_ayah=$this->input->post('pendidikan_ayah');
		$pendidikan_ibu=$this->input->post('pendidikan_ibu');
		$pekerjaan_ayah=$this->input->post('pekerjaan_ayah');
		$pekerjaan_ibu=$this->input->post('pekerjaan_ibu');
		$alamat=$this->input->post('alamat');
		$alamat_ortu=$this->input->post('alamat_ortu');
		$notelp=$this->input->post('notelp');
		$asal=$this->input->post('asal');
		$selfie=$this->input->post('selfie');
		$sekolahlain=$this->input->post('sekolahlain');
		
		$nama=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($nama))));
		$panggilan=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($panggilan))));
		$tempatlahir=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($tempatlahir))));
		$agama=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($agama))));
		$nama_ayah=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($nama_ayah))));
		$nama_ibu=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($nama_ibu))));
		$pekerjaan_ayah=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($pekerjaan_ayah))));
		$pekerjaan_ibu=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($pekerjaan_ibu))));
		$alamat=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($alamat))));
		$alamat_ortu=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($alamat_ortu))));
		$asal=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($asal))));
		
			
		$nilai_a=$this->input->post('nilai_a');
		$nilai_b=$this->input->post('nilai_b');
		$nilai_c=$this->input->post('nilai_c');
		$nilai_d=$this->input->post('nilai_d');
		// $nilai_e=$this->input->post('nilai_e');
		$nilai_total=$nilai_a+$nilai_b+$nilai_c+$nilai_d;
		$nilai_f=$nilai_total/4;
		$nilai_f=substr($nilai_f, 0,4);

		$nilai_bi_1=$this->input->post('nilai_bi_1');
		$nilai_bi_2=$this->input->post('nilai_bi_2');
		$nilai_bi_3=$this->input->post('nilai_bi_3');
		$nilai_bi_4=$this->input->post('nilai_bi_4');
		$nilai_bi_5=$this->input->post('nilai_bi_5');
		$nilai_bi_6=$this->input->post('nilai_bi_6');
		$nilai_bi_av=($nilai_bi_1+$nilai_bi_2+$nilai_bi_3+$nilai_bi_4+$nilai_bi_5+$nilai_bi_6)/6;

		$nilai_ma_1=$this->input->post('nilai_ma_1');
		$nilai_ma_2=$this->input->post('nilai_ma_2');
		$nilai_ma_3=$this->input->post('nilai_ma_3');
		$nilai_ma_4=$this->input->post('nilai_ma_4');
		$nilai_ma_5=$this->input->post('nilai_ma_5');
		$nilai_ma_6=$this->input->post('nilai_ma_6');
		$nilai_ma_av=($nilai_ma_1+$nilai_ma_2+$nilai_ma_3+$nilai_ma_4+$nilai_ma_5+$nilai_ma_6)/6;

		$nilai_en_1=$this->input->post('nilai_en_1');
		$nilai_en_2=$this->input->post('nilai_en_2');
		$nilai_en_3=$this->input->post('nilai_en_3');
		$nilai_en_4=$this->input->post('nilai_en_4');
		$nilai_en_5=$this->input->post('nilai_en_5');
		$nilai_en_6=$this->input->post('nilai_en_6');
		$nilai_en_av=($nilai_en_1+$nilai_en_2+$nilai_en_3+$nilai_en_4+$nilai_en_5+$nilai_en_6)/6;

		$nilai_bo_1=$this->input->post('nilai_bo_1');
		$nilai_bo_2=$this->input->post('nilai_bo_2');
		$nilai_bo_3=$this->input->post('nilai_bo_3');
		$nilai_bo_4=$this->input->post('nilai_bo_4');
		$nilai_bo_5=$this->input->post('nilai_bo_5');
		$nilai_bo_6=$this->input->post('nilai_bo_6');
		$nilai_bo_av=($nilai_bo_1+$nilai_bo_2+$nilai_bo_3+$nilai_bo_4+$nilai_bo_5+$nilai_bo_6)/6;

		$semester_1=$nilai_bi_1."-".$nilai_ma_1."-".$nilai_en_1."-".$nilai_bo_1;
		$semester_2=$nilai_bi_2."-".$nilai_ma_2."-".$nilai_en_2."-".$nilai_bo_2;
		$semester_3=$nilai_bi_3."-".$nilai_ma_3."-".$nilai_en_3."-".$nilai_bo_3;
		$semester_4=$nilai_bi_4."-".$nilai_ma_4."-".$nilai_en_4."-".$nilai_bo_4;
		$semester_5=$nilai_bi_5."-".$nilai_ma_5."-".$nilai_en_5."-".$nilai_bo_5;
		$semester_6=$nilai_bi_6."-".$nilai_ma_6."-".$nilai_en_6."-".$nilai_bo_6;
		$semester_all=$semester_1."_".$semester_2."_".$semester_3."_".$semester_4."_".$semester_5."_".$semester_6;
		// $nilai_fi_1=$this->input->post('nilai_fi_1');
		// $nilai_fi_2=$this->input->post('nilai_fi_2');
		// $nilai_fi_3=$this->input->post('nilai_fi_3');
		// $nilai_fi_4=$this->input->post('nilai_fi_4');
		// $nilai_fi_5=$this->input->post('nilai_fi_5');
		// $nilai_fi_6=$this->input->post('nilai_fi_6');
		// $nilai_fi_av=($nilai_fi_1+$nilai_fi_2+$nilai_fi_3+$nilai_fi_4+$nilai_fi_5+$nilai_fi_6)/6;

		$nilai_e=($nilai_bi_av+$nilai_ma_av+$nilai_en_av+$nilai_bo_av)/4;

		$this->load->model('m_sch');
		
		
		
		if ($asal==0) {
			$asal=$sekolahlain;
			$multipler=3;
		} else {
			$multipler=$this->m_sch->get_multipler($asal);
			$asal=$this->m_sch->get_name($asal);
		}
		
		
		$nilai_g=((40/100)*($nilai_f*$multipler))+((60/100)*($nilai_e*$multipler));
		
		

		// $nilai_e=$this->input->post('nilai_e');
		// $nilai_f=$this->input->post('nilai_f');
		
		$x="";
		$i=0;
		while ($x!="@") {
			$x=substr($email, $i,1);
			$i++;
		}
		$i--;
		$username=substr($email,0,$i);
		
		$this->m_calon->set_username($username,$email);

		$id=$this->m_calon->get_id($email);


		// Selfie block
		$config['upload_path'] = './uploads/selfie';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '512';
		$config['file_name']  = $id."_".md5($email).".jpg";
		$selfie=$this->config->base_url()."uploads/selfie/".$config['file_name'];

		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		// if ( ! $this->upload->do_upload())
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// }
		// chmod('/uploads/selfie'.$config['file_name'], 0755);

		$this->m_calon->submit($id,$email,$passwd,$selfie,$nama,$panggilan,$kelamin,$tempatlahir,$tanggallahir,$agama,$alamat,$asal,$nis,$nama_ayah,$nama_ibu,$pendidikan_ayah,$pendidikan_ibu,$pekerjaan_ayah,$pekerjaan_ibu,$alamat_ortu,$notelp,$nilai_a,$nilai_b,$nilai_c,$nilai_d,$nilai_e,$nilai_f,$nilai_g,$nilai_bi_1,$nilai_bi_2,$nilai_bi_3,$nilai_bi_4,$nilai_bi_5,$nilai_bi_6,$nilai_bi_av,$nilai_ma_1,$nilai_ma_2,$nilai_ma_3,$nilai_ma_4,$nilai_ma_5,$nilai_ma_6,$nilai_ma_av,$nilai_en_1,$nilai_en_2,$nilai_en_3,$nilai_en_4,$nilai_en_5,$nilai_en_6,$nilai_en_av,$nilai_bo_1,$nilai_bo_2,$nilai_bo_3,$nilai_bo_4,$nilai_bo_5,$nilai_bo_6,$nilai_bo_av,$semester_all);


		



					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					if ($email_activation) {									// send "activate" email
						$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

						$this->_send_email('activate', $data['email'], $data);

						unset($data['password']); // Clear password (just for any case)

						//$this->_show_message($this->lang->line('auth_message_registration_completed_1'));
						
						// echo "berhasil";
						// echo $_FILES['selfie']['name'];
						redirect('/reg_verifikasi');

					} else {
						if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

							$this->_send_email('welcome', $data['email'], $data);
						}
						unset($data['password']); // Clear password (just for any case)
						//$this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/auth/login/', 'Login'));

						redirect('/reg_ok');

						
					}
				} else {
					$errors = $this->tank_auth->get_error_message();

					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			if ($captcha_registration) {
				if ($use_recaptcha) {
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$data['captcha_html'] = $this->_create_captcha();
				}
			}

			
			$this->load->model('m_pengaturan');
			$pengaturan=$this->m_pengaturan->baca();
			
			$tetapan=$this->m_pengaturan->baca();
			$tglbuka=$tetapan[1]['nilai'];
			$tgltutup=$tetapan[2]['nilai'];
			$tglpengumuman=$tetapan[3]['nilai'];
			$tglbuka=substr($tglbuka,6,4).substr($tglbuka,3,2).substr($tglbuka,0,2)."070000";
			$tgltutup=substr($tgltutup,6,4).substr($tgltutup,3,2).substr($tgltutup,0,2)."120000";
			$tglpengumuman=substr($tglpengumuman,6,4).substr($tglpengumuman,3,2).substr($tglpengumuman,0,2)."070000";
			$today = date('YmdHis');
			
			//$today = date('Ymd');
			// echo $today;
			// echo $tglbuka;

			if ($tglbuka > $today) {
			redirect('/auth/pra');
			}

			if ($tgltutup < $today) {
			redirect('/auth/pasca');
			}


			$this->load->model('m_sch');
			$data['sch']=$this->m_sch->get_all();
			// print_r($data['sch']);


			$this->load->model('m_calon');
			$this->m_calon->bersih_bersih();
			
			$data['use_username'] = $use_username;
			$data['captcha_registration'] = $captcha_registration;
			$data['use_recaptcha'] = $use_recaptcha;
			$data['title']="Formulir Pendaftaran";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			$this->load->view('header', $data);
			$this->load->view('v_reg', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');


		}
	}

	/**
	 * Send activation email again, to the same or new email address
	 *
	 * @return void
	 */
	function send_again()
	{
		if (!$this->tank_auth->is_logged_in(FALSE)) {							// not logged in or activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->change_email(
						$this->form_validation->set_value('email')))) {			// success

					$data['site_name']	= $this->config->item('website_name', 'tank_auth');
					$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

					$this->_send_email('activate', $data['email'], $data);

					$this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['email']));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}


			$data['title']="Kirim ulang email verifikasi";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			$this->load->model('m_calon');
			$data['standar_nilai']="6.0";
			$this->load->view('header', $data);
			$this->load->view('v_reg_send_again', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');
			
		}
	}

	/**
	 * Activate user account.
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function activate()
	{
		$user_id		= $this->uri->segment(3);
		$new_email_key	= $this->uri->segment(4);

		// Activate user
		if ($this->tank_auth->activate_user($user_id, $new_email_key)) {		// success
			$this->tank_auth->logout();
			// $this->_show_message($this->lang->line('auth_message_activation_completed').' '.anchor('/auth/login/', 'Login'));
			redirect('reg_activated');

		} else {																// fail
			$this->_show_message($this->lang->line('auth_message_activation_failed'));
		}
	}

	/**
	 * Generate reset code (to change password) and send it to user
	 *
	 * @return void
	 */
	function forgot_password()
	{
		if ($this->tank_auth->is_logged_in()) {									// logged in
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$this->form_validation->set_rules('login', 'Email or login', 'trim|required|xss_clean');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->forgot_password(
						$this->form_validation->set_value('login')))) {

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					// Send email with password activation link
					$this->_send_email('forgot_password', $data['email'], $data);

					$this->_show_message($this->lang->line('auth_message_new_password_sent'));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}

			$data['title']="Lupa password";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			$this->load->model('m_calon');
			$data['standar_nilai']="6.0";
			$this->load->view('header', $data);
			$this->load->view('v_reg_forgot', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');
		}
	}

	/**
	 * Replace user password (forgotten) with a new one (set by user).
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function reset_password()
	{
		$user_id		= $this->uri->segment(3);
		$new_pass_key	= $this->uri->segment(4);

		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

		$data['errors'] = array();

		if ($this->form_validation->run()) {								// validation ok
			if (!is_null($data = $this->tank_auth->reset_password(
					$user_id, $new_pass_key,
					$this->form_validation->set_value('new_password')))) {	// success

				$data['site_name'] = $this->config->item('website_name', 'tank_auth');

				// Send email with new password
				$this->_send_email('reset_password', $data['email'], $data);

				$this->_show_message($this->lang->line('auth_message_new_password_activated').' '.anchor('/auth/login/', 'Login'));

			} else {														// fail
				$this->_show_message($this->lang->line('auth_message_new_password_failed'));
			}
		} else {
			// Try to activate user by password key (if not activated yet)
			if ($this->config->item('email_activation', 'tank_auth')) {
				$this->tank_auth->activate_user($user_id, $new_pass_key, FALSE);
			}

			if (!$this->tank_auth->can_reset_password($user_id, $new_pass_key)) {
				$this->_show_message($this->lang->line('auth_message_new_password_failed'));
			}
		}
		$this->load->view('auth/reset_password_form', $data);
	}

	/**
	 * Change user password
	 *
	 * @return void
	 */
	function change_password_success(){
					$data['title']="Ganti Password";
					$data['is_logged_in']=$this->tank_auth->is_logged_in();
					$data['user_id']	= $this->tank_auth->get_user_id();
					$data['username']	= $this->tank_auth->get_username();
					$data['base_url']=$this->config->base_url();
					$data['pesan']="Password berhasil diganti.";
					$this->load->model('m_calon');
					$this->load->view('header', $data);
					$this->load->view('v_reg_changepass_success', $data);
					$this->load->view('sidebar');
					$this->load->view('footer');
	}
	function change_password()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->change_password(
						$this->form_validation->set_value('old_password'),
						$this->form_validation->set_value('new_password'))) {	// success
					// $this->_show_message($this->lang->line('auth_message_password_changed'));
					redirect('/auth/change_password_success');
					

				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}

			$data['title']="Ganti password...";
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['base_url']=$this->config->base_url();
			$this->load->model('m_calon');
			$data['standar_nilai']="6.0";
			$this->load->view('header', $data);
			$this->load->view('v_reg_changepass', $data);
			$this->load->view('sidebar');
			$this->load->view('footer');
			//$this->load->view('auth/change_password_form', $data);
		}
	}

	/**
	 * Change user email
	 *
	 * @return void
	 */
	function change_email()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->set_new_email(
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password')))) {			// success

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					// Send email with new email address and its activation link
					$this->_send_email('change_email', $data['new_email'], $data);

					$this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['new_email']));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('auth/change_email_form', $data);
		}
	}

	/**
	 * Replace user email with a new one.
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function reset_email()
	{
		$user_id		= $this->uri->segment(3);
		$new_email_key	= $this->uri->segment(4);

		// Reset email
		if ($this->tank_auth->activate_new_email($user_id, $new_email_key)) {	// success
			$this->tank_auth->logout();
			$this->_show_message($this->lang->line('auth_message_new_email_activated').' '.anchor('/auth/login/', 'Login'));

		} else {																// fail
			$this->_show_message($this->lang->line('auth_message_new_email_failed'));
		}
	}

	/**
	 * Delete user from the site (only when user is logged in)
	 *
	 * @return void
	 */
	function unregister()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->delete_user(
						$this->form_validation->set_value('password'))) {		// success
					$this->_show_message($this->lang->line('auth_message_unregistered'));

				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('auth/unregister_form', $data);
		}
	}

	/**
	 * Show info message
	 *
	 * @param	string
	 * @return	void
	 */
	function _show_message($message)
	{
		$this->session->set_flashdata('message', $message);
		redirect('/auth/');
	}

	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
		// echo $this->email->print_debugger();
	}

	/**
	 * Create CAPTCHA image to verify user as a human
	 *
	 * @return	string
	 */
	function _create_captcha()
	{
		$this->load->helper('captcha');

		$cap = create_captcha(array(
			'img_path'		=> './'.$this->config->item('captcha_path', 'tank_auth'),
			'img_url'		=> base_url().$this->config->item('captcha_path', 'tank_auth'),
			'font_path'		=> './'.$this->config->item('captcha_fonts_path', 'tank_auth'),
			'font_size'		=> $this->config->item('captcha_font_size', 'tank_auth'),
			'img_width'		=> $this->config->item('captcha_width', 'tank_auth'),
			'img_height'	=> $this->config->item('captcha_height', 'tank_auth'),
			'show_grid'		=> $this->config->item('captcha_grid', 'tank_auth'),
			'expiration'	=> $this->config->item('captcha_expire', 'tank_auth'),
		));

		// Save captcha params in session
		$this->session->set_flashdata(array(
				'captcha_word' => $cap['word'],
				'captcha_time' => $cap['time'],
		));

		return $cap['image'];
	}

	/**
	 * Callback function. Check if CAPTCHA test is passed.
	 *
	 * @param	string
	 * @return	bool
	 */
	function _check_captcha($code)
	{
		$time = $this->session->flashdata('captcha_time');
		$word = $this->session->flashdata('captcha_word');

		list($usec, $sec) = explode(" ", microtime());
		$now = ((float)$usec + (float)$sec);

		if ($now - $time > $this->config->item('captcha_expire', 'tank_auth')) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
			return FALSE;

		} elseif (($this->config->item('captcha_case_sensitive', 'tank_auth') AND
				$code != $word) OR
				strtolower($code) != strtolower($word)) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Create reCAPTCHA JS and non-JS HTML to verify user as a human
	 *
	 * @return	string
	 */
	function _create_recaptcha()
	{
		$this->load->helper('recaptcha');

		// Add custom theme so we can get only image
		$options = "<script>var RecaptchaOptions = {theme: 'custom', custom_theme_widget: 'recaptcha_widget'};</script>\n";

		// Get reCAPTCHA JS and non-JS HTML
		$html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'tank_auth'));

		return $options.$html;
	}

	/**
	 * Callback function. Check if reCAPTCHA test is passed.
	 *
	 * @return	bool
	 */
	function _check_recaptcha()
	{
		$this->load->helper('recaptcha');

		$resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'tank_auth'),
				$_SERVER['REMOTE_ADDR'],
				$_POST['recaptcha_challenge_field'],
				$_POST['recaptcha_response_field']);

		if (!$resp->is_valid) {
			$this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */