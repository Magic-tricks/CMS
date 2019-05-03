<?php
/**
 * Created by PhpStorm.
 * User: yeyeye
 * Date: 18-9-29
 * Time: 上午11:36
 */

namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use auth\Auth;//权限验证类

class Common extends Controller
{
    public $config;

    public function _initialize()
    {
        //判断是否登录
        if (!session('uname') && !session('id'))
        {
            $this->error('请先登录','Login/index');
        }

        $request=Request::instance();//实例化Request对象
        $con=$request->controller();//控制器名称
        $module =   $request->module();//模块名称
        $action =   $request->action();//操作方法名称
        $this->assign("con",$con);
        //分配配置信息到各控制器
        $this->getConf();

        //用户登录后权限验证
        $auth       =   new Auth();
        //需要验证的规则
        $name       =   $module.'/'.$con.'/'.$action;
//        if (!$auth->check($name,session('id')))
//        {
//            $this->error('没有该操作权限');
//        }

        //隐藏左侧菜单栏，只显示当前用户所属用户组的权限菜单
        $group      =   $auth->getGroups(session('id'));
        $rules      =   explode(',',$group[0]['rules']);
        $menu       =   array();
        $map['pid'] =   ['=',0];
        $map['id']  =   ['in',$rules];
        $map['show']    =   ['=',1];
        $menu       =   Db::name('auth_rule')->where($map)->select();
        $_map['id'] =   ['in',$rules];
        $_map['show']   =   ['=',1];
        //获取下级权限按顺序组成
        foreach ($menu as $key => $value)
        {
            $_map['pid']              = ['=',$value['id']];
            $menu[$key]['children']   = Db::name('auth_rule')
                                        ->where($_map)
                                        ->select();
        }
        $this->assign([
            'menuRes'   =>  $menu,
            'name'      =>  $name
        ]);

    }

    //初始化获取网站配置信息
    public function getConf()
    {
        $confRes     =   [];
        $_confRes    =   Db::name('conf')->field('ename,value')->select();
        foreach ($_confRes as $k => $v)
        {
            $confRes[$v['ename']]    =   $v['value'];
        }
        $this->config   =   $confRes;
    }
}