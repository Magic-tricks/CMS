<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/Applications/MAMP/htdocs/cms/public/../application/admin/view/content/add.htm";i:1556805692;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/left.htm";i:1553525442;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/head.htm";i:1552488777;}*/ ?>
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


    <!--引入uploadify控件的必要js文件-->
    <script src="http://localhost/cms/public/static/admin/plus/uploadify/jquery.uploadify.min.js"></script>
    <!--使用插件处理上传图片-->
    <script type="text/javascript">
        $(function () {
            $("#uploadify").uploadify({
                //指定swf文件
                'swf': "http://localhost/cms/public/static/admin/plus/uploadify/uploadify.swf",
                //后台处理的页面
                'uploader': "<?php echo url('Upload/contentUpimg'); ?>",
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
                    var imgsrc="/cms/public/static/index/uploads/img/"+data;
                    var img="<img height='80px' width='200px' src='"+imgsrc+"'>";
                    $("#imgdiv").show();
                    $("#img").html(img);
                    $("input[name='litpic']").val(data);

                }
            });
            //因样式问题,需要去除uploadify-button的样式
            $("#uploadify-button").removeAttr('style');
            //添加小图标
            $("#uploadify-button").prepend("<i class=\"fa   fa-cloud-upload \" style=\"padding-right:5px ;: \"></i>");
        });
    </script>


</head>
<body>
	<!-- 头部 -->
    
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
	<!-- /头部 -->
	
	<div class="main-container container-fluid">
		<div class="page-container">
			            <!-- Page Sidebar -->
            
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
                        <a href="<?php echo url('lst'); ?>">文章管理</a>
                    </li>
                                        <li class="active">添加用户</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">新增用户</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" action="" method="post">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">文章标题</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="username" placeholder="" name="title" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">属性</label>

                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        <input  class="colored-blue" id="form-field-checkbox" name="attr[]" type="checkbox" value="头条">
                                        <input type="hidden" value="头条"><span class="text">头条 </span>
                                    </label>
                                    <label>
                                        <input  class="colored-blue" id="form-field-checkbox" name="attr[]" type="checkbox" value="推荐">
                                        <input type="hidden" value="推荐"><span class="text">推荐 </span>
                                    </label>
                                    <label>
                                        <input class="colored-blue" id="form-field-checkbox" name="attr[]" type="checkbox" value="幻灯">
                                        <input type="hidden" value="幻灯"><span class="text">幻灯 </span>
                                    </label>
                                    <label>
                                        <input class="colored-blue" id="form-field-checkbox" name="attr[]" type="checkbox" value="加粗">
                                        <input type="hidden" value="加粗"><span class="text">加粗&nbsp;</span>
                                    </label><label>
                                    <input class="colored-blue" id="form-field-checkbox" name="attr[]" type="checkbox" value="图片">
                                    <input type="hidden" value="图片"><span class="text">图片 </span>
                                </label>

                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                            <div class="col-sm-6">
                                <?php if($cateId != ''): if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cateRes): $mod = ($i % 2 );++$i;if($cateId == $cateRes['id']): ?>
                                <span class="form-control">  <?php echo $cateRes['cate_name']; ?>  </span>
                                <input type="hidden" name="cate_id" value="<?php echo $cateRes['id']; ?>">
                                <?php endif; endforeach; endif; else: echo "" ;endif; else: ?>
                                <select name="cate_id">
                                    <option>请选择栏目</option>
                                    <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cateRes): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $cateRes['id']; ?>"> <?php echo $cateRes['cate_name']; ?> </option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>





                                <?php endif; ?>


                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">关键词</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="username" placeholder="" name="keywords" required="" type="text">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">描述</label>
                            <div class="col-sm-6">
                                <textarea name="description" class="form-control">

                                </textarea>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="username" placeholder="" name="writer" required="" type="text">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">来源</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="username" placeholder="" name="source" required="" type="text">
                            </div>

                        </div>



                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right">
                                缩略图:
                            </label>
                            <div class=" col-lg-8">
                                <label>
                                    <span id="uploadify"></span>
                                    <span class="text"></span>
                                    <input name="litpic" value="" type="hidden">
                                </label>
                                <label>
                                    <div id="cancel" style="height: 32px" class="uploadify-button btn btn-azure"><span class="uploadify-button-text"><i class="fa  fa-rotate-left " style="padding-right:5px ;: "></i>撤销上传</span></div>
                                </label>
                            </div>

                        </div>
                        <div class="form-group" id="imgdiv" style="display:none;">
                            <label for="username" class="col-sm-2 control-label no-padding-right"></label>
                            <div class="col-sm-6">
                                <label id="img">
                                </label>

                            </div>

                        </div>


                        <!--自定义字段开始-->

                        <?php foreach($diyFields as $k => $v):?>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right"><?php echo $v['field_cname']; ?></label>
                            <div class="col-sm-8">
                                <?php switch ($v['field_type'])
                                    {
                                        case 1:
                                        case 7:
                                        case 8:
                                            echo "<input type='text'"." name='".$v['field_ename']."'" .'class="form-control">';
                                        break;
                                        case 2:
                                            if($v['field_values'])
                                            {
                                                $arr    = explode(',',$v['field_values']);
                                                foreach($arr as $key => $value)
                                                {
                                                    echo '<div style="float: left;padding-left: 10px" class="radio"><label>';
                                                    echo "<input type='radio'"." name='".$v['field_ename']."'" ." value='".$value."'".'class="colored-blue">';
                                                    echo '<span class="text">'.$value.'</span>';
                                                    echo "</label> </div>";
                                                }
                                            }
                                        break;
                                        case 3:
                                            if($v['field_values'])
                                            {
                                            $arr    = explode(',',$v['field_values']);
                                            foreach($arr as $key => $value)
                                            {
                                            echo '<div style="float: left;padding-left: 10px" class="checkbox"><label>';
                                            echo "<input type='checkbox'"." name='".$v['field_ename']."[]'" ." value='".$value."'".'class="colored-blue">';
                                            echo '<span class="text">'.$value.'</span>';
                                            echo "</label> </div>";
                                            }
                                            }
                                            break;
                                        case 4:
                                            if($v['field_values'])
                                            {
                                            $arr    = explode(',',$v['field_values']);
                                            echo "<select style='margin-bottom: 10px' class='form-control' name='".$v['field_ename']."'>";
                                            foreach($arr as $key => $value)
                                            {
                                            echo "<option value='".$value."'>".$value."</option>";
                                            }
                                            echo "</select>";
                                            }

                                            break;
                                        case 5:
                                        echo "<textarea"." name='".$v['field_ename']."'" .'class="form-control"> </textarea>';
                                        break;

                                        case 6:
                                        echo "<input type='file' "." name='".$v['field_ename']."'" .'>';
                                        break;

                                        case 9:
                                             echo "<textarea"." name='".$v['field_ename']."'"." id='".$v['field_ename']."'" .'> </textarea>';
                                        break;
                                        default:
                                            echo "<input type='text'"." name='".$v['field_ename']."'" .'>';
                                        break;
                                        }
                                ?>
                            </div>

                        </div>
                        <?php endforeach;?>

                        <!--自定义字段结束-->


                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">内容</label>
                            <div class="col-sm-8">
                                <textarea id="content" name="content"></textarea>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">点击数</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="username" placeholder="" name="click" required="" type="text">
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

    <script src="http://localhost/cms/public/static/admin/style/bootstrap.js"></script>


    <!--Beyond Scripts-->
    <script src="http://localhost/cms/public/static/admin/style/beyond.js"></script>
    


