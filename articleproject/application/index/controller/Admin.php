<?php
namespace app\index\controller;
use think\Controller;
class Admin extends Controller{
    public function Login(){
        $cate_model=model('category');
        $cateInfo=$cate_model->select();
        $this->assign('cateInfo',$cateInfo);

        $admin_name=input('param.admin_name');
        $admin_pwd=input('param.admin_pwd');
        $admin_model=model('Admin');
        $where=[
            'admin_name'=>$admin_name
        ];
        $arr=$admin_model->where($where)->find();
        if($arr['admin_pwd']==$admin_pwd){
            $info=[
                'admin_id'=>$arr['admin_id'],
                'admin_name'=>$admin_name
            ];
            session('adminInfo',$info);
            //$this->success("登陆成功",url("Index/index"));
        }else{
            $this->error('登陆失败');
        };
        return view();
    }
    public function A(){
        $a=session('adminInfo.admin_id');
        echo $a;
    }
}