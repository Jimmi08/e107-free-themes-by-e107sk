<?php


#### Panel Template - Used by menu_class.php  for Custom Menu Content. 


	$MENU_TEMPLATE['default']['start'] 					= ''; 
	$MENU_TEMPLATE['default']['body'] 					= '{CMENUBODY}'; 
	$MENU_TEMPLATE['default']['end'] 					= ''; 

/*	$MENU_TEMPLATE['button']['start'] 					= '<div class="cpage-menu">'; 
	$MENU_TEMPLATE['button']['body'] 					= '<div>{CMENUBODY}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['button']['end'] 					= '</div>'; 

	### Additional control over image thumbnailing is possible via SETIMAGE e.g. {SETIMAGE: w=200&h=150&crop=1}
	$MENU_TEMPLATE['buttom-image']['start'] 			= '<div class="cpage-menu">'; 
	$MENU_TEMPLATE['buttom-image']['body'] 				= '<div>{CMENUIMAGE}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['buttom-image']['end'] 				= '</div>'; 
	<div class="get-quote" style="background-image: url('images/demo/quote.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="get-quote-text">FAST AND RELIABLE SERVICE FOR YOUR PROJECT OR A QUICK FIX, WE DO IT ALL!</div>
                        </div>
                        <div class="col-md-2"> <a href="contact-us.html" class="btn btn-md style-1">GET A QUOTE</a> </div>
                    </div>
                </div>
            </div>
			 */

 
	$MENU_TEMPLATE['get-the-quote']['start'] 	= ''; 
	$MENU_TEMPLATE['get-the-quote']['body'] 	= '		
<div class="get-quote" style="background-image: url({CMENUIMAGE=url});" >
  <div class="container">
      <div class="row">
          <div class="col-md-10">
              <div class="get-quote-text">{CMENUBODY}</div>
          </div>
          <div class="col-md-2"> <a href="{CMENUURL}" class="btn btn-md style-1">{CMENUTITLE}</a> </div>
      </div>
   </div>
</div>';
 
	$MENU_TEMPLATE['get-the-quote']['end'] 	= '';
         
	$MENU_TEMPLATE['what-we-do']['start'] 	= ' {SETIMAGE: w=722&h=368&crop=1}
<div class="section bg-gray">                    
	<div class="container">                        
		<div class="row">                            
			<div class="col-md-12">                                
				<div class="testimonials testimonials-style-1">                                    
					<div class="testimonials-header">                                        
						<h3 class="title">{CHAPTER_NAME}</h3>                                    
					</div>                                
				</div>                            
			</div>  	
			<div class="container">    		
				<div class="row">'; 
	$MENU_TEMPLATE['what-we-do']['body'] 	= '		
<div class="col-md-4">    
	<div class="featured featured-has-link featured-has-icon featured-has-content">        
		<div class="featured-header">
			<img alt="{CMENUTITLE} " src="{CMENUIMAGE=url}">
		</div>        
		<div class="featured-content">            
			<h3 class="featured-title text-uppercase">
				<i class="fa fa-{CMENUICON=css}"></i>{CMENUTITLE}</h3>            
			<p class="featured-desc">{CMENUBODY}</p>						
			<a class="btn btn-md btn-minimal" href="{CPAGEURL}">'.LAN_MORE.'</a>
		</div>    
	</div>    
	<div class="empty-space" style="height: 40px">
	</div>  
</div>';
 
	$MENU_TEMPLATE['what-we-do']['end'] 	= '	 				</div>	
			</div>
		</div>
	</div>                 
</div> 
 ';
	
	
 $MENU_TEMPLATE['home-tests']['start'] 	= '
 
'; 

	$MENU_TEMPLATE['home-tests']['body'] 	= ' 
        
<li class="clearfix row">
    <div class="user pull-left">
        <div class="user-image"><img class="user-photo" src="{CMENUIMAGE=url}" alt="{CPAGETITLE}"></div>
        <div class="content pull-left">
            <h3 class="name-user">{CPAGETITLE}</h3>
            <h4 class="jobtitle">{CMENUTITLE}</h4>
            <p>{CMENUBODY}</p>
        </div>
    </div>
</li>';
                                            
 


	/* doesn't work, owl is not loaded full, put in theme.php */
		$MENU_TEMPLATE['home-tests']['end'] 	= ''; 
		
 /*  used CPAGETITLE, because CMENUBODY added <p> tags inside h3 */
	$MENU_TEMPLATE['video-text']['start'] 					= '<div class="container">'; 
	$MENU_TEMPLATE['video-text']['body'] 					= '<div class="video-captions text-center"><h2 class="hero-title hero-title-lg">{CMENUTITLE}</h2>
	<h3 class="hero-title hero-title-sm">{CMENUBODY}</h3></div>'; 
	$MENU_TEMPLATE['video-text']['end'] 					= '</div>';
	
	
	$MENU_TEMPLATE['history']['start'] 	= '                
	<section class="section no-top-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title text-uppercase">{CHAPTER_NAME}</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="timeline">'; 
	$MENU_TEMPLATE['history']['body'] 	= '		
  <div class="timeline-item">
      <div class="timeline-year">{CMENUNAME}</div>
      <div class="timeline-content">
          <h3 class="timeline-title">{CMENUTITLE}</h3>
          <div class="timeline-text">{CMENUBODY}</div>
      </div>
  </div>';
 
	$MENU_TEMPLATE['history']['end'] 	= '</div>
                            </div>
                        </div>
                    </div>
                </section>'; 
  
?>