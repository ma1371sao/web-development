<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf8"/>
	<title>添加分类</title>
</head>
<body>
	<form action="<?php echo U(GROUP_NAME.'/Category/handelCate');?>" method="post">
	<table>
		<tr>
			<th colspan="2">添加分类栏目</th>
		</tr>
		<tr>
			<td>分类栏目名称</td>
			<td><input type="text" name="name" value=""/></td>	
		</tr>
		<tr>
			<td>排序</td>
			<td><input type="text" name="sort" value="100"/></td>	
		</tr>
		<tr>
			<td>
				<input type="hidden" name="pid" value="<?php echo ($pid); ?>"/>
				<input type="submit" value="保存添加"/>
			</td>	
		</tr>
	</table>
</form>
</body>
</html>