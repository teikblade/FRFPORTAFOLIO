/*JQUERY*/
$(document).ready(function(){
  if($(window).width() > 359 && $(window).width() <= 575 || $(window).width() > 611 && $(window).width() <= 767)
	{
   // change functionality for smaller screens
   $( "#form-login" ).hide('slow', function() {
  		$("#menu-btn").addClass('menuDown');
  		$("#menu-btn").removeClass('menuUp');
  });
   $( "#menu-principal" ).show('slow', function() {
      $("#menu-btn").addClass('menuDown');
      $("#menu-btn").removeClass('menuUp');
  });
	} else {
   // change functionality for larger screens
	}
  $("#menu-btn").click(function(){
    $( "#form-login" ).toggle("slow",function(){
    	$("#menu-btn").addClass('menuUp');
    	$("#menu-btn").removeClass('menuDown');
    });
    $( "#menu-principal" ).toggle("slow",function(){
      $("#menu-btn").addClass('menuUp');
      $("#menu-btn").removeClass('menuDown');
      $("#informacion").removeClass('informacionUp');
    });
  });
});

