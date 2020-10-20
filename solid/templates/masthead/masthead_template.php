<?php

$MASTHEAD_TEMPLATE['default']['element'] = '
<div id="headerwrap">
    <div class="container">
			<div class="row">
			<header>
				<div">
					<div">
						<div class="col-lg-8 col-lg-offset-2">
							<h3>{MASTHEAD_SUBHEADING}</h3>
							<h1>{MASTHEAD_HEADING}</h1>
							<h5>{MASTHEAD_SUBTTITLE}</h5>
						</div>
						<div class="col-lg-8 col-lg-offset-2 himg">
							<img src="{IMAGE_01}" class="img-responsive" alt="{MASTHEAD_HEADING}">
						</div>
					</div>
				</div>
			</header> 
		</div><!-- /row -->
	</div> <!-- /container -->
</div><!-- /headerwrap -->';


$MASTHEAD_TEMPLATE['featurebox']['element'] = '
<div id="headerwrap">
    <div class="container">
			<div class="row">
			<header>
				<div">
					<div">
						<div class="col-lg-8 col-lg-offset-2">
							<h3>{MASTHEAD_SUBHEADING}</h3>
							<h1>{MASTHEAD_HEADING}</h1>     
							<h5>{MASTHEAD_SUBTTITLE}</h5> 
						</div>
						<div class="col-lg-8 col-lg-offset-2 himg">
							{SETSTYLE=none}
							{MASTHEAD_INTRO} 
						</div>
					</div>
				</div>
			</header>
		</div><!-- /row -->
	</div> <!-- /container -->
</div><!-- /headerwrap --> ';
 
 
$MASTHEAD_TEMPLATE['simple']['element'] = '
<div id="headerwrap">
    <div class="container">
			<div class="row">
			{SETSTYLE=none}
			 <img src="{IMAGE_01}" class="img-responsive" alt="{MASTHEAD_HEADING}">
		</div><!-- /row -->
	</div> <!-- /container -->
</div><!-- /headerwrap --> '; 