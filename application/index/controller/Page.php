<?php
namespace app\index\controller;
use think\Db;
use app\index\model\Cate;

class Page extends Common
{
    public function index($cid)
    {
        //判断是否关闭网站
        if ($this->confs['closesite'] == '关闭')
        {
            $this->error('网站维护中');
        }

        //查询当前栏目的信息
        $cates      =   Db::name('cate')->find($cid);

        //判断指定栏目的跳转
        if ($cates['jump_id'] != 0)
        {
            $cid    =   $cates['jump_id'];
            //查询指定需要跳转的栏目信息
            $cates      =   Db::name('cate')->find($cid);
        }

        //组装模板路径。加载静态资源
        $cateTemp   =   $cates['index_tmp'];
        $tempSrc    =   $this->confTemp."/{$cateTemp}";

        //获取顶级栏目
        $cateModel  =   new Cate();
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
            'topCates'   =>   $topCates,
            'sonCateRes' =>   $sonCateRes,
            //当前栏目的顶级栏目ID,用于判断顶部导航栏目高亮显示
            'topCid'     =>   $topCid,
            //当前栏目id，用户判断左侧导航高亮
            'cid'        =>   $cid,
            'cates'      =>   $cates,
            'pos'        =>   $pos

        ]);
        return $this->fetch($tempSrc);
    }
}
