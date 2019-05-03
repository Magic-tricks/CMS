<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
    protected $rule=[
        'uname' =>'require|unique:admin',
        'password' =>'require|min:3',
        'group_id'  =>'require'
    ];


    protected $message=[
        'uname.require'=>'管理员名称必须填写',
        'uname.unique'=>'管理员名称不能重复',
        'password.require'  =>  '管理员密码必须填写',
        'password.min' =>'管理员密码最少3位',
        'group_id.require'=>'所属用户组不得为空',

    ];

    protected $scene=[
        'add'   => ['uname','password','group_id'],
        //add方法，model_name，如果不写，则按照$rule规则中写的全部验证
        'edit'  => ['uname','password','group_id'],
    ];
}