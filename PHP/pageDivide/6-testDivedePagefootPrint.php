<?php 
    header('content-type:text/html;charset=utf-8');
    require_once '../FootPrint/mysqli_footprint_function.php';
    require_once '../FootPrint/$config.php';
    require_once '../FootPrint/divide_Pagefootprint_function.php';
    $link=connect3();
    $keyword=$_GET['keyword']?$_GET['keyword']:'';
    if(isset($keyword)){
        $where="WHERE username LIKE '%{$keyword}%'";
        $searchStr="&keyword={$keyword}";
    }else{
        $where='';
        $searchStr='';
    }
    $table='user';
    //$totalRows=getTotalRows($link,$table);//总记录数
    $query="SELECT id FROM {$table} {$where}";
    $totalRows=getResultNum($link,$query);
    echo '输出数据总条数:'.$totalRows.'<br/>';//输出数据总条数
    $pageSize=5;//
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
    $query="SELECT id,username,age,email FROM {$table} {$where} LIMIT {$offset} , {$pageSize}";
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
        	font-size:1.4em;
        	font-weight:bold;
	       text-decoration:none;
        }   

        
        a:link {
        	color:#0ff;
        text-decoration: none;
        }
        a:visited {
        	color:#f00;
        text-decoration: none;
        }
         a:hover {
        color: #FF0000;
        text-decoration: underline;
        }
        a:active {
        color: #bc2931;
        text-decoration: none;
        }
    </style>
</head>
<body>
<form action="#" method="get">
	输入关键字: <input type="text" name="keyword" id="" placehoder="请输入搜索关键字" />
	<input type="submit" value="搜索" />
</form>
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
	<?php echo showPage($page,$totalPages)?>
</body>
<script>
	var showPage=document.querySelector("#showPage");
	showPage.addEventListener('blur',function(){
		var val=parseInt(this.value,10);
		location.href="<?php echo $url;?>?page="+val+"<?php echo $searchStr;?>";
		});
	var selectPage=document.querySelector('#selectPage');
	selectPage.addEventListener('change',function(){
		var val=parseInt(this.value,10);
		location.href="<?php echo $url;?>?page="+val+"<?php echo $searchStr;?>";
		})
</script>
</html>
