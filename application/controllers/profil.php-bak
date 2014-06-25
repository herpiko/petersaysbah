<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library(array('table','form_validation'));
		$this->load->model('m_calon');

	}

	function index(){ 

		$data['title']="Profil";
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		// if ($this->m_calon->get_level($data['user_id'])!='admin') {
		//  	redirect('/auth/login/');
		// } else {

		$id=$data['user_id'];
		$peringkat_status=$this->m_calon->peringkat_status($id);
		if ($peringkat_status[1]<=$peringkat_status[0]) {
			$data['calon_rank']=$peringkat_status[1];
			$data['calon_rank_status']="<span style=\"color:green\">Masuk daftar lulus sementara</span> sampai dengan ".date("d/m/y : H:i:s", time());
		} else {
			$data['calon_rank']=$peringkat_status[1];
			$data['calon_rank_status']="<span style=\"color:red\">Tidak masuk daftar lulus sementara</span> sampai dengan ".date("d/m/y : H:i:s", time());
		}


		$profil=$this->m_calon->profil($id);
		
		$data['calon_id']=$profil[0]['calon_id'];
		$data['calon_email']=$profil[0]['calon_email'];
		$data['calon_nama']=$profil[0]['calon_nama'];
		$data['calon_panggilan']=$profil[0]['calon_panggilan'];
		$data['calon_tempatlahir']=$profil[0]['calon_tempatlahir'];
		$data['calon_tanggallahir']=$profil[0]['calon_tanggallahir'];
		$data['calon_kelamin']=$profil[0]['calon_kelamin'];
		$data['calon_alamat']=$profil[0]['calon_alamat'];
		$data['calon_agama']=$profil[0]['calon_agama'];
		$data['calon_nis']=$profil[0]['calon_nis'];
		
		
		$data['calon_nama_ayah']=$profil[0]['calon_nama_ayah'];
		$data['calon_nama_ibu']=$profil[0]['calon_nama_ibu'];
		$data['calon_pendidikan_ayah']=$profil[0]['calon_pendidikan_ayah'];
		$data['calon_pendidikan_ibu']=$profil[0]['calon_pendidikan_ibu'];
		$data['calon_pekerjaan_ayah']=$profil[0]['calon_pekerjaan_ayah'];
		$data['calon_pekerjaan_ibu']=$profil[0]['calon_pekerjaan_ibu'];
		$data['calon_alamat_ortu']=$profil[0]['calon_alamat_ortu'];
		$data['calon_notelp']=$profil[0]['calon_notelp'];		

		$data['calon_asal']=$profil[0]['calon_asal'];
		$data['calon_nilai_a']=$profil[0]['calon_nilai_a'];
		$data['calon_nilai_b']=$profil[0]['calon_nilai_b'];
		$data['calon_nilai_c']=$profil[0]['calon_nilai_c'];
		$data['calon_nilai_d']=$profil[0]['calon_nilai_d'];
		$data['calon_nilai_e']=$profil[0]['calon_nilai_e'];
		$data['calon_nilai_f']=$profil[0]['calon_nilai_f'];
		$data['calon_nilai_g']=$profil[0]['calon_nilai_g'];
		$data['calon_status']=$profil[0]['calon_status'];
		$data['calon_selfie']=$profil[0]['calon_selfie'];

		$this->load->view('header', $data);
		$this->load->view('v_profil', $data);
		$this->load->view('sidebar');
		$this->load->view('footer');


		}

	}
	private function _gen_pdf($html,$paper='A4')
    {
        $this->load->library('mpdf/mpdf');               
        $mpdf=new mPDF('utf-8',$paper);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    } 


	function cetak($id){ 

		$data['title']="Profil";
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {
			if ($data['user_id']!=$id) {
				redirect('/');
			} else {
				$profil=$this->m_calon->profil($id);
		
				$calon_id=$profil[0]['calon_id'];
				$calon_email=$profil[0]['calon_email'];
				$calon_nama=$profil[0]['calon_nama'];
				$calon_panggilan=$profil[0]['calon_panggilan'];
				$calon_tempatlahir=$profil[0]['calon_tempatlahir'];
				$calon_tanggallahir=$profil[0]['calon_tanggallahir'];
				$calon_kelamin=$profil[0]['calon_kelamin'];
				$calon_alamat=$profil[0]['calon_alamat'];
				$calon_agama=$profil[0]['calon_agama'];
				$calon_nis=$profil[0]['calon_nis'];
				
				
				$calon_nama_ayah=$profil[0]['calon_nama_ayah'];
				$calon_nama_ibu=$profil[0]['calon_nama_ibu'];
				$calon_pendidikan_ayah=$profil[0]['calon_pendidikan_ayah'];
				$calon_pendidikan_ibu=$profil[0]['calon_pendidikan_ibu'];
				$calon_pekerjaan_ayah=$profil[0]['calon_pekerjaan_ayah'];
				$calon_pekerjaan_ibu=$profil[0]['calon_pekerjaan_ibu'];
				$calon_alamat_ortu=$profil[0]['calon_alamat_ortu'];
				$calon_notelp=$profil[0]['calon_notelp'];		
				$calon_asal=$profil[0]['calon_asal'];
				$calon_nilai_a=$profil[0]['calon_nilai_a'];
				$calon_nilai_b=$profil[0]['calon_nilai_b'];
				$calon_nilai_c=$profil[0]['calon_nilai_c'];
				$calon_nilai_d=$profil[0]['calon_nilai_d'];
				$calon_nilai_e=$profil[0]['calon_nilai_e'];
				$calon_nilai_f=$profil[0]['calon_nilai_f'];
				$calon_nilai_g=$profil[0]['calon_nilai_g'];
				$calon_status=$profil[0]['calon_status'];
				$calon_selfie=$profil[0]['calon_selfie'];

$isi= "
<p>
<p>
<h3><strong style=\"text-align:center\">BUKTI PENDAFTARAN PESERTA DIDIK BARU</strong></h3>

<br>
<br>
<br>
<br>
<br>
<table>
<tr><td width=\"400px\"><br></td><td></td></tr>
<tr>
<td><img src=\"".$this->config->base_url()."assets/img/space.png\" width=\"10\"><img src=\"".$calon_selfie."\" height=\"90\"></td>
<td>".$this->qrcode($calon_id,$calon_nama)."</td>
</tr>

</table>
<hr>
<p></p>
<table>
<tr>
	<td width=\"200\">
		Nomor registrasi
	</td>
	<td>: ".$calon_id."
	</td>
</tr>
<tr>
	<td>
		Email
	</td>
	<td>
		: ".$calon_email."
	</td>
</tr>
<tr><td><br></td></tr>
<tr><td><br><strong>Data Pribadi</strong><hr></td></tr>
<tr>
	<td>
		Nama
	</td>
	<td>
		: ".$calon_nama."
	</td>
</tr>
<tr>
	<td>
		Nama Panggilan
	</td>
	<td>
		: ".$calon_panggilan."
	</td>
</tr>
<tr>
	<td>
		Jenis kelamin
	</td>
	<td>
		: ".$calon_kelamin."
	</td>
</tr>
<tr>
	<td>
		Tempat & tanggal lahir
	</td>
	<td>
		: ".$calon_tempatlahir.", ".$calon_tanggallahir."
	</td>
</tr>
<tr>
	<td>
		Agama
	</td>
	<td>
		: ".$calon_agama."
	</td>
</tr>
<tr>
	<td>
		Alamat
	</td>
	<td>
		: ".$calon_alamat." 
	</td>
</tr>


<tr>
	<td>
		Sekolah asal
	</td>
	<td>
		: ".$calon_asal."
	</td>
</tr>
<tr>
	<td>
		NIS/NISN
	</td>
	<td>
		: ".$calon_nis."
	</td>
</tr>
<tr><td><br></td></tr>
<tr><td><br><strong>Keterangan Orang Tua / Wali</strong><hr></td></tr>
<tr><td><br>Nama Orang Tua / Wali</td></tr>
<tr>
	<td>
		Ayah
	</td>
	<td>
		: ".$calon_nama_ayah."
	</td>
</tr>
<tr>
	<td>
		Ibu
	</td>
	<td>
		: ".$calon_nama_ibu."
	</td>
</tr>
<tr><td><br>Pendidikan Orang Tua / Wali</td></tr>
<tr>
	<td>
		Ayah
	</td>
	<td>
		: ".$calon_pendidikan_ayah."
	</td>
</tr>
<tr>
	<td>
		Ibu
	</td>
	<td>
		: ".$calon_pendidikan_ibu."
	</td>
</tr>
<tr><td><br>Pekerjaan Orang Tua / Wali</td></tr>
<tr>
	<td>
		Ayah
	</td>
	<td>
		: ".$calon_pekerjaan_ayah."
	</td>
</tr>
<tr>
	<td>
		Ibu
	</td>
	<td>
		: ".$calon_pekerjaan_ibu."
	</td>
</tr>
<tr><td><br></td></tr>
<tr>
	<td>
		Alamat Orang tua / Wali
	</td>
	<td>
		: ".$calon_alamat_ortu."
	</td>
</tr>
<tr>
	<td>
		Nomor telepon
	</td>
	<td>
		: ".$calon_notelp."
	</td>
</tr>
<tr><td><br></td></tr>
<tr><td><br><strong>Nilai</strong><hr></td></tr>

<tr>
	<td>
		<strong>Skor nilai</strong>
	</td>
	<td>
		<strong>
		: ".$calon_nilai_g."	
		</strong>
	</td>
</tr>
<tr><td><br></td></tr>
<tr><td><br><strong>Ujian Nasional</strong></td></tr>
<tr>
	<td>
		Bahasa Indonesia
	</td>
	<td>
		: ".$calon_nilai_a."	
	</td>
</tr>
<tr>
	<td>
		Matematika
	</td>
	<td>
		: ".$calon_nilai_b."	
	</td>
</tr>
<tr>
	<td>
		Bahasa Inggris
	</td>
	<td>
		: ".$calon_nilai_c."	
	</td>
</tr>
<tr>
	<td>
		IPA
	</td>
	<td>
		: ".$calon_nilai_d."	
	</td>
</tr>
<tr>
	<td>
		Rata-rata UN
	</td>
	<td>
		: ".$calon_nilai_f."		
	</td>
</tr>
<tr><td><br></td></tr>
<tr><td><br><strong>Nilai Sekolah</strong></td></tr>
<tr>
	<td>
		Rata-rata Raport Semester I s/d VI
	</td>
	<td>
		: ".$calon_nilai_e."		
	</td>
</tr>

</table>
";


$this->load->library('tcpdf/tcpdf');

$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "SMA Negeri 1 Dompu";
$obj_pdf->SetTitle($title);
// $obj_pdf->SetHeaderData('PDF_HEADER_STRING', "by Nicola Asuni - Tecnick.com\nwww.tcpdf.org");
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->setFontSubsetting(false);
// output the barcode as HTML object

$obj_pdf->AddPage();
ob_start();
echo $isi;


    $content = ob_get_contents();

ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('Bukti_Pendaftaran_PPDB_ID-'.$calon_id.'.pdf', 'I');
			}
		}

	}

