<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>admin</title>
</head>
<body>
	这是后台<br>
	<img src="<?php echo ($pic); ?>" width="100" height="100"><br>
	<!-- 退出登录 -->
	<a href="<?php echo U(GROUP_NAME.'/Index/logout');?>">退出登录</a><br>
	<!-- 用户中心 -->
	<a href="<?php echo U(GROUP_NAME.'/Member/index');?>">用户中心</a><br>
	<dl>
	<dt><strong>消息管理</strong></dt>
	<!-- 帖子 -->
	<dd><a href="<?php echo U('Admin/MsgManage/index');?>">查看私信</a></dd>
	</dl>
	
	<dl>
	<dt><strong>RBAC</strong></dt>
	<!-- 用户列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Rbac/index');?>">用户列表</a></dd>
	<!-- 角色列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Rbac/role');?>">角色列表</a></dd>
	<!-- 结点列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Rbac/node');?>">节点列表</a></dd>
	<!-- 添加用户 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Rbac/addUser');?>">添加用户</a></dd>
	<!-- 添加角色 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Rbac/addRole');?>">添加角色</a></dd>
	<!-- 添加结点 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Rbac/addNode');?>">添加结点</a></dd>
	</dl>
	<dl>
	<dt><strong>系统设置</strong></dt>
	<!-- 验证码配置参数 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/System/verify');?>">验证码配置</a></dd>
	<!-- 水印配置参数 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/System/water');?>">上传图片水印配置</a></dd>
	</dl>
	<dl>
	<dt><strong>前台栏目</strong></dt>
	<!-- 前台栏目列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Category/index');?>">前台栏目列表</a></dd>
	<!-- 前台栏目分类 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Category/addCate');?>">顶级栏目分类</a></dd>
	</dl>
	<dl>
	<dt><strong>文章属性管理</strong></dt>
	<!-- 前台栏目列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Attribute/index');?>">属性列表</a></dd>
	<!-- 前台栏目分类 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Attribute/addAttr');?>">添加属性</a></dd>
	</dl>
	<dl>
	<dt><strong>文章管理</strong></dt>
	<!-- 前台栏目列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Blog/index');?>">文章列表</a></dd>
	<!-- 前台栏目分类 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Blog/addBlog');?>">添加文章</a></dd>
	<!-- 回收站-->
	<dd><a href="<?php echo U(GROUP_NAME.'/Blog/trach');?>">回收站</a></dd>
	<dt><strong>动漫管理</strong></dt>
	<!-- 动漫列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Animate/index');?>">动漫列表</a></dd>
	<!-- 添加动漫 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Animate/addAnimate');?>">添加动漫</a></dd>
	<!-- 图片裁剪 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/ThinkImg/index');?>">动漫封面图裁剪</a></dd>
	<!-- 首页ppt -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Animate/ppt');?>">首页ppt管理</a></dd>
	<dt><strong>动漫标签管理</strong></dt>
	<!-- 动漫列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Tag/index');?>">动漫标签列表</a></dd>
	<!-- 添加动漫 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Tag/addTag');?>">添加标签</a></dd>
	<dt><strong>动漫类别管理</strong></dt>
	<!-- 动漫列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Type/index');?>">动漫类别列表</a></dd>
	<!-- 添加动漫 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Type/addType');?>">添加类别</a></dd>
	<dt><strong>动漫评论管理</strong></dt>
	<!-- 动漫列表 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Comment/index');?>">动漫评论列表</a></dd>
	<!-- 添加动漫 -->
	<dd><a href="<?php echo U(GROUP_NAME.'/Comment/del');?>">删除动漫评论</a></dd>
	</dl>
</body>
</html>