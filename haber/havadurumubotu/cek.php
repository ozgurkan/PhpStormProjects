<?php 
include_once("fonksiyon.php");
function havadurumu_cek($SehirS) {
	$Icerik = Baglan("http://www.havadurumu.com.tr/havadurumu/".$SehirS."-hava-durumu");
	preg_match('#<div class="box_silver_down w\d+" style="height: 80px;">\s+<div class="left pl\d+" style="text-align: center;">\s+<img src="/icons/(.*?).png"\s+alt=".*?" title=".*?" /></div>\s+<div class="right" style="text-align: center; width: 100px; padding: .*?px;">\s+<span class="cur_temp">\s+(.*?)</span><br />\s+(.*?)</div>\s+</div>#',$Icerik,$SehirAyrinti);
	$HavaResim = "http://www.havadurumu.com.tr/icons/".$SehirAyrinti[1].".png";
	$HavaDerece = $SehirAyrinti[2];
	$HavaDiger = $SehirAyrinti[3]; ?>
	<img src="<?php echo $HavaResim; ?>" />
	<div class="HavaOrtala">
	<h1><?php echo $HavaDerece; ?></h1>
	<div class="temizle"></div>
	<?php echo $HavaDiger; ?>
	</div>
	<div class="temizle"></div>
<?php }

	if(isset($_POST["SehirS"])) { 
	$SehirS = $_POST["SehirS"];
	havadurumu_cek($SehirS);
}

?>