<?php
namespace app\install\controller;
use think\Controller;
use think\Request;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        session('step',0);
        session('error',false);

        return view();
    }

    public function step1()
    {

        if (session('step') != 0 && session('step')!=2)
        {
            $this->redirect('index');
        }
        session('step',1);
        session('error',false);

        //环境检查参数
        $envArr =   check_env();

        //函数检查
        $funArr =   check_function();

        //文件目录检查
        $dirFileArr =   check_dirFile();

        $this->assign([
            'envArr'    =>  $envArr,
            'funArr'    =>  $funArr,
            'dirFileArr'    => $dirFileArr
        ]);
        return view();
    }

    public function step2()
    {
        if (Request::instance()->isPost())
        {
            $data   =   input('post.');

            $dbArr  =   $data['db'];
            $adminArr   =   $data['admin'];

            //管理员及数据库信息验证操作
            if(!is_array($adminArr) || empty($adminArr['admin']) || empty($adminArr['password']) || empty($adminArr['rpassword']))
            {
                $this->error('管理员信息不完整，请重试');
            }
            else
            {
                if (!preg_match('/^[a-zA-Z0-9_-]{3,10}$/',$adminArr['admin']))
                {
                    $this->error('账号格式错误');
                }
                else
                {
                    if (!preg_match('/^[a-zA-Z0-9_-]{3,10}$/',$adminArr['password']))
                    {
                        $this->error('密码格式错误');
                    }
                    else
                    {
                        if (!$adminArr['password'] == $adminArr['rpassword'])
                        {
                            $this->error('两次输入密码不一致');
                        }
                        else
                        {
                            $adminArr   =   serialize($adminArr);
                            session('adminArr',$adminArr);
                        }
                    }
                }
            }

            //数据库相关信息检查并连接数据库
            if(!is_array($dbArr) || empty($dbArr['hostname']) || empty($dbArr['database']) || empty($dbArr['type'])|| empty($dbArr['username'])|| empty($dbArr['password'])|| empty($dbArr['prefix'])|| empty($dbArr['hostport']))
            {
                $this->error('数据库信息不完整');
            }
            else
            {
                $_dbArr     =   serialize($dbArr);
                session('db_config',$_dbArr);
                $dbname     =   $dbArr['database'];

                unset($dbArr['database']);
                $db         =   Db::name($dbArr);
                $sql        =   "CREATE DATABASE IF NOT EXISTS {$dbname} DEFAULT CHARACTER SET utf8";
                if ($db->execute($sql))
                {
                    $this->success('创建数据库成功',url('step3',['access'=>'success']));
                }
                else
                {
                    $this->error($db->getError());
                }

            }

        }


        //检查是否是第一步跳转过来的
        if (session('step') !=1 && session('step')!=2)
        {
            $this->redirect('step1');
        }

//        if (session('error'))
//        {
//            $this->error('环境检测未通过，请调整环境后重试');
//        }
        session('step',2);
        return view();
    }

    public function step3()
    {
        if (input('access') != 'success' || session('step') != 2)
        {
            $this->redirect('index');
        }

        session('step',3);
        echo $this->fetch();
        $db_config  =   session('db_config');
        $db_config  =   unserialize($db_config);
        $db         =   Db::connect($db_config);

        //创建数据表
        create_tables($db,$db_config['prefix']);
    }


}