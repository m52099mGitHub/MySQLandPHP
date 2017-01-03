<?php 
header('content-type:text/html;charset=utf-8');
    //1.连接数据库mysql
    $link=mysqli_connect('localhost','root',null,'mysqli','3306') or  die('数据库连接失败!<br/>ERROR'.':'.mysqli_connect_errno().':'.mysqli_connect_error());
    //2.设置字符集
    mysqli_set_charset($link,'utf8');
    //3.打开指定的数据库
    mysqli_select_db($link,'mysqli') or die('指定数据库打开失败<br/>'.mysqli_errno().':'.mysqli_error());
    
?>