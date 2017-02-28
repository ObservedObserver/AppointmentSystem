<?php
$sr=new search;
$sr->connectsql();
if($sr->appinfo($_GET["aid"])["status"]==0)
{
	echo "<form action='#' method='post' name='conf'>
	<input type='hidden' value='1' name='status'>
	<input style='margin-left:80px;margin-top:40px;'type='image' src='./image/confirm.png' Onclick='javascript:document.forms['conf'].submit();' >
	";
}else if($sr->appinfo($_GET["aid"])["status"]==1)
{
	echo "<form action='#' method='post' name='canc'>
	<input type='hidden' value='0' name='status'>
	<input style='margin-left:80px;margin-top:40px;'type='image' src='./image/cancel.png' Onclick='javascript:document.forms['canc'].submit();' >
</form>
	";
}
?>

