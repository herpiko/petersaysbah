<?php

class M_sch extends CI_Model{
	function __construct(){
		parent::__construct();		
	}


	
	function get_name($id){
		$db=$this->load->database('default',TRUE);
		$query="SELECT sch_name FROM sekolah_asal WHERE sch_id='$id'";
		$name=$db->query($query);
		$name=$name->result_array();
		$name=$name[0]['sch_name'];
		return $name;

	}
	function get_multipler($id){
		$db=$this->load->database('default',TRUE);
		$query="SELECT sch_multipler FROM sekolah_asal WHERE sch_id='$id'";
		$multipler=$db->query($query);
		$multipler=$multipler->result_array();
		$multipler=$multipler[0]['sch_multipler'];
		return $multipler;
	}


	}