<?php 
    $link=mysqli_connect('localhost','root',null) or die('数据库连接失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link, 'mysqli1') or die('指定数据库打开失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error()); 
  
    ?>
