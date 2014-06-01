<div class="col-md-4 column">
<div class="well">
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'User';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class' => 'form-control',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'form-control',
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<div style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></div>
<div style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></div>
<div style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></div>
<div style="color: red;"><?php echo form_error($captcha['name']); ?></div>
<table>
	<tr>
		<td width="75">Email</td>
		<td width="300"><?php echo form_input($login); ?></td>
		
	</tr>
	<tr>
		<td>Password </td>
		<td><?php echo form_password($password); ?></td>
	</tr>

	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Coba kode lain</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Pakai CAPTCHA suara</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Pakai CAPTCHA gambar</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Tulis kata di atas</div>
			<div class="recaptcha_only_if_audio">Tulis angka yang anda dengar</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td></td>
		<td><br><p class="alert alert-danger">Ketik kode captcha di bawah ini untuk konfirmasi bahwa anda bukan bot.</p><?php echo $captcha_html; ?><br><br></td>
	</tr>
	<tr>
		<td>Captcha</td>
		<td><?php echo form_input($captcha); ?></td>
	</tr>
	<?php }
	} ?>

	<tr>
		<td colspan="3">
			<?php echo form_checkbox($remember); ?>
			<?php echo "Ingatkan password | " ?>
			<?php echo anchor('/auth/forgot_password/', 'Lupa password?'); ?>
			<?php //if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
		</td>
	</tr>
</table>
<div class="pull-right"><input type="submit" name="submit" value="Masuk" class="btn btn-primary"></div>
<br><br>
<?php echo form_close(); ?>

</div>
			</div>
</div>