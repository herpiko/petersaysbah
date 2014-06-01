<?php

class M_halaman extends CI_Model{
	function __construct(){
		parent::__construct();		
	}


	function get($id){

		$db=$this->load->database('default',TRUE);	
		$query="SELECT * FROM halaman WHERE halaman_id='$id'";
		$peringkatquery=$db->query($query);
		$result=$peringkatquery->result_array();
		$isi=$result[0];
		return $isi;
		}
		
	function update($id,$isi){
		$db=$this->load->database('default',TRUE);	
		$query="UPDATE halaman SET halaman_isi='$isi' WHERE halaman_id='$id'";
		$db->query($query);
	}
	}