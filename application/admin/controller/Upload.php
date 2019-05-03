<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Upload extends Controller
{
    protected $config;

    public function upimg()
    {
        $file=request()->file("img");
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static/admin/uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getSaveName();

                die;
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }


    //异步上传缩略图
    public function contentUpimg()
    {
        $this->getConf();
        $file=request()->file("img");
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static/index/uploads/img');
            if($info){

                if ($this->config['thumb'] == '是')
                {
                    $thumb_width    =   $this->config['thumb_width'];
                    $thumb_height    =   $this->config['thumb_height'];
                    $tmd    =   $this->config['tmd'];
                    //缩略图裁剪方式
                    switch ($this->config['thumb_way'])
                    {
                        case '等比例缩放':
                            $thumb_way  =   1;
                            break;
                        case '缩放后填充':
                            $thumb_way  =   2;
                            break;
                        case '居中裁剪':
                            $thumb_way  =   3;
                            break;
                        case '左上角裁剪':
                            $thumb_way  =   4;
                            break;
                        case '右下角裁剪':
                            $thumb_way  =   5;
                            break;
                        case '固定尺寸缩放':
                            $thumb_way  =   6;
                            break;
                        default:
                            $thumb_way  =   1;
                            break;
                    }

                    //水印图片位置
                    switch ($this->config['water_pos'])
                    {
                        case '左上角':
                            $thumb_pos  =   1;
                            break;
                        case '上居中':
                            $thumb_pos  =   2;
                            break;
                        case '右上角':
                            $thumb_pos  =   3;
                            break;
                        case '左居中':
                            $thumb_pos  =   4;
                            break;
                        case '居中':
                            $thumb_pos  =   5;
                            break;
                        case '右居中':
                            $thumb_pos  =   6;
                            break;
                        case '左下角':
                            $thumb_pos  =   7;
                            break;
                        case '下居中':
                            $thumb_pos  =   8;
                            break;
                        case '右下角':
                            $thumb_pos  =   9;
                            break;
                        default:
                            $thumb_pos  =   1;
                            break;
                    }

                    $imgSrc =   INDEXIMG . $info->getSaveName();
                    $image  =   \think\Image::open($imgSrc);
                    //配置项允许添加水印
                    if ($this->config['water'] == '是')
                    {
                        //获取水印图片
                        $water  =   ADMIN_STATIC.'uploads/'.$this->config['water_img'];
                        // 按照原图的比例生成缩略图并添加水印
                        $image->thumb($thumb_width,$thumb_height,$thumb_way)->water($water,$thumb_pos,$tmd)->save($imgSrc);
                    }
                    else
                    {
                        $image->thumb($thumb_width,$thumb_height,$thumb_way)->save($imgSrc);
                    }


                }
                // 成功上传后 获取上传信息
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getSaveName();

            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    //初始化获取网站配置信息
    public function getConf()
    {
        $confRes     =   [];
        $_confRes    =   Db::name('conf')->field('ename,value')->select();
        foreach ($_confRes as $k => $v)
        {
            $confRes[$v['ename']]    =   $v['value'];
        }
        $this->config   =   $confRes;

    }
}
