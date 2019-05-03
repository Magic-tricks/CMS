<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/1/25
 * Time: 9:25 PM
 */

namespace app\admin\controller;
use think\Db;
use think\Loader;
use think\Request;
use app\admin\model\AuthRule as AuthRuleModel;

class AuthRule extends Common
{
    public function lst()
    {
        $ruleRes   =    Db::name('auth_rule')->select();
        $ruleTree  =    model('AuthRule')->ruleTree($ruleRes);
        $this->assign([
            'ruleTree'  =>  $ruleTree
        ]);
        return view();
    }

    public function add()
    {
        if (Request::instance()->isPost())
        {
            $data   =   input('post.');

            //验证
            $validate   =   validate('AuthRule');
            if (!$validate->scene('add')->check($data))
            {
                $this->error($validate->getError());
            }

            $add    =   Db::name('auth_rule')->insert($data);
            if ($add)
            {
                $this->success('添加权限成功','lst');
            }
            else
            {
                $this->error('添加权限失败');
            }
        }

        $ruleRes   =    Db::name('auth_rule')->select();
        $ruleTree  =    model('AuthRule')->ruleTree($ruleRes);
        $this->assign([
            'rules' =>  $ruleTree
        ]);
        return view();
    }

    public function edit($id)
    {
        if (Request::instance()->isPost())
        {
            $data  =    input('post.');
            //验证
            $validate   =   validate('AuthRule');
            if (!$validate->scene('edit')->check($data))
            {
                $this->error($validate->getError());
            }

            $update=    Db::name('auth_rule')->update($data);
            if ($update !== false)
            {
                $this->success('修改规则权限成功','lst');
            }
            else
            {
                $this->error('修改规则权限失败');
            }

        }

        $authRules =    Db::name('auth_rule')->find($id);
        $ruleRes   =    Db::name('auth_rule')->select();
        $ruleTree  =    model('AuthRule')->ruleTree($ruleRes);

        $this->assign([
            'rules' =>  $ruleTree,
            'authRules'    => $authRules
        ]);
        return view();
    }

    public function del($id)
    {
        $authRuleModel  =   new AuthRuleModel();
        $cid            =   $authRuleModel->childrenIds($id);
        $cid[]          =   $id;
        $del            =   Db::name('auth_rule')->delete($cid);
        if ($del)
        {
            $this->success('删除规则成功','lst');
        }
        else
        {
            $this->error('删除规则失败');
        }
    }

    //实现栏目的伸缩
    public function ajaxLst()
    {
        if(!request()->isAjax())
        {
            $this->error('非法操作~ ');
        }
        $cateId=input('ruleid');
        $AuthRule=new \app\admin\model\AuthRule();
        $sonIds=$AuthRule->childrenIds($cateId);
        echo json_encode($sonIds);
    }

}