<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/2/2
 * Time: 9:18 PM
 */

namespace app\admin\model;
use think\Model;
use think\Db;

class Ad extends Model
{
    //$field属性为true，则插入操作数据时不检测是否为本模型所拥有的字段，若不为true，则插入存在不是本模型拥有的字段数据会报错
    protected $field    =   true;
    protected static function init()
    {
        //模型前置操作,$ad为模型对象
        Ad::beforeInsert(function ($ad)
        {
            $data   =   input('post.');
            if ($data['type'] == 1)
            {
                if ($_FILES['img_src']['tmp_name'])
                {
                    $file       =   request()->file('img_src');
                    $info       =   $file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                    if ($info)
                    {
                        $img    =   $info->getSaveName();
                        $ad['img_src']  =   $img;
                    }
                }
            }

            if ($data['on'] == 1)
            {
                self::where(['adpos_id'=>$data['adpos_id']])->update(['on'=>0]);
            }
        });

        //模型后置事件,$ad当前模型对象
        Ad::afterInsert(function ($ad)
        {

            $data   =   input('post.');
            if ($data['type'] == 2)
            {
                $files   =   request()->file('fimg_src');
                //判断是否为无图片有链接情况，是则把链接删除
                foreach ($_FILES['fimg_src']['tmp_name'] as $key => $value)
                {
                    if (!$value)
                    {
                        unset($data['flink'][$key]);
                    }
                }
                //重新排序链接，以对应相应图片
                sort($data['flink']);
                foreach ($files as $k   => $file)
                {
                    $info   =   $file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                    if ($info)
                    {
                        $arr    =   array();
                        $arr['ad_id']   =   $ad->id;
                        $arr['fimg_src']    =   $info->getSaveName();
                        $arr['flink']       =   $data['flink'][$k];
                        Db::name('ad_flash')->insert($arr);
                    }
                }
            }
        });

        //删除广告前置事件
        Ad::beforeDelete(function ($ad){
            //获取当前对象的ID
            $aid    =  $ad->data['id'];
            $ads    =   self::find($aid);
            if ($ads['type'] == 1)
            {
                $imgSrc =   $ads['img_src'];
                $imgSrc =   INDEXAD.$imgSrc;
                if (file_exists($imgSrc))
                {
                    @unlink($imgSrc);
                }
            }
            else
            {
                $fimgSrcRes     =   Db::name('ad_flash')
                                    ->where('ad_id',$aid)
                                    ->field('id,fimg_src')
                                    ->select();
                foreach ($fimgSrcRes as $key => $value)
                {
                    $imgSrc =   INDEXAD . $value['fimg_src'];
                    if (file_exists($imgSrc))
                    {
                        @unlink($imgSrc);
                    }
                    Db::name('ad_flash')->where('id',$value['id'])->delete();
                }

            }

        });

        //修改广告前置事件
        Ad::beforeUpdate(function ($ad){
            $data       =   input('post.');


            if ($data['type'] == 1)
            {
                //判断是否有新文件上传
                if ($_FILES['img_src']['tmp_name'])
                {
                    $oldImgSrc      =   INDEXAD.$data['oldImgSrc'];
                    if (file_exists($oldImgSrc))
                    {
                        @unlink($oldImgSrc);
                    }

                    $file       =   request()->file('img_src');
                    $info       =   $file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                    if ($info)
                    {
                        $img    =   $info->getSaveName();
                        self::where('id',$data['id'])->update(['img_src'=>$img]);
                    }
                }

                //判断是否需要启用，如启用则把全部广告禁用
                if ($data['on'] == 1)
                {
                    Ad::where('adpos_id',$data['adpos_id'])->update(['on'=>0]);
                }
            }
            else
            {
                $files   =   request()->file('fimg_src');

                //判断是否为无图片有链接情况，是则把链接删除
                if (isset($_FILES['fimg_src']['tmp_name']))
                {
                    foreach ($_FILES['fimg_src']['tmp_name'] as $key => $value)
                    {
                        if (!$value)
                        {
                            unset($data['flink'][$key]);
                        }
                    }

                    //重新排序链接，以对应相应图片
                    sort($data['flink']);
                    foreach ($files as $k   => $file)
                    {
                        $info   =   $file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                        if ($info)
                        {
                            $arr    =   array();
                            $arr['ad_id']   =   $data['id'];
                            $arr['fimg_src']    =   $info->getSaveName();
                            $arr['flink']       =   $data['flink'][$k];
                            Db::name('ad_flash')->insert($arr);
                        }
                    }
                }


                //修改连接地址
                if(isset($data['old_flink']))
                {
                    foreach ($data['old_flink'] as $key => $value)
                    {
                        Db::name('ad_flash')->where('id',$key)->update(['flink'=>$value]);
                    }
                }
            }


        });
    }
}