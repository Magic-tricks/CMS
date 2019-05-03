<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
use app\admin\model\Cate as CateModel;
use think\Db;

class Cate extends Common
{
    public function lst()
    {
        //获取栏目
        $_cateRes=db('cate')->alias('a')->field('a.*,b.model_name')->join("model b",'a.model_id = b.id')->order('sort desc')->select();
        //获取无限极栏目

        $cateModel  =   new CateModel();
        $cateRes    =   $cateModel->cateTree($_cateRes);

        $this->assign(["cateRes"=>$cateRes
        ]);
        return view();
    }

    public function add()
    {
        if (request()->isPost())
        {
            $data = input("post.");
            //数据有效性验证
            $validate=validate("Cate");
            if(!$validate->scene("add")->check($data))
            {
                $this->error($validate->getError());
            }

            $add = db("cate")->insert($data);
            if ($add) {
                $this->success("添加栏目成功...", 'lst');
            } else {
                $this->error("添加栏目失败...");
            }
        }
        $_cateRes=db('cate')->alias('a')->field('a.*,b.model_name')->join("model b",'a.model_id = b.id')->order('sort desc')->select();
        //查找无限极分类
        $cateRes = model("Cate")->cateTree($_cateRes);

        //当用户点击从lst点击添加子栏目传过cateid
        $cateid = input("cateid");
        if ($cateid)
        {
            $cates=db('cate')->find($cateid);
            $this->assign(['cates'=>$cates]);
        }

        //获取模型数据
        $modelRes=db('model')->field('id,model_name')->select();
        $this->assign(["cateRes"=>$cateRes,'modelRes'=>$modelRes]);
        return view('');
    }

    public function edit($cateid)
    {
        //找出当前编辑的一条数据
        $cates=db('cate')->find($cateid);

        if (request()->isPost())
        {
            $data = input("post.");
            if(isset($data['status']))
            {
                $data['status'] = 0;
            }
            else
            {
                $data['status'] = 1;
            }
            //数据有效性验证
            $validate=validate("Cate");
            if(!$validate->scene("edit")->check($data))
            {
                $this->error($validate->getError());
            }

            $save = db("cate")->update($data);

            if ($save!==false) {
                $this->success("修改栏目成功...", 'lst');
            } else {
                $this->error("修改栏目失败...");
            }
        }
        $_cateRes=db('cate')->alias('a')->field('a.*,b.model_name')->join("model b",'a.model_id = b.id')->order('sort desc')->select();
        //查找无限极分类
        $cateRes = model("Cate")->cateTree($_cateRes);

        //模型id
        $modelIds=db('cate')->column('model_id');
        //获取模型数据
        $modelRes=db('model')->field('id,model_name')->select();
        $this->assign(["cateRes"=>$cateRes,"cateid"=>$cateid,"cates"=>$cates,"modelIds"=>$modelIds,'modelRes'=>$modelRes]);
        return view();
    }

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

    //异步删除撤销上传的图片
    public function delImg()
    {
        if (request()->isAjax())
        {   //假如有传cateid,则为编辑栏目,撤销上传吧数据库字段清空
            $cateid=input("cateid");
            if($cateid)
            {
                db("cate")->where('id',$cateid)->setField("img","");
            }

            $imgSrc=input("imgSrc");
            $imgSrc=ADMINIMG.$imgSrc;
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

    public function changeStatus()//ajax异步修改显示状态
    {
        if(request()->isAjax())
        {
            $cateid=input("cateid");
            $status=db("cate")->field("status")->find($cateid);
            $status=$status['status'];
            if($status == 1)
            {
                db("cate")->where("id",$cateid)->update(["status"=>0]);
                echo 1;//由显示改为隐藏;
            }
            else
            {
                db("cate")->where("id",$cateid)->update(["status"=>1]);
                echo 2;//由隐藏改为显示;
            }
        }
        else
            {
                $this->error("非法操作");
            }
    }

    //实现栏目的伸缩
    public function ajaxLst()
    {
        if(!request()->isAjax())
        {
            $this->error('非法操作~ ');
        }
        $cateId=input('cateid');
        $cateModel=new \app\admin\model\Cate();
        $sonIds=$cateModel->childrenIds($cateId);
        echo json_encode($sonIds);
    }

    public function del_sort()
    {
        $data=input('post.');
        foreach($data['sort'] as $k => $v)
        {
            db('cate')->where('id',$k)->update(['sort'=>$v]);
        }


        if(isset($data['itm']))
        {
            model('cate')->pdel($data);
        }
        $this->success("数据处理成功...",'Cate/lst','',1);

    }

    public function del($cateid)
    {
        $childrenIds=model("cate")->childrenIds($cateid);
        $childrenIds[]=$cateid;

        //删除栏目以及相关文章资源文件
        foreach ($childrenIds as $key => $value)
        {
            //删除栏目图片操作
            $cates  =   Db::name('cate')->find($value);
            if ($cates['img'])
            {
                $filePath   =   ADMINIMG.$cates['img'];
                @unlink($filePath);
            }
            //获取所属模型的表名
            $model  =   Db::name('model')->field('table_name')->find($cates['model_id']);
            $tableName  =   $model['table_name'];

            //删除文章资源操作
            $artRes =   Db::name('archives')->where('cate_id',$value)->select();
            //循环删除附加表的记录
            foreach ($artRes as $k  =>  $v)
            {
                //删除附加表记录和主表记录
                Db::name($tableName)->where('aid',$v['id'])->delete();
                @unlink(ADMINIMG.$artRes['litpic']);
                Db::name('archives')->delete($v['id']);
            }
            //删除文章主表对呀的缩略图记录


        }
        $del=db('cate')->delete($childrenIds);

        if($del)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function cateInfo()
    {
        $cateId     =   input("cateid");
        $data       =   Db::name('cate')->find($cateId);
        echo json_encode($data);
    }
}
