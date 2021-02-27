<?php
/**
 * Created by PhpStorm.
 * User: özgür
 * Date: 18.05.2014
 * Time: 01:05
 *
 */
require_once("system/connect.php");
require_once("system/functions.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hoş Geldiniz</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" />

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
<body>
<div id="container">

               <header>
                    <div id="logo" ><img src="images/icons/logo.png" /></div>
                   <nav>
                       <ul>
                           <!--
                           <?php
                           $nav=query("select * from Navigasyon where Nav_Durum=1");
                           if(mysql_num_rows($nav)==0){}
                           else{
                           while($satır=row($nav)){
                           ?>
                               <li><a href="<?php echo $satır['Nav_Linki']; ?>"><?php echo $satır['Nav_Adi'];?></a></li>
                            <?php }} ?>
                           -->
                       </ul>
                   </nav>
               </header>
              <section>
                  <div id="slider">
                      <div id="slider_resim">
                          <ul class="slider_resim">
                              <li><img src="images/slider/1.png" /></li>
                              <li><img src="images/slider/1.png" /></li>
                              <li><img src="images/slider/1.png" /></li>
                              <li><img src="images/slider/1.png" /></li>
                              <li><img src="images/slider/1.png" /></li>
                          </ul>
                      </div>
                        <!--background-image: url('images/icons/slider_buton_bg.png');-->
                      <div id="slider_buton"style="">
                          <div id="onceki">
                              <a ><img src="images/icons/left-arrow.png"></a>
                          </div>

                          <div id="sayfalar">
                              <a  href="#"></a>
                              <a  href="#"></a>
                              <a  href="#"></a>
                              <a  href="#"></a>
                              <a  href="#"></a>
                          </div>

                          <div id="sonraki">
                              <a><img src="images/icons/right-arrow.png"></a>
                          </div>
                      </div>

                  </div>



                  <div id="sosyal_medya">
                      <ul>
                          <li><a href="#"><em class="fa fa-facebook fa-3x"></em><h3 style="color:darkblue">Facebook</h3></a></li>
                          <li><a href="#"><em class="fa fa-twitter fa-3x"></em><h3 style="color:cornflowerblue">Twitter</h3></a></li>
                          <li><a href="#"><em class="fa fa-google-plus fa-3x"></em><h3 style="color:#ff4c3b">Google Plus</h3></a></li>
                          <li><a href="#"><em class="fa fa-youtube fa-3x"></em><h3 style="color:red">YouTube</h3></a></li>
                      </ul>
                  </div>


                  <div id="sol_alan">
                      <article style="background-image: url('images/icons/defter.png');background-repeat: repeat-y;">
                          <h1>KONU BAŞLIĞI</h1>
                          <p class="bilgi">19 Mayıs 2014 Salı 20:05<span>Kategori:Genel</span><em class="fa fa-comment fa-1x">5</em></p>

                          <br>
                          <p class="ozet">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                          </p>
                          <br>
                          <input type="submit" value="Devamını Oku..." />
                      </article>

                      <article style="background-image: url('images/icons/defter.png');background-repeat: repeat-y;">
                          <h1>KONU BAŞLIĞI</h1>
                          <p class="bilgi">19 Mayıs 2014 Salı 20:05<span>Kategori:Genel</span><em class="fa fa-comment fa-1x">5</em></p>

                          <br>
                          <p class="ozet">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                          </p>
                          <br>
                          <input type="submit" value="Devamını Oku..." />
                      </article>





                      <article style="background-image: url('images/icons/defter.png');background-repeat: repeat-y;">
                          <h1>KONU BAŞLIĞI</h1>
                          <p class="bilgi">19 Mayıs 2014 Salı 20:05<span>Kategori:Genel</span><em class="fa fa-comment fa-1x">5</em></p>

                          <br>
                          <p class="ozet">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                          </p>
                          <br>
                          <input type="submit" value="Devamını Oku..." />
                      </article>

                      <div id="sayfalama">
                          <ul class="sayfalama">
                              <li><a href=""><em class="fa fa-backward"></em></a></li>
                              <li><a href="" title="Sayfa 1" class="sayfalama_aktif">1</a></li>
                              <li><a href="" title="Sayfa 2">2</a></li>
                              <li><a href="" title="Sayfa 3">3</a></li>
                              <li><a href="" title="Sayfa 4">4</a></li>
                              <li><a href="" title="Sayfa 5">5</a></li>
                              <li><a href="" title="Sayfa 6">6</a></li>
                              <li><a href="" title="Sayfa 7">7</a></li>
                              <li><a href="" title="Sayfa 8">8</a></li>
                              <li><a href="" title="Sayfa 9">9</a></li>
                              <li><a href="" title="Sayfa 10">10</a></li>
                              <li><a href=""><em class="fa fa-forward"></em></li>
                          </ul>
                      </div>
                  </div>


                  <div id="sag_alan">

                      <div id="kategori">
                        <h1>Kategoriler</h1>
                          <ul>
                              <li><a href="#">Genel ~</a></li>
                              <li><a href="#">PHP ~</a></li>
                              <li><a href="#">ASP.NET ~</a></li>
                              <li><a href="#">VİSUAL BASİC ~</a></li>
                              <li><a href="#">HTML & CSS ~</a></li>
                              <li ><a href="#">JAVA ~</a></li>
                              <li><a href="#">C# ~</a></li>
                              <li><a href="#">JAVASCRİPT ~</a></li>
                              <li><a href="#">MSSQL ~</a></li>
                              <li><a href="#">MYSQL ~</a></li>
                          </ul>
                      </div>

                      <div id="arama">
                          <form method="post" action="arama.php">
                              <input type="search" class="textbox" placeholder="Kelime...">
                              <input type="submit" class="button"  value="ARA">
                          </form>
                      </div>

                      <div id="populer_konular">
                          <h1>Popüler Konular</h1>
                          <ul>
                              <li><a href="#">Programlamaya Giriş</a></li>
                              <li><a href="#">Visual Stduio Kurulumu</a></li>
                              <li><a href="#">Değişken Nedir?</a></li>
                              <li><a href="#">Sınıf Nedir?</a></li>
                              <li><a href="#">Fonksiyon Nedir?</a></li>
                              <li><a href="#">Döngü Nedir?</a></li>
                              <li><a href="#">Parametere Nedir?</a></li>
                              <li><a href="#">Veri Tabanı Nedir Ne İşe Yarar?</a></li>
                              <li><a href="#">Veri Tabanı Çeşiteri</a></li>
                              <li><a href="#">Sorgular Ne işe Yarar?</a></li>
                              <li><a href="#">Html Nedir?</a></li>
                              <li><a href="#">Css Nedir?</a></li>
                              <li><a href="#">Css Kuralları Nelerdir?</a></li>
                              <li><a href="#">Html5 Yenilikleri</a></li>
                              <li><a href="#">Yapıcı Metod Nedir?</a></li>
                          </ul>

                      </div>

                      <div id="son_yorumlar" style="margin-top: 20px;width: 250px;height: 500px;background-color: yellow">
                          <h1 style="text-align: center;font-size:30px;font-weight: bold">Son Yorumlar</h1>
                      </div>


                  </div>

              </section>
    <div class="clearfix" style="clear: both"></div>
    <footer style="width: 960px;height: 250px;margin-top: 50px">

        <div id="profil_resim" style="float: left;width:300px;height: 250px;">
        <!-- Bu etiketi, widget adlı widget'ın oluşturulmasını istediğiniz yere ekleyin. -->
        <div style="float:left;z-index: 999" class="g-person" data-width="200" data-href="//plus.google.com/u/0/113800492952248913163" data-rel="author"></div>

        <!-- Bu etiketi son widget etiketinin arkasına ekleyin. -->
        <script type="text/javascript">
            window.___gcfg = {lang: 'tr'};

            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/platform.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>
</div>
        <!--<div id="profil_resim" style="float: left;width:300px;height: 250px;background-color: #ffffff">
            <img src="images/slider/2.png"  style="width: 300px;margin-top:0px"/>
            <img src="images/slider/profil.png"  style="margin-top: -90px;margin-left: 90px"/>
            <h1 style="text-align: center;font-size: 30px;font-weight: bold;color:#000000">ÖZGÜR KAN</h1>
        </div>-->
        <div id="yazi" style="float: left;width:400px;height: 250px;padding-left: 10px">
            <p style="font-size: 20px;font-weight: bold;text-indent: 10px">
                Merhabalar ben Özgür KAN 1994 İstabbul doğumluyum.Yazılım sektörüne ilk adımı C++ ile lise yıllarında attm.Ardından Visual Basic'le birlikte bu işi sevmeye başladım.Şuanda İstanbul Gelişim Üniversitesi Bilgisayar Programcılığında okumaktayım.C#,PHP, ASP.NET,HTML&CSS gibi programlama dilerini biliyorum.
            </p>
        </div>
        <div id="" style="float: left;width: 250px;height: 250px;">

            <ul style="float: right;color: #000000;font-size: 25px;font-weight: bold">
                <li style="list-style: circle">Anasayfa</li>
                <li style="list-style: circle">Hakkımda</li>
                <li style="list-style: circle">Projelerim</li>
                <li style="list-style: circle">İletişim</li>
            </ul>

        </div>
        <div class="clearfix" style="clear: both"></div>
        <p style="text-align: center;font-size: 20px;font-weight: bold">Copyright by desing:ÖZGÜR KAN</p>
    </footer>
</div><!--CONTAİNER-->

</body>
</html>


    