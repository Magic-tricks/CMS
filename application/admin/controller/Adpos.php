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

class Adpos extends Common
{
    public function lst()
    {
        $adposRes  =   Db::name('adpos')->order('id desc')->paginate(3);
        $this->assign([
            'adposRes'  =>$adposRes
        ]);
        return view();
    }

    public function add()
    {
        if (request()->isPost())
        {
            $data   =   input('post.');
            $validate   =   validate('Adpos');
            if (!$validate->check($data))
            {
                $this->error($validate->getError());
            }
            $add    =   Db::name('adpos')->insert($data);
            if ($add)
            {
                $this->success('添加广告成功','lst','','1');
                return;
            }
            else
            {
                $this->error('添加广告失败');
            }
        }
        return view();
    }

    public function edit($id)
    {
        if (request()->isPost())
        {
            $data       =   input('post.');
            $validate   =   validate('Adpos');
            if (!$validate->check($data))
            {
                $this->error($validate->getError());
            }
            $update     =   Db::name('adpos')->update($data);
            if ($update)
            {
                $this->success('修改成功','lst');
            }
            else
            {
                $this->error('修改失败');
            }
        }

        $dataRes        =   Db::name('adpos')->find($id);
        $this->assign([
            'dataRes'   =>  $dataRes
        ]);
        return view();
    }

    public function del($id)
    {
        $adpos     =   model('Adpos');
        $adRes  =   $adpos::destroy($id);
        if ($adRes)
        {
            $this->success('删除广告位成功 ','lst');
        }
        else
        {
            $this->error('删除广告位失败 ');
        }
    }
}