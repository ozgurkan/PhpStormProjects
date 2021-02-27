<?php
error_reporting(E_ALL ^ E_NOTICE);

$host='localhost';
$user='root';
$pass='';
$data='blog';
$connx=mysql_connect($host,$user,$pass);
if($connx){
$dbConnx=mysql_select_db($data)or die(mysql_error());
$language=mysql_query("SET CHARACHTER SET utf8");
mysql_query("SET NAMES 'utf8'  ");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci' ");
}
else{
die(mysql_error());
}

?>