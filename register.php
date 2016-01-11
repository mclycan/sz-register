<?php
include_once("functions/fileSystem.php");
include_once("functions/database.php");
	if (empty($_POST)){
		exit("your");
	}
	//判断两次输入的密码是否一致	
	$password = $_POST['passWord'];
	$confirmPassword = $_POST['confirmPassword'];
	if($password!=$confirmPassword){
		exit("password deffient");
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
		exit("name usesd");
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
	if($message=="upload_success"||$message=="no_file"){
		mysql_query($registerSQL);
		$userID = mysql_insert_id();    
		echo "success!"; 
	}else{
		exit($message);	
	}
	closeConnection();
?>