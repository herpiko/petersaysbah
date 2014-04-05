<?php

class M_calon extends CI_Model{
	function __construct(){
		parent::__construct();		
	}


	function submit($email,$passwd,$nama,$tempatlahir,$tanggallahir,$kelamin,$alamat,$notelp,$nohp,$asal,$nilai,$nilai_a,$nilai_b,$nilai_c,$nilai_d,$nilai_e){

		$db=$this->load->database('default',TRUE);	
		$query="INSERT INTO calon (calon_email,calon_passwd,calon_nama,calon_tempatlahir,calon_tanggallahir,calon_kelamin,calon_alamat,calon_notelp,calon_nohp,calon_asal,calon_nilai,calon_nilai_a,calon_nilai_b,calon_nilai_c,calon_nilai_d,calon_nilai_e
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
			'$nilai_e'
			)";
		$db->query($query);
		
		}

	function set_username($username,$email){

		$db=$this->load->database('default',TRUE);	
		$query="UPDATE users SET username='$username' WHERE email='$email'";
		$db->query($query);
		
		}

	function standar_nilai(){
		$db=$this->load->database('default',TRUE);
		$query="SELECT calon_nilai FROM calon ORDER BY calon_nilai DESC";
		$result=$db->query($query);
		$result=$result->result_array();

		$query2="SELECT * FROM tetapan";
		$tetapan=$db->query($query2);
		$tetapan=$tetapan->result_array();
		$dayatampung=$tetapan[0]['nilai'];
		
		//print_r($tetapan);
		// echo "<br>";
		
		$x=array();
		$nilai=array();
		$i=0;
		foreach ($result as $key => $value) {
			$x[$i]=$value;
			foreach ($x as $key => $value) {
				$nilai[$i]=$value['calon_nilai'];
			}
			$i++;
		}
		
		// print_r($nilai);
		$jumlah=count($nilai);
		$jumlah--;
		//print_r($dayatampung);
		

		if ($jumlah<$dayatampung) {
			$standar_nilai=$nilai[$jumlah];
		} else {
			$standar_nilai=$nilai[$dayatampung];
		}
		return $standar_nilai;
	}

	function create_user($username,$password,$email,$activated){
		$db=$this->load->database('default',TRUE);
		$query="INSERT INTO users (username,password,email,activated) values ('$username','$password','$email','$activated')";
		$db->query($query);
	}

	function peringkat($num=NULL,$offset=NULL){
		$db=$this->load->database('default',TRUE);	
		$db->select('calon_id,calon_email,calon_nama,calon_nilai,calon_nilai_e,calon_asal');
		$db->order_by('calon_nilai', 'desc');
		$peringkatquery=$db->get('calon', $num, $offset);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			$peringkatarray[$x]=$key;
			$x=$x+1;
		}
		return $peringkatarray;

		

	}

	function get_all(){
		$db=$this->load->database('default',TRUE);	
		$query="SELECT * FROM calon";
		$data=$db->query($query);
		// $data=array();
		// $x=0;
		// foreach ($result->result_array() as $key) {
		// 	$data[$x]=$key;
		// 	$x=$x+1;
		// }
		return $data;
	}

	function get_total(){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM calon";
		$peringkatquery=$db->query($query);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			$peringkatarray[$x]=$key;
			$x=$x+1;
		}
		return $x;

	}

	function delete($id){
		$db=$this->load->database('default',TRUE);
		$query1="SELECT calon_email FROM calon WHERE calon_id='$id'";
		$calon_email=$db->query($query1);
		$calon_email=$calon_email->result_array();
		$calon_email=$calon_email[0]['calon_email'];
		$query2="DELETE FROM calon WHERE calon_id='$id'";
		$db->query($query2);
		$query2="DELETE FROM users WHERE email='$calon_email'	";
		$db->query($query2);

	}

	function profil($id){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM calon WHERE calon_id='$id'";
		$result=$db->query($query);
		$result=$result->result_array();
		return $result;
	}

	function verifikasi_email($email){
		$db=$this->load->database('default',TRUE);
		$query="SELECT activated FROM users WHERE email='$email'";
		$result=$db->query($query);
		$result=$result->result_array();
			if (empty($result)) {
				$result='0';
			} else {
				$result=$result[0]['activated'];		
			}
		
		return $result;
	}
		
	function verifikasi_nilai($id){
		$db=$this->load->database('default',TRUE);
		$query="SELECT calon_status FROM calon WHERE calon_id='$id'";
		$result=$db->query($query);
		$result=$result->result_array();
		$result=$result[0]['calon_status'];
		return $result;
	}
	
	function verifikasi_nilai_set($id,$status){
		$db=$this->load->database('default',TRUE);
		$query="UPDATE calon SET calon_status='$status' WHERE calon_id='$id'";
		$db->query($query);
	}


	}