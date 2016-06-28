<?php
$db_address=$_POST['db_address'];
$db_name=$_POST['db_name'];
$db_user=$_POST['db_user'];
$db_pwd=$_POST['db_pwd'];
$db_pre=$_POST['db_pre'];
//$connect = mysql_connect("127.0.0.1","root","root");
$connect = mysql_connect($db_address,$db_user,$db_pwd);
if(!$connect){
    die('Could not connect: ' . mysql_error());
}
else {
    echo "connect succeed!" . "<br />";
}

//建立数据库
//drop database if exists  DBName ;
if(mysql_query("create database ".$db_name,$connect)){
    echo "Database created." ."<br />";
}
else {
    echo "Error creating database: " . mysql_error();
}

//选择操作的数据库
mysql_select_db($db_name,$connect);

//建立图书表
$tableBook = "CREATE TABLE `we_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) DEFAULT NULL,
  `u_pwd` char(32) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ";

//建立用户表
$tableUser = "CREATE TABLE `we_public_account_token` (
  `pat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `pat_token` varchar(50) DEFAULT NULL,
  `pat_filemtime` datetime DEFAULT NULL,
  `pat_hash` varchar(10) DEFAULT NULL,
  `pat_api_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pat_id`)
) ";

$tableOrder="CREATE TABLE `we_public_account` (
  `pa_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `pa_name` varchar(50) DEFAULT NULL,
  `pa_type` varchar(50) DEFAULT NULL,
  `pa_appid` varchar(50) DEFAULT NULL,
  `pa_appsecret` varchar(50) DEFAULT NULL,
  `pa_weixin` varchar(50) DEFAULT NULL,
  `pa_wx_account` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pa_id`)
)";

$tablemenu="CREATE TABLE `we_user_privilege` (
  `up_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `up_privilege_name` varchar(50) DEFAULT NULL,
  `up_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`up_id`)
)";

$tablemenus="CREATE TABLE `we_custom_menu` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `cm_name` varchar(50) DEFAULT NULL,
  `cm_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cm_id`)
)";

$tableauto="CREATE TABLE `we_auto_response` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `ar_rule_name` varchar(50) DEFAULT NULL,
  `ar_type` varchar(50) DEFAULT NULL,
  `ar_wd` varchar(50) DEFAULT NULL,
  `ar_content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ar_id`)
)";
if(!mysql_query($tableauto,$connect)){
    echo "Create table Order error :" . mysql_error() . "<br
/>";
}
else {
    echo "Create table Order !" . "<br />";
}
if(!mysql_query($tablemenus,$connect)){
    echo "Create table Order error :" . mysql_error() . "<br
/>";
}
else {
    echo "Create table Order !" . "<br />";
}
//实行建表操作
if(!mysql_query($tableBook,$connect)){
    echo "Create table Book error :" . mysql_error() . "<br />";
}
else {
    echo "Create table Book !" . "<br />";
}
if(!mysql_query($tableUser,$connect)){
    echo "Create table User error :" . mysql_error() . "<br />";
}
else {
    echo "Create table User !" . "<br />";
}
if(!mysql_query($tableOrder,$connect)){
    echo "Create table Order error :" . mysql_error() . "<br
/>";
}
else {
    echo "Create table Order !" . "<br />";
}
if(!mysql_query($tablemenu,$connect)){
    echo "Create table UserOrder error :" . mysql_error() . "<br
/>";
}
else {
    echo "Create table UserOrder !" . "<br />";
}
//关闭数据库
mysql_close($connect);
?>
