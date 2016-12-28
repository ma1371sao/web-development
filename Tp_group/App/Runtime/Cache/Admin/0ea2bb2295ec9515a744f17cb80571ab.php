<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<!-- 利用jcrop和uploadify -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/jquery.Jcrop.min.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/uploadify/uploadify.css" />

<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/uploadify/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.Jcrop.min.js"></script>

<title>用户头像上传</title>
<style type="text/css">
.main{
	margin: 0 auto;
	padding: 15px;
	width: 750px;
	font-family: "microsoft yahei";
	background-color: #F5F5F5;
}
.cf:before,.cf:after {
	display: table;
	content: "";
	line-height: 0;
}
.cf:after {
	clear: both;
}
.cf {
	*zoom: 1;
}
.upload-area {
	position: relative;
	float: left;
	margin-right: 30px;
	width: 200px;
	height: 200px;
	background-color: #F5F5F5;
    border: 2px solid #E1E1E1;
}
.upload-area .file-tips {
	position: absolute;
	top: 90px;
	left: 0;
    padding: 0 15px;
    width: 170px;
    line-height: 1.4;
    font-size: 12px;
	color: #A8A8A3;
    text-align: center;
}
.userup-icon {
    display: inline-block;
    margin-right: 3px;
    width: 16px;
    height: 16px;
    vertical-align: -2px;
	background: url("__PUBLIC__/Image/userup_icon.png") no-repeat;
}
.uploadify-button {
	line-height: 120px!important;
	text-align: center;
}
.preview-area {
	float: left;
}
.tcrop {
    clear: right;
    font-size: 14px;
    font-weight: bold;
}
.update-pic .crop {
    float: left;
    margin-bottom: 20px;
    margin-top: 10px;
    overflow: hidden;
}
.crop100 {
    height: 100px;
    width: 100px;
}
.crop60 {
    height: 60px;
    margin-left: 20px;
    width: 60px;
}
.update-pic .save-pic {
    clear: left;
    margin-right: 20px;
}
.update-pic .uppic-btn {
    background-color: #348FD4;
    color: #FFFFFF;
    display: block;
    float: left;
    font-size: 16px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    vertical-align: middle;
    width: 89px;
}
.preview {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 11;
	width: 200px;
	height: 200px;
	overflow: hidden;
	background:#fff;
	display: none;
}
</style>
</head>
<body>
<a href="<?php echo U(GROUP_NAME.'/Member/setting');?>">修改个人信息</a>
<div class="main">
<!-- 修改头像 -->
<form action="<?php echo U(GROUP_NAME.'/Member/cropImg');?>" method="post" id="pic" class="update-pic cf">
	<div class="upload-area">
		<input type="file" id="user-pic">
		<div class="file-tips">支持JPG 图片小于1MB，尺寸不小于100*100,真实高清头像更受欢迎！</div>
		<div class="preview hidden" id="preview-hidden"></div>
	</div>
	<div class="preview-area">
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
		<!-- 隐藏表单 -->
		<input type="hidden" id='img-src' name='src'/>
		<div class="tcrop">头像预览</div>
		<div class="crop crop100"><img id="crop-preview-100" src="<?php echo ($avatar["large"]); ?>" alt=""></div>
		<div class="crop crop60" ><img id="crop-preview-60" src="<?php echo ($avatar["middle"]); ?>" alt=""></div>
		<input class="uppic-btn save-pic" type="submit" value="保存" />
		<a class="uppic-btn reupload-img" href="javascript:$('#user-pic').uploadify('cancel','*');">重新上传</a>
	</div>
