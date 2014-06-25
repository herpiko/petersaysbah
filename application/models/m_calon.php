<?php

class M_calon extends CI_Model{
	function __construct(){
		parent::__construct();		
	}

	function truncate(){
		$db=$this->load->database('default',TRUE);	
		$query="DELETE FROM calon WHERE calon_id<>0";
		$this->db->query($query);
		$query="DELETE FROM users WHERE id<>0";
		$this->db->query($query);
	}

	function submit($id,$email,$passwd,$selfie,$nama,$panggilan,$kelamin,$tempatlahir,$tanggallahir,$agama,$alamat,$asal,$nis,$nama_ayah,$nama_ibu,$pendidikan_ayah,$pendidikan_ibu,$pekerjaan_ayah,$pekerjaan_ibu,$alamat_ortu,$notelp,$nilai_a,$nilai_b,$nilai_c,$nilai_d,$nilai_e,$nilai_f,$nilai_g,$nilai_bi_1,$nilai_bi_2,$nilai_bi_3,$nilai_bi_4,$nilai_bi_5,$nilai_bi_6,$nilai_bi_av,$nilai_ma_1,$nilai_ma_2,$nilai_ma_3,$nilai_ma_4,$nilai_ma_5,$nilai_ma_6,$nilai_ma_av,$nilai_en_1,$nilai_en_2,$nilai_en_3,$nilai_en_4,$nilai_en_5,$nilai_en_6,$nilai_en_av,$nilai_bo_1,$nilai_bo_2,$nilai_bo_3,$nilai_bo_4,$nilai_bo_5,$nilai_bo_6,$nilai_bo_av,$semester_all){

		$db=$this->load->database('default',TRUE);	
		$query="INSERT INTO calon (calon_id,calon_email,calon_passwd,calon_selfie,calon_nama,calon_panggilan,calon_kelamin,calon_tempatlahir,calon_tanggallahir,calon_agama,calon_alamat,calon_asal,calon_nis,calon_nama_ayah,calon_nama_ibu,calon_pendidikan_ayah,calon_pendidikan_ibu,calon_pekerjaan_ayah,calon_pekerjaan_ibu,calon_alamat_ortu,calon_notelp,calon_nilai_a,calon_nilai_b,calon_nilai_c,calon_nilai_d,calon_nilai_e,calon_nilai_f,calon_nilai_g,
			calon_nilai_bi_1,calon_nilai_bi_2,calon_nilai_bi_3,calon_nilai_bi_4,calon_nilai_bi_5,calon_nilai_bi_6,calon_nilai_bi_av,
			calon_nilai_ma_1,calon_nilai_ma_2,calon_nilai_ma_3,calon_nilai_ma_4,calon_nilai_ma_5,calon_nilai_ma_6,calon_nilai_ma_av,
			calon_nilai_en_1,calon_nilai_en_2,calon_nilai_en_3,calon_nilai_en_4,calon_nilai_en_5,calon_nilai_en_6,calon_nilai_en_av,
			calon_nilai_bo_1,calon_nilai_bo_2,calon_nilai_bo_3,calon_nilai_bo_4,calon_nilai_bo_5,calon_nilai_bo_6,calon_nilai_bo_av,
			semester_all
			) values (
			'$id',
			'$email',
			'$passwd',
			'$selfie',
			'$nama',
			'$panggilan',
			'$kelamin',
			'$tempatlahir',
			'$tanggallahir',
			'$agama',
			'$alamat',
			'$asal',
			'$nis',
			'$nama_ayah',
			'$nama_ibu',
			'$pendidikan_ayah',
			'$pendidikan_ibu',
			'$pekerjaan_ayah',
			'$pekerjaan_ibu',
			'$alamat_ortu',
			'$notelp',
			'$nilai_a',
			'$nilai_b',
			'$nilai_c',
			'$nilai_d',
			'$nilai_e',
			'$nilai_f',
			'$nilai_g',
			'$nilai_bi_1',
			'$nilai_bi_2',
			'$nilai_bi_3',
			'$nilai_bi_4',
			'$nilai_bi_5',
			'$nilai_bi_6',
			'$nilai_bi_av',
			'$nilai_ma_1',
			'$nilai_ma_2',
			'$nilai_ma_3',
			'$nilai_ma_4',
			'$nilai_ma_5',
			'$nilai_ma_6',
			'$nilai_ma_av',
			'$nilai_en_1',
			'$nilai_en_2',
			'$nilai_en_3',
			'$nilai_en_4',
			'$nilai_en_5',
			'$nilai_en_6',
			'$nilai_en_av',
			'$nilai_bo_1',
			'$nilai_bo_2',
			'$nilai_bo_3',
			'$nilai_bo_4',
			'$nilai_bo_5',
			'$nilai_bo_6',
			'$nilai_bo_av',
			'$semester_all'
			)";
		$db->query($query);
		
		}


	function set_username($username,$email){

		$db=$this->load->database('default',TRUE);	
		$query="UPDATE users SET username='$username' WHERE email='$email'";
		$db->query($query);
		
		}
	function bersih_bersih(){

		$db=$this->load->database('default',TRUE);	
		$query="delete from users where id not in (select calon_id from calon);";
		$db->query($query);
		$query2="delete from users where id not in (select calon_id from calon where calon_status!='dis')";
		$db->query($query2);
		$query3="delete from users where id in (select calon_id from calon where calon_status='dis')";
		$db->query($query3);
		
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
		if ($jumlah<$dayatampung) {
			$standar_nilai=$nilai[$jumlah];
		} else {
			$standar_nilai=$nilai[$dayatampung];
		}

		//print_r($dayatampung);
		

		
		return $standar_nilai;
	}

	function create_user($username,$password,$email,$activated){
		$db=$this->load->database('default',TRUE);
		$query="INSERT INTO users (username,password,email,activated) values ('$username','$password','$email','$activated')";
		$db->query($query);
	}

	function peringkat_status($id,$num=NULL,$offset=NULL){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM tetapan";
		$result=$db->query($query);
		$result=$result->result_array();
		$limit=$result[0]['nilai'];
		
		$db=$this->load->database('default',TRUE);	
		$db->select('calon_id,calon_email,calon_nama,calon_nilai_e,calon_nilai_f,calon_asal');		
		$db->where('calon_status  !=','dis');
		

		$peringkatquery=$db->get('calon',$num, $offset);
		
		$data=$peringkatquery->result_array();
		
		$peringkatarray=array();
		$x=0;
		foreach ($data as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			ksort($key);
			$peringkatarray[$x]=$key;
			// $peringkatarray[$x]=$skor;
			$x=$x+1;
		}
			
		
		arsort($peringkatarray);


		$x=1;
		$rank=0;
		foreach ($peringkatarray as $key) {
			// $peringkatarray[$x]=$key;
			if ($key['calon_id']==$id) {
				$rank=$x;
			}
			$x=$x+1;
		}
		$peringkat_status[0]=$limit;
		$peringkat_status[1]=$rank;
		return $peringkat_status;

	}

	function peringkat($limit=NULL,$offset=NULL){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM tetapan";
		$result=$db->query($query);
		$result=$result->result_array();
		$limit=$result[0]['nilai'];
		
		$db=$this->load->database('default',TRUE);	
		$db->select('calon_id,calon_email,calon_nama,calon_asal,calon_nilai_e,calon_nilai_f');		
		$db->where('calon_status  !=','dis');
		$db->where('calon_id  !=','0');
		

		$peringkatquery=$db->get('calon',NULL, $offset);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			ksort($key);
			$peringkatarray[$x]=$key;
			// $peringkatarray[$x]=$skor;
			$x=$x+1;
		}
			
		
		// arsort($peringkatarray);
		// // print_r($peringkatarray);
		// return $peringkatarray;
		
		arsort($peringkatarray);
		$y=0;
		$peringkatfinal=array();
		foreach ($peringkatarray as $key1) {
			if ($y<$limit) {
			$peringkatfinal[$y]=$key1;
			}
			$y=$y+1;
		}
		return $peringkatfinal;

	}
	function peringkat_by_waktu($limit=NULL,$offset=NULL){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM tetapan";
		$result=$db->query($query);
		$result=$result->result_array();
		$limit=999999999;
		
		$db=$this->load->database('default',TRUE);	
		$db->select('calon_id,calon_email,calon_nama,calon_asal,calon_nilai_e,calon_nilai_f,calon_waktu');		
		$db->where('calon_status  !=','dis');
		$db->order_by('calon_waktu', 'desc');
		

		$peringkatquery=$db->get('calon',NULL, $offset);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			// ksort($key);
			if ($key['calon_id']!=0) {
			$peringkatarray[$x]=$key;
			}
			
			// $peringkatarray[$x]=$skor;
			$x=$x+1;
		}
			
		
		// arsort($peringkatarray);
		// print_r($peringkatarray);
		return $peringkatarray;
		

	}

	function peringkat_out($num=NULL,$offset=NULL){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM tetapan";
		$result=$db->query($query);
		$result=$result->result_array();
		$limit=$result[0]['nilai'];
		// $limit--;
		// $this->count();
		// if ($count  $limit) {
			// $count=$count-$limit;
		// echo $count;
		// print_r($count);
		// } else {
			// $count=0;
		// }
		
		$db=$this->load->database('default',TRUE);	
		$db->select('calon_id,calon_email,calon_nama,calon_asal,calon_nilai_e,calon_nilai_f');		
		$db->where('calon_status  !=','dis');
		

		$peringkatquery=$db->get('calon',$num, $offset);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			ksort($key);
			if ($key['calon_id']!=0) {
			$peringkatarray[$x]=$key;
			}
			
			$x=$x+1;
		}

			
		
		arsort($peringkatarray);
		$y=0;

		$peringkatfinal=array();
		foreach ($peringkatarray as $key1) {
			if ($y>($limit-1)) {
			$peringkatfinal[$y]=$key1;
			}
			$y=$y+1;
		}
		return $peringkatfinal;

	}

	function peringkat_dis($num=NULL,$offset=NULL){
		$db=$this->load->database('default',TRUE);	
		$db->select('calon_id,calon_email,calon_nama,calon_asal,calon_nilai_e,calon_nilai_f,calon_alasandis');		
		$db->where('calon_status','dis');
		
		$peringkatquery=$db->get('calon', $num, $offset);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			ksort($key);
			$peringkatarray[$x]=$key;
			// $peringkatarray[$x]=$skor;
			$x=$x+1;
		}
			
		
		arsort($peringkatarray);		
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
	

	function get_excel(){
		$db=$this->load->database('default',TRUE);	
		$query="SELECT 
			calon_id,
			calon_waktu,
			calon_email,
			calon_passwd,
			calon_nama,
			calon_panggilan,
			calon_kelamin,
			calon_tempatlahir,
			calon_tanggallahir,
			calon_agama,
			calon_alamat,
			calon_asal,
			calon_nis,
			calon_nama_ayah,
			calon_nama_ibu,
			calon_pendidikan_ayah,
			calon_pendidikan_ibu,
			calon_pekerjaan_ayah,
			calon_pekerjaan_ibu,
			calon_alamat_ortu,
			calon_notelp,
			calon_nilai_a,
			calon_nilai_b,
			calon_nilai_c,
			calon_nilai_d,
			calon_nilai_f,
			calon_nilai_e,		
			calon_status,
			calon_alasandis

			FROM calon WHERE calon_status<>'dis'";
		$peringkatquery=$db->query($query);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			// ksort($key);
			$peringkatarray[$x]=$key;
			// $peringkatarray[$x]=$skor;
			$x=$x+1;
		}
			
		
		asort($peringkatarray);
		// print_r($peringkatarray);
		// echo "<hr>";
		// print_r($peringkatquery);
		return $peringkatarray;
	}
	function get_excel_diskualifikasi(){
		$db=$this->load->database('default',TRUE);	
		$query="SELECT 
			calon_id,
			calon_waktu,
			calon_email,
			calon_passwd,
			calon_nama,
			calon_panggilan,
			calon_kelamin,
			calon_tempatlahir,
			calon_tanggallahir,
			calon_agama,
			calon_alamat,
			calon_asal,
			calon_nis,
			calon_nama_ayah,
			calon_nama_ibu,
			calon_pendidikan_ayah,
			calon_pendidikan_ibu,
			calon_pekerjaan_ayah,
			calon_pekerjaan_ibu,
			calon_alamat_ortu,
			calon_notelp,
			calon_nilai_a,
			calon_nilai_b,
			calon_nilai_c,
			calon_nilai_d,
			calon_nilai_f,
			calon_nilai_e,		
			calon_status,
			calon_alasandis

			FROM calon WHERE calon_status='dis'";
		$peringkatquery=$db->query($query);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			// ksort($key);
			$peringkatarray[$x]=$key;
			// $peringkatarray[$x]=$skor;
			$x=$x+1;
		}
			
		
		arsort($peringkatarray);
		// print_r($peringkatarray);
		// echo "<hr>";
		// print_r($peringkatquery);
		return $peringkatarray;
	}
	function get_excel_lolos(){
		$db=$this->load->database('default',TRUE);	
		$query="SELECT * FROM tetapan";
		$result=$db->query($query);
		$result=$result->result_array();
		$limit=$result[0]['nilai'];
		$query="SELECT 
			calon_id,
			calon_waktu,
			calon_email,
			calon_passwd,
			calon_nama,
			calon_panggilan,
			calon_kelamin,
			calon_tempatlahir,
			calon_tanggallahir,
			calon_agama,
			calon_alamat,
			calon_asal,
			calon_nis,
			calon_nama_ayah,
			calon_nama_ibu,
			calon_pendidikan_ayah,
			calon_pendidikan_ibu,
			calon_pekerjaan_ayah,
			calon_pekerjaan_ibu,
			calon_alamat_ortu,
			calon_notelp,
			calon_nilai_a,
			calon_nilai_b,
			calon_nilai_c,
			calon_nilai_d,
			calon_nilai_f,
			calon_nilai_e,		
			calon_status,
			calon_alasandis

			FROM calon WHERE calon_status!='dis'";
		$peringkatquery=$db->query($query);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			ksort($key);
			$peringkatarray[$x]=$key;
			// $peringkatarray[$x]=$skor;
			$x=$x+1;
		}
			
		
		arsort($peringkatarray);
		$y=0;

		$peringkatfinal=array();
			foreach ($peringkatarray as $key1) {
			if ($y<$limit) {
			$peringkatfinal[$y]=$key1;
			}
			$y=$y+1;
		}
		// return $peringkatfinal;

		return $peringkatfinal;
	}	

	function get_excel_tidaklolos(){
		$db=$this->load->database('default',TRUE);	
		$query="SELECT * FROM tetapan";
		$result=$db->query($query);
		$result=$result->result_array();
		$limit=$result[0]['nilai'];
		$query="SELECT 
			calon_id,
			calon_waktu,
			calon_email,
			calon_passwd,
			calon_nama,
			calon_panggilan,
			calon_kelamin,
			calon_tempatlahir,
			calon_tanggallahir,
			calon_agama,
			calon_alamat,
			calon_asal,
			calon_nis,
			calon_nama_ayah,
			calon_nama_ibu,
			calon_pendidikan_ayah,
			calon_pendidikan_ibu,
			calon_pekerjaan_ayah,
			calon_pekerjaan_ibu,
			calon_alamat_ortu,
			calon_notelp,
			calon_nilai_a,
			calon_nilai_b,
			calon_nilai_c,
			calon_nilai_d,
			calon_nilai_f,
			calon_nilai_e,		
			calon_status,
			calon_alasandis

			FROM calon WHERE calon_status!='dis'";
		$peringkatquery=$db->query($query);
		$peringkatarray=array();
		$x=0;
		foreach ($peringkatquery->result_array() as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			ksort($key);
			$peringkatarray[$x]=$key;
			// $peringkatarray[$x]=$skor;
			$x=$x+1;
		}
			
		
		arsort($peringkatarray);
		$y=0;

		$peringkatfinal=array();
		foreach ($peringkatarray as $key1) {
			if ($y>($limit-1)) {
			$peringkatfinal[$y]=$key1;
			}
			$y=$y+1;
		}
		// return $peringkatfinal;

		return $peringkatfinal;
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
		$query2="UPDATE calon SET calon_status='dis' WHERE calon_id='$id'";
		$db->query($query2);
		$query3="DELETE FROM users WHERE email='$calon_email'";
		$db->query($query3);
		

	}

	function profil($id){
		$db=$this->load->database('default',TRUE);
		$query="SELECT * FROM calon";
		$result=$db->query($query);
		$result=$result->result_array();


		$peringkatarray=array();
		$x=0;
		foreach ($result as $key) {
			
			//hitungskor
			$this->load->model('m_sch');
			$multipler=$this->m_sch->get_multipler_by_id($key['calon_id']);
			$skor=((40/100)*($key['calon_nilai_f']*$multipler))+((60/100)*($key['calon_nilai_e']*$multipler));
			$key['calon_aa_skor']=$skor;
			ksort($key);
			$peringkatarray[$x]=$key;
			// $peringkatarray[$x]=$skor;
			$x=$x+1;
		}
			
		
		arsort($peringkatarray);
		// print_r($peringkatarray);
		foreach ($peringkatarray as $key) {
			if ($key['calon_id']==$id) {
				$resultfinal[0]=$key;
			}
		}

		return $resultfinal;
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
	
	function edit_simpan($id,$nama,$tempatlahir,$tanggallahir,$kelamin,$alamat,$notelp,$panggilan,$agama,$nis,$nama_ayah,$nama_ibu,$pendidikan_ayah,$pendidikan_ibu,$pekerjaan_ayah,$pekerjaan_ibu,$alamat_ortu) {
		$db=$this->load->database('default', TRUE);
		$query="UPDATE calon SET 
		calon_nama='$nama',
		calon_tempatlahir='$tempatlahir', 
		calon_tanggallahir='$tanggallahir',
		calon_kelamin='$kelamin',
		calon_alamat='$alamat',
		calon_notelp='$notelp',
		calon_panggilan='$panggilan',
		calon_agama='$agama',
		calon_nis='$nis',
		calon_nama_ayah='$nama_ayah',
		calon_nama_ibu='$nama_ibu',
		calon_pendidikan_ayah='$pendidikan_ayah',
		calon_pendidikan_ibu='$pendidikan_ibu',
		calon_pekerjaan_ayah='$pekerjaan_ayah',
		calon_pekerjaan_ibu='$pekerjaan_ibu',
		calon_alamat_ortu='$alamat_ortu'


		WHERE calon_id='$id'";
		$db->query($query);
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
	function alasandis_set($id,$pesan){
		$db=$this->load->database('default',TRUE);
		$query="UPDATE calon SET calon_alasandis='$pesan' WHERE calon_id='$id'";
		$db->query($query);
	}
	function delete_dis(){
		$db=$this->load->database('default',TRUE);
		$query="DELETE FROM calon WHERE calon_status='dis'";
		$db->query($query);
	}
	function get_id($email){
		$db=$this->load->database('default',TRUE);
		$query="SELECT id FROM users WHERE email='$email'";
		$result=$db->query($query);
		$result=$result->result_array();
		$result=$result[0]['id'];
		return $result;
	}
	function get_selfie($id){
		$db=$this->load->database('default',TRUE);
		$query="SELECT calon_selfie FROM calon WHERE calon_id='$id'";
		$result=$db->query($query);
		$result=$result->result_array();
		$result=$result[0]['calon_selfie'];
		return $result;
	}
	function get_level($id){
		$db=$this->load->database('default',TRUE);
		$query="SELECT level FROM users WHERE id='$id'";
		$result=$db->query($query);
		$result=$result->result_array();
		$result=$result[0]['level'];
		return $result;
	}
	function get_email($id){
		$db=$this->load->database('default',TRUE);
		$query="SELECT calon_email FROM calon WHERE calon_id='$id'";
		$result=$db->query($query);
		$result=$result->result_array();
		$result=$result[0]['calon_email'];
		return $result;
	}

	}