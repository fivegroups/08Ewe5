<?php
$db_address=$_POST['db_address'];
$db_name=$_POST['db_name'];
$db_user=$_POST['db_user'];
$db_pwd=$_POST['db_pwd'];
$db_pre=$_POST['db_pre'];
$u_name=$_POST['u_name'];
//$u_pwd=$_POST['u_pwd'];
$u_pwd=md5($_POST['u_pwd']);
/*
echo $db_address;
echo $db_name;
echo $db_user;
echo $db_pwd;die;
*/
/*
$a="<?php
					return [
						'class' => 'yii\db\Connection',
						'dsn' => 'mysql:host="$db_address";port="3306";dbname="$db_name"',
						'username' => '$db_user',
						'password' => '$db_pwd',
						'charset' => 'utf8',
					];";
file_put_contents('../config/db.php',$a);
*/
$link=mysql_connect($db_address,$db_user,$db_pwd);
mysql_select_db($db_name,$link);
mysql_query("set names utf8");
$str="insert into we_user(u_name,u_pwd) VALUE ('$u_name','$u_pwd')";
$arr=mysql_query($str);
$a="<?php return ['class' => 'yii\db\Connection','dsn' => 'mysql:host=$db_address;dbname=$db_name','username' => '$db_user','password' => '$db_pwd','charset' => 'utf8',];";
$file=file_put_contents('../config/db.php',$a);
$b="<?php \$pdo = new PDO('mysql:host=$db_address;dbname=$db_name','$db_user','$db_pwd');\$pdo -> exec('set names utf8');";
$content=file_put_contents('../web/pdo.php',$b);
  if(!empty($file)){
     echo 1;
 }else{
    echo 0;
 }
 /*
if(mysql_fetch_assoc($arr)){
    echo '0';
}else{
    echo '1';
}*/
