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
		    $("#tanggal2").datepicker({
			format:'dd-mm-yyyy'
			
		    });
                });
	    </script>


<div class="row clearfix">
				<div class="col-md-8 column">
					
		<h3>Pengaturan</h3>	
<form name="submit" role="form" method="POST" action="daftar/submit" class="well">
		<table>
			<tr>
				<td width="200">Daya tampung siswa</td>
				<td width="400"><input class="form-control" name="dayatampung" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>Nilai minimal</td>
				<td><input class="form-control" name="batasnilai" data-validation="required number" type="text"></td>	
			</tr>
			<tr>
				<td>Tanggal pendaftaran dibuka</td>
				<td><input id="tanggal" class="form-control" name="tanggallahir" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text">
			            <!--javascript for datepicker-->
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-modal.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-transition.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-datepicker.js"></script>
				</td>
			</tr>
			<tr>
				<td>Tanggal pendaftaran ditutup</td>
				<td><input id="tanggal2" class="form-control" name="tanggallahir" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text">
			            <!--javascript for datepicker-->
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-modal.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-transition.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-datepicker.js"></script>
				</td>
			</tr>
		
			<tr>
				<td>
				</td>

				<td>
					<br>
		<button type="submit" class="btn btn-primary">Simpan</button>
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