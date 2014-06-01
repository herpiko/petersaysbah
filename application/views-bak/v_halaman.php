<div class="row clearfix">
				<div class="col-md-8 column">
<!-- 	<?php
		if ($halaman_judul=="welcome") {
		echo "<div class=\"alert alert-warning\" style=\"font-size:20px;\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>".$pesan."
</div>";
		}
		 ?> -->
					
		<h3><?php echo $title; ?></h3><?php if ($username=="admin") {
			echo "<a class=\"pull-right\" href=\"".$base_url.$halaman_judul."/edit\">[sunting]</a>";
} 
echo "<p>";
echo $halaman_isi;
echo "</p>";
?>
		



		

</div>