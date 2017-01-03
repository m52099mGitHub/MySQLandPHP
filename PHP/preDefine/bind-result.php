<?php 
    header('content-type:text/html;charset=utf-8');
    require_once '../FootPrint/connect.php';
    //$query="SELECT id,username,email,age FROM user WHERE id=?;";
    $query="SELECT id,username,email,age FROM user WHERE id<=?;";
    $stmt=mysqli_prepare($link, $query);
    if($stmt){
        //得到占位符的个数
        echo '需要绑定'.mysqli_stmt_param_count($stmt).'个参数<br/>';
        $id=14; 
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);//执行
        //对于成功生成结果集的所有语句（SELECT、SHOW、DESCRIBE、EXPLAIN），
             //而且仅当你打算对客户端的全部结果集进行缓冲处理时，
             //必须调用mysql_stmt_store_result()，以便后续的
             //mysql_stmt_fetch()调用能返回缓冲数据。
        mysqli_stmt_store_result($stmt);
        echo '结果集中的记录数为:'.mysqli_stmt_num_rows($stmt).'<br/>';
        //将结果集绑定到指定变量
        mysqli_stmt_bind_result($stmt, $s_id,$s_username,$s_email,$s_age);
        echo '<hr/>';
        
        mysqli_stmt_fetch($stmt);
        printf('编号:%d<br/>用户名:%s<br/>邮箱:%s<br/>年龄:%d<br/>',$s_id,$s_username,$s_email,$s_age); 
        echo '<hr/>';
    
        
        //循环遍历
        while(mysqli_stmt_fetch($stmt)){
            printf('编号:%d<br/>用户名:%s<br/>邮箱:%s<br/>年龄:%d<br/>',$s_id,$s_username,$s_email,$s_age);
            echo '<hr/>';
        } 
    
    
        mysqli_stmt_data_seek($stmt, 1);
        mysqli_stmt_fetch($stmt);
        printf('编号:%d<br/>用户名:%s<br/>邮箱:%s<br/>年龄:%d<br/>',$s_id,$s_username,$s_email,$s_age);
    
    }
?>
