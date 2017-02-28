<?php
require(dirname(__FILE__)."../global/user.php");
$u=new user;
$u->connectsql();
$u->uploadimg($_COOKIE["user"],$_FILES["img"]);
?>