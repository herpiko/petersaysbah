
<div class="row clearfix">
				<div class="col-md-8 column">
					
		<h3><?php echo $title; ?></h3>
<br>
<form method="POST" action="<?php echo $base_url; echo $halaman_judul;?>/update">
<div class="pull-right"><a class="btn" href="<?php echo $base_url; echo $halaman_judul;?>">Batal</a><input type="submit"class="btn btn-primary" value="Simpan">&nbsp&nbsp</div>
<br><br>
<textarea name="halaman_isi" id="content" row="10"><?php echo $halaman_isi; ?></textarea>
    <?php echo display_ckeditor($ckeditor); ?>
</form>

</div>