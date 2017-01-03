<?php 
    header('content-type:text/html;charset=utf-8');
    $link = mysqli_connect('localhost', 'root', null) or die('数据库连接失败!<br/>ERROR' . mysqli_errno() . ':' . mysqli_error());
    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link, 'mysqli1') or die('数据库连接失败!<br/>ERROR' . mysqli_errno() . ':' . mysqli_error());
    // 执行SQL查询:SELECT/SHOW/DESC/DESCRIBE/EXPLAIN关键字执行成功返回mysqli_result,否则返回false
    //$query = "SELECT * FROM user";
    // $query="SHOW TABLES";
    // $query="DESC user";
    // $query="DESCRIBE user";
    // $query="EXPLAIN SELECT id,username,password FROM user WHERE id<=10;";
    $query = "SELECT * FROM user";
    $result = mysqli_query($link, $query);
    
    //判断结果集中是否有记录
    //得到所有的记录,形成二维的索引+关联
    /*
     * 
     if($result && mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
    }else{
        echo '结果集中没有记录!';
    }
    print_r($rows);
    */
    
    /*
     * mysqli_fetch_all($result):得到结果中的所有记录
     * 
     * 
     * 清空数据表的SQL语句:truncate user
     * 
     * */
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    print_r($rows);
    var_dump($rows);
    
    
    //向user表中随机插入50条数据
    
?>
