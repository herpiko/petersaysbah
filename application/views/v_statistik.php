<div class="row clearfix">
				<div class="col-md-8 column">
					
		<h3><?php echo $title;?></h3>	

<p>statistik</p>

		<?php 

$email="herpiko@gmail.com";
		$x="";
		$i=0;
		while ($x!="@") {
			$x=substr($email, $i,1);
			$i++;
		}
		$i--;
		$username=substr($email,0,$i);
		echo $username;
		?>

</div>