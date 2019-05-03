<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/4/12
 * Time: 11:11 PM
 */
namespace app\index\model;
use think\Model;
use think\Db;


class Cate extends Model
{

    //获取面包屑导航（当前位置）
    public function position($cid)
    {
        static $pos    =   [];
        if (empty($pos))
        {
            $cate = Db::name('cate')->field('id,cate_name,pid,cate_attr')->find($cid);
            $pos[]  =   $cate;
        }

        //当前栏目信息
        $cates  =   Db::name('cate')->field('id,cate_name,pid,cate_attr')->find($cid);

        //所有栏目信息
        $cateRes=   Db::name('cate')->field('id,cate_name,pid,cate_attr')->select();

        foreach ($cateRes as $k =>  $v)
        {
            if ($cates['pid']   ==   $v['id'])
            {
                $pos[]  =   $v;
                $this->position($v['id']);
            }
        }
        //翻转数组顺序
        return array_reverse($pos);
    }

    //根据当前栏目id获取顶级栏目id
    public function getTopId($cid)
    {
        $data   =   Cate::select()->toArray();
        return $this->_getTopId($cid,$data);
    }

    public function _getTopId($cid,$data)
    {
        static $topId;
        $cate   =   Cate::find($cid)->toArray();
        if ($cate['pid'] == 0)
        {
            return $cate['id'];
        }
        foreach ($data as $k => $v)
        {
            if ($cate['pid']    ==   $v['id'] )
            {
                $topId  =   $v['id'];
                $this->_getTopId($v['id'],$data);
            }
        }
        return $topId;
    }

    public function getPageContent($cid)
    {
        $cates      =   self::find($cid)->toArray();
        $content    =   strip_tags($cates['content']);
        $content    =   cut_str($content,60);
        return $content;
    }
}