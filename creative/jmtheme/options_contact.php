<?php


$sitetheme = e107::getPref('sitetheme');
 
$options['contact']  = array(
  		'fields'    => array(
       'intro' => array(
        				'title' => 'Section Intro -  f.e. Glad to Talk With You <br> {LAYOUT_ELEMENT: layout=singlecontact&element=intro} ',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),
       'title' => array(
        				'title' => 'Section Title -  f.e. Contact Us <br> {LAYOUT_ELEMENT: layout=singlecontact&element=title} ',
                'type'  => 'text',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),
       'subtitle' => array(
        				'title' => 'Section Subtitle <br> {LAYOUT_ELEMENT: layout=singlecontact&element=subtitle} ',
                'type'  => 'textarea',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),               
                

       'adress' => array(
        				'title' => 'Section Subtitle <br> {LAYOUT_ELEMENT: layout=singlecontact&element=adress} ',
                'type'  => 'textarea',
                'writeParms' => array('size'=>'xxlarge'),
        				'inuse' => true
      					),               
                
      
       'map' => array(
        				'title' => 'Section Subtitle <br> {LAYOUT_ELEMENT: layout=singlecontact&element=map} ',
                'type'  => 'textarea',
                'writeParms' => array('size'=>'xxlarge',
                'post' => "<div class='bg-info' style='color: white;padding: 5px;'>Insert embed map directly. Just change width to 100% and height to 570px </div>"),
        				'inuse' => true
      					),               
                
       
      	), 
   );
?>