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
<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		//'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr><td><strong>Data akun</strong></td></tr>
	<?php if ($use_username) { ?>
	<tr>
		<td><?php echo form_label('Username', $username['id']); ?></td>
		<td><?php echo form_input($username); ?></td>
		<td style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
	</tr>
	<?php } ?>
	<tr>
		<td width="200">Email</td>
		<td><?php echo form_input($email); ?></td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><?php echo form_password($password); ?></td>
		<td style="color: red;"><?php echo form_error($password['name']); ?></td>
	</tr>
	<tr>
		<td>Konfirmasi password</td>
		<td><?php echo form_password($confirm_password); ?></td>
		<td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
	</tr>

	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>
	<tr><td></td><td><br><div class="alert-info">Data akun ini digunakan untuk login ke portal</div></td></tr>
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

			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-modal.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-transition.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-datepicker.js"></script>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><select class="form-control" name="kelamin" data-validation="required" type="text">
				<option disabled>---</option>
				<option disabled>Laki-laki</option>
				<option disabled>Perempuan</option>
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
								Berkas JPG atau PDF, ukuran maksimal 200 Kb
							</p>
				</div>
				</td>
			</tr>
</table>
<?php //echo form_submit('register', 'Register'); ?>
<br>
<input type="submit" name="register" value="Daftar" class="btn btn-primary">
<?php echo form_close(); ?>


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