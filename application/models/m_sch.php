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

	function get_multipler_by_id($id){
		$db=$this->load->database('default',TRUE);
		$query="SELECT sekolah_asal.sch_multipler,sekolah_asal.sch_name,calon.calon_asal FROM sekolah_asal,calon WHERE calon.calon_id='$id' AND sekolah_asal.sch_name=calon.calon_asal";
		$multipler=$db->query($query);
		$multipler=$multipler->result_array();
		if (!empty($multipler)) {
			$multipler=$multipler[0]['sch_multipler'];
		return $multipler;
		} else {
			$tetapanquery="SELECT * FROM tetapan";
		$tetapan=$db->query($tetapanquery);
		$tetapan_result=$tetapan->result_array();
		//print_r($tetapan_result);
		$sekolahlain=$tetapan_result[4];
		return $sekolahlain['nilai'];
		}

		
	}

	function get_all(){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM sekolah_asal ORDER BY sch_id ASC";
		$result=$db->query($query);
		// $result=$result->result_array();
				$x=0;
		foreach ($result->result_array() as $key) {
			$asal[$x]=$key;
			$x=$x+1;
		}
		return $asal;
	}
	function simpan($sch_id,$sch_name,$sch_multipler){
		$db=$this->load->database('default',TRUE);
		$query="UPDATE sekolah_asal SET sch_name='$sch_name',sch_multipler='$sch_multipler' WHERE sch_id='$sch_id'";
		$db->query($query);
	}

	
	function tambah($sch_name,$sch_multipler){
		$db=$this->load->database('default',TRUE);
		$query="INSERT INTO sekolah_asal (sch_name,sch_multipler) VALUE ('$sch_name','$sch_multipler')";
		$db->query($query);
	}
	function hapus($sch_id){
		$db=$this->load->database('default',TRUE);
		$query="DELETE FROM sekolah_asal WHERE sch_id='$sch_id'";
		$db->query($query);
	}

	}