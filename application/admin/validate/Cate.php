<?php
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate
{
    protected $rule=[
        'model_id' =>'require|number',
        'pid' =>'require|number',
        'cate_name'  =>'require|unique:cate',
        'cate_attr'  =>'require|number'
    ];


    protected $message=[
        'model_id.require'=>'模型不得为空',
        'model_id.number'=>'模型id必须为数字',
        'pid.require'  =>  '上级栏目不得为空',
        'pid.number'  =>'上级栏目必须为数字',
        'cate_name.require' =>'栏目名称不得为空',
        'cate_name.unique'   => '栏目名称不得重复',
        'cate_attr.require'   =>'栏目属性不得为空',
        'cate_attr.number'   =>'栏目属性必须为数字'
    ];

    protected $scene=[
        'add'   => ['model_id','pid','cate_name','cate_attr'],
        //add方法，catename指定验证require，如果不写，则按照$rule规则中写的全部验证
        'edit'  =>  ['model_id','pid','cate_name','cate_attr']
    ];
}