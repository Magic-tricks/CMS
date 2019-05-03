<?php
namespace app\admin\validate;
use think\Validate;
class Ad extends Validate
{
    protected $rule=[
        'adpos_id' =>'require|number',
        'ad_name' =>'require|unique:ad',
        'on'   =>'require|number',
        'type'  =>'require|number'
    ];


    protected $message=[
        'adpos_id.require'=>'所属广告位id必须填写',
        'ad_name.unique'=>'广告名称不能重复',
        'adpos_id.number'  =>  '所属广告位必须为数字',
        'ad_name.require' =>'广告名称必须填写',
        'on.require'   => '开启状态必须填写',
        'on.number'   =>'开启状态必须是数字 ',
        'type.require'   =>'广告类型必须填写 ',
        'type.number'   =>'开启状态必须是数字 '

    ];

    protected $scene=[
        'add'   => ['adpos_id','ad_name','on','type'],
        //add方法，model_name，如果不写，则按照$rule规则中写的全部验证
        'edit'  => ['adpos_id','ad_name','on','type'],
    ];
}