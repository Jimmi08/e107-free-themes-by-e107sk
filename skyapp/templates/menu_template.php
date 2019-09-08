<?php


#### Panel Template - Used by menu_class.php  for Custom Menu Content. 


	$MENU_TEMPLATE['default']['start'] 					= ''; 
	$MENU_TEMPLATE['default']['body'] 					= '{CMENUBODY}'; 
	$MENU_TEMPLATE['default']['end'] 					= ''; 

	$MENU_TEMPLATE['button']['start'] 					= '<div class="cpage-menu">'; 
	$MENU_TEMPLATE['button']['body'] 					= '<div>{CMENUBODY}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['button']['end'] 					= '</div>'; 

	### Additional control over image thumbnailing is possible via SETIMAGE e.g. {SETIMAGE: w=200&h=150&crop=1}
	$MENU_TEMPLATE['buttom-image']['start'] 			= '<div class="cpage-menu">'; 
	$MENU_TEMPLATE['buttom-image']['body'] 				= '<div>{CMENUIMAGE}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['buttom-image']['end'] 				= '</div>'; 

  /*
  <h3><i class="fa fa-check"></i> Sleek</h3>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pharetra varius maximus. Cras condimentum porttitor enim a egestas. Suspendisse potenti
						</p>
						<a href="#" class="btn btn-default">Read More</a>
            */
	$MENU_TEMPLATE['title-body-button']['start'] 			= '<h3><i class="fa fa-check"></i> {CMENUTITLE}</h3>'; 
	$MENU_TEMPLATE['title-body-button']['body'] 			= '<p>{CMENUBODY}</p>';
	$MENU_TEMPLATE['title-body-button']['end'] 				= '{CPAGEBUTTON: class=btn btn-default}'; 
  
  /*
  <i class="fa fa-html5 fa-primary fa-6 fa-border"></i>
						<h3 class="heading-primary">Lorem Ipsum</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pharetra varius maximus.</p>
            */
	$MENU_TEMPLATE['icon-title-body']['start'] 			= '<i class="fa {CMENUICON=css} fa-primary fa-6 fa-border"></i>'; 
	$MENU_TEMPLATE['icon-title-body']['body'] 				= '<h3 class="heading-primary">{CMENUTITLE}</h3><p>{CMENUBODY}</p>';
	$MENU_TEMPLATE['icon-title-body']['end'] 				= '';   

  /*
  				<div class="col-md-6">
					<h2 class="page-header">Use <span class="em-primary">SkyApp</span> on All Devices</h2>
					<ul class="list list-feature">
						<li><i class="fa fa-check fa-6 fa-primary"></i> <span>Lorem ipsum dolor</span></li>
						<li><i class="fa fa-check fa-6 fa-primary"></i> <span>Lorem ipsum dolor</span></li>
						<li><i class="fa fa-check fa-6 fa-primary"></i> <span>Lorem ipsum dolor</span></li>
						<li><i class="fa fa-check fa-6 fa-primary"></i> <span>Lorem ipsum dolor</span></li>
					</ul>
					<br>
					<a href="#" class="btn btn-primary btn-lg">Read More</a>
				</div>
				<div class="col-md-6">
					<img class="device" src="img/device-imac.png">
				</div>
        */
	$MENU_TEMPLATE['2-column_1:1_text-left']['start'] 	= '{SETIMAGE: w=700}'; 
	$MENU_TEMPLATE['2-column_1:1_text-left']['body'] 	= '{SETSTYLE=none}	
        <div class="col-md-6">
					<h2 class="page-header">{CMENUTITLE}</h2>
					{CMENUBODY}
					<br>
					{CPAGEBUTTON: class=btn btn-primary btn-lg}  
				</div>
				<div class="col-md-6">
					{CMENUIMAGE: class=device}
				</div>
													       '; 
	$MENU_TEMPLATE['2-column_1:1_text-left']['end'] 	= ''; 
	
	/*
  	<div class="col-md-6">
					<img class="device device-small" src="img/device-iphone.png">
				</div>
				<div class="col-md-6">
					<h2 class="page-header">Try SkyApp For 30 Days FREE!</h2>
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit Phasellus et odio.</p>
					<a href="#" class="btn btn-lg btn-default btn-rounded">Start Trial</a>
				</div>
        */
        
	$MENU_TEMPLATE['2-column_1:1_text-right']['start'] = '{SETIMAGE: w=330}'; 
	$MENU_TEMPLATE['2-column_1:1_text-right']['body'] 	= '
    	<div class="col-md-6">
					{CMENUIMAGE: class=device device-small}
				</div>
				<div class="col-md-6">
					<h2 class="page-header">{CMENUTITLE}</h2>
					<p class="lead">{CMENUBODY} </p>
					{CPAGEBUTTON: class=btn btn-lg btn-default btn-rounded}
				</div>'; 		
        
	$MENU_TEMPLATE['welcome']['start'] = '{SETIMAGE: w=330}{SETSTYLE=none}'; 
	$MENU_TEMPLATE['welcome']['body'] 	= '<h1>{CMENUTITLE}</h1>
    	<p class="lead">{CMENUBODY} </p>
					{CPAGEBUTTON: class=btn btn-primary btn-lg btn-rounded}
			 ';              
	$MENU_TEMPLATE['welcome']['end'] 	= ''; 
          
	$MENU_TEMPLATE['title-only']['start'] = ''; 
	$MENU_TEMPLATE['title-only']['body'] 	= '{CMENUTITLE}';              
	$MENU_TEMPLATE['title-only']['end'] 	= '';
  
   
	$MENU_TEMPLATE['2-column_2:1_text-left']['start'] 	= ''; 
	$MENU_TEMPLATE['2-column_2:1_text-left']['body'] 	= '			
													       <div class="cpage-menu col-lg-8 col-md-8"><h4>{CMENUICON}{CMENUTITLE}</h4>{CMENUBODY}</div>
													       <div class="cpage-menu col-lg-4 col-md-4">
													       <a class="btn btn-lg btn-primary pull-right" href="{CPAGEBUTTON=href}">'.LAN_READ_MORE.'</a>
													       </div>
													       '; 
	$MENU_TEMPLATE['2-column_2:1_text-left']['end'] 	= '';  
  
 
 
 
       
         
	
	
?>