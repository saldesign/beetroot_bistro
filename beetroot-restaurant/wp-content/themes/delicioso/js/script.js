jQuery(document).ready(function($) {
//Disable no conflict in $document.ready
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


    $('input').on('change', function() {
      var input = $(this);
      if (input.val().length) {
        input.addClass('populated');
      } else {
        input.removeClass('populated');
      }
    });
    

    setTimeout(function() {
      $('#fname').trigger('focus');
    }, 500);

    $(window).scroll(function(){
      var winTop = $(window).scrollTop();
      if(winTop >= 60){
        $("header.main").addClass("sticky-header");
      }else{
        $("header.main").removeClass("sticky-header");
      }//if-else
    });//win func.
});//End document.ready 


