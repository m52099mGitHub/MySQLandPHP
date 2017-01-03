<?php
    $uname = $_POST["username"];
    $upwd  = $_POST["userpwd"];
    $sys_username="aptech";
    $sys_userpwd="123456";
    if($uname!=$sys_username){
        echo "用户名输入错误,请确认";
    }else if($upwd!=$sys_userpwd){
        echo "密码输入错误,请确认";
    }
    else{
        echo "用户名和密码验证成功,欢迎使用个人邮箱业务";
    }
?>


