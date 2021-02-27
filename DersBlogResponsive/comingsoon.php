<?php
/**
 * Created by PhpStorm.
 * User: ozgur
 * Date: 20.01.2017
 * Time: 01:28
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: ozgur
 * Date: 20.01.2017
 * Time: 00:03
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Responsive tasarım etiketi-->
    <title>Pavlov'un Köpeği</title><!--Site başlığı -->

    <link href="css/normalize.css" rel="stylesheet" type="text/css" /><!--reset.css dosyamız -->
    <link href="css/style.css" rel="stylesheet" type="text/css" /><!--style.css dosyamız -->
<style>
    * {box-sizing:border-box}
    img{
        padding: 0;
        max-height: 700px;
        min-width: 100%;
    }
    body {font-family: Verdana,sans-serif;}
    .mySlides {display:none}

    /* Slideshow container */
    .slideshow-container {
        width: 100%;
        height: 695px;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 13px;
        width: 13px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
    }



</style>
</head>
<body>





<div class="slideshow-container">


    <div class="mySlides fade">

        <img src="images/10.jpg">

    </div>

    <div class="mySlides fade">

        <img src="images/11.jpg">

    </div>
    <div class="mySlides fade">

        <img src="images/13.jpg">

    </div>
    <div class="mySlides fade">

        <img src="images/14.jpg">

    </div>
    <div class="mySlides fade">

        <img src="images/15.jpg">

    </div>

    <div class="mySlides fade">

        <img src="images/9.jpg" >

    </div>
    <div style="position: absolute;top:280px;left: 440px;width: 600px;height: 150px;">
        <h1 style="text-align: center;font-size: 70px;font-family: 'Alegrea Sans';font-weight: bold">COMING SOON</h1>
        <ul style="padding-left:120px;width: 500px;height: 50px">
            <li style="margin: 10px;float: left;width: 70px;height: 70px;list-style-type: none">
                <img src='images/icons/facebook.png' style="max-width: 100%;max-height: 100%">
            </li>
            <li style="margin: 10px;float: left;width: 70px;height: 70px;list-style-type: none">
                <img src='images/icons/instagram.png' style="max-width: 100%;max-height: 100%">
            </li>
            <li style="margin: 10px;float: left;width: 70px;height: 70px;list-style-type: none">
                <img src='images/icons/twitter.png' style="max-width: 100%;max-height: 100%">
            </li>
            <li style="margin: 10px;float: left;width: 70px;height: 70px;list-style-type: none">
                <img src='images/icons/google-plus.png' style="max-width: 100%;max-height: 100%">
            </li>
        </ul>
    </div>

</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>

</div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex> slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 3500); // Change image every 2 seconds
    }
</script>



</body>
</html>


