<div class="row clearfix">
				<?php 
				if ($username=="admin") {
				echo "<div class=\"col-md-12 column\">";
				} else {
				echo "<div class=\"col-md-8 column\">";	
				}
				
				?>
				
					
<?php 
if ($is_logged_in) {
echo "<h3>".$title."</h3>";
if ($username=='admin') {

// echo "<a href=\"".$base_url."peringkat/deletedis\" class=\"pull-right btn btn-default\">Hapus semua daftar diskualifikasi</a><br><br>";
echo "<input class=\"btn btn-danger pull-right\" type=\"button\" id=\"modal-del\"  href=\"#modal-container-del\" data-toggle=\"modal\" value=\"Hapus semua daftar diskualifikasi\">		
			<div class=\"modal fade\" id=\"modal-container-del\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
				<div class=\"modal-dialog\">
					<div class=\"modal-content\">
						<div class=\"modal-body\">
						Anda akan menghapus semua daftar peserta yang didiskualifikasi dari database. Langkah ini tidak dapat diulang.
						</div>
						<div class=\"modal-footer\">
							<input type=\"button\" class=\"btn btn-default\" value=\"Batal\" data-dismiss=\"modal\">  <a href=\"".$base_url."peringkat/deletedis\"\" class=\"btn btn-danger\">OK</a>
							
						</div>
					</div>
					
				</div>
			</div>";
}

echo $table;

if ($username=='admin') {
	echo "</form>";
}

} else {
echo "<div class=\"alert alert-danger\" style=\"padding:5px\"> Anda harus login untuk dapat melihat halaman peringkat.</div>";
}
?>
</div>
