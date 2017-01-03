<?php 
	header('content-type:text/html;charset=utf-8');
	//首先需要检测是否登陆成功
	if(empty($_COOKIE['username'])||$_COOKIE['isLogin']!=1){
		exit("<script>
			alert("请先登录");
			location.href='selfLogin.php';
		</script>");
	}
	echo "欢迎您:".$_COOKIE['username']."<br/>";
	echo "<a>退出</a>"
?>