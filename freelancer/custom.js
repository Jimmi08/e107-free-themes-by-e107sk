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
  
    $('span.badge').each(function() {
      	 $(this).addClass('badge-primary');
	  } );   
	  
	$('ul.login-menu-logged').addClass('flex-column');
	
	$('ul.login-menu-logged').find('li ').each(function() {
		$(this).addClass('nav-item');
	} ); 

	$('ul.login-menu-logged').find(' li a ').each(function() {
		$(this).addClass('nav-link');
	} );	  
});
 