<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<!-- 头部模板文件 -->
	<title>首页</title>
	<meta charset="utf8" />
	<!-- 网站图标设置 -->
	<link rel="shortcut icon" href="favicon.ico" />
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/default.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Head.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home-Index.css" />	
</head>
<body>
	<!-- 导航开始 --><!-- tolerance 向上一下滚动x距离就显示头部 -->
	<!-- offset 线下滚动超过一定距离开始显示效果 --><!-- data属性为headroom的设置值 -->
	<div id="nav" data-headroom data-tolerance="5" data-offset="100">
		<div class="inner-nav1 clearfix">
		<div class="nav-h"><img src="__PUBLIC__/Image/logo.png" />
		</div>
		<!-- 搜索 -->
		<form action="<?php echo U(GROUP_NAME.'/Search/index');?>" method="get" class="search-form clearfix">
			<span class=""><i class="fa  fa-search"></i></span>
			<input  type="text" name="k" placeholder="搜索" class="search-input"/>
			<!-- <input  type="submit" value="GO" class="search-btn r"/> -->
		</form>
		<div class="login-group r">
		<!-- 登录按钮 -->
		<?php if(session('user_name') == null): ?><a href="<?php echo U('Home/Login/index');?>" class="login-btn"><i class="fa fa-user"></i>登录</a><a href="#"class="login-btn"><i class="fa fa-pencil"></i>注册</a>
		<?php else: ?>
		<i class="fa fa-user"></i> <?php echo (session('user_name')); ?><a href="<?php echo U(GROUP_NAME.'/Login/logout');?>" class="login-btn"><i class="fa fa-info"></i> 注销</a><?php endif; ?>
		</div>
		</div>
		<!-- 搜索结束 -->
		<div id="nav-js">
		<div class="inner-nav2">
		<!-- 父级nav开始 -->
		<ul class="main-nav clearfix">
			<!-- 固定的首页链接 -->
			<li class="main-li" ><a href="__GROUP__" class="main-li-a">首页</a></li>
		<!-- 自定义nav循环标签 order 排序方式 -->
					<?php
 $nav_cate = M('cate')->order("sort ASC")->select(); import("ExtendClass.Category",APP_PATH); $nav_cate = Category::unlimitedForLayer( $nav_cate ); foreach ($nav_cate as $nav_v) : extract($nav_v); $url = U('/l/'.$id); ?><li class="main-li" data-channel="<?php echo ($id); ?>"><!-- 循环得到的li项 -->
				<a href="<?php echo ($url); ?>" class="main-li-a"><?php echo ($name); ?>
					<div class="tail"></div>
				</a><!-- 父级名称 -->
			</li><?php endforeach; ?>
		<!-- 循环结束 -->
		</ul>
		</div><!-- nav内层结束 -->
		<!-- 父级nav结束 -->
		<!-- 填充sub的子层 -->
		<div class="sub-guide">
			<div class="nav-bg"></div>
			<!-- 循环开始 -->
						<?php
 $nav_cate = M('cate')->order("sort ASC")->select(); import("ExtendClass.Category",APP_PATH); $nav_cate = Category::unlimitedForLayer( $nav_cate ); foreach ($nav_cate as $nav_v) : extract($nav_v); $url = U('/l/'.$id); if($child): ?><!-- 如果child子项存在值 -->
				<ul class="sub-nav clearfix" data-id="<?php echo ($id); ?>"><!-- 子项名称 -->
					<?php if(is_array($child)): foreach($child as $key=>$v): ?><li class><a href="<?php echo U('/l/'.$v['id']);?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
				</ul><?php endif; endforeach; ?>
			<!-- 启用了url路由模式 U生成 /l/+数字的形式地址 --><!-- 循环结束 -->
		</div>
		<!-- sub子层结束 -->
		</div>
	</div>
	<!-- 导航结束 -->
<style>
	#top{
		position: fixed;
		top: auto;
		right:40px;
		bottom: 32px;
		z-index: 65535;
		width: 50px;
		height: 50px;
		text-align: center;
		border: 1px solid #aaa;
		background: #fff;
		display: none;
	}
	#top .noshow{
		display: block;
		padding: 10px;
		font-size: 12px;
		line-height: 16px;
		font-family: 'MicroSoft YaHei';
		font-weight: normal;
		width:30px;
		height:30px;
		background: #bbb;
		color: #fff;
		display: none;
	}
	#top .t-btn{
		color:#aaa;
	}
</style>
<!-- gototop开始 -->
<div>
	<!-- gotoTop 内层-->
	<div id="top"><a href="#" class="t-btn"><i class="fa  fa-angle-up fa-3x" title="返回顶部"></i><p class="noshow">返回顶部</p></a></div>
