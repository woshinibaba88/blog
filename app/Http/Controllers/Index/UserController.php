<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Tools\Captcha;
class UserController extends Controller
{
    /*
    * @用户个人信息
    * */
    public function User()
    {
        return view("index.user");
    }
    /*
    * @登陆
    * */
    public function Login()
    {
        return view("user.login");
    }
    /*
    * @验证码
    * */
    public function Code()
    {
        $verify=new Captcha();
        $code=$verify->getCode();
        session(['code'=>$code]);
        return $verify->doimg();
    }
    /*
    * @登陆执行
    * */
    public function LoginDo(Request $request)
    {
        $user_tel=$request->user_tel;
        $user_pwd=$request->user_pwd;
        $code=$request->code;
//        $codes=session('code');
//        if($code!=$codes){
//            echo 4;die;
//        }
        $user_model=new User();
        $arr=$user_model->where('user_tel','=',$user_tel)->get();
        $pwd=decrypt($arr[0]['user_pwd']);
        //echo $pwd;die;
        if(empty($arr)){
            //用户不存在
            echo 1;
        }else{
          if($user_pwd==$pwd){
              session(["user_id"=>$arr[0]['user_id']]);
              echo 2;
          }else{
              echo 3;
          }
        }
    }
    /*
    * @注册
    * */
    public function Register()
    {
        return view("user.register");
    }
    /*
    * @注册短信验证码获取
    * */
    public function phone(Request $request)
    {
        $user_tel=$request->user_tel;
        $phonecode=$this->phonecode(4);
        $time=time();
        session(["phonecode"=>$phonecode,"user_tel"=>$user_tel,"time"=>$time]);
        $res=$this->phoneDo($phonecode,$user_tel);
        if($res){
            echo 2;
        }else{
            echo 1;
        }
    }
    /*
     * @生成短信验证码
     * */
    public function phonecode($len)
    {
        $code='';
        for($i=1;$i<=$len;$i++){
            $code.=mt_rand(0,9);
        }
        return $code;
    }
    /*
     * @生成短信验证码
     * */
    public function phoneDo($phonecode,$suer_tel)
    {
        $host = env("MOBILE_HOST");
        $path = env("MOBILE_PATH");
        $method = "POST";
        $appcode =env("MOBILE_APPCODE");
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "content=【创信】你的验证码是：".$phonecode."，3分钟内有效！&mobile=".$suer_tel;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        return (curl_exec($curl));
    }
    /*
     * @注册执行
     * */
    public function RegisterDo(Request $request)
    {
        $user_tel=$request->user_tel;
        $user_pwd=$request->user_pwd;
        $usercode=$request->usercode;
//        $time=time();
//        $time=session("time");
        //echo $time;die;
        if($user_tel!=session('user_tel')){
            echo 1;die;
        }
//        if($time>=3000){
//            echo 2;die;
//        }
        if($usercode!=session("phonecode")){
            echo 3;die;
        }
        $model=new User();
        $model->user_tel=$user_tel;
        $model->user_pwd=encrypt($user_pwd);
        $res=$model->save();
        if($res){
            echo 4;
        }else{
            echo 5;
        }
    }
    /*
    * @找回密码
    * */
    public function Findpwd()
    {
        return view("user.findpwd");
    }
    /*
    * @重置密码
    * */
    public function Resetpassword()
    {
        return view("user.resetpassword");
    }
}