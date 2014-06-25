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

<style media="screen" type="text/css">

	#sekolahlain{display:none;}

</style>
<div class="row clearfix">
				<div class="col-md-8 column">
					<h3>Formulir Pendaftaran</h3>
					
<div class="alert alert-warning">Data akun akan digunakan untuk login ke portal. Pastikan anda mengisi data di bawah ini dengan benar. </div>
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
	'size'	=> 50,
	'class' => 'form-control',
	'data-validation' => 'required email'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control',
	'data-validation' => 'required length',
	'data-validation-length' => 'min8'
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control',
	'data-validation' => 'required length',
	'data-validation' => 'confirmation'
	

);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'form-control',
	
);
?>
<?php echo form_open_multipart($this->uri->uri_string(),'onsubmit="return validation(this)"'); ?>
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
				<td>Nama Panggilan</td>
				<td><input class="form-control" name="panggilan" data-validation="required" type="text"></td>	
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><select class="form-control" name="kelamin" data-validation="required" type="text">
				<option selected disabled>-- Pilih jenis kelamin --</option>
				<option>Laki-laki</option>
				<option>Perempuan</option>
				</select>
				</td>	
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td><input class="form-control" name="tempatlahir" data-validation="required" type="text"></td>	
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input id="tanggal" class="form-control" name="tanggallahir" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text" placeholder="DD-MM-YYYY">

			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-modal.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-transition.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-datepicker.js"></script>
				</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td><input class="form-control" name="agama" data-validation="required" type="text"></td>	
			</tr>
			<tr>
				<td>Alamat Siswa</td>
				<td><textarea row="2" class="form-control" name="alamat" data-validation="required" type="text"></textarea>
				</td>
			</tr>
			<tr>
				<td>Asal Sekolah</td>
				<td>
				<p> 
				<!-- <input class="form-control" name="asal" data-validation="required" type="text"> -->
				<select class="form-control" name="asal" data-validation="required" type="text">
				<option selected disabled>-- Pilih sekolah --</option>

				<?php
				
					foreach ($sch as $key) {
						echo "<option value=\"".$key['sch_id']."\">".$key['sch_name']."</option>";
						
					}
				 ?>

<!-- 				<option value="1">SMP Negeri 1 Dompu</option>
				<option value="2">SMP Negeri 2 Dompu</option>
				<option value="3">SMP Negeri 3 Dompu</option>
				<option value="4">SMP Negeri 4 Dompu</option>
				<option value="5">SMP Negeri 5 Dompu</option>
				<option value="6">SMP Negeri 6 Dompu</option>
				<option value="7">SMP Negeri 7 Dompu</option>
				<option value="8">SMP Negeri 1 Woja</option>
				<option value="9">SMP Negeri 2 Woja</option>
				<option value="10">SMP Negeri 3 Woja</option>
				<option value="11">SMP Negeri 4 Woja</option>
				<option value="12">MTs Kandai II Woja</option>
				<option value="13">SMP Negeri 1 Pajo</option>
				<option value="14">SMP Negeri 2 Pajo</option>
				<option value="15">MTs Al-Kautsar Pajo</option>
				<option value="16">SMP Negeri 1 Manggalewa</option>
				<option value="17">SMP Negeri 2 Manggalewa</option>
				<option value="18">SMP Negeri 3 Manggalewa</option>
				<option value="19">SMP Negeri 1 Kempo</option>
				<option value="20">SMP Negeri 1 Kempo</option>  -->
				<option value="0">Sekolah lainnya </option>
				</select>
				</p>
				</td>	
			</tr>
			<tr>
				<td></td>
				<td>

					 <div id="sekolahlain">
				    
    				</div>
<script type="text/javascript">
$('p select[name=asal]').change(function(e){
  if ($('p select[name=asal]').val() == '0'){
    $('#sekolahlain').show();
    document.getElementById('sekolahlain').innerHTML = "<p><input class=\"form-control\" name=\"sekolahlain\" type=\"text\" placeholder=\"Nama Sekolah\" data-validation=\"required\" size=\"50\" /></p>";
    $.validate();
    
  }else{
    $('#sekolahlain').hide();
  }
});
</script>
				</td>
			</tr>
			<tr>
				<td>NIS/NISN</td>
				<td><input class="form-control" name="nis" data-validation="required number length" data-validation-length="max12" type="text"></td>	
			</tr>
			<tr>
				<td>
				</td>
				<td><br>
					<div class="alert alert-warning">Berkas foto rasio 3x4 dengan height minimal 500px, harus dalam format jpg dan  berukuran di bawah 500 KB</div>
				</td>
			</tr>
			<tr>
				<td>
 				
    			Pas foto
				</td>
				<td>


					Pilih berkas foto untuk diunggah : <input name="userfile" type="file" data-validation="required"/>
