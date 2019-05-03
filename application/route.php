<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


//\think\Route::rule('demo/:name/:ago/[:language]','index/Index/demo','get',['ext'=>'html'],['name'=>'\w+','ago'=>'\d{1,3}']);

//闭包路由，无需定义hello方法，可直接访问
//\think\Route::get('hello',function(){
//    return '网站维护，暂停访问!';
//});

//注册路由别名
// user 别名路由到 index/user 控制器
//\think\Route::alias('user','index/user',[
//        'ext'=>'html',
//        'except'=>'save,delete',
//    ]);

return [
    //全局配置变量规则
    '__pattern__' => [
        'names' => '\w+'
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':names' => ['index/hello', ['method' => 'post']],
    ],


//    'demo2'  =>  'index/Index/demo2',
//     数组配置路由注册
//    'demo3/:name'  =>  [
//        'index/Index/demo3',
//        ['method'   =>  'get','ext'=>'php',['name'=>'\w+']]
//    ]


//      路由分组
//        '[demo]'    =>[
            //根据参数来路由,ago为参数
//            ':ago'   =>  ['index/Index/demo',['method'=>'get'],['ago'=>'\d{2,3}']],
//            ':str'   =>  ['index/Index/demo2',['method'=>'get'],['str'=>'[a-zA-Z]+']],
//            ':name'  =>  ['index/Index/demo3',['method'=>'get'],['name'=>'0|1']],
//        ]

        //路由别名
//        '__alias__' =>  [
//            'user'  =>  'index/User'
//        ]



];
