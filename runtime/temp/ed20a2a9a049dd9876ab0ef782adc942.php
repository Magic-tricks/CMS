<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"/Applications/MAMP/htdocs/cms/public/../application/admin/view/cate/lst.htm";i:1556806761;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/head.htm";i:1552488777;s:68:"/Applications/MAMP/htdocs/cms/application/admin/view/common/left.htm";i:1553525442;}*/ ?>
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

    <style>
        .open{
            border:1px solid #ccc;
            padding:0 3px 0 3px;
            cursor:pointer;
        }
    </style>
    
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
                                        <li class="active">栏目管理</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<button type="button" tooltip="添加配置" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('add'); ?>'"> <i class="fa fa-plus"></i> Add
</button>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                    <form action="<?php echo url('Cate/del_sort'); ?>" method="post">
                    <table class="table table-bordered table-hover">
                        <thead class="">
                            <tr pid="0">
                                <th class="text-center">伸缩</th>
                                <th class="text-center">
                                    <label>
                                        <input  class="colored-blue" id="checkAll" name="contactWay[]" value="" type="checkbox">
                                        <input value="false" type="hidden"><span class="text"></span>
                                    </label>
                                </th>

                                <th class="text-center">ID</th>
                                <th class="text-center">栏目名称</th>
                                <th class="text-center">状态</th>
                                <th class="text-center">属性</th>
                                <th class="text-center">所属模型</th>
                                <th class="text-center">排序</th>
                                <th class="text-center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr id="<?php echo $vo['id']; ?>" pid="<?php echo $vo['pid']; ?>">
                                <td align="center"><span class="open">+</span></td>
                                <td align="center">
                                    <label>
                                        <input id="checkAll"  class="colored-blue"  name="itm[]" value="<?php echo $vo['id']; ?>" type="checkbox">
                                        <input value="false" type="hidden"><span class="text"></span>
                                    </label>
                                </td>
                                <td align="center"><?php echo $vo['id']; ?></td>
                                <td align="left"><?php if($vo['pid'] != 0): ?> | <?php endif; ?><?php echo str_repeat('-',$vo['level']*6); ?><a href="<?php echo url('content/lst',['cate_id'=>$vo['id'],'model_id'=>$vo['model_id']]); ?>"><?php echo $vo['cate_name']; ?></a> <a><button style="float: right" type="button" tooltip="添加配置" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('add',['cateid'=>$vo['id']]); ?>'"> <i class="fa fa-plus"></i> 添加子栏目</a> </td>
                                <td align="center"><a href="javascript:;" onclick="ajaxUpdate(this)" cateid="<?php echo $vo['id']; ?>"  <?php if($vo['status'] == 1): ?>class="btn-primary btn-sm shiny" <?php else: ?>class="btn btn-danger btn-sm shiny"<?php endif; ?>><?php if($vo['status'] == 1): ?>显示 <?php else: ?> 隐藏<?php endif; ?></a> </td>
                                <td align="center"><?php if($vo['cate_attr'] == 1): ?> 列表栏目 <?php elseif($vo['cate_attr'] == 2): ?> 频道封面<?php else: ?> 链接栏目<?php endif; ?></td>
                                <td align="center"><?php echo $vo['model_name']; ?></td>
                                <td align="center">
                                    <input name="sort[<?php echo $vo['id']; ?>]" type="text" value="<?php echo $vo['sort']; ?>" style="width:50px;text-align:center">
                                </td>
                                <td align="center" width="15%">
                                    <a href="<?php echo url('edit',['cateid'=>$vo['id']]); ?>" class="btn btn-primary btn-sm shiny">
                                        <i class="fa fa-edit"></i> 编辑
                                    </a>
                                    <a  onclick="ajaxdel(this)" id="<?php echo $vo['id']; ?>" class="btn btn-danger btn-sm shiny">
                                        <i class="fa fa-trash-o"></i> 删除
                                    </a>
                                </td>

                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                        </tbody>
                    </table>
                        <div style="padding: 10px 10px;position: relative;left: 76%;">
                            <button  type="submit" class="btn btn-primary">保存信息</button>
                        </div>
                    </form>
                    <div style="margin-top: 10px;text-align: right">

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

	    <!--Basic Scripts--> <!--先引入jquery再引入layer-->
    <script src="http://localhost/cms/public/static/admin/style/jquery_002.js"></script>
    <script src="http://localhost/cms/public/static/admin/plus/layer/layer.js"></script>
    <script src="http://localhost/cms/public/static/admin/style/bootstrap.js"></script>
    <script src="http://localhost/cms/public/static/admin/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="http://localhost/cms/public/static/admin/style/beyond.js"></script>
    


