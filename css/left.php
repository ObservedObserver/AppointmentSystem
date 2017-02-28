<div class="left">
	<div class="title">
		<div class="p1">北京交通大学(威海)预约系统</div>
		<div class="p2">Beijing Jiaotong University Weihai Campus</div>
	</div>
	<script language="javascript">
		function wa()
		{
			alert("暂不对教师开放此功能");
		}
	</script>
	<?php
	
	if(isset($_COOKIE["user"]))
	{
		$search=new search;
		$search->connectsql();
		echo"
		<div class='clog'>
		<ul>
			<li class='ls' style='border-bottom:1px solid #ffffff'><a href='./home.php'>个人主页</a></li>";
		if($search->getusers($_COOKIE["user"])["level"]==2)
			echo "<li class='ls'><a href='#' OnClick='wa()'>预约申请</a></li>";
		else
			echo "<li class='ls'><a href='./apply.php'>预约申请</a></li>";
		echo "
		</ul>
		</div>";
		echo "
		
		
		";
	}
	else
		require(dirname(__FILE__)."/../global/user.php");
	
	?>
	<!--
	<script type="text/javascript">
        function F_Open_dialog() 
       { 
            document.getElementById("btn_file").click(); 
		    document.forms['ui'].submit();
       } 
<form name="ui" action="./image/bh.php" method="post" enctype="multipart/form-data">
	<input type="file" id="btn_file" style="display:none" name="img">
    </script>
    -->
	<div class="image">
	
	<?php
		if(isset($_COOKIE["user"]))
		{
			$search->connectsql();
			$p=$search->getusers($_COOKIE['user']);
			echo "
			<img src='./image/".$p['image']."'
				   style='width:100%;height:100%'>
			";
		}
		else
		{
			echo "<img src='./image/ori.jpg' style='width:100%;height:100%'>";
		}
	?>
	</div>
	<?php
	if(isset($_COOKIE["user"]))
	{
		$user=new user;
		echo"
		<div class='userinfo'>
		<ul>
			<li>学号：".$p["uid"]."</li>
			<li>姓名：".$p["name"]."</li>
			<li>部门：".$p["apartment"]."</li>
			<li>等级：".$user->showlevel($_COOKIE["user"])."</li>
		</ul>
		</div>";
		
		echo "<div class='logout'>
				<a href='./logout.php'>登出>> </a>
			</div>";
	}
	
	?>
	<div class='author'>Designed by <a href='http://ooer.space'>Observerd Observer(CH)</a>&copy; 2016.</div>
</div>