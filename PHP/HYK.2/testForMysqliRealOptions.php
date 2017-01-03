<?php 
    header('content-type:text/html;charset=utf-8');
    //初始化操作
    $link=mysqli_init();
    if(!$link){
        die('mysqli init failed');
    }
    //mysqli_options():设置连接选项
    if(!mysqli_options($link,MYSQLI_INIT_COMMAND,"SET AUTOCOMMIT=0")){
       die('mysqli options failed');
    }
    //建立到MySQL的连接
    if(!mysqli_real_connect($link,'localhost','root',null)){
        echo 'Connect Error <br/>';
        echo mysqli_connect_errno().':'.mysqli_connect_error();
    }
    //ping服务器是否正常,如果不正常可以重新连接
    if(mysqli_ping($link)){
        echo 'Connect is OK';
    }else{
        echo 'Connect Server Error'.mysqli_error();
    }
    echo '连接成功......';
    
    
    
    
    
    
    
    
    
    
    
    
?>