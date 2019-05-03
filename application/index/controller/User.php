<?php
namespace app\index\controller;
use think\Controller;
use app\index\controller\Common;
use think\Request;
use app\index\model\Cate;
use think\Db;

class User extends Controller
{
    public function add()
    {
        return 'add';
    }


    public function edit()
    {
        return 'edit';
    }

    public function del()
    {
        return 'del';
    }

}
