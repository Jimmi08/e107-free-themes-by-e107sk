<!-- DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" -->
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="{S_CONTENT_DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}"  />
<meta http-equiv="Content-Style-Type" content="text/css" />

{META}
<title>{SITENAME} :: {PAGE_TITLE}</title>
<link rel="stylesheet" href="themes/CounterStrike/style/style_forums.css" type="text/css">
<script type="text/javascript">
//<![CDATA[
<!--
window.onload = resizeImg;
function resizeImg()
{

	  /* /////////////////
	 ///  edit begin  ///
        ///////////////// */

	var max_width = 500; // this should be set to the same value that you chose in overall_header.tpl

	  /* /////////////////
	 ///   edit end   ///
        ///////////////// */

	if (!document.getElementsByTagName) return;
	if (!document.body.getAttribute) return;
	for (i=0; i<document.getElementsByTagName("IMG").length; i++)
	{
		var im = document.getElementsByTagName("IMG")[i];
		if (!im.getAttribute('longdesc')) continue;
		if ( (im.width > max_width) && (im.getAttribute('longdesc').indexOf('resizemod')!=-1) )
		{
			im.style.width = String(max_width) + 'px';
			eval("popRM" + String(i) + " = new Function(\"popRM = window.open('" + im.src + "','christianfecteaudotcom','top=10,left=10,width=400,height=400,scrollbars=1,resizable=1'); popRM.focus();\")");
			eval("im.onclick = popRM" + String(i) + ";");
			document.all ? im.style.cursor = 'hand' : im.style.cursor = 'pointer';
			im.title = '{L_RESIZED_IMAGE_TITLE}';
		}
	}
}
//-->
//]]>
</script>

</head>

<body bgcolor="{T_BODY_BGCOLOR}" text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}">
<span class="gen"><a name="top"></a></span>
