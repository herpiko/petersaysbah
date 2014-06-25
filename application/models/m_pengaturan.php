<?php

class M_pengaturan extends CI_Model{
	function __construct(){
		parent::__construct();		
	}


	function simpan($dayatampung,$tglbuka,$tgltutup,$tglpengumuman){
		$db=$this->load->database('default',TRUE);
		$query1="UPDATE tetapan SET nilai='$dayatampung' WHERE tetapan='dayatampung'";
		$db->query($query1);
		$query2="UPDATE tetapan SET nilai='$tglbuka' WHERE tetapan='tglbuka'";
		$db->query($query2);
		$query3="UPDATE tetapan SET nilai='$tgltutup' WHERE tetapan='tgltutup'";
		$db->query($query3);
		$query4="UPDATE tetapan SET nilai='$tglpengumuman' WHERE tetapan='tglpengumuman'";
		$db->query($query4);
	}

	
	function baca(){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM tetapan";
		$result=$db->query($query);
		$result=$result->result_array();
		return $result;
	}
	function simpan_sekolahlain($sch_multipler){
		$db=$this->load->database('default',TRUE);
		$query="UPDATE tetapan SET nilai='$sch_multipler' WHERE tetapan='sekolahlain'";
		$db->query($query);
	}




	}