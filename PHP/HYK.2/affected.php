<?php 
    header('content-type:text/html;charset=utf-8');
    $link=mysqli_connect('localhost','root',null) or die('数据库连接失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link,'mysqli1') or die('数据库打开失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    
    //执行SQL查询
    $query="INSERT user(username,password,regTime) VALUES('AA','123456','2016');";
    $res=mysqli_query($link, $query);
    var_dump($res);
    echo '受影响的记录条数为'.mysqli_affected_rows($link).'<br/>';
    echo '<hr/>';
    /* 
     * 
    $query="UPDATE user age=12;"; 
    mysqli_query($link, $query);
    echo '受影响的记录条数为'.mysqli_affected_rows($link).'<br/>'; 
    */
    
    $query="DELETE FROM user WHERE id=2;";
    mysqli_query($link, $query);
    echo '受影响的记录条数为'.mysqli_affected_rows($link).'<br/>'; 
    
    
    /*
     * mysqli_affected_rows($link):得到上一步操作产生的受影响的记录条数
     * 
     * -1代表SQL语句有问题
     * 
     * 0代表没有记录被影响
     * 
     * >0代表受影响的记录条数
     * 
     * 
     * */
?>
