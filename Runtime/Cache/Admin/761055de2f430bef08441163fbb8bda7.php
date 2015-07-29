<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|yershop管理平台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
 <script type="text/javascript" src="/Public/Admin/js/highcharts.js"></script>
<script type="text/javascript" src="/Public/Admin/js/exporting.js"></script>
<script type="text/javascript" src="/Public/Admin/js/data.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"><img src="/Public/Admin/images/logo.png"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (get_nav_url($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			<li><a href="<?php echo get_index_url();?>" target="_blank">网站首页</a></li>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
    <div id="subnav" class="subnav">
    <?php if(!empty($_extra_menu)): ?>
        <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
    <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
        <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
            <ul class="side-sub-menu">
                <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                        <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><?php endif; ?>
        <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
 <h3>
 	<i class="icon <?php if(!in_array((ACTION_NAME), explode(',',"mydocument,draftbox,examine"))): ?>icon-fold<?php endif; ?>"></i>
 	个人中心
 </h3>
 	<ul class="side-sub-menu <?php if(!in_array((ACTION_NAME), explode(',',"mydocument,draftbox,examine"))): ?>subnav-off<?php endif; ?>">
 		<li <?php if((ACTION_NAME) == "mydocument"): ?>class="current"<?php endif; ?>><a class="item" href="<?php echo U('article/mydocument');?>">我的文档</a></li>
 		<?php if(($show_draftbox) == "1"): ?><li <?php if((ACTION_NAME) == "draftbox"): ?>class="current"<?php endif; ?>><a class="item" href="<?php echo U('article/draftbox');?>">草稿箱</a></li><?php endif; ?>
		<li <?php if((ACTION_NAME) == "draftbox"): ?>class="examine"<?php endif; ?>><a class="item" href="<?php echo U('article/examine');?>">待审核</a></li>
 	</ul>

    <?php if(is_array($nodes)): $i = 0; $__LIST__ = $nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
        <?php if(!empty($sub_menu)): ?><h3>
            	<i class="icon <?php if(($sub_menu['current']) != "1"): ?>icon-fold<?php endif; ?>"></i>
            	<?php if(($sub_menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo (U($sub_menu["url"])); ?>"><?php echo ($sub_menu["title"]); ?></a><?php else: echo ($sub_menu["title"]); endif; ?>
            </h3>
            <ul class="side-sub-menu <?php if(($sub_menu["current"]) != "1"): ?>subnav-off<?php endif; ?>">
                <?php if(is_array($sub_menu['_child'])): $i = 0; $__LIST__ = $sub_menu['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li <?php if($menu['id'] == $cate_id or $menu['current'] == 1): ?>class="current"<?php endif; ?>>
                        <?php if(($menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo ($menu["title"]); ?></a><?php endif; ?>

                        <!-- 一级子菜单 -->
                        <?php if(isset($menu['_child'])): ?><ul class="subitem">
                        	<?php if(is_array($menu['_child'])): foreach($menu['_child'] as $key=>$three_menu): ?><li>
                                <?php if(($three_menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo (U($three_menu["url"])); ?>"><?php echo ($three_menu["title"]); ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo ($three_menu["title"]); ?></a><?php endif; ?>
                                <!-- 二级子菜单 -->
                                <?php if(isset($three_menu['_child'])): ?><ul class="subitem">
                                	<?php if(is_array($three_menu['_child'])): foreach($three_menu['_child'] as $key=>$four_menu): ?><li>
                                        <?php if(($four_menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo U('index','cate_id='.$four_menu['id']);?>"><?php echo ($four_menu["title"]); ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo ($four_menu["title"]); ?></a><?php endif; ?>
                                        <!-- 三级子菜单 -->
                                        <?php if(isset($four_menu['_child'])): ?><ul class="subitem">
                                        	<?php if(is_array($four_menu['_child'])): $i = 0; $__LIST__ = $four_menu['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$five_menu): $mod = ($i % 2 );++$i;?><li>
                                            	<?php if(($five_menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo U('index','cate_id='.$five_menu['id']);?>"><?php echo ($five_menu["title"]); ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo ($five_menu["title"]); ?></a><?php endif; ?>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul><?php endif; ?>
                                        <!-- end 三级子菜单 -->
                                    </li><?php endforeach; endif; ?>
                                </ul><?php endif; ?>
                                <!-- end 二级子菜单 -->
                            </li><?php endforeach; endif; ?>
                        </ul><?php endif; ?>
                        <!-- end 一级子菜单 -->
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><?php endif; ?>
        <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- 回收站 -->
	<?php if(($show_recycle) == "1"): ?><h3>
        <em class="recycle"></em>
        <a href="<?php echo U('article/recycle');?>">回收站</a>
    </h3><?php endif; ?>
</div>
<script>
    $(function(){
        $(".side-sub-menu li").hover(function(){
            $(this).addClass("hover");
        },function(){
            $(this).removeClass("hover");
        });
    })
</script>


        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
	<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
	<script type="text/javascript" src="/Public/static/UploadImages.js"></script>
<div class="main-title cf">
		<h2>
			编辑<?php echo (get_document_model($data["model_id"],'title')); ?> [
			<?php if(is_array($rightNav)): $i = 0; $__LIST__ = $rightNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><a href="<?php echo U('article/index','cate_id='.$nav['id']);?>"><?php echo ($nav["title"]); ?></a>
			<?php if(count($rightNav) > $i): ?><i class="ca"></i><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			<?php if(isset($article)): ?>：<a href="<?php echo U('article/index','cate_id='.$data['category_id'].'&pid='.$article['id']);?>"><?php echo ($article["title"]); ?></a><?php endif; ?>
			]
		</h2>
	</div>
	<!-- 标签页导航 -->
<div class="tab-wrap">
	<ul class="tab-nav nav">
		<li data-tab="tab1" class="current"><a href="javascript:void(0);">基础</a></li><li data-tab="tab2" ><a href="javascript:void(0);">扩展</a></li>	</ul>
	<div class="tab-content">
	<!-- 表单 -->
	<form id="form" action="/6666/admin.php?s=/Article/update.html" method="post" class="form-horizontal">
		<!-- 基础文档模型 -->
		<div id="tab1" class="tab-pane in tab1">
            <div class="form-item cf">
                    <label class="item-label">标题<span class="check-tips">（文档标题）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="title" value="<?php echo ($data["title"]); ?>">                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">文章内容<span class="check-tips"></span></label>
                    <div class="controls">
                        <label class="textarea">
                                <textarea name="content"><?php echo ($data["content"]); ?></textarea>
                                <?php echo hook('adminArticleEdit', array('name'=>content,'value'=>content));?>
		                                </label>                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">标识<span class="check-tips">（同一根节点下标识不重复）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="name" value="<?php echo ($data["name"]); ?>">                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">描述<span class="check-tips"></span></label>
                    <div class="controls">
                        <label class="textarea input-large">
                                <textarea name="description"><?php echo ($data["description"]); ?></textarea>
                                </label>                    </div>
                </div>
		
				</div><div id="tab2" class="tab-pane  tab2">
            <div class="form-item cf">
                    <label class="item-label">内容类型<span class="check-tips"></span></label>
                    <div class="controls">
                        <select name="type">
                                    <option value="1" <?php if($data["display"] == 1): ?>checked="checked"<?php endif; ?>>目录</option><option value="2" <?php if($data["display"] == 2): ?>checked="checked"<?php endif; ?>>主题</option><option value="3" <?php if($data["display"] == 3): ?>checked="checked"<?php endif; ?>>段落</option>                                </select>                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">可见性<span class="check-tips"></span></label>
                    <div class="controls">
                        <label class="radio">
                                    <input type="radio" value="0"  name="display" <?php if($data["display"] == 0): ?>checked="checked"<?php endif; ?>>不可见                                	</label><label class="radio">
                                    <input type="radio" value="1"  name="display" <?php if($data["display"] == 1): ?>checked="checked"<?php endif; ?>>所有人可见                                	</label>                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">优先级<span class="check-tips">（越高排序越靠前）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="level" value="<?php echo ($data["level"]); ?>">                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">推荐位<span class="check-tips">（多个推荐则将其推荐值相加）</span></label>
                    <div class="controls">
                        <label class="checkbox">
                                    <input type="checkbox" value="1" name="position[]" <?php if($data["position"] == 1): ?>checked="checked"<?php endif; ?>>列表推荐                                	</label><label class="checkbox">
                                    <input type="checkbox" value="2" name="position[]" <?php if($data["position"] == 2): ?>checked="checked"<?php endif; ?>>频道推荐                                	</label><label class="checkbox">
                                    <input type="checkbox" value="4" name="position[]" <?php if($data["position"] == 4): ?>checked="checked"<?php endif; ?>>首页推荐                                	</label>                    </div>
                </div>
				<div class="form-item cf">
                    <label class="item-label">封面<span class="check-tips">（0-无封面，大于0-封面图片ID，需要函数处理）</span></label>
                    <div class="controls">	
								<div class="controls">
									<input type="file" id="upload_picture_cover_id">
									<input type="hidden" name="cover_id" id="cover_id_cover_id" value="<?php echo ($data[cover_id]); ?>"/>
									<div class="upload-img-box">
									<?php if(!empty($data[cover_id])): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($data[cover_id],'path')); ?>"/></div><?php endif; ?>
									</div>
								</div>
								<script type="text/javascript">
								//上传图片
							    /* 初始化上传插件 */
								$("#upload_picture_cover_id").uploadify({
							        "height"          : 30,
							        "swf"             : "/Public/static/uploadify/uploadify.swf",
							        "fileObjName"     : "download",
							        "buttonText"      : "上传图片",
							        "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
							        "width"           : 120,
							        'removeTimeout'	  : 1,
							        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
							        "onUploadSuccess" : uploadPicturecover_id,
							        'onFallback' : function() {
							            alert('未检测到兼容版本的Flash.');
							        }
							    });
								function uploadPicturecover_id(file, data){
							    	var data = $.parseJSON(data);
							    	var src = '';
							        if(data.status){
							        	$("#cover_id_cover_id").val(data.id);
							        	src = data.url || '' + data.path
							        	$("#cover_id_cover_id").parent().find('.upload-img-box').html(
							        		'<div class="upload-pre-item"><img src="' + src + '"/></div>'
							        	);
							        } else {
							        	updateAlert(data.info);
							        	setTimeout(function(){
							                $('#top-alert').find('button').click();
							                $(that).removeClass('disabled').prop('disabled',false);
							            },1500);
							        }
							    }
								</script>
                           
						 </div>
                </div><div class="form-item cf">
                    <label class="item-label">浏览量<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="view" value="<?php echo ($data["view"]); ?>">                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">评论数<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="comment" value="<?php echo ($data["comment"]); ?>">                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">收藏数<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="bookmark" value="<?php echo ($data["bookmark"]); ?>">                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">创建时间<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" name="create_time" class="text time" value="<?php echo (time_format($data[create_time])); ?>" placeholder="请选择时间" />                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">截至时间<span class="check-tips">（0-永久有效）</span></label>
                    <div class="controls">
                        <input type="text" name="deadline" class="text time" value="<?php echo (time_format($data[deadline])); ?>" placeholder="请选择时间" />                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">外链<span class="check-tips">（0-非外链，大于0-外链ID,需要函数进行链接与编号的转换）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="link_id" value="<?php echo ($data["link_id"]); ?>">                    </div>
                </div><div class="form-item cf">
                    <label class="item-label">详情页显示模板<span class="check-tips">（参照display方法参数的定义）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="template" value="<?php echo ($data["template"]); ?>">                    </div>
                </div>        </div>
		
		<div class="form-item cf">
			<button class="btn submit-btn ajax-post hidden" id="submit" type="submit" target-form="form-horizontal">确 定</button>
			<a class="btn btn-return" href="<?php echo U('article/index?cate_id='.$cate_id);?>">返 回</a>
			<?php if(C('OPEN_DRAFTBOX') and (ACTION_NAME == 'add' or $info['status'] == 3)): ?><button class="btn save-btn" url="<?php echo U('article/autoSave');?>" target-form="form-horizontal" id="autoSave">
				存草稿
			</button><?php endif; ?>
			<input type="hidden" name="id" value="<?php echo ((isset($data["id"]) && ($data["id"] !== ""))?($data["id"]):''); ?>"/>
			<input type="hidden" name="pid" value="<?php echo ((isset($data["pid"]) && ($data["pid"] !== ""))?($data["pid"]):''); ?>"/>
			<input type="hidden" name="model_id" value="<?php echo ((isset($data["model_id"]) && ($data["model_id"] !== ""))?($data["model_id"]):''); ?>"/>
			<input type="hidden" name="category_id" value="<?php echo ((isset($data["category_id"]) && ($data["category_id"] !== ""))?($data["category_id"]):''); ?>">
		</div>
	</form>
	</div>
</div>


        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.yershop.com" target="_blank">YerShop</a>商城系统</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/admin.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>

    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
			
            $subnav.find("a[href='" + url + "']").parent().addClass("current") ;

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
<link href="/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
<?php if(C('COLOR_STYLE')=='blue_color') echo '<link href="/Public/static/datetimepicker/css/datetimepicker_blue.css" rel="stylesheet" type="text/css">'; ?>
<link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">

Think.setValue("type", <?php echo ((isset($data["type"]) && ($data["type"] !== ""))?($data["type"]):'""'); ?>);
Think.setValue("display", <?php echo ((isset($data["display"]) && ($data["display"] !== ""))?($data["display"]):0); ?>);

$('#submit').click(function(){
	$('#form').submit();
});

$(function(){
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });
    showTab();

	<?php if(C('OPEN_DRAFTBOX') and (ACTION_NAME == 'add' or $data['status'] == 3)): ?>//保存草稿
	var interval;
	$('#autoSave').click(function(){
        var target_form = $(this).attr('target-form');
        var target = $(this).attr('url')
        var form = $('.'+target_form);
        var query = form.serialize();
        var that = this;

        $(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
        $.post(target,query).success(function(data){
            if (data.status==1) {
                updateAlert(data.info ,'alert-success');
                $('input[name=id]').val(data.data.id);
            }else{
                updateAlert(data.info);
            }
            setTimeout(function(){
                $('#top-alert').find('button').click();
                $(that).removeClass('disabled').prop('disabled',false);
            },1500);
        })

        //重新开始定时器
        clearInterval(interval);
        autoSaveDraft();
        return false;
    });

	//Ctrl+S保存草稿
	$('body').keydown(function(e){
		if(e.ctrlKey && e.which == 83){
			$('#autoSave').click();
			return false;
		}
	});

	//每隔一段时间保存草稿
	function autoSaveDraft(){
		interval = setInterval(function(){
			//只有基础信息填写了，才会触发
			var title = $('input[name=title]').val();
			var name = $('input[name=name]').val();
			var des = $('textarea[name=description]').val();
			if(title != '' || name != '' || des != ''){
				$('#autoSave').click();
			}
		}, 1000*parseInt(<?php echo C('DRAFT_AOTOSAVE_INTERVAL');?>));
	}
	autoSaveDraft();<?php endif; ?>

});
</script>

</body>
</html>