






$(document).ready(function() {

	

 //$("body").css("display", "none");
 
   // $("body").fadeIn(200);
  

 $('#dattym').mouseover(function(){
        $('#overlay').fadeIn('fast');
            });

           





  
 
 
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
$("#opp1").mouseover(function () {
$("#oppp1").animate({
opacity: 1.0
}, "medium");
});
$("#opp1").mouseout(function () {
$("#oppp1").animate({
opacity: 0.6
}, "medium");
});
//
$("#opp2").mouseover(function () {
$("#oppp2").animate({
opacity: 1.0
}, "medium");
});
$("#opp2").mouseout(function () {
$("#oppp2").animate({
opacity: 0.6
}, "medium");
});
//
$("#opp3").mouseover(function () {
$("#oppp3").animate({
opacity: 1.0
}, "medium");
});
$("#opp3").mouseout(function () {
$("#oppp3").animate({
opacity: 0.6
}, "medium");
});
//
$("#opp4").mouseover(function () {
$("#oppp4").animate({
opacity: 1.0
}, "medium");
});
$("#opp4").mouseout(function () {
$("#oppp4").animate({
opacity: 0.6
}, "medium");
});







  $(".op").click(function () {
       $(".op").fadeOut("slow");
    });
     $(".op").click(function () {
       $(".op").fadeIn("slow");
    });
    
  


$(".contactc").mouseover(function(){
    $(this).fadeOut("fast");
    $(this).fadeIn("fast");
});










});


function dat()
{


 
    var d = new Date();
    
var curr_hour = d.getHours();
var curr_sec = d.getSeconds();
var suf="am";
if(curr_hour>12)
{
if(curr_hour==13)
{curr_hour=1;
suf="pm";}
if(curr_hour==14)
{curr_hour=2;
suf="pm";}
if(curr_hour==15)
{curr_hour=3;
suf="pm";}
if(curr_hour==16)
{curr_hour=4; 
suf="pm";}
if(curr_hour==17)
{curr_hour=5;
suf="pm";}
if(curr_hour==18)
{curr_hour=6;
suf="pm";}
if(curr_hour==19)
{curr_hour=7;
suf="pm";}
if(curr_hour==20)
{curr_hour=8;
suf="pm";}
if(curr_hour==21)
{curr_hour=9;
suf="pm";}
if(curr_hour==22)
{curr_hour=10;
suf="pm";}
if(curr_hour==23)
{curr_hour=11;
suf="pm";}
if(curr_hour==24)
{curr_hour=12;
suf="pm";}
}
var curr_min = d.getMinutes();
if(curr_min<10)
{
    curr_min="0"+curr_min;
}
 var week=d.getDay();
    var weekd;
    if(week==0)
    weekd="Sunday";
    
     if(week==1)
    weekd="Monday";
     if(week==2)
    weekd="Tuesday";
     if(week==3)
    weekd="Wednesday";
     if(week==4)
    weekd="Thursday";
     if(week==5)
    weekd="Friday";
     if(week==6)
    weekd="Saturday";
    
    document.getElementById('dattym').value=curr_hour+":"+curr_min+":"+curr_sec+" "+suf+" "+weekd;
    t=setTimeout('dat()',500);
   }

function addbookmark(){
if (document.all)
window.external.AddFavorite("http://localhost:8008/project_dbms/index.php","cluster fun home");
}






