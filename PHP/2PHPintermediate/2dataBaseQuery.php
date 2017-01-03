<?php 
header('content-type:text/html;charset=utf-8');
    //1.连接数据库
    $link=mysqli_connect('localhost','root','m52099m') or die('数据库连接失败!<br/>ERROR'.mysqli_connect_errno().':'.mysqli_connect_error());
    //2.设置字符集
    mysqli_set_charset($link, 'UTF8');
    //mysqli_query($link,'SET NAMES UTF8');
   
    //3.创建MySQLi1数据库
            /* mysqli_query():执行SQL查询
                                注意: 1.执行一条SQL语句
                     2.SQL语句可以有分号,也可以没有,建议加
                     3.对于执行像SELECT/SHOW/DESC/DESCRIBE/EXPLAIN关键字的SQL语句,执行成功返回的是结果集对象mysqli_result,如果执行失败返回false
                                                    执行其他SQL语句执行成功返回的是布尔值
          */
    
    
        //执行一条语句
     /* $sql="CREATE DATABASE IF NOT EXISTS MySQLi1 DEFAULT CHARACTER SET UTF8";
     $res=mysqli_query($link,$sql);  */
        
        //执行多条数据失败了
    /* 
    $sql="INSERT user(username,password,regTime) VALUES ('xx1','123456','2016');DELETE FROM user WHERE id=3;";
    $res=mysqli_query($link,$sql); 
    */
    
    //4.打开指定的数据库
    $res=mysqli_select_db($link, 'mysqli1') or die('数据库连接失败!<br/>ERROR'.':'.mysqli_errno().':'.mysqli_error()); 
    //执行一条语句
    /*
    $sql=<<<EOF
     INSERT user(username,password,regTime)
            VALUES  ('hy1','123456','2016'),
                    ('xx1','123456','2016'),
                    ('hyk2','123456','2016'),
                    ('kmj','123456','2016'),
                    ('xx2','123456','2016')
EOF;
*/
    /* 
     * $sql="INSERT user(username,password,regTime) values('hyk3','123456','2016');";
    $res=mysqli_query($link,$sql); 
    */
    
    $sql=<<<EOF
     INSERT user(username,password,regTime)
            VALUES  ('hy111','123456','2016'),
                    ('xx111','123456','2016'),
                    ('hyk211','123456','2016'),
                    ('kmj11','123456','2016'),
                    ('xx211','123456','2016')
EOF;
    $res=mysqli_query($link,$sql);
    if($res){
        //mysqli_insert_id($link):得到上一步插入操作产生的的AUTO_INCREMENT的值,如果表达式中没有自增长字段,返回0
        $lastInsertId=mysqli_insert_id($link);
        echo '恭喜您注册成功!您是我们的第'.$lastInsertId.'为用户';
        //mysqli_affected_rows($link):得到上一步操作产生的受影响的条数
        echo 'Query OK,'. mysqli_affected_rows($link).'rows affected';
    }else{
            echo '注册失败!';
            echo 'Error'.mysqli_errno($link).':'.mysqli_error($link);
        } 
?>
