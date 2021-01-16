/**************************************************

  Name: coreEngine.js
  Author: Trevor Bonomi
  Date: 2011

***************************************************

  1. Core Functions

  2. General Functions
    2.1 init
      2.1.1 setStage
      2.1.2 registerNav
      2.1.3 scrollOpen
      2.1.4 animateHover
      2.1.5 scrollOpen
      2.1.6 scrollClose
      2.1.7 playSound
      2.1.8 imageFader
      2.1.9 detectIE
      2.1.10 lightBoxer

**************************************************/

var defaultSpeed = 300;
var defaultOpacity = .90;
var hoverOpacity = 1;
var timer = 0;
/* 1. Core Functions
=================================================*/
$(document).ready(function(){
  init();
});
$(window).bind("unload", function() {
});
/*$(window).bind("scroll",function(){
   clearTimeout(timer);
   timer = setTimeout(checkStop,100);
});
function checkStop(){
  var scroll = $("body").scrollTop();
  if (!$("#scrollWrapper").is(':hover')) {
    $("#scrollWrapper").stop(false,true).animate({top: scroll+"px"},300);
  }
}*/
/* 2. General Functions
=================================================*/

/* 2.1 init
-------------------------------------------------*/
function init(){

  setStage();
  registerNav();
    $("body").animate({margin:0},1000,function(){scrollOpen(300);
  });
}
/* 2.1.1 setStage
-------------------------------------------------*/
function setStage(){
  $("#scrollMiddle").height(80);
  $("#thePen").css("opacity",0);
  $(".widgetCaptionBg").each(function(){
    $(this).css("opacity",.5);
  });
  //Glowing Paragraphs
  $("#scrollContent").find(".post").each(function(){
    if ($("#scrollContent").hasClass("home")){
      animateHover($(this).find("p"),0);
    }
    if ($("#scrollContent").hasClass("contact")){
      animateHover($(this).find("input"),.4);
      animateHover($(this).find("textarea"),.4);
    }
    else {
      animateHover($(this),0);
    }
    if ($("#scrollContent").hasClass("portfolio") && $(this).hasClass("folio")){
      lightBoxer($(this));
      $(this).hover(function(){
        var b; //Bubble
        var t; //Title
        var s = $(this).find("h3 span");
		  if (!s) return;
        if (s.hasClass("audio")){
          t = "CLICK TO HEAR AUDIO";
        }
        if (s.hasClass("video")){
          t = "CLICK TO VIEW VIDEO";
        }
        if (s.hasClass("print")){
          t = "CLICK TO VIEW PHOTO";
		}
		if (s.hasClass("embed")){
          t = "CLICK TO VIEW VIDEO";
        }
		if (s.hasClass("iframe")){
          t = "CLICK TO VIEW VIDEO";
        }
          $(this).prepend("<div class='bubble'>"+t+"</div>");
          $(this).find(".bubble").delay(100).stop(false,true).fadeIn("slow");
      },function(){
        $(this).find(".bubble").stop(true,true).fadeOut("slow",function(){
          $(this).remove();
        });
      });
    }
  });
  //sideBar Images
  imageFader("in");
  lightBoxer($("#sideBar .widget .widgetPhoto img"));
  //Link Handling
  $(document).find("a").each(function(){
    if ($(this).attr("target") != "_blank"){
      $(this).click(function(e){
        e.preventDefault();
          scrollClose($(this).attr('href'));
      });
    }
  });
  //
}
/* 2.1.2 registerNav
-------------------------------------------------*/
function registerNav(){
  $("#navIcons").find(".icon").each(function(){
    if (!$(this).hasClass("active")){
      animateHover($(this),.3);
    }
  });
}
/* 2.1.4 animateHover
-------------------------------------------------*/
function animateHover(o,theOffset){
  if (detectIE() == "-1"){
    o.css("opacity",defaultOpacity-theOffset);
    o.hover(function(){
      $(this).stop(false,true).animate({opacity: hoverOpacity},defaultSpeed);
    },function(){
      if (!$(this).is(":focus")) $(this).stop(false,true).animate({opacity: defaultOpacity-theOffset},defaultSpeed);
    });
    o.focus(function(){
      $(this).stop(false,true).animate({opacity: hoverOpacity},defaultSpeed);
    });
    o.blur(function(){
      $(this).stop(false,true).animate({opacity: defaultOpacity-theOffset},defaultSpeed);
    });
  }//endIf
}
/* 2.1.5 scrollOpen
-------------------------------------------------*/
function scrollOpen(theDelay){
  var scrollHeight = $("#scrollInside").outerHeight(true);
  if ($("#scrollInside").outerHeight(true) <= 900) scrollHeight = 900;
  else scrollHeight = $("#scrollInside").height();
  $("#scrollMiddle").animate({height: (scrollHeight+150+'px')},defaultSpeed, function(){
    $("#thePen").animate({opacity: 1},defaultSpeed+200);
  });

}
/* 2.1.6 scrollClose
-------------------------------------------------*/
function scrollClose(theUrl){

  //playSound("sounds/fold1.wav");
  var scrollHeight = 80;
  $("#thePen").stop(false,true).animate({opacity: 0},defaultSpeed, function(){
    $("#scrollMiddle").stop(false,true).animate({height: (scrollHeight)},defaultSpeed, function(){
      document.location = theUrl;
    });
  });
  imageFader("out");
}
/* 2.1.7 playSound
-------------------------------------------------*/
function playSound(audioUrl) {

}
/*2.1.8 imageFader
-------------------------------------------------*/
function imageFader(d){
    var i = 0;
    $("#sideBar").find(".widget").each(function(){
    $(this).find(".widgetPhoto img").each(function(){
      if (d == "in"){
        $(this).css("display","none");
          $(this).fadeIn((defaultSpeed));
      }
      if (d == "out"){
        $(this).fadeOut(defaultSpeed);
      }
    });
  });
}
/*2.1.9 detectIE
-------------------------------------------------*/
function detectIE()
// Returns the version of Internet Explorer or a -1
// (indicating the use of another browser).
{
  var rv = -1; // Return value assumes failure.
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}
/*2.1.10 lightBoxer
-------------------------------------------------*/
function lightBoxer(t) {
  $('#wrapper').append('<div id="lighter"></div>');
  t.each(function(){
    var arf = false;
    $(this).click(function(e) {
      //PORTFOLIO PAGE
      if ($(this).hasClass("post")){
        var o = $(this).find(".theImageURL");
		var theHtml = $.parseHTML(o.text());
        if ($(this).find("h3 span").hasClass("print")){
          $("#lighter").html("<img src='"+o.html()+"' height='"+o.attr('height')+"px' width='"+o.attr('width')+"px' />");
          $("#lighter").lightbox_me({
                  centered: true,
                  destroyOnClose: true,
                  closeClick: true,
                  closeEsc: true
          });
          arf = true;
        }
        if ($(this).find("h3 span").hasClass("video")){
          $("#lighter").html(theHtml);
          $("#lighter").lightbox_me({
                 centered: true,
                  destroyOnClose: true,
                  closeClick: true,
                  closeEsc: true
          });
          arf = false;
        }
		if ($(this).find("h3 span").hasClass("embed") || $(this).find("h3 span").hasClass("iframe")){
          $("#lighter").html(theHtml);
          $("#lighter").lightbox_me({
                 centered: true,
                  destroyOnClose: true,
                  closeClick: true,
                  closeEsc: true
          });
          arf = false;
        }
        if ($(this).find("h3 span").hasClass("audio")){
          $("#lighter").html(theHtml);
          $("#lighter").lightbox_me({
                 centered: true,
                  destroyOnClose: true,
                  closeClick: true,
                  closeEsc: true
          });
          arf = false;
        }
      }
      else {
      //SIDEBAR
        var o = $(this).parent("div").find(".theImageURL");
        $("#lighter").html("<img src='"+o.html()+"' height='"+o.attr('height')+"px' width='"+o.attr('width')+"px' />");
        $("#lighter").lightbox_me({
                centered: true,
                destroyOnClose: true,
                closeClick: true,
                closeEsc: true
        });
        arf = true;
      }
    $("#lighter").click(function(e) {
      if (arf == true) $("#lighter").trigger("close");
    });
    e.preventDefault();
    });
  });
}


