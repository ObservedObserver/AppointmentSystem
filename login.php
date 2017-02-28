<?php
if(isset($_COOKIE["user"]))
{
	header("location:home.php");
}	
else
{
	if(isset($_POST["uid"])&&isset($_POST["passwd"]))
	{
		require("./global/user.php");
		$user=new user;
		$user->connectsql();
		$user->login($_POST["uid"],$_POST["passwd"]);
	}
}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BJTU</title>
		<link rel="stylesheet" href="css/settings.css" type="text/css"> 
	</head>
	<body>
	<?php
		require("./css/left.php");
		require("./css/right.php");
		loginform();
	?>

	</body>
</html>