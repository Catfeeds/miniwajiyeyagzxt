<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/ht/js/action.js"></script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/plugins/xheditor/xheditor-1.2.1.min.js"></script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/plugins/xheditor/xheditor_lang/zh-cn.js"></script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/ht/js/jCalendar.js"></script>
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>

<![endif]-->
<link rel="stylesheet" type="text/css" href="/miniwajiyeyagzxt/Public/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/miniwajiyeyagzxt/Public/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/miniwajiyeyagzxt/Public/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />

<link rel="stylesheet" type="text/css" href="/miniwajiyeyagzxt/Public/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/miniwajiyeyagzxt/Public/hui/static/h-ui.admin/css/style.css" />


<link href="/miniwajiyeyagzxt/Public/hui/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
  <form action="?id=<?php echo ($id); ?>&page=<?php echo ($page); ?>&type=<?php echo ($type); ?>&name=<?php echo ($name); ?>&shop_id=<?php echo ($shop_id); ?>" method="post" onsubmit="return ac_from();" enctype="multipart/form-data" class="form form-horizontal" id="form-article-add">
    <div class="row cl">
      <label style="color:red;">*说明：为了统一数据，修改价格时请重新选择规格属性（不修改价格则不需要重选），并且保持多个属性名和多个规格名一致性，一旦修改了规格属性，原本的规格属性信息清空</label>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">产品名称：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="text" class="input-text"  name="name" id="name" value="<?php echo ($pro_allinfo["name"]); ?>" style="width:500px;">
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">广告语：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="text" class="input-text"  name="intro" id="intro" value="<?php echo ($pro_allinfo["intro"]); ?>" style="width:500px;">
      </div>
    </div>
    <!-- <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">所属商家：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input class="input-text" id="partner" value="<?php echo ($shangchang["name"]); ?>" disabled="disabled" style="width:200px;"/>
        <input type="hidden" name="shop_id" id="shop_id" value="<?php echo ($pro_allinfo["shop_id"]); ?>"/>
        <input type="button" value="选择商家" class="btn btn-secondary radius" onclick="win_open('<?php echo U('Shangchang/index');?>?type=xz',1280,800)"/>
      </div>
    </div> -->
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">选择分类：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <select class="input-text" name="cateid" id="cateid" onchange="getcid();" style="width:150px;margin-right:5px;">
          <!-- 遍历 -->
          <option value="">一级分类</option>
          <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v["id"] == $t_id): ?>selected="selected"<?php endif; ?>>-- <?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          <!-- 遍历 -->
        </select>
        <?php if($catetwo) { ?>
        <select class="input-text" name="cid" id="cid" style="width:150px;">
          <option value="">二级分类</option>
          <?php if(is_array($catetwo)): $i = 0; $__LIST__ = $catetwo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v["id"] == $c_id): ?>selected="selected"<?php endif; ?>>-- <?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <?php } else { ?>
        <select class="input-text" name="cid" id="cid" style="width:150px;">
          <option value="">二级分类</option>
        </select>
        <?php } ?>
        <span id="catedesc" style="color:red;font-size: 12px;">&nbsp;&nbsp; * 必选项</span>
      </div>
    </div>
    <!-- <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">产品品牌：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <select  class="input-text" name="brand_id" id="brand_id" style="width:150px;margin-right:5px;">
         
          <option value="">选择品牌</option>
          <?php if(is_array($brand_list)): $i = 0; $__LIST__ = $brand_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v["id"] == $pro_allinfo['brand_id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
         
        </select>
      </div>
    </div> -->
    <?php if($pro_allinfo2): if(is_array($pro_allinfo2)): foreach($pro_allinfo2 as $key=>$pro): ?><div class="row cl" id="guei">
      <label class="form-label col-xs-4 col-sm-2">规格属性：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <!-- 属性 -->
        <select  class="input-text" name="attr[]" onchange="changattr(this);" style="width:100px;margin-right:5px;">
          <!-- 遍历 -->
          <option value="">选择属性</option>
          <?php if(is_array($attr_list)): $i = 0; $__LIST__ = $attr_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v["id"] == $pro['attr_id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["attr_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          <!-- 遍历 -->
        </select>
        <select name="attr_value[]" id="attr_value" class="input-text hid" style="width:100px;margin-right:5px;">
          <option value="<?php echo ($pro["attr_value_id"]); ?>"><?php echo ($pro["attr_value"]); ?></option>
          
        </select>
        <!-- 属性 end -->
        <!-- 规格 -->
         <select  class="input-text" name="spec[]" onchange="changspec(this);" style="width:100px;margin-right:5px;">
          <option value="">选择规格</option>
          <?php if(is_array($spec_list)): $i = 0; $__LIST__ = $spec_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v["id"] == $pro['spec_id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["spec_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <select name="spec_value[]" id="spec_value" class="input-text hid" style="width:100px;margin-right:5px;" >
          <option value="<?php echo ($pro["spec_value_id"]); ?>"><?php echo ($pro["spec_value"]); ?></option>
        </select>
        <!-- 规格 end -->
         原价:<input class="input-text" name="price[]" id="price" value="<?php echo ($pro["price"]); ?>" style="width:50px;"/>
          优惠价:<input class="input-text" name="price_yh[]" id="price_yh" value="<?php echo ($pro["price_yh"]); ?>" style="width:50px;"/>
          库存:<input class="input-text" name="num[]" id="num" value="<?php echo $pro['store']==0 ? 999999 : $pro['store']; ?>"  style="width:80px;"/>
          <span class="btn btn-secondary radius" onclick="addPro();" >添加+</span>
      </div>
    </div><?php endforeach; endif; ?>
    <?php else: ?>
      <div class="row cl" id="guei">
      <label class="form-label col-xs-4 col-sm-2">规格属性：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <!-- 属性 -->
        <select  class="input-text" name="attr[]" onchange="changattr(this);" style="width:100px;margin-right:5px;">
          <!-- 遍历 -->
          <option value="">选择属性</option>
          <?php if(is_array($attr_list)): $i = 0; $__LIST__ = $attr_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["attr_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          <!-- 遍历 -->
        </select>
        <select name="attr_value[]" id="attr_value" class="input-text hid" style="width:100px;margin-right:5px;"></select>
        <!-- 属性 end -->
        <!-- 规格 -->
         <select  class="input-text" name="spec[]" onchange="changspec(this);" style="width:100px;margin-right:5px;">
          <option value="">选择规格</option>
          <?php if(is_array($spec_list)): $i = 0; $__LIST__ = $spec_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["spec_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <select name="spec_value[]" id="spec_value" class="input-text hid" style="width:100px;margin-right:5px;"></select>
        <!-- 规格 end -->
         购买价:<input class="input-text" name="price[]" id="price" style="width:50px;"/>
          租赁价:<input class="input-text" name="price_yh[]" id="price_yh" style="width:50px;"/>
          库存:<input class="input-text" name="num[]" id="num"  style="width:80px;"/>
          <span class="btn btn-secondary radius" onclick="addPro();" >添加+</span>
      </div>
    </div><?php endif; ?>
    
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
      <div class="formControls col-xs-8 col-sm-9">
         <div style="color:#c00; font-size:14px; ">
          <input type="file" name="photo_x" id="photo_x" />
         <span style="color:red;font-size: 12px;">上传产品列表缩略图大小:  230*230的图片 &nbsp;&nbsp;&nbsp;只能添加一张图片！！</span></div>
         <div>缩略图：</div>
           <div>
            <?php if ($pro_allinfo2[0]['photo_x']) { ?>
                  <img src="/miniwajiyeyagzxt/Data/<?php echo $pro_allinfo2[0]['photo_x']; ?>" width="80" height="80" style="margin-bottom: 3px;" />
                  <br />
              <?php } ?>
             
            </div>
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">大图：</label>
      <div class="formControls col-xs-8 col-sm-9">
         <div style="color:#c00; font-size:14px; ">
          <input type="file" name="photo_d" id="photo_d" />
         <span style="color:red;font-size: 12px;">上传产品大图:  375*200的图片</span></div>
         <div>大图：</div>
           <div>
            <?php if ($pro_allinfo2[0]['photo_d']) { ?>
                  <img src="/miniwajiyeyagzxt/Data/<?php echo $pro_allinfo2[0]['photo_d']; ?>" width="125" height="125" style="margin-bottom: 3px;" />
                <br />
              <?php } ?>
             
            </div>
      </div>
    </div>
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">轮播图：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <div>
         <input type="file" name="files[]" style="width:160px;"/><div id="imgs_add"></div>
         <span style="color:red;font-size: 12px;">上传产品详情轮播图: 600*600的图片，可添加多张</span><span class="btn btn-secondary radius" onclick="upadd();" >添加+</span></div>

           <div>

            <?php if (is_array($img_str)) { ?>
            
              <div >已上传：</div>
              <?php foreach ($img_str as $v) { ?>
               <div>
                <div class="img-err" title="删除" onclick="del_img('<?php echo $v; ?>',this);" style="color:red;cursor: pointer;">×</div>
                 <?php if (intval($pro_allinfo['import_id'])!=0) { ?>
                  <img src="<?php echo C('IMPORT_IMG_URL').$v; ?>" width="125" height="125">
                 <?php }else{ ?>
                  <img src="<?php echo '/miniwajiyeyagzxt/Data/'.$v; ?>" width="125" height="125">
                 <?php } ?>
               </div>
              <?php } ?>
            
             <?php } ?>
            </div>
            </div> 
      </div>
    
    
    <div class="row cl">
    
      <label class="form-label col-xs-4 col-sm-2">产品介绍：</label>
      <div class="queueList">
        <div id="dndArea" ></div>
      <div class="formControls col-xs-8 col-sm-9"> 
        <script id="editor" type="text/plain" style="width:100%;height:400px;" name="content" id="content"><?php echo ($pro_allinfo["content"]); ?></script> 
      </div>
      </div>
    </div>
  <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">产品参数：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <textarea name="param" id="param"  style="width:100%;height:400px;" /><?php echo ($pro_allinfo["param"]); ?></textarea>
         <div style="color:red;font-size: 12px;">注意：添加多产品参数请用英文小写 , 号隔开,例如   （型号:MS）此处的冒号为英文冒号</div>
      </div>
  </div>
  <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">排序：</label>
      <div class="formControls col-xs-8 col-sm-9">
         <input  class="input-text" style="width:100px;" name="sort" id="sort" value="<?php echo (int)$pro_allinfo['sort']; ?>"/> &nbsp;&nbsp;<span style="color:red;font-size: 12px;">排序数量越大，排名越靠前</span>
      </div>
  </div>
  <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">人气：</label>
      <div class="formControls col-xs-8 col-sm-9">
          <input class="input-text" style="width:100px;" name="renqi" id="renqi" value="<?php echo (int)$pro_allinfo['renqi']; ?>"/>
      </div>
  </div>
  <!-- <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">产品标签：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <select  class="input-text" name="tag" id="tag" style="width:150px;margin-right:5px;">
          
          <option value="">选择标签</option>
          <option value="0">无标签</option>
          <?php if(is_array($tag_list)): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v["id"] == $tag_id): ?>selected="selected"<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          
        </select>
      </div>
  </div> -->
   <input type="hidden" name="pro_id" id='pro_id' value="<?php echo ($pro_allinfo["id"]); ?>">
   <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2"></label>
      <div class="formControls col-xs-8 col-sm-9">
          <input type="submit" name="submit" value="提交" class="btn btn-secondary radius" id="aaa_pts_web_s" style="width:80px;">
      </div>
  </div>
   
  </form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
  $('.skin-minimal input').iCheck({
    checkboxClass: 'icheckbox-blue',
    radioClass: 'iradio-blue',
    increaseArea: '20%'
  });
  
  $list = $("#fileList"),
  $btn = $("#btn-star"),
  state = "pending",
  uploader;

  var uploader = WebUploader.create({
    auto: true,
    swf: '/miniwajiyeyagzxt/Public/hui/lib/webuploader/0.1.5/Uploader.swf',
  
    // 文件接收服务端。
    server: '/miniwajiyeyagzxt/Public/hui/lib/webuploader/0.1.5/server/fileupload.php',
  
    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#filePicker',
  
    // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
    resize: false,
    // 只允许选择图片文件。
    accept: {
      title: 'Images',
      extensions: 'gif,jpg,jpeg,bmp,png',
      mimeTypes: 'image/*'
    }
  });
  uploader.on( 'fileQueued', function( file ) {
    var $li = $(
      '<div id="' + file.id + '" class="item">' +
        '<div class="pic-box"><img></div>'+
        '<div class="info">' + file.name + '</div>' +
        '<p class="state">等待上传...</p>'+
      '</div>'
    ),
    $img = $li.find('img');
    $list.append( $li );
  
    // 创建缩略图
    // 如果为非图片文件，可以不用调用此方法。
    // thumbnailWidth x thumbnailHeight 为 100 x 100
    uploader.makeThumb( file, function( error, src ) {
      if ( error ) {
        $img.replaceWith('<span>不能预览</span>');
        return;
      }
  
      $img.attr( 'src', src );
    }, thumbnailWidth, thumbnailHeight );
  });
  // 文件上传过程中创建进度条实时显示。
  uploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
      $percent = $li.find('.progress-box .sr-only');
  
    // 避免重复创建
    if ( !$percent.length ) {
      $percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo( $li ).find('.sr-only');
    }
    $li.find(".state").text("上传中");
    $percent.css( 'width', percentage * 100 + '%' );
  });
  
  // 文件上传成功，给item添加成功class, 用样式标记上传成功。
  uploader.on( 'uploadSuccess', function( file ) {
    $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
  });
  
  // 文件上传失败，显示上传出错。
  uploader.on( 'uploadError', function( file ) {
    $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
  });
  
  // 完成上传完了，成功或者失败，先删除进度条。
  uploader.on( 'uploadComplete', function( file ) {
    $( '#'+file.id ).find('.progress-box').fadeOut();
  });
  uploader.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn.text('暂停上传');
        } else {
            $btn.text('开始上传');
        }
    });

    $btn.on('click', function () {
        if (state === 'uploading') {
            uploader.stop();
        } else {
            uploader.upload();
        }
    });

});

