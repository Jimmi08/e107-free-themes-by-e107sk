<?php

//https://startbootstrap.com/templates/blog/
//https://github.com/BlackrockDigital/startbootstrap-modern-business/blob/master/blog-home-1.html
//https://github.com/BlackrockDigital/startbootstrap-modern-business/blob/master/blog-post.html

// mt-4 mb-3 - fix for missing page haeader

/* TODO: use tablerender , default use h1! */
$LAYOUT['sidebar_right'] =  '   
{SETSTYLE=default}
<!-- Page Content -->
<div class="container">
	<div class="row">
		<div class="col-md-8 mt-4 mb-3">
			{SETSTYLE=main}
			{ALERTS}
			{---}
		</div>
		<div class="col-md-4 mt-4 mb-3 sidebar">
			<!-- Standard sidebar menu -->
			<div class="menu"> 
				{SETSTYLE=cardmenu}
				{MENU=1} 
			</div>
			<!-- Example for listgroup menu -->
			<div class="list">
				{SETSTYLE=listgroup}
				{MENU=2} 
			</div>
		</div>
	</div>
</div> ';