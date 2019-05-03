<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/1/21
 * Time: 10:39 PM
 */

namespace app\admin\controller;
use QL\QueryList;


class Caiji extends Common
{
    public function index()
    {
        $rule = array(
            'content' => array('b', 'text','',function($content){
                return str_replace('2018','2019',$content);
            }),
        );
        //需要采集的URL
        $url  = 'http://www.ygdy8.net/html/gndy/china/index.html';
        $data   =   QueryList::get($url)
            ->range('.co_content8')//设置内容区域
            ->encoding('gbk')//设置字符编码
            ->rules($rule)
            ->queryData();
        dump($data);
    }

    public function lst()
    {

    }

}