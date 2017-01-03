<?php 
    header('content-type:text/html;charset=utf-8');
    $link=mysqli_connect('localhost','root',null) or die('数据库连接失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link, 'mysqli1') or die('数据库打开失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
    $query="SELECT id,username,age,email,regTime FROM user;";
    $result=mysqli_query($link, $query);
    if($result && mysqli_num_rows($result)>0){
        $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    //print_r($rows) ;
?>

<!doctype html>
    <html lang="en">
    <head>
    	<meta charset="UTF-8" />
    	<title>用户列表</title>
    </head>
    <body>
    	<h1>用户列表</h1>
    	<table border="1" cellspacing="0" cellpadding="0" bgcolor="#abcdef">
    		<tr>
    			<td>编号</td>
    			<td>用户名</td>
    			<td>年龄</td>
    			<td>邮箱</td>
    			<td>注册时间</td>
    		</tr>
    		<?php foreach ($rows as $user):?>
    		<tr>
    			<td><?php echo $user['id'] ?></td>
    			<td><?php echo $user['username'] ?></td>
    			<td><?php echo $user['age'] ?></td>
    			<td><?php echo $user['email'] ?></td>
    			<td><?php echo date('Y年m月d日 H:i:s',$user['regTime'])?></td>
    		</tr>
            <?php endforeach;?>
    	</table>
    </body>
    </html>
