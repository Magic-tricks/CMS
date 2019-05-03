<?php
namespace app\index\controller;
use think\Db;
use app\index\model\Cate as CateModel;

class Article extends Common
{
    public function index($aid)
    {

        $arts       =   Db::name('archives')->find($aid);
        //查询附加表信息
        $models     =   Db::name('model')->find($arts['model_id']);
        $tableName  =   $models['table_name'];
        //调用文章,查询主表以及附加表信息
        $arts       =   Db::name('archives')->alias('a')->join("$tableName b",'a.id=b.aid')->where('a.id',$aid)->find();

        $cates      =   Db::name('cate')->find($arts['cate_id']);
        $cid        =   $cates['id'];
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


        $cateTemp   =   $cates['article_tmp'];
        $tempSrc    =   $this->confTemp."/{$cateTemp}";

        $this->assign([
            'topCid'    =>  $topCid,
            'cid'        =>   $cid,
            'topCates'   =>   $topCates,
            'sonCateRes' =>   $sonCateRes,
            'pos'        =>   $pos,
            'arts'       =>   $arts,
            'cates'     =>   $cates
        ]);
        return $this->fetch($tempSrc);
    }
}
