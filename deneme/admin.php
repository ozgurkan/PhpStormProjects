<?php
include("ayar.php");
session_start();

if(!isset($_SESSION["login"])){

echo "Bu sayfay� g�r�nt�leme yetkiniz yoktur.";
    header("Refresh: 2; url=login.php");

}else{

echo "Admin sayfas�<br>";
echo "<a href=\"logout.php\">��k�� Yap</a>";

}

?>