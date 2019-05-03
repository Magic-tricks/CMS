<?php
namespace app\admin\validate;
use think\Validate;
class ModelFields extends Validate
{
    protected $rule=[
        'model_id' =>'require',
        'field_type' =>'require',
        'field_cname' =>'require|unique:model_field',
        'field_ename' =>'require|unique:model_field',
    ];


    protected $message=[
        'model_id.require'=>'所属模型必须填写',
        'field_type.require'=>'字段类型不能为空',
        'field_cname.require' =>'字段中文名称不能为空',
        'field_cname.unique' =>'字段中文不能重复',
        'field_ename.require' =>'字段英文名称不能为空',
        'field_ename.unique' =>'字段英文名称不能重复',
    ];

    protected $scene=[
        'add'   => ['model_id','table_name','field_cname','field_ename'],
        //add方法，model_name，如果不写，则按照$rule规则中写的全部验证
        'edit'  => ['model_id','table_name','field_cname','field_ename']
    ];
}