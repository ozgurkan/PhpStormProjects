<?php
/**
 * Created by PhpStorm.
 * User: özgür
 * Date: 31.05.2014
 * Time: 15:32
 */
/*
* Project: Haber Scripti
*/

ob_start();
/* Güvenlik Parametrem */
function p($par){
    return mysql_real_Escape_string(strip_tags(rtrim($_POST[$par])));
}
/* Yönlendirme */
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
/* çiktilar */
function row($par){
    return mysql_fetch_array($par);
}
/* Keys */
function keylogger($par){
    return base64_encode(sha1(base64_encode(md5($par))));
}

function sef_link($baslik)
{
    $baslik = str_replace(array("&quot;","&#39;"), NULL, $baslik); // t�rnaklar i�in replace
    $bul = array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '-');
    $yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
    $perma = strtolower(str_replace($bul, $yap, $baslik));
    $perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
    $perma = trim(preg_replace('/\s+/',' ', $perma));
    $perma = str_replace(' ', '-', $perma);
    return $perma;
}

function url_baslik_yarat ($baslik="")
{
    //değiştirelecek türkçe karakterler
    $TR=array('ç','Ç','ı','İ','ş','Ş','ğ','Ğ','ö','Ö','ü','Ü');
    $EN=array('c','c','i','i','s','s','g','g','o','o','u','u');
    //türkçe karakterleri değiştirir
    $baslik= str_replace($TR,$EN,$baslik);
    //tüm karakterleri küçüklür
    $baslik=mb_strtolower($baslik,'UTF-8');
    // a'dan z'ye olan harfler, 0'dan 9 a kadar sayılar, tire (-), boşluk ve alt çizgi (_)
    // dışındaki tüm karakteri siler
    $baslik=preg_replace('#[^-a-zA-Z0-9_ ]#','',$baslik);
    //cümle aralarındaki fazla boşluğü kaldırır
    $baslik=trim($baslik);
    //cümle aralarındaki boşluğun yerine tire (-) koyar
    $baslik=preg_replace('#[-_ ]+#','-',$baslik);
    return $baslik;
}

function full_url_yarat ($baslik)
{
    return sprintf('/%s.html',url_baslik_yarat($baslik));
}

function nav_url_yarat ($baslik)
{
      return sprintf('/%s.html',url_baslik_yarat($baslik));
}
ob_end_flush();
?>
