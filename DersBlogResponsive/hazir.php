<?php
/**
 * Created by PhpStorm.
 * User: ozgur
 * Date: 21.01.2017
 * Time: 00:29
 */
header('Content-Type: text/html; charset=utf-8');
$connectFile = "system/connect.php";
$funtionsFile = "system/functions.php";
if(file_exists($connectFile)){
    require $connectFile;
}
else{
    die("<h1>Bağlantı dosyanız yok</h1>");
}
?>
<!DOCTYPE html>
<html>
<title>ÖZGÜR KAN</title>
<link rel="icon" href="images/favicon.ico" type="image/gif" sizes="16x16"><!--Site favicon -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/w3.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="images/icons/font-awesome-4.7.0/css/font-awesome.min.css">

<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<style>
    /* latin-ext */
    @font-face {
        font-family: 'Raleway';
        font-style: normal;
        font-weight: 400;
        src: local('Raleway'), local('Raleway-Regular'), url(https://fonts.gstatic.com/s/raleway/v11/yQiAaD56cjx1AooMTSghGfY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');
        unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
        font-family: 'Raleway';
        font-style: normal;
        font-weight: 400;
        src: local('Raleway'), local('Raleway-Regular'), url(https://fonts.gstatic.com/s/raleway/v11/0dTEPzkLWceF7z0koJaX1A.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
    }

    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold}


</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidenav"><br>
    <div  class="w3-container">

        <img src="images/resim.png" style="float: left;width:44%;" class="w3-round">
        <h3 style="margin-top: 10px;padding-left: 0px;float: left;"><b>ÖZGÜR KAN</b></h3>
        <p style="margin-top: -10px;text-align: center;padding-left: 25px;color:#757575;font-size: 20px;float: left;font-family:'Monotype Corsiva'">Kişisel Blog</p>
        <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-large w3-padding" title="close menu">
            <i class="fa fa-remove"></i>
        </a>
    </div>
    <!--class="w3-section w3-padding-top w3-large"-->
    <div style="margin-top:5px;text-align: center">
        <a href="https://www.facebook.com/ozgur.kan.7" target="_blank" class="w3-hover-white w3-hover-text-indigo w3-show-inline-block"><i class="fa fa-facebook-official fa-2x"></i></a>
        <a href="https://www.instagram.com/kan_ozgur/"  target="_blank" class="w3-hover-white w3-hover-text-purple w3-show-inline-block"><i class="fa fa-instagram fa-2x"></i></a>
        <a href="https://www.snapchat.com/add/ozgur_kan" target="_blank" class="w3-hover-white w3-hover-text-yellow w3-show-inline-block"><i class="fa fa-snapchat fa-2x"></i></a>
        <a href="mailto:galatasaray_ozgur_94@hotmail.com" target="_blank" class="w3-hover-white w3-hover-text-red w3-show-inline-block"><i class="fa fa-envelope fa-2x"></i></a>
    </div>
    <div style="clear: both"></div>

    <a href="hazir.php" onclick="w3_close()" class="w3-padding w3-text-teal"><i class="fa fa-home fa-fw w3-margin-right"></i>ANASAYFA</a>
    <a href="hakkimda.php" onclick="w3_close()" class="w3-padding"><i class="fa fa-id-card fa-fw w3-margin-right"></i>HAKKIMDA</a>
    <a href="favoriler.php" onclick="w3_close()" class="w3-padding"><i class="fa fa-star fa-fw w3-margin-right"></i>FAVORİLER</a>


    <div id="sol_alt" style="margin-top: 20px;width:270px;height: 410px;margin-left: 8px;">
            <h1>DERSLER</h1>
            <ul>
                <?php
                $sayi = 1.0;
                $dersler= mysql_query("select * from Dersler WHERE Ders_Durumu=1 ");
                if(mysql_num_rows($dersler)==0){
                }else{
                    while($satır=mysql_fetch_array($dersler)){
                        $sayi=$sayi+0.2;
                        ?>


                        <li style="animation-duration:<?php echo $sayi;?>s;"><a href="<?php echo $satır['Ders_linki'];?>"><h3><?php echo $satır['Ders_adi'];?></h3></a></li>
                    <?php }}?>

            </ul>
    </div>

</nav>

<!-- Overlay effect when opening sidenav on small screens-->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

    <!-- Header -->
    <header class="w3-container" id="portfolio">
        <a href="#"><img src="images/resim.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
        <span class="w3-opennav w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>

        <h3><i class="fa fa-hashtag w3-margin-right"></i><b>Başlık Alanı</b></h3>
        <div class="w3-section w3-bottombar w3-padding-16">
            <button class="w3-btn" style="margin: 2px"><i class="fa fa-calendar w3-margin-right"></i>Son Konular</button>
            <button class="w3-btn w3-white" style="margin: 2px"><i class="fa fa-fire w3-margin-right"></i>Popüler Konular</button>
            <button class="w3-btn w3-white " style="margin: 2px"><i class="fa fa-comments w3-margin-right"></i>En çok Yorum Alanlar</button>
        </div>
    </header>
    <?php for($i=1;$i<=10;$i++){ ?>
    <!-- First Photo Grid-->
    <div class="w3-row-padding">
        <div class="w3-col s12  m6 w3-container w3-margin-bottom">

            <div class="w3-container w3-white w3-hover-red w3-hover-opacity">
                <h2 style="text-align:center"><b>Lorem Ipsum </b></h2>
                <p style="text-indent: 15px;">
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.

                </p>
                <br>
                <button class="button" style="vertical-align:middle" type="submit" ><span>Devamını Oku</span></button>
            </div>
        </div>

        <div class="w3-col s12  m6 w3-container w3-margin-bottom">
            <div class="w3-container w3-white w3-hover-khaki w3-hover-opacity">
                <h2 style="text-align:center"><b>Lorem Ipsum</b></h2>
                <p style="text-indent: 15px;">
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                    Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.

                </p>
                <br>
                <button class="button" style="vertical-align:middle" type="submit" ><span>Devamını Oku</span></button>
            </div>
        </div>


    </div>

    <?php }?>

    <!-- Pagination -->
    <div class="w3-center w3-padding-32">
        <ul class="w3-pagination">
            <li><a class="w3-black" href="#">1</a></li>
            <li><a class="w3-hover-black" href="#">2</a></li>
            <li><a class="w3-hover-black" href="#">3</a></li>
            <li><a class="w3-hover-black" href="#">4</a></li>
            <li><a class="w3-hover-black" href="#">»</a></li>
        </ul>
    </div>







    <!-- Footer -->
    <footer class="w3-container w3-center w3-padding-24 w3-padding-32 w3-dark-grey">Powered by:
        <a href="hazir.php" title="özgür_kan" class="w3-hover-opacity">Özgür KAN</a>
    </footer>



    <!-- End page content -->
</div>

<script>
    // Script to open and close sidenav
    function w3_open() {
        document.getElementById("mySidenav").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidenav").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>

</body>
</html>
