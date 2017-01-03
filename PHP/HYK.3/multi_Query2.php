<?php 
    header('content-type:text/html;charset=utf-8');
    require_once '../FootPrint/connect.php';
    $query ="SELECT id,username,age FROM user limit 3;";
    $query.="SELECT VERSION() AS mysql_version;";
    $query.="SELECT NOW() AS time_now;";
    $res=mysqli_multi_query($link, $query);
    //print_r($res);
    //var_dump($res);
    /*
     * mysqli_store_result():传输上一次产生的结果集
     * 
     * mysqli_more_results():判断是否有更多的结果集
     * 
     * mysqli_next_result():将结果集的指针向下移动一位
     * 
     * 
     * 
     * */
    if($res){
        do{
            
            if($result=mysqli_store_result($link)){//判断是否有结果集
                $rows[]=mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
        }while(mysqli_more_results($link) && mysqli_next_result($link));//判断是否有更多的结果集,有就将指针下移一位
    }
    print_r($rows);
    
?>
