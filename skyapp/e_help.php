<?php

		$content = '';
		$links = array();
		$links['supportforum']    =  "https://www.e107sk.com/forum/themes-in-active-mode/";
		$links['documentation']   =  "";	
		$links['demo']            =  "https://www.e107sk.com/demo/skyapp/";	
		$links['github']          =  "https://github.com/Jimmi08/e107-skyapp-bootstrap-theme";	    
		$links['download']        =  "https://www.e107sk.com/download/59/skyapp-e107-free-theme/";    
    
    	$content .= '<h2 class="text-center">' . LAN_JM_ADMIN_HELP_01 . '</h2>';
      
		$content .= '<p class="text-center">' . LAN_JM_ADMIN_HELP_02 . '</p>';
		$content .= '<p class="text-center">';
		$content .= '<a href="'.$links['supportforum'].'" target="_blank">' . LAN_JM_ADMIN_HELP_03. '</a>';
		$content .= '</p>';



		$content .= '<p class="text-center">' . LAN_JM_ADMIN_HELP_04 . '</p>';
		$content .= '<p class="text-center">';
		$content .= '<a href="'.$links['documentation'].'" target="_blank">' . LAN_JM_ADMIN_HELP_05. '</a>';
		$content .= '</p>';
 
		$content .= '<p class="text-center">' . LAN_JM_ADMIN_HELP_06 . '</p>';
		$content .= '<p class="text-center">';
		$content .= '<a href="'.$links['demo'].'" target="_blank">' . LAN_JM_ADMIN_HELP_07. '</a>';
		$content .= '</p>';
    
		$content .= '<p class="text-center">' . LAN_JM_ADMIN_HELP_08 . '</p>';
		$content .= '<p class="text-center">';
		$content .= '<a href="'.$links['github'].'" target="_blank">' . LAN_JM_ADMIN_HELP_09. '</a>';
		$content .= '</p>';
    
		$content .= '<p class="text-center">' . LAN_JM_ADMIN_HELP_10 . '</p>';
		$content .= '<p class="text-center">';
		$content .= '<a href="'.$links['download'].'" target="_blank">' . LAN_JM_ADMIN_HELP_11. '</a>';
		$content .= '</p>';
    
    

		$helplink_text = array(
			'title' => LAN_JM_ADMIN_HELP_01,
			'body'  => $content,
		);

    $helptext = $content;
    //$helptext = e107::getRender()->tablerender($helplink_text['title'], $helplink_text['body'], 'hduhelp');

?>
