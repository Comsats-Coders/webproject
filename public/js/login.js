function noSpace(event)
{     if(event.which==32){
      event.preventDefault();
   }
}


$(document).ready(
   function() {
      $('form > input').keyup(myfunction).change(myfunction);

  })

  function myfunction() {
   var empty = false;
   $('form > input').each(function() {
       if ($(this).val() == '') {
           empty = true;
       }
   });
   if (!empty) {
       $('#LogBtn').removeClass("disabled"); 
   }
   else{
     $('#LogBtn').addClass("disabled"); 

   }
}

    $("#form").submit(
       function(e) {
      e.preventDefault();
  });
