$(document).ready(function() {
//Add class js and set variables
  $('body').addClass('js');
  var $menulink = $('.menu-link'),
  $mainnav = $('.main-nav');
  
//Menu Click Icon Switch
  $menulink.click(function() {
   $(this).toggleClass('active');
   $mainnav.toggleClass('active');
   if($(this).hasClass('active')){
    	$(this).removeClass('icon-menu').addClass('icon-cancel')
	  }else{
	    $(this).removeClass('icon-cancel').addClass('icon-menu');			
	  }
	  return false;
	});//End menulink.click
});//End document.ready 
