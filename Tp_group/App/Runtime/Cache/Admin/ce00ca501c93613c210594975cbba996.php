<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf8"/>
	<title>添加动漫类别</title>
</head>
<body>
	<form action="<?php echo U(GROUP_NAME.'/Type/handelType');?>" method="post">
	<table>
		<tr>
			<th colspan="2">添加动漫栏目类别</th>
		</tr>
		<tr>
			<td>栏目类别名称</td>
			<td><input type="text" name="name" value=""/></td>	
		</tr>
		<tr>
			<td>栏目类别排序</td>
			<td><input type="text" name="sort" value="100"/></td>	
		</tr>
		<tr>
			<td>
				<input type="submit" value="保存添加"/>
			</td>	
		</tr>
	</table>
</form>
</body>
</html>