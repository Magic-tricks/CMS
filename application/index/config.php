<?php
    return[
        'template'               => [
            // 模板引擎类型 支持 php think 支持扩展
            'type'         => 'Think',
            // 模板路径
            'view_path'    => '../template/',
            // 模板后缀
            'view_suffix'  => 'htm',
            // 模板文件名分隔符
            'view_depr'    => DS,
            // 模板引擎普通标签开始标记
            'tpl_begin'    => '{',
            // 模板引擎普通标签结束标记
            'tpl_end'      => '}',
            // 标签库标签开始标记
            'taglib_begin' => '{',
            // 标签库标签结束标记
            'taglib_end'   => '}',
        ],

        // 视图输出字符串内容替换
        'view_replace_str'       => [
            "temp_src" =>  "/cms/template",
            "__INDEX__" =>  "/cms/public/static/index/uploads/img"

        ]

    ];