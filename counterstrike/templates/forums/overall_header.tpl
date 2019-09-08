<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="{S_CONTENT_DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}">
<meta http-equiv="Content-Style-Type" content="text/css">
{META}
{NAV_LINKS}
<title>{SITENAME} :: {PAGE_TITLE}</title>
<link rel="stylesheet" href="themes/CounterStrike/style/style_forums.css" type="text/css">

<!-- BEGIN switch_enable_pm_popup -->
<script lanuae="Javascript" type="text/javascript">
<!--
	if ( {PRIVATE_MESSAGE_NEW_FLAG} )
	{
		window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivms', 'HEIGHT=225,resizable=yes,WIDTH=400');;
	}
//-->
</script>
<!-- END switch_enable_pm_popup -->
<script lanuae="JavaScript1.2">
<!--

var ns6=document.etElementById&&!document.all?1:0

var head="display:''"
var folder=''

function expandit(curobj){
folder=ns6?curobj.nextSiblin.nextSiblin.style:document.all[curobj.sourceIndex+1].style
if (folder.display=="none")
folder.display=""
else
folder.display="none"
}

//-->
</script>
<!-- start mod : Resize Posted Images Based on Max Width -->
<script type="text/javascript">
//<![CDATA[
<!--
window.onload = resizeImg;
function resizeImg()
{

	  /* /////////////////
	 ///  edit begin  ///
        ///////////////// */

	var max_width = 500; // you can change this number, this is the max width in pixels for posted images

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
<!-- fin mod : Resize Posted Images Based on Max Width -->
</head>


<body bgcolor="{T_BODY_BGCOLOR}" text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}" >



<a name="top"></a>
    </font>
   
<html dir="{S_CONTENT_DIRECTION}">

<br>
   <div align="center">
<table border="0" cellpadding="0" style="border-collapse: collapse" width="700" id="table1">
  <tr>
    <td background="themes/CounterStrike/images/base.jpg" align="center" width="700" height="150">
    <p align="center">
    <object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,40,0" border="0" width="700" height="150">
      <param name="movie" value="themes/CounterStrike/images/header/forum_header.swf">
      <param name="quality" value="High">
      <param name="wmode" value="transparent">
      <embed src="themes/CounterStrike/images/header/forum_header.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="700" height="150" quality="High" wmode="transparent"></object>
      <!--<script type="text/javascript" src="themes/CounterStrike/iefix.js"></script>-->
    </td>
  </tr>
</table>
</br>
</div>   
</body>

</html>