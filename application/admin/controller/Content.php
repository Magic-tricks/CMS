<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Cate as CateModel;

class Content extends Common
{
    public function lst()
    {
        //获取文章数据
        $artRes     =   Db::name('archives')
            ->alias('a')
            ->join('tp_cate c','a.cate_id = c.id')
            ->join('tp_model m','m.id = c.model_id')
            ->field('a.id,a.title,a.attr,a.cate_id,a.model_id,c.cate_name,m.model_name')
            ->order('a.id desc')
            ->paginate(5);


        $modelId    =   input('model_id');
        $cateId     =   input('cate_id');
        if (!$modelId)
        {
            $modelId    =   0;
        }
        $this->assign(['modelId'    =>$modelId,
                       'cateId'     =>$cateId,
                        'artResult'    =>$artRes]);
        return view();
    }

    public function add()
    {
        $modelId    =   input('model_id');
        $cateId     =   input('cate_id');

        if (request()->isPost())
        {
            $data       =   input('post.');
            //主表字段数组
            $columns    =   array();
            $prefix     =   config('database.prefix');
            $tbarchives =   $prefix.'archives';//主文章表名称
            //获取主表的所有字段
            $_columns   =   Db::query("SHOW COLUMNS FROM {$tbarchives}");
            foreach ($_columns as $k => $v)
            {
                $columns[]  =   $v['Field'];
            }
            //主表
            $archives   =   array();
            //附加表
            $addTable   =   array();
            foreach ($data  as $k => $v)
            {
                //提交字段在主表数组中则为添加主表数据，否则为附加表数据
                if (in_array($k,$columns))
                {
                    if(is_array($v))
                    {
                        $v  =   implode(',',$v);
                    }
                    $archives[$k]  =    $v;
                }
                else
                {
                    if(is_array($v))
                    {
                        $v  =   implode(',',$v);
                    }
                    $addTable[$k]   =   $v;
                }
            }

            //附加表单图或者多图上传处理，$_FILES可打印所有提交的附件类型数据
            if ($_FILES)
            {
                foreach($_FILES as $k => $v)
                {
                    if ($v['name'] !='')
                    {
                        $addTable[$k]   =   $this->upload($k);
                    }
                }
            }

            $archives['model_id']   =   $modelId;
            $archives['time']       =   time();
            $addArchives    =   Db::name('archives')->insertGetId($archives);
            $addTable['aid']=   $addArchives;
            $tableName      =   Db::name('model')->field('table_name')->find($modelId);
            $tableName      =   $tableName['table_name'];
            $addTableRes    =   Db::name($tableName)->insert($addTable);
            if ($addArchives && $addTableRes)
            {
                $this->success('添加数据成功','lst','','1');
            }
            else
            {
                $this->error('添加数据失败');
            }

        }


        //获取当前模型自定义字段
        $diyFields  =   Db::name('model_field')->where('model_id',$modelId)->select();
        //获取长文本类型的值
        $longTextFields   = Db::name('model_field')->where(['model_id'=>$modelId,'field_type'=>9])->select();

        $_cateRes   =   Db::name('cate')->select();
        $cateModel  =   new CateModel();
        $cateRes    =   $cateModel->cateTree($_cateRes);
        $this->assign(["cateRes"=>$cateRes,
                        'modelId'    =>$modelId,
                        'cateId'     =>$cateId,
                        'diyFields' =>$diyFields,
                        'longTextFields'    =>$longTextFields]);
        return view();
    }

