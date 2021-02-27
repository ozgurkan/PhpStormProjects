<?php 
session_start();
require "../system/connect.php";
$yorum_id=$_REQUEST["id"];
$sil=mysql_query("UPDATE yorumlar SET yorum_durum =1 WHERE yorum_id =$yorum_id");
if($sil){
echo '<div class="alert alert-success"> 
	<strong>Yorum Başarıyla Onaylandı</strong>
	</div>
';
}else{
echo '<div class="alert alert-error"> 
	<strong>Bir hata oluştu</strong>
	</div>
';
}

?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php?do=Yorumlar">
