 

function valid(theForm)
{

    
    if(theForm.fname.value=="")
    {document.getElementById('fn').style.visibility="visible";
      document.getElementById('t1').focus();
      return (false);}
    if(document.getElementById('fn').style.visibility=="visible")
    {document.getElementById('fn').style.visibility="hidden";
     
    }
      
    
    if(theForm.email.value=="")
    {
        document.getElementById('ea').style.visibility="visible";
		document.getElementById('ea').style.display="block";
         document.getElementById('t1').focus();
        return (false);
    }
       
    if(document.getElementById('ea').style.visibility=='visible')
    {
        document.getElementById('ea').style.visibility="hidden";
         
    }
    



    if(theForm.password.value=="")
    {document.getElementById('ps').style.visibility="visible";
     document.getElementById('t1').focus();
    
  return (false);}
if(document.getElementById('ps').style.visibility=='visible')
    {document.getElementById('ps').style.visibility="hidden";
     }
    
    
    if(theForm.password.value.length<6)
    {document.getElementById('ps1').style.visibility="visible";
     document.getElementById('t1').focus();
    
    return (false);}
       if(document.getElementById('ps1').style.visibility=='visible')
    {document.getElementById('ps1').style.visibility="hidden";
     }
    
     if(theForm.cpassword.value=="")
    {document.getElementById('cps').style.visibility="visible";
     document.getElementById('t1').focus();
    return (false);}
     if(document.getElementById('cps').style.visibility=='visible')
    {document.getElementById('cps').style.visibility="hidden";
     }
     if(theForm.password.value!=theForm.cpassword.value)
    {document.getElementById('cps1').style.visibility="visible";
     document.getElementById('t1').focus();
    return (false);}
    if(document.getElementById('cps1').style.visibility=='visible')
    {document.getElementById('cps1').style.visibility="hidden";
     }
    
     if(theForm.dd.value=="")
    {document.getElementById('dateinf').style.display="inline";
     document.getElementById('dd').focus();
    return (false);}
     if(document.getElementById('dateinf').style.display=="inline")
    {document.getElementById('dateinf').style.display="none";
     }
    
    if(theForm.yyyy.value=="")
    {document.getElementById('yearinf').style.display="inline";
     document.getElementById('yyyy').focus();
    return (false);}
     if(document.getElementById('yearinf').style.display=="inline")
    {document.getElementById('yearinf').style.display="none";
     }
    
    
    
   
   if(document.register.not.checked==false)
{
    alert('please accept the terms and conditions.');
    return (false);
}
    
    if(true)
    {
       alert('Registeration successful');
    return (true);
    }
      
}

$(document).ready(function() {

 $("body").css("display", "none");
 
    $("body").fadeIn(1000);
 
 $("#newtopic").click(function(e) {
                e.preventDefault();
            });

 $("#newtopic").click(function () {
       $("#newtop").fadeToggle("slow");
  });
 $("#closepost").click(function () {
       $("#newtop").fadeOut("slow");
  });
    

 
});