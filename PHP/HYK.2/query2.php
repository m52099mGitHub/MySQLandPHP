<?php 
    header('content-type:text/html;charset=utf-8');
    $link=mysqli_connect('localhost','root',null) or die('数据库连接失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link, 'mysqli1') or die('数据库连接失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    //执行SQL查询:SELECT/SHOW/DESC/DESCRIBE/EXPLAIN关键字执行成功返回mysqli_result,否则返回false
    $query="SELECT * FROM user";
//     $query="SHOW TABLES";
//     $query="DESC user";
//     $query="DESCRIBE user";
//     $query="EXPLAIN SELECT id,username,password FROM user WHERE id<=10;";
    $query="SELECT * FROM user";
    $result=mysqli_query($link, $query);
    //var_dump($result);//测试用
    
    /*
     * 得到结果集中的记录数
     * 
     * mysqli_affected_rows($link):得到上一步操作受影响的记录条数
     * 
     * mysqli_num_rows($result):得到结果集中的记录数
     * 
     * 
     * 
     * */
    mysqli_num_rows($result);
    echo '结果集中的记录条数:'.mysqli_affected_rows($link).'<br/>';
    echo '结果集中的记录数为'.mysqli_num_rows($result);
    
    /*
     * 取出结果集中的记录
     * 
     * mysqli_fetch_row($result):取出结果集中的一条记录作为索引数组返回
     * 
     * mysqli_fetch_assoc($result):取出结果集中的一条记录作为关联数组返回
     * 
     * $row=mysqli_fetch_array($result,$result_type):取出结果集中的一条记录作为索引数组或者关联数组或者二者都有的返回
     *      $result_type的只可以是:
     *                            MYSQLI_BOTH:索引+关联
     *                            MYSQLI_NUM:索引
     *                            MYSQLI_ASSOC:关联
     * 
     * 当查找到结果集末尾后再查找会返回NULL
     * 
     * */
    echo '<pre>';
    $row=mysqli_fetch_row($result);
    print_r($row);
    
    echo '<hr/>';
    $row=mysqli_fetch_assoc($result);
    print_r($row);
    
    echo '<hr/>';
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
    print_r($row);
    
    echo '<hr/>';
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    print_r($row);
    
    echo '<hr/>';
    $row=mysqli_fetch_array($result,MYSQLI_BOTH);
    print_r($row);
    
    
    /*
     * mysqli_fetch_object($result):对象形式输出
     * 
     * */
    echo '<hr/>';
    $row=mysqli_fetch_object($result);
    print_r($row);
    
    echo '<hr color="red"/>';
    
?>
