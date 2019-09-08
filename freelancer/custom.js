$(document).ready(function() {
    // hide #back-top first
    $("#back-top").hide();
    
    
    $('.forum-viewtopic').find('ul.dropdown-menu li').each(function() {
  	 $(this).addClass('dropdown-item');
  	} ); 
    
    $('.forum-viewtopic').find('ul.dropdown-menu').each(function() {
  	 $(this).addClass('dropdown-menu-right');
  	} );     
    
    $('#forum-viewforum').find('ul.dropdown-menu').each(function() {
  	 $(this).addClass('dropdown-menu-right');
  	} );  
    
    
    $('ul.pagination').find('li').each(function() {
  	 $(this).addClass('page-item');
  	} );
    
    $('ul.pagination').find('a').each(function() {
  	 $(this).addClass('page-link');
  	} );
    
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    }); 

    $('span.badge').each(function() {
      	 $(this).addClass('badge-primary');
  	} );               
});
 