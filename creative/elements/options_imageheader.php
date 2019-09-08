<?php
$options['imageheader']  = array(
      "section_name"=> 'Image header  {ELEMENTS: mode=imageheader&template=presentation}',
      "section_message"=> ' ',
      "items"    => 0,
  		'fields'    => array(
       'section_intro' => array(
        				'title' => 'Small intro text <span>by </span>Creative Tim {SECTION_INTRO}',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => false
      					),
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
        				'inuse' => true
      					),  
  		 'section_bgimage' =>array(
        				'title' => 'Background image {SECTION_BGIMAGE}',
                'type'  => 'image',
                'writeParms' => array('size'=>'xlarge'),
        				'inuse' => true
      					),
       'section_text' =>array(
        				'title' => 'Button text  {SECTION_TEXT}',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),  
       'section_url' =>array(
        				'title' => 'Button link {SECTION_URL}',
                'type'  => 'url',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),   
  ),
   );
?>