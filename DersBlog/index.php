<?php
/**
 * Created by PhpStorm.
 * User: ozgur
 * Date: 16.01.2017
 * Time: 20:49
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Responsive tasarım etiketi-->
    <title>Pavlov'un Köpeği</title><!--Site başlığı -->
    <link rel="icon" href="images/favicon.ico" type="image/gif" sizes="16x16"><!--Site favicon -->
    <link href="../DersBlogResponsive/css/reset.css" rel="stylesheet" type="text/css" /><!--reset.css dosyamız -->
    <link href="css/style.css" rel="stylesheet" type="text/css" /><!--style.css dosyamız -->
</head>

<body>
<div id="container">

    <!--SOL ALAN-->
    <div id="sol_alan">
        <div id="sol_ust">
            <div id="baslik">
                <img src='images/resim.png'>
                <p>ÖZGÜR KAN</p>
                <h4>Kişisel Blog</h4>
            </div>



        <div id="navigasyon">
            <ul>
                <li style="animation-duration: 2s;">
                    <a href="index.php">
                        <img src='images/anasayfa.png'>
                        Anasayfa
                    </a>
                </li>
                <li style=" animation-duration: 3s;">
                    <a href="index.php" style=""><img src='images/hakkimda.png'>
                        Hakkımda
                    </a>
                </li>
                <li style=" animation-duration: 4s;">
                    <a href="index.php">
                        <img src='images/favoriler.png'>
                        Favoriler
                    </a>
                </li>
            </ul>
        </div>
      </div>


        <div id="sol_alt">
            <h1>DERSLER</h1>
            <ul>
                <?php $sayi = 1.0; for($i=1;$i<=8;$i++){   ?>
                    <li style="animation-duration:<?php echo $sayi;?>s;"></li>
                    <?php $sayi=$sayi+0.2;} ?>
            </ul>

        </div>
    </div>





    <!--ORTA ALAN-->
    <div id="orta_alan">
        <div id="orta_alan_ust">
        </div>

        <div id="orta_alan_alt">
            <ul>
                <?php for($i=1;$i<=10;$i++){   ?>


                <li  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <article class="bordershadow" style="padding: 20px">
                        <h1>KONU BAŞLIĞI</h1>
                        <p class="bilgi">19 Mayıs 2014 Salı 20:05<span>Kategori:Genel</span><em class="fa fa-comment fa-1x">5</em></p>

                        <br>
                        <br class="ozet">
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id. Sed nibh dui, porttitor sit amet ultrices et, suscipit at lorem. Morbi accumsan felis sed lorem condimentum sollicitudin. Vivamus ultrices augue id laoreet aliquam. Morbi ligula lectus, gravida ut congue eu, scelerisque in orci.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula interdum consequat. Aliquam vulputate nisl vitae odio auctor, vulputate elementum tortor convallis. Maecenas vel tincidunt ligula. Nulla bibendum sapien ipsum, sed ultrices nisl luctus id.

                        </p>
                        <br>
                        <button class="button" style="vertical-align:middle" type="submit" ><span>Devamını Oku</span></button>
                    </article>
                </li>
                <?php } ?>
            </ul>
        </div>

    </div>

    <!--SAĞ ALAN-->
    <div id="sag_alan" >

    </div>
</div>


</body>
</html>