    //文章编辑
    public function edit()
    {
        $modelId    =   input('model_id');
        $artId      =   input('art_id');
        if (!$modelId)
        {
            $modelId    =   0;
        }
        //获取附表的字段数据
        $models     =   Db::name('model')->field('table_name')->find($modelId);
        $tableName  =   $models['table_name'];
        $diyValues  =   Db::name($tableName)->where(['aid'=>$artId])->find();


        if (request()->isPost())
        {
            $data       =   input('post.');
            //主表字段数组
            $columns    =   array();
            $prefix     =   config('database.prefix');
            $tbarchives =   $prefix.'archives';//主文章表名称
            //获取主表的所有字段
            $_columns   =   Db::query("SHOW COLUMNS FROM {$tbarchives}");
            foreach ($_columns as $k => $v)
            {
                $columns[]  =   $v['Field'];
            }
            //主表
            $archives   =   array();
            //附加表
            $addTable   =   array();
            foreach ($data  as $k => $v)
            {
                //提交字段在主表数组中则为添加主表数据，否则为附加表数据
                if (in_array($k,$columns))
                {
                    if(is_array($v))
                    {
                        $v  =   implode(',',$v);
                    }
                    $archives[$k]  =    $v;
                }
                else
                {
                    if(is_array($v))
                    {
                        $v  =   implode(',',$v);
                    }
                    $addTable[$k]   =   $v;
                }
            }

            //附加表单图或者多图上传处理，$_FILES可打印所有提交的附件类型数据
            if ($_FILES)
            {
                foreach($_FILES as $k => $v)
                {
                    if ($v['name'] !='')
                    {
                        $addTable[$k]   =   $this->upload($k);
                    }
                }
            }
            $saveArchives    =  Db::name('archives')->update($archives);
            $where['aid']     =  ['=',$archives['id']];
            $saveAddTable    =  Db::name($tableName)->where($where)->update($addTable);
            if ($saveArchives !== false && $saveAddTable !== false)
            {
                $this->success('修改数据成功','lst','','1');
            }
            else
            {
                $this->error('修改数据失败');
            }

        }


        //获取主表数据
        $artRes     =   Db::name('archives')->find($artId);

        //获取当前模型自定义字段
        $diyFields  =   Db::name('model_field')->where('model_id',$modelId)->select();
        //获取长文本类型的值
        $longTextFields   = Db::name('model_field')->where(['model_id'=>$modelId,'field_type'=>9])->select();

        //获取栏目
        $_cateRes   =   Db::name('cate')->select();
        $cateModel  =   new CateModel();
        $cateRes    =   $cateModel->cateTree($_cateRes);

        //属性字段组成数组
        $attrArr    =   explode(',',$artRes['attr']);


        $this->assign(["cateRes"=>$cateRes,
            'modelId'    => $modelId,
            'diyFields'  => $diyFields,
            'longTextFields'    =>$longTextFields,
            'cateId'     => $artRes['cate_id'],
            'artRes'     => $artRes,
            'attrArr'    => $attrArr,
            'diyValues'  => $diyValues,
            'aid'        => $artId,
            'modelId'    => $modelId]);
        return view();
    }



    //异步上传缩略图
    public function upimg()
    {
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



    //异步删除撤销上传的图片
    public function delImg()
    {
        if (request()->isAjax())
        {   //假如有传cateid,则为编辑栏目,撤销上传吧数据库字段清空
            $artid=input("artid");
            if($artid)
            {
                db("archives")->where('id',$artid)->setField("litpic","");
            }

            $imgSrc=input("imgSrc");
            $imgSrc=INDEXIMG.$imgSrc;

            if(file_exists($imgSrc))
            {
                @unlink($imgSrc);
                return 1;
            }
            else
            {
                return 0;
            }
        }
    }

    //ajax删除附表附件图片
    public function ajaxDelImg()
    {
        $aid        =   input('aid');
        //模型id
        $modelId    =   input('model_id');
        //需要清空的字段名称
        $fieldName  =   input('field_name');
        $modelName  =   Db::name('model')->find($modelId);
        $tableName  =   $modelName['table_name'];
        //删除系统储存图
        $path       =   Db::name($tableName)->field($fieldName)->where('aid',$aid)->find();
        $path       =   $path[$fieldName];
        $imgSrc     =   INDEXATT  .$path;

        if(file_exists($imgSrc))
        {
            @unlink($imgSrc);
        }

        $where['aid']   =   ['=',$aid];
        $save       =   Db::name($tableName)->where($where)->setField($fieldName,'');
        if ($save)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function upload($picName){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($picName);
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static/index/uploads/att');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                return $info->getSaveName();

            }else{
                // 上传失败获取错误信息
                return $file->getError();
            }
        }
    }

    //传递参数到添加文章页面
    public function addSelect()
    {
        $_cateRes=db('cate')->alias('a')->field('a.*,b.model_name')->join("model b",'a.model_id = b.id')->order('sort desc')->select();
        //查找无限极分类
        $cateRes = model("Cate")->cateTree($_cateRes);
        $this->assign([
            'cateRes'   => $cateRes
        ]);
        return view();
    }

    public function ajaxGetModelId($cateId)
    {
        $cates      =   Db::name('cate')->field('model_id')->find($cateId);
        return json($cates['model_id']);
    }

    public function del($id)
    {
        $article    =   Db::name('archives')->find($id);
        $model      =   Db::name('model')->find($article['model_id']);
        $tableName  =   $model['table_name'];
        $delArticle =   Db::name($tableName)->where('aid',$id)->delete();
        $delArchives=   Db::name('archives')->delete($id);
        if ($article['litpic'] != '')
        {
            $litpic =   INDEXIMG.$article['litpic'];
            @unlink($litpic);
        }
        if ($delArchives && $delArticle)
        {
            $this->success('删除文章成功');
        }
        else
        {
            $this->error('删除文章失败');
        }
    }
}
