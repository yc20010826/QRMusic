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
  <title>控制台</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/admin.css">
	<!-- 小屏幕样式修复 -->
	<link rel="stylesheet" type="text/css" href="../css/small.css">
	<!-- 美化样式文件 -->
	<link rel="stylesheet" href="../plugns/layui/css/layui.css">
	<!-- 滚动条美化样式文件 -->
	<link rel="stylesheet" type="text/css" href="../css/jquery.mCustomScrollbar.min.css">
	<!-- layer弹窗插件样式文件 -->
	<link rel="stylesheet" href="../plugns/layer/skin/default/layer.css?v=3.0.2302" id="layuicss-skinlayercss">
</head>
<body>
  
  <div class="layui-fluid" style="margin-top: 10px;">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md8">
        <div class="layui-row layui-col-space15">
          <div class="layui-col-md6">
            <div class="layui-card">
              <div class="layui-card-header">快捷方式</div>
              <div class="layui-card-body">
                
                <div class=" layadmin-carousel layadmin-shortcut">
                  <div carousel-item>
                    <ul class="layui-row layui-col-space10">
                      <li class="layui-col-xs3">
                        <a href="../index.php" target="_blank">
                          <i class="layui-icon layui-icon-console"></i>
                          <cite>网站前台</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="home/homepage2.html">
                          <i class="layui-icon layui-icon-chart"></i>
                          <cite>数据报表</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="component/layer/list.html">
                          <i class="layui-icon layui-icon-template-1"></i>
                          <cite>接口管理</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a layadmin-event="im">
                          <i class="layui-icon layui-icon-chat"></i>
                          <cite>用户反馈</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="component/progress/index.html">
                          <i class="layui-icon layui-icon-find-fill"></i>
                          <cite>进度条</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="app/workorder/list.html">
                          <i class="layui-icon layui-icon-survey"></i>
                          <cite>工单</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="user/user/list.html">
                          <i class="layui-icon layui-icon-user"></i>
                          <cite>用户</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="set/system/website.html">
                          <i class="layui-icon layui-icon-set"></i>
                          <cite>设置</cite>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="layui-col-md6">
            <div class="layui-card">
              <div class="layui-card-header">待办事项</div>
              <div class="layui-card-body">

                <div class=" layadmin-carousel layadmin-backlog">
                  <div carousel-item>
                    <ul class="layui-row layui-col-space10">
                      <li class="layui-col-xs6">
                        <a lay-href="app/content/comment.html" class="layadmin-backlog-body">
                          <h3>待审评论</h3>
                          <p><cite>66</cite></p>
                        </a>
                      </li>
                      <li class="layui-col-xs6">
                        <a lay-href="app/forum/list.html" class="layadmin-backlog-body">
                          <h3>待审帖子</h3>
                          <p><cite>12</cite></p>
                        </a>
                      </li>
                      <li class="layui-col-xs6">
                        <a lay-href="template/goodslist.html" class="layadmin-backlog-body">
                          <h3>待审商品</h3>
                          <p><cite>99</cite></p>
                        </a>
                      </li>
                      <li class="layui-col-xs6">
                        <a href="javascript:;" onclick="layer.tips('不跳转', this, {tips: 3});" class="layadmin-backlog-body">
                          <h3>待发货</h3>
                          <p><cite>20</cite></p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="layui-col-md12">
            <div class="layui-card">
              <div class="layui-card-header">数据概览</div>
              <div class="layui-card-body">
                
                <div class="layui-carousel layadmin-carousel layadmin-dataview" data-anim="fade" lay-filter="LAY-index-dataview">
                  <div carousel-item id="LAY-index-dataview">
                    <div><i class="layui-icon layui-icon-loading1 layadmin-loading"></i></div>
                    <div></div>
                    <div></div>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="layui-card">
              <div class="layui-tab layui-tab-brief layadmin-latestData">
                <ul class="layui-tab-title">
                  <li class="layui-this">今日热搜</li>
                  <li>今日热帖</li>
                </ul>
                <div class="layui-tab-content">
                  <div class="layui-tab-item layui-show">
                    <table id="LAY-index-topSearch"></table>
                  </div>
                  <div class="layui-tab-item">
                    <table id="LAY-index-topCard"></table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="layui-col-md4">
        <div class="layui-card">
          <div class="layui-card-header">版本信息</div>
          <div class="layui-card-body layui-text">
            <table class="layui-table">
              <colgroup>
                <col width="100">
                <col>
              </colgroup>
              <tbody>
                <tr>
                  <td>当前版本</td>
                  <td>
                      V<?php  echo($version)?><a href="javascript:;" target="_blank" style="padding-left: 15px;" id="updatelog">更新日志</a>
                  </td>
                </tr>
                <tr>
                  <td>基于框架</td>
                  <td>
                    layui框架开发
                 </td>
                </tr>
                <tr>
                  <td>授权状态</td>
                  <td>Beta免授权<span class="layui-badge-dot layui-bg-blue" style="margin-left: 5px;"></span></td>
                </tr>
                <tr>
                  <td>预置功能</td>
                  <td style="padding-bottom: 0;">
                    <div class="layui-btn-container">
                      <a href="javascript:;" target="_blank" class="layui-btn layui-btn-danger" id="update">检测更新</a>
                      <a href="javascript:;" target="_blank" class="layui-btn" id="statement">重要声明</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
        <div class="layui-card">
          <div class="layui-card-header">效果报告</div>
          <div class="layui-card-body layadmin-takerates">
            <div class="layui-progress" lay-showPercent="yes">
              <h3>转化率（日同比 28% <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
              <div class="layui-progress-bar" lay-percent="65%"></div>
            </div>
            <div class="layui-progress" lay-showPercent="yes">
              <h3>签到率（日同比 11% <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
              <div class="layui-progress-bar" lay-percent="32%"></div>
            </div>
          </div>
        </div>
        
        <div class="layui-card">
          <div class="layui-card-header">实时监控</div>
          <div class="layui-card-body layadmin-takerates">
            <div class="layui-progress" lay-showPercent="yes">
              <h3>CPU使用率</h3>
              <div class="layui-progress-bar" lay-percent="8%"></div>
            </div>
            <div class="layui-progress" lay-showPercent="yes">
              <h3>内存占用率</h3>
              <div class="layui-progress-bar layui-bg-red" lay-percent="31%"></div>
            </div>

          </div>
        </div>
        
        <!--<div class="layui-card">
          <div class="layui-card-header">
            作者心语
            <i class="layui-icon layui-icon-tips" lay-tips="要支持的噢" lay-offset="5"></i>
          </div>
          <div class="layui-card-body layui-text layadmin-text">
            <p>一直以来，QianRuan 秉承无偿开源的初心，虔诚致力于服务各层次前后端 Web 开发者，在商业横飞的当今时代，这一信念从未动摇。即便身单力薄，仍然重拾决心，埋头造轮，以尽可能地填补产品本身的缺口。</p>
            <p>在过去的一段的时间，我一直在寻求持久之道，已维持你眼前所见的一切。而 QianRuan 是我们尝试解决的手段之一。我相信真正有爱于 QianRuan 生态的你，定然不会错过这一拥抱吧。</p>
            <p>子曰：君子不用防，小人防不住。请务必通过官网正规渠道，获得 <a href="javascript:;" target="_blank">本程序</a>！</p>
            <p>—— 杨成</p>
          </div>
        </div>-->
      </div>
      
    </div>
  </div>
	<script src="../js/jquery.min.js"></script> 
  <script src="../plugns/layui/layui.js"></script> 
	<script src="../plugns/layui/lay/modules/layer.js"></script> 
