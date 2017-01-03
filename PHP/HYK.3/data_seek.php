<?php 
    header('content-type:text/html;charset=utf-8');
    $link=mysqli_connect('localhost','root',null) or die('数据库连接失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link, 'mysqli1') or die('数据库打开失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    $query="SELECT id,username,age,email,regTime FROM user";
    $result=mysqli_query($link, $query);
    
    /* 
     * $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    print_r($rows);
    echo '<hr/ color="red">';
    $row=mysqli_fetch_assoc($result);
    //print_r($row);
    var_dump($row);//数据获取完,再获取返回NULL 
    */
    

    $row=mysqli_fetch_assoc($result);
    print_r($row);
    //mysqli_data_seek($result, $offset):移动结果集的指针到指定位置
    mysqli_data_seek($result, 4);
    $row=mysqli_fetch_assoc($result);
    print_r($row);
    echo '<hr/ color="red">';
    mysqli_data_seek($result,0);
    $row=mysqli_fetch_assoc($result);
    print_r($row);
    echo '<hr/ color="red">';
    //mysqli_num_fields($result):得到字段数
    echo '结果集中的字段数为'.mysqli_num_fields($result).'<br/>';
    echo '<hr/ color="red">';
    echo '上一步操作产生的结果集的字段数'.mysqli_field_count($link);
    echo '<hr/ color="red">';
    $fieldInfo=mysqli_fetch_field($result);
    print_r($fieldInfo);
    echo '<hr/ color="red">';
    //mysqli_fetch_field($result):得到当前指针所在位置的字段信息
    $fieldInfo=mysqli_fetch_field($result);
    print_r($fieldInfo);
    
    
    //mysqli_fetch_fields($result):得到所有字段信息
    $fieldInfos=mysqli_fetch_fields($result);
    print_r($fieldInfos);
    echo '<hr/ color="red">';
    
    //mysqli_field_tell($result):获取当前指针所在位置
    echo '当前指针所在位置:'.mysqli_field_tell($result).'<br/>';
    //mysqli_field_seek($result, 1):移动当前指针到--->1
    mysqli_field_seek($result, 1);
    $fieldInfo=mysqli_fetch_field($result);
    print_r($fieldInfo);
    echo '<hr/ color="red">';
    //mysqli_fetch_field_direct($result, 3):得到指定指针所在位置的字段信息
    print_r(mysqli_fetch_field_direct($result, 3))
?>
