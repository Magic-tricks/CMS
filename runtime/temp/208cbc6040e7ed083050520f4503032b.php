<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/Applications/MAMP/htdocs/cms/public/../application/admin/view/auth_group/power.htm";i:1556887554;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/head.htm";i:1552488777;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/left.htm";i:1553525442;}*/ ?>
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
                                        <li>
                        <a href="<?php echo url('AuthGroup/lst'); ?>">用户组权限管理</a>
                    </li>
                                        <li class="active">添加用户组权限</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">新增用户组权限</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="" method="post">
                        <input type="hidden" value="<?php echo $authGroup['id']; ?>" name="id">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">用户组权限名</label>
                            <div class="col-sm-6">
                                <input class="form-control" value="<?php echo $authGroup['title']; ?>" placeholder="" name="title" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>



                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">分配权限</label>
                            <div class="col-sm-6">

                                <div class="well with-header  with-footer">
                                    <div class="header bg-blue">
                                        <label style="padding-right: 15px">
                                            <input id="chkAll" onclick="CheckAll(this.form)" value="全选" class="colored-success checkbox-parent" type="checkbox">
                                            <input type="hidden" value="false">
                                            <span class="text">权限全选</span>
                                        </label>
                                    </div>
                                    <table class="table table-hover">

                                        <tbody>
                                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): ?>

                                        <tr>
                                            <td>
                                                <label style="padding-right: 15px">
                                                    <input <?php if(in_array($vo['id'],$rules)){ echo 'checked="checked"'; } ?> id="<?php echo $vo['id']; ?>" value="<?php echo $vo['id']; ?>" name="rules[]" dataid="id-<?php echo $vo['id']; ?>"  class="colored-success checkbox-parent" type="checkbox">
                                                    <input  type="hidden" value="false">
                                                    <span class="text"> <?php echo $vo['title']; ?></span>
                                                </label>
                                            </td>

                                        </tr>

                                            <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$vo2): ?>
                                            <tr>
                                                <td style="padding-left: 30px;">
                                                    <label style="padding-right: 15px">
                                                        <input <?php if(in_array($vo['id'],$rules)){ echo 'checked="checked"'; } ?>  class="colored-success checkbox-parent checkbox-child" id="<?php echo $vo2['id']; ?>" value="<?php echo $vo2['id']; ?>" name="rules[]"  dataid="id-<?php echo $vo['id']; ?>-<?php echo $vo2['id']; ?>" type="checkbox" >
                                                        <input  type="hidden" value="false">
                                                        <span class="text"><?php echo $vo2['title']; ?></span>
                                                    </label>
                                                </td>

                                            </tr>

                                                <?php if(isset($vo2['children'])):?>
                                                <tr>
                                                    <td style="padding-left: 60px;">
                                                        <?php if(is_array($vo2['children']) || $vo2['children'] instanceof \think\Collection || $vo2['children'] instanceof \think\Paginator): if( count($vo2['children'])==0 ) : echo "" ;else: foreach($vo2['children'] as $key=>$vo3): ?>
                                                        <label style="padding-right: 15px">
                                                            <input <?php if(in_array($vo['id'],$rules)){ echo 'checked="checked"'; } ?> class="colored-success checkbox-child" id="<?php echo $vo3['id']; ?>" value="<?php echo $vo3['id']; ?>" name="rules[]" dataid="id-<?php echo $vo['id']; ?>-<?php echo $vo2['id']; ?>-<?php echo $vo3['id']; ?>" type="checkbox">
                                                            <input  type="hidden" value="false">
                                                            <span class="text"><?php echo $vo3['title']; ?></span>
                                                        </label>
                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </td>

                                                </tr>
                                                <?php endif;endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
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
    <script src="http://localhost/cms/public/static/admin/style/jquery_002.js"></script>
    <script src="http://localhost/cms/public/static/admin/style/bootstrap.js"></script>
    <script src="http://localhost/cms/public/static/admin/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="http://localhost/cms/public/static/admin/style/beyond.js"></script>
    


</body></html>

<script type="text/javascript">
    /*（全选） 多选判断 */
    function CheckAll(form) {
        for (var i = 0; i < form.elements.length; i++) {
            var e = form.elements[i];
            if (e.Name != 'chkAll' && e.disabled == false) {
                e.checked = form.chkAll.checked;
            }
        }
    }
</script>

<script type="text/javascript">
    /* 权限配置 */
    $(function () {
        //动态选择框，上下级选中状态变化
        $('input.checkbox-parent').on('change', function () {
            var dataid = $(this).attr("dataid");
            $('input[dataid^=' + dataid + ']').prop('checked', $(this).is(':checked'));
        });
        $('input.checkbox-child').on('change', function () {
            var dataid = $(this).attr("dataid");
            dataid = dataid.substring(0, dataid.lastIndexOf("-"));
            var parent = $('input[dataid=' + dataid + ']');
            if ($(this).is(':checked')) {
                parent.prop('checked', true);
                //循环到顶级
                while (dataid.lastIndexOf("-") != 2) {
                    dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                    parent = $('input[dataid=' + dataid + ']');
                    parent.prop('checked', true);
                }
            } else {
                //父级
                if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                    parent.prop('checked', false);
                    //循环到顶级
                    while (dataid.lastIndexOf("-") != 2) {
                        dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                        parent = $('input[dataid=' + dataid + ']');
                        if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                            parent.prop('checked', false);
                        }
                    }
                }
            }
        });
    });
</script>
