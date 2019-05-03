<?php
namespace app\admin\model;
use think\Model;
class AuthRule extends Model
{
    public function ruleTree($ruleRes)
    {
        //$ruleRes=$this->order("sort desc")->select();
        return $this->sort($ruleRes);
    }
    //实现无限极分类
    public function sort($ruleRes,$pid=0,$level=0)
    {
        static $arr=array();
        foreach($ruleRes as $k => $v)
        {
            if($v['pid'] == $pid)
            {
                $v['level']=$level;
                $arr[]=$v;
                $this->sort($ruleRes,$v['id'],$level+1);
            }
        }
        return $arr;
    }

    //获取子栏目
    public function childrenIds($ruleid)
    {
        $data=$this->field('id,pid')->select();
        return $this->_childrenIds($data,$ruleid);
    }
    //递归查询当前栏目下的子栏目
    private function _childrenIds($data,$ruleid)
    {
        static $arr=array();
        foreach($data as $k => $v)
        {
            //PID=cateid表示当前栏目下的子栏目
            if($v['pid'] == $ruleid)
            {
                $arr[]=$v['id'];
                //递归查询当前栏目下的子栏目下的子栏目...
                $this->_childrenIds($data,$v['id']);
            }
        }
        return $arr;
    }


    //批量删除
    public function pdel($ruleids)
    {
        foreach($ruleids['itm'] as $k => $v)
        {
            $childrenIdsArr[]=$this->childrenIds($v);
            $childrenIdsArr[]=$v;
        }
        foreach ($childrenIdsArr as $k =>$v)
        {
            if(is_array($v))
            {
                foreach($v as $k1 => $v1)
                {
                    $_childrenIdsArr[]=$v1;
                }
            }
            else
            {
                $_childrenIdsArr[]=$v;
            }
        }
        $_childrenIdsArr=array_unique($_childrenIdsArr);
        $this::destroy($_childrenIdsArr);
        return true;
    }
}