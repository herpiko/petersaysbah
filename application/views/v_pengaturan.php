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
		    $("#tanggal3").datepicker({
			format:'dd-mm-yyyy'
		    });
                });
	    </script>



<div class="row clearfix">
				<div class="col-md-8 column">
 	
		<h3>Pengaturan</h3>	
		<?php
// 		if ($notif=="Setelan baru telah disimpan") {
// 		echo "<div class=\"alert alert-warning\" style=\"font-size:14px;\">
// 		<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>".$notif."
// </div>";
// 		}
		 ?>
<form name="submit" role="form" method="POST" action="pengaturan/simpan">
		<table>
			<tr>
				<td width="200">Daya tampung siswa</td>
				<td width="400"><input class="form-control" name="dayatampung" data-validation="required number" type="text" value="<?php echo $dayatampung;?>"></td>	
			</tr>
		<!-- 	<tr>
				<td>Nilai minimal</td>
				<td><input class="form-control" name="batasnilai" data-validation="required number" type="text"></td>	
			</tr> -->
			<tr>
				<td>Pendaftaran dibuka</td>
				<td><input id="tanggal" class="form-control" name="tglbuka" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text">				
				
			            <!--javascript for datepicker-->
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-modal.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-transition.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-datepicker.js"></script>
				<script type="text/javascript">
				var elem = document.getElementById("tanggal");
				elem.value = "<?php echo $tglbuka; ?>";
				</script>
				<!-- </td><td>
				<input style="text-align:center" id="jam" class="form-control" name="jambuka" data-validation="required number" placeholder="00" type="text">
				</td><td>:</td>
				<td>
				<input style="text-align:center" id="menit" class="form-control" name="menitbuka" data-validation="required number" placeholder="00" type="text"> -->
				</td>
			</tr>
			<tr>
				<td>Pendaftaran ditutup <br>(hari terakhir)</td>
				<td><input id="tanggal2" class="form-control" name="tgltutup" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text" value="<?php echo $tgltutup; ?>">
			            <!--javascript for datepicker-->
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-modal.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-transition.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-datepicker.js"></script>
				<script type="text/javascript">
				var elem = document.getElementById("tanggal2");
				elem.value = "<?php echo $tgltutup; ?>";
				</script>

				<!-- </td><td>
				<input style="text-align:center" id="jam2" class="form-control" name="jamtutup" data-validation="required number" placeholder="00" type="text">
				</td><td>:</td>
				<td>
				<input style="text-align:center" id="menit2" class="form-control" name="menittutup" data-validation="required number" placeholder="00" type="text"> -->
				</td>
			</tr>
			<!-- <tr>
				<td>Pengumuman</td>
				<td><input id="tanggal3" class="form-control" name="tglpengumuman" data-validation="birthdate" data-validation-format="dd-mm-yyyy" type="text">
			            
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-modal.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-transition.js"></script>
			            <script src="<?php echo $base_url;?>assets/datepicker/js/bootstrap-datepicker.js"></script>
				<script type="text/javascript">
				var elem = document.getElementById("tanggal3");
				elem.value = "<?php echo $tglpengumuman; ?>";
				</script>

				</td>
			</tr> -->
		
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

