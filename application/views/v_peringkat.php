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

if (isset($subtitle)) {
	echo $subtitle;
}
echo "<form action=\"".$base_url."peringkat/bulkaction\" method=\"POST\">";

echo "<div class=\"pull-left\" id=\"leftbutton\" style=\"display:none\"><input type=\"hidden\" name=\"current_url\" value=\"".current_url()."\">";
// echo "<input class=\"btn btn-success\" type=\"submit\" id=\"modal-val\" disabled=\"disabled\"  name=\"submit\" value=\"Valid\" onclick=\"confirm('Item yang anda pilih akan ditandai sebagai data valid.')\">&nbsp&nbsp&nbsp";
echo "<input class=\"btn btn-success\" type=\"button\" id=\"modal-val\" disabled=\"disabled\" href=\"#modal-container-val\" data-toggle=\"modal\" value=\"Valid\">		
			<div class=\"modal fade\" id=\"modal-container-val\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
				<div class=\"modal-dialog\">
					<div class=\"modal-content\">
						<div class=\"modal-body\">
						Item yang anda pilih akan ditandai sebagai data valid.
						</div>
						<div class=\"modal-footer\">
							<input type=\"button\" class=\"btn btn-default\" value=\"Batal\" data-dismiss=\"modal\">  <input class=\"btn btn-success\" type=\"submit\" id=\"submit1\"  name=\"submit\" value=\"OK\">
							
						</div>
					</div>
					
				</div>
			</div>";

echo "&nbsp&nbsp&nbsp&nbsp<input class=\"btn btn-danger\" type=\"button\" id=\"modal-dis\" disabled=\"disabled\" href=\"#modal-container-dis\" data-toggle=\"modal\" value=\"Diskualifikasi\">		
			<div class=\"modal fade\" id=\"modal-container-dis\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
				<div class=\"modal-dialog\">
					<div class=\"modal-content\">
						
						<div class=\"modal-body\">
						Pesan pemberitahuan diskualifikasi<br><hr>
	 					Mohon maaf, anda didiskualifikasi karena :
	 					<br><br>
								<textarea style=\"width:540px;height:150px\" name=\"pesan_dis\" placeholder=\"Alasan diskualifikasi\"></textarea>
						</div>
						<div class=\"modal-footer\">
							<input type=\"button\" class=\"btn btn-default\" value=\"Batal\" data-dismiss=\"modal\">  <input class=\"btn btn-danger\" type=\"submit\" id=\"submit2\"  name=\"submit\" value=\"Diskualifikasi\">
							
						</div>
					</div>
					
				</div>
			</div></div>";


echo "<div class=\"btn-group pull-right\">
<button class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">
Ekspor data
</button>
<ul class=\"dropdown-menu\">
<li><a href=\"".$base_url."ekspor_data\">Keseluruhan</a></li>
<li><a href=\"".$base_url."ekspor_data/lolos\">Lulus</a></li>
<li><a href=\"".$base_url."ekspor_data/tidaklolos\">Tidak lulus</a></li>
<li><a href=\"".$base_url."ekspor_data/diskualifikasi\">Diskualifikasi</a></li>
</ul>
&nbsp&nbsp&nbsp<a href=\"".$base_url."uploads/selfie/selfie.zip\" class=\"btn btn-default\">
Unduh foto
</a>
</div>

<br>
<br>	";


}


echo $table;

if ($username=='admin') {
	echo "</form>";
}

} else {
echo "<div class=\"alert alert-danger\" style=\"padding:5px\"> Anda harus login untuk dapat melihat halaman peringkat.</div>";
}
?>
<script type="text/javascript">
 var idList = ";"
  

  function EnableDisableButton(cb, id) {

    if (cb.checked == 1) {
      idList = idList + id + ";"
      
    }

    if (cb.checked == 0) {
      var v;
      v = ";" + id + ";"
      idList = idList.replace(v, ";");
      
    }

    if (idList == ";") {
      document.getElementById('modal-dis').disabled = true;
      document.getElementById('modal-val').disabled = true;
      document.getElementById('leftbutton').style.display = 'none';
    } else {
      document.getElementById('modal-dis').disabled = false;
      document.getElementById('modal-val').disabled = false;
      
      document.getElementById('leftbutton').style.display = 'block';
    }

  }

</script>

</div>
