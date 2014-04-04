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
echo $table;
} else {
echo "<div class=\"alert alert-danger\" style=\"padding:5px\"> Anda harus login untuk dapat melihat halaman peringkat.</div>";
}
?>

		

</div>