<?php
/*
applyform.php文件仅会被home.php引用，不可能被直接访问，所以其相对地址是基于home.php的
*/
require(dirname(__FILE__)."/../config/config.php");

?>
<!--
<form action="#" method="post" enctype="multipart/form-data">
	TITLE:<input type="text" name="title"><br>
	APARTMENT:<select name="apartment">
		<option selected="selected" value="English">English</option>
		<option value="Math">Math</option>
		<option value="Others">Others</option>
	</select><br>
	TIME:<input type="datetime-local" name="time"><br>
	COST:0.5h<input type="radio" name="cost" value="0.5">
	1.0h<input type="radio" name="cost" value="1.0">
	1.5h<input type="radio" name="cost" value="1.5">
	2.0h<input type="radio" name="cost" value="2.0">
	<br>
	File:<input type="file" name="doc"><br>
	INTRODUCTION:<textarea name="intro"></textarea><br>
	<input type="submit">
</form>
-->
<div class='applyform'>
		
	<form action="#" method="post" enctype="multipart/form-data" name="appl">
	
		<div class='form_line'>
			<div class='form_left'>
				<div class='p3'>标题</div>
				<div clsaa='p4'>title</div>
			</div>
			<div class='form_right'>
				<input class='input_text' type='text' name='title'>
			</div>
		</div>
		<div class='form_line'>
			<div class='form_left'>
				<div class='p3'>时间</div>
				<div clsaa='p4'>time</div>
			</div>
			<div class='form_right'>
				<input class="input_text" type="datetime-local" name="time">
			</div>
		</div>
		<div class='form_line'>
			<div class='form_left'>
				<div class='p3'>部门</div>
				<div clsaa='p4'>apartment</div>
			</div>
			<div class='form_right'>
				<select name="apartment" class="sel_apart">
					<?php
					$ss=new search;
					$ss->connectsql();
					$apa=$ss->getapartments();
					for($i=0;$i<mysql_num_rows($apa);$i++)
					{
						$ans=mysql_fetch_array($apa);
						echo "<option value='".$ans["apartment"]."'>&nbsp;".$ans["displayname"]."</option>";
					}
				?>
				</select>
			</div>
		</div>
		<div class='form_line'>
			<div class='form_left'>
				<div class='p3'>时长</div>
				<div clsaa='p4'>cost</div>
			</div>
			<div class='form_right'>
				0.5h&nbsp;<input class="rad_cost" type="radio" name="cost" value="0.5">
				1.0h&nbsp;<input class="rad_cost" type="radio" name="cost" value="1.0">
				1.5h&nbsp;<input class="rad_cost" type="radio" name="cost" value="1.5">
				2.0h&nbsp;<input class="rad_cost" type="radio" name="cost" value="2.0">
			</div>
		</div>
		
		<div class='form_line'>
			<div class='form_left'>
				<div class='p3'>简介</div>
				<div clsaa='p4'>intro</div>
			</div>
			<div class='form_right'>
				<textarea name='intro' class="text_intro"></textarea>
			</div>
		</div>
		<div class='form_line'>
			<div class='form_left'>
				<div class='p3'>文件</div>
				<div clsaa='p4'>file</div>
			</div>
			<div class='form_right'>
			<!--
				<input class='upload_file' type='file'>
				<lable class='upload_file'>
					Upload
				</lable>
				-->
				  <div class="upfilebox">
            		<input type="file" name="doc">
           		 <label>上传文件</label>
        		</div>
			</div>
		</div>
		<div class='form_line'>
			<div class='form_left'></div>
			<div class='form_right'>
			<input type='image' src='./image/submit.png' Onclick='javascript:document.forms['appl'].submit();' >  </div>
		</div>
		
		</form>
	</div>