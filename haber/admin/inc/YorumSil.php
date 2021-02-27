<?php 
session_start();
require "../system/connect.php";
$yorum_id=$_REQUEST["id"];
$sil=mysql_query("Delete from yorumlar where yorum_id=$yorum_id");
if($sil){
echo '<div class="alert alert-success"> 
	<strong>Yorum Başarıyla silindi</strong>
	</div>
';
}else{
echo '<div class="alert alert-error"> 
	<strong>Bir hata oluştu</strong>
	</div>
';
}

?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php?do=Yorumlar">
