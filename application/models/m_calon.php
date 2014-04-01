<?php

class M_calon extends CI_Model{
	function __construct(){
		parent::__construct();		
	}


	function submit($email,$passwd,$nama,$tempatlahir,$tanggallahir,$kelamin,$alamat,$notelp,$nohp,$asal,$nilai,$nilai_a,$nilai_b,$nilai_f,$nilai_c,$nilai_d,$nilai_e){

		$db=$this->load->database('default',TRUE);	
		$query="INSERT INTO calon (calon_email,calon_passwd,calon_nama,calon_tempatlahir,calon_tanggallahir,calon_kelamin,calon_alamat,calon_notelp,calon_nohp,calon_asal,calon_nilai,calon_nilai_a,calon_nilai_b,calon_nilai_c,calon_nilai_d,calon_nilai_e,calon_nilai_f
			) values (
			'$email',
			'$passwd',
			'$nama',
			'$tempatlahir',
			'$tanggallahir',
			'$kelamin',
			'$alamat',
			'$notelp',
			'$nohp',
			'$asal',
			'$nilai',
			'$nilai_a',
			'$nilai_b',
			'$nilai_c',
			'$nilai_d',
			'$nilai_e',
			'$nilai_f'
			)";
		$db->query($query);
		
		}

	function peringkat($num=NULL,$offset=NULL){
		$db=$this->load->database('default',TRUE);	
		$db->select('calon_id,calon_nama,calon_nilai,calon_asal');
		$db->order_by('calon_nilai', 'desc');
		$hasilquery=$db->get('calon', $num, $offset);
		$hasilarray=array();
		$x=0;
		foreach ($hasilquery->result_array() as $key) {
			$hasilarray[$x]=$key;
			$x=$x+1;
		}
		return $hasilarray;

		

	}

	function get_total(){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM calon";
		$hasilquery=$db->query($query);
		$hasilarray=array();
		$x=0;
		foreach ($hasilquery->result_array() as $key) {
			$hasilarray[$x]=$key;
			$x=$x+1;
		}
		return $x;

	}

	function delete($id){
		$db=$this->load->database('default',TRUE);
		$query="DELETE FROM calon WHERE calon_id=$id";
		$db->query($query);
	}
		
	}