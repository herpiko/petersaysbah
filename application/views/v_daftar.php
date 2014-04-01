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



<div class="row clearfix">
				<div class="col-md-8 column">
					
		<h3>Formulir Pendaftaran</h3>	
	<form name="submit" role="form" method="POST" action="daftar/submit" class="well">
		<table>
			<tr><td>
			<strong>Data Akun</strong>
			</td>
			</tr>
			<tr>
				<td width="200">Email</td>
				<td width="500"><input class="form-control" name="email" data-validation="email"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input class="form-control" type="password" name="pass_confirmation" data-validation="length" data-validation-length="min8"></td>
			</tr>
			<tr>
				<td>Tulis ulang Password</td>
				<td><input class="form-control" type="password" name="pass" data-validation="confirmation"></td>
			</tr>
			<tr><td>
				<br>	
			<strong>Data Pribadi</strong>
			</td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><input class="form-control" name="nama" data-validation="required" type="text"></td>	
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td><input class="form-control" name="tempatlahir" data-validation="required" type="text"></td>	
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input id="tanggal" class="form-control" name="tanggallahir" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text">
			            <!--javascript for datepicker-->
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-modal.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-transition.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-datepicker.js"></script>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><select class="form-control" name="kelamin" data-validation="required" type="text">
				<option>---</option>
				<option>Laki-laki</option>
				<option>Perempuan</option>
				</select>
				</td>	
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea row="2" class="form-control" name="alamat" data-validation="required" type="text"></textarea>
				</td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td><input class="form-control" name="notelp" data-validation="" type="text"></td>	
			</tr>
			<tr>
				<td>Nomor Ponsel</td>
				<td><input class="form-control" name="nohp" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>SMP Asal</td>
				<td><input class="form-control" name="asal" data-validation="required" type="text"></td>	
			</tr>

			<tr>
				<td><br>
					<strong>Nilai Ujian</strong>
				</td></tr>
			<tr>
				<td>Total Nilai Ujian Nasional</td>
				<td><input class="form-control" name="nilai" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>Nilai Mata Pelajaran A</td>
				<td><input class="form-control" name="nilai_a" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>Nilai Mata Pelajaran B</td>
				<td><input class="form-control" name="nilai_b" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>Nilai Mata Pelajaran C</td>
				<td><input class="form-control" name="nilai_c" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>Nilai Mata Pelajaran D</td>
				<td><input class="form-control" name="nilai_d" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>Nilai Mata Pelajaran E</td>
				<td><input class="form-control" name="nilai_e" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>Nilai Mata Pelajaran F</td>
				<td><input class="form-control" name="nilai_f" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>
					Berkas Scan Ijazah
				</td>
				<td>
				<div class="form-group">
							 <br><input id="exampleInputFile" type="file">
							<p class="help-block">
								Example block-level help text here.
							</p>
				</div>
				</td>
			</tr>
			<tr>
				<td>
				</td>

				<td>


					<b r>
				
		<button type="submit" class="btn btn-primary">Kirim</button>
					</form>
				</td>
			</tr>

		</table>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/validation.js"></script>
 
<script>
  $.validate({
    modules : 'security','date'
  });
</script>

<script> 

 var myLanguage = {
      requiredFields : 'Tidak boleh kosong',
      badEmail : 'E-mail harus ditulis dengan benar',
      lengthTooShortStart : 'Minimal ',
      };

  $.validate({
    language : myLanguage


});
 </script>
					
						
				
		
	
</div>