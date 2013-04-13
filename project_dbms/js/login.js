

function logik()
{
 


$(document).ready(function() {

            $(".signin").click(function(e) {
                e.preventDefault();
            });
              $("#keyh").click(function(){
		$("#signin_menu").slideDown("slow");	
	});		

            $("fieldset#signin_menu").mouseup(function() {
          
                return false;
            });
            $(document).mouseup(function(e) {
                if($(e.target).parent("a.signin").length==0) {
                    $(".signin").removeClass("menu-open");
                    $("fieldset#signin_menu").hide();
                }
            });  
            $("#close").click(function(){
		$("#signin_menu").slideUp("slow");	
	});	
    
      $("#errorlogininfo").fadeIn("slow");
          
  $("#closeloginerror").click(function(){
  $("#errorlogininfo").fadeOut("slow");
            });
            $(".contactc").mouseover(function(){
    $(this).fadeOut("fast");
    $(this).fadeIn("fast");
});
 $("#qeq").click(function(){
  $(this).animate({width:"200px"});
});
  $("#qeq").blur(function(){
   $(this).animate({width:"120px"});
});


        });
        
        
        
        }