</body></html>
<script type="text/javascript">
    //传递自身对象,实现ajax异步请求更新数据，（更新状态信息）
    function ajaxUpdate(o) {
            var cateid=$(o).attr("cateid");//$(o)表示自身 attr可以获取自身某个属性值,自身属性可以自定义值
            $.ajax({
                url:"<?php echo url('Cate/changeStatus'); ?>",
                dataType:"json",
                data:{"cateid":cateid},
                type:"POST",
                success:function(data) {

                    if (data == 1)
                    {
                        $(o).attr("class","btn btn-danger btn-sm shiny");
                        $(o).text("隐藏");
                    }
                    else
                    {
                        $(o).attr("class","btn-primary btn-sm shiny");
                        $(o).text("显示");
                    }
                }

            })
    }

    //单击复选框全选按钮
    $("#checkAll").click(function(){
        if($("#checkAll").attr("checked"))
        {
            //假如单选按钮已经checked,则表示要取消选择
            $(".colored-blue").removeAttr("checked");
        }
        else
        {
            //单选按钮没有checked,则单击需要全选
            $(".colored-blue").attr("checked","checked");
        }
    })


    //点击显示伸缩子栏目
    $("tr[pid!=0]").hide();
    $('.open').click(function(){
        //id获取的是当前点击的tr的id
        var id =$(this).parents('tr').attr('id');
      if($(this).text() == '+')
      {
          $(this).text('-');
          //tr的pid = 当前点击的tr的id,则为子栏目,显示
          $('tr[pid ='+id+']').show();
      }
      else {
          $(this).text('+');
          //tr的pid = 当前点击的tr的id,则为子栏目,隐藏
          $('tr[pid ='+id+']').hide();
          $.ajax({
              type:"POST",
              dataType:"json",
              data:{cateid:id},
              url:"<?php echo url('Cate/ajaxLst'); ?>",
              success:function(data){
                   var sonIds=[];//存放所有非顶级的栏目的id数组
                   var idobj=$("tr[pid!=0]");//获取所有非顶级栏目
                   idobj.each(function(k,v){
                       //遍历非顶级栏目数组,存放id
                       sonIds.push($(this).attr('id'));
                  });
                   //遍历返回的数据
                   $.each(data,function(k,v){
                    if($.inArray(v,sonIds))
                    {
                        //返回的数组中有在非顶级栏目的id数组中,则为点击栏目的子栏目
                        $('tr[id='+v+']').hide();
                        //使子栏目符号为+
                        $('tr[id='+v+']').find('span:first').text('+');
                    }
                   });
              }
          });
      }

    })
</script>

//AJAX删除模型
<script>
    function ajaxdel(o){
        layer.confirm('确认要删除该模型吗?', {icon: 3, title: '提示'}, function (index) {
            var id=$(o).attr('id');
            $.ajax({
                url: "<?php echo url('Cate/del'); ?>",
                type: "POST",
                data: {
                    'cateid':id
                },
                async: true,
                dataType: "json",
                success: function (data) {
                    if (data == 1) {
                        layer.msg('删除模型成功',{icon: 1});
                        window.location.href="<?php echo url('Cate/lst'); ?>";
                    }
                    else {
                        layer.msg('删除模型失败...',{icon: 2});
                    }
                }

            })

            layer.close(index);
        });

    }

</script>