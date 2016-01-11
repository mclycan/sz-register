<?php
	$dataConnection = null;
	function getConnection(){
		$hostname = "localhost";
		$database = "register";
		$userName = "root";
		$password = "";
		global $dataConnection;
		$dataConnection = @mysql_connect($hostname,$userName,$password) or die(mysql_error());
		//mysql_query("set names 'gbk'");
		mysql_query("set names 'utf8'");
		@mysql_select_db($database,$dataConnection) or die(mysql_error());
	}
	function closeConnection(){
		global $databaseconnection;
		if($databaseconnection)	{
			mysql_close($databaseconnection)or die(mysql_error());
		}
	}
?>