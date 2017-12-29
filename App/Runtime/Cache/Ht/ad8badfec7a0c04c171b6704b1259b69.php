<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/miniwajiyeyagzxt/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/ht/js/action.js"></script>
</head>
<body>
<div class="aaa_pts_show_1">【 供求管理 】</div>
<div class="aaa_pts_show_2">
    <div>
       <div class="aaa_pts_4"><a href="<?php echo U('index');?>">全部供求</a></div>
    </div>
    <div class="aaa_pts_3">
      <table class="pro_3">
         <tr class="tr_1">
           <td style="width:80px;">ID</td>
           <!-- <td>联系人</td> -->
           <td>联系电话</td>
           <td>供求内容</td>
           <td style="width:100px;">所属类别</td>
           <td style="width:130px;">发布时间</td>
           <!-- <td style="width:100px;">状态</td> -->
           <td style="width:180px;">操作</td>
         </tr>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <!-- <td><?php echo ($vo["username"]); ?></td> -->
            <td><?php echo ($vo["phone"]); ?></td>
            <td><?php echo ($vo["content"]); ?></td>
            <td><?php if($vo["type"] == 1): ?>供应<?php else: ?>求购<?php endif; ?></td>
            <td><?php echo ($vo["addtime"]); ?></td>
           <!--  <td><?php if($vo["state"] == 1): ?>已接单<?php elseif($vo["state"] == 2): ?>已取消<?php else: ?>供求中<?php endif; ?></td> -->
            <td>
              <a href="<?php echo U('update');?>?id=<?php echo ($vo["id"]); ?>">修改</a> | 
              <a onclick="del_id_url2(<?php echo ($vo["id"]); ?>)">删除</td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>  
         <tr>
            <td colspan="10" class="td_2">
                <?php echo ($page); ?>
             </td>
         </tr>
      </table>      
    </div>
    
</div>
<script>
function product_option(){
      $('form').submit();
}

function del_id_url2(id){
   if(confirm("确认删除吗？"))
   {
	  location='<?php echo U("del");?>?did='+id;
   }
}
</script>
</body>
</html>