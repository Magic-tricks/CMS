<?php
namespace app\admin\validate;
use think\Validate;
class Model extends Validate
{
    protected $rule=[
        'model_name' =>'require|unique:Model',
        'table_name' =>'require|unique:Model',
        'status'   =>'require|number',
    ];


    protected $message=[
        'model_name.require'=>'模型名称必须填写',
        'model_name.unique'=>'模型名称不能重复',
        'table_name.require'  =>  '模型名称不能为空',
        'table_name.unique' =>'模型名称不能重复',
        'status.require'   => '状态类型必须填写',
        'status.number'   =>'模型状态必须是数字 '
    ];

    protected $scene=[
        'add'   => ['model_name','table_name','status'],
        //add方法，model_name，如果不写，则按照$rule规则中写的全部验证
        'edit'  => ['model_name','table_name','status']
    ];
}