<br><div id="valid_msg"/>
<script type="text/javascript">
function validation(thisform)
{
   with(thisform)
   {
      if(validateFileExtension(userfile, "valid_msg", "Berkas foto harus dalam format *.jpg (ekstensi huruf kecil)",
      new Array("jpg")) == false)
      {
         return false;
      }
      if(validateFileSize(userfile,500000, "valid_msg", "Berkas foto harus lebih kecil dari 500 KB !")==false)
      {
         return false;
      }
   }
}
function validateFileExtension(component,msg_id,msg,extns)
{
   var flag=0;
   with(component)
   {
      var ext=value.substring(value.lastIndexOf('.')+1);
      for(i=0;i<extns.length;i++)
      {
         if(ext==extns[i])
         {
            flag=0;
            break;
         }
         else
         {
            flag=1;
         }
      }
      if(flag!=0)
      {
         document.getElementById(msg_id).innerHTML=msg;
         component.value="";
         component.style.backgroundColor="#eab1b1";
         component.style.border="thin solid #000000";
         component.focus();
         return false;
      }
      else
      {
         return true;
      }
   }
}
function validateFileSize(component,maxSize,msg_id,msg)
{
   if(navigator.appName=="Microsoft Internet Explorer")
   {
      if(component.value)
      {
         var oas=new ActiveXObject("Scripting.FileSystemObject");
         var e=oas.getFile(component.value);
         var size=e.size;
      }
   }
   else
   {
      if(component.files[0]!=undefined)
      {
         size = component.files[0].size;
      }
   }
   if(size!=undefined && size>maxSize)
   {
      document.getElementById(msg_id).innerHTML=msg;
      component.value="";
      component.style.backgroundColor="#eab1b1";
      component.style.border="thin solid #000000";
      component.focus();
      return false;
   }
   else
   {
      return true;
   }
}
</script>
			</td>
			</tr>
			<tr><td><strong>Nilai Ijazah</strong></td>
			<tr>
				<td>
				</td>
				<td><br>
					<div class="alert alert-warning">Skala nilai ujian : 1 sampai dengan 10<br>Nilai desimal dapat dilambangkan dengan tanda titik (.)<br> misal : 7.51</div>
				</td>
			</tr>
			<td></td>
			<td><table width="100%"><tr>
				<td width="33%" style="text-align:center;">Nilai Ujian Nasional</td>
				<td width="33%" style="text-align:center;">Nilai Sekolah</td>
				<td width="33%" style="text-align:center;">Nilai Akhir</td>				
				</tr></table></td>

			</tr>
			<tr><!-- 
				<td>Nilai rata-rata</td>
				<td><input class="form-control" name="nilai" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[1;40]" type="text"></td>	
			</tr> -->
			<tr>
				<td>Nilai Bahasa Indonesia</td>
				<td><table><tr>
				<td><input class="form-control" name="nilai_a" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control" name="x" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;" style="text-align:center;"></td>
				<td><input class="form-control" name="x" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				</tr></table></td>
			</tr>
			<tr>
				<td>Nilai Matematika</td>
				<td><table><tr>
				<td><input class="form-control" name="nilai_b" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control" name="x" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control" name="x" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				</tr></table></td>
			</tr>
			<tr>
				<td>Nilai Bahasa Inggris</td>
				<td><table><tr>
				<td><input class="form-control" name="nilai_c" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control" name="x" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control" name="x" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				</tr></table></td>
			</tr>
			<tr>
				<td>Nilai IPA</td>
				<td><table><tr>
				<td><input class="form-control" name="nilai_d" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>	
				<td><input class="form-control" name="x" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control" name="x" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				</tr></table></td>
			</tr>
			<tr>
			<tr><td><br></td></tr>
			<tr><td><strong>Nilai Semester</strong></td></tr>
			<tr><td><br></td>
			<td>
				<div class="alert alert-warning">Skala nilai semester : 10 sampai dengan 100</div>
			</td></tr>
			
			
			<tr>
				<td></td>
				<td>
				
				<table class="table-striped">
				<thead>
				<tr style="text-align:center">
					<strong>
					<td>Mapel</td>
					<td></td>
					<td>I</td>
					<td>II</td>
					<td>III</td>
					<td>IV</td>
					<td>V</td>
					<td>VI</td>
					
				</strong>
				</tr>
				</thead>
				<tr>
				<td>Bahasa Indonesia</td>
				<td>&nbsp&nbsp&nbsp</td>
				<td><input class="form-control input-small" name="nilai_bi_1" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bi_2" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bi_3" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bi_4" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bi_5" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bi_6" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>

				</tr>
				<tr>
				<td>Matematika</td>
				<td>&nbsp&nbsp&nbsp</td>
				<td><input class="form-control input-small" name="nilai_ma_1" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_ma_2" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_ma_3" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_ma_4" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_ma_5" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_ma_6" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				
				</tr>
				<tr>
				<td>Bahasa Inggris</td>
				<td>&nbsp&nbsp&nbsp</td>
				<td><input class="form-control input-small" name="nilai_en_1" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_en_2" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_en_3" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_en_4" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_en_5" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_en_6" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				
				</tr>
				<tr>
				<td>IPA</td>
				<td>&nbsp&nbsp&nbsp</td>
				<td><input class="form-control input-small" name="nilai_bo_1" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bo_2" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bo_3" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bo_4" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bo_5" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_bo_6" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="integer,range[10;100]" type="text" style="text-align:center;"></td>
				
				</tr>
				<!-- <tr>
				<td>Fisika</td>
				<td>&nbsp&nbsp&nbsp</td>
				<td><input class="form-control input-small" name="nilai_fi_1" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_fi_2" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_fi_3" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_fi_4" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_fi_5" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				<td><input class="form-control input-small" name="nilai_fi_6" data-validation="required number" data-validation-decimal-separator="." data-validation-allowing="float,range[0;10]" type="text" style="text-align:center;"></td>
				
				</tr> -->
				</table>
				</td>	
			</tr>	
			<!-- <tr>
				<td>Nilai F</td>
				<td><input class="form-control" name="nilai_f" data-validation="required number" type="text"></td>	
			</tr> -->
		<!-- 	<tr>
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
			</tr> -->
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
				<td><input class="form-control" name="nama_ayah" data-validation="required" type="text"></td>
			</tr>
			<tr>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIbu</td>
				<td><input class="form-control" name="nama_ibu" data-validation="required" type="text"></td>
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
				<option selected disabled>-- Pilih salah satu --</option>
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
				<option selected disabled>-- Pilih salah satu --</option>
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
				<td><input class="form-control" name="pekerjaan_ayah" data-validation="required" type="text"></td>
			</tr>
			<tr>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIbu</td>
				<td><input class="form-control" name="pekerjaan_ibu" data-validation="required" type="text"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Alamat Orang Tua / Wali</td>
				<td><input class="form-control" name="alamat_ortu" data-validation="required" type="text"></td>	
			</tr>
			<tr>
				<td>No Telp / HP Orang Tua / Wali</td>
				<td><input class="form-control" name="notelp" data-validation="required" type="text"></td>	
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
		<td>
		</td>
		<td>
			
			<br><?php echo $captcha_html; ?>
			<p>Ketik kode captcha di atas ini.</p>
		</td>
	</tr>
	<tr>
		<td>Captcha</td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>
</table>
<br>
<div class="alert alert-info">
<table><tr><td width="30">
<input type="checkbox" name="agreement" data-validation="required" value="TRUE"> </td>
<td>
Saya menyatakan bahwa informasi yang saya tulis dan unggah di atas adalah benar dan saya bersedia mengikuti aturan yang berlaku dalam penyelenggaraan PSB ini, termasuk didiskualifikasi jika data yang saya tulis tidak benar.
</td>
</tr></table>
</div>
<table>
<tr><td width="200"></td><td><input type="submit" name="register" value="Daftar" class="btn btn-primary" style="width:400px	"></td></tr>
</table>
<?php //echo form_submit('register', 'Register'); ?>
<br>

<?php echo form_close(); ?>


<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/validation.js"></script>
 
<script>
  $.validate({
    modules : 'security','date','file'
  });
</script>

<script> 

 var myLanguage = {
      requiredFields : 'Tidak boleh kosong',
      badInt : 'Format angka belum benar.',
      lengthTooShortStart : 'Minimal ',
      lengthTooLongStart : 'Maksimal ',
      };

  $.validate({
    language : myLanguage


});
 </script>

</div>