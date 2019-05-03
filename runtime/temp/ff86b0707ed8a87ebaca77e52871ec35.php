<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/Applications/MAMP/htdocs/cms/public/../application/admin/view/cate/edit.htm";i:1554992723;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/head.htm";i:1552488777;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/left.htm";i:1553525442;}*/ ?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>童老师ThinkPHP交流群：484519446</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="http://localhost/cms/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/cms/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="http://localhost/cms/public/static/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="http://localhost/cms/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="http://localhost/cms/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="http://localhost/cms/public/static/admin/style/typicons.css" rel="stylesheet">
    <link href="http://localhost/cms/public/static/admin/style/animate.css" rel="stylesheet">
    <script src="http://localhost/cms/public/static/admin/style/jquery_002.js"></script>
    <script src="http://localhost/cms/public/static/admin/plus/layer/layer.js"></script>
    <script src="http://localhost/cms/public/static/admin/plus/uploadify/jquery.uploadify.min.js"></script>
    <script src="http://localhost/cms/public/static/admin/plus/ueditor/ueditor.config.js"></script>
    <script src="http://localhost/cms/public/static/admin/plus/ueditor/ueditor.all.min.js"></script>
    <script src="http://localhost/cms/public/static/admin/plus/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#uploadify").uploadify({
                //指定swf文件
                'swf': "http://localhost/cms/public/static/admin/plus/uploadify/uploadify.swf",
                //后台处理的页面
                'uploader': "<?php echo url('cate/upimg'); ?>",
                'progressData' : 'speed',
                //按钮显示的文字
                'buttonText': '上传文件',
                //按钮样式
                'buttonClass': 'btn btn-azure',
                //显示的高度和宽度，默认 height 30；width 120
                //'height': 15,
                //'width': 80,
                //上传文件的类型  默认为所有文件    'All Files'  ;  '*.*'
                //在浏览窗口底部的文件类型下拉菜单中显示的文本
                'fileTypeDesc': 'Image Files',
                //设定发送数据的name值
                'fileObjName':'img',
                //允许上传的文件后缀
                'onUploadSuccess' : function(file,data,response){
                    var cateimgsrc="http://localhost/cms/public/static/admin/uploads/"+data;
                    var cateimg="<img height='80px' width='200px' src='"+cateimgsrc+"'>";
                    $("#cateimgdiv").show();
                    $("#cateimg").html(cateimg);
                    $("input[name='img']").val(data);

                }
            });
            $("#uploadify-button").removeAttr('style');
            $("#uploadify-button").prepend("<i class=\"fa   fa-cloud-upload \" style=\"padding-right:5px ;: \"></i>");
        });



    </script>
</head>
<body>
	<!-- 头部 -->
    
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="http://localhost/cms/public/static/admin/images/logo.png" alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="http://localhost/cms/public/static/admin/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo \think\Session::get('uname'); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('Admin/logout'); ?>">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('Admin/edit',['id'=>\think\Session::get('id')]); ?>">
                                        修改密码
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

	<!-- /头部 -->

	<div class="main-container container-fluid">
		<div class="page-container">
			            <!-- Page Sidebar -->
            
