<?php 
    //得到表中的总记录数
    //设置每页显示多少条记录
    //得到总页数
    //LIMIT是实现分页的核心LIMIT偏移量,每页显示多少条记录
    header('content-type:text/html;charset=utf-8');
    require_once '../FootPrint/mysqli_footprint_function.php';
    require_once '../FootPrint/$config.php';
    $link=connect3();
    $table='user';
    $totalRows=getTotalRows($link,$table);//总记录数
    echo '输出数据总条数:'.$totalRows.'<br/>';//输出数据总条数
    $pageSize=20;//
    $totalPages=ceil($totalRows/$pageSize);//总页数,进1取整
    echo '输出总页数'.$totalPages;
    //接受浏览器超链接传过来的页码page
    $page=$_GET['page']?$_GET['page']:1;
    if($page<1||!is_numeric($page)){
        $page=1;
    }
    if($page>$totalPages){
        $page=$totalpages;
    }
    $offset=($page-1)*$pageSize;//偏移量  $page是浏览器地址(url)传过来的
    $query="SELECT id,username,age,email FROM user LIMIT {$offset} , {$pageSize}";
    $users=fetchAll($link,$query);
   
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<style>
        a{
	       text-decoration:none;
        }    
    </style>
</head>
<body>
	<h2>用户列表页面</h2>
	<table border="1" cellpadding="0" cellspacing="0" bgcolor="#abcdef" width="80%">
		<tr>
			<td>编号</td>
			<td>用户名</td>
			<td>年龄</td>
			<td>邮箱</td>
		</tr>
		<?php $i=($page-1)*$pageSize+1; foreach ($users as $user):?>
		<tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $user['username']?></td>
			<td><?php echo $user['age']?></td>
			<td><?php echo $user['email']?></td>
		</tr>
		<?php endforeach;?>
	</table>
	<hr color="blue"/>
	<p>
		<?php for($i=1;$i<=$totalPages;$i++):?>
			<a href="1-page.php?page=<?php echo $i;?>"><?php echo "[{$i}]"?></a>
		<?php endfor;?>
	</p>
</body>
</html>













