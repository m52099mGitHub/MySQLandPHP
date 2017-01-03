<?php 
    require_once '../FootPrint/connect.php';
    //关闭MySQL的自动提交:步骤1
    mysqli_autocommit($link, false);
    
    $query="UPDATE account SET money=money-1000 WHERE username='kgc';";
    $res=mysqli_query($link,$query);
    
    $query="UPDATE account1 SET money=money+1000 WHERE username='hyk';";
    $res1=mysqli_query($link, $query);
    
    //关闭MySQL的自动提交:步骤2
    if($res && $res1){//系统没出现故障,转出转入结果相同
        mysqli_commit($link);//提交事物
        echo '转账成功!';
        mysqli_autocommit($link, TRUE);//打开自动提交
    }else{
        mysqli_rollback($link);
        echo '转账失败!';
    }
?>
