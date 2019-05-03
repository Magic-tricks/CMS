<?php
namespace app\admin\validate;
use think\Validate;
class AuthRule extends Validate
{
    protected $rule=[
        'title' =>'require|unique:auth_rule',
        'name' =>'require',
        'pid'   =>'require|number',
        'status'    =>  'require|number'
    ];


    protected $message=[
        'title.require'=>'规则名称必须填写',
        'title.unique'=>'规则名称不能重复',
        'name.require'  =>  '规则不能为空',
        'pid.number' =>'上级规则必须为数字',
        'pid.require'   => '上级规则必须填写',
        'status.number'   =>'规则状态必须是数字 ',
        'status.require'   =>'规则状态必须填写'
    ];

    protected $scene=[
        'add'   => ['name','title','pid','status'],
        //add方法，model_name，如果不写，则按照$rule规则中写的全部验证
        'edit'  => ['name','title','pid','status']
    ];
}