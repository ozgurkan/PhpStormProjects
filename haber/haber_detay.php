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
    $haber_id=$_GET["haber_id"];
    if(isset($haber_id) && !empty($haber_id))
    {
        $sorgu = mysql_query("SELECT  * FROM  `haberler` WHERE haber_id ='$haber_id'");
        if(mysql_num_rows($sorgu)==0){
            header("location:index.php");
        }else{
            while($satır = mysql_fetch_array($sorgu))
            {
                $okunma_sayisi=$satır["haber_okunma"];
            }
            $okunma_sayisi=$okunma_sayisi+1;
            $guncelle=mysql_query("Update haberler set haber_okunma='$okunma_sayisi' where haber_id='$haber_id'");
        }
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

    <!--JAVASCRİPT-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#gecis1").click(function(){
                    $('#orta_alan').css({'height' : '3255px'});
                    $('#gecis1').css({'visibility' : 'hidden'});
                    $('#gecis2').css({'visibility' : 'visible'});
                return false;
            });

            $("#gecis2").click(function(){
                    $('#orta_alan').css({'height' : '0px'});
                    $('#gecis2').css({'visibility' : 'hidden'});
                    $('#gecis1').css({'visibility' : 'visible'});
                return false;
            });
        });

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
        <div id="haber_detay" style=";float:left;width:1100px;height:auto;min-height:400px;">
            <?php
            $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $sorgu=mysql_query("SELECT * FROM  `haberler` WHERE haber_id =$haber_id");
            while($satir = mysql_fetch_array($sorgu))
            {
                ?>

                <h1 style="text-align:center;font-weight:bold;color:#EF4836;height:auto;font-size:35px;margin: 20px 0px"><?php print $satir["haber_baslik"];?></h1>
                <div id="sol_yan" style="float:left;width: 350px;height: auto;margin-right: 30px">
                    <img style="float:left; margin:0 30px 0 20px;width:300px; height:300px" src="images/slider/<?php print $satir["haber_resim"];?>" />
                    <div id="butonlar" style="float: left; margin:100px 30px 100px 20px;width:300px;height:auto;background-color:green">
                        SOSYAL PAYLAŞIM BUTONLARI GELİCEK<br>
                        <input type="submit"class="button blue nice small" style=" margin-top:5px" value="Beğen" /><br>
                        <input  onClick="window.print()" type="submit"class="button blue nice small" style="margin-top:5px" value="Yazdır" /><br>
                        <a href="http://www.facebook.com/share.php?u=<?php echo $url;?>" target="_blank">Facebook'ta paylaş</a>

                    </div>
                </div>



                <p style="color:#000;font-size:20px; font-weight:bold; text-align:left;height:auto;"><?php print $satir["haber_özet"];?></p>
                <p style="margin: 20px 0px"><?php print $satir["haber_detay"];?></p>

                <p style="text-align:left;height:auto;color:#000; font-family: pt_sansregular, Arial, Helvetica; font-size:16px;font-style:normal; line-height: 24px;font-weight: bold"><?php print date("d-m-Y",strtotime($satir["ekleme_tarihi"]));?>tarihinde yazıldı.||<?php print $satir["haber_okunma"];?> kez okundu.</p>
            <?php }?>

            <form method="post" action="" style="width: 800px;margin-left:330px;height:auto;">
                <div class="yorum">
                    <?php
                    $yorum_sayısı=mysql_query("select * from yorumlar where haber_id=$haber_id and yorum_durum=1");
                    if(mysql_num_rows($yorum_sayısı)==0){
                        ?>
                        <h2 style="text-align:center;font-family:jing jing;font-weight:bold;font-size:30px;margin:10px 0px">YORUMLAR</h2>
                        <h3 style="text-align:center;color:#EF4836;font-weight: bold;font-size:20px">Bu habere henüz yorum yapılmamıştır.</h3>
                    <?php
                    }else{
                        ?>
                        <h2 style="text-align:center;font-family:jing jing;font-weight:bold;font-size:30px;;margin:10px 0px">YORUMLAR</h2>
                    <?php }?>
                    <?php
                    if($_POST){
                        /*Verileri alalım*/
                        $yorum_detay=$_POST['yorum_detay'];
                        /*haber_id yukarda alındı*/
                        $yorum_durum=0;
                        date_default_timezone_set('Europe/Istanbul');
                        $yorum_tarihi=date('Y-m-d H:i:s');
                        $uye_adi=$_SESSION['email'];/*sessiondan alınacak*/
                        if(empty($yorum_detay)){
                            ?>
                            <script type="text/javascript">
                                alert("Lütfen yorum alanını boş bırakmayınız");
                            </script>
                            <?php
                            echo '';
                            ?>
                            <!--<script type="text/javascript">
                            alert("Yorum alanı boş geçilemez");
                            </script>-->
                        <?php
                        }else{
                            $sql=mysql_query("INSERT INTO `yorumlar`(`yorum_detay`,`haber_id`,`yorum_durum`,`yorum_tarih`,`uye_adi`)
											  VALUES
															('$yorum_detay','$haber_id','$yorum_durum','$yorum_tarihi','$uye_adi')");
                            if($sql){
                                ?>
                                <script type="text/javascript">
                                    alert("yorumunuz değerlendirildikten sonra eklenecektir");
                                </script>
                                <?php
                                $yorum_detay=null;
                                unset($yorum_detay);
                                //$yorum_detay='';
                                //$yorum_detay="";
                                //header("Location:haber_detay.php?haber_id=$haber_id");
                                ?>
                                <SCRIPT LANGUAGE="JavaScript">
                                    var shant="haber_detay.php?haber_id=<?php echo $haber_id; ?>" // yönlenecek sayfa ya da site
                                    function forPage()
                                    {
                                    location.href=shant
                                    }
                                    function go(){
                                    setTimeout ("forPage()",0); // kaç saniye sonra yönleneceği.
                                    }
                                    go();
                                </SCRIPT>
                                <!--<script>document.location.href='haber_detay.php?haber_id=<?php echo $haber_id; ?>';</script>-->
                            <?php
                            }else{
                                echo 'ekleme hatası';
                            }
                        }
                    }
                    ?>

                    <?php
                    $limit = 5;
                    $page = @$_GET["page"];
                    if(empty($page) or !is_numeric($page)) {
                        $page = 1;
                    }
                    $count			 = mysql_num_rows(mysql_query("SELECT yorum_id FROM yorumlar where haber_id=$haber_id and yorum_durum=1"));
                    $toplamsayfa	 = ceil($count / $limit);
                    $baslangic		 = ($page-1)*$limit;

                    $sorgu = "SELECT *,DATE_FORMAT(yorum_tarih, '%d-%m-%Y %H:%i') as yt FROM yorumlar where haber_id=$haber_id and yorum_durum=1 ORDER BY yorum_id desc LIMIT $baslangic,$limit";
                    $yazdir_sorgu = mysql_query( $sorgu, $connx) or die(mysql_error() );
                    while ($yazdir = mysql_fetch_array($yazdir_sorgu)){
                        ?>
                        <div class="single-comment">
                            <div class="avatar"><img src="img/icons/logo.png" /></div>
                            <h5 style="font-weight: bold;color:#cd5c5c"><?php echo $yazdir['uye_adi'];?> &nbsp; &nbsp;(<?php echo $yazdir['yt'];?>)</h5>
                            <p style="font-size:22px;font-weight: bold"><?php echo $yazdir['yorum_detay'];?></p>
                        </div>
                    <?php } ?>

                    <div class="comment-form">
                        <?php
                        if($count > $limit) :
                            $x = 2; // akrif sayfadan önceki/sonraki sayfa gösterim sayisi
                            $lastP = ceil($count/$limit);
                            if($page > 1){
                                $onceki = $page-1;
                                echo "<a href=\"?haber_id=$haber_id && page=$onceki\">« Önceki Sayfa </a>";
                            }
                            // sayfa 1'i yazdir
                            if($page==1) echo "<span class=\"sayfalama\">[1]</span>";
                            else echo "<a href=\"?haber_id=$haber_id && page=1\">[1]</a>";
                            // "..." veya direkt 2
                            if($page-$x > 2) {
                                echo "...";
                                $i = $page-$x;
                            } else {
                                $i = 2;
                            }
                            // +/- $x sayfalari yazdir
                            for($i; $i<=$page+$x; $i++) {
                                if($i==$page) echo "<span class=\"sayfalama\">[$i]</span>";
                                else echo "<a href=\"?haber_id=$haber_id && page=$i\">[$i]</a>";
                                if($i==$lastP) break;
                            }
                            // "..." veya son sayfa
                            if($page+$x < $lastP-1) {
                                echo "...";
                                echo "<a href=\"?page=$lastP\">[$lastP]</a>";
                            } elseif($page+$x == $lastP-1) {
                                echo "<a href=\"?page=$lastP\">[$lastP]</a>";
                            }
                            if($page < $lastP){
                                $sonraki = $page+1;
                                echo "<a href=\"?haber_id=$haber_id & page=$sonraki\"> Sonraki Sayfa » </a>";
                            }

                        endif;
                        ?>

                        <?php
                        if (isset($_SESSION['email'])){?>
                            <div style="clear:both"></div>
                            <form method="post" action="haber_detay.php?haber_id=<?php echo $haber_id; ?>">
                                <div class="row" style="margin-left:150px">
                                    <div class="eight columns">
                                        <label for="text" style="margin-left:150px;font-size:20px; font-weight:bold">Yorumunuz</label>
                                        <br />
                                        <textarea style="height:100px" name="yorum_detay" id="yorum_detay"></textarea>
                                    </div>
                                    <div class="four columns">
                                        <input type="submit"class="button blue nice small" style="margin-left:150px; margin-top:5px" value="Gönder" />
                                    </div>
                                </div>
                            </form>
                        <?php
                        }else{
                            echo '<p style="text-align:center; font-weight:bold; font-size:25px">(Yorum yapabilmek için <a style="color: red" href="uye.php?id=giris">üye girişi</a> yapmalısınız.)</p>';
                        }

                        ?>
                    </div>

                </div><!--yorum-->
            </form>
        </div>





        <div id="benzer_haberler">
            <h2 style="text-align: center;color:#cd5c5c;font-family: 'jing jing';font-size: 30px;font-weight: bold">Benzer Haberler</h2>
            <ul>
                <?php
                $kategori_id_al=mysql_query("SELECT kategori_id FROM  `haberler` WHERE haber_id =$haber_id");
                while($satır=mysql_fetch_array($kategori_id_al)){
                    $kategori_id=$satır['kategori_id'];
                }

                $usthaber=mysql_query("select * from haberler WHERE kategori_id=$kategori_id and haber_id<>$haber_id order by haber_id desc limit 10");
                if(mysql_num_rows($usthaber)==0){
                }else{
                    while($satır=mysql_fetch_array($usthaber)){
                        ?>
                        <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>" /><h3><?php  echo $satır['haber_baslik']?></h3></a></li>
                    <?php }}?>
            </ul>
        </div>




        <div id="orta_alan" style="height: 0px;transition: all 3s ease-in-out;">
        <!--ORTA ALAN SOL-->
        <div id="orta_alan_sol">
            <!--GÜNDEM-->
            <div id="gundem">
                <h3>
                    <p>GÜNDEM</p>
                </h3>
                </br>
                <ul>
                    <?php
                    $gundem=mysql_query("SELECT haberler. * , COUNT( yorumlar.yorum_id ) AS yorum_sayısı FROM haberler INNER JOIN yorumlar ON yorumlar.haber_id = haberler.haber_id WHERE haberler.kategori_id =6 GROUP BY haberler.haber_id ORDER BY yorum_sayısı DESC LIMIT 6");
                    if(mysql_num_rows($gundem)==0){
                    }else{
                        while($satır=mysql_fetch_array($gundem)){
                            ?>
                            <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>"/> <h3><?php echo $satır['haber_baslik']?></h3></a></li>
                        <?php }}?>
                </ul>
            </div>

            <!--SPOR-->
            <div id="spor">
                <h3>
                    <p>SPOR </p>
                </h3>
                </br>
                <ul>
                    <?php
                    $spor=mysql_query("SELECT haberler. * , COUNT( yorumlar.yorum_id ) AS yorum_sayısı FROM haberler INNER JOIN yorumlar ON yorumlar.haber_id = haberler.haber_id WHERE haberler.kategori_id =3 GROUP BY haberler.haber_id ORDER BY yorum_sayısı DESC LIMIT 6");
                    if(mysql_num_rows($spor)==0){
                    }else{
                        while($satır=mysql_fetch_array($spor)){
                            ?>
                            <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>"/> <h3><?php echo $satır['haber_baslik']?></h3></a></li>
                        <?php }}?>
                </ul>
            </div>


            <!--EKONOMİ-->
            <div id="ekonomi">
                <h3>
                    <p>EKONOMİ</p>
                </h3>
                </br>
                <ul>
                    <?php
                    $ekonomi=mysql_query("SELECT haberler. * , COUNT( yorumlar.yorum_id ) AS yorum_sayısı FROM haberler INNER JOIN yorumlar ON yorumlar.haber_id = haberler.haber_id WHERE haberler.kategori_id =2 GROUP BY haberler.haber_id ORDER BY yorum_sayısı DESC LIMIT 6");
                    if(mysql_num_rows($ekonomi)==0){
                    }else{
                        while($satır=mysql_fetch_array($ekonomi)){
                            ?>
                            <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>"/> <h3><?php echo $satır['haber_baslik']?></h3></a></li>
                        <?php }}?>
                </ul>
            </div>


            <!--MAGAZİN-->
            <div id="magazin">
                <h3>
                    <p>MAGAZİN</p>
                </h3>
                </br>
                <ul>
                    <?php
                    $magazin=mysql_query("SELECT haberler. * , COUNT( yorumlar.yorum_id ) AS yorum_sayısı FROM haberler INNER JOIN yorumlar ON yorumlar.haber_id = haberler.haber_id WHERE haberler.kategori_id =5 GROUP BY haberler.haber_id ORDER BY yorum_sayısı DESC LIMIT 6");
                    if(mysql_num_rows($magazin)==0){
                    }else{
                        while($satır=mysql_fetch_array($magazin)){
                            ?>
                            <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>"/> <h3><?php echo $satır['haber_baslik']?></h3></a></li>
                        <?php }}?>
                </ul>
            </div>


            <!--SİYASET-->
            <div id="siyaset">
                <h3>
                    <p>SİYASET</p>
                </h3>
                </br>
                <ul>
                    <?php
                    $siyaset=mysql_query("SELECT haberler. * , COUNT( yorumlar.yorum_id ) AS yorum_sayısı FROM haberler INNER JOIN yorumlar ON yorumlar.haber_id = haberler.haber_id WHERE haberler.kategori_id =4 GROUP BY haberler.haber_id ORDER BY yorum_sayısı DESC LIMIT 6");
                    if(mysql_num_rows($siyaset)==0){
                        echo("boş çünkü burda en fazla yorumlananları çektik yorum yok tur boşsa");
                    }else{
                        while($satır=mysql_fetch_array($siyaset)){
                            ?>
                            <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>"/> <h3><?php echo $satır['haber_baslik']?></h3></a></li>
                        <?php }}?>
                </ul>
            </div>

            <!--TEKNOLOJİ-->
            <div id="teknoloji">
                <h3>
                    <p>TEKNOLOJİ</p>
                    <ul>
                        <li class="normal">1</li>
                        <li class="normal">2</li>
                        <li class="normal">3</li>
                        <li class="normal">4</li>
                        <li class="normal">5</li>
                    </ul>
                </h3>
                <ul>
                    <ul id="teknoloji_slider">
                        <?php
                        $teknoloji=mysql_query("SELECT haberler. * , COUNT( yorumlar.yorum_id ) AS yorum_sayısı FROM haberler INNER JOIN yorumlar ON yorumlar.haber_id = haberler.haber_id WHERE haberler.kategori_id =7 GROUP BY haberler.haber_id ORDER BY yorum_sayısı DESC LIMIT 5");
                        if(mysql_num_rows($teknoloji)==0){
                        }else{
                            while($satır=mysql_fetch_array($teknoloji)){
                                ?>
                                <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>"/> <h3><?php echo $satır['haber_baslik']?></h3></a></li>
                            <?php }}?>
                    </ul>
                </ul>
            </div>

            <!--SAĞLIK-->
            <div id="saglik">
                <h3>
                    <p>SAĞLIK </p>
                    <ul>
                        <li class="normal">1</li>
                        <li class="normal">2</li>
                        <li class="normal">3</li>
                        <li class="normal">4</li>
                        <li class="normal">5</li>
                    </ul>
                </h3>
                <ul>
                    <ul id="saglik_slider">
                        <?php
                        $saglik=mysql_query("SELECT haberler. * , COUNT( yorumlar.yorum_id ) AS yorum_sayısı FROM haberler INNER JOIN yorumlar ON yorumlar.haber_id = haberler.haber_id WHERE haberler.kategori_id =8 GROUP BY haberler.haber_id ORDER BY yorum_sayısı DESC LIMIT 5");
                        if(mysql_num_rows($saglik)==0){
                        }else{
                            while($satır=mysql_fetch_array($saglik)){
                                ?>
                                <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>"/> <h3><?php echo $satır['haber_baslik']?></h3></a></li>
                            <?php }}?>
                    </ul>
                </ul>
            </div>


            <!--EĞİTİM-->
            <div id="egitim">
                <h3>
                    <p>EĞİTİM</p>
                    <ul>
                        <li class="normal">1</li>
                        <li class="normal">2</li>
                        <li class="normal">3</li>
                        <li class="normal">4</li>
                        <li class="normal">5</li>
                    </ul>
                </h3>
                <ul>
                    <ul id="egitim_slider">
                        <?php
                        $egitim=mysql_query("SELECT haberler. * , COUNT( yorumlar.yorum_id ) AS yorum_sayısı FROM haberler INNER JOIN yorumlar ON yorumlar.haber_id = haberler.haber_id WHERE haberler.kategori_id =9 GROUP BY haberler.haber_id ORDER BY yorum_sayısı DESC LIMIT 5");
                        if(mysql_num_rows($egitim)==0){
                        }else{
                            while($satır=mysql_fetch_array($egitim)){
                                ?>
                                <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>"/> <h3><?php echo $satır['haber_baslik']?></h3></a></li>
                            <?php }}?>
                    </ul>
                </ul>
            </div>

            <!--YAŞAM-->
            <div id="yasam">
                <h3>
                    <p>YAŞAM</p>
                    <ul>
                        <li class="normal">1</li>
                        <li class="normal">2</li>
                        <li class="normal">3</li>
                        <li class="normal">4</li>
                        <li class="normal">5</li>
                    </ul>
                </h3>
                <ul>
                    <ul id="yasam_slider">
                        <?php
                        $yasam=mysql_query("SELECT haberler. * , COUNT( yorumlar.yorum_id ) AS yorum_sayısı FROM haberler INNER JOIN yorumlar ON yorumlar.haber_id = haberler.haber_id WHERE haberler.kategori_id =10 GROUP BY haberler.haber_id ORDER BY yorum_sayısı DESC LIMIT 5");
                        if(mysql_num_rows($yasam)==0){
                        }else{
                            while($satır=mysql_fetch_array($yasam)){
                                ?>
                                <li><a href="haber_detay.php?haber_id=<?php echo $satır['haber_id']?>"><img src="images/slider/<?php echo $satır['haber_resim']?>"/> <h3><?php echo $satır['haber_baslik']?></h3></a></li>
                            <?php }}?>
                    </ul>
                </ul>
            </div>
        </div>

        <!--ORTA ALAN SAĞ-->
        <div id="orta_alan_sag">
            <div id="gazeteler" style="width: 300px; height: 215px; overflow: hidden;"><iframe width="300" height="215" src="http://www.butungazetemansetleri.com/gazeteler-kodu.php" frameborder="0" scrolling="no"></iframe></div>
            <div id="burclar">
                <h3 style="font-weight: bold;font-size: 30px;font-family: tahoma, arial, sans-serif;color:indianred;text-align: center;padding:5px">Burçlar</h3>
                <ul>
                    <?php
                    $burclar=mysql_query("select * from burclar");
                    if(mysql_num_rows($burclar)==0){
                    }else{
                        while($satır=mysql_fetch_array($burclar)){
                            ?>
                            <li><a href="#" title="<?php echo $satır['burc_adi']."\n".$satır['burc_tarihi'];?>"><img src="img/burclar/<?php echo $satır['burc_resim'];?>"></a></li>
                        <?php }}?>
                </ul>
            </div>

            <div id="kanallar">
                <h3 style="font-weight: bold;font-size: 30px;font-family: tahoma, arial, sans-serif;color:indianred;text-align: center">TV-REHBERİ</h3>
                <ul>
                    <?php
                    $kanallar=mysql_query("select * from kanallar");
                    if(mysql_num_rows($kanallar)==0){
                    }else{
                        while($satır=mysql_fetch_array($kanallar)){
                            ?>
                            <li><a href="<?php echo $satır['kanal_link'];?>" target="_blank" title="<?php echo $satır['kanal_adi'];?>"><img src="img/kanallar/<?php echo $satır['kanal_resim'];?>"></a></li>
                        <?php }}?>
                </ul>
            </div>

            <div id="gunun_sozu" style="height: 300px;width: 300px;background-image: url('img/icons/gunun_sozu.png');background-repeat: no-repeat">
                <h3>GÜNÜN SÖZÜ</h3>
                <?php
                $gunun_sozu=mysql_query("select * from gunun_sozleri order by soz_id desc limit 1");
                if(mysql_num_rows($gunun_sozu)==0){
                }else{
                    while($satır=mysql_fetch_array($gunun_sozu)){
                        ?>
                        <p><?php echo $satır['soz_detay'];?></p>
                        <h5><?php echo $satır['soz_sahibi'];?></h5>
                    <?php }}?>
            </div>

            <div id="tarihte_bugun" style="height: 300px;width:300px;background-image: url('img/icons/gunun_sozu.png');background-repeat: no-repeat">
                <h3>TARİHTE BUGÜN</h3>
                <?php
                $tarihte_bugun=mysql_query("select * from tarihte_bugun order by tarihte_bugun_id desc limit 2");
                if(mysql_num_rows($tarihte_bugun)==0){
                }else{
                    while($satır=mysql_fetch_array($tarihte_bugun)){
                        ?>
                        <p><?php echo $satır['tarihte_bugun_detay'];?></p>
                    <?php }}?>
            </div>


            <div id="en_cok_okunanlar">
                <img src="img/icons/encokokunanlar.png" />
                <ul>
                    <ul class="en_cok_okunanlar">
                        <?php
                        $en_cok_okunanlar = mysql_query("SELECT  * FROM  `haberler` order by haber_id desc limit 30");
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

            <div id="dunden_kalanlar">
                <img src="img/icons/dundenkalanlar.png" />
                <ul>
                    <ul class="dunden_kalanlar">
                        <?php
                        $tarih = date("m.d.Y");
                        $dunden_kalanlar = mysql_query("SELECT  * FROM  `haberler` where ekleme_tarihi<'$tarih' order by haber_id desc limit 30");
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
        <div id="gecis" style="margin:0px 500px">
            <ul>
                <li id="gecis1"><a href="#" title="İçeriği Göster"><img style="border:0" src="img/icons/gecis1.png"/></a></li>
                <li id="gecis2" style="visibility: hidden"><a href="#" title="İçeriği Gizle"><img style="border:0" src="img/icons/gecis2.png"/></a></li>
            </ul>
        </div>
    </main>



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
    <?php
    }else{
        header("location:index.php");
    }
  }
?>

