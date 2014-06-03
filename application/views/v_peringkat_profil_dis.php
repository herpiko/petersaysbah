<div class="row clearfix">
				<div class="col-md-12 column">
<?php 
echo "<h3><strike>Profil : ".$calon_nama." </strike>";

?>
</h3>

<div>
	<strong>
<?php 

if ($calon_status=="1") {
			echo "Data valid &nbsp&nbsp<img src=\"".$this->config->base_url()."assets/img/v1.png\" width=\"20px\">";	
			} else {
			echo "Belum valid &nbsp&nbsp<img src=\"".$this->config->base_url()."assets/img/v0.png\" width=\"20px\">";
			}
echo "&nbsp&nbsp&nbsp <span style=\"color:red\">Diskualifikasi</span>";
?>

</strong>
</div>
<br>
Alasan diskualifikasi :
<br>
<?php echo $calon_alasandis; ?>
</span>
<br>
<br>

<img src="<?php echo $calon_selfie; ?>" height="200">
<br>
<br>
<table>
<tr>
	<td width="200">
		Nomor registrasi
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_id; ?>
	</td>
</tr>
<tr>
	<td>
		Email
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_email; ?>
	</td>
</tr>
<tr>
	<td>
		Nama Panggilan
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_panggilan; ?>
	</td>
</tr>
<tr>
	<td>
		Jenis kelamin
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_kelamin; ?>
	</td>
</tr>
<tr>
	<td>
		Tempat & tanggal lahir
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_tempatlahir.", ".$calon_tanggallahir; ?>
	</td>
</tr>
<tr>
	<td>
		Agama
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_agama; ?>
	</td>
</tr>
<tr>
	<td>
		Alamat
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_alamat; ?>
	</td>
</tr>


<tr>
	<td>
		Sekolah asal
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_asal; ?>	
	</td>
</tr>
<tr>
	<td>
		NIS/NISN
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nis; ?>
	</td>
</tr>

<tr><td><br><strong>Keterangan Orang Tua / Wali</strong></td></tr>
<tr><td><br>Nama Orang Tua / Wali</td></tr>
<tr>
	<td>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAyah
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nama_ayah; ?>
	</td>
</tr>
<tr>
	<td>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIbu
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nama_ibu; ?>
	</td>
</tr>
<tr><td><br>Pendidikan Orang Tua / Wali</td></tr>
<tr>
	<td>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAyah
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_pendidikan_ayah; ?>
	</td>
</tr>
<tr>
	<td>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIbu
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_pendidikan_ibu; ?>
	</td>
</tr>
<tr><td><br>Pekerjaan Orang Tua / Wali</td></tr>
<tr>
	<td>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAyah
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_pekerjaan_ayah; ?>
	</td>
</tr>
<tr>
	<td>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIbu
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_pekerjaan_ibu; ?>
	</td>
</tr>
<tr><td><br></td></tr>
<tr>
	<td>
		Nomor telepon
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_notelp; ?>
	</td>
</tr>
<tr><td><br></td></tr>
<tr>
	<td>
		<strong>Skor nilai</strong>
	</td>
	<td>
		: &nbsp
	</td>
	<td><strong>
		<?php echo $calon_nilai_g; ?>	
		</strong>
	</td>
</tr>
<tr><td><br><strong>Ujian Nasional</strong></td></tr>
<tr>
	<td>
		Bahasa Indonesia
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nilai_a; ?>	
	</td>
</tr>
<tr>
	<td>
		Matematika
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nilai_b; ?>	
	</td>
</tr>
<tr>
	<td>
		Bahasa Inggris
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nilai_c; ?>	
	</td>
</tr>
<tr>
	<td>
		IPA
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nilai_d; ?>	
	</td>
</tr>
<tr>
	<td>
		Rata-rata UN
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nilai_f; ?>	
	</td>
</tr>
<tr><td><br><strong>Nilai Sekolah</strong></td></tr>
<tr>
	<td>
		Rata-rata Raport Semester I s/d VI
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nilai_e; ?>	
	</td>
</tr>
<!-- <tr>
	<td>
		Berkas scan ijazah
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<a href="">unduh</a>
	</td>
</tr> -->


</table>
<br>		

</div>