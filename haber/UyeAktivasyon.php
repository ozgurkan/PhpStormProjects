<?php
ob_start();
/**
 * Created by PhpStorm.
 * User: özgür
 * Date: 10.05.2014
 * Time: 12:26
 */
session_start();
header('Content-Type: text/html; charset=utf-8');
$connectFile = "system/connect.php";
if(file_exists($connectFile)){
    require $connectFile;
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
    <style type="text/css">
        .success {
            border: 1px solid green;
            color: green;
            padding: 10px;
            margin: 20px auto;
            width: 400px;
            font-weight:bold;
            font-size:20px;
            text-align:center;
        }
        .error {
            border: 1px solid red;
            color: red;
            padding: 10px;
            margin: 20px auto;
            width: 400px;
            font-weight:bold;
            font-size:20px;
            text-align:center;
        }
    </style>

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
            <?php
            $uye_id=$_REQUEST['uye_id'];
            $Aktivasyon_Kodu=$_REQUEST['aktivasyon_kodu'];
            $aktivasyon=mysql_query("Update uyeler set `Aktivasyon_Durum`=1 where uye_id=$uye_id and Aktivasyon_Kodu='$Aktivasyon_Kodu'");
            if($aktivasyon){
                echo '<div class="success">Üyeliğiniz aktif edildi.5 saniye sonra giriş sayfasına yönlendirileceksiniz.</div>';
                header('Refresh: 5; url=uye.php?id=giris');
            }else{
                echo '<div class="error">Bir hata oluştu lütfen tekrar deneyiniz.</div>';
            }
            ?>
        </div><!--alt alan-->
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
</body>
</html>
    <?php }ob_end_flush();?>




