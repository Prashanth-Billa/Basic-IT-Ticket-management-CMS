function feedback(theForm)
{

if(document.theForm.namek.value=="")
{
    alert('please enter your name');
    return (false);
}
if(document.theForm.namek.value.length<3)
{
    alert('name must contain atleast 3 characters. thank you');
    return (false);
}

  var e = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.theForm.email.value;
   if(e.test(address) == false) 
{
 
     alert('Please enter a valid email address');
      return (false);
    }
    
    


}