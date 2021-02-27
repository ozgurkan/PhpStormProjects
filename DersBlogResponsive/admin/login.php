<?php
/**
 * Created by PhpStorm.
 * User: ozgur
 * Date: 22.01.2017
 * Time: 20:08
 */
ob_start();
session_start();
include_once  "../system/connect.php";
include_once  "../system/functions.php";
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Yönetim Paneli</title>
</head>

<body>

<?php
if(session("login") && session("adminrank")==1)
{
    include_once "admin.php";
}
else
{
    if($_POST){
        /*Gelen verileri alalım*/

        $username=p('username');
        $password=p('password');
        if(!$username || !$password){
            header("location:login.php");
        }else{
            /*Veritabanında kayıt arama*/
            $query=query("Select * from yoneticiler Where admin_name='$username' && admin_pw='$password' && admin_rank='1' ");
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
                header("location:admin.php");
                echo "yes yes yes";
            }else{

                echo		'<div class="alert alert-error" style="margin:0 auto; width:300px">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Hata!!!</strong> Böyle bir admin bulunamadı.
						</div>';

                header("refresh:1;url=login.php");
            }

        }

    }else{

        include_once "login.php";
    }
}
?>

<div class="row-fluid">
    <div class="span12 center login-header">
        <h2>Welcome to Charisma</h2>
    </div><!--/span-->
</div><!--/row-->

<div class="row-fluid">
    <div class="well span5 center login-box">
        <div class="alert alert-info">
            Please login with your Username and Password.
        </div>
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

                <div class="input-prepend">
                    <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
                </div>
                <div class="clearfix"></div>

                <p class="center span5">
                    <button type="submit" class="btn btn-primary">Login</button>
                </p>
            </fieldset>
        </form>
    </div><!--/span-->
</div><!--/row-->
</body>
</html>
<?php ob_end_flush();?>
