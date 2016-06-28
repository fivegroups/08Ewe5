<?php
header("content-type:text/html;charset=utf-8");
ob_start();
//echo "恭喜你，安装成功";
//echo "<script>;location.href='index.php'</script>";
$content = ob_get_contents();//取得php页面输出的全部内容
$fp = fopen("install.lock", "w");
fwrite($fp, $content);
fclose($fp);
echo "<script>;location.href='index.php?r=user/index'</script>";