</form>
<!-- /修改头像 -->
</div>
</body>
<script type="text/javascript">
$(function(){
//上传头像(uploadify插件)
$("#user-pic").uploadify({
	'queueSizeLimit': 1,
	'removeTimeout' : 0.5,
	'preventCaching': true,
	'multi'    		: false,
	'swf' 			: '__PUBLIC__/uploadify/uploadify.swf',
	'uploader' 		: '<?php echo U(GROUP_NAME."/Member/uploadImg");?>',
	'buttonText' 	: '<i class="userup-icon"></i>上传头像',
	'width' 		: '200',
	'height' 		: '200',
	'fileTypeExts'	: '*.jpg; *.png; *.gif;',
	'onUploadSuccess' : function(file, data, response){
		// 转换data对象
		var data=eval('(' + data + ')');
		if(data['status'] == 0){
			alert(data['info']);
			return;
		}
		var preview = $('.upload-area').children('#preview-hidden');
		preview.show().removeClass('hidden');
		//两个预览窗口赋值
		$('.crop').find('img').attr('src',data['data']+'?random='+Math.random());
		//隐藏表单赋值
		$('#img-src').val(data['data']);
		//绑定需要裁剪的图片
		var img = $('<img />');
		preview.append(img);
		preview.children('img').attr('src',data['data']+'?random='+Math.random());
		var crop_img = preview.children('img');
			crop_img.attr('id',"cropbox").show();
		// 生成jquery img对象
		var img    = new Image();
		img.src    = data['data']+'?random='+Math.random();
		//根据图片大小在画布里居中
		img.onload = function(){
			var img_height = 0;
			var img_width  = 0;
			var real_height = img.height;
			var real_width  = img.width;
			if(real_height > real_width && real_height > 200){
				var persent = real_height / 200;
				real_height = 200;
				real_width = real_width / persent;
			}else if(real_width > real_height && real_width > 200){
				var persent = real_width / 200;
				real_width = 200;
				real_height = real_height / persent;
			}
			if(real_height < 200){
				img_height = (200 - real_height)/2;	
			}
			if(real_width < 200){
				img_width = (200 - real_width)/2;
			}
			preview.css({width:(200-img_width)+'px',height:(200-img_height)+'px'});
			preview.css({paddingTop:img_height+'px',paddingLeft:img_width+'px'});			
		}
		//裁剪插件
		$('#cropbox').Jcrop({
            bgColor:'#333',   	//选区背景色
            bgFade:true,      	//选区背景渐显
            fadeTime:1000,    	//背景渐显时间
            allowSelect:false, 	//是否可以选区，
            allowResize:true, 	//是否可以调整选区大小
            aspectRatio: 1,     //约束比例
            minSize : [100,100],//可选最小大小
            boxWidth : 200,		//画布宽度
            boxHeight : 200,	//画布高度
            onChange: showPreview,		//改变时重置预览图
            onSelect: showPreview,		//选择时重置预览图
            setSelect:[ 0, 0, 100, 100],//初始化时位置
            onSelect: function (c){		//选择时动态赋值，该值是最终传给程序的参数！
	            $('#x').val(c.x);		//需裁剪的左上角X轴坐标
	            $('#y').val(c.y);		//需裁剪的左上角Y轴坐标
	            $('#w').val(c.w);		//需裁剪的宽度
	            $('#h').val(c.h);		//需裁剪的高度
          }
        });
		//重新上传,清空裁剪参数
		$('.reupload-img').click(function(){
			$('#preview-hidden').find('*').remove();
			$('#preview-hidden').hide().addClass('hidden').css({'padding-top':0,'padding-left':0});
		});
   }
});
	//预览图显示
	//参数 coords
	function showPreview(coords){
		var img_width = $('#cropbox').width();
		var img_height = $('#cropbox').height();
		  //根据包裹的容器宽高,设置被除数
		  var rx = 100 / coords.w;
		  var ry = 100 / coords.h; 
		  $('#crop-preview-100').css({
		    width: 	Math.round(rx * img_width) + 'px',
		    height: Math.round(ry * img_height) + 'px',
		    marginLeft: '-' + Math.round(rx * coords.x) + 'px',
		    marginTop:  '-' + Math.round(ry * coords.y) + 'px'
		  });
		  rx = 60 / coords.w;
		  ry = 60 / coords.h;
		  $('#crop-preview-60').css({
		    width: 	Math.round(rx * img_width) + 'px',
		    height: Math.round(ry * img_height) + 'px',
		    marginLeft: '-' + Math.round(rx * coords.x) + 'px',
		    marginTop:  '-' + Math.round(ry * coords.y) + 'px'
		  });
	}
})
</script>
</html>