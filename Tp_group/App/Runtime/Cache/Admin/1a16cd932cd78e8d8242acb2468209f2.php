<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf8" />
	<title></title>
</head>
<body>
 <form action="<?php echo U('Admin/Rbac/addRoleHandel');?>" method="post">
	<!-- name请看数据库中的字段名 -->
	<label>添加角色</label>
	角色名称:<input type="text" name="name"/><br>
	角色描述:<input type="text" name="remark"/><br>
	是否开启:<input type="radio" name="status" value="1" checked="checked"/>开启
			 <input type="radio" name="status" value="0"/>关闭 <br>
	<input type="submit" value="添加"/>
	<input type="reset" value="重置" />
 </form>
</body>
</html>