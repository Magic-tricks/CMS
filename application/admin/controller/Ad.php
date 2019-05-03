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

class Ad extends Common
{
    public function lst()
    {
        $prefix     =   config('database.prefix');
        $adposName  =   $prefix.'adpos';
        $adRes      =   Db::name('ad')
                        ->alias('a')
                        ->join("{$adposName} b",'a.adpos_id = b.id')
                        ->field('a.*,b.name')
                        ->paginate(5);
        $this->assign([
            'adRes'  =>$adRes
        ]);
        return view();
    }

    public function add()
    {
        if (request()->isPost())
        {
            $data   =   input('post.');

            $validate   =   validate('Ad');
            if (!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }

            //指定模型实例
            $ad       =   model('Ad');
            $add      =   $ad->data($data)->save();
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

        $adPosRes   =   Db::name('adpos')->select();
        $this->assign([
            'adPosRes'  =>  $adPosRes
        ]);
        return view();
    }

    public function edit($id)
    {
        if (request()->isPost())
        {
            $data       =   input('post.');

            $validate   =   validate('Ad');
            if (!$validate->scene('edit')->check($data))
            {
                $this->error($validate->getError());
            }

            $ad         =   model('Ad');
            $update     =   $ad::update($data);
            if ($update !== false)
            {
                $this->success('修改成功','lst');
            }
            else
            {
                $this->error('修改失败');
            }
        }

        $ad         =   Db::name('ad')->find($id);
        if ($ad['type'] == 2)
        {
            $adFlashRes     =   Db::name('ad_flash')->where('ad_id',$ad['id'])->select();
            $this->assign([
                'adFlashRes'    =>$adFlashRes
            ]);
        }

        $adPosRes   =   Db::name('adpos')->select();
        $adRes      =   Db::name('ad')->find($id);
        $this->assign([
            'adPosRes'  =>  $adPosRes,
            'adRes'     =>  $adRes
        ]);
        return view();
    }

    public function del($id)
    {
        $ad     =   model('Ad');
        $adRes  =   $ad::destroy($id);
        if ($adRes)
        {
            $this->success('删除广告成功 ','lst');
        }
        else
        {
            $this->error('删除广告失败 ');
        }
    }

    /**
     * 修改广告状态
     */
    public function changeStatus()
    {
        $id         =   input('id');
        $adposId    =   input('adposId');
        $ads        =   Db::name('ad')->find($id);
        if ($ads['on']  == 0)
        {
            Db::name('ad')->where('adpos_id',$adposId)->update(['on'=>0]);
            Db::name('ad')->where('id',$id)->update(['on'=>1]);
        }
        else
        {
            Db::name('ad')->where('id',$id)->update(['on'=>0]);
        }

    }

    /**
     * 异步删除轮换广告记录
     */
    public function ajaxdel()
    {
        $id     = input('id');
        $adFlash    =   Db::name('ad_flash')->find($id);
        $imgSrc     =   $adFlash['fimg_src'];
        $imgSrc     =   INDEXAD.$imgSrc;
        if (file_exists($imgSrc))
        {
            @unlink($imgSrc);
        }
        $del        =   Db::name('ad_flash')->delete($id);
        if ($del)
        {
            echo 1;
        }
        else
        {
            echo 2;
        }
    }
}