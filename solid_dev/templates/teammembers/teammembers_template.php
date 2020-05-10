<?php

// Template File
// re_TEAMMEMBERS Template file

if (!defined('e107_INIT')) { exit; }

      // <img src="images/icons/empty.png" data-src="images/resource/agent-1.jpg" alt="">
$TEAMMEMBERS_TEMPLATE = array();

$TEAMMEMBERS_TEMPLATE['list']['start'] 	= '<div class="container mtb">
	<div class="row centered">';     

//   <span class="designation">4 Properties</span>
$TEAMMEMBERS_TEMPLATE['list']['item'] 	= '
{SETIMAGE: w=600}
		<div class="col-lg-3 col-md-3 col-sm-3">  
			<div class="he-wrap tpl6">
			{AGENT_IMAGE}
				<div class="he-view">
					<div class="bg a0" data-animate="fadeIn">
						<h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
						<a href="mailto:{AGENT_EMAIL}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-envelope"></i></a>
                        {AGENT_SOCIALLINKS}
					</div><!-- he bg -->
				</div><!-- he view -->      
			</div><!-- he wrap -->
			<h4>{AGENT_TITLE}</h4>
			<h5 class="ctitle">{AGENT_POSITION}</h5>
			<p>{AGENT_SUMMARY}</p>
			<div class="hline"></div>
		</div><! --/col-lg-3 -->  
';

$TEAMMEMBERS_TEMPLATE['list']['end'] 	= '			
		</div><! --/row -->
	</div><! --/container -->';

$TEAMMEMBERS_TEMPLATE['social_links']['start']  ='';
$TEAMMEMBERS_TEMPLATE['social_links']['item']  ='<a href="{URL}" class="dmbutton a2" data-animate="fadeInUp">{ICON}</a>';
$TEAMMEMBERS_TEMPLATE['social_links']['end']  ='';



