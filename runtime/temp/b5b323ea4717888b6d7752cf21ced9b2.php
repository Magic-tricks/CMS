<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/Applications/MAMP/htdocs/cms/public/../application/admin/view/model_fields/add.htm";i:1547308731;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/head.htm";i:1552488777;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/left.htm";i:1553525442;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>叶子空间</title>

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
                        <a href="#">系统</a>
                    </li>
                                        <li>
                        <a href="<?php echo url('model_fields/lst'); ?> ">字段管理</a>
                    </li>
                                        <li class="active">添加字段</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">新增字段</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="" method="post">

                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">所属模型</label>
                            <div class="col-sm-6">
                                <select name="model_id">
                                    <option value="0">选择模型</option>
                                    <?php if(is_array($modelRes) || $modelRes instanceof \think\Collection || $modelRes instanceof \think\Paginator): $i = 0; $__LIST__ = $modelRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$modelRes): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $modelRes['id']; ?>"><?php echo $modelRes['model_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">中文名称</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="username" placeholder="" name="field_cname" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">英文名称</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="username" placeholder="" name="field_ename" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <!--字段类型：1：单行文本 2：单选按钮 3：复选框 4：下拉菜单 5:文本域 6：附件 7：浮点 8：整型 9：长文本类型 longtext-->
                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">字段类型</label>
                            <div class="col-sm-6">
                                <select name="field_type">
                                    <option value="1">单行文本</option>
                                    <option value="2">单选按钮</option>
                                    <option value="3">复选框</option>
                                    <option value="4">下拉菜单</option>
                                    <option value="5">文本域</option>
                                    <option value="6">附件</option>
                                    <option value="7">浮点</option>
                                    <option value="8">整型</option>
                                    <option value="9">长文本类型</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">可选值</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="field_values">

                                </textarea>
                            </div>
                            <p class="help-block col-sm-4 red">不同选项以，分隔</p>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" onclick="return isSelect()">保存信息</button>
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
    <script src="http://localhost/cms/public/static/admin/style/jquery_002.js"></script>
    <script src="http://localhost/cms/public/static/admin/style/bootstrap.js"></script>
    <script src="http://localhost/cms/public/static/admin/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="http://localhost/cms/public/static/admin/style/beyond.js"></script>
    


</body>
</html>

<script>
    function isSelect() {
        var isSet = $("select[name='model_id']").val();
        if (isSet == 0)
        {
            layer.msg('请选择所属模型~',{icon: 2});
            return false;
        }
    }
</script>