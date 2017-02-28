<html>
	<head>
		<title>BJTU</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/settings.css" type="text/css">
	</head>
	<body>
<?php
//appoint.php仅可能在有GET参数时被访问；否则应提示404Error
//if(isset($_GET["aid"])&&isset($_COOKIE["user"]))
require("./global/user.php");
require("./css/left.php");
require("./css/right.php");
appinfopage();
	
?>
	
	</body>
</html>

