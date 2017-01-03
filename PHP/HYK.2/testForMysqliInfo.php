<?php 
    //1.连接数据库
    $link=mysqli_connect('localhost','root',null) or die('数据库连接失败!<br/>ERROR'.':'.mysqli_errno().':'.mysqli_error());
    //设置字符集
    mysqli_set_charset($link,'UTF8');
    echo '客户端版本信息:'.mysqli_get_client_info($link).'<br/>';
    echo '客户端版本号:'.mysqli_get_client_version($link).'<br/>';
    echo '服务器端版本信息:'.mysqli_get_server_info($link).'<br/>';
    echo '服务器端版本号:'.mysqli_get_server_version($link).'<br/>';
    echo 'MySQL服务器的主机名和连接类型:'.mysqli_get_host_info($link).'<br/>';
    echo 'MySQL协议的版本信息:'.mysqli_get_proto_info($link).'<br/>';
    echo '当前数据库状态:'.mysqli_stat($link).'<br/>';
    echo '当前线程ID:'.mysqli_thread_id($link).'<br/>';
    if(mysqli_thread_safe()){
        echo '已启动安全线程';
    }else{
            echo '未启动安全线程';
        }
    //3.打开指定数据库
    
?>
