<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"/Applications/MAMP/htdocs/cms/public/../application/admin/view/conf/conflst.htm";i:1541913036;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/head.htm";i:1552488777;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/left.htm";i:1553525442;}*/ ?>
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
                                        <li class="active">配置管理</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    <div class="col-lg-12 col-xs-12">
                        <div class="widget flat radius-bordered">
                            <div class="widget-header bg-themeprimary">
                                <span class="widget-caption"> 配置管理</span>
                            </div>
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" action="" method="post">
                            <div class="widget-body">
                                <div class="widget-main ">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs  tabs-flat">
                                            <li class="active"><a data-toggle="tab" href="#FlatTab-1" aria-expanded="true">基本信息设置</a></li>
                                            <li class=""><a data-toggle="tab" href="#FlatTab-2" aria-expanded="false">联系方式</a></li>
                                            <li class=""><a data-toggle="tab" href="#FlatTab-3" aria-expanded="false">SEO设置</a></li>
                                        </ul>
                                        <div class="tab-content  tabs-flat">
                                             <div class="tab-pane active" id="FlatTab-1">
                                                 <div>

                                                         <?php foreach($confRes as $k => $v ):if($v['cf_type'] ==1 ): if($v['dt_type'] ==1):?>
                                                             <!--单行文本-->
                                                             <div class="form-group">
                                                                 <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                                 </label>
                                                                 <div class=" col-lg-10">
                                                                     <input class="form-control" id="Email" name="<?php echo $v['ename']; ?>" value="<?php echo $v['value']; ?>" type="text" value="">
                                                                 </div>
                                                             </div>
                                                             <?php endif;if($v['dt_type'] ==2): ?>
                                                             <!--单选按钮-->
                                                            <div class="form-group">
                                                             <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                             </label>
                                                             <div class="control-group">
                                                                <?php $valuesArr=explode(",",$v['values']);
                                                                    foreach($valuesArr as $k1 => $v1): ?>
                                                                 <div style="float: left;padding-left: 10px" class="radio">
                                                                     <label>
                                                                         <input value="<?php echo $v1; ?>" <?php if($v1 == $v['value']): ?>checked="checked" <?php endif; ?> name="<?php echo $v['ename']; ?>" type="radio"><span class="text"><?php echo $v1; ?></span>
                                                                     </label></div>
                                                                    <?php endforeach?>
                                                             </div>
                                                            <div style="clear: both;"></div>
                                                            </div>
                                                             <?php endif;if($v['dt_type'] ==3):?>
                                                             <!--复选框-->
                                                             <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                             </label>
                                                             <div class="checkbox">
                                                                 <?php $valuesArr=explode(",",$v['values']);
                                                                        foreach($valuesArr as $v1):?>
                                                                 <label>
                                                                     <input <?php if(strstr($v['value'], ',')){ $valueArr=explode(",",$v['value']); foreach($valueArr as $v2){ if ( $v1 == $v2 ){ echo 'checked="checked"';} } } else { if( $v1 == $v['value'] ) echo 'checked="checked"'; }?> class="colored-blue" id="form-field-checkbox" name="<?php echo $v['ename']; ?>[]" type="checkbox" value="<?php echo $v1; ?>">
                                                                     <input name="<?php echo $v['ename']; ?>" type="hidden" value="false" ><span class="text"><?php echo $v1; ?></span>
                                                                 </label>
                                                                 <?php endforeach;?>
                                                             </div>

                                                             <?php endif;if($v['dt_type'] ==4):?>
                                                             <!--下拉菜单-->
                                                             <div class="form-group">
                                                                 <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                                 </label>
                                                                 <div class=" col-lg-10">
                                                                     <select class="form-control" name="<?php echo $v['ename']; ?>">
                                                                         <option>请选择</option>
                                                                         <?php $valueArr=explode(",",$v['values']);
                                                                                foreach ($valueArr as $v1): ?>
                                                                         <option <?php if($v1 == $v['value']): ?> selected="selected" <?php endif; ?> ><?php echo $v1; ?></option>
                                                                         <?php endforeach;?>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <?php endif;if($v['dt_type'] ==5):?>
                                                             <!--文本域-->
                                                             <div class="form-group">
                                                                 <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                                 </label>
                                                                 <div class=" col-lg-10">
                                                                     <textarea name="<?php echo $v['ename']; ?>" class="form-control"><?php echo $v['value']; ?></textarea>
                                                                 </div>
                                                             </div>
                                                             <?php endif;if($v['dt_type'] ==6):?>
                                                             <!--附件-->
                                                             <div class="form-group">
                                                                 <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                                 </label>
                                                                 <div class=" col-lg-10">
                                                                     <input  name="<?php echo $v['ename']; ?>" type="file" value="" style="float:left">
                                                                     <?php if($v['value']): ?><img width="60px" height="40px" src="http://localhost/cms/public/static/admin/uploads/<?php echo $v['value']; ?>"> <?php else: ?> 暂无缩略图<?php endif; ?>
                                                                 </div>
                                                             </div>
                                                             <?php endif;endif; endforeach;?>

                                                 </div>

                                             </div>

                                            <div class="tab-pane" id="FlatTab-2">                                                <div>

                                                    <?php foreach($confRes as $k => $v ):if($v['cf_type'] == 2): if($v['dt_type'] ==1):?>
                                                <!--单行文本-->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                    </label>
                                                    <div class=" col-lg-10">
                                                        <input class="form-control" id="Email" name="<?php echo $v['ename']; ?>" value="<?php echo $v['value']; ?>" type="text" value="">
                                                    </div>
                                                </div>
                                                <?php endif;if($v['dt_type'] ==2): ?>
                                                <!--单选按钮-->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                    </label>
                                                    <div class="control-group">
                                                        <?php $valuesArr=explode(",",$v['values']);
                                                                    foreach($valuesArr as $k1 => $v1): ?>
                                                        <div style="float: left;padding-left: 10px" class="radio">
                                                            <label>
                                                                <input value="<?php echo $v1; ?>" <?php if($v1 == $v['value']): ?>checked="checked" <?php endif; ?> name="<?php echo $v['ename']; ?>" type="radio"><span class="text"><?php echo $v1; ?></span>
                                                            </label></div>
                                                        <?php endforeach?>
                                                    </div>
                                                    <div style="clear: both;"></div>
                                                </div>
                                                <?php endif;if($v['dt_type'] ==3):?>
                                                <!--复选框-->
                                                <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                </label>
                                                <div class="checkbox">
                                                    <?php $valuesArr=explode(",",$v['values']);
                                                                        foreach($valuesArr as $v1):?>
                                                    <label>
                                                        <input <?php if(strstr($v['value'], ',')){ $valueArr=explode(",",$v['value']); foreach($valueArr as $v2){ if ( $v1 == $v2 ){ echo 'checked="checked"';} } } else { if( $v1 == $v['value'] ) echo 'checked="checked"'; }?> class="colored-blue" id="form-field-checkbox" name="<?php echo $v['ename']; ?>[]" type="checkbox" value="<?php echo $v1; ?>">
                                                        <input  type="hidden" value="false" ><span class="text"><?php echo $v1; ?></span>
                                                    </label>
                                                    <?php endforeach;?>
                                                </div>

                                                <?php endif;if($v['dt_type'] ==4):?>
                                                <!--下拉菜单-->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                    </label>
                                                    <div class=" col-lg-10">
                                                        <select class="form-control" name="<?php echo $v['ename']; ?>">
                                                            <option>请选择</option>
                                                            <?php $valueArr=explode(",",$v['values']);
                                                                                foreach ($valueArr as $v1): ?>
                                                            <option <?php if($v1 == $v['value']): ?> selected="selected" <?php endif; ?> ><?php echo $v1; ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php endif;if($v['dt_type'] ==5):?>
                                                <!--文本域-->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                    </label>
                                                    <div class=" col-lg-10">
                                                        <textarea name="<?php echo $v['ename']; ?>" class="form-control"><?php echo $v['value']; ?></textarea>
                                                    </div>
                                                </div>
                                                <?php endif;if($v['dt_type'] ==6):?>
                                                <!--附件-->
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                    </label>
                                                    <div class=" col-lg-10">
                                                        <input  name="<?php echo $v['ename']; ?>" type="file" value="">
                                                    </div>
                                                </div>
                                                <?php endif;endif; endforeach;?>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="FlatTab-3">
                                                <div>

                                                    <?php foreach($confRes as $k => $v ):if($v['cf_type'] == 3): if($v['dt_type'] ==1):?>
                                                    <!--单行文本-->
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                        </label>
                                                        <div class=" col-lg-10">
                                                            <input class="form-control" id="Email" name="<?php echo $v['ename']; ?>" value="<?php echo $v['value']; ?>" type="text" value="">
                                                        </div>
                                                    </div>
                                                    <?php endif;if($v['dt_type'] ==2): ?>
                                                    <!--单选按钮-->
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                        </label>
                                                        <div class="control-group">
                                                            <?php $valuesArr=explode(",",$v['values']);
                                                                    foreach($valuesArr as $k1 => $v1): ?>
                                                            <div style="float: left;padding-left: 10px" class="radio">
                                                                <label>
                                                                    <input value="<?php echo $v1; ?>" <?php if($v1 == $v['value']): ?>checked="checked" <?php endif; ?> name="<?php echo $v['ename']; ?>" type="radio"><span class="text"><?php echo $v1; ?></span>
                                                                </label></div>
                                                            <?php endforeach?>
                                                        </div>
                                                        <div style="clear: both;"></div>
                                                    </div>
                                                    <?php endif;if($v['dt_type'] ==3):?>
                                                    <!--复选框-->
                                                    <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                    </label>
                                                    <div class="checkbox">
                                                        <?php $valuesArr=explode(",",$v['values']);
                                                                        foreach($valuesArr as $v1):?>
                                                        <label>
                                                            <input <?php if(strstr($v['value'], ',')){ $valueArr=explode(",",$v['value']); foreach($valueArr as $v2){ if ( $v1 == $v2 ){ echo 'checked="checked"';} } } else { if( $v1 == $v['value'] ) echo 'checked="checked"'; }?> class="colored-blue" id="form-field-checkbox" name="<?php echo $v['ename']; ?>[]" type="checkbox" value="<?php echo $v1; ?>">
                                                            <input name="<?php echo $v['ename']; ?>" type="hidden" value="false" ><span class="text"><?php echo $v1; ?></span>
                                                        </label>
                                                        <?php endforeach;?>
                                                    </div>

                                                    <?php endif;if($v['dt_type'] ==4):?>
                                                    <!--下拉菜单-->
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                        </label>
                                                        <div class=" col-lg-10">
                                                            <select class="form-control" name="<?php echo $v['ename']; ?>">
                                                                <option>请选择</option>
                                                                <?php $valueArr=explode(",",$v['values']);
                                                                                foreach ($valueArr as $v1): ?>
                                                                <option <?php if($v1 == $v['value']): ?> selected="selected" <?php endif; ?> ><?php echo $v1; ?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php endif;if($v['dt_type'] ==5):?>
                                                    <!--文本域-->
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                        </label>
                                                        <div class=" col-lg-10">
                                                            <textarea name="<?php echo $v['ename']; ?>" class="form-control"><?php echo $v['value']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <?php endif;if($v['dt_type'] ==6):?>
                                                    <!--附件-->
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2"><?php echo $v["cname"].' :'?>
                                                        </label>
                                                        <div class=" col-lg-10">
                                                            <input  name="<?php echo $v['ename']; ?>" type="file" value="">
                                                        </div>
                                                    </div>
                                                    <?php endif;endif; endforeach;?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   <div style="clear: both;"></div>
                                       <center > <button style="margin-top: 10px" class="btn shiny btn-primary " type="submit">保存信息</button></center>
                                   

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
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
    


</body></html>