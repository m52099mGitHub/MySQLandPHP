<?php 
	header('content-type:text/html;charset=utf-8');
	//接受信息
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$autoLogin=$_POST['autoLogin'];
	 //连接数据库
	$link=mysqli_connect('localhost','root',null) or die('数据库连接失败!<br/>')ERROR'.mysqli_connect_errno().':'.mysqli_connect_error());
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'mysqli1') or die('指定数据库打开失败');
	$username=mysqli_real_escape_string($link,$username);
	$query="SELECT id FROM users WHERE username='{$username}' AND password='{$password}'";
	$result=mysqli_master_query($link, $query);
	if($result && mysqli_affected_rows($link)==1){
		if($autoLogin){
			$expireTime=time()+7*24*3600;
		}else{
			$expireTime=0;
		}
		/*setcookie('autoLogin',1,$expireTime);*/
		setcookie('username',$username,$expireTime);
		setcookie('isLogin',1,$expireTime);
		exit("<script>
			alert("登录成功,跳转到个人中心");
			location.href='userCenter.php';
		</script>")
	}else{
		exit("<script>
			alert("登录失败 请重新登录");
			location.href='selfLogin.php';
		</script>");
	}

 ?>