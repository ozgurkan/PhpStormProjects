<?php
include("ayar.php");
session_start();
ob_start();
if($_POST) {
    if (($_POST["user"] == $user) and ($_POST["pass"] == $pass)) {

        $_SESSION["login"] = "true";
        $_SESSION["user"] = $user;
        $_SESSION["pass"] = $pass;

        header("Location:admin.php");

    } else {

        echo "Kullan�c� ad� veya �ifre Yanl��.";

        header("Refresh: 2; url=login.php");

    }
}
ob_end_flush();
?>


<form action="login.php" method="POST">

    <table align="center">
        <tr>
            <td>Kullan?c? Adi</td>
            <td>:</td>
            <td><input type="text" name="user"></td>
        </tr>

        <tr>
            <td>şifre</td>
            <td>:</td>
            <td><input type="password" name="pass"></td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="Giri?"></td>
        </tr>

    </table>

</form>


