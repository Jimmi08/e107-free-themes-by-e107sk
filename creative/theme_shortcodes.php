<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * e107 Bootstrap Theme Shortcodes. 
 *
*/


class theme_shortcodes extends e_shortcode
{

	//needed for theme {THEME_PM_NAV}
    private $pm_prefs       = null;
    private $pm             = null;
    private $userReg        = false;
    
    //needed for variable header+footer
    private $sitetheme       = ''; 
    private $file_extension = '';
    
    function __construct()
    {
		//needed for theme {THEME_PM_NAV}
		if( e107::isInstalled('pm') )
        {
            e107::includeLan(e_PLUGIN.'pm/languages/'.e_LANGUAGE.'.php');
            require_once(e_PLUGIN."pm/pm_func.php");
    
            $this->pm = new pmbox_manager();      
            $this->pm_prefs = $this->pm->prefs();	
        }
        
        //needed for variable header+footer
        $this->sitetheme = e107::getPref('sitetheme');
        $this->file_extension = '.html';
        if(e107::isInstalled('jmtheme')) 
        {
          $where = 'layout_theme = "'.$this->sitetheme.'" AND layout_mode = "'.THEME_LAYOUT.'" LIMIT 1 ';
          $this->customlayout = e107::getDb()->retrieve('jmlayout', '*', $where ); 
        }
             
    }
    
	/**
	 * Special Header Shortcode for dynamic menuarea templates.
	 * @shortcode {---HEADER---}
	 * @return string
	 */
	function sc_header()
	{    
		$header = varset( $this->customlayout['layout_header'] , "header_default");	  
		$headerpath = e_THEME. $this->sitetheme.'/headers/'.$header. $this->file_extension;
         
		if(file_exists($headerpath)) {    
			$text = file_get_contents($headerpath);    	 
        } 
	    else $text = '';    
		return $text;
    }		
  
	/**
	 * Special Footer Shortcode for dynamic menuarea templates.
	 * @shortcode {---FOOTER---}
	 * @return string
	 */
	function sc_footer()
	{
		$footer = varset( $this->customlayout['layout_footer'] , "footer_default");
		$footerpath = e_THEME. $this->sitetheme.'/footers/'.$footer.$this->file_extension;
		if(file_exists($footerpath)) {
		    $text = file_get_contents($footerpath);   
		} 
        else $text = '';
		return $text;
   }
   
   
   
   	/* {THEME_PM_NAV} */
	function sc_theme_pm_nav($parm = NULL)
	{
		$tp = e107::getParser();

		if(!check_class($this->pm_prefs['pm_class']))
		{
			return null;
		}
		
		$mbox = $this->pm->pm_getInfo('inbox');
	
		if(!empty($mbox['inbox']['new']))
		{
			$count = " <span class='badge badge-square badge-primary'> ".$mbox['inbox']['new']."</span>";
			$class = '';
			$icon = '<i class="fa fa-envelope"></i>';
		}
		else
		{
			$class = '';
			$icon = '<i class="fa fa-envelope"></i>';
			$count = '';
		}

		$urlInbox = e107::url('pm','index','', array('query'=>array('mode'=>'inbox')));
		$urlOutbox = e107::url('pm','index','', array('query'=>array('mode'=>'outbox')));
		$urlCompose = e107::url('pm','index','', array('query'=>array('mode'=>'send')));

		return '
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle '.$class.'"  data-toggle="dropdown" href="#">'.$icon.$count.'</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="'.$urlInbox.'">'.LAN_PLUGIN_PM_INBOX.'</a>
				<a class="dropdown-item" href="'.$urlOutbox.'">'.LAN_PLUGIN_PM_OUTBOX.'</a>
				<a class="dropdown-item" href="'.$urlCompose.'">'.LAN_PLUGIN_PM_NEW.'</a>
			</div></li>';
	}	
   
}






