<?php 
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
    $page=$_GET['page']?(int)$_GET['page']:1;
    if($page<1){
        $page=1;
    }
    if($page>$totalPages){
        $page=$totalpages;
    }
    $offset=($page-1)*$pageSize;//偏移量  $page是浏览器地址(url)传过来的
    $query="SELECT id,username,age,email FROM {$table} LIMIT {$offset} , {$pageSize}";
    $users=fetchAll($link,$query);
    if(!$users){
        exit('没有用户请添加!');
    }  
    
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
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['age'];?></td>
			<td><?php echo $user['email'];?></td>
		</tr>
		<?php endforeach;?>
	</table>
	<hr color="blue"/>
	<?php 
	$url=$_SERVER['PHP_SELF'];//动态获取超链接地址
	echo $url.'<br/>';
	   $str="总共{$totalPages}页/当前是第{$page}页<br/>";
	   if($page==1){
	       $index="[首页]";
	       $prev="[上一页]";
	   }else{
	       $index="<a href='{$url}?page=1'>[首页]</a>";
	       $prev="<a href='{$url}?page=".($page-1)."'>[上一页]</a>";
	   }
	   for($i=1;$i<=$totalPages;$i++){
	       //当前页无链接
	       if($page==$i){
	           $p.="[{$i}]";
	       }else{
	           $p.="<a href='{$url}?page={$i}'>[{$i}]</a>";
	       }
	   }
	   if($page==$totalPages){
	       $next="[下一页]";
	       $last="[尾页]";
	   }else{
	       $next="<a href='{$url}?page=".($page+1)."'>[下一页]</a>";
	       $last="<a href='{$url}?page={$totalPages}'>[尾页]</a>";
	   }
	   $pageStr=$str.$index.$prev.$p.$next.$last;
	   echo $pageStr;
	?>
</body>
</html>
