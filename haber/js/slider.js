
// JavaScript Document
$(function(){
    /*LOGO YAN ALAN*/

    var toplamLi = $("#yan_icerik li").length;
    var toplamGenislik=toplamLi*485;

    var deger_yan=0;


    $("#yan_buton li").click(function(){
        var indis=$(this).index();
        yeniDeger_yan=indis*485;
        $("#yan_icerik ul").animate({marginLeft:"-" +  yeniDeger_yan + "px"},500);
        deger_yan=indis;
        return false
    });



    /*ANA SLİDER*/
		 $("#slider .sayfa a:first").addClass("aktif");
		 //$(".slider li").hide();
		 //$(".slider li:fist").show();
		 //$("ul.slider li:not(:first)").hide();
		 var toplamLi = $(".slider li").length;
		 var toplamGenislik=toplamLi*690;
		 $("ul.slider").css("width",toplamGenislik+"px");
		 var deger=0;

		 
		 $(".sayfa a").hover(function(){
									  var indis=$(this).index();
									 yeniDeger=indis*690;				
										   $("ul.slider").animate({marginLeft:"-" + yeniDeger + "px"},0);
									  $(".sayfa a").removeClass("aktif");
									  $(this).addClass("aktif");
									  deger=indis;
									  return false
									  });
		 
		 $("a#sonraki").click(function(){
									   $(".sayfa a").removeClass("aktif");
									   
									   if(deger < toplamLi-1){
										   deger++;									   
									 	   yeniDeger=deger*690;				
										   $("ul.slider").animate({marginLeft:"-" + yeniDeger + "px"},250);
									       $(".sayfa a:eq("+deger+")").addClass("aktif");
										   }
										   else{
											   deger=0;
											   $("ul.slider").animate({marginLeft:0 + "px"},250);
											   $(".sayfa a:eq("+deger+")").addClass("aktif");
											   }
									   return false								   
									});
		 
		 $("a#onceki").click(function(){
									   $(".sayfa a").removeClass("aktif");
									   
									   if(deger > 0){
										   deger--;									   
									 	   yeniDeger=deger*690;				
										   $("ul.slider").animate({marginLeft:"-" + yeniDeger + "px"},250);							       
									       $(".sayfa a:eq("+deger+")").addClass("aktif");
										   }
										   else{
											   deger=toplamLi-1;
											   yeniDeger=deger*690;				
										   $("ul.slider").animate({marginLeft:"-" + yeniDeger + "px"},250);
											   $(".sayfa a:eq("+deger+")").addClass("aktif");
											   }
									   return false								   
									});
		 
		 $.dondur=function(){
			 							 $(".sayfa a").removeClass("aktif");
									   
									   if(deger < toplamLi-1){
										   deger++;									   
									 	  	yeniDeger=deger*690;				
										   $("ul.slider").animate({marginLeft:"-" + yeniDeger + "px"},250);						       
									       $(".sayfa a:eq("+deger+")").addClass("aktif");
										   }
										   else{
											   deger=0;
											   $("ul.slider").animate({marginLeft:0 + "px"},250);
											   $(".sayfa a:eq("+deger+")").addClass("aktif");
											   }
									   return false					
			 }
			 var sliderDondur=setInterval('$.dondur()',5000);
			 $("#slider").hover(function(){
			clearInterval(sliderDondur);
			},function(){
			sliderDondur=setInterval("$.dondur()",5000);
			});

    /*******  Yan Slider **********/
    $(".sayfa1 a:first").addClass("aktif1");
    var toplamLi1 = $(".yan_slider li").length;
    var toplamYukseklik=toplamLi1*200;
    $("ul.yan_slider").css("height",toplamYukseklik+"px");
    var deger1=0;
    //$(".slider li").hide();
    //$(".slider li:fist").show();
    //$("ul.slider li:not(:first)").hide();
    $(".sayfa1 a").click(function(){
        var indis=$(this).index();
        yeniDeger=indis*420;
        $("ul.yan_slider").animate({marginTop:"-" + yeniDeger + "px"},1000);
        $(".sayfa1 a").removeClass("aktif1");
        $(this).addClass("aktif1");
        deger1=indis;
        return false
    });


    $.dondur1=function(){
        $(".sayfa1 a").removeClass("aktif1");

        if(deger1 < (toplamLi1/3)-1){
            deger1++;
            yeniDeger=deger1*420;
            $("ul.yan_slider").animate({marginTop:"-" + yeniDeger + "px"},1000);
            $(".sayfa1 a:eq("+deger1+")").addClass("aktif1");
        }
        else{
            deger1=0;
            $("ul.yan_slider").animate({marginTop:0 + "px"},1000);
            $(".sayfa1 a:eq("+deger1+")").addClass("aktif1");
        }
        return false
    }
    var sliderDondur1=setInterval('$.dondur1()',8000);
    $("#yan_slider").hover(function(){
        clearInterval(sliderDondur1);
    },function(){
        sliderDondur1=setInterval("$.dondur1()",8000);
    });


    /*TEKNOLOJİ SLİDER ALT*/
    $("#teknoloji h3 ul li:first").addClass("aktif1");
    var toplamLi_teknoloji = $("#teknoloji_slider li").length;
    var toplamGenislik_teknoloji=toplamLi_teknoloji*390;

    var deger_teknoloji=0;


    $("#teknoloji h3 ul li").click(function(){
        var indis_teknoloji=$(this).index();
        yeniDeger_teknoloji=indis_teknoloji*390;
        $("#teknoloji_slider").animate({marginLeft:"-" +  yeniDeger_teknoloji + "px"},500);
        $("#teknoloji h3 ul li").removeClass("aktif1");
        $(this).addClass("aktif1");
        deger_teknoloji=indis_teknoloji;
        return false
    });

    $.dondur_teknoloji=function(){
        $("#teknoloji h3 ul li").removeClass("aktif");

        if(deger_teknoloji < toplamLi_teknoloji-1){
            deger_teknoloji++;
            yeniDeger_teknoloji=deger_teknoloji*390;
            $("#teknoloji_slider").animate({marginLeft:"-" + yeniDeger_teknoloji + "px"},250);
            $("#teknoloji h3 ul li").removeClass("aktif1");
            $("#teknoloji h3 ul li:eq("+deger_teknoloji+")").addClass("aktif1");
        }
        else{
            deger_teknoloji=0;
            $("#teknoloji_slider").animate({marginLeft:0 + "px"},250);
            $("#teknoloji h3 ul li").removeClass("aktif1");
            $("#teknoloji h3 ul li:eq("+deger_teknoloji+")").addClass("aktif1");
        }
        return false
    }
    var sliderDondur_teknoloji=setInterval('$.dondur_teknoloji()',10000);
    $("#teknoloji").hover(function(){
        clearInterval(sliderDondur_teknoloji);
    },function(){
        sliderDondur_teknoloji=setInterval("$.dondur_teknoloji()",10000);
    });



    /*SAĞLIK SLİDER ALT*/
    $("#saglik h3 ul li:first").addClass("aktif1");
    var toplamLi_saglik = $("#saglik_slider li").length;
    var toplamGenislik_saglik=toplamLi_saglik*390;

    var deger_saglik=0;


    $("#saglik h3 ul li").click(function(){
        var indis_saglik=$(this).index();
        yeniDeger_saglik=indis_saglik*390;
        $("#saglik_slider").animate({marginLeft:"-" +  yeniDeger_saglik + "px"},500);
        $("#saglik h3 ul li").removeClass("aktif1");
        $(this).addClass("aktif1");
        deger_saglik=indis_saglik;
        return false
    });

    $.dondur_saglik=function(){
        $("#saglik h3 ul li").removeClass("aktif");

        if(deger_saglik < toplamLi_saglik-1){
            deger_saglik++;
            yeniDeger_saglik=deger_saglik*390;
            $("#saglik_slider").animate({marginLeft:"-" + yeniDeger_saglik + "px"},250);
            $("#saglik h3 ul li").removeClass("aktif1");
            $("#saglik h3 ul li:eq("+deger_saglik+")").addClass("aktif1");
        }
        else{
            deger_saglik=0;
            $("#saglik_slider").animate({marginLeft:0 + "px"},250);
            $("#saglik h3 ul li").removeClass("aktif1");
            $("#saglik h3 ul li:eq("+deger_saglik+")").addClass("aktif1");
        }
        return false
    }
    var sliderDondur_saglik=setInterval('$.dondur_saglik()',10000);
    $("#saglik").hover(function(){
        clearInterval(sliderDondur_saglik);
    },function(){
        sliderDondur_saglik=setInterval("$.dondur_saglik()",10000);
    });


    /*EĞİTİM SLİDER ALT*/
    $("#egitim h3 ul li:first").addClass("aktif1");
    var toplamLi_egitim = $("#egitim_slider li").length;
    var toplamGenislik_egitim=toplamLi_egitim*390;

    var deger_egitim=0;


    $("#egitim h3 ul li").click(function(){
        var indis_egitim=$(this).index();
        yeniDeger_egitim=indis_egitim*390;
        $("#egitim_slider").animate({marginLeft:"-" +  yeniDeger_egitim + "px"},500);
        $("#egitim h3 ul li").removeClass("aktif1");
        $(this).addClass("aktif1");
        deger_egitim=indis_egitim;
        return false
    });

    $.dondur_egitim=function(){
        $("#egitim h3 ul li").removeClass("aktif");

        if(deger_egitim < toplamLi_egitim-1){
            deger_egitim++;
            yeniDeger_egitim=deger_egitim*390;
            $("#egitim_slider").animate({marginLeft:"-" + yeniDeger_egitim + "px"},250);
            $("#egitim h3 ul li").removeClass("aktif1");
            $("#egitim h3 ul li:eq("+deger_egitim+")").addClass("aktif1");
        }
        else{
            deger_egitim=0;
            $("#egitim_slider").animate({marginLeft:0 + "px"},250);
            $("#egitim h3 ul li").removeClass("aktif1");
            $("#egitim h3 ul li:eq("+deger_egitim+")").addClass("aktif1");
        }
        return false
    }
    var sliderDondur_egitim=setInterval('$.dondur_egitim()',10000);
    $("#egitim").hover(function(){
        clearInterval(sliderDondur_egitim);
    },function(){
        sliderDondur_egitim=setInterval("$.dondur_egitim()",10000);
    });


    /*YAŞAM SLİDER ALT*/
    $("#yasam h3 ul li:first").addClass("aktif1");
    var toplamLi_yasam = $("#yasam_slider li").length;
    var toplamGenislik_yasam=toplamLi_yasam*390;

    var deger_yasam=0;


    $("#yasam h3 ul li").click(function(){
        var indis_yasam=$(this).index();
        yeniDeger_yasam=indis_yasam*390;
        $("#yasam_slider").animate({marginLeft:"-" +  yeniDeger_yasam + "px"},500);
        $("#yasam h3 ul li").removeClass("aktif1");
        $(this).addClass("aktif1");
        deger_yasam=indis_yasam;
        return false
    });

    $.dondur_yasam=function(){
        $("#yasam h3 ul li").removeClass("aktif");

        if(deger_yasam< toplamLi_yasam-1){
            deger_yasam++;
            yeniDeger_yasam=deger_yasam*390;
            $("#yasam_slider").animate({marginLeft:"-" + yeniDeger_yasam + "px"},250);
            $("#yasam h3 ul li").removeClass("aktif1");
            $("#yasam h3 ul li:eq("+deger_yasam+")").addClass("aktif1");
        }
        else{
            deger_yasam=0;
            $("#yasam_slider").animate({marginLeft:0 + "px"},250);
            $("#yasam h3 ul li").removeClass("aktif1");
            $("#yasam h3 ul li:eq("+deger_yasam+")").addClass("aktif1");
        }
        return false
    }
    var sliderDondur_yasam=setInterval('$.dondur_yasam()',10000);
    $("#yasam").hover(function(){
        clearInterval(sliderDondur_yasam);
    },function(){
        sliderDondur_yasam=setInterval("$.dondur_yasam()",10000);
    });



/*EN ÇOK OKUNANLAR*/
    var toplamLi_en_cok_okunanlar = $("#en_cok_okunanlar li").length;
    deger_en_cok_okunanlar=0;
    $.en_cok_okunanlar=function(){
        if(deger_en_cok_okunanlar < toplamLi_en_cok_okunanlar-10){
            deger_en_cok_okunanlar++;
            yeniDeger_en_cok_okunanlar=deger_en_cok_okunanlar*50;
            $("ul.en_cok_okunanlar").animate({marginTop:"-" + yeniDeger_en_cok_okunanlar + "px"},500);
        }
        else{
            deger_en_cok_okunanlar=0;
            $("ul.en_cok_okunanlar").animate({marginTop:0 + "px"},500);
        }
        return false
    }
    var sliderDondur_en_cok_okunanlar=setInterval('$.en_cok_okunanlar()',4000);
    $("#en_cok_okunanlar").hover(function(){
        clearInterval(sliderDondur_en_cok_okunanlar);
    },function(){
        sliderDondur_en_cok_okunanlar=setInterval("$.en_cok_okunanlar()",4000);
    });


    /*Dünden Kalanlar*/
    var toplamLi_dunden_kalanlar = $("#dunden_kalanlar li").length;
    deger_dunden_kalanlar=0;
    $.dunden_kalanlar=function(){
        if(deger_dunden_kalanlar < toplamLi_dunden_kalanlar-10){
            deger_dunden_kalanlar++;
            yeniDeger_dunden_kalanlar=deger_dunden_kalanlar*50;
            $("ul.dunden_kalanlar").animate({marginTop:"-" + yeniDeger_dunden_kalanlar + "px"},500);
        }
        else{
            deger_dunden_kalanlar=0;
            $("ul.dunden_kalanlar").animate({marginTop:0 + "px"},500);
        }
        return false
    }
    var sliderDondur_dunden_kalanlar=setInterval('$.dunden_kalanlar()',4000);
    $("#dunden_kalanlar").hover(function(){
        clearInterval(sliderDondur_dunden_kalanlar);
    },function(){
        sliderDondur_dunden_kalanlar=setInterval("$.dunden_kalanlar()",4000);
    });




    doWindowResize();
  
  
});
