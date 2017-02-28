<?php
require("./global/user.php");
if(isset($_POST["title"])&&isset($_POST["time"])&&isset($_COOKIE["user"]))
{
	//申请信息合格，打包导入数据库
	$uid=$_COOKIE["user"];
	$title=$_POST["title"];
	$time=$_POST["time"];
	//$status=0;默认设为0
	$apartment=$_POST["apartment"];
	$intro=$_POST["intro"];
	date_default_timezone_set('PRC');
	$subtime=date('Y-m-d H:i:s',time());
	$cost=$_POST["cost"];

	//------------------------

	$user=new user;
	$search=new search;
	$user->connectsql();
	$user->apply($uid,$title,$time,$apartment,$intro,$subtime,$cost);
	if(isset($_FILES["doc"]))
	{
		$doc=$_FILES["doc"];
		$aid=$search->getaid();
		$level=$user->checklevel($uid);
		$user->uploadfile($aid,$doc,$level);//uploadfile($aid,$doc,$level)
	}
	
	header("location:home.php");
}
?>
<html>
	<head>
		<title>BJTU</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/settings.css" type="text/css">
	</head>
	<body>
		<?php
		//require("./global/applyform.php");
		require("./css/left.php");
		require("./css/right.php");
		applysubmit();
		?>
	</body>
</html>