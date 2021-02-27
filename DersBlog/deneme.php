<?php
/**
 * Created by PhpStorm.
 * User: ozgur
 * Date: 17.01.2017
 * Time: 14:54
 */
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Responsive tasarım etiketi-->
        <title>Pavlov'un Köpeği</title><!--Site başlığı -->
        <link rel="icon" href="images/favicon.ico" type="image/gif" sizes="16x16"><!--Site favicon -->
        <link href="css/reset.css" rel="stylesheet" type="text/css" /><!--reset.css dosyamız -->
        <link href="css/style.css" rel="stylesheet" type="text/css" /><!--style.css dosyamız -->

    <style>

        * {
            box-sizing: border-box;
        }
        .row::after {
            content: "";
            clear: both;
            display: block;
        }
        /* Mobil Ekranlar*/
        @media only screen and ( max-width: 768px) {
            .gizli{visibility: visible;display: block}
            .sol_alan_gizle{visibility: hidden;display: none;}
            .col-m-1 {width: 8.33%;background-color: hotpink}
            .col-m-2 {width: 16.66%;background-color: #4CAF50}
            .col-m-3 {width: 25%;}
            .col-m-4 {width: 33.33%;}
            .col-m-5 {width: 41.66%;}
            .col-m-6 {width: 50%;}
            .col-m-7 {width: 58.33%;b}
            .col-m-8 {width: 66.66%;}
            .col-m-9 {width: 75%;}
            .col-m-10 {width: 83.33%;}
            .col-m-11 {width: 91.66%;background-color: darkkhaki}
            .col-m-12 {width: 100%;}

        }


        /*Dikey Tabletler */
        @media only screen and (min-width: 768px) {
            .gizli{visibility:hidden;display: none}
            .sol_alan_gizle{visibility: visible;display: block;}
            /*Sol alan fixed olduğu için orta alanı margin ile çektim*/
            .bosluk{margin-left:16.66%; }
            .col-d-1 {width: 8.33%;background-color: burlywood}
            .col-d-2 {width: 16.66%;background-color: #33b5e5}
            .col-d-3 {width: 25%;}
            .col-d-4 {width: 33.33%;}
            .col-d-5 {width: 41.66%;}
            .col-d-6 {width: 50%;}
            .col-d-7 {width: 58.33%;}
            .col-d-8 {width: 66.66%;}
            .col-d-9 {width: 75%;background-color: brown}
            .col-d-10 {width: 83.33%;}
            .col-d-11 {width: 91.66%;}
            .col-d-12 {width: 100%;}
        }

        /*Yatay Tablet + Minibook Laptop*/
        @media only screen and (min-width:992px) {
            .yazi_boyutu{font-size:100%}
            .gizli{visibility:hidden;display: none}
            .sol_alan_gizle{visibility: visible;display: block;}
            /*Sol alan fixed olduğu için orta alanı margin ile çektim*/
            .bosluk{margin-left:16.66%; }
            .col-y-1 {width: 8.33%;background-color: fuchsia}
            .col-y-2 {width: 16.66%;background-color: #95a5a6}
            .col-y-3 {width: 25%;}
            .col-y-4 {width: 33.33%;}
            .col-y-5 {width: 41.66%;}
            .col-y-6 {width: 50%;}
            .col-y-7 {width: 58.33%;}
            .col-y-8 {width: 66.66%;}
            .col-y-9 {width: 75%;background-color: darkviolet}
            .col-y-10 {width: 83.33%;}
            .col-y-11 {width: 91.66%;}
            .col-y-12 {width: 100%;}
        }

        /*Notebook + Desktop*/
        @media only screen and (min-width: 1200px) {
            .yazi_boyutu{font-size:110%}
            .gizli{visibility:hidden;display: none}
            .sol_alan_gizle{visibility: visible;display: block;}
            /*Sol alan fixed olduğu için orta alanı margin ile çektim*/
            .bosluk{margin-left:16.66%; }
            .col-n-1 {width: 8.33%;background-color: coral}
            .col-n-2 {width: 16.66%;background-color: #9933cc}
            .col-n-3 {width: 25%;}
            .col-n-4 {width: 33.33%;}
            .col-n-5 {width: 41.66%;}
            .col-n-6 {width: 50%;}
            .col-n-7 {width: 58.33%;}
            .col-n-8 {width: 66.66%;}
            .col-n-9 {width: 75%;background-color: #ff1839}
            .col-n-10 {width: 83.33%;}
            .col-n-11 {width: 91.66%;}
            .col-n-12 {width: 100%;}
        }
    </style>

</head>
<body>


        <div class="row">
            <!--Sol Alan-->
            <div id="sol_alan" class="col-m-2 col-d-2 col-y-2 col-n-2 sol_alan_gizle">
                <div id="sol_ust" class="col-m-12 col-d-12 col-y-12 col-n-12">
                    <div id="baslik" class="col-m-12 col-d-12 col-y-12 col-n-12" >
                        <img class="col-m-4 col-d-4 col-y-4 col-n-4" src="images/resim.png">
                        <h1 class="col-m-8 col-d-8 col-y-8 col-n-8 yazi_boyutu">ÖZGÜR KAN <br>
                            <p style="text-align: center;font-family:'Brush Script MT';text-decoration: underline;">Kişisel Blog</p>
                        </h1>
                    </div>

                    <div id="navigasyon" class="col-m-12 col-d-12 col-y-12 col-n-12">
                        <ul class="col-m-12 col-d-11 col-y-10 col-n-9" >
                            <li style="animation-duration: 2s;" class="col-m-3 col-d-2 col-y-1 col-n-1">
                                <a href="index.php">
                                    <img src='images/anasayfa.png'>
                                    Anasayfa
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>

            <div style="height: 2500px;float: left" class="col-m-11 col-d-9 col-y-9 col-n-9 bosluk">
                <div class="gizli" style="background-color: black; width: 50px;height: 50px"></div>
            </div>

            <div style="height: 1500px;float: left" class="col-m-1 col-d-1 col-y-1 col-n-1">
            </div>


        </div>

</body>
</html>