</div>
<!-- gototop结束 --><!-- 返回顶部 -->

	<div class="container">
		<!-- 这是动漫视频列表 -->
		<style>
		body{
			background: url(__PUBLIC__/Image/background.png) center 0px repeat-x;
		}
		.detail-collect{
			display: block;
			height:30px;
			font-size: 14px;
			font-weight: normal;
			line-height: 30px;
			padding: 0px 10px;
			background: #4ea5dd;
			color: #fff;
		}
		.detail-main{
			width:750px;
			margin-bottom: 20px;
			background: #fff;
		}
		.detail-tit{
			font: 600 16px/30px '\5FAE\8F6F\96C5\9ED1';
			line-height: 30px;
			padding-left: 5px;
			height: 30px;
			color: #fff;
			background: #666;
		}
		.detail-show{
			display: inline-block;
		}
		.detail-img{
			width: 200px;
			height:250px;
			margin: 10px 0px 0px 10px;
		}
		.detail-des{
			width: 500px;
			padding: 10px;
		}
		.detail-head{
			font: normal 24px/30px "Microsoft YaHei";
			padding-left: 10px;
			border-left: 5px solid  #666;
			display: block;
			height: 30px;
			color: #333
		}
		.detail-info{
			font: normal 12px/20px "Microsoft YaHei";
			padding: 4px 15px;
			background-color: #fafafa
		}
		.detail-inner{
			line-height:30px;
			height: 30px; 
			margin-left: 20px;
			font: normal 12px/20px "Microsoft YaHei";
		}
		.detail-jieshao{
			font: normal 12px/20px "Microsoft YaHei";
			color: #888;
			padding:4px 15px;
			border-radius: 2px; 
		}
		.detail-inner span{
			line-height: 30px;
		}
		.detail-fj{
			width: 750px;
		}
		.detail-s-fj{
			width: 150px;
			margin-right: 20px;
			font: normal 12px/20px 'Microsoft YaHei';
		}
		.detail-s-img{
			width: 150px;
			height: 100px;
		}
		.detail-s-main{
			padding: 10px;

		}
		.detail-yellow{
			background: #FA824F;
		}
		.detail-p-yellow{
			color: #FA824F
		}
		</style>
		<!-- 基本信息开始 -->
		<div class="detail-main clearfix">
		
		<?php if(is_array($animate)): $i = 0; $__LIST__ = $animate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><h2 class="detail-tit">动漫><?php echo ($v["name"]); ?>(XX集)<span class="detail-collect r">收藏</span></h2>
			<div class="detail-show l"><img src="<?php echo ($v["pic"]); ?>" class="detail-img"/></div>
			<div class="detail-des r">
			<div class="detail-head clearfix"><span class="l"><?php echo ($v["name"]); ?></span><div class="detail-inner r">
				<span>发布于:<?php echo (date("Y年m月d日 H:i:s",$v["time"])); ?></span>
				<span>点击:<?php echo ($v["click"]); ?></span>
				<span>回复数:<?php echo ($v["reply"]); ?></span>

			</div></div>
			<div class="detail-info">访问：30万／ 收藏：776／ 评论：120／最后更新于10月18日(星期六) 15时09分</div>
			<div class="detail-info">评分：<?php echo ($v["rate"]); ?></div>
			<div class="detail-info">配音：<?php echo ($v["vactor"]); ?></div>
			<div class="detail-info">制作公司：<?php echo ($v["company"]); ?></div>
			<p class="detail-jieshao"><?php echo ($v["content"]); ?>更多</p>
			<span>标签：XXXXXXXXXXXXXXXXXXXXX</span>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		
		</div>
		<!-- 基本信息结束 -->
		<div class="clearfix">
		<!-- 分集列表 -->
		<div class="detail-fj l">
		<h2 class="detail-tit detail-yellow">稿件集 剧集介绍</h2>
		<h6 class="detail-info detail-p-yellow">共26集,更新至11集 更新时间：每周四10:00更新1集</h6>
		<div class="detail-s-main">
		<?php if(is_array($diversity)): foreach($diversity as $key=>$d): ?><div class="detail-s-fj l">
			<a class="" href="<?php echo U('/v/'.$d['id']);?>"><img src="<?php echo ($d["pic"]); ?>" class="detail-s-img"/></a>
			<span>第<?php echo ($d["order"]); ?>话</span>
			<a href="<?php echo U('/v/'.$d['id']);?>"><?php echo ($d["title"]); ?></a>
			<span><?php echo ($d["click"]); ?></span>
			<span>时长<?php echo ($d["time"]); ?></span>
			<span>来源<?php echo ($d["type"]); ?></span>
		</div><?php endforeach; endif; ?>
		</div>
		</div>
		<!-- 分集列表结束 -->
	</div>
	</div>
﻿<!-- 底部文件模板 -->
<footer>
	<div class="nav-bg"></div>
	<div class="foot-inner">
	<div class="foot-main clearfix">
		<div class="foot-logo l">
			<img src="__PUBLIC__/Image/logo.jpg" class="round-logo"/>
			<a class="logo-tit" href="/Tp_group">萌萌网</a>
		</div>
		<div class="logo-warn l">
		<p>本站不提供视频上传</p>
		<p>本站收录的所有内容均来自网上搜集分享，其版权均归原作者及其网站所有</p>
		<p>Copyright 2014 © XXX 保留所有权利</p>
		</div>
		<div class="foot-s r">
		<h3>关于XXX网</h3>
		<a href="#">常见问题</a>
		<a href="#">联系我们</a>
		</div>
		<div class="foot-s r">
		<h3>加入我们</h3>
		<a href="#">腾讯微博</a>
		<a href="#">新浪微博</a>
		</div>
		<div class="foot-s r">
		<h3>其他</h3>
		<a href="#">BUG反馈</a>
		<a href="#">全站使用说明</a>
		</div>
		<div class="foot-s r">
		<h3>友情链接</h3>
		<a href="#">XXX网</a>
		<a href="#">XXX网</a>
		</div>
	</div>
	</div>
</footer>
</body>
<!-- jquery -->
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<!-- <script type="text/javascript" src="__PUBLIC__/lazyload/jquery.lazyload.min.js?v=1.9.1"></script> -->
<script type="text/javascript" src="__PUBLIC__/Js/jquery.color.js"></script>
<!-- headroom插件 -->
<script type="text/javascript" src="__PUBLIC__/Js/headroom.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Home-index.js"></script>
</html>