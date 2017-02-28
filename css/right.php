
<!--  -->
	<?php
	function loginform()
	{
		echo "<div class='right' style='background-image:url(./image/bg.jpg)'>
	<div class='loginform'>
		
	<form action='./login.php' method='post' name='log'>
	
		<div class='form_line'></div>
		<div class='form_line'>
			<div class='form_left'>
				<div class='p3'>用户名</div>
				<div clsaa='p4'>username</div>
			</div>
			<div class='form_right'>
				<input class='input_text' type='text' name='uid'>
			</div>
		</div>
		<div class='form_line'>
			<div class='form_left'>
				<div class='p3'>密码</div>
				<div clsaa='p4'>password</div>
			</div>
			<div class='form_right'>
				<input class='input_text' type='password' name='passwd'>
			</div>
		</div>
		<div class='form_line'>
			<div class='form_left'></div>
			<div class='form_right'>
			<input type='image' src='./image/login.png' Onclick='javascript:document.forms['log'].submit();' >  </div>
		</div>
		
		</form>
	</div>
		</div>";
	}
	function homepage($result,$pn,$finl)
	{
		$search=new search;
		$user=new user;
		//$userinfo=$search->getusers($_COOKIE["user"]);
		echo "<div class='right' style='background-image:url(./image/bg.jpg)'>
				<div class='homeform'>";
		echo $pn;echo ":";echo $finl;
		echo "<div class='tab'>";
			echo "<div>";
				echo "<div class='w'>Title</div><div class='b'>Name</div><div class='w'>apartment</div><div class='b' style='width:200px'>Time</div><div class='w' style='width:100px'>status</div>";
			echo "</div>";
		
		for($i=0;$i<mysql_num_rows($result);$i++)
		{
			
			$ans=mysql_fetch_array($result);
			echo "<div>";
				echo "<div class='w'>".cutstr($ans["title"])."</div><div class='b'>".$search->getusers($ans["uid"])["name"]."</div><div class='w'>".$ans["apartment"]."</div><div class='b' style='width:200px'>".$ans["time"]."</div><div class='w' style='width:100px'><a href='appoint.php?aid=".$ans["aid"]."'>".$user->checkstatus($ans["status"])."</a></div>";
			echo "</div>";
		}
		echo "</div>";
		echo "<div class='pageclick'>页码:".$pn."/".$finl."</div>";
		echo "<a href='./home.php?pn=".($pn==1?1:$pn-1)."'><div class='pageclick'>上一页</div></a>
				<a href='./home.php?pn=".($pn==$finl?$finl:$pn+1)."'><div class='pageclick'>下一页</div></a>
				</div>
			</div>
		";
	}
	function appinfopage()
	{
		echo "<div class='right' style='background-image:url(./image/bg.jpg)'>
				<div class='homeform'>";
		$search=new search;
$user=new user;
if(isset($_POST["status"]))//伪判断，但有效
{
	$user->connectsql();
	$user->confirm($_GET["aid"],$_POST["status"]);//隐藏全局参数pid——cookie
}
$search->connectsql();
$info=$search->appinfo($_GET["aid"]);//预约信息
$file=explode("|",$info["filelist"]);

		echo "<div class='tab'>";
		echo "<div class='w'>标题</div> <div class='long_b'>".cutstr($info["title"])."</div>";
			echo "<div class='w'>时长</div> <div class='long_b'>".$info["cost"]."h</div>";
		echo "<div class='w'>姓名</div> <div class='long_b'>".$search->getusers($_COOKIE["user"])["name"]."</div>";
			echo "<div class='w'>时间</div> <div class='long_b'>".$info["time"]."</div>";
		echo "<div class='w'>部门</div> <div class='long_b'>".$info["apartment"]."</div>";
			echo "<div class='w'>状态</div> <div class='long_b'>".$user->checkstatus($info["status"])."</div>";
		echo "<div class='w'>教师</div> <div class='long_b'>".$search->getusers($info["pid"])["name"]."</div>";
			echo "<div class='w'>提交时间</div> <div class='long_b'>".$info["subtime"]."</div>";
		echo "<div class='w'>提交文件</div> <div class='long_b'>".($file[0]!=NULL? ("<a href='#'>Download</a>"):"NONE")."</div>";
			echo "<div class='w'>反馈文件</div> <div class='long_b'>".($file[1]!=NULL?"<a href='".$file[0]."'>Download</a>":"NONE")."</div>";
		echo "</div>";
	//	echo "<div class='app_int'>".$info["intro"]."</div>";

if($user->checklevel($_COOKIE["user"])=="pro" || $user->checklevel($_COOKIE["user"])=="admin")
		require("./global/appointform.php");
	echo "</div>
	</div>";
	}
	function applysubmit()
	{
		echo "<div class='right' style='background-image:url(./image/bg.jpg)'>";
		require("./global/applyform.php");
		echo "</div>";
	}
	?>

	
	

