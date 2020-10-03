<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system - 
|
+----------------------------------------------------------------------------+
*/

if (!defined(("LAN_JM_ADMIN_HELP_01"))) { define("LAN_JM_ADMIN_HELP_01", "Help & Support"); } 
if (!defined(("LAN_JM_ADMIN_HELP_02"))) { define("LAN_JM_ADMIN_HELP_02", "The support forum for this plugin  is available on:  "); } 
if (!defined(("LAN_JM_ADMIN_HELP_03"))) { define("LAN_JM_ADMIN_HELP_03", "Support Forum"); } 
if (!defined(("LAN_JM_ADMIN_HELP_04"))) { define("LAN_JM_ADMIN_HELP_04", "There is documentation too. Something is missing or not clear? Create a question on the forum, we will add the answer asap.:   ");   } 
if (!defined(("LAN_JM_ADMIN_HELP_05"))) { define("LAN_JM_ADMIN_HELP_05", "Documentation");    } 
if (!defined(("LAN_JM_ADMIN_HELP_06"))) { define("LAN_JM_ADMIN_HELP_06", "Live preview:   ");   } 
if (!defined(("LAN_JM_ADMIN_HELP_07"))) { define("LAN_JM_ADMIN_HELP_07", "Demo");   } 
if (!defined(("LAN_JM_ADMIN_HELP_08"))) { define("LAN_JM_ADMIN_HELP_08", "Github repository:  ");  } 
if (!defined(("LAN_JM_ADMIN_HELP_09"))) { define("LAN_JM_ADMIN_HELP_09", "Github");  } 
if (!defined(("LAN_JM_ADMIN_HELP_10"))) { define("LAN_JM_ADMIN_HELP_10", "Download. Version on e107.org could be outdated. "); } 
if (!defined(("LAN_JM_ADMIN_HELP_11"))) { define("LAN_JM_ADMIN_HELP_11", "Download"); } 

 
define("LAN_JM_THEMEOPTIONS", "Theme Options");  //plugin name

define("LAN_JM_THEMEOPTIONS_01", "Theme Options");   
define("LAN_JM_THEMEOPTIONS_01_HELP", "Custom Css, Login Page + other");

define("LAN_JM_THEMEOPTIONS_02", "Custom CSS");      
define("LAN_JM_THEMEOPTIONS_02_01", "CSS Editor");      
define("LAN_JM_THEMEOPTIONS_02_01_HELP", '<p>Please add all your custom CSS here for simplier testing css changes. If you modify theme css directly, your changes will be lost in an upgrade.</p><p>Your custom CSS will be loaded after the theme\'s stylesheets, which means that your rules will take precedence.</p><p>Just add your CSS here for what you want to change, you don\'t need to copy all the theme\'s style.css content.</p>
<p>Be aware that you can add file with name custom_style.css and put your css changes there. This file is loaded as last file from theme files and it is not part of upgrade pack, so it will not be overriden with update.');


define("LAN_JM_THEMEOPTIONS_03", "Login Page Settings");  

define("LAN_JM_THEMEOPTIONS_03_01", "Display Login Page as standard page"); 
define("LAN_JM_THEMEOPTIONS_03_01_HELP", "OFF - only login box is displayed, ON - header and footer are displayed, tablerender is used"); 

define("LAN_JM_THEMEOPTIONS_03_02", "Hide SiteName"); 
define("LAN_JM_THEMEOPTIONS_03_02_HELP", "Hide Site Name on login page"); 

define("LAN_JM_THEMEOPTIONS_03_03", "Hide Logo"); 
define("LAN_JM_THEMEOPTIONS_03_03_HELP", "Hide Logo on login page"); 

define("LAN_JM_THEMEOPTIONS_03_04", "Set Width of Login Box"); 
define("LAN_JM_THEMEOPTIONS_03_04_HELP", "Set Max Width of login box (with px or %). Standard is 330px "); 

define("LAN_JM_THEMEOPTIONS_04", "TeamMembers Settings");  
define("LAN_JM_THEMEOPTIONS_04_01", "Teammember class"); 
define("LAN_JM_THEMEOPTIONS_04_01_HELP", "Select userclass of members you want to display as team"); 