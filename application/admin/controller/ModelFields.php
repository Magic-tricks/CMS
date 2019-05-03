<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Validate;

class ModelFields extends Common
{
    public function lst()
    {
        //根据模型查询字段
        $modelId    =   input('modelId');
        $where      =   [];
        if ($modelId)
        {
            $where['model_id']  = ['=',$modelId];
        }

        $fieldRes   =   Db::name('model_field')->where($where)->alias("a")->field('a.*,b.model_name,b.table_name')->join("tp_model b","a.model_id = b.id")->paginate(10);
        $prefix     =   config("database.prefix");
        $this->assign(['fieldRes'   =>  $fieldRes , 'prefix'    =>  $prefix]);
        return view();
    }

    public function add(Request $request)
    {
        if ($request->isPost())
        {
            $data   =   input('post.');
            $tableName  =   Db::name('model')->where('id',$data['model_id'])->field('table_name')->find();
            $tableName  =   config("database.prefix").$tableName['table_name'];
            //过滤中文逗号
            $data['field_values']   =   str_replace('，',',',$data['field_values']);
            $validate   =   validate('model_fields');
            if (!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }
            $add    =   Db::name('model_field')->insert($data);
            if ($add)
            {
                switch ($data['field_type'])
                {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 6:
                        $fieldType  =   'VARCHAR(150) not null default ""';
                        break;
                    case 5:
                        $fieldType  =   'VARCHAR(600) not null default ""';
                        break;
                    case 7:
                        $fieldType  =   'float not null default "0.0"';
                        break;
                    case 8:
                        $fieldType  =   'int not null default "0"';
                        break;
                    case 9:
                        $fieldType  =   'longtext';
                        break;
                    default:
                        $fieldType  =   'VARCHAR(150) not null default""';
                        break;
                }
                $sql    =   "alter table {$tableName} add {$data['field_ename']} {$fieldType}";
                Db::execute($sql);
                $this->success('添加字段成功','lst');
            }
            else
            {
                $this->error('添加字段失败');
            }
        }

        $modelRes   =   Db::name('model')->field('id,model_name')->select();
        $this->assign(['modelRes'   =>  $modelRes]);
        return view();
    }

    public function edit($id)
    {
        if (request()->isPost())
        {
            $data       =   input('post.');
            $fieldRes   =   Db::name('model_field')->alias("a")->field('a.*,b.model_name,b.table_name')->join("tp_model b","a.model_id = b.id")->find($data['id']);
            //获取表名
            $tableName  =   config("database.prefix").$fieldRes['table_name'];
            //获取修改前的字段名
            $oldFieldName   =   $fieldRes['field_ename'];
            //过滤中文，号
            $data['field_values']   =   str_replace('，',',',$data['field_values']);
            $validate   =   validate('model_fields');
            if (!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }
            $save       =   Db::name('model_field')->update($data);
            if ($save)
            {
                switch ($data['field_type'])
                {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 6:
                        $fieldType  =   'VARCHAR(150) not null default ""';
                        break;
                    case 5:
                        $fieldType  =   'VARCHAR(600) not null default ""';
                        break;
                    case 7:
                        $fieldType  =   'float not null default "0.0"';
                        break;
                    case 8:
                        $fieldType  =   'int not null default "0"';
                        break;
                    case 9:
                        $fieldType  =   'longtext';
                        break;
                    default:
                        $fieldType  =   'VARCHAR(150) not null default""';
                        break;
                }
                //$sql    =   "alter table {$tableName} add {$data['field_ename']} {$fieldType}";
                $sql    =   "alter table {$tableName} change {$oldFieldName} {$data['field_ename']} {$fieldType}";
                Db::execute($sql);
                $this->success('修改字段成功','lst');
            }
            else
            {
                $this->error('修改字段失败');
            }
        }
        $modelRes =   Db::name('model')->select();
        $modelFieldRes  =   Db::name('model_field')->find($id);
        $this->assign(['modelRes'   =>$modelRes,'modelFieldRes' =>$modelFieldRes]);
        return view();
    }

    //ajax删除模型
    public function ajaxdel()
    {
        $modelFieldId   =   input('id');
        $prefix         =   config('database.prefix');
        $modelName      =   $prefix . 'model';
        //连表查询所需要的字段名和表名
        $fieldInfo      =   Db::name('model_field')->alias('a')->join("$modelName b",'a.model_id = b.id')->field('a.field_ename,b.table_name')->find($modelFieldId);
        //需要删除的表名
        $tableName      =   $prefix . $fieldInfo['table_name'];
        //需要删除的字段名称
        $fieldName      =   $fieldInfo['field_ename'];
        $sql            =   "alter table {$tableName} drop column {$fieldName}";

        //删除模型表记录以及模型
        $del=db('model_field')->delete($modelFieldId);
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