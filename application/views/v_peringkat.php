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
echo "<h3>Peringkat</h3>";
if ($username=='admin') {
	echo "<a href=\"".$base_url."ekspor_data\" class=\"pull-right btn btn-default\">Eksport data ke berkas Excel</a><br><br>";
}
echo $table;
} else {
echo "<div class=\"alert alert-danger\" style=\"padding:5px\"> Anda harus login untuk dapat melihat halaman peringkat.</div>";
}
?>

		

</div>
