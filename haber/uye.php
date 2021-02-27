<?php
/**
 * Created by PhpStorm.
 * User: özgür
 * Date: 10.05.2014
 * Time: 12:26
 */
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
$connectFile = "system/connect.php";
if(file_exists($connectFile)){
    require $connectFile;
    require "system/functions.php";
}
else{
    die("<h1>Bağlantı dosyanız yok</h1>");
}
/*İNTERNET EXPLORER KISITLAMASI SADECE 10 DA ÇALIŞICAK*/
$tarayici=$_SERVER['HTTP_USER_AGENT'];
if(stristr($tarayici,"MSIE 8.0") || stristr($tarayici,"MSIE 7.0") ||stristr($tarayici,"MSIE 9.0") ){
    print "Lütfen tarayıcınızı günceleyiniz";
}else{
?>
<!doctype html>
<html lang="tr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="refresh" content="300">
    <meta charset="UTF-8">
    <title>HeberStudio</title>
    <link rel="shortcut icon" href="img/icons/sekme.ico">

    <!-- fontawesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" />


    <!-- Style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/uye.css" rel="stylesheet" type="text/css" />

    <!--JAVASCRİPT-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script type="text/javascript">
        function bookmarksite(title,url){
            if (window.sidebar) // firefox
                window.sidebar.addPanel(title, url, "");
            else if(window.opera && window.print){ // opera
                var elem = document.createElement('a');
                elem.setAttribute('href',url);
                elem.setAttribute('title',title);
                elem.setAttribute('rel','sidebar');
                elem.click();
            }
            else if(document.all)// ie
                window.external.AddFavorite(url, title);
        }
    </script>
</head>
<body style="cursor: hand">
<div id="container">
    <!--HEADER-->
    <header>
        <div id="sol">
            <a href="index.php"><em class="fa fa-home"><h3>ANASAYFA</h3></em></a>
            <a href="javascript:bookmarksite('Heber46','http://www.heber46.tk/')"><em class="fa fa-star-o"><h3 style="font-size: 15px;text-align: center">Sık Kullanılanlara Ekle</h3></em></a>
        </div>
        <div id="sosyal_medya">
            <ul>
                <?php
                $sosyal_medya=mysql_query("select * from Sosyal WHERE Sm_Durum=1 ");
                if(mysql_num_rows($sosyal_medya)==0){
                }else{
                    while($satır=mysql_fetch_array($sosyal_medya)){
                        ?>
                        <li><a href="<?php echo $satır['Sm_Linki'];?>" title="<?php echo $satır['Sm_Adi'];?>" target="_blank"><em class="<?php echo $satır['Sm_İcon'];?>"></em></a></li>
                    <?php }}?>
            </ul>
        </div>
        <div id="saat">
            <!--***********Saat Başla************-->
            <embed src="http://saat.bbs.tr/001.swf" quality="high" wmode="transparent" width="120" height="130" name="superpimper" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
                <!--***********Saat Bitir************-->
        </div>

        <?php
        if (isset($_SESSION['email'])){
            ?>
            <div id="uye">
                <ul>
                    <li style="float:left;margin-right:5px;color:#fff;font-weight:bold;text-align:center">Hoşgeldiniz<br><?php echo '<div style=color:#fff>'.$_SESSION['email'].'</div>'?></li>
                    <li style="float:left;"><a href="Bilgilerim.php">Bilgilerim</a></li>
                    <li style="float:left;"><a href="logout.php">Çıkış</a></li>
                </ul>
            </div>	<!--uye_alan-->
        <?php
        }else{
            ?>
            <div id="uye" style="margin-left:80px">
                <a href="uye.php?id=kayit"><em class="fa fa-user"> Üye Ol</em></a>
                <a href="uye.php?id=giris"><em class="fa fa-sign-in"> Üye Giriş</em></a>
            </div>
        <?php }?>

        <div id="arama">
            <form class="form_arama" action="ara.php" method="post">
                <input type="text" class="form_input" placeholder="ARA" name="ara" id="ara">
                <a><input type="submit" value="ARA"></a>
            </form>
        </div>

    </header>


<div style="clear: both"></div>
    <!--NAV-->
    <nav>
        <div id="nav_ust" >
            <div id="logo">
                <a href="index.php"><img src="img/icons/logo.png" width="340"  height="137" /></a>
            </div>

            <div id="logo_yan">
                <ul id="yan_buton" >
                    <li class="hava_durumu"><a href="#" title="Hava Durumu"><img src="img/icons/havadurumu_buton.png" /></a></li>
                    <li class="borsa"><a href="#" title="Altın Fiyatları"><img src="img/icons/borsa_buton.png" /></a></li>
                    <li class="puab"><a href="#" title=""><img src="img/icons/havadurumu_buton.png" /></a></li>
                </ul>

                    <ul id="yan_icerik">
                        <ul style="width:1455px;height: 137px">
                            <li style="float: left;width: 485px;height: 137px">
                            <!--Toplist 24 Hava Durumu Kodu Başlangıcı-->
                            <img src="img/icons/havadurumu.jpg" style="width: 485px"/>
                            <iframe height="110" src="http://www.f5haber.com/exp/havagk.aspx" frameborder="0" width="485" scrolling="no" style="margin-top: -3px;color: rgb(56,56,56); font: 11px/14px 'Lucida Grande', Helvetica, Arial, Verdana, sans-serif;background-color: rgb(255,255,255);"></iframe>
                            <!--Toplist 24 Hava Durumu Kodu Sonu-->
                            </li>
                            <li style="float: left;width: 485px;height: 137px;">
                                <script type="text/javascript">
                                    var system="siteneekle";
                                    var para_birimleri="C-Y-T";
                                    var arkaplan="FFFFFF";
                                    var baslik="FFFFFF";
                                    var cerceve="C0392B";
                                    var turbaslik="999999";
                                    var kutucuk="FFFFFF";
                                    var fiyat="CC3300";
                                    var genislik="485";
                                    var konum="left";
                                    var yatay="3";
                                    var slide="yok";
                                    var dikey="0";
                                    var paylasim="kapali";
                                </script>
                                <a id="altin_altinfiyatlari_ekle" target="_blank" href="http://www.altin.net.tr/">altın fiyatları</a><script type="text/javascript" charset="UTF-8" src="http://www.altin.net.tr/js/altin_fiyatlari.js"></script>

                            </li>
                            <li style="float: left;width: 485px;height: 137px;background-color: salmon">

                            </li>
                        </ul>
                    </ul>
             </div>

           </div>
        <div id="nav_alt">
            <ul>
                <?php
                $nav = mysql_query("SELECT  * FROM  `kategoriler` WHERE kategori_id<>1");
                if(mysql_num_rows($nav)==0){
                }else{
                    while($satır = mysql_fetch_array($nav))
                    {
                        ?>
                        <li><a href="<?php echo $satır["kategori_link"];?>" class="<?php echo $satır["kategori_adi"];?>" data-clone="<?php echo $satır["kategori_adi"];?>"><?php echo $satır["kategori_adi"];?></a></li>
                    <?php }}?>
            </ul>
        </div>
    </nav>

    <!--MAİN-->
    <main>
    <div id="alt_alan" style="min-height:500px">
    <div id="alan_uye">

    <ul id="tab_uye">
        <?php
        $id=$_REQUEST['id'];
        if($id=='giris'){
            ?>
            <li><a href="#" name="#tab1" id="current_uye">Üye Giriş</a></li>
            <li><a href="#" name="#tab2" id="">Üye Ol</a></li>
        <?php }	else if($id=='kayit'){ ?>
            <li><a href="#" name="#tab2" id="current_uye">Üye Ol</a></li>
            <li><a href="#" name="#tab1" id="">Üye Giriş</a></li>
        <?php } ?>
    </ul>

    <div id="icerik_uye">
    <?php
    if($id=='giris'){
        ?>
        <div class="uye_giris" id="tab1">
            <form action="uye.php?id=giris"  method="post">
                <table class="uye_giris_table">
                    <tr>
                        <td colspan="2" class="tdbaslik">Üye Giriş</td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">Kullanıcı Adı:</td>
                        <td><input class="input" type="text" name="Kullanici_Adi" value="özgür123" onblur="if (value =='') {value = 'özgür123'}" onfocus="if (value == 'özgür123') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">Şifre:</td>
                        <td><input class="input" type="text" name="Sifre" value="Şifre"  onblur="if (value =='') {value = 'Şifre'}" onfocus="if (value == 'Şifre') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td><input class="buton" type="submit" name="Giris" id="Giris" value="Giriş" /></td>
                    </tr>
                    <?php
                    if($_POST){
                        /*Verileri alalım*/
                        $id=$_REQUEST['id'];
                        if($id=='giris'){
                            $Kullanici_Adi=$_POST['Kullanici_Adi'];
                            $Sifre=$_POST['Sifre'];
                            if($Kullanici_Adi=='' ||$Sifre=='' || $Kullanici_Adi=='özgür123' || $Sifre=='Şifre'){
                                ?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><p class="hata_mesaj" style="visibility:visible">Kullanıcı Adı veya Şifre boş geçilemez.</p></td>
                                </tr>
                            <?php
                            }else{
                                $aktivasyon_kontrol=mysql_query("Select * from `uyeler` Where Kullanici_Adi='$Kullanici_Adi' and uye_sifre='$Sifre' and Aktivasyon_Durum=0");
                                if(mysql_affected_rows()){
                                    echo '<div class="error">Lütfen mailinize gönderilen aktivasyon linkinden üyeliğinizi aktileştriniz.</div>';
                                }else{
                                    $query=mysql_query("Select * from `uyeler` Where Kullanici_Adi='$Kullanici_Adi' and uye_sifre='$Sifre' and Aktivasyon_Durum<>0");
                                    if(mysql_affected_rows()){
                                        session_start();
                                        $_SESSION['email'] = true;
                                        $_SESSION['email'] = $Kullanici_Adi;
                                        header ("Location:index.php");
                                    }else{
                                        ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><p class="hata_mesaj" style="visibility:visible">Kullanıcı veya Şifre hatalı</p></td>
                                        </tr>
                                    <?php
                                    }
                                }
                            }}}

                    ?>
                </table>
            </form>
        </div>


        <div class="uye_ol" id="tab2" >

            <form action="uye.php?id=kayit"  method="post">
                <table class="uye_giris_table">
                    <tr>
                        <td colspan="2" class="tdbaslik">Üye Ol</td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">E-mail:</td>
                        <td><input class="input" type="text" name="Email" value="E-mail" onblur="if (value =='') {value = 'E-mail'}" onfocus="if (value == 'E-mail') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">Kullanıcı Adı:</td>
                        <td><input class="input" type="text" name="KulAdi" value="Kullanıcı Adı" onblur="if (value =='') {value = 'Kullanıcı Adı'}" onfocus="if (value == 'Kullanıcı Adı') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">Şifre:</td>
                        <td><input class="input" type="text" name="Sifre" value="Şifre"  onblur="if (value =='') {value = 'Şifre'}" onfocus="if (value == 'Şifre') {value =''}"/></td>
                    </tr>

                    <tr>
                        <td class="tdyanbaslik">Şifre Tekrar:</td>
                        <td><input class="input" type="text" name="SifreTk" value="Şifre Tekrar"  onblur="if (value =='') {value = 'Şifre Tekrar'}" onfocus="if (value == 'Şifre Tekrar') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td><input class="buton" type="submit" name="UyeOl" id="UyeOl" value="Üye Ol" onclick=""/></td>
                    </tr>
                    <tr>
                </table>
            </form>
        </div>
    <?php }else if($id='kayit'){ ?>
        <div class="uye_ol" id="tab2" >
            <form action="uye.php?id=kayit"  method="post">
                <table class="uye_giris_table">
                    <tr>
                        <td colspan="2" class="tdbaslik">Üye Ol</td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">E-mail:</td>
                        <td><input class="input" type="text" name="Email" value="E-mail" onblur="if (value =='') {value = 'E-mail'}" onfocus="if (value == 'E-mail') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">Kullanıcı Adı:</td>
                        <td><input class="input" type="text" name="Kullanici_Adi" value="Kullanıcı Adı" onblur="if (value =='') {value = 'Kullanıcı Adı'}" onfocus="if (value == 'Kullanıcı Adı') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">Şifre:</td>
                        <td><input class="input" type="text" name="Sifre" value="Şifre"  onblur="if (value =='') {value = 'Şifre'}" onfocus="if (value == 'Şifre') {value =''}"/></td>
                    </tr>

                    <tr>
                        <td class="tdyanbaslik">Şifre Tekrar:</td>
                        <td><input class="input" type="text" name="SifreTk" value="Şifre Tekrar"  onblur="if (value =='') {value = 'Şifre Tekrar'}" onfocus="if (value == 'Şifre Tekrar') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td><input class="buton" type="submit" name="UyeOl" id="UyeOl" value="Üye Ol" onclick=""/></td>
                    </tr>
                    <?php
                    if($_POST){
                        /*Verileri alalım*/
                        $id=$_REQUEST['id'];
                        if($id=='kayit'){
                            $Email=$_POST['Email'];
                            $Kullanici_Adi=$_POST['Kullanici_Adi'];
                            $Sifre=$_POST['Sifre'];
                            $SifreTk=@$_POST['SifreTk'];
                            if($Email=='' ||$Sifre=='' || $SifreTk=='' || $Email=='Email' || $Sifre=='Şifre' || $SifreTk=='Şifre Tekrar'){
                                $hata_mesaj="Lütfen boş alan bırakmayınız";
                            }else{
                                if (filter_var($Email, FILTER_VALIDATE_EMAIL) && $Email!='Email' ){
                                    $Sorgula_Email=mysql_query("Select * from `uyeler` Where uye_email='$Email'");
                                    if(mysql_affected_rows()){
                                        $hata_mesaj="Email sitemizde kullanılmaktadır.";
                                    }else{
                                        $Sorgula_Kullanici_Adi=mysql_query("Select * from `uyeler` Where Kullanici_Adi='$Kullanici_Adi'");
                                        if(mysql_affected_rows()){
                                            $hata_mesaj="Kullanıcı Adı sitemizde kullanılmaktadır.";
                                        }else{
                                            if($Sifre==$SifreTk){
                                                $harf = chr(rand(65,90));
                                                $sayi= rand(1000,100000);
                                                $aktivasyon_kodu=$harf.$sayi;
                                                $insert=mysql_query("INSERT INTO `uyeler`(`Kullanici_Adi`,`uye_email`,`uye_sifre`,`Aktivasyon_Kodu`,`Aktivasyon_Durum`) VALUES ('$Kullanici_Adi','$Email','$Sifre','$aktivasyon_kodu',0)");
                                                if($insert){
                                                    $uye_id=mysql_insert_id();

                                                    $hata_mesaj="Kayıt Başarıyla Tamamlandı<br />";
                                                    include 'class.phpmailer.php';
                                                    $mesaj="Sayın ".$Kullanici_Adi." Haber46 üyelik işleminizi başarıyla tamamladınız.Üyeliğini aktif etmek için lütfen aşağıdaki bağlantı adresine tıklayınız.".'</br><a href="http://www.heber46.tk//UyeAktivasyon.php?aktivasyon_kodu='.$aktivasyon_kodu.'& uye_id='.$uye_id.'">Aktivasyon Linki</a>';
                                                    $mail = new PHPMailer();
                                                    $mail->IsSMTP();
                                                    $mail->SMTPAuth = true;
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->Port = 587;
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Username = 'galatasaray.ozgur.94@gmail.com';
                                                    $mail->Password = 'the.dog2';
                                                    $mail->SetFrom($mail->Username, 'Özgür KAN');
                                                    $mail->AddAddress($Email, $Kullanici_Adi);
                                                    $mail->CharSet = 'UTF-8';
                                                    $mail->Subject = 'Haber46 üyelik aktivasyon';
                                                    $content = '<div style="background: #eee; padding: 10px; font-size: 14px">'.$mesaj.'</div>';
                                                    $mail->MsgHTML($content);
                                                    if($mail->Send()) {
                                                        // e-posta başarılı ile gönderildi
                                                        echo '<div class="success">Aktivasyon için mail adresinize mail gönderildi.Lütfen kontrol edin.</div>';
                                                    } else {
                                                        // bir sorun var, sorunu ekrana bastıralım
                                                        echo '<div class="error">'.$mail->ErrorInfo.'</div>';
                                                    }
                                                    header('Refresh: 5; url=uye.php?id=giris');
                                                }else{
                                                    $hata_mesaj="Bir hata oluştu.Lütfen tekrar deneyiniz.";
                                                }
                                            }else{
                                                $hata_mesaj="Şifreler uyuşmuyor.";
                                            }
                                        }

                                    }

                                }else{
                                    $hata_mesaj="E-mail adresi uygun değil";
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td><p class="hata_mesaj" style="visibility:visible"><?php echo $hata_mesaj; ?></p></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </form>
        </div>


        <div class="uye_giris" id="tab1">
            <form action="uye.php?id=giris"  method="post">
                <table class="uye_giris_table">
                    <tr>
                        <td colspan="2" class="tdbaslik">Üye Giriş</td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">Kullanıcı Adı:</td>
                        <td><input class="input" type="text" name="Kullanici_Adi" value="özgür123" onblur="if (value =='') {value = 'özgür123'}" onfocus="if (value == 'özgür123') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td class="tdyanbaslik">Şifre:</td>
                        <td><input class="input" type="text" name="Sifre" value="Şifre"  onblur="if (value =='') {value = 'Şifre'}" onfocus="if (value == 'Şifre') {value =''}"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td><input class="buton" type="submit" name="Giris" id="Giris" value="Giriş" /></td>
                    </tr>
                </table>
            </form>
        </div>
    <?php } ?>
    </div>
    </div>
    </div>
    </main>

    <!--ASİDE-->
    <aside>


    </aside>

    <!--FOOTER-->
    <footer>
        <header style="width: 1100px;">
            <div id="sol">
                <a href="index.php"><em class="fa fa-home"><h3>ANASAYFA</h3></em></a>
                <a href="javascript:bookmarksite('Heber46','http://www.heber46.tk/')"><em class="fa fa-star-o"><h3 style="font-size: 15px;text-align: center">Sık Kullanılanlara Ekle</h3></em></a>
            </div>
            <div id="sosyal_medya">
                <ul>
                    <?php
                    $sosyal_medya=mysql_query("select * from Sosyal WHERE Sm_Durum=1 ");
                    if(mysql_num_rows($sosyal_medya)==0){
                    }else{
                        while($satır=mysql_fetch_array($sosyal_medya)){
                            ?>
                            <li><a href="<?php echo $satır['Sm_Linki'];?>" title="<?php echo $satır['Sm_Adi'];?>" target="_blank"><em class="<?php echo $satır['Sm_İcon'];?>"></em></a></li>
                        <?php }}?>
                </ul>
            </div>

            <?php
            if (isset($_SESSION['email'])){
                ?>
                <!--
                <div id="uye">
                    <ul>
                        <li style="float:left;margin-right:5px;color:#fff;font-weight:bold;text-align:center">Hoşgeldiniz<br>Özgürözgür kan özgür<?php echo '<div style=color:#fff>'.$_SESSION['email'].'</div>'?></li>
                        <li style="float:left;"><a href="Bilgilerim.php">Bilgilerim</a></li>
                        <li style="float:left;"><a href="logout.php">Çıkış</a></li>
                    </ul>
                </div>-->	<!--uye_alan-->
            <?php
            }else{
                ?>
                <div id="uye" style="margin-left:80px">
                    <a href="uye.php?id=kayit"><em class="fa fa-user"> Üye Ol</em></a>
                    <a href="uye.php?id=giris"><em class="fa fa-sign-in"> Üye Giriş</em></a>
                </div>
            <?php }?>

            <div id="arama">
                <form class="form_arama" action="ara.php" method="post">
                    <input type="text" class="form_input" placeholder="ARA" name="ara" id="ara">
                    <a><input type="submit" value="ARA"></a>
                </form>
            </div>

        </header>
        <div id="footer_sol">
            <img src="img/icons/logo.png" style="float: left"/>
            <ul style="padding-left: 50px;float: left;padding-top: 30px">
                <?php
                $nav = mysql_query("SELECT  * FROM  `kategoriler` WHERE kategori_id<>1");
                if(mysql_num_rows($nav)==0){
                }else{
                    while($satır = mysql_fetch_array($nav))
                    {
                        ?>
                        <li style="list-style:circle;color: #FFFFFF;font-weight: bold;font-size: 20px;font-family: tahoma, arial, sans-serif"><a href="<?php echo $satır["kategori_link"];?>" class="<?php echo $satır["kategori_adi"];?>" data-clone="<?php echo $satır["kategori_adi"];?>"><?php echo $satır["kategori_adi"];?></a></li>
                    <?php }}?>
            </ul>
        </div>
        <div id="footer_orta">

        </div>
        <div id="footer_sag">
            <ul style="width:340px;">
                <h2 style="color:#FFFFFF;text-align: center;font-size:35px">İLETİŞİM</h2>
                <?php
                $iletisim = mysql_query("SELECT  * FROM  `iletisim` ");
                if(mysql_num_rows($iletisim)==0){
                }else{
                    while($satır = mysql_fetch_array($iletisim))
                    {
                        ?>
                        <li><p style="font-size:20px;font-weight: bold;color:#FFFFFF;float: left;width:80px;max-width:80px"><?php echo $satır["Ad"];?>:</p><p style="color: #FFFFFF;float: left;width: auto;max-width: 200px;font-size: 20px"><?php echo $satır["Detay"];?></p></li>
                        <li style="clear: both"></li>

                    <?php }}?>
            </ul>

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3011.2946826095076!2d28.6944823!3d40.9969229!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbc9e6fcdb9e76f57!2zxLBTVEFOQlVMIEdFTMSwxZ7EsE0gw5xOxLBWRVJTxLBURVPEsCAtIEZBS1VMVEVMRVI!5e0!3m2!1str!2s!4v1398427586230" width="300" height="180" frameborder="0" style="border:0"></iframe>

        </div>
        <div style="clear:both;width:1100px;height:40px">
            <p style="color:#fff;text-align:center;font-weight:bold">© Copyright 2013-<?php echo date("Y");  ?> Haberler || Tüm hakları saklıdır.</br> Desing:by <a style="color:#fff" href="mailto:galatasaray_ozgur_94@hotmail.com" target="_blank">ÖZGÜR KAN  </a></p>
        </div>
    </footer>
</div><!--CONTAİNER-->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

<script>
    function resetTabs(){$("#icerik_uye > div").hide();$("#tab_uye a").attr("id",""); }
    var myUrl = window.location.href;
    var myUrlTab = myUrl.substring(myUrl.indexOf("#"));
    var myUrlTabName = myUrlTab.substring(0,4);
    (function(){$("#icerik_uye > div").hide();$("#tab_uye li:first a").attr("id","current_uye");
        $("#icerik_uye > div:first").fadeIn();
        $("#tab_uye a").on("click",function(e) {e.preventDefault();
            if ($(this).attr("id") == "current_uye"){  return } else{
                resetTabs();$(this).attr("id","current_uye");
                $($(this).attr('name')).fadeIn();}});
        for (i = 1; i <= $("#tab_uye li").length; i++) {
            if (myUrlTab == myUrlTabName + i) {resetTabs();
                $("a[name='"+myUrlTab+"']").attr("id","current_uye");
                $(myUrlTab).fadeIn();}}})()
</script>
</body>
</html>
    <?php }
     ob_end_flush();
    ?>

