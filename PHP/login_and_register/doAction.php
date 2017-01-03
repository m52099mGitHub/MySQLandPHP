<?php 
    header('content-type:text/html;charset=utf-8');
    require_once '../FootPrint/connect.php';
    //接收数据
    $act=$_REQUEST['act'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $email=$_POST['email'];
    $age=$_POST['age'];
    $regTime=time();
    

//根据用户的不同操作完成不同的功能
    switch($act){
        case 'reg':
//             echo '注册';
            $query="INSERT user(username,password,email,age,regTime) VALUES (?,?,?,?,?);";
            $stmt=mysqli_prepare($link,$query);
            if($stmt){
                mysqli_stmt_bind_param($stmt, 'sssii', $username,$password,$email,$age,$regTime);
                mysqli_stmt_execute($stmt);
                if(mysqli_stmt_affected_rows($stmt)>0){
                    echo '注册成功<br>3秒钟后自dong跳转到登录页面';
                    echo '<meta http-equiv="refresh" content="3;url=login.php"/>';
                }else{
                    echo '注册失败<br>请重新注册!';
                    echo '<meta http-equiv="refresh" content="3;url=reg.php"/>';
                }
            }
            break;
            /*
             * 当登录用户将账号写成 'or 1=1 # 时,打印会显示出下面的内容('' or 1=1 #'),会发现密码部分并未被执行,所以用户也登录成功了
             * 
             * SELECT * FROM user WHERE username='' or 1=1 #' AND password ='e10adc3949ba59abbe56e057f20f883e';
             *    #表示数据库
             * 
             * 
             * 防止SQL注入(Injection):永远不要相信用户的输入,一定要做处理
             *      处理方法1:$username=addslashes($username);//将特殊字符加\进行转义
             *      处理方法2:$username=mysqli_real_escape_string($link,$username);//将特殊字符进行转义
             * 
             * 
            */
            
            /*
             * 
             
            case 'login':
//             echo '登录';
                    //$username=addslashes($username);//防止SQL注入处理方法1
                    $username=mysqli_real_escape_string($link,$username);//防止SQL注入处理方法2
                    $query="SELECT * FROM user WHERE username='{$username}' AND password ='{$password}';";
                    //echo $query;exit;//打印SQL语句
                    
                    $result=mysqli_query($link, $query);
                    if($result && mysqli_affected_rows($link)>0){
                        echo '登陆成功!<br/>3秒钟后跳转到首页';
                        echo '<meta http-equiv="refresh" content="3;url=http://www.baidu.com/"/>';
                    }else{
                        echo '登录失败!<br/>3秒钟后跳转到登录页面';
                        echo '<meta http-equiv="refresh" content="3;url=login.php"/>';
                    }   
            break;
           */
            
            
            case 'login':
            $query="SELECT id,username,email FROM user WHERE username=? AND password=?;";
            $stmt=mysqli_prepare($link, $query);
            if($stmt){
                mysqli_stmt_bind_param($stmt,'ss',$username,$password);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows(stmt)==1){
                    echo '登录成功!<br/>';
                    mysqli_stmt_bind_result($stmt, $id,$username,$email);
                    mysqli_stmt_fetch($stmt);
                    echo '编号:'.$id.'--用户名'.$username.'--邮箱:'.$email.'<br/>';
                }else{
                    echo '登录失败!';
                }
            }
            break; 
           
    }
?>
