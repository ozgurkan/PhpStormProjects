<?php
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
    <meta charset="utf-8">
    <meta name="Description" CONTENT="Haberler,Heberler,Heber46,Heber46.tk,Haber46,Haberci">
    <meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34="/>

    <meta name="robots" content="noindex,nofollow">

    <title>HeberStudio</title>
    <link rel="shortcut icon" href="img/icons/sekme.ico">

    <!-- fontawesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" />


    <!-- Style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" />

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
        session_start();
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
        <!--usthaber_alan-->
        <div id="usthaber_alan">
            <ul>
                <?php
                $usthaber=mysql_query("select * from haberler WHERE haber_yer =0 order by haber_id desc limit 5");
                if(mysql_num_rows($usthaber)==0){
                }else{
                    while($satır=mysql_fetch_array($usthaber)){
                        ?>
                        <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>" /><h3><?php  echo $satır['haber_baslik']?></h3></a></li>
                    <?php }}?>
            </ul>
        </div>
        <!--usthaber_alan-->

        <div id="baslik" style="width: 1100px;height:46px;border-bottom: 2px solid #85f112;">
            <h2 style="text-align: center;float: left;background-color:#85f112;color:white;font-weight:bold;font-size:40px;padding:2px 60px;width:auto;border-bottom-right-radius: 100px;border-top-left-radius:100px;">SAĞLIK</h2>

        </div>


        <!--slider_alanı-->
        <div style="clear: both"></div>
        <div id="slider_alani">
            <!--ANA SLİDER-->
            <div id="slider">
                <ul class="slider">
                    <?php
                    $slider=mysql_query("select * from haberler WHERE haber_yer =1 and kategori_id=8 order by haber_id desc limit 10");
                    if(mysql_num_rows($slider)==0){
                    }else{
                        while($satır=mysql_fetch_array($slider)){
                            ?>
                            <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>" /><h3 class="mansetTitle"><?php  echo $satır['haber_baslik']?></h3></a> </li>
                        <?php }}?>
                </ul>

                <div class="sayfa">
                    <?php
                    $i=0;
                    $sayfa=mysql_query("select * from haberler WHERE haber_yer =1 and kategori_id=8 order by haber_id desc limit 10");
                    if(mysql_num_rows($sayfa)==0){
                    }else{
                        while($satır=mysql_fetch_array($sayfa)){
                            $i=$i+1;
                            ?>
                            <a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><?php echo $i?></a>
                        <?php }}?>
                </div>

                <div class="sayfa_buton">
                    <a href="#" id="onceki"><?php echo "<"; ?></a>
                    <a href="#" id="sonraki"><?php echo ">"; ?></a>
                </div>
            </div>
            <!--ANA SLİDER-->

            <!--yan_slider-->
            <div id="yan_slider">
                <ul>
                    <ul class="yan_slider">
                        <?php
                        $yan_slider=mysql_query("select * from haberler where haber_yer=2 and kategori_id=8 order by haber_id desc limit 15");
                        if(mysql_num_rows($yan_slider)==0){
                        }else{
                            while($satır=mysql_fetch_array($yan_slider)){
                                ?>
                                <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>" /><h3><?php echo $satır['haber_baslik']?></h3></a></li>
                            <?php }}?>
                    </ul>
                </ul>


                <div class="sayfa1">
                    <a href="#" class="normal">1</a>
                    <a href="#" class="normal">2</a>
                    <a href="#" class="normal">3</a>
                    <a href="#" class="normal">4</a>
                    <a href="#" class="normal">5</a>
                </div>
            </div>
            <!--yan_slider-->

        </div>
        <!--slider_alanı-->

        <div id="orta_alan">
            <!--ORTA ALAN SOL-->
            <div id="orta_alan_sol">
                <div id="usthaber_alan" style="max-width: 800px;height: auto; overflow: hidden;padding-left: 50px">
                    <h1 style="padding-left:180px;color: #85f112;font-size: 30px;font-weight: bold;font-family: tahoma, arial, sans-serif">SAĞLIK HABERLERİ</h1>
                    <ul style="max-width: 800px;height: auto; overflow: hidden">
                        <?php
                        $usthaber=mysql_query("SELECT * FROM  `haberler` WHERE haber_yer =1 AND kategori_id =8 order by haber_id desc LIMIT 10 ,21");
                        if(mysql_num_rows($usthaber)==0){
                        }else{
                            while($satır=mysql_fetch_array($usthaber)){
                                ?>
                                <li style="margin-top:20px"><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>" /><h3><?php  echo $satır['haber_baslik']?></h3></a></li>
                            <?php }}?>
                    </ul>
                </div>
            </div>

            <!--ORTA ALAN SAĞ-->
            <div id="orta_alan_sag">

                <div id="en_cok_okunanlar">
                    <img src="img/icons/encokokunanlar.png" />
                    <ul>
                        <ul class="en_cok_okunanlar">
                            <?php
                            $en_cok_okunanlar = mysql_query("SELECT  * FROM  `haberler` where kategori_id=8 order by haber_id desc limit 30");
                            if(mysql_num_rows($en_cok_okunanlar)==0){
                            }else{
                                while($satır = mysql_fetch_array($en_cok_okunanlar))
                                {
                                    ?>
                                    <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><h3><?php echo $satır['haber_baslik']?></h3></a></li>
                                <?php }}?>
                        </ul>
                    </ul>
                </div>

                <div id="dunden_kalanlar" style="">
                    <img src="img/icons/dundenkalanlar.png" />
                    <ul>
                        <ul class="dunden_kalanlar">
                            <?php
                            $tarih = date("m.d.Y");
                            $dunden_kalanlar = mysql_query("SELECT  * FROM  `haberler` where ekleme_tarihi<'$tarih' and kategori_id=8 order by haber_id desc limit 30");
                            if(mysql_num_rows($dunden_kalanlar)==0){
                            }else{
                                while($satır = mysql_fetch_array($dunden_kalanlar))
                                {
                                    ?>
                                    <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><h3><?php echo $satır['haber_baslik']?></h3></a></li>
                                <?php }}?>
                        </ul>
                    </ul>
                </div>

                <div id="reklam" style="width: 300px;height:160px;float: left">
                    <img src="img/icons/reklam.png" />
                </div>
                <!--<script language="javascript" src="http://in.sitekodlari.com/sinema.js"></script>-->
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
</body>
</html>
    <?php }?>

