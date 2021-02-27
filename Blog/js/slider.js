/**
 * Created by özgür on 18.05.2014.
 */
$(function(){
    $("nav ul li a:first").addClass("nav_aktif");

    $("#sayfalar a:first").addClass("aktif");
    //$(".slider li").hide();
    //$(".slider li:fist").show();
    //$("ul.slider li:not(:first)").hide();
    var toplamLi = $(".slider_resim li").length;
    var toplamGenislik=toplamLi*700;
    $("ul.slider_resim").css("width",toplamGenislik+"px");
    var deger=0;


    $("#sayfalar a").click(function(){
        var indis=$(this).index();
        yeniDeger=indis*700;
        $("ul.slider_resim").animate({marginLeft:"-" + yeniDeger + "px"},500);
        $("#sayfalar a").removeClass("aktif");
        $(this).addClass("aktif");
        deger=indis;
        return false
    });

    $("#sonraki a").click(function(){
        $("#sayfalar a").removeClass("aktif");

        if(deger < toplamLi-1){
            deger++;
            yeniDeger=deger*700;
            $("ul.slider_resim").animate({marginLeft:"-" + yeniDeger + "px"},250);
            $("#sayfalar a:eq("+deger+")").addClass("aktif");
        }
        else{
            deger=0;
            $("ul.slider_resim").animate({marginLeft:0 + "px"},250);
            $("#sayfalar a:eq("+deger+")").addClass("aktif");
        }
        return false
    });

    $("#onceki a").click(function(){
        $("#sayfalar a").removeClass("aktif");

        if(deger > 0){
            deger--;
            yeniDeger=deger*700;
            $("ul.slider_resim").animate({marginLeft:"-" + yeniDeger + "px"},250);
            $("#sayfalar a:eq("+deger+")").addClass("aktif");
        }
        else{
            deger=toplamLi-1;
            yeniDeger=deger*700;
            $("ul.slider_resim").animate({marginLeft:"-" + yeniDeger + "px"},250);
            $("#sayfalar a:eq("+deger+")").addClass("aktif");
        }
        return false
    });

    $.dondur=function(){
        $("#sayfalar a").removeClass("aktif");

        if(deger < toplamLi-1){
            deger++;
            yeniDeger=deger*700;
            $("ul.slider_resim").animate({marginLeft:"-" + yeniDeger + "px"},250);
            $("#sayfalar a:eq("+deger+")").addClass("aktif");
        }
        else{
            deger=0;
            $("ul.slider_resim").animate({marginLeft:0 + "px"},250);
            $("#sayfalar a:eq("+deger+")").addClass("aktif");
        }
        return false
    }
    var sliderDondur=setInterval('$.dondur()',5000);
    $("#slider").hover(function(){
        clearInterval(sliderDondur);
    },function(){
        sliderDondur=setInterval("$.dondur()",5000);
    });
    doWindowResize();
});