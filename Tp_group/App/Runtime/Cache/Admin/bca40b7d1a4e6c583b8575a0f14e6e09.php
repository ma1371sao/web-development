<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>admin</title>
	<!-- 自定义css -->
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin-Login.css" />
	<script>
	// 解析一个验证码的路径
		var URL ="<?php echo U(GROUP_NAME.'/Login/imagecode','','');?>";
	</script>
</head>
<body>
	<!-- 提示层 -->
	<div class='hint'><div class="arrow"></div><p></p></div>
	<div class="container clearfix">
	<!-- 登录logo图 -->
	<div class="login-logo"><img src="__PUBLIC__/Image/login.png" /></div>
	<!-- 登录表单 -->
	<div id="login-outer">
		<h3>登录页XXX</h3>
	<form action="<?php echo U('Admin/Login/login');?>" method="post" class="form-login">

		<div class="form-line">
		<label for="account"><i class="fa fa-user"></i>&nbsp;账号</label>
		<input type="text"     id="account"  name="uname" placeholder="请输入账号" data-tooltip="I don't like to move"/></div>

		<div class="form-line">
		<label for="password"><i class="fa fa-send"></i>&nbsp;密码</label>
		<input type="password" id="password" name="upass" autocomplete="off" placeholder="请输入密码"/></div>

		<div class="form-line">
		<label for="verify">验证码</label>
		<input type="text"     id="verify"    name="code" placeholder="请输入验证码"/>
		<img   id="code" src="<?php echo U(GROUP_NAME.'/Login/imagecode');?>" />

		</div>

		<div class="form-tool clearfix">
			<a id="forget" href="#" class="clearfix">
				<i class="fa  fa-question"></i>忘记密码(未开发)
			</a>
			<a id="change" href="#" class="clearfix"> 
				<i class="fa  fa-chevron-right"></i>看不清
			</a>
		<input type="submit" id="submit" value="登录" class="form-submit"/></div>

		<div class="other-login">
			<p>其他账号登录</p>
		</div>
	</form>
	</div>
	<!-- 登录表单结束 -->
</div>
</body>
	<!-- js -->
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/Admin-Login.js"></script>
</html>