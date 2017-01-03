<?php
	//检测MySQLi扩展是否可以使用
	phpinfo();
	//extension_loaded('mysqli')检测扩展是否开启   
	var_dump(extension_loaded('mysqli'));//boolean(true)为可用
	echo '<hr/>';
	//function_exists('mysqli_connect')检测某个函数是否可用
	var_dump(function_exists('mysqli_connect'));//boolean(true)为可用
	echo '<hr/>';
	//得到所有已定义的函数,包括自定义函数
	print_r(get_defined_functions());
?>