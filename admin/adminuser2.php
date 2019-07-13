<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>table模块快速使用</title>
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
 
<table id="demo" lay-filter="test"></table>
 
<script src="../plugns/layui/layui.js"></script>
<script src="../plugns/layui/lay/modules/jquery.js"></script>
	
<!-- layer弹窗插件 -->
<script src="../plugns/layer/layer.js"></script>
<script src="../js/config.js"></script>
	
<!-- jQuery文件 -->
<script src="../js/jquery.min.js"></script>
<script>
layui.use('table', function(){
  var table = layui.table;
  
  //第一个实例
  table.render({
    elem: '#demo'
    ,height: 312
    ,url: 'http://www.layui.com/demo/table/user/' //数据接口
    ,page: true //开启分页
    ,cols: [[ //表头
      {field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
      ,{field: 'username', title: '用户名', width:80}
      ,{field: 'sex', title: '性别', width:80, sort: true}
      ,{field: 'city', title: '城市', width:80} 
      ,{field: 'sign', title: '签名', width: 177}
      ,{field: 'experience', title: '积分', width: 80, sort: true}
      ,{field: 'score', title: '评分', width: 80, sort: true}
      ,{field: 'classify', title: '职业', width: 80}
      ,{field: 'wealth', title: '财富', width: 135, sort: true}
    ]]
  });
  
});
</script>
</body>
</html>