<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/1/21
 * Time: 10:39 PM
 */

namespace app\admin\controller;
use QL\QueryList;
use think\Db;


class Note extends Common
{

    public function noteList()
    {
        $noteRes        =   Db::name('note')
                            ->field('n.id,n.note_name,n.model_id,n.output_encoding,n.add_time,last_time,m.model_name')
                            ->alias('n')
                            ->join('tp_model m','n.model_id  =   m.id')
                            ->paginate(3);
        $this->assign([
            'noteRes'    => $noteRes
        ]);
        return view();

    }


    public function addListRules()
    {
        if (request()->isPost())
        {
            $_data       =   input('post.');
            $data['note_name']       =   $_data['note_name'];
            $data['model_id']        =   $_data['model_id'];
            $data['output_encoding']      =   $_data['output_encoding'];
            $data['list_rules']      =   [
                    'list_url'       =>  $_data['list_url'],
                    'start_page'     =>  $_data['start_page'],
                    'end_page'       =>  $_data['end_page'],
                    'step'           =>  $_data['step'],
                    'range'          =>  $_data['range'],
                    'list_rules'     => [
                        'url'        =>  $_data['url'],
                        'litpic'     =>  $_data['litpic']
                    ]
            ];
            $data['list_rules']      =  \GuzzleHttp\json_encode($data['list_rules']);
            $data['add_time']        =  time();
            $data['last_time']        =  time();
            //新添加数据获取的ID主键
            $add         =  Db::name('note')->insertGetId($data);
            if ($add)
            {
                $notes   =  Db::name('note')->field('model_id')->find($add);
                $modelId =  $notes['model_id'];
                $this->redirect('addItemRules',['model_id'=>$modelId,'note_id'=>$add]);
            }
            else
            {
                $this->error('添加节点失败');
            }


        }
        $modelRes       =   Db::name('model')->select();
        $this->assign([
            'modelRes'      =>  $modelRes
        ]);
        return view();
    }


    public function addItemRules()
    {

        $noteId            =   input('note_id');
        if (request()->isPost())
        {
            $data           =   input('post.');
            $rules          =   [];
            if ($data)
            {
                foreach ($data as $k => $v)
                {
                    if ($v['rule'])
                    {
                        $rules[$k][0]  =   $v['rule'];
                        $rules[$k][1]  =   $v['attr'];
                        $rules[$k][2]  =   $v['filter'];
                    }


                }
            }
            $rules          =   \GuzzleHttp\json_encode($rules);
            $save           =   Db::name('note')->where('id',$noteId)->update(['item_rules'=>$rules]);
            if ($save)
            {
                $this->success('添加采集规则成功');
            }
            else
            {
                $this->error('添加采集规则失败');
            }
        }
        $modelId            =   input('model_id');
        //自定义模型字段
        $modelFieldRes      =   Db::name('model_field')->field('field_ename,field_cname')->where('model_id',$modelId)->select();
        $this->assign([
            'modelFieldRes' =>  $modelFieldRes
        ]);
        return view();
    }

    //执行采集
    public function doCaiji($note_id)
    {
        $notes      =   Db::name('note')->find($note_id);
        //采集参数，输出编码
        $outputEncoding     =   $notes['output_encoding'];
        //列表采集配置,json_deconde第二个参数true为把对象转换成数组
        $listRules          =   \GuzzleHttp\json_decode($notes['list_rules'],true);
        //采集列表网址
        $listUrl            =   $listRules['list_url'];
        //采集开始页码
        $startPage          =   $listRules['start_page'];
        //采集结束页码
        $endPage            =   $listRules['end_page'];
        //采集步长
        $step               =   $listRules['step'];
        //采集范围
        $range              =   $listRules['range'];
        //采集规则
        $caijiRules         =   $listRules['list_rules'];


        //转化为实际页码的列表网址
        $_listUrl           =   [];
        //处理采集列表网址
        for ($i = $startPage ; $i <= $endPage; $i+=$step)
        {
            $_listUrl[]     =   str_replace('(*)',$i,$listUrl);
        }


        $listCaijiRules     =   [
            'url'       =>   [$caijiRules['url'],'text'],
            'img'       =>   [$caijiRules['litpic'],'src'],
        ];
        //循环采集数据
        $data       =   array();
        foreach ($_listUrl as $k => $v)
        {
            //需要采集的URL
            $url    =   $v;
            $data[]   =   QueryList::get($url)
                ->range($range)//设置内容区域
                ->encoding($outputEncoding)//设置字符编码
                ->rules($listCaijiRules)
                ->queryData();
        }
        dump($data);die;


    }
}