<?php
namespace app\admin\controller;
use think\Db;
class Model extends Common
{
    public function lst()
    {
        $modelRes=db('model')->order('id desc')->paginate(3);
        //获取系统database配置文件的prefix前缀参数
        $prefix=config('database.prefix');
        $this->assign(['modelRes'=>$modelRes,'prefix'=>$prefix]);
        return view();
    }

    public function add()
    {
        if(request()->isPOst())
        {
            $data=input('post.');
            $validate=validate('Model');
            if(!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }
            $add=db('model')->insert($data);
            if($add)
            {
                $tableName=$data['table_name'];
                $tableName=config("database.prefix").$tableName;
                $sql="create table {$tableName}(aid int unsigned not null) engine=MyISAM DEFAULT  charset=utf8";
                Db::execute($sql);
                $this->success("添加模型成功...",'lst');
            }
            else
            {
                $this->error('添加模型失败');
            }
        }
        return view();
    }

    public function edit($modelId)
    {
        if(request()->isPost())
        {
            $data=input('post.');
            $validate=validate('Model');
            if(!$validate->scene('edit')->check($data))
            {
                $this->error($validate->getError());
            }
            $oldTableName=db('model')->field('table_name')->find($data['id']);
            $save=db('model')->update($data);
            if($oldTableName['table_name'] != $data['table_name']);
            {
                $prefix=config("database.prefix");
                $table_name=$prefix.$data['table_name'];
                $oldTableName=$prefix.$oldTableName['table_name'];
                $sql="alter table {$oldTableName} rename {$table_name}";
                Db::execute($sql);
            }
            if($save !== false)
            {
                $this->success('修改模型成功','lst');
            }
            else
            {
                $this->error('修改模型失败');
            }
        }
        $models=db('model')->find($modelId);
        $this->assign('models',$models);
        return view();
    }

    public function changeStatus()//ajax异步修改显示状态
    {
        if(request()->isAjax())
        {
            $modelid=input("modelid");
            $status=db("model")->field("status")->find($modelid);
            $status=$status['status'];
            if($status == 1)
            {
                db("model")->where("id",$modelid)->update(["status"=>0]);
                echo 1;//由显示改为隐藏;
            }
            else
            {
                db("model")->where("id",$modelid)->update(["status"=>1]);
                echo 2;//由隐藏改为显示;
            }
        }
        else
        {
            $this->error("非法操作");
        }
    }

    //ajax删除模型
    public function ajaxdel()
    {
        $modelId=input('id');
        $tableName=input('table_name');
        //删除模型表记录以及模型
        $del=db('model')->delete($modelId);
        $sql="drop table {$tableName}";
        //Db类可执行原始语句
        $res=Db::execute($sql);
        if($del)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

    }
}