(function( $ ){
    // 当domReady的时候开始初始化
    $(function() {
        var $wrap = $('.uploader-list-container'),

            // 图片容器
            $queue = $( '<ul class="filelist"></ul>' )
                .appendTo( $wrap.find( '.queueList' ) ),

            // 状态栏，包括进度和控制按钮
            $statusBar = $wrap.find( '.statusBar' ),

            // 文件总体选择信息。
            $info = $statusBar.find( '.info' ),

            // 上传按钮
            $upload = $wrap.find( '.uploadBtn' ),

            // 没选择文件之前的内容。
            $placeHolder = $wrap.find( '.placeholder' ),

            $progress = $statusBar.find( '.progress' ).hide(),

            // 添加的文件数量
            fileCount = 0,

            // 添加的文件总大小
            fileSize = 0,

            // 优化retina, 在retina下这个值是2
            ratio = window.devicePixelRatio || 1,

            // 缩略图大小
            thumbnailWidth = 110 * ratio,
            thumbnailHeight = 110 * ratio,

            // 可能有pedding, ready, uploading, confirm, done.
            state = 'pedding',

            // 所有文件的进度信息，key为file id
            percentages = {},
            // 判断浏览器是否支持图片的base64
            isSupportBase64 = ( function() {
                var data = new Image();
                var support = true;
                data.onload = data.onerror = function() {
                    if( this.width != 1 || this.height != 1 ) {
                        support = false;
                    }
                }
                data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                return support;
            } )(),

            // 检测是否已经安装flash，检测flash的版本
            flashVersion = ( function() {
                var version;

                try {
                    version = navigator.plugins[ 'Shockwave Flash' ];
                    version = version.description;
                } catch ( ex ) {
                    try {
                        version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                                .GetVariable('$version');
                    } catch ( ex2 ) {
                        version = '0.0';
                    }
                }
                version = version.match( /\d+/g );
                return parseFloat( version[ 0 ] + '.' + version[ 1 ], 10 );
            } )(),

            supportTransition = (function(){
                var s = document.createElement('p').style,
                    r = 'transition' in s ||
                            'WebkitTransition' in s ||
                            'MozTransition' in s ||
                            'msTransition' in s ||
                            'OTransition' in s;
                s = null;
                return r;
            })(),

            // WebUploader实例
            uploader;

        if ( !WebUploader.Uploader.support('flash') && WebUploader.browser.ie ) {

            // flash 安装了但是版本过低。
            if (flashVersion) {
                (function(container) {
                    window['expressinstallcallback'] = function( state ) {
                        switch(state) {
                            case 'Download.Cancelled':
                                alert('您取消了更新！')
                                break;

                            case 'Download.Failed':
                                alert('安装失败')
                                break;

                            default:
                                alert('安装已成功，请刷新！');
                                break;
                        }
                        delete window['expressinstallcallback'];
                    };

                    var swf = 'expressInstall.swf';
                    // insert flash object
                    var html = '<object type="application/' +
                            'x-shockwave-flash" data="' +  swf + '" ';

                    if (WebUploader.browser.ie) {
                        html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
                    }

                    html += 'width="100%" height="100%" style="outline:0">'  +
                        '<param name="movie" value="' + swf + '" />' +
                        '<param name="wmode" value="transparent" />' +
                        '<param name="allowscriptaccess" value="always" />' +
                    '</object>';

                    container.html(html);

                })($wrap);

            // 压根就没有安转。
            } else {
                $wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
            }

            return;
        } else if (!WebUploader.Uploader.support()) {
            alert( 'Web Uploader 不支持您的浏览器！');
            return;
        }

        // 实例化
        uploader = WebUploader.create({
            pick: {
                id: '#filePicker-2',
                label: '点击选择图片'
            },
            formData: {
                uid: 123
            },
            dnd: '#dndArea',
            paste: '#uploader',
            swf: '/miniwajiyeyagzxt/Public/hui/lib/webuploader/0.1.5/Uploader.swf',
            chunked: false,
            chunkSize: 512 * 1024,
            server: '/miniwajiyeyagzxt/Public/hui/lib/webuploader/0.1.5/server/fileupload.php',
            // runtimeOrder: 'flash',

            // accept: {
            //     title: 'Images',
            //     extensions: 'gif,jpg,jpeg,bmp,png',
            //     mimeTypes: 'image/*'
            // },

            // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
            disableGlobalDnd: true,
            fileNumLimit: 300,
            fileSizeLimit: 200 * 1024 * 1024,    // 200 M
            fileSingleSizeLimit: 50 * 1024 * 1024    // 50 M
        });

        // 拖拽时不接受 js, txt 文件。
        uploader.on( 'dndAccept', function( items ) {
            var denied = false,
                len = items.length,
                i = 0,
                // 修改js类型
                unAllowed = 'text/plain;application/javascript ';

            for ( ; i < len; i++ ) {
                // 如果在列表里面
                if ( ~unAllowed.indexOf( items[ i ].type ) ) {
                    denied = true;
                    break;
                }
            }

            return !denied;
        });

        uploader.on('dialogOpen', function() {
            console.log('here');
        });

        // uploader.on('filesQueued', function() {
        //     uploader.sort(function( a, b ) {
        //         if ( a.name < b.name )
        //           return -1;
        //         if ( a.name > b.name )
        //           return 1;
        //         return 0;
        //     });
        // });

        // 添加“添加文件”的按钮，
        uploader.addButton({
            id: '#filePicker2',
            label: '继续添加'
        });

        uploader.on('ready', function() {
            window.uploader = uploader;
        });

        // 当有文件添加进来时执行，负责view的创建
        function addFile( file ) {
            var $li = $( '<li id="' + file.id + '">' +
                    '<p class="title">' + file.name + '</p>' +
                    '<p class="imgWrap"></p>'+
                    '<p class="progress"><span></span></p>' +
                    '</li>' ),

                $btns = $('<div class="file-panel">' +
                    '<span class="cancel">删除</span>' +
                    '<span class="rotateRight">向右旋转</span>' +
                    '<span class="rotateLeft">向左旋转</span></div>').appendTo( $li ),
                $prgress = $li.find('p.progress span'),
                $wrap = $li.find( 'p.imgWrap' ),
                $info = $('<p class="error"></p>'),

                showError = function( code ) {
                    switch( code ) {
                        case 'exceed_size':
                            text = '文件大小超出';
                            break;

                        case 'interrupt':
                            text = '上传暂停';
                            break;

                        default:
                            text = '上传失败，请重试';
                            break;
                    }

                    $info.text( text ).appendTo( $li );
                };

            if ( file.getStatus() === 'invalid' ) {
                showError( file.statusText );
            } else {
                // @todo lazyload
                $wrap.text( '预览中' );
                uploader.makeThumb( file, function( error, src ) {
                    var img;

                    if ( error ) {
                        $wrap.text( '不能预览' );
                        return;
                    }

                    if( isSupportBase64 ) {
                        img = $('<img src="'+src+'">');
                        $wrap.empty().append( img );
                    } else {
                        $.ajax('/miniwajiyeyagzxt/Public/hui/lib/webuploader/0.1.5/server/preview.php', {
                            method: 'POST',
                            data: src,
                            dataType:'json'
                        }).done(function( response ) {
                            if (response.result) {
                                img = $('<img src="'+response.result+'">');
                                $wrap.empty().append( img );
                            } else {
                                $wrap.text("预览出错");
                            }
                        });
                    }
                }, thumbnailWidth, thumbnailHeight );

                percentages[ file.id ] = [ file.size, 0 ];
                file.rotation = 0;
            }

            file.on('statuschange', function( cur, prev ) {
                if ( prev === 'progress' ) {
                    $prgress.hide().width(0);
                } else if ( prev === 'queued' ) {
                    $li.off( 'mouseenter mouseleave' );
                    $btns.remove();
                }

                // 成功
                if ( cur === 'error' || cur === 'invalid' ) {
                    console.log( file.statusText );
                    showError( file.statusText );
                    percentages[ file.id ][ 1 ] = 1;
                } else if ( cur === 'interrupt' ) {
                    showError( 'interrupt' );
                } else if ( cur === 'queued' ) {
                    percentages[ file.id ][ 1 ] = 0;
                } else if ( cur === 'progress' ) {
                    $info.remove();
                    $prgress.css('display', 'block');
                } else if ( cur === 'complete' ) {
                    $li.append( '<span class="success"></span>' );
                }

                $li.removeClass( 'state-' + prev ).addClass( 'state-' + cur );
            });

            $li.on( 'mouseenter', function() {
                $btns.stop().animate({height: 30});
            });

            $li.on( 'mouseleave', function() {
                $btns.stop().animate({height: 0});
            });

            $btns.on( 'click', 'span', function() {
                var index = $(this).index(),
                    deg;

                switch ( index ) {
                    case 0:
                        uploader.removeFile( file );
                        return;

                    case 1:
                        file.rotation += 90;
                        break;

                    case 2:
                        file.rotation -= 90;
                        break;
                }

                if ( supportTransition ) {
                    deg = 'rotate(' + file.rotation + 'deg)';
                    $wrap.css({
                        '-webkit-transform': deg,
                        '-mos-transform': deg,
                        '-o-transform': deg,
                        'transform': deg
                    });
                } else {
                    $wrap.css( 'filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ (~~((file.rotation/90)%4 + 4)%4) +')');
                    // use jquery animate to rotation
                    // $({
                    //     rotation: rotation
                    // }).animate({
                    //     rotation: file.rotation
                    // }, {
                    //     easing: 'linear',
                    //     step: function( now ) {
                    //         now = now * Math.PI / 180;

                    //         var cos = Math.cos( now ),
                    //             sin = Math.sin( now );

                    //         $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
                    //     }
                    // });
                }


            });

            $li.appendTo( $queue );
        }

        // 负责view的销毁
        function removeFile( file ) {
            var $li = $('#'+file.id);

            delete percentages[ file.id ];
            updateTotalProgress();
            $li.off().find('.file-panel').off().end().remove();
        }

        function updateTotalProgress() {
            var loaded = 0,
                total = 0,
                spans = $progress.children(),
                percent;

            $.each( percentages, function( k, v ) {
                total += v[ 0 ];
                loaded += v[ 0 ] * v[ 1 ];
            } );

            percent = total ? loaded / total : 0;


            spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
            spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );
            updateStatus();
        }

        function updateStatus() {
            var text = '', stats;

            if ( state === 'ready' ) {
                text = '选中' + fileCount + '张图片，共' +
                        WebUploader.formatSize( fileSize ) + '。';
            } else if ( state === 'confirm' ) {
                stats = uploader.getStats();
                if ( stats.uploadFailNum ) {
                    text = '已成功上传' + stats.successNum+ '张照片至XX相册，'+
                        stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
                }

            } else {
                stats = uploader.getStats();
                text = '共' + fileCount + '张（' +
                        WebUploader.formatSize( fileSize )  +
                        '），已上传' + stats.successNum + '张';

                if ( stats.uploadFailNum ) {
                    text += '，失败' + stats.uploadFailNum + '张';
                }
            }

            $info.html( text );
        }

        function setState( val ) {
            var file, stats;

            if ( val === state ) {
                return;
            }

            $upload.removeClass( 'state-' + state );
            $upload.addClass( 'state-' + val );
            state = val;

            switch ( state ) {
                case 'pedding':
                    $placeHolder.removeClass( 'element-invisible' );
                    $queue.hide();
                    $statusBar.addClass( 'element-invisible' );
                    uploader.refresh();
                    break;

                case 'ready':
                    $placeHolder.addClass( 'element-invisible' );
                    $( '#filePicker2' ).removeClass( 'element-invisible');
                    $queue.show();
                    $statusBar.removeClass('element-invisible');
                    uploader.refresh();
                    break;

                case 'uploading':
                    $( '#filePicker2' ).addClass( 'element-invisible' );
                    $progress.show();
                    $upload.text( '暂停上传' );
                    break;

                case 'paused':
                    $progress.show();
                    $upload.text( '继续上传' );
                    break;

                case 'confirm':
                    $progress.hide();
                    $( '#filePicker2' ).removeClass( 'element-invisible' );
                    $upload.text( '开始上传' );

                    stats = uploader.getStats();
                    if ( stats.successNum && !stats.uploadFailNum ) {
                        setState( 'finish' );
                        return;
                    }
                    break;
                case 'finish':
                    stats = uploader.getStats();
                    if ( stats.successNum ) {
                        alert( '上传成功' );
                    } else {
                        // 没有成功的图片，重设
                        state = 'done';
                        location.reload();
                    }
                    break;
            }

            updateStatus();
        }

        uploader.onUploadProgress = function( file, percentage ) {
            var $li = $('#'+file.id),
                $percent = $li.find('.progress span');

            $percent.css( 'width', percentage * 100 + '%' );
            percentages[ file.id ][ 1 ] = percentage;
            updateTotalProgress();
        };

        uploader.onFileQueued = function( file ) {
            fileCount++;
            fileSize += file.size;

            if ( fileCount === 1 ) {
                $placeHolder.addClass( 'element-invisible' );
                $statusBar.show();
            }

            addFile( file );
            setState( 'ready' );
            updateTotalProgress();
        };

        uploader.onFileDequeued = function( file ) {
            fileCount--;
            fileSize -= file.size;

            if ( !fileCount ) {
                setState( 'pedding' );
            }

            removeFile( file );
            updateTotalProgress();

        };

        uploader.on( 'all', function( type ) {
            var stats;
            switch( type ) {
                case 'uploadFinished':
                    setState( 'confirm' );
                    break;

                case 'startUpload':
                    setState( 'uploading' );
                    break;

                case 'stopUpload':
                    setState( 'paused' );
                    break;

            }
        });

        uploader.onError = function( code ) {
            alert( 'Eroor: ' + code );
        };

        $upload.on('click', function() {
            if ( $(this).hasClass( 'disabled' ) ) {
                return false;
            }

            if ( state === 'ready' ) {
                uploader.upload();
            } else if ( state === 'paused' ) {
                uploader.upload();
            } else if ( state === 'uploading' ) {
                uploader.stop();
            }
        });

        $info.on( 'click', '.retry', function() {
            uploader.retry();
        } );

        $info.on( 'click', '.ignore', function() {
            alert( 'todo' );
        } );

        $upload.addClass( 'state-' + state );
        updateTotalProgress();
    });

})( jQuery );

