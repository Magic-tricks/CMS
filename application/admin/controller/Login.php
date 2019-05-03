<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/1/25
 * Time: 9:25 PM
 */

namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Loader;
use think\Request;

class Login extends Controller
{
    public function index()
    {
        if (session('uname') && session('id'))
        {
            $this->error('您已登录，不能重复登录');
        }

        if (Request::instance()->isPost())
        {
            $data   =   input('post.');
            if (!captcha_check($data['code']))
            {
                $this->error('验证码错误');
            }

            $loginStatus    =   model('Admin')->login($data);

            if ($loginStatus == 1)
            {
                $this->success('登录成功，正在进行跳转...','Index/index');

            }
            elseif ($loginStatus == 4)
            {
                $this->error('管理员被禁用');
            }
            else
            {
                $this->error('用户名或密码错误');
            }
        }
        return view('login');
    }
}