<div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input class="searchinput" type="text">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->


        <li class="<?php if($con == 'Conf'): ?> open <?php endif; ?>">
            <a href="#" class="menu-dropdown">
                <i class="menu-icon  fa fa-gear"></i>
                <span class="menu-text">系统设置</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Conf/lst'); ?>">
                                    <span class="menu-text">
                                        配置列表                                   </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Conf/conflst'); ?>">
                                    <span class="menu-text">
                                        配置管理                                   </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li class="<?php if($con == 'Admin'): ?> open <?php endif; ?>">
            <a href="<?php echo url('Admin/lst'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">管理员</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Admin/lst'); ?>">
                                    <span class="menu-text">
                                        管理列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>


        <li class="<?php if($con == 'AuthRule' || $con == 'AuthGroup'): ?> open <?php endif; ?>">
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-lock"></i>
            <span class="menu-text">权限配置</span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="<?php echo url('AuthRule/lst'); ?>">
                                    <span class="menu-text">
                                        规则管理                                    </span>
                    <i class="menu-expand"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo url('AuthGroup/lst'); ?>">
                                    <span class="menu-text">
                                        用户组管理                                    </span>
                    <i class="menu-expand"></i>
                </a>
            </li>
        </ul>
        </li>

        <li class="<?php if($con == 'Cate'): ?> open <?php endif; ?>">
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-folder"></i>
            <span class="menu-text">栏目管理</span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="<?php echo url('Cate/lst'); ?>">
                                    <span class="menu-text">
                                        栏目列表                                    </span>
                    <i class="menu-expand"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo url('Cate/add'); ?>">
                                    <span class="menu-text">
                                        栏目添加                                    </span>
                    <i class="menu-expand"></i>
                </a>
            </li>
        </ul>
        </li>

        <li class="<?php if($con == 'Content'): ?> open <?php endif; ?>">
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">文档</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Content/lst'); ?>">
                                    <span class="menu-text">
                                        文章列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li class="<?php if($con == 'Content'): ?> open <?php endif; ?>">
                <a href="<?php echo url('Content/addSelect'); ?>">
                                    <span class="menu-text">
                                        添加文章                                    </span>
                    <i class="menu-expand"></i>
                </a>
                </li>
            </ul>
        </li>

        <li class="<?php if($con == 'Model'): ?> open <?php endif; ?>">
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa  fa-maxcdn"></i>
                <span class="menu-text">模型管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Model/lst'); ?>">
                                    <span class="menu-text">
                                        模型列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Model/add'); ?>">
                                    <span class="menu-text">
                                        添加模型                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <li class="<?php if($con == 'Adpos' || $con == 'Ad'): ?> open <?php endif; ?>">
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa  fa-maxcdn"></i>
            <span class="menu-text">广告管理</span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="<?php echo url('Adpos/lst'); ?>">
                                    <span class="menu-text">
                                        广告位管理                                    </span>
                    <i class="menu-expand"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo url('Ad/lst'); ?>">
                                    <span class="menu-text">
                                        广告管理                                    </span>
                    <i class="menu-expand"></i>
                </a>
            </li>

        </ul>
        </li>

        <li class="<?php if($con == 'ModelFields'): ?> open <?php endif; ?>">
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa  fa-list-ul"></i>
            <span class="menu-text">字段管理</span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="<?php echo url('ModelFields/lst'); ?>">
                                    <span class="menu-text">
                                        字段列表                                    </span>
                    <i class="menu-expand"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo url('ModelFields/add'); ?>">
                                    <span class="menu-text">
                                        添加字段                                    </span>
                    <i class="menu-expand"></i>
                </a>
            </li>

        </ul>
        </li>


        <li class="<?php if($con == 'Note'): ?> open <?php endif; ?>">
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa  fa-bug"></i>
            <span class="menu-text">采集管理</span>
            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="<?php echo url('note/addListRules'); ?>">
                                    <span class="menu-text">
                                        添加采集节点                                    </span>
                    <i class="menu-expand"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo url('note/noteList'); ?>">
                                    <span class="menu-text">
                                        采集节点列表                                   </span>
                    <i class="menu-expand"></i>
                </a>
            </li>

        </ul>
        </li>


        <!--用户登录后，只显示该用户所属权限组的功能菜单-->
        <?php if(is_array($menuRes) || $menuRes instanceof \think\Collection || $menuRes instanceof \think\Paginator): $i = 0; $__LIST__ = $menuRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
        <li <?php $str   = explode('/',$menu['name']);
                  $pcon  = $str[1];
                  if ($con == $pcon) echo 'class="active open"';  ?> >
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa <?php echo $menu['icon']; ?>"></i>
                <span class="menu-text"><?php echo $menu['title']; ?></span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <?php if(is_array($menu['children']) || $menu['children'] instanceof \think\Collection || $menu['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $menu['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menuChild): $mod = ($i % 2 );++$i;?>
                <li  <?php  if (strtolower($name) == strtolower($menuChild['name'])) echo 'class="active"';?> >
                <a href="<?php echo url($menuChild['name']); ?>">
                <span class="menu-text">
                    <?php echo $menuChild['title']; ?>
                </span>
                <i class="menu-expand"></i>
                </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <!--用户登录后，只显示该用户所属权限组的功能菜单-->


    </ul>
    <!-- /Sidebar Menu -->
</div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                                        <li>
                        <a href="<?php echo url('Index/index'); ?>">系统</a>
                    </li>
                                        <li>
                        <a href="<?php echo url('Cate/lst'); ?>">栏目管理</a>
                    </li>
                                        <li class="active">修改栏目</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">

<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">

            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $cates['id']; ?>" name="id" id="cateid">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="widget flat radius-bordered">
                                <div class="widget-header bg-themeprimary">
                                    <span class="widget-caption">栏目修改</span>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main ">
                                        <div class="tabbable">
                                            <ul class="nav nav-tabs  tabs-flat">
                                                <li class="active ">
                                                <a data-toggle="tab" href="#FlatTab-1">基本信息</a></li>
                                                <li class=""><a data-toggle="tab" href="#FlatTab-2">SEO设置</a></li>
                                                <li class=""><a data-toggle="tab" href="#FlatTab-3">栏目内容</a></li>
                                            </ul>
                                            <div class="tab-content  tabs-flat">
                                                <div class="active tab-pane" id="FlatTab-1">
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">所属模型:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <select name="model_id" style="width: 140px">
                                                                <?php if(is_array($modelRes) || $modelRes instanceof \think\Collection || $modelRes instanceof \think\Paginator): $i = 0; $__LIST__ = $modelRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mode): $mod = ($i % 2 );++$i;?>
                                                                <option <?php if($cates['model_id'] == $mode['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $mode['id']; ?>"><?php echo $mode['model_name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">顶级栏目:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <select name="pid" style="width: 140px">
                                                                <option value="0">顶级栏目</option>
                                                                <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cateRes): $mod = ($i % 2 );++$i;?>
                                                                <option <?php if($cates['pid'] == $cateRes['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $cateRes['id']; ?>"><?php echo str_repeat('-',$cateRes['level']*6); ?><?php echo $cateRes['cate_name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            栏目名称:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <input name="cate_name" class="form-control"  type="text" value="<?php echo $cates['cate_name']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            跳转到:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <input name="jump_id" class="form-control"  type="text" value="<?php echo $cates['jump_id']; ?>">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            是否显示到底部导航栏:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <div class="control-group">
                                                                <div style="float: left;" class="radio"><label>
                                                                    <input value="1" <?php if($cates['bottom_show'] == 1): ?>checked="checked" <?php endif; ?> name="bottom_show" type="radio"><span class="text">是</span></label></div>
                                                                <div style="float: left;margin-left: 10px" class="radio">
                                                                    <label>
                                                                        <input value="0" <?php if($cates['bottom_show'] == 0): ?>checked="checked" <?php endif; ?> class="inverted" name="bottom_show" type="radio">
                                                                        <span class="text">否</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="help-bolck red col-lg-1">必填*</p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            隐藏栏目:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <label style="margin-top: 7px">
                                                                <input value="1" <?php if($cates['status'] == 0): ?>  checked="checked" <?php endif; ?> name="status" class="checkbox-slider colored-blue" type="checkbox">
                                                                <span class="text"></span>
                                                            </label>
                                                        </div>
                                                        <p class="help-bolck red col-lg-1">必填*</p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            栏目图片:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <label>
                                                            <span id="uploadify"></span>
                                                            <span class="text"></span>
                                                            <input name="img" value="<?php echo $cates['img']; ?>" type="hidden">
                                                            </label>
                                                            <label>
                                                                <div id="cancel" style="height: 32px" class="uploadify-button btn btn-azure"><span class="uploadify-button-text"><i class="fa  fa-rotate-left " style="padding-right:5px ;: "></i>撤销上传</span></div>
                                                            </label>
                                                        </div>


                                                    </div>
                                                    <div class="form-group" id="cateimgdiv" <?php if($cates['img'] != null): ?> style="display:block;" <?php else: ?>style="display:none;" <?php endif; ?>>
                                                        <label for="username" class="col-sm-2 control-label no-padding-right"></label>
                                                        <div class="col-sm-6">
                                                            <label id="cateimg">
                                                                <?php if($cates['img'] != null): ?>
                                                                <img src="http://localhost/cms/public/static/admin/uploads/<?php echo $cates['img']; ?>" width="200px" height="80px">
                                                                <?php endif; ?>
                                                            </label>
                                                        </div>

                                                    </div>






                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            栏目属性:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <div class="control-group">
                                                                <div style="float: left;" class="radio"><label>
                                                                    <input value="1" <?php if($cates['cate_attr'] == 1): ?>  checked="checked" <?php endif; ?> name="cate_attr" type="radio">
                                                                    <span class="text">列表页栏目(可发布文章)</span>
                                                                </label>
                                                                </div>
                                                                <div style="float: left;margin-left: 10px" class="radio">
                                                                    <label>
                                                                        <input <?php if($cates['cate_attr'] == 2): ?>  checked="checked" <?php endif; ?> value="2"  class="inverted" name="cate_attr" type="radio">
                                                                        <span class="text">频道封面栏目</span>
                                                                    </label>
                                                                </div>

                                                                <div style="float: left;margin-left: 10px" class="radio">
                                                                    <label>
                                                                        <input value="3"  <?php if($cates['cate_attr'] == 3): ?>  checked="checked" <?php endif; ?> class="inverted" name="cate_attr" type="radio">
                                                                        <span class="text">外链栏目</span>
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <p class="help-bolck red col-lg-1">必填*</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            列表页模板:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <input class="form-control"  type="text" name="list_tmp" value="<?php echo $cates['list_tmp']; ?>">
                                                        </div>
                                                        <p class="help-bolck red col-lg-1">必填*</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            频道页模板:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <input class="form-control" type="text" name="index_tmp" value="<?php echo $cates['index_tmp']; ?>">
                                                        </div>
                                                        <p class="help-bolck red col-lg-1">必填*</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            内容页模板:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <input class="form-control" id="Email" type="text" name="article_tmp" value="<?php echo $cates['article_tmp']; ?>">
                                                        </div>
                                                        <p class="help-bolck red col-lg-1">必填*</p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            外链模板:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <input class="form-control" id="Email" type="text" name="link" value="<?php echo $cates['link']; ?>">
                                                        </div>
                                                        <p class="help-bolck red col-lg-2">请以http://开头*</p>
                                                    </div>



                                        </div>
                                                <div class="tab-pane" id="FlatTab-2">
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            栏目标题:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <input class="form-control" name="title" type="text" value="<?php echo $cates['title']; ?>">
                                                        </div>
                                                        <p class="help-bolck red col-lg-1">必填*</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            关键词:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <input class="form-control" name="keywords" type="text" value="<?php echo $cates['keywords']; ?>">
                                                        </div>
                                                        <p class="help-bolck red col-lg-1">必填*</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2">
                                                            描述:
                                                        </label>
                                                        <div class=" col-lg-8">
                                                            <textarea name="desc" cols="50" rows="5"><?php echo $cates['desc']; ?></textarea>
                                                        </div>
                                                    </div>

                                        </div>
                                                <div class="tab-pane" id="FlatTab-3">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                                        <div class="widget flat radius-bordered">
                                                            <div class="widget-body">
                                                                <div class="widget-main no-padding">
                                                                    <textarea id="content" name="content"><?php echo $cates['content']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                            </div></div>                        </div>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">保存信息</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
		</div>
	</div>

	    <!--Basic Scripts-->

    <script src="http://localhost/cms/public/static/admin/style/bootstrap.js"></script>


    <!--Beyond Scripts-->
    <script src="http://localhost/cms/public/static/admin/style/beyond.js"></script>

    <!--引入编辑器-->
    <script src="http://localhost/cms/public/static/admin/plus/ueditor/ueditor.config.js"></script>
    <script src="http://localhost/cms/public/static/admin/plus/ueditor/ueditor.all.min.js"></script>
    <script src="http://localhost/cms/public/static/admin/plus/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        //引入百度编辑器,toolbars:配置编辑器的菜单参数
        UE.getEditor('content',{toolbars:[
            [
                'fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                'directionalityltr', 'directionalityrtl', 'indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment'
            ]

        ],initialFrameWidth: null,initialFrameHeight: 500})
    </script>



</body></html>

<!--撤销文件按钮操作,删除上传的文件-->
<script>
    $(document).ready(function(){
        $("#cancel").click(function(){

                var imgUrl = $("input[name='img']").val();
                //var imgUrl = cateimg.attr("src");
                if (!imgUrl) {
                    layer.msg('请先上传图片', {icon: 2});
                    return false;
                }
                else {

                    layer.confirm('确认撤销文件吗?', {icon: 3, title: '提示'}, function (index) {
                        $.ajax({
                            url: "<?php echo url('Cate/delImg'); ?>",
                            type: "POST",
                            data: {
                                "imgSrc": imgUrl,
                                "cateid": $("#cateid").val()
                            },
                            async: true,
                            dataType: "json",
                            success: function (data) {
                                if (data == 1) {
                                    $("#cateimgdiv").hide();
                                    $("input[name=img]").val('');
                                    layer.msg('文件撤销成功...', {icon: 1});
                                }
                                else {
                                    layer.msg('文件撤销失败...', {icon: 2});
                                }
                            }

                        })

                        layer.close(index);
                    });
                }
        })
    });



    //动态修改所属模版，在顶级栏目选择时修改所属模型和列表模型
    function changetemp()
    {
        var pcateid    =   $("select[name=pid]").find("option:selected").val();
        if(pcateid != 0)
        {
            $.ajax({
                url: "<?php echo url('Cate/cateInfo'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    "cateid": pcateid
                },
                async: true,
                dataType: "json",
                success: function (data) {
                    $("input[name=list_tmp]").val(data.list_tmp);
                    $("input[name=index_tmp]").val(data.index_tmp);
                    $("input[name=article_tmp]").val(data.article_tmp);
                    $("select[name=model_id]").val(data.model_id);
                }

            })
        }
    }
    //获取选择的下拉菜单选定的ID值
    var pcateid    =   $("select[name=pid]").find("option:selected").val();
    //判断是否是点击添加子栏目进来的页面
    if(pcateid != 0 )
    {
        changetemp();
    }
    //发生下拉事件执行函数changetemp()
    $("select[name=pid]").change(function(){
        changetemp();
    });

</script>