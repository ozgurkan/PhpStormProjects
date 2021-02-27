<?php
/*
* Project: Haber Scripti
*/
 
ob_start();
/* G?venlik Parametrem */
function p($par){
return mysql_real_Escape_string(strip_tags(rtrim($_POST[$par])));
}
/* Y?nlendirme */
function go($par, $pa){
if($pa){
header("Refresh: {$pa}; URL={$par}");
}else{
header("Location: {$par}");
}
}
/* Oturumu Tasi */
function session($par){
if($_SESSION[$par]) { return $_SESSION[$par]; } else{ return false; }
}
/* Oturum Olustur */
function set_session($par){
foreach($par as $pa => $deger){
$_SESSION[$pa] = $deger;
}
}
/* Sorgu */
function query($par){
return mysql_query($par);
}
/* ?iktilar */
function row($par){
return mysql_fetch_array($par);
}
/* Keys */
function keylogger($par){
return base64_encode(sha1(base64_encode(md5($par))));
}

function sef_link($baslik)
{
   $baslik = str_replace(array("&quot;","&#39;"), NULL, $baslik); // t?rnaklar i?in replace
   $bul = array('?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '-');
   $yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
   $perma = strtolower(str_replace($bul, $yap, $baslik));
   $perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
   $perma = trim(preg_replace('/\s+/',' ', $perma));
   $perma = str_replace(' ', '-', $perma);
   return $perma;
}
ob_end_flush();
?>
