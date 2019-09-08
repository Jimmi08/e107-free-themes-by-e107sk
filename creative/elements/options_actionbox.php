<?php
  $options['actionbox']  = array(
      "section_name"=> 'Action box {ELEMENTS: mode=actionbox&template=actionbox}',
      "section_message"=> 'Action box with background image',
      "items"    => 0,
  		'fields'    => array(
       'section_title' => array(
        				'title' => 'Section Heading -  f.e. Want to get started with us? {SECTION_TITLE}',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),
       'section_subtitle' =>  array(
        				'title' => 'Section description {SECTION_SUBTITLE}',
                'type'  => 'textarea',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),  
  		 'section_bgimage' =>array(
        				'title' => 'Background image {SECTION_BGIMAGE}',
                'type'  => 'image',
                'writeParms' => array('size'=>'xlarge'),
        				'inuse' => true
      					), 
       'button_text' =>array(
        				'title' => 'Button text f.e. Contact us {BUTTON_TEXT}',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),  
       'button_url' =>array(
        				'title' => 'Button url f.e {e_BASE}contact.php {BUTTON_URL}',
                'type'  => 'url',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),
    ),
   );
?>