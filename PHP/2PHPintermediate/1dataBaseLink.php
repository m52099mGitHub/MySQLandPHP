<?php
	header('content-type:text/html;charset=utf-8');

	//数据库连接及打开操作方法1:
	/*
	
	 //1.建立MySQL的连接
		//连接不成功的原因:用户名,密码,服务器没启动
	$link=@mysqli_connect('localhost','root','m52099m') or die("Database connection failed!<br/>ERROR" .mysqli_connect_errno().":".mysqli_connect_error());//加@符号可以隐藏错误信息,使之不暴露给用户
	var_dump($link);

	//2.设置字符集
	mysqli_set_charset($link,'utf8');
	// mysqli_query($link,'SET NAMES UTF8');

	print_r(mysqli_get_charset($link));//得到数据库默认的字符集
	echo mysqli_character_set_name($link);//返回当前数据库的默认字符编码

	//3.打开指定数据库
	$res=mysqli_select_db($link,'mysqli') or die('指定数据库打开失败!<br/>ERROR '.mysqli_errno($link).':'.mysqli_error($link));

	*/


	//数据库连接及打开操作方法2:
	/*
	//1.连接MySQL
	$link=@mysqli_connect('localhost','root','m52099m','mysqli','3306')or die("Database connection failed!<br/>ERROR" .mysqli_connect_errno().":".mysqli_connect_error());

	//2.设置字符集
	mysqli_set_charset($link,'utf8');

	//3.打开指定数据库
	mysqli_select_db($link,'test') or die('指定数据库打开失败!<br/>ERROR'.mysqli_errno().':'.mysqli_error());
	*/


	//数据库连接及打开操作方法3:
	/*
	$link = mysqli_connect();
	var_dump($link);
	*/
	/*
	PHP配置文件和mysqli相关的选项
	mysqli.default_port = 3306
	mysqli.default_host = 
	mysqli.default_user = 
	mysqli.default_pw = 
	*/


	//数据库连接及打开操作方法4:
	
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
	if(mysqli_real_connect($link,'localhost','root','m52099m')){
		echo 'Connect Error <br/>';
		echo mysqli_connect_errno().':'.mysqli_connect_error();
	}
	//ping服务器是否正常,如果不正常可以重新连接
	if(mysqli_ping($link)){
		echo 'Connect is OK';
	}else{
		'Connect Server Error'.mysqli_error();
	}
	echo '<hr/>';


	//获取一些信息
	echo '客户端版本信息:'.mysqli_get_client_info($link).'<br/>';
	echo '客户端版本号:'.mysqli_get_client_version($link).'<br/>';
	echo '服务器版本信息:'.mysqli_get_server_info($link).'<br/>';
	echo '服务器版本号:'.mysqli_get_server_version($link).'<br/>';
	echo 'MySQL服务器的主机名和连接类型:'.mysqli_get_host_info($link).'<br/>';
	echo 'MySQL协议的版本信息:'.mysqli_get_proto_info($link).'<br/>';
	echo '当前数据库的状态:'.mysqli_stat($link).'<br/>';
	echo '当前线程的ID:'.mysqli_thread_id($link).'<br/>';
	if(mysqli_thread_safe()){
		echo '已经启动安全线程';
	}else{
		echo '未启动安全线程';
	}

	echo '<hr/>';
?>