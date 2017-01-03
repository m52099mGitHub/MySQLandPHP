<?php 
    
    header('content-type:text/html;charset=utf-8');
	setcookie('us==ername','geek');
	setcookie('age',12);
	setcookie('email','m52099m@163.com');
	setcookie('course','PHP',time()+20);
	setcookie('hyk','this is hongyuankun',time()+3600);
	setcookie('path','PHP',time()+3600);//当前demo有效
	setcookie('path','PHP',time()+3600,'/');//服务器中有效(根路径中都有效)
	setcookie('secure','PHP',false);
	setcookie('secure-httponly','PHP',false,true);
	
	setcookie('course','PHP课程');//修改cookie
	
	setcookie('username','',time()-1);//删除cookie
	setcookie('username',null,time()-1);//删除cookie
	//数组形式设置cookie
	setcookie("userInfo['username']",'hyk',time()+3600);
	setcookie("userInfo['age']",12,time()+3600);
	setcookie("userInfo['email']",'m52099m@163.com',time()+3600);
	//通过header设置cookie
	header("set-Cookie:username=HYK;path=/");
	?>

	
	
	
	
	
	
	
	
	
	
	
	
	
	