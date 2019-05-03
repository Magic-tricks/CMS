<?php
namespace app\index\controller;
use think\Config;
use think\Controller;
use think\Db;

class Common extends Controller
{
    protected $confTemp;
    protected $confs;

    public function _initialize()
    {
        $tmpFloder      =   $this->getTemp();
        //获取当前配置项模板的文件夹名称
        $this->confTemp =   config('template.view_path').$this->getTemp();
        $temp_src       =   config('view_replace_str.temp_src').'/'.$tmpFloder;

        //获取顶部导航栏目
        $cateRes        =   $this->getCate(true);
        //获取底部导航栏目
        $cateResBottom        =   $this->getCate(false);
        //配置项数组
        $this->confs    =   $this->getConf();
        $this->assign([
            'temp'  =>  $this->confTemp,
            'temp_static'  =>  $temp_src,
            'cateRes'       =>  $cateRes,
            'cateResBottom' =>  $cateResBottom,
            'confs'         =>  $this->confs
        ]);

    }

    //获取配置项并重新组装
    public function getConf()
    {
        $confRes    =   [];
        $_confRes   =   Db::name('conf')->field('ename,value')->select();
        foreach ($_confRes as $key => $value)
        {
            $confRes[$value['ename']]   =   $value['value'];
        }
        return  $confRes;
    }

    public function getTemp()
    {
        $confTemp   =   Db::name('conf')->where('ename','temp')->field('value')->find();
        return $confTemp['value'];

    }

    public function getCate($bottom=false)
    {
        if ($bottom)
        {
            $where['pid']   =   ['=',0];
            $where['status']=   ['=',1];
            $cateRes    =   Db::name('cate')->where($where)->select();
            foreach ($cateRes as $key => $value)
            {
                $cateRes[$key]['children'] = Db::name('cate')->where(['pid'=>$value['id'],'status'=>1])->select();
            }
            return $cateRes;
        }
        else
        {
            $where['pid']   =   ['=',0];
            $where['bottom_show']   =   ['=',1];
            $cateRes    =   Db::name('cate')->where($where)->select();
            foreach ($cateRes as $key => $value)
            {
                $cateRes[$key]['children'] = Db::name('cate')->where(['pid'=>$value['id'],'status'=>1])->select();
            }
            return $cateRes;
        }

    }

}
