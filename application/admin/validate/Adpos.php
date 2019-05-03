<?php
namespace app\admin\validate;
use think\Validate;
class Adpos extends Validate
{
    protected $rule=[
        'name' =>'require|unique:adpos',
        'width' =>'require|number',
        'height'   =>'require|number',
    ];


    protected $message=[
        'name.require'=>'广告名称必须填写',
        'name.unique'=>'广告名称不能重复',
        'width.require'  =>  '宽度不能为空',
        'width.number' =>'宽度必须为数字',
        'height.require'   => '高度必须填写',
        'height.number'   =>'高度必须是数字 '
    ];

    protected $scene=[
        'add'   => ['name','width','height'],
        //add方法，model_name，如果不写，则按照$rule规则中写的全部验证
        'edit'  => ['name','width','height']
    ];
}