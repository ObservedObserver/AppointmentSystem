<!doctype html>
<html>
	<head>
		<title>BJTU</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/settings.css" type="text/css">
	</head>
	<body>
		
<?php
require("./global/user.php");
if(!isset($_COOKIE["user"]))
	header("location:login.php");
$user=new user;
$user->connectsql();
if($user->checklevel($_COOKIE["user"])=="stu")
{
	//echo "<a href='apply.php'>Apply!</a><br>";
	$user->stuhome($_COOKIE["user"]);
}elseif($user->checklevel($_COOKIE["user"])=="pro")
{
	$user->prohome($_COOKIE["user"]);
}elseif($user->checklevel($_COOKIE["user"])=="admin")
{
	$user->adminhome($_COOKIE["user"]);
}
?>
	</body>
</html>