function qrcode($id,$nama){
	$this->load->library('phpqrcode/qrcode');
	QRcode::png($id.' - '.$nama,'tmp/qrcode.png');
	$code="<img src=\"".$this->config->base_url()."tmp/qrcode.png\">";
	return $code;
}

	function sunting(){ 

		$data['title']="Sunting profil";
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		// if ($this->m_calon->get_level($data['user_id'])!='admin') {
		//  	redirect('/auth/login/');
		// } else {

		$id=$data['user_id'];

		$profil=$this->m_calon->profil($id);
		
		$data['calon_id']=$profil[0]['calon_id'];
		$data['calon_email']=$profil[0]['calon_email'];
		$data['calon_nama']=$profil[0]['calon_nama'];
		$data['calon_panggilan']=$profil[0]['calon_panggilan'];
		$data['calon_tempatlahir']=$profil[0]['calon_tempatlahir'];
		$data['calon_tanggallahir']=$profil[0]['calon_tanggallahir'];
		$data['calon_kelamin']=$profil[0]['calon_kelamin'];
		$data['calon_alamat']=$profil[0]['calon_alamat'];
		$data['calon_agama']=$profil[0]['calon_agama'];
		$data['calon_nis']=$profil[0]['calon_nis'];
		
		
		$data['calon_nama_ayah']=$profil[0]['calon_nama_ayah'];
		$data['calon_nama_ibu']=$profil[0]['calon_nama_ibu'];
		$data['calon_pendidikan_ayah']=$profil[0]['calon_pendidikan_ayah'];
		$data['calon_pendidikan_ibu']=$profil[0]['calon_pendidikan_ibu'];
		$data['calon_pekerjaan_ayah']=$profil[0]['calon_pekerjaan_ayah'];
		$data['calon_pekerjaan_ibu']=$profil[0]['calon_pekerjaan_ibu'];
		$data['calon_alamat_ortu']=$profil[0]['calon_alamat_ortu'];
		$data['calon_notelp']=$profil[0]['calon_notelp'];		

		$data['calon_asal']=$profil[0]['calon_asal'];


		$this->load->view('header', $data);
		$this->load->view('v_profil_edit', $data);
		$this->load->view('sidebar');
		$this->load->view('footer');




		}

	}

	function batal(){ 

		// $data['title']="Profil";
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		// if ($this->m_calon->get_level($data['user_id'])!='admin') {
		//  	redirect('/auth/login/');
		// } else {

		
		$this->load->model('m_calon');
		$id=$data['user_id'];
		$this->m_calon->delete($id);
		$this->m_calon->alasandis_set($id,"Membatalkan pendaftaran");
		}

		$this->tank_auth->logout();
		redirect('/auth/login/');
	}
	function simpan(){ 

		// $data['title']="Profil";
		$data['is_logged_in']=$this->tank_auth->is_logged_in();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['base_url']=$this->config->base_url();

		if (!$this->tank_auth->is_logged_in()) {
		 	redirect('/auth/login/');
		} else {

		$nama=$this->input->post('nama');
		$tempatlahir=$this->input->post('tempatlahir');
		$tanggallahir=$this->input->post('tanggallahir');
		$kelamin=$this->input->post('kelamin');
		$alamat=$this->input->post('alamat');
		$agama=$this->input->post('agama');
		$panggilan=$this->input->post('panggilan');
		$nis=$this->input->post('nis');
		
		$alamat_ortu=$this->input->post('alamat_ortu');
		$nama_ayah=$this->input->post('nama_ayah');
		$nama_ibu=$this->input->post('nama_ibu');
		$pendidikan_ayah=$this->input->post('pendidikan_ayah');
		$pendidikan_ibu=$this->input->post('pendidikan_ibu');
		$pekerjaan_ayah=$this->input->post('pekerjaan_ayah');
		$pekerjaan_ibu=$this->input->post('pekerjaan_ibu');
		$notelp=$this->input->post('notelp');

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

		
		$this->load->model('m_calon');
		$id=$data['user_id'];
		$this->m_calon->edit_simpan($id,$nama,$tempatlahir,$tanggallahir,$kelamin,$alamat,$notelp,$panggilan,$agama,$nis,$nama_ayah,$nama_ibu,$pendidikan_ayah,$pendidikan_ibu,$pekerjaan_ayah,$pekerjaan_ibu,$alamat_ortu);
		}
		// echo $id;
		redirect('/profil/');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */