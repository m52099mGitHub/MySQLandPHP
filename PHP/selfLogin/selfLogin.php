<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<h1>登录页面</h1>
	<form action="doAction.php" method='post'>
		<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ABCDEF" width="70%">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" id="" placeholder="请输入用户名"/></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="password" id="" placeholder="请输入用户名"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="checkbox" name="autoLogin" id="" value="1"/>一周内自动登录</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" id="" value="登录" /></td>
			</tr>
		</table>
	</form>
</body>
</html>











