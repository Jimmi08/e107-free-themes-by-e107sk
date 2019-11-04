<?php
/*
* Copyright (c) 2012 e107 Inc e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
* $Id: e_shortcode.php 12438 2011-12-05 15:12:56Z secretr $
*
* Navigation Template 
*/
 
// footer column links - vertical navigation , 1 level
$NAVIGATION_TEMPLATE["alt"]["start"] 				=  '<ul class="flat2">';
$NAVIGATION_TEMPLATE["alt"]["item"] 					= '<li><a  href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">{LINK_ICON}{LINK_NAME}</a></li>';
$NAVIGATION_TEMPLATE["alt"]["item_submenu"] 			= '<li><a  href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">{LINK_ICON}{LINK_NAME}</a></li> ';
$NAVIGATION_TEMPLATE["alt"]["item_active"] 			= '<li><a class=" active" href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">{LINK_ICON}{LINK_NAME}</a></li> ';
$NAVIGATION_TEMPLATE["alt"]["end"] 					= "</ul>";
$NAVIGATION_TEMPLATE["alt"]["submenu_start"] 		= "";
$NAVIGATION_TEMPLATE["alt"]["submenu_item"]			= "";
$NAVIGATION_TEMPLATE["alt"]["submenu_loweritem"] 	= "";
$NAVIGATION_TEMPLATE["alt"]["submenu_item_active"] 	= "";
$NAVIGATION_TEMPLATE["alt"]["submenu_end"] 			= "";
 
$NAVIGATION_TEMPLATE["footer"] =  $NAVIGATION_TEMPLATE["alt"];
$NAVIGATION_TEMPLATE["main"] =  $NAVIGATION_TEMPLATE["alt"];


?>