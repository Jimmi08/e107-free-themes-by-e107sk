<?php 

$options['services']  = array(
 
  		'fields'    => array(
       'section_title' => array(
        				'title' => 'h2 Section Heading {SECTION_TITLE}',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),
       'section_subtitle' =>  array(
        				'title' => 'Section description {SECTION_SUBTITLE}',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => false
      					),  
   		 'section_bgimage' =>array(
        				'title' => 'Background image {SECTION_BGIMAGE}',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => false
      					),      
      ),
 
  		"item_values" => array(
  				'service_icon' =>array(
        				'title' => 'Icon (insert icon full name) {SERVICE_ICON}',
                'type'  => 'text',
                'writeParms' => array('size'=>'xlarge'),
        				'inuse' => true
      					),
  				'service_title' =>array(
        				'title' => 'Short title {SERVICE_TITLE}',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),   
  				'service_desc' =>array(
        				'title' => 'Small description {SERVICE_DESC}',
                'type'  => 'textarea',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),                    
  			),
      );
      

?>