$(function(){
  var ue = UE.getEditor('editor');
});
</script>
<script type="text/javascript" src="/miniwajiyeyagzxt/Public/ht/js/product.js"></script>
<script>
function upadd(obj){
  // alert('aaa');
  $('#imgs_add').append('<div><input type="file" style="width:160px;" name="files[]" /><a onclick="$(this).parent().remove();" class="btn btn-secondary radius" ">删除</a></div>');
  return false;
}

function getcid(){
  var cateid = $('#cateid').val();
  $.post('<?php echo U("getcid");?>',{cateid:cateid},function(data){
      if(data.catelist!=''){
        var htmls = '<option value="">二级分类</option>';
        var cate = data.catelist;
        for (var i = 0; i<cate.length; i++) {
          htmls += '<option value="'+cate[i].id+'">-- '+cate[i].name+'</option>';
        }
        $('#cid').html(htmls);
        $('#catedesc').html('&nbsp;&nbsp; * 必选项');
      }else{
        $('#cid').html('<option value="">二级分类</option>');
        $('#catedesc').html('&nbsp;&nbsp; * 该分类下还没有二级分类，请先添加');
      }
    },"json");
}

//图片删除
function del_img(img,obj){
  var pro_id = $('#pro_id').val();
  if (confirm('是否确认删除？')) {
    $.post('<?php echo U("img_del");?>',{img_url:img,pro_id:pro_id},function(data){
      if(data.status==1){
        $(obj).parent().remove();
        return false;
      }else{
        alert(data.err);
        return false;
      }
    },"json");
  };
}

