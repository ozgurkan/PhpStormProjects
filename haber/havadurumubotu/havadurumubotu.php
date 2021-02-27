<?php include_once("fonksiyon.php"); ?>
<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<meta charset="utf-8"> 
<style type="text/css">
body { font-family: Arial; font-size: 12px; }
a img { border: none; }
.temizle { clear: both; height: 0px; }
#SelectTum { margin: 0px auto 0px auto; position: relative; width: 200px; height: 19px; }
#SehirSec { width: 200px; height: 19px; position: absolute; }
#SelectTum #HDurum { padding: 10px; border: 1px solid #ccc; background-color: #fff; display: none; position: relative; top: 30px; right: 0px; left: 0px; }
#SelectTum h1 { margin: 0px; display: block; }
#SelectTum #HDurum img { float: left; }
#SelectTum #HDurum .HavaOrtala { margin-top: 10px; width: 90px; text-align: center; float: right; }
</style>
<script>
$(document).ready(function() {
	$.havadurumu_cek = function(SehirS) {
		$('.yukle').html("Yükleniyor");
		$.post('cek.php',{ SehirS:SehirS }, function(data) {
			$('.yukle').html(data);
		});
	}

	$('#SehirSec').change( function() {
		var SehirS = $(this).val();
		var option = this.options[this.selectedIndex];
		$.havadurumu_cek(SehirS); /* post */
		$("#HDurum > h1").text($(option).text());
		$("#SelectTum > #HDurum").css("display","block");
	});
	$( "#SehirSec" ).focusout(function() {
	$("#HDurum").css("display","none");
	});
});

</script>
</head>
<body>
<?php 
$SiteyeBaglan = Baglan($Site."turkiye-sehir-listesi/");
// echo $SiteyeBaglan;
preg_match('#<div class="page">    <div class="rounded5_top box_full_up"><h2>(.*?)</h2></div><div class="rounded5_bottom box_full_down"><ul class="city_list">(.*?)</ul><div class="divbreak10"></div><center>.*?</center></div></div>#',$SiteyeBaglan,$Shrlr);
$Sehirler = $Shrlr[2];
// echo $Sehirler;
preg_match_all('#<li><a href="/havadurumu/(.*?)-hava-durumu">(.*?)</a></li>#',$Sehirler,$Sehir);
$SehirSlug = $Sehir[1];
$SehirAdi = $Sehir[2]; ?>
<div id="SelectTum">
<select name="SehirSec" id="SehirSec">
<?php for ($i = 1 ; $i < count($SehirSlug) ; $i++) { ?>
<option value="<?php echo $SehirSlug[$i]; ?>"><?php echo $SehirAdi[$i]; ?></option>
<?php } ?>
</select>
<div id="HDurum">
<h1></h1>
<div class="yukle">
</div>
</div>
</div>
</body>
</html>