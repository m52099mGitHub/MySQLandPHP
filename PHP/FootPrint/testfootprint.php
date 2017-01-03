<?php 
    //包含文件
    require_once 'mysqli_footprint_function.php';//连接方式封装引入
    require_once '$config.php';//数据库配置相关文件封装引入
    
    /* 
     * 
        连接MySQL
        方法1:
    $host='localhost';
    $user='root';
    $password=null;
    $charset='utf-8';
    $database='mysqli1';
    //性能优化时最好不要加错误抑制符   :@
    $link=@connect1($host, $user, $password, $charset, $database);//连接方式1测试
    *
    *
    */
   
    /*
     * 
     * 
         连接MySQL
         方法2:
     $config=[
        'host'=>'localhost',
        'user'=>'root',
        'pwd'=>null,
        'charset'=>'utf8',
        'dbName'=>'mysqli1'
    ]; 
 
    //上面的数据库配置文件信息可以从外面引入配置封装---
    //require_once '$config.php';---代替:
    *
    *$link=connect2($config);//连接方式2测试
    */
    
    $link=connect3();//连接方式3测试
    
    //var_dump($link);//测试函数
    
    
    
/*     
 * $data=array(
          'username'=>'KMJ',
          'password'=>'123456',
          'email'=>'HYK@163.com',
          'age'=>'18',
          'regTime'=>'2016'
  );
    $table='user';//数据表名
    if(insert($link,$data,$table)){
        echo '添加成功!';
    }else{
        echo '添加失败!';
    } 
    
    */
    
    
    
    /* //更新后的数据
     * //更新测试
     * $data=array(
        'email'=>'HYK@163.com',
        'age'=>'19',
        'regTime'=>'2016'
    );
    $table='user';//数据表名
    if(update($link, $data, $table)){
        echo '更新成功!';
    }else{
        echo '更新失败!';
    } 
    
    *
    *
    */
    
    
    /* 
     * 
     * 
     * //更新后的数据
     * 
     * //更新测试(带条件id=4)
    $data=array(
        'username'=>'HYK',
        'email'=>'HYK@163.com',
        'age'=>'20',
        'regTime'=>'2016'
    );
    $table='user';//数据表名
    if(update($link, $data, $table,'id=4')){
        echo '更新成功!';
    }else{
        echo '更新失败!';
    } 
    
    *
    *
    */
    
    
    /* 
     * //删除测试1
     * 
     * //删除数据库记录
     * 
     * $table='user';//数据表名
    if(delete($link, $table,'id=4')){//删除选中记录
        echo '删除成功!';
    }else{
        echo '删除失败!';
    } 
    
    *
    */
    
    
    /* 
     * //删除测试2
     * 
     * $table='user';//数据表名
    if(delete($link, $table)){//删除所有记录
        echo '删除成功!';
    }else{
        echo '删除失败!';
    } 
    
    *
    */
    
    /* 
     * 
     * //查询一条记录
     * //测试
    $query="SELECT id,username,email FROM user WHERE id=10";
    $row=fetchOne($link,$query);
    print_r($row); 
    
    $query="SELECT id,username,email FROM user";
    $rows=fetchAll($link, $query);
    print_r($rows);
    *
    *
    */
    
    
    /* 
     * 
     * //查询多条记录
    //测试
    $query="SELECT id,username,email FROM user WHERE id>=10";
    $rows=fetchAll($link, $query);
    print_r($rows); 
    
    *
    */
    
    
    
    /* 
     * 
     * 
     * //得到结果集中的记录条数
     //测试
     $query="SELECT id,username,email FROM user WHERE id>=10";
     $rows=fetchAll($link, $query);
     print_r($rows);
     echo '<hr color="red"/>';
     echo '上一步操作的结果集中的记录条数:'.getResultNum($link, $query); 
     
     *
     *
     */
     
     
     //得到表中的所有数据
     //测试
     $query="SELECT id,username,email FROM user WHERE id>=10";
     $rows=fetchAll($link, $query);
     print_r($rows);
     echo '<hr color="red"/>';
     $table='user';//数据表名
     echo '得到表中的所有记录为:'.getTotalRows($link, $table);
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>
