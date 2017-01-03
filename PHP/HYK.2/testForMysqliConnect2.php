<?php
    //防止中文乱码
    header('content-type:text/html;charset=utf-8');
    //1.建立到MySQLi的连接
        //主机名,用户名,密码,服务器关闭都会导致连接数据库失败
     /* $link=mysqli_connect('localhost','root',null);
    var_dump($link);  */
    
        //连接出错时,在连接语句前面加上错误抑制符@,是错误内容不暴露给浏览器窗口
    /* 
     * $link=@mysqli_connect('localhost','root',null1);
    var_dump($link); 
    */


    //mysqli_connect_errno():得到连接产生的错误编号
    //mysqli_connect_error():得到连接产生的错误信息
    
    $link=@mysqli_connect('localhost','root',null) or die('数据库连接失败<br/>ERROR'.mysqli_connect_errno().':'.mysqli_connect_error());
    var_dump($link);
    
    
    //2.设置字符集
        //方法1:
    mysqli_set_charset($link,'UTF8');
        //方法2:
    /* mysqli_query($link,'SET NAMES UTF8'); */
    
    //mysqli_get_charset($link):得到数据库默认字符集
    print_r(mysqli_get_charset($link));
    echo '<br/>';
    //得到当前连接的数据库字符集
    $userUnicode=mysqli_character_set_name($link);
    echo $userUnicode;
    echo '<br/>';
    
    //3.打开指定的数据库
        //mysqli_errno():得到上一步错误编号
        //mysqli_error():得到上一步操作产生的错误信息
    $res=mysqli_select_db($link,'mysqli') or die('指定数据库打开失败!<br/>ERROR'.mysqli_errno($link).':'.mysqli_error($link));
?>