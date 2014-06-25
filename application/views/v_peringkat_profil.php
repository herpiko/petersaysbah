<div class="row clearfix">
				<div class="col-md-12 column">
<div class="pull-right">
<a href="<?php echo $base_url; ?>peringkat" class="btn btn-default">Kembali</a>
&nbsp
<?php 
if ($calon_status=="1") {
	echo "<a href=\"".$base_url."peringkat/verifikasi_unset/".$calon_id."\" class=\"btn btn-warning\">Batalkan validasi</a>";
} else {
	echo "<a href=\"".$base_url."peringkat/verifikasi/".$calon_id."\" class=\"btn btn-success\">Valid</a>";
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
			echo "Belum valid &nbsp&nbsp<img src=\"".$this->config->base_url()."assets/img/v0.png\" width=\"20px\">";
			}
?>
<br>Peringkat : <?php echo $calon_rank; ?> <br><?php echo $calon_rank_status; ?>
</strong>
</div>
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
		Alamat Orang tua / Wali
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_alamat_ortu; ?>
	</td>
</tr>
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
		Rata-rata nilai semester
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nilai_e; ?>	
	</td>
</tr>
	<tr>
			<td><br></td>
	</tr>
<tr>
</tr>
	<tr>
			<td><strong>Detail nilai Semester</strong></td>
	</tr>
<tr>
<?php
	$semester_1=explode("-", $semester_all[0]);
	$semester_2=explode("-", $semester_all[1]);
	$semester_3=explode("-", $semester_all[2]);
	$semester_4=explode("-", $semester_all[3]);
	$semester_5=explode("-", $semester_all[4]);
	$semester_6=explode("-", $semester_all[5]);
 ?>
	<td></td><td></td>
	<td>
		<table class="table-striped">

		<tr>
			<td width="250px"></td>
			<td width="75px"><strong>I</strong></td>
			<td width="75px"><strong>II</strong></td>
			<td width="75px"><strong>III</strong></td>
			<td width="75px"><strong>IV</strong></td>
			<td width="75px"><strong>V</strong></td>
			<td width="75px"><strong>VI</strong></td>
		</tr>
		<tr>
			<td>Bahasa Indonesia</td>
			<td><?php echo $semester_1[0]; ?></td>
			<td><?php echo $semester_2[0]; ?></td>
			<td><?php echo $semester_3[0]; ?></td>
			<td><?php echo $semester_4[0]; ?></td>
			<td><?php echo $semester_5[0]; ?></td>
			<td><?php echo $semester_6[0]; ?></td>
		</tr>
		<tr>
			<td>Matematika</td>
			<td><?php echo $semester_1[1]; ?></td>
			<td><?php echo $semester_2[1]; ?></td>
			<td><?php echo $semester_3[1]; ?></td>
			<td><?php echo $semester_4[1]; ?></td>
			<td><?php echo $semester_5[1]; ?></td>
			<td><?php echo $semester_6[1]; ?></td>
		</tr>
		<tr>
			<td>Bahasa Inggris</td>
			<td><?php echo $semester_1[2]; ?></td>
			<td><?php echo $semester_2[2]; ?></td>
			<td><?php echo $semester_3[2]; ?></td>
			<td><?php echo $semester_4[2]; ?></td>
			<td><?php echo $semester_5[2]; ?></td>
			<td><?php echo $semester_6[2]; ?></td>
		</tr>
		<tr>
			<td>IPA</td>
			<td><?php echo $semester_1[3]; ?></td>
			<td><?php echo $semester_2[3]; ?></td>
			<td><?php echo $semester_3[3]; ?></td>
			<td><?php echo $semester_4[3]; ?></td>
			<td><?php echo $semester_5[3]; ?></td>
			<td><?php echo $semester_6[3]; ?></td>
		</tr>

	</table>
	</td>
</tr>

</table>
<br>		

</div>