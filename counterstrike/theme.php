<?php
/**
 * Bootstrap 3 Theme for e107 v2.x
 */
if (!defined('e107_INIT')) { exit; }

define("BOOTSTRAP", 	3);
define("FONTAWESOME", 	4);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");

if((strpos(e_REQUEST_URI, 'login') !== false)) {define('e_IFRAME','0');} 
/* @see https://www.cdnperf.com */
// Warning: Some bootstrap CDNs are not compiled with popup.js
// use https if e107 is using https.

e107::js("url", 			"https://cdn.jsdelivr.net/bootstrap/3.3.7/js/bootstrap.min.js", 'jquery', 2);
//e107::css('theme',    'css/bootstrap.min.css');
e107::css('url', 'https://cdn.jsdelivr.net/bootstrap/3.3.7/css/bootstrap.min.css');
e107::css('url',    'https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css');

e107::css('theme', 'css/style.css');
e107::css('theme', 'templates/forum/style_forums.css');

$inlinecss = e107::pref('counterstrike', 'inlinecss');
if($inlinecss) { 
	e107::css("inline", $inlinecss);
}

e107::js("footer-inline", 	" $('.e-tip').tooltip({container: 'body'})
  $(document).ready(function(){
        $('#mainPitch').click(function(){
            $('#mynav').slideToggle();
        });
    });


"); // activate bootstrap tooltips. 


$inlinejs = e107::pref('counterstrike', 'inlinejs');
if($inlinejs) { 
	e107::js("footer-inline", $inlinejs);
}


// Legacy Stuff.
define('OTHERNEWS_COLS',false); // no tables, only divs. 
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS',false); // no tables, only divs. 
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
define('COMMENTLINK', 	e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');

define('PRE_EXTENDEDSTRING', '<br />');

/**
 * @param string $caption
 * @param string $text
 * @param string $id : id of the current render
 * @param array $info : current style and other menu data. 
 */
function tablestyle($caption, $text, $id='', $info=array()) 
{
//	global $style; // no longer needed. 
	
	$style = $info['setStyle'];
	
	echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
	
	$type = $style;
	if(empty($caption))
	{
		$type = 'box';
	}
	
	if($style == 'navdoc' || $style == 'none')
	{
		echo $text;
		return;
	}
	
	if($style == 'jumbotron')
	{
		echo '<div class="jumbotron">
      	<div class="container">';
        	if(!empty($caption))
	        {
	            echo '<h1>'.$caption.'</h1>';
	        }
        echo '
        	'.$text.'
      	</div>
    	</div>';	
		return;
	}
	
	if($style == 'col-md-4' || $style == 'col-md-6' || $style == 'col-md-8')
	{
		echo ' <div class="col-xs-12 '.$style.'">';
		
		if(!empty($caption))
		{
            echo '<h2>'.$caption.'</h2>';
		}

		echo '
          '.$text.'
        </div>';
		return;	
		
	}
		
	if($style == 'menu')
	{
		echo '<div class="panel panel-default">
	  <div class="panel-heading">'.$caption.'</div>
	  <div class="panel-body">
	   '.$text.'
	  </div>
	</div>';
		return;
		
	}	
	
 
	if($style == 'blockleft')
	{
	echo '<div class="col-md-12 col-sm-6">			  				 
				<table class="leftblock" cellspacing="0" cellpadding="0" border="0">					 	
					<tbody>		
						<tr>                    	 			
							<td colspan="2" class="blocktitle_a">&nbsp;</td>                      	 			
							<td   class="blocktitle_b">   			
								<span class="blocktitle" >'.$caption.'</span></td>                   	   			
							<td colspan="2" class="blocktitle_c">&nbsp;</td>                  		
						</tr>	 						 		
						<tr>	 							 			  
							<td   class="blockcontent_a">  </td>				
								<td  colspan="3" class="blockcontent_b">'.$text.'</td>							 				
								<td   class="blockcontent_c"> 	</td>						 						 		
						</tr>		
						<tr>                    	 			
							<td  colspan="2" class="blockfooter_a">&nbsp;</td>                      	 			
							<td  class="blockfooter_b">	&nbsp; </td>                   	   			
							<td colspan="2" class="blockfooter_c">&nbsp;</td>                  		
						</tr>							 						  					 	
					</tbody>				 
				</table>
				<br>
			</div>';
		return;		
	}	
	
	if($style == 'blockright')
	{
		echo '
		<div class="col-md-12 col-sm-6">			  				 
			<table class="rightblock" cellspacing="0" cellpadding="0" border="0">					 	
				<tbody>		
					<tr>                    	 			
						<td colspan="2" class="blocktitle_a"></td>                      	 			
						<td   class="blocktitle_b">   			
							<span class="blocktitle" >'.$caption.'</span></td>                   	   			
						<td colspan="2" class="blocktitle_c">	</td>                  		
					</tr>	 						 		
					<tr>	 							 			  
						<td  class="blockcontent_a"> </td> 				
							<td  colspan="3" class="blockcontent_b">'.$text.'</td>							 				
							<td   class="blockcontent_c"> </td>							 						 		
					</tr>		
					<tr>                    	 			
						<td  colspan="2" class="blockfooter_a"></td>                      	 			
						<td  class="blockfooter_b">	&nbsp; </td>                   	   			
						<td colspan="2" class="blockfooter_c"></td>                  		
					</tr>							 						  					 	
				</tbody>				 
			</table>
			<br>
		</div>	';
		return;		
	}	
	
	if($style == 'portfolio')
	{
		 echo '
		 <div class="col-lg-4 col-md-4 col-sm-6">
            '.$text.'
		</div>';	
		return;
	}

	if($style == 'notitle')
	{
   	echo $text;	
		return;
	}

	// default.

	if(!empty($caption))
	{
		echo '<h2 class="caption">'.$caption.'</h2>';
	}
	echo $text;
				
	return;
		
}
$tp = e107::getParser();
/* content of footer block */
$foot1 = e107::pref('counterstrike', 'foot1');
$foot2 = e107::pref('counterstrike', 'foot2');
$foot3 = e107::pref('counterstrike', 'foot3');

// applied before every layout.
$LAYOUT['_header_'] = '
<div class="container">	
	<div class="row">     	
	{SETSTYLE=notitle}  
	{FEATUREBOX}	  	
	</div>     
</div>
<div class="container"  id="mynav">	
	<div class="row">    	
		<div class="col-md-12 col-sm-12">			  				  		
			<table class="footerblock" cellspacing="0" cellpadding="0" border="0">					 	 			
				<tbody>		 				
					<tr>                    	 			 					
						<td class="blocktitle_a">&nbsp;</td>                      	 			 					
						<td class="blocktitle_b">&nbsp;</td>                   	   			 					
						<td class="blocktitle_c">&nbsp;</td>   					
						<td class="blocktitle_d">&nbsp;</td>					
						<td class="blocktitle_e">&nbsp;</td>                		 				
					</tr>	 						 		 				
					<tr>	 							 			   					
						<td   class="blockcontent_a"> &nbsp; </td>				 					
						<td  colspan="3" class="blockcontent_b">			  
							<div class="navbar " role="navigation">               
								<div class="navbar-header">          
									<a class="navbar-brand" href="{SITEURL}">{BOOTSTRAP_BRANDING}</a>          
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">            
										<span class="sr-only">Toggle navigation
										</span>            
										<i class="fa fa-bars fa-2x fa-inverse"></i>          
									</button>                   
								</div>        
								<div class="navbar-collapse collapse {BOOTSTRAP_NAV_ALIGN}">        	
								{NAVIGATION=main}          	
								{BOOTSTRAP_USERNAV: placement=top}         
								</div>
								<!--/.navbar-collapse -->      
							</div>     	 			 	 					</td>							 				 					
						<td class="blockcontent_c"> &nbsp;</td>							 						 		 				
					</tr>		 				
					<tr>                    	 			 					
						<td class="blockfooter_a">&nbsp;</td>                      	 			 					
						<td class="blockfooter_b">&nbsp;</td>                   	   			 					
						<td class="blockfooter_c">&nbsp;</td>   					
						<td class="blockfooter_d">&nbsp;</td>					
						<td class="blockfooter_e">&nbsp;</td>                   	   			                  		 				
					</tr>							 						  					 	 			
				</tbody>				  		
			</table>		
			<br>	
		</div>	
	</div>  
</div>

';

// applied after every layout. 
$LAYOUT['_footer_'] = '
<div class="container">
	<div class="row">    
	<div class="col-md-12 col-sm-12">			  				 
		<table class="footerblock" cellspacing="0" cellpadding="0" border="0">					 	
			<tbody>		
				<tr>                    	 			
					<td class="blocktitle_a">&nbsp;</td>                      	 			
					<td class="blocktitle_b">&nbsp;</td>                   	   			
					<td class="blocktitle_c">&nbsp;</td>  
					<td class="blocktitle_d">&nbsp;</td>
					<td class="blocktitle_e">&nbsp;</td>                		
				</tr>	 						 		
				<tr>	 							 			  
					<td   class="blockcontent_a"> &nbsp; </td>				
					<td  colspan="3" class="blockcontent_b">
					 <div class="row">
					 	<div class="col-md-12 text-center">'.$tp->toHtml($foot1, true, 'BODY').'</div>
					 	<div class="col-md-12 text-center">'.$tp->toHtml($foot2, true, 'BODY').'</div>				 	
					 	<div class="col-md-12 text-center">'.$tp->toHtml($foot3, true, 'BODY').'</div>	
					</div>			 	
					</td>							 				
					<td   class="blockcontent_c"> &nbsp;</td>							 						 		
				</tr>		
				<tr>                    	 			
					<td class="blockfooter_a">&nbsp;</td>                      	 			
					<td class="blockfooter_b">&nbsp;</td>                   	   			
					<td class="blockfooter_c">&nbsp;</td>  
					<td class="blockfooter_d">&nbsp;</td>
					<td class="blockfooter_e">&nbsp;</td>                   	   			                  		
				</tr>							 						  					 	
			</tbody>				 
		</table>
	  </div>
	</div> 
</div>
';



// $LAYOUT is a combined $HEADER and $FOOTER, automatically split at the point of "{---}"
$LAYOUT['homepage'] =  ' 				
<div class="container"> 
	<div class="row">       
		<div class="col-md-3 col-xs-12">   
			<div class="row">	  
			{SETSTYLE=blockleft}  	   
			{MENU=1} 	   
			</div>    
		</div>      
		<div class="col-md-6 col-xs-12">  
			{ALERTS}   
			{SETSTYLE=default}     
			<div class="row">      
				<div class="col-xs-12">  		  
				{MENU=3}   		  
				</div>      
				<div class="col-xs-12">  		  
				{WMESSAGE}   		  
				</div>      
				<div class="col-xs-12">  		  
				{MENU=4}   		  
				</div>		   		
				{SETSTYLE=default} 			
				{---} 		
			</div>  	
		</div>  
		<div class="col-md-3 col-xs-12">     
			<div class="row">  
			{SETSTYLE=blockright}   
			{MENU=2}      
			</div>    
		</div>	 
	</div>  
</div> 
';
 

$LAYOUT['default'] = '  				 
<div class="container"> 
	<div class="row">           
		<div class="col-md-3 col-xs-12">   
			<div class="row">	  
			{SETSTYLE=blockleft}  	   
			{MENU=1} 	   
			</div>    
		</div>    
		<!-- Block Left End -->  
		<div class="col-md-6 col-xs-12">  
			{ALERTS}   
			{SETSTYLE=default}     
			{---} 			
		</div>  
		<div class="col-md-3 col-xs-12">    
			<div class="row">  
				{SETSTYLE=blockright}  
				{MENU=2}      
			</div>         
		</div>	 
	</div>  
</div> ';

$LAYOUT['forum'] =  '   
<!-- Header End -->				
<div class="container"> 
	<div class="row">     
		<!-- Block Left Start -->      
		<div class="col-md-3 col-xs-12">   
			<div class="row">	  
			{SETSTYLE=blockleft}  	   
			{MENU=1} 	   
			</div>    
		</div>    
		<!-- Block Left End -->  
		<div class="col-md-9 col-xs-12">  
			{ALERTS}   
			{SETSTYLE=default}   					
			{---}   
			{MENU=5}	
		</div> 
	</div> 
</div>';
 
 
 
$NEWSCAT = "\n\n\n\n<!-- News Category -->\n\n\n\n
	<div style='padding:2px;padding-bottom:12px'>
	<div class='newscat_caption'>
	{NEWSCATEGORY}
	</div>
	<div style='width:100%;text-align:left'>
	{NEWSCAT_ITEM}
	</div>
	</div>
";


$NEWSCAT_ITEM = "\n\n\n\n<!-- News Category Item -->\n\n\n\n
		<div style='width:100%;display:block'>
		<table style='width:100%'>
		<tr><td style='width:2px;vertical-align:middle'>&#8226;&nbsp;</td>
		<td style='text-align:left;height:10px'>
		{NEWSTITLELINK}
		</td></tr></table></div>
";

?>
