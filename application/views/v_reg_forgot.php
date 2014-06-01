

<div class="row clearfix">
				<div class="col-md-8 column">
					<h3><?php echo $title;?>...</h3>
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control'
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td width="100">Email</td>
		<td><?php echo form_input($login); ?></td>
		<td>&nbsp&nbsp<input type="submit" name="reset" value="Kirim password baru" class="btn btn-primary"></td>
		</tr>
	<tr>
		<td>
		</td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
</table>

<?php echo form_close(); ?>

</div>