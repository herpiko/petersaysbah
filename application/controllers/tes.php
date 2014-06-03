<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tes extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('email');
	}

	function index()
	{
        $this->load->helper('url_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library('email');
        $this->load->helper('url'); 
			
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE; 
            $this->email->initialize($config);

            $this->email->from('ppdb@ppdb.sman1dompu.sch.id', 'PSB Online SMA Negeri 1 Dompu');
            $this->email->to('herpiko@gmail.com'); 
            $this->email->subject('tes');
            $this->email->message('tes');  

            $this->email->send();

            echo $this->email->print_debugger();


		// }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */