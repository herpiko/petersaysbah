<div class="row clearfix">
				<div class="col-md-8 column">
<link rel="stylesheet" href="<?php echo $base_url;?>assets/datepicker/css/datepicker.css">

	    <style>
		.datepicker{z-index:1151;}
	    </style>
	    <!--some script for datepicker-->
	    <script>
		$(function(){
		    $("#tanggal").datepicker({
			format:'dd-mm-yyyy'
			
		    });
                });
	    </script>
<?php 
echo "<h3>Sunting profil";
?>
</h3>
<div>
<form name="submit" role="form" method="POST" action="<?php echo $base_url;?>profil/simpan">
<table>
<tr><td width="200">
				<br>	
			<strong>Data Pribadi</strong>
			</td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td width="400" ><input class="form-control" name="nama" data-validation="required" type="text" value="<?php echo $calon_nama ?>"></td>	
			</tr>
			<tr>
				<td>Nama Panggilan</td>
				<td width="400" ><input class="form-control" name="panggilan" data-validation="required" type="text" value="<?php echo $calon_panggilan ?>"></td>	
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><select class="form-control" name="kelamin" data-validation="required" type="text">
				<option disabled>-- Pilih Jenis Kelamin --</option>
				<option <?php if ($calon_kelamin=="Laki-laki") { echo "selected"; } ?>>Laki-laki</option>
				<option <?php if ($calon_kelamin=="Perempuan") { echo "selected"; } ?>>Perempuan</option>
				</select>
				</td>	
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td><input class="form-control" name="tempatlahir" data-validation="required" type="text" value="<?php echo $calon_tempatlahir ?>"></td>	
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input id="tanggal" class="form-control" name="tanggallahir" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text" placeholder="DD-MM-YYYY" value="<?php echo $calon_tanggallahir ?>">

			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-modal.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-transition.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-datepicker.js"></script>
				</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td><input class="form-control" name="agama" data-validation="required" type="text" value="<?php echo $calon_agama ?>"></td>	
			</tr>
			<tr>
				<td>Alamat Lengkap</td>
				<td><textarea row="2" class="form-control" name="alamat" data-validation="required" type="text"><?php echo $calon_alamat; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>NIS/NISN</td>
				<td><input class="form-control" name="nis" data-validation="required" type="text" value="<?php echo $calon_nis ?>"></td>	
			</tr>
			<tr>
				<td><br>
					<strong>Keterangan Orang Tua / Wali</strong>

				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td><br>
					Nama Orang Tua / Wali
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAyah</td>
				<td><input class="form-control" name="nama_ayah" data-validation="required" type="text" value="<?php echo $calon_nama_ayah ?>"></td>
			</tr>
			<tr>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIbu</td>
				<td><input class="form-control" name="nama_ibu" data-validation="required" type="text" value="<?php echo $calon_nama_ibu ?>"></td>
			</tr>
			<tr>
				<td><br>
					Pendidikan Orang Tua / Wali
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAyah</td>
				<td><select class="form-control" name="pendidikan_ayah" data-validation="required" type="text">
				<option disabled>-- Pilih salah satu --</option>
				<option value="SD">SD</option>
				<option value="SMP">SMP</option>
				<option value="SMA">SMA</option>
				<option value="Sarjana">Sarjana</option>
				<option value="Tidak Sekolah">Tidak sekolah</option>
				</select></td>
			</tr>
			<tr>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIbu</td>
				<td><select class="form-control" name="pendidikan_ibu" data-validation="required" type="text">
				<option disabled>-- Pilih salah satu --</option>
				<option value="SD">SD</option>
				<option value="SMP">SMP</option>
				<option value="SMA">SMA</option>
				<option value="Sarjana">Sarjana</option>
				<option value="Tidak Sekolah">Tidak sekolah</option>
				</select></td>
			</tr>
			<tr>
				<td><br>
					Pekerjaan Orang Tua / Wali
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAyah</td>
				<td><input class="form-control" name="pekerjaan_ayah" data-validation="required" type="text" value="<?php echo $calon_pekerjaan_ayah ?>"></td>
			</tr>
			<tr>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIbu</td>
				<td><input class="form-control" name="pekerjaan_ibu" data-validation="required" type="text" value="<?php echo $calon_pekerjaan_ibu ?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Alamat Orang Tua / Wali</td>
				<td><textarea class="form-control" name="alamat_ortu" data-validation="required" type="text"><?php echo $calon_alamat_ortu ?></textarea></td>	
			</tr>
			<tr>
				<td>No Telp / HP Orang Tua / Wali</td>
				<td><input class="form-control" name="notelp" data-validation="required" type="text" value="<?php echo $calon_notelp ?>"></td>	
			</tr>

			
			<tr><td><br></td></tr>
			<tr><td></td><td class="pull-right"><a href=".." class="btn btn-default">Kembali</a>
			<input type="submit" name="submit" Value="Simpan" class="btn btn-primary">
			</td></tr>
</table>
</form>		
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/validation.js"></script>
 
<script>
  $.validate({
    modules : 'security','date'
  });
</script>

<script> 

 var myLanguage = {
      requiredFields : 'Tidak boleh kosong',
      badInt : 'Format angka belum benar.',
      lengthTooShortStart : 'Minimal ',
      };

  $.validate({
    language : myLanguage


});
 </script>

</div></div>