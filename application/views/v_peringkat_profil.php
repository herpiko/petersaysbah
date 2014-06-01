<div class="row clearfix">
				<div class="col-md-12 column">
<div class="pull-right">
<a href="<?php echo $base_url; ?>peringkat" class="btn btn-default">Kembali</a>
&nbsp
<?php 
if ($calon_status=="1") {
	echo "<a href=\"".$base_url."peringkat/verifikasi_unset/".$calon_id."\" class=\"btn btn-warning\">Batalkan validasi</a>";
} else {
<<<<<<< HEAD
	echo "<a href=\"".$base_url."peringkat/verifikasi/".$calon_id."\" class=\"btn btn-success\">Valid</a>";
=======
	echo "<a href=\"".$base_url."peringkat/verifikasi/".$calon_id."\" class=\"btn btn-success\">Validasi</a>";
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
}
?>
&nbsp
<!-- <a id="modal-<?php echo $calon_id;?>" href="#modal-container-<?php echo $calon_id;?>" data-toggle="modal" class="btn btn-danger">Diskualifikasi</a>		
			<div class="modal fade" id="modal-container-<?php echo $calon_id;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Diskualifikasi
							</h4>
						</div>
						<div class="modal-body">
						No. Registrasi : <?php echo $calon_id;?>
						<br>Nama : <?php echo $calon_nama;?>
						<br>Email : <?php echo $calon_email;?>
							<br><br><form method="POST" name="form-".$row['calon_id']."" action="#">
								<textarea style="width:540px;height:150px" name="pesan_diskualifikasi" placeholder="Tuliskan pesan email mengenai alasan diskualifikasi"></textarea>
							</form>
						</div>
						<div class="modal-footer">
							 <input type="button" class="btn btn-default" value="Batal" data-dismiss="modal"> <input type="submit" class="btn btn-primary" name="submit" value="Diskualifikasi dan kirim email pemberitahuan">
							</form>
						</div>
					</div>
					
				</div>
			</div>-->


</div>
<?php 
echo "<h3>Profil : ".$calon_nama."";
?>
</h3>
<div>
	<strong>
<?php 
if ($calon_status=="1") {
			echo "Data valid &nbsp&nbsp<img src=\"".$this->config->base_url()."assets/img/v1.png\" width=\"20px\">";	
			} else {
<<<<<<< HEAD
			echo "Belum valid &nbsp&nbsp<img src=\"".$this->config->base_url()."assets/img/v0.png\" width=\"20px\">";
=======
			echo "Belum divalidasi &nbsp&nbsp<img src=\"".$this->config->base_url()."assets/img/v0.png\" width=\"20px\">";
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
			}
?>
</strong>
</div>
<br>
<<<<<<< HEAD
<img src="<?php echo $calon_selfie; ?>" height="200">
<br>
<br>
=======
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
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
<<<<<<< HEAD
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
=======
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
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
<<<<<<< HEAD
		Agama
=======
		Jenis kelamin
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
	</td>
	<td>
		: &nbsp
	</td>
	<td>
<<<<<<< HEAD
		<?php echo $calon_agama; ?>
=======
		<?php echo $calon_kelamin; ?>
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
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
<<<<<<< HEAD


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
		Alamat Orang tua / Wali
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_alamat_ortu; ?>
	</td>
</tr>
=======
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
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
<<<<<<< HEAD
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
=======
<tr>
	<td>
		Nomor HP
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
	</td>
	<td>
		: &nbsp
	</td>
	<td>
<<<<<<< HEAD
		<?php echo $calon_nilai_a; ?>	
=======
		<?php echo $calon_nohp; ?>
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
	</td>
</tr>
<tr>
	<td>
<<<<<<< HEAD
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
		Rata-rata Raport Semester I s/d V
=======
		Sekolah asal
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
	</td>
	<td>
		: &nbsp
	</td>
	<td>
<<<<<<< HEAD
		<?php echo $calon_nilai_e; ?>	
	</td>
</tr>
=======
		<?php echo $calon_asal; ?>	
	</td>
</tr>

>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
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