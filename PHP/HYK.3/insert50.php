<?php 
    header('content-type:text/html;charset=utf-8');
    $link=mysqli_connect('localhost','root',null) or die('数据库连接失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link, 'mysqli1') or die('数据库打开失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    //执行SQL语句
    $string=join('',array_merge(range('a','z'),range('A','Z')));
    for($i=1;$i<=50;$i++){
        $username=substr(str_shuffle($string),0,5);
        $password=md5($username);
        $email=$username.'@163.com';
        $age=mt_rand(1,99);
        $regTime=time()+$i*100;
        $query="INSERT user(username,password,email,age,regTime) VALUES('{$username}','{$password}','{$email}','{$age}','{$regTime}');";
        mysqli_query($link, $query);
    }
?>
