<div class="row clearfix">
				<div class="col-md-8 column">
					
<?php 
if ($is_logged_in) {
echo "<h3>Peringkat</h3>";
echo $table;
} else {
echo "<div class=\"alert-danger\" style=\"padding:5px\"> Anda harus login untuk dapat melihat halaman peringkat.</div>";
}
?>
		

</div>