<?php
/**
 * Created by PhpStorm.
 * User: ozgur
 * Date: 22.01.2017
 * Time: 20:52
 */
session_start();
session_destroy();

echo "Çıkış işlemi tamamlandı.";
echo "<br><a href=login.php>Login Sayfasına Git</a>";
?>