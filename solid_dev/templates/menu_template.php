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
 
    $MENU_TEMPLATE['image-only']['start'] 			= '{SETIMAGE: w=750&h=530&crop=1}<div class="cpage-menu {CMENUNAME}">';
	$MENU_TEMPLATE['image-only']['body'] 				= '{CMENUIMAGE}';
	$MENU_TEMPLATE['image-only']['end'] 				= '</div>'; 
	       
	$MENU_TEMPLATE['service']['start']   = ''; 
	$MENU_TEMPLATE['service']['body']    = '{CMENUICON} <h4>{CMENUTITLE} </h4> 
	    <p>{CMENUBODY}</p><p><br/><a class="btn btn-theme" href="{CPAGEBUTTON=href}">'.LAN_READ_MORE.'</a></p>'; 
	$MENU_TEMPLATE['service']['end']    = '';
	
	$MENU_TEMPLATE['testimonial']['start']   = ''; 
	$MENU_TEMPLATE['testimonial']['body']    = '{CMENUICON} <p>{CMENUBODY}</p> <h4><br/>{CMENUTITLE} </h4> 
	     																				<p>{CPAGETITLE}</p>'; 
	$MENU_TEMPLATE['testimonial']['end']   = '';

	$MENU_TEMPLATE['clients']['start'] 					= ' <h3>{CMENUTITLE} </h3>'; 
	$MENU_TEMPLATE['clients']['body'] 					= '{CMENUBODY}'; 
	$MENU_TEMPLATE['clients']['end'] 					= ''; 

