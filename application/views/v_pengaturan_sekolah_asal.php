<div class="row clearfix">
				<div class="col-md-8 column">
					
		<h3><?php echo $title;?></h3>	
<div class="pull-right">
<?php 
	echo "<a class=\"btn btn-success\" id=\"modal\" href=\"#modal-container-add\" data-toggle=\"modal\" href=\"\">Tambah</a>";
	echo "
			<div class=\"modal fade\" id=\"modal-container-add\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
				<div class=\"modal-dialog\">
					<div class=\"modal-content\">
						<div class=\"modal-body\"> 
						<form role=\"form\"  name=\"form-add\" method=\"POST\" action=\"prioritas_tambah\">
						<table width=\"100%\">	
						<tr><td width=\"40%\">
						Nama Sekolah
						</td>
						<td width=\"60%\">
						<input class=\"form-control\" name=\"sch_name\" width=\"30px\" type=\"text\" label=\"Nama Sekolah\" value=\"\">
						</td></tr>
						<tr><td>
						Faktor Pengali Prioritas
						</td>
						<td>
						<input class=\"form-control\" name=\"sch_multipler\" type=\"text\" label=\"Faktor pengali\" value=\"\">
						
						</td></tr>
						</table>
						
						</div>
						<div class=\"modal-footer\">
							<input type=\"button\" class=\"btn btn-default\" value=\"Batal\" data-dismiss=\"modal\">  <input class=\"btn btn-success\" type=\"submit\" id=\"submit1\"  name=\"submit\" value=\"Simpan\">
						
						</div>
						</form>
					</div>
					
				</div>
			</div>";
?>
</div>
<br><br>
<table class="table table-striped">
<?php 


foreach ($prioritas as $key) {
	echo "<tr>";
	echo "<td>".$key['sch_name']."</td>";
	echo "<td>".$key['sch_multipler']."</td>";
	// echo "<td><a id=\"modal\" href=\"#modal-container-".$key['sch_id']."\" data-toggle=\"modal\" href=\"\"><img src=\"".$base_url."assets/img/edit.png\"></a></td>";
	echo "<td>";
	echo "<a id=\"modal\" href=\"#modal-container-".$key['sch_id']."\" data-toggle=\"modal\" href=\"\"><img src=\"".$base_url."assets/img/edit.png\"></a>";
	echo "</td>";		
	echo "</tr>";




	//.$key['sch_multipler'];
}
echo "<tr>";
	echo "<td>Sekolah lainnya</td>";
	echo "<td>".$sekolahlain['nilai']."</td>";
	// echo "<td><a id=\"modal\" href=\"#modal-container-".$key['sch_id']."\" data-toggle=\"modal\" href=\"\"><img src=\"".$base_url."assets/img/edit.png\"></a></td>";
	echo "<td>";
	echo "<a id=\"modal\" href=\"#modal-container-other\" data-toggle=\"modal\" href=\"\"><img src=\"".$base_url."assets/img/edit.png\"></a>";
	echo "</td>";		
	echo "</tr>";


?>
</table>

<?php
foreach ($prioritas as $key) {
	echo "
			<div class=\"modal fade\" id=\"modal-container-".$key['sch_id']."\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
				<div class=\"modal-dialog\">
					<div class=\"modal-content\">
						<div class=\"modal-body\"> 
						<form role=\"form\"  name=\"form-".$key['sch_id']."\" method=\"POST\" action=\"prioritas_simpan\">
						<table width=\"100%\">	
						<tr><td width=\"40%\">
						Nama Sekolah
						</td>
						<td width=\"60%\">
						<input class=\"form-control\" name=\"sch_name\" width=\"30px\" type=\"text\" label=\"Nama Sekolah\" value=\"".$key['sch_name']."\">
						</td></tr>
						<tr><td>
						Faktor Pengali Prioritas
						</td>
						<td>
						<input type=\"hidden\" name=\"sch_id\" value=\"".$key['sch_id']."\" >
						<input class=\"form-control\" name=\"sch_multipler\" type=\"text\" label=\"Faktor pengali\" value=\"".$key['sch_multipler']."\">
						
						</td></tr>
						</table>
						
						</div>
						<div class=\"modal-footer\">
							<input type=\"button\" class=\"btn btn-default\" value=\"Batal\" data-dismiss=\"modal\">  <input class=\"btn btn-success\" type=\"submit\" id=\"submit1\"  name=\"submit\" value=\"Simpan\">
						</form>
						<form class=\"pull-left\" role=\"form\"  name=\"form-hapus".$key['sch_id']."\" method=\"POST\" action=\"prioritas_hapus\">
						<input type=\"hidden\" name=\"sch_id\" value=\"".$key['sch_id']."\" >
						<input class=\"btn btn-danger\" type=\"submit\" id=\"submit\"  name=\"hapus\" value=\"Hapus\"></form>
						</div>
						
					</div>
					
				</div>
			</div>";
}
echo "
			<div class=\"modal fade\" id=\"modal-container-other\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
				<div class=\"modal-dialog\">
					<div class=\"modal-content\">
						<div class=\"modal-body\"> 
						<form role=\"form\"  name=\"form_0\" method=\"POST\" action=\"prioritas_simpan_sekolahlain\">
						<table width=\"100%\">	
						<tr><td width=\"40%\">
						Nama Sekolah
						</td>
						<td width=\"60%\">
						<input class=\"form-control\" disabled=\"disabled\" name=\"sch_name\" width=\"30px\" type=\"text\" label=\"Nama Sekolah\" value=\"Sekolah lainnya\">
						</td></tr>
						<tr><td>
						Faktor Pengali Prioritas
						</td>
						<td>
						<input type=\"hidden\" name=\"sch_id\" value=\"0\" >
						<input class=\"form-control\" name=\"sch_multipler\" type=\"text\" label=\"Faktor pengali\" value=\"".$sekolahlain['nilai']."\">
						
						</td></tr>
						</table>
						
						</div>
						<div class=\"modal-footer\">
							<input type=\"button\" class=\"btn btn-default\" value=\"Batal\" data-dismiss=\"modal\">  <input class=\"btn btn-success\" type=\"submit\" id=\"submit1\"  name=\"submit\" value=\"Simpan\">
						</form>

						</div>
						
					</div>
					
				</div>
			</div>";
 ?>

</div>