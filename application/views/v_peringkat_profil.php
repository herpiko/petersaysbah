<div class="row clearfix">
				<div class="col-md-12 column">
<div class="pull-right">
<a href="<?php echo $base_url; ?>peringkat" class="btn btn-default">Kembali</a>
&nbsp
<?php 
if ($calon_status=="1") {
	echo "<a href=\"".$base_url."peringkat/verifikasi_unset/".$calon_id."\" class=\"btn btn-warning\">Batalkan verifikasi nilai</a>";
} else {
	echo "<a href=\"".$base_url."peringkat/verifikasi/".$calon_id."\" class=\"btn btn-success\">Verifikasi nilai</a>";
}
?>
&nbsp
<a id="modal-<?php echo $calon_id;?>" href="#modal-container-<?php echo $calon_id;?>" data-toggle="modal" class="btn btn-danger">Diskualifikasi</a>		
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
			</div>


</div>					
<?php 
echo "<h3>Profil : ".$calon_nama."";
?>
</h3>
<div>
	<strong>
<?php 
if ($calon_status=="1") {
			echo "Terverifikasi &nbsp&nbsp<img src=\"".$this->config->base_url()."assets/img/v1.png\" width=\"20px\">";	
			} else {
			echo "Belum diverifikasi &nbsp&nbsp<img src=\"".$this->config->base_url()."assets/img/v0.png\" width=\"20px\">";
			}
?>
</strong>
</div>
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
		Nomor telepon
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_notelp; ?>
	</td>
</tr>
<tr>
	<td>
		Nomor HP
	</td>
	<td>
		: &nbsp
	</td>
	<td>
		<?php echo $calon_nohp; ?>
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