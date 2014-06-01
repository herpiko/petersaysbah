

<div class="row clearfix">
				<div class="col-md-8 column">
					<h3><?php echo $title;?>...</h3>
					<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control'
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td width="100">Email </td>
		<td><?php echo form_input($email); ?></td>
		<td>&nbsp&nbsp<input class="btn btn-primary" type="submit" name="send" value="Kirim ulang"></td>
	</tr>
<tr>
	<td>
	</td>
	<td>
	<div style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></div>
	</td>	
</tr>
</table>
 

<?php echo form_close(); ?>

</div>