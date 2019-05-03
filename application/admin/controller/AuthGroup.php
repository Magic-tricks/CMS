<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/1/25
 * Time: 9:25 PM
 */

namespace app\admin\controller;
use think\Db;
use think\Loader;
use think\Request;
use app\admin\model\AuthRule as AuthRuleModel;

class AuthGroup extends Common
{
    public function lst()
    {
        $authGroupRes    =  DB::name('auth_group')->paginate(3);
        $this->assign([
            'authGroupRes'  => $authGroupRes
        ]);
        return view();
    }

    public function add()
    {
        if (Request::instance()->isPost())
        {
            $data     = input('post.');
            //验证
            $validate   =   validate('AuthGroup');
            if (!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }

            $add      = Db::name('auth_group')->insert($data);
            if ($add)
            {
                $this->success('添加用户组成功','lst');
            }
            else
            {
                $this->error('添加用户组失败');
            }
        }
        return view();
    }

    public function edit($id)
    {
        if (Request::instance()->isPost())
        {
            $data   =   input('post.');
            //验证
            $validate   =   validate('AuthGroup');
            if (!$validate->scene('edit')->check($data))
            {
                $this->error($validate->getError());
            }

            $update =   Db::name('auth_group')->update($data);
            if ($update !== false)
            {
                $this->success('修改用户组成功','lst');
            }
            else
            {
                $this->error('修改用户组失败');
            }
        }
        $authGroup  =   Db::name('auth_group')->find($id);
        $this->assign([
            'authGroup' => $authGroup
        ]);
        return view();
    }

    public function del($id)
    {   //删除用户组前，先删除该用户组下的所有管理员
        $delAdmins  =   Db::name('admin')->where('group_id',$id)->delete();
        $del    =   Db::name('auth_group')->delete($id);
        if ($del && $delAdmins)
        {
            $this->success('删除用户组成功','lst');
        }
        else
        {
            $this->error('删除用户组失败');
        }
    }

    //异步修改用户组状态
    public function changeStatus()
    {
        $id =   input('id');
        $authGroup  =   Db::name('auth_group')->field('status')->find($id);
        if ($authGroup['status'] == 1)
        {
            Db::name('auth_group')->where('id',$id)->update(['status'=>0]);
        }
        else
        {
            Db::name('auth_group')->where('id',$id)->update(['status'=>1]);
        }
    }

    //分配权限
    public function power()
    {
        if (Request::instance()->isPost())
        {
            $data   =   input('post.');
            $rules  =   implode(',',$data['rules']);
            $save   =   Db::name('auth_group')->where('id',$data['id'])->update(['rules'=>$rules]);
            if ($save !== false)
            {
                $this->success('分配权限成功!');
            }
            else
            {
                $this->error('分配权限失败');
            }
            dump($rules);die;

        }

        //获取所有顶级规则
        $data   =   Db::name('auth_rule')->where('pid','0')->select();
        foreach ($data as $key => $value)
        {
            $data[$key]['children'] =   Db::name('auth_rule')->where('pid','=',$value['id'])->select();
            foreach ($data[$key]['children'] as $k => $v)
            {
                $data[$key]['children'][$k]['children']   =   Db::name('auth_rule')->where('pid',$v['id'])->select();
            }
        }

        $id     =   input('id');
        $authGroups =   Db::name('auth_group')->find($id);
        $rules      =   explode(',',$authGroups['rules']);
        $this->assign([
            'authGroup' =>  $authGroups,
            'data'      =>  $data,
            'rules'     =>  $rules
        ]);
        return view();
    }
}