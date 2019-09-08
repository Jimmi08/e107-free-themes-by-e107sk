<?php
	/**
	 * e107 website system
	 *
	 * Copyright (C) 2008-2017 e107 Inc (e107.org)
	 * Released under the terms and conditions of the
	 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
	 *
	 */


	/**
	 * {XURL_ICONS} template
	 */
	 $SOCIAL_XURL_TEMPLATE['default']['start'] = '<ul class="socials-about">';
	 $SOCIAL_XURL_TEMPLATE['default']['item'] = '
   <li><a href="{XURL_ICONS_HREF}" target="_blank"  title="{XURL_ICONS_TITLE}"><i class="fa fa-{XURL_ICONS_ID}"></i></a></li>';
 
	 $SOCIAL_XURL_TEMPLATE['default']['end'] = '</ul>';

   /*
               <div class="socials-widget">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
            */                                                   
	 $SOCIAL_XURL_TEMPLATE['footer']['start'] = '<div class="socials-widget"><ul>';
	 $SOCIAL_XURL_TEMPLATE['footer']['item'] = '<li><a href="{XURL_ICONS_HREF}" target="_blank" title="{XURL_ICONS_TITLE}><i class="fa fa-{XURL_ICONS_ID}"></i></a></li>';
	 $SOCIAL_XURL_TEMPLATE['footer']['end'] = '</ul></div>';