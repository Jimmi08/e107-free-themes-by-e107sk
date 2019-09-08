<?php

/************************************************************/
/* OpenTable Functions                                      */
/*                                                          */
/* Define the tables look&feel for you whole site. For this */
/* we have two options: OpenTable and OpenTable2 functions. */
/* Then we have CloseTable and CloseTable2 function to      */
/* properly close our tables. The difference is that        */
/* OpenTable has a 100% width and OpenTable2 has a width    */
/* according with the table content                         */
/************************************************************/

function OpenTable() {
    global $bgcolor1, $bgcolor2;
	?>
<!-- opentable start -->
<table cellspacing="0" cellpadding="0" width="100%" border="0" align="center">
<tr>
	<td width="25">&nbsp;</td>
	<td>
	<!-- opentable end -->
	<?php
}

function CloseTable() {
	?>
	<!-- closetable start -->
	</td>
	<td width="25">&nbsp;</td>
</tr>
</table>
<!-- closetable end -->
<?php
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
	?>
<!-- opentable2 start -->
<table cellspacing="0" cellpadding="0" border="0" align="center">
<tr>
	<td width="25">&nbsp;</td>
	<td>
	<!-- opentable2 end -->
	<?php
}

function CloseTable2() {
	?>
	<!-- closetable2 start -->
	</td>
	<td width="25">&nbsp;</td>
</tr>
</table>
<!-- closetable2 end -->
<?php
}

?>