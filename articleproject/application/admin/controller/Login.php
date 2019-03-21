<?php
namespace app\admin\controller;
use think\Controller;
class Login extends Controller
{
/**登录页面 */
public function login(){

    if(request()->isPost()&&request()->isAjax()){
        $admin_name=input('post.admin_name');
        $admin_pwd=input('post.admin_pwd');
        $code=input('post.code');
        if(empty($admin_name)){
            fail('必填项不能为空');
        }
        if(empty($admin_pwd)){
            fail('必填项不能为空');
        }
        if(empty($code)){
            fail('验证码不能为空');
        }
        if(!captcha_check($code)){
            fail('验证码错误');
        };

        //账号查询
        $admin_model=model('Admin');
        $where=[
            'admin_name'=>$admin_name
        ];
        $adminInfo=$admin_model->where($where)->find();
        //echo $admin_model->getLastSql();die;
        if(empty($adminInfo)){
            fail('用户名或密码有误，请重试');
        }else{
           //数据库，新密码比较
           if($adminInfo['admin_pwd']==$admin_pwd){
               $arr=[
                   'admin_id'=>$adminInfo['admin_id'],
                   'admin_name'=>$admin_name
               ];
                session('adminInfo',$arr);
                successly('登陆成功');
           }else{
                fail('用户名或密码有误，请重试'); 
           }

        }
            
    }else{
        // 临时关闭当前模板的布局功能
        $this->view->engine->layout(false); 
        return view();
    }
}
}
?>