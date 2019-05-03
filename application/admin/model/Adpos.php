<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/2/24
 * Time: 8:40 PM
 */

namespace app\admin\model;
use think\Model;

class Adpos extends Model
{
    protected static function init()
    {
        Adpos::beforeDelete(function ($adpos){
            $adposId    =   input('id');
            //删除当前广告位下的所有广告
            Ad::destroy(['adpos_id'=>$adposId]);

        });
    }

}