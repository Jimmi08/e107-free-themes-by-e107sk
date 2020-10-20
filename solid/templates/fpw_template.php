<?php
// $Id$

if (!defined('e107_INIT'))
{
	exit;
}

$FPW_TEMPLATE['form'] =
	'<div id="fpw-page" >
		<p>{FPW_TEXT}</p>
		<div class="form-group">{FPW_USEREMAIL}</div>
		<div class="form-group">{FPW_CAPTCHA_IMG}{FPW_CAPTCHA_INPUT}</div>
		{FPW_SUBMIT}
	</div>';
$FPW_TEMPLATE['header'] = '';
$FPW_TEMPLATE['footer'] = '';