</body></html>

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
                // 'directionalityltr', 'directionalityrtl', 'indent', '|',
                // 'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                // 'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                // 'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment'
            ]

        ],initialFrameWidth: null,initialFrameHeight: 500});

    <?php foreach($longTextFields as $k => $v): ?>


    UE.getEditor(<?php echo "'".$v['field_ename']."'";?>,{toolbars:[
            [
                'fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                // 'directionalityltr', 'directionalityrtl', 'indent', '|',
                // 'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                // 'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                // 'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment'
            ]

        ],initialFrameWidth: null,initialFrameHeight: 500});

        <?php endforeach;?>

</script>
<!--引入编辑器end-->



<!--撤销文件按钮操作,删除上传的文件-->
<script>
    $(document).ready(function(){
        $("#cancel").click(function(){

            var imgUrl = $("input[name='litpic']").val();
            //var imgUrl = cateimg.attr("src");
            if (!imgUrl) {
                layer.msg('请先上传图片', {icon: 2});
                return false;
            }
            else {

                layer.confirm('确认撤销文件吗?', {icon: 3, title: '提示'}, function (index) {
                    $.ajax({
                        url: "<?php echo url('Content/delImg'); ?>",
                        type: "POST",
                        data: {
                            "imgSrc": imgUrl,
                            "cateid": $("#cateid").val()
                        },
                        async: true,
                        dataType: "json",
                        success: function (data) {
                            if (data == 1) {
                                $("#imgdiv").hide();
                                $("input[name=litpic]").val('');
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
    </script>