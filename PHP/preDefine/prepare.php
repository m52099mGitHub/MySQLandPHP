<?php 
    header('content-type:text/html;charset=utf-8');
    require_once '../FootPrint/connect.php';
    
    //预定义可以防止SQL注入,使代码更安全高效,简化重复代码
    $query="INSERT user(username,password,email,age,regTime) VALUES (?,?,?,?,?);";
    $stmt=mysqli_prepare($link, $query);
    //print_r($stmt);
    
    //定义参数
    $username='XX';
    $password=md5('123456');
    $email='m52099m@163.com';
    $age=18;
    $regTime=time();
    //绑定参数
    mysqli_stmt_bind_param($stmt, 'sssii', $username,$password,$email,$age,$regTime);
    mysqli_stmt_execute($stmt);
    
    $username='X44X';
    $password=md5('123456');
    $email='m52099m@163.com';
    $age=18;
    $regTime=time();
    mysqli_stmt_execute($stmt);
    
    $username='X55X';
    $password=md5('123456');
    $email='m52099m@163.com';
    $age=18;
    $regTime=time();
    mysqli_stmt_execute($stmt);
    
    $username='X66X';
    $password=md5('123456');
    $email='m52099m@163.com';
    $age=18;
    $regTime=time();
    mysqli_stmt_execute($stmt);
    
    echo '受影响的记录条数:'.mysqli_stmt_affected_rows($stmt).'<br/>';
    echo '产生的AUTO_INCREMENT的值为:'.mysqli_stmt_insert_id($stmt).'<br/>';
    
    mysqli_stmt_close($stmt);//关闭stmt对象
    mysqli_close($link);//关闭mysqli连接
?>
