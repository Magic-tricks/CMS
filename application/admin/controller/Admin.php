<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
use think\Db;
use think\Request;

class Admin extends Common
{
    public function lst()
    {
        $adminRes   =   Db::name('admin')
                            ->alias('a')
                            ->join('auth_group g','a.group_id=g.id')
                            ->field('a.id,a.uname,a.create_time,a.last_time,a.status,g.title')
                            ->paginate(5);
        $this->assign([
            'adminRes'  =>  $adminRes
        ]);

        return view();
    }

    public function add()
    {
        if (Request::instance()->isPost())
        {
            $data   =   input('post.');

            //验证
            $validate   =   validate('Admin');
            if (!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }

            $data['password']   =   md5($data['password']);
            $data['create_time']       =   time();
            $data['last_time']  =   time();

            $add    =   Db::name('admin')->insertGetId($data);
            //对应管理员的用户组
            $_data          =   array();
            $_data['uid']   =   $add;
            $_data['group_id']  =   $data['group_id'];
            $addGroupAccess =   Db::name('auth_group_access')->insert($_data);
            if ($add && $addGroupAccess)
            {
                $this->success('添加管理员成功','lst');
            }
            else
            {
                $this->error('添加管理员失败');
            }

        }

        $groupRes   =   Db::name('auth_group')->select();
        $this->assign([
            'groupRes'  =>  $groupRes
        ]);
        return view();
    }

    public function edit()
    {
        if (Request::instance()->isPost())
        {
            $data   =   input('post.');


            if ($data['password'] != '')
            {

                //验证
                $validate   =   validate('Admin');
                if (!$validate->scene('edit')->check($data))
                {
                    $this->error($validate->getError());
                }

                $data['password']      =   md5($data['password']);
                $edit   =   Db::name('admin')->update($data);

                $authGroupAccess  = array();
                $authGroupAccess['group_id']    =   $data['group_id'];
                $authGroupAccessUpdate  =   Db::name('auth_group_access')->where('uid',$data['id'])->update(['group_id'=>$data['group_id']]);

                if ($edit !== false)
                {
                    $this->success('修改管理员成功','lst');
                }
                else
                {
                    $this->error('修改管理员失败');
                }
            }
            else
            {
                $edit   =   Db::name('admin')->where('id',$data['id'])->update(['uname'=>$data['uname'],'group_id'=>$data['group_id']]);
                $authGroupAccess  = array();
                $authGroupAccess['group_id']    =   $data['group_id'];
                $authGroupAccessUpdate  =   Db::name('auth_group_access')->where('uid',$data['id'])->update(['group_id'=>$data['group_id']]);
                if ($edit !== false)
                {
                    $this->success('修改管理员成功','lst');
                }
                else
                {
                    $this->error('修改管理员失败');
                }
            }
        }

        $id     =   input('id');
        $admin  =   Db::name('admin')->field('id,uname,group_id')->find($id);
        $this->assign([
            'admin' =>  $admin
        ]);
        //用户组
        $groupRes   =   Db::name('auth_group')->select();
        $this->assign([
            'groupRes'  =>  $groupRes
        ]);

        return view();
    }

    public function del($id)
    {

        if ($id == 1 )
        {
            $this->error('超级系统管理员不允许删除');
        }
        $del    =   Db::name('admin')->delete($id);
        if ($del)
        {
            $this->success('删除管理员成功','lst','','1');
        }
        else
        {
            $this->error('删除管理员失败');
        }
    }

    public function changeStatus()
    {
        $id         =   input('id');
        $status     =   input('status');
        $admins     =   Db::name('admin')->find($id);
        if ($admins['status'] == 1)
        {
            Db::name('admin')->where('id',$id)->update(['status'=>0]);
        }
        else
        {
            Db::name('admin')->where('id',$id)->update(['status'=>1]);
        }

    }

    public function logout()
    {
        session(null);
        $this->success('退出登录成功','Login/index');
    }

}
