<?php
include_once("functions/fileSystem.php");
include_once("functions/database.php");
	if (empty($_POST)){
		exit("您");
	}
	//判断两次输入的密码是否一致	
	$password = $_POST['passWord'];
	$confirmPassword = $_POST['confirmPassword'];
	if($password!=$confirmPassword){
		exit("输入密码和确认密码不符合！");
	}
	//判断用户名是否已经被注册
	$userName = $_POST['userName'];
	$domain = $_POST['domain'];
	$userName = $userName.$domain;
	//数据库查询语句 
	$userNameSQL = "select * from users where userName = '$userName'";
	//连接数据库
	getConnection();
	//数据库查询操作，返回结果
	$resultSst = mysql_query($userNameSQL);
	if(mysql_num_rows($resultSst)>0){
		exit("用户名已经被占用");
	}
	//采集信息
	$sex = $_POST['sex'];
	if(empty($_POST['interests'])){
		$interests = '';
	}
	else{
		$interests = implode(";",$_POST['interests']);
	}
	$remark = $_POST['remark'];
	$myPictureName = $_FILES['myPicture']['name'];
	//注册成功：插入数据进入数据库的查询语句
	$registerSQL = "insert into users values(null,'$userName','$password','$sex','$interests','$myPictureName','$remark')";
	$message = upload($_FILES['myPicture'],"uploads");
	if($message=="文件上传成功"||$message=="没有选择上传附件"){
		mysql_query($registerSQL);
		$userID = mysql_insert_id();    
		echo "提交成功"; 
	}else{
		exit($message);	
	}
	closeConnection();
?>