<?php
namespace app\admin\validate;
use think\Validate;
class Conf extends Validate
{
    protected $rule=[
        'cname' =>'require|unique:conf|max:60',
        'ename' =>'require|unique:conf|max:60',
        'dt_type'   =>'require',
        'cf_type'   =>'require'
    ];


    protected $message=[
        'cname.require'=>'中文名称必须填写',
        'cname.max'=>'中文名称不能大于60个字符',
        'cname.unique'=>'中文名称不能重复',
        'ename.require'  =>  '英文名称不能为空',
        'ename.min'  =>'英文名称不能超过60个字符',
        'ename.unique' =>'英文名称不能重复',
        'de_type'   => '配置类型必须填写',
        'cf_type'   =>'配置分类必须填写'
    ];

    protected $scene=[
        'add'   => ['cname','ename','dt_type','cf_type'],
        //add方法，catename指定验证require，如果不写，则按照$rule规则中写的全部验证
        'edit'  =>  ['cname','ename','dt_type','cf_type']
    ];
}