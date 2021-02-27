<?php
session_start();
ob_start();

session_destroy();

echo "��k�� Yapt�n�z.Ana Sayfaya Y�nlendiriliyorsunuz";

header("Refresh: 2; url=login.php");

ob_end_flush();
?>