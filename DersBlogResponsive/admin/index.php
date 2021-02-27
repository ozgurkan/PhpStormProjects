<?php
/**
 * Created by PhpStorm.
 * User: ozgur
 * Date: 22.01.2017
 * Time: 17:18
 */
ob_start();
session_start();
require "../system/connect.php";
require "../system/functions.php";
?>
<!DOCTYPE html>
<html lang="tr">
<head>

    <title>Yönetim Paneli</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
</head>

<body>




<?php
if(session("login") && session("adminrank")==1)
{
    echo "zaten oturum açık";
}
else
{
    if ($_POST) {
        /*Gelen verileri alalım*/
        echo "post edildi";
        $username=p('username');
        $password=p('password');
        if(!$username || !$password){
            header("location:index.php");
        }else{
            /*Veritabanında kayıt arama*/
            $query=query("Select * from admin Where admin_name='$username' && admin_pw='$password' && admin_rank='1' ");
            if(mysql_affected_rows()){
                $result=row($query);
                $_SESSION['login']=true;
                $_SESSION['adminid']=$result['admin_id'];
                $_SESSION['adminname']=$result['admin_name'];
                $_SESSION['adminlink']=$result['admin_link'];
                $_SESSION['adminrank']=$result['admin_rank'];
                $_SESSION['adminhit']=$result['admin_hit'];
                $_SESSION['adminage']=$result['admin_age'];
                $_SESSION['admingender']=$result['admin_gender'];
                echo "oturum açıldı diğer sayfaya gidecen";
            }else{

                echo		"böyle admin yok";
            }
                echo "kutula boş";
        }

    }else{

        echo "post etmedi";
    }
}



?>
<form class="form-horizontal" action="" method="post">
    <fieldset>
        <div class="input-prepend" title="Username" data-rel="tooltip">
            <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" value="admin" />
        </div>
        <div class="clearfix"></div>

        <div class="input-prepend" title="Password" data-rel="tooltip">
            <span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="admin123456" />
        </div>
        <div class="clearfix"></div>



        <p class="center span5">
            <button type="submit" class="btn btn-primary">GİRİŞ</button>
        </p>
    </fieldset>
</form>
</body>
</html>

