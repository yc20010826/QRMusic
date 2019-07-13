<?php 
@include_once("../system/webquery.php");
?>
<?php 
@include_once("../system/webquery.php");
if(empty($_COOKIE['admin_id'])){
	echo "<script language=javascript>alert('非法访问，请检查是否登录！');parent.location.href='login.php';</script>";
}else{
	if(md5($_COOKIE['user']+$SecurityKey) === $_COOKIE['admin_id']){
		
	}else{
		echo "<script language=javascript>alert('信息异常，请重新登录！');parent.location.href='login.php';</script>";	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>网站设置</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="../plugns/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="../css/admin.css" media="all">
  <link rel="stylesheet" href="../plugns/layer/skin/default/layer.css?v=3.0.2302" id="layuicss-skinlayercss">
</head>
<body>

  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">网站设置</div>
          <div class="layui-card-body" pad15>
            <form id="postform">
					<div class="layui-form" wid100 lay-filter="">
					  <div class="layui-form-item">
						<label class="layui-form-label">网站名称</label>
						<div class="layui-input-block">
						  <input type="text" name="title" value="<?php echo $title?>" class="layui-input">
						</div>
					  </div>
					  <div class="layui-form-item">
						<label class="layui-form-label">网站域名</label>
						<div class="layui-input-block">
						  <input type="text" name="url" lay-verify="url" value="<?php echo $url?>" class="layui-input">
						</div>
					  </div>
					  <!--<div class="layui-form-item">
						<label class="layui-form-label">缓存时间</label>
						<div class="layui-input-inline" style="width: 80px;">
						  <input type="text" name="cache" lay-verify="number" value="0" class="layui-input">
						</div>
						<div class="layui-input-inline layui-input-company">分钟</div>
						<div class="layui-form-mid layui-word-aux">本地开发一般推荐设置为 0，线上环境建议设置为 10。</div>
					  </div>
					  <div class="layui-form-item">
						<label class="layui-form-label">最大文件上传</label>
						<div class="layui-input-inline" style="width: 80px;">
						  <input type="text" name="cache" lay-verify="number" value="2048" class="layui-input">
						</div>
						<div class="layui-input-inline layui-input-company">KB</div>
						<div class="layui-form-mid layui-word-aux">提示：1 M = 1024 KB</div>
					  </div>
					  <div class="layui-form-item">
						<label class="layui-form-label">上传文件类型</label>
						<div class="layui-input-block">
						  <input type="text" name="cache" value="png|gif|jpg|jpeg|zip|rar" class="layui-input">
						</div>
					  </div>-->

					  <!--<div class="layui-form-item layui-form-text">
						<label class="layui-form-label">首页标题</label>
						<div class="layui-input-block">
						  <input type="text" name="title" value="<?php echo $title?>" class="layui-input">
						</div>
					  </div>-->
					  <div class="layui-form-item">
						<label class="layui-form-label">站长QQ号</label>
						<div class="layui-input-block">
						  <input type="text" name="Contact_QQ" value="<?php echo $Contact_QQ?>" class="layui-input">
						</div>
					  </div>
					  <div class="layui-form-item layui-form-text">
						<label class="layui-form-label">META关键词</label>
						<div class="layui-input-block">
						  <textarea name="keywords" class="layui-textarea" placeholder="多个关键词用英文状态 , 号分割"><?php echo $keywords?></textarea>
						</div>
					  </div>
					  <div class="layui-form-item layui-form-text">
						<label class="layui-form-label">META描述</label>
						<div class="layui-input-block">
						  <textarea name="description" class="layui-textarea"><?php echo $description?></textarea>
						</div>
					  </div>
					  <div class="layui-form-item layui-form-text">
						<label class="layui-form-label">版权信息</label>
						<div class="layui-input-block">
						  <textarea name="copyright" class="layui-textarea"><?php echo $copyright?></textarea>
						</div>
					  </div>
							<div class="layui-form-item layui-form-text">
						<label class="layui-form-label">备案信息</label>
						<div class="layui-input-block">
						  <textarea name="icp" class="layui-textarea"><?php echo $icp?></textarea>
						</div>
					  </div>
					</form>
              <div class="layui-item">
                <div class="layui-input-block">
                  <button class="layui-btn" id="postweb" type="button">确认保存</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../plugns/layui/layui.js"></script> 
  <script src='../plugns/layui/lay/modules/layer.js'></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/funajax.js"></script>
<script>
	$("#postweb").click(function(){/*网站基本信息修改*/
		$.ajax({
			url:"class/websitepost.php",
			type:"post",
			async:true,
			data:$("#postform").serialize(),
			success:function(msg){
				if(msg !="信息修改成功!"){
					layer.msg(msg,{icon: 5});
				}else{
					layer.msg(msg,{icon: 1});
					window.location.reload();
				}
			},
			Error:function(msg){
				layer.msg('修改失败');
			},
		});
	});	
</script>
</body>
</html>