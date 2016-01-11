set table_type = InnoDB;
show variables like 'table_type';
SET character_set_client = gbk;
SET character_set_connection = gbk;
SET character_set_database = gbk;
SET character_set_results = gbk;
SET character_set_server = gbk;
SET collation_connection = gbk_chinese_ci;
SET collation_database = gbk_chinese_ci;
SET collation_server = gbk_chinese_ci;
show variables like 'character%';
show variables like 'collation%';
create database register;
use register;
create  table users(
	user_id int primary key auto_increment,
	userName char(20) not null unique,
	password char(10) not null,
	sex char(10) not null,
	interests char(100),
	myPicture char(200),
	remark text
);
