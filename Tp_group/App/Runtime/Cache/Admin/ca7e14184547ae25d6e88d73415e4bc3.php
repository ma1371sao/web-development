<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf8"/>
	<title>修改动漫类别</title>
</head>
<body>
	<form action="<?php echo U(GROUP_NAME.'/Type/handelEdit');?>" method="post">
	<table>
		<tr>
			<th colspan="2">修改动漫类别</th>
		</tr>
		<tr>
			<td>类别名称</td>
			<td><input type="text" name="name" value="<?php echo ($info["name"]); ?>"/></td>	
		</tr>
		<tr>
			<td>类别排序</td>
			<td><input type="text" name="sort" value="<?php echo ($info["sort"]); ?>"/></td>	
		</tr>
		<tr>
			<td>
				<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
				<input type="submit" value="修改"/>
			</td>	
		</tr>
	</table>
</form>
</body>
</html>