<script>
	//注意进度条依赖 element 模块，否则无法进行正常渲染和功能性操作
	layui.use('element', function(){
	  var element = layui.element;
	});
	
	//查看更新日志
	$("#updatelog").click(function(){
		layer.open({
			type:2,
			title: '更新日志',
			content: 'https://support.zimukj.cn/music/updatelog.html',
			btn:'知道了',
			btnAlign:'c',
			shadeClose:true,
			area: ['450px', '600px'],
			anim:4
		});
	});	
	
	//手动检测更新
	$("#update").click(function(){
		layer.msg('更新服务器检测中...', {icon: 16,shade: 0.01});
		update();
	});
	
	//手动检测更新
	$("#statement").click(function(){
		layer.msg('获取信息中...', {icon: 16,shade: 0.01});
		statement();
	});
	
	//更新检测封装函数
	function update(){
		$.ajax({
			type:"post",
			url:"https://support.zimukj.cn/music/api.php",
			data:{api:"update"},
			success:function(data){
				 var shuju = JSON.parse(data);//将json数据转为JavaScript对象，格式为：键名：值，访问时直接调用对象名.键名即可
				 var versions = shuju.version;//最新版本号
				 var updateurl = shuju.updateurl;//最新版本号对应更新地址
				 layer.closeAll();
				 layer.open({
					title: '检测更新',
					content: '<p style="text-align:center;"><span style="color: #FF0004;font-size:18px;">已成功连接更新服务器</span></p> <p style="text-align:center;">您的当前版本为：<?php  echo($version)?><br/>官方最新版本为：'+versions+'</p><p>温馨提示：</p><p style="text-indent:2em;">如您需要升级请点击获取地址进行手动升级，但鉴于产品迭代升级的差异性，我们建议您谨慎进行升级！</p>',
					btn:['获取地址','关闭窗口'],
					btnAlign:'c',
					shadeClose:true,
					anim:3,
					yes:function(){
						layer.closeAll();
						layer.msg('获取下载地址中...', {icon: 16,shade: 0.01});
						layer.closeAll();
						layer.open({
							title: '更新包下载地址',
							content: '版本：'+versions+'完整包地址：<br/>'+updateurl,
							btn:'好的',
							btnAlign:'c',
						});
					}
				});
				 
			},
			error:function(data){
				layer.closeAll();
				layer.msg("更新服务器状态异常，检测失败！");
			},
		});
		
	};
	
	
	//声明信息封装函数
	function statement(){
		$.ajax({
			type:"post",
			url:"https://support.zimukj.cn/music/api.php",
			data:{api:"statement"},
			success:function(data){
				 var shuju = JSON.parse(data);//将json数据转为JavaScript对象，格式为：键名：值，访问时直接调用对象名.键名即可
				 var statementxx = shuju.statement;//最新版本号
				 layer.closeAll();
				 layer.open({
					title: '重要声明',
					content: statementxx,
					btn:'我已知晓',
					btnAlign:'c',
					area: ['650px', '600px'],
					shadeClose:true,
				});
				 
			},
			error:function(data){
				layer.closeAll();
				layer.msg("服务器状态异常，连接失败！");
			},
		});
		
	};

</script>
</body>
</html>