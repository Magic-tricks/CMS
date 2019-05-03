<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;

class Conf extends Common
{
    public function conflst()
    {
        if(request()->isPost())
        {
            $data=input('post.');
            $confArr=array();//存放提交的配置英文名称
            $enameArr=db('conf')->column('ename');//获取所有配置英文名称
            foreach ($data as $k => $v)
            {
                if(is_array($v))
                {
                    $v=implode(',',$v);
                }
                $confArr[]=$k;
                db('conf')->where('ename',$k)->update(['value'=>$v]);
            }
            //附件类型处理
            $imgColumn=db('conf')->where('dt_type','6')->column('ename');
            foreach ($enameArr as $k => $v)//循环所有的配置名称
            {
                if(!in_array($v,$confArr) && !in_array($v,$imgColumn))//如果提交的配置数组中没有全部配置项中的某个值。则把它置空
                {
                    db('conf')->where('ename',$v)->update(['value'=>'']);
                }
            }

            foreach ($imgColumn as $k => $v)//循环所有附件类型的配置项
            {
                if(!empty($_FILES[$v]['tmp_name']))//如果这个配置项附件有提交，则移动保存附件
                {
                    $file=request()->file($v);
                    $info=$file->move(ROOT_PATH.'public/static/admin/uploads');
                    $imgSrc=$info->getSaveName();
                    db('conf')->where('ename',$v)->update(['value'=>$imgSrc]);
                }
            }
            $this->success('修改配置成功～','conflst');
            return;
        }
        $confRes=db("conf")->select();
        $this->assign("confRes",$confRes);
        return view("conflst");
    }

    public function add()
    {
        if(Request()->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate("Conf");
            if(!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }
            $add=db('conf')->insert($data);
            if($add)
            {
                $this->success('添加配置成功～','Conf/lst');
            }
            else
            {
                $this->error('添加数据失败～');
            }
        }
        return view();
    }

    public function lst()
    {
        $confRes=db("conf")->paginate(5);
        $this->assign("confRes",$confRes);
        return view();
    }

    public function edit($id)
    {
        if(request()->isPost())
        {
            $data=input('post.');
            $validate=Loader::validate("Conf");
            if(!$validate->scene("edit")->check($data))
            {
                $this->error($validate->getError());
            }
            $update=db("conf")->update($data);
            if($update !== false)
            {
                $this->success("修改配置项成功～",'lst');
            }
            else
            {
                $this->error("修改配置项失败！");
            }
        }
        $confs=db("conf")->find($id);
        $this->assign("confs",$confs);
        return view();
    }

    public function del($id)
    {
        $del=db("conf")->delete($id);
        if($del)
        {
            $this->success("删除配置成功～",'lst');
        }
        else
        {
            $this->error("删除配置失败～");
        }
    }
}
