<?php
/**
 * Created by PhpStorm.
 * User: feren
 * Date: 2019/2/25
 * Time: 20:24
 */
namespace app\index\model;

//商品分类前台模型层
class Cate extends \think\Model
{
    public function getChildren($cate_list,$pid=0)
    {
         $arr = array();
        foreach ($cate_list as $key => $value){
            if($value['cate_pid']==$pid){
                $value['children'] = $this -> getChildren($cate_list,$value['cate_id']);
                $arr[] = $value;
            }
        }
        return $arr;
    }
}