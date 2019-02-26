<?php


namespace app\index\controller;

class login extends  \think\Controller
{
    public function index(){
        //用户登录界面显示
        return view('login');
    }
}
