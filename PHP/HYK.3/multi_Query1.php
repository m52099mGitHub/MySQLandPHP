<?php 
    header('content-type:text/html;charset=utf-8');
    require_once '../FootPrint/connect.php';
    
    //以下三条是多条语句:执行失败了
    $query="INSERT user(username,password,regTime) VALUES ('AAA','AAA','2016');";
    //$query.="UPDATE user SET age=12;";
    $query.="DELETE FROM user WHERE id=7;";
    /*
     * mysqli_multi_query($link,$query):执行多条语句
     *      注意:每条SQL语句以分号结束
     *           如果有一条语句执行失败,整个SQL都不会执行
     * 从出错位置的SQL语句之后的语句都不会被执行          
     *           
     * 
     * 
     */
    $result=mysqli_multi_query($link, $query);
    var_dump($result);
    
    
    
    
    
    
    
    
    
    
    
    
?>