function ac_from(){

  var name=document.getElementById('name').value;
  if(name.length<1){
    alert('产品名称不能为空');
    return false;
  } 
  
  var cid=parseInt(document.getElementById("cid").value);
  if(!cid){
    alert("请选择分类.");
    return false;
  }

  // var pid=parseInt(document.getElementById("shop_id").value);
  // if(isNaN(pid) || pid<1){
  //   alert("请选择所属商家");
  //   return false;
  // }
  
}

//根据属性获取属性值
// $('#attr').change(function (){
//   var attr_id = $(this).val();
//   $.ajax({
//     type:'post',
//     url:'<?php echo U("Product/getAttrValue");?>',
//     data:{'attr_id':attr_id},
//     success:function(data){
//       if(data.length > 0){
//         $('#attr_value').removeClass('hid');
//         var html = '<option>选择属性值</option>';
//         for(var i = 0;i < data.length;i++){
//           html += '<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>'; 
//         }
//       }else{
//         $('#attr_value').addClass('hid');
//          // html = '<option>无属性值</option>';
//       }
//       $('#attr_value').html(html);

//     },
//     dataType:'json',
//   });
// });

//根据规格获取规格值
// $('#spec').change(function (){
//   var spec_id = $(this).val();
//   $.ajax({
//     type:'post',
//     url:'<?php echo U("Product/getSpec");?>',
//     data:{'spec_id':spec_id},
//     success:function(data){
//       if(data.length > 0){
//         $('#spec_value').removeClass('hid');
//         var html = '<option>选择规格值</option>';
//         for(var i = 0;i < data.length;i++){
//           html += '<option value="'+data[i]['id']+'">'+data[i]['spec_value']+'</option>'; 
//         }
//       }else{
//         $('#spec_value').addClass('hid');
//          // html = '<option>无规格值</option>';
//       }
//       $('#spec_value').html(html);

