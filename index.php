<?php
if(isset($_COOKIE["user"]))
	header("location:./home.php");
else
	header("location:./login.php");
?>