<?php
require(dirname(__FILE__)."/../config/config.php");
class user
{
	
	public function connectsql()
	{
		mysql_connect(MYSQL_IP,MYSQL_USER,MYSQL_PASSWD);
		mysql_query("use app;");
	}
	public function login($uid,$passwd)
	{
		$result=mysql_fetch_array(mysql_query("select * from app_users where uid='".$uid."';"));
		if($result["uid"]!=NULL)
		{
			if($result["passwd"]==$passwd)
			{
				setcookie("user",$uid,time()+3600*24);
				$url=URL."home.php";
				header("location:".$url);
			}
			else
			{
				echo "<script language='javascript'>window.alert('密码错误!')</script>";
				header("refresh:1;url=login.php");
			}
				
		}
		else
		{
			echo "<script language='javascript'>window.alert('该账号不存在!')</script>";
			header("refresh:1;url=login.php");
		}
			
	}
	public function logout()
	{
		setcookie("user","");
		$url=URL."login.php";
		header("location:".$url);
		echo $url;
		print_r($_COOKIE);
	}
	public function showlevel($uid)
	{
		$result=mysql_fetch_array(mysql_query("select * from app_users where uid='".$uid."';"));
		if($result["level"]==1)
			return "学生";
		if($result["level"]==2)
			return "教师";
		if($result["level"]>=3)
			return "管理员";
		//if(result["level"]==10)
			//return "root";
		
	}
	public function checklevel($uid)
	{
		$result=mysql_fetch_array(mysql_query("select * from app_users where uid='".$uid."';"));
		if($result["level"]==1)
			return "stu";
		if($result["level"]==2)
			return "pro";
		if($result["level"]>=3)
			return "admin";
		//if(result["level"]==10)
			//return "root";
		
	}
	public function stuhome($uid)
	{
		$sum=mysql_fetch_array(mysql_query("select COUNT(*) number from app_data where uid='".$uid."';"));
		$finl=(int)(($sum["number"]-0.1)/20.0)+1;
		if(!isset($_GET["pn"]))$pn=1;
		else {
			$pn=$_GET["pn"];
		}
			
		$h=($pn-1)*20+1;//第一条的编号
		$result=mysql_query("select * from app_data where uid='".$uid."' order by time limit ".$h.",20;");
		require("./css/left.php");
		require("./css/right.php");
		//loginform();
		homepage($result,$pn,$finl);

	}
	public function prohome($uid)//与stuhome的区别在于可以看到其他学生的请求
	{
		$apartment=mysql_fetch_array(mysql_query("select * from app_users where uid='".$uid."';"));
		$sum=mysql_fetch_array(mysql_query("select COUNT(*) number from app_data where apartment='".$apartment["apartment"]."';"));
		$finl=(int)(($sum["number"]-0.1)/20.0)+1;
		if(!isset($_GET["pn"]))$pn=1;
		else {
			$pn=$_GET["pn"];
		}
			
		$h=($pn-1)*20+1;//第一条的编号
		
		$result=mysql_query("select * from app_data where apartment='".$apartment["apartment"]."' order by time desc limit ".$h.",20;");
		require("./css/left.php");
		require("./css/right.php");
		homepage($result,$pn,$finl);

	}
	public function adminhome($uid)
	{
		$sum=mysql_fetch_array(mysql_query("select COUNT(*) number from app_data;"));
		$finl=(int)(($sum["number"]-0.1)/20.0)+1;
		if(!isset($_GET["pn"]))$pn=1;
		else {
			$pn=$_GET["pn"];
		}
			
		$h=($pn-1)*20+1;//第一条的编号
		
		$result=mysql_query("select * from app_data order by time limit ".$h.",20;");
		require("./css/left.php");
		require("./css/right.php");
		homepage($result,$pn,$finl);
		
	}
	//$user->apply($uid,$title,$time,$apartment,$intro,$subtime,$cost);
	//预约提交至数据库
	public function apply($uid,$title,$time,$apartment,$intro,$subtime,$cost)
	{
		mysql_query("use app;");//最好证明是否需要引用
		$que="insert into app_data set ";
		$que.="uid='".$uid."', ";
		$que.="title='".$title."', ";
		$que.="time='".$time."', ";
		$que.="apartment='".$apartment."', ";
		$que.="intro='".$intro."', ";
		$que.="subtime='".$subtime."', ";
		$que.="filelist='|',";
		$que.="cost='".$cost."';";
		//echo $que;
		mysql_query($que);
	}
	public function confirm($aid,$status)//确认预约状态
	{
		$pid=($status==1?$_COOKIE["user"]:"");
		mysql_query("update app_data set status='".$status."', pid='".$pid."' where aid='".$aid."';");
	}
	public function uploadfile($aid,$doc,$level)
	{
		//$ext=explode(".",$doc["name"]);
		//$tail=end($ext);
		$path="./file/"."AID".$aid."_".$doc["name"];
		move_uploaded_file($doc["tmp_name"],$path);
		$result=mysql_fetch_array(mysql_query("select * from app_data where aid='".$aid."';"));
		$filelist=$result["filelist"];
		if($level=="stu")
			mysql_query("update app_data set filelist='".$path.$filelist."' where aid='".$aid."';");
		else
			mysql_query("update app_data set filelist='".$filelist.$path."' where aid='".$aid."';");
	}
	public function uploadimg($uid,$img)//引用该命令为绝对文件必须位于主目录下，由于该路径设置是基于主目录的
	{
		$path="./uploadimg/".$uid;
		$ext=explode(".",$img["name"]);
		$tail=end($ext);
		$path=$path.".".$tail;
		move_uploaded_file($img["tmp_name"],$path);
		mysql_query("update app_users set image='".$path."' where uid='".$uid."';");
	}
	public function checkstatus($s)
	{
		if($s==0)
			return "待审核";
		if($s==1)
			return "已通过";
		if($s==2)
			return "已结束";
	}
}
class search
{
	public function connectsql()
	{
		mysql_connect(MYSQL_IP,MYSQL_USER,MYSQL_PASSWD);
		mysql_query("use app;");
	}
	public function getapartments()
	{
		return mysql_query("select * from app_apartment;");
	}
	public function appinfo($aid)
	{
		$result=mysql_fetch_array(mysql_query("select * from app_data where aid='".$aid."'"));
		return $result;
	}
	public function getaid()//当大量用户同时使用该系统时该函数不一定返回正确答案;不支持不连续的aid
	{
		$result=mysql_query("select aid from app_data;");
		return mysql_num_rows($result);
	}
	public function getusers($uid)//返回基于该用户的信息数组
	{
		return mysql_fetch_array(mysql_query("select * from app_users where uid='".$uid."';"));
	}
	public function getdata($aid)//该函数与Appinfo()重复
	{
		return mysql_fetch_array(mysql_query("select * from app_data where aid='".$aid."';"));
	}
}
function cutstr($str)
{
	if(strlen($str)<=18)
		return $str;
	else
	{
		$ans="";
		for($i=0;$i<18;$i++)
			$ans.=$str[$i];
		$ans.="..";
		return $ans;
	}
}
?>
