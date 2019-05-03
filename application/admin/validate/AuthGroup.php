<?php
namespace app\admin\validate;
use think\Validate;
class AuthGroup extends Validate
{
    protected $rule=[
        'title' =>'require|unique:auth_group',
        'status'    =>  'require|number'
    ];


    protected $message=[
        'title.require'=>'用户组必须填写',
        'title.unique'=>'用户组不能重复',
        'status.number'   =>'用户组状态必须是数字 ',
        'status.require'   =>'用户组状态必须填写'
    ];

    protected $scene=[
        'add'   => ['title','status'],
        //add方法，model_name，如果不写，则按照$rule用户组中写的全部验证
        'edit'  => ['title','status']
    ];
}