<?php
namespace app\index\controller;
use think\Db;
use app\index\model\Cate as CateModel;
use app\admin\model\Cate as AdminCate;

class Cate extends Common
{
    public function index($cid)
    {
        $cates      =   Db::name('cate')->find($cid);
        $cateTemp   =   $cates['list_tmp'];
        $tempSrc    =   $this->confTemp."/{$cateTemp}";

        //获取当前栏目下的所有子栏目(顶级栏目显示所有子栏目文章)
        $adminCate  =   new AdminCate();
        $sonId      =   $adminCate->childrenIds($cid);
        $sonId[]    =   $cid;
        $map['cate_id'] =   ['in',$sonId];

        //查询附加表信息
        $models     =   Db::name('model')->find($cates['model_id']);
        $tableName  =   $models['table_name'];

        //调用文章,查询主表以及附加表信息
        $artRes     =   Db::name('archives')->alias('a')->where($map)->join("$tableName b",'a.id=b.aid')->order('a.id desc')->select();

        //获取顶级栏目
        $cateModel  =   new CateModel();
        $topCid     =   $cateModel->getTopId($cid);
        //获取顶级栏目信息
        $topCates   =   Db::name('cate')->find($topCid);


        //获取所有子栏目信息
        $where['pid']   =   ['=',$topCates['id']];
        $where['status']=   ['=',1];
        $sonCateRes =   Db::name('cate')->where($where)->select();

        //获取面包屑导航（当前位置）
        $pos        =   $cateModel->position($cid);

        $this->assign([
            'artRes'    =>  $artRes,
            'topCid'    =>  $topCid,
            'cid'        =>   $cid,
            'topCates'   =>   $topCates,
            'sonCateRes' =>   $sonCateRes,
            'pos'        =>   $pos
        ]);

        return $this->fetch($tempSrc);
    }
}
