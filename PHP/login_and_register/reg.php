<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>注册页面</title>
</head>
<body>
<h3>注册页面</h3>
<form action="doAction.php?act=reg" method="post">
<table border="1" cellpadding="0" cellspacing="0" bgcolor="#abcdef" width="80%">
	<tr>
		<td>用户名</td>
		<td><input type="text" name="username" id="" placehoder="请输入用户名"/></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><input type="password" name="password" id="" placehoder="密码不能为空"/></td>
	</tr>
	<tr>
		<td>邮箱</td>
		<td><input type="email" name="email" id="" min="1" max="150"/></td>
	</tr>
	<tr>
		<td>年龄</td>
		<td><input type="number" name="age" id="" min="12" max="100"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="注册"/></td>
	</tr>
</table>
</form>
</body>
</html>