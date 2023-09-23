// $(function(){
// 	$('.open').toggle(
// 	    function(){
// 	        $(".content").animate({'margin-left':'275px'},250);
// 	    }, 
// 	    function(){
// 	        $(".content").animate({'margin-left':'0px'},250);
// 	    }
// 	);
// });
// $(".open").click(function () {
// 	$(".rotate").animate({'background-color':'#ccc'},50);
// 	$(".content").animate({'margin-left':'275px'},250);
// });
setTimeout(function(){rotate(++degree)},65);$(".open").click(function(e){e.preventDefault();if($(this).hasClass("isClosed")){$(".content").animate({marginLeft:"275px"},200);$(function(){function t(t){e.css({WebkitTransform:"rotate("+t+"deg)"});e.css({"-moz-transform":"rotate("+t+"deg)"})}var e=$(".rotate");t(90)});$(this).removeClass("isClosed")}else{$(".content").animate({marginLeft:"0px"},200);$(function(){function t(t){e.css({WebkitTransform:"rotate("+t+"deg)"});e.css({"-moz-transform":"rotate("+t+"deg)"})}var e=$(".rotate");t(0)});$(this).addClass("isClosed")}});$(".close-button").click(function(){$(".content").animate({"margin-left":"0px"},250);$(function(){function t(t){e.css({WebkitTransform:"rotate("+t+"deg)"});e.css({"-moz-transform":"rotate("+t+"deg)"})}var e=$(".rotate");t(0)});$(this).addClass("isClosed")});