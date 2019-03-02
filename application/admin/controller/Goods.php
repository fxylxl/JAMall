<?php

namespace app\admin\controller;
class Goods extends \think\Controller
{
    public function add(){
        //添加商品的界面
        session('goods_thumb',null);
        $cate_select = db('cate')->select();
        $cate_model = model('Cate');
        $cate_list = $cate_model->getChildrenId($cate_select);
        //获取无限级分类
        $this->assign('cate_list',$cate_list);
        return view();
    }

    public function uploadthumb(){
        if (session('goods_thumb')){
            $url_pre = DS.'JMAll'.DS.'public';
            $url = str_replace($url_pre,'.',session('goods_thumb'));
            if (file_exists($url)) {
                unlink($url);
            }
        }
        //利用插件上传图片的方法
        $file = request()->file('goods_thumb');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $address = DS.'JMAll'.DS.'public' . DS . 'uploads'.DS.$info->getSaveName();
            session('goods_thumb',$address);
            return $address;
        }else{
            echo $file->getError();
        }
    }

    public function addhanddle(){
        //添加商品表单提交处理
        $post = request() -> post();
        $post['goods_thumb'] = session('goods_thumb');
        dump($post);
        session('goods_thumb',null);
    }
}