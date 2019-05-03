<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


//环境检查
function check_env()
{
    $envArr     =   [
      'os'   =>  ['操作系统','无限制','linux',PHP_OS,'success'],
      'php'  =>  ['php版本','5.3','5.4',PHP_VERSION,'success'],
      'gd'   =>  ['GD库','2.0','2.0','未知','success'],
      'upload'  =>  ['附件上传','无限制','2M','未知','success'],
      'dsk'  =>  ['磁盘空间','100M','>100M','未知','success'],
    ];

    //检查附件上传文件大小限制
    if (@ini_get('file_uploads'))
    {
        $envArr['upload'][3]    =   ini_get('upload_max_filesize');
    }

    //获取磁盘空间大小
    if (function_exists('disk_free_space'))
    {
        //返回的KB，需要转换成MB
        $envArr['dsk'][3]  =   floor(disk_free_space(ROOT_PATH)/(1024*1024)).'M';
    }

    //检测GD库
    $tempArr    =   function_exists('gd_info') ? gd_info() : [];
    if (empty($tempArr))
    {
        $envArr['gd'][3]    =   '未安装';
        $envArr['gd'][4]    =   'error';
        session('error',true);
    }
    else
    {
        $envArr['gd'][3]    =   $tempArr['GD Version'];
    }

    return $envArr;
}


//函数检查
function check_function()
{
    $funArr     =   [
        ['mysql_connect','支持','支持','success'],
        ['fsockopen','支持','支持','success'],
        ['gethostbyname','支持','支持','success'],
        ['file_get_contents','支持','支持','success'],
        ['mb_convert_encoding','支持','支持','success'],
        ['json_encode','支持','支持','success'],
    ];

    foreach ($funArr as $k => $v)
    {
        if (!function_exists($v[0]))
        {
            $funArr[$k][2]  =   '不支持';
            $funArr[$k][3]  =   'error';
            session('error',true);
        }
    }

    return $funArr;
}

//检查目录和文件是否可写
function check_dirFile()
{
    $dirFileArr     =   [
        ['dir','可写','可写','runtime','success'],
        ['dir','可写','可写','public/static/index/uploads','success'],
        ['file','可写','可写','application/config.php','success'],
        ['file','可写','可写','application/database.php','success'],
    ];

    foreach ($dirFileArr as $k => $v)
    {
        if ($v[0] == 'dir')
        {
            if (!is_writable(ROOT_PATH.$v[3]))
            {
                if (is_dir(ROOT_PATH.$v[3]))
                {
                    $dirFileArr[$k][2]  =   '不可写';
                    $dirFileArr[$k][4]  =   'error';
                    session('error',true);
                }
                else
                {
                    $dirFileArr[$k][2]  =   '不存在';
                    $dirFileArr[$k][4]  =   'error';
                    session('error',true);
                }
            }

        }
        else
        {
            if (file_exists(ROOT_PATH.$v[3]))
            {
                if (!is_writable(ROOT_PATH.$v[3]))
                {
                    $dirFileArr[$k][2]  =   '不可写';
                    $dirFileArr[$k][4]  =   'error';
                    session('error',true);
                }
            }
            else
            {
                echo is_writable(ROOT_PATH.$v[3]);die;
                $dirFileArr[$k][2]  =   '不存在';
                $dirFileArr[$k][4]  =   'error';
                session('error',true);
            }

        }
    }

    return $dirFileArr;
}

//创建数据表函数
function create_tables($db,$prefix)
{
    //获取sql语句
    $sql    =   file_get_contents(ROOT_PATH.'data/install/install.sql');
    //替换表前缀
    $original_prefix    =   config('original_prefix');
    $sql    =   str_replace("{$original_prefix}","{$prefix}",$sql);

    //打散为数组
    $sqlArr =   explode(';',$sql);
    //初始页面安装信息
    showMsg('开始安装数据表...','green');
    foreach ($sqlArr as $k => $v)
    {
        $v  =   trim($v);
        //判断sql语句是否为空
        if (empty($v)) continue;
        if (substr($v,0,12) == 'CREATE TABLE')
        {

            $name   =   preg_replace("/^CREATE TABLE `(\w+)` .*/s","\\1",$v);
            $msg    =   "创建数据表{$name}";
            if ($db->execute($v) !== false)
            {
                showMsg($msg.'...创建成功','green');
            }
            else
            {
                showMsg($msg.'...创建失败','red');
                session('error',true);
            }

        }
        else
        {
            $db->execute($v);
        }
    }

}

//实时输出到界面
function showMsg($msg,$class)
{
    echo "<script> showmsg('{$msg}','{$class}') </script>";
    //因系统原因。MAC系统无法实时输出缓存到浏览器，可用windows测试
    ob_flush();
    flush();
    sleep(1);
}
