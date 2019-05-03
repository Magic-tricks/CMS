<?php
namespace app\index\controller;
use think\Controller;
use app\index\controller\Common;
use think\Request;
use app\index\model\Cate;
use think\Db;

class Index extends Common
{
    public function demo($ago)
    {
        return 'this is demo'.' my'.$ago.'years ago'.' mys favorite language';
    }

    public function demo2($str)
    {
        return 'this is demo2'.$str;
    }

    public function demo3($name)
    {
        return 'hello I am '.$name;
    }

    public function index()
    {
        $cateModel  =   new Cate();
        //关于我们内容
        $about      =   $cateModel->getPageContent(1);
        //技术服务
        $technology =   $cateModel->getPageContent(11);
        //公司新闻
        $news       =   Db::name('archives')->limit(1)->order('id desc')->select();
        //产品中心
        $produces   =   Db::name('archives')->limit(12)->order('id desc')->where("cate_id in (8,9,10)")->select();
        //首页幻灯广告，广告位ID：5,广告ID：13
        $where['id']=   ['=',13];
        $where['on']    =   ['=',1];
        $ads        =   Db::name('ad')->where($where)->find();
        if ($ads['type'] == 1)
        {
            //图片广告
            $adStr  =   '<a href=""><img src="'.$ads['img_src'].'"/></a>';
        }
        else
        {
            //轮播广告
            $link   =   'javascript:;';
            $adStr  =   '';
            $imgRes =   Db::name('ad_flash')->where('ad_id',$ads['id'])->select();
            foreach ($imgRes as $k => $v)
            {
                $v['flink'] == $link ? $link : $link = $v['flink'];
                $adStr .= '<div class="carousel-item"><div class="carousel-img"><a href="'.$link.'" target=""><img src="/cms/public/static/index/ad/'.$v['fimg_src'].'"/></a></div></div>';
            }
        }



        $tempSrc    =   $this->confTemp.'/index.htm';

        $request    =   Request::instance();
        $action     =   $request->action();

        $this->assign([
            'topCid'    =>  $action,
            'about'     =>  $about,
            'technology'=>  $technology,
            'news'      =>  $news,
            'produces'  =>  $produces,
            //广告字符串
            'adStr'     =>  $adStr
        ]);
        return $this->fetch($tempSrc);
    }
}
