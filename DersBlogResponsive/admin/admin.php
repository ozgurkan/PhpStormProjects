<?php
/**
 * Created by PhpStorm.
 * User: ozgur
 * Date: 22.01.2017
 * Time: 20:14
 */


session_start();


if(!isset($_SESSION["login"]))
{
    echo "Bu sayfayı görüntüleme yetkiniz yoktur.<br>";
    echo "<a href=login.php>Login sayfasına git</a>";


}
else

{
    echo "Admin Paneli<br>";
    echo "<a href=\"cikis.php\">Çıkış Yap</a>";


}

?>