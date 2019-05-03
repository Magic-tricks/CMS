<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/2/2
 * Time: 9:18 PM
 */

namespace app\admin\model;
use think\Model;
use think\Db;

class Admin extends Model
{
    public function login($data)
    {
        $uname  =   $data['uname'];
        $password   =   md5($data['password']);
        $admins =   Admin::get(['uname'=>$uname]);
        if ($admins)
        {
            $_password  =   $admins['password'];
            if ($password == $_password)
            {
                if ($admins['status'] == 0)
                {
                    return 4;//管理员被禁用
                }
                session('uname',$data['uname']);
                session('id',$admins['id']);
                return 1;//密码正确可以登录
            }
            else
            {
                return 2;//密码错误
            }
        }
        else
        {
            return 3;//用户名不存在
        }
    }
}