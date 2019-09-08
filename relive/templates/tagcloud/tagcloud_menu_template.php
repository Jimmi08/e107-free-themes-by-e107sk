<?php
$TAGCLOUD_MENU_TEMPLATE = array();
         /* 
$TAGCLOUD_MENU_TEMPLATE['default']['caption']       = '{TAGCLOUD_MENU_CAPTION}';
$TAGCLOUD_MENU_TEMPLATE['default']['start']       = '<div class="tagcloud-menu">';
$TAGCLOUD_MENU_TEMPLATE['default']['item']       = "<a class='tag' href='{TAG_URL}'><span class='size{TAG_SIZE}'>{TAG_NAME}</span></a>";
$TAGCLOUD_MENU_TEMPLATE['default']['end']       = '<div style="clear:both"></div></div>';
       */
   
$TAGCLOUD_MENU_TEMPLATE['default']['caption']   = '{TAGCLOUD_MENU_CAPTION}';
$TAGCLOUD_MENU_TEMPLATE['default']['start']     = '<ul>';
$TAGCLOUD_MENU_TEMPLATE['default']['item']      = '<li><a href="{TAG_URL}">{TAG_NAME}</a></li>';
$TAGCLOUD_MENU_TEMPLATE['default']['end']       = '</ul>';
 