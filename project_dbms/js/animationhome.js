$(document).ready(function() {
 //$("body").css("display", "none");
 
    //$("body").fadeIn(800);
   

  
 
 
     $("#cussearch").click(function () {
       $(".cus").toggle("medium");
        return false;
   
    });

$(".op,.fd").css("opacity","0.6");
 

$(".op,.fd").hover(function () {


$(this).stop().animate({
opacity: 1.0
}, "medium");
},
 

function () {
 

$(this).stop().animate({
opacity: 0.6
}, "medium");

});





$("#yahoo,#bing,#youtube,#google").hover(function () {


$(this).stop().animate({
opacity: 1.0,width:"145px"
}, "medium");
},
 

function () {
 

$(this).stop().animate({
opacity: 0.6,width:"120px"
}, "medium");

});
$("#wikipedia").hover(function () {


$(this).stop().animate({
opacity: 1.0,width:"100px"
}, "medium");
},
 

function () {
 

$(this).stop().animate({
opacity: 0.6,width:"80px"
}, "medium");

});

  $(".fd").click(function () {
       $(".searchty").fadeOut("slow");
    });
     $(".op").click(function () {
       $(".searchty").fadeIn("slow");
    });
    
    $("#qe").click(function(){
  $(this).animate({width:"260px"});
});
  $("#qe").blur(function(){
   $(this).animate({width:"220px"});
});

$("#regk").mouseover(function () {
      $(this).fadeOut("fast");
      $(this).fadeIn("fast");
});

 $("#imagesa").mouseover(function(){
   $(this).animate({color:"#307D7E"});
 $("#weba").animate({color:"black"});
$("#videosa").animate({color:"black"});
$("#ebooka").animate({color:"black"});
});

 $("#videosa").mouseover(function(){
   $(this).animate({color:"#307D7E"});
 $("#weba").animate({color:"black"});
$("#imagesa").animate({color:"black"});
$("#ebooka").animate({color:"black"});
});
 $("#ebooka").mouseover(function(){
   $(this).animate({color:"#307D7E"});
 $("#weba").animate({color:"black"});
$("#videosa").animate({color:"black"});
$("#imagesa").animate({color:"black"});
});

 $("#weba").mouseover(function(){
   $(this).animate({color:"#307D7E"});
 $("#imagesa").animate({color:"black"});
$("#videosa").animate({color:"black"});
$("#ebooka").animate({color:"black"});
});

 $("#imagesa").mouseout(function(){
   $(this).animate({color:"black"});
});
$("#videosa").mouseout(function(){
   $(this).animate({color:"black"});
});
$("#weba").mouseout(function(){
   $(this).animate({color:"black"});
});
$("#ebooka").mouseout(function(){
   $(this).animate({color:"black"});
});












});