//     },
//     dataType:'json',
//   });
// });

function changattr(obj){
  var attr_id = $(obj).val();
  $.ajax({
    type:'post',
    url:'<?php echo U("Product/getAttrValue");?>',
    data:{'attr_id':attr_id},
    success:function(data){
      if(data.length > 0){
         // $(obj).next().removeClass('hid');
        var html = '<option>属性值</option>';
        for(var i = 0;i < data.length;i++){
          html += '<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>'; 
        }
      }else{
        // $(obj).next().addClass('hid');
         html = '<option>无属性值</option>';
      }
       $(obj).next().html(html);

    },
    dataType:'json',
  });

}
function changspec(obj){
  var spec_id = $(obj).val();
  $.ajax({
    type:'post',
    url:'<?php echo U("Product/getSpec");?>',
    data:{'spec_id':spec_id},
    success:function(data){
      if(data.length > 0){
        // $(obj).next().removeClass('hid');
        var html = '<option>规格值</option>';
        for(var i = 0;i < data.length;i++){
          html += '<option value="'+data[i]['id']+'">'+data[i]['spec_value']+'</option>'; 
        }
      }else{
        // $(obj).next().addClass('hid');
         html = '<option>无规格值</option>';
      }
      $(obj).next().html(html);

    },
    dataType:'json',
  });
}
function addPro(){
  var html = '<div class="row cl">';
  html += $('#guei').html();
  html += '</div>';
  $('#guei').after(html);
}

</script>
</body>
</html>