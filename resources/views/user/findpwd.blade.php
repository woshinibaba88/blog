@extends('master')
@section('title',"找回密码")
@section('content')
    <!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">找回密码</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="home-icon"></i></a>
</div>

<div class="wrapper">
    <div class="registerCon">
        <div class="binSuccess5">
            <ul>
                <li class="accAndPwd">
                    <dl class="phone">
                        <div class="txtAccount">
                            <input id="txtAccount" type="text" placeholder="请输入您的手机号"><i></i>
                            <a href="javascript:void(0);" class="sendcode" id="btn">获取验证码</a>
                        </div>
                        <cite class="passport_set" style="display: none"></cite>
                    </dl>
                    <dl>
                        <input id="txtPassword" type="password" placeholder="请输入验证码" value="" maxlength="20" /><b></b>
                    </dl>
                </li>
            </ul>
            <a id="btnLogin" href="{{url('user/resetpassword')}}" class="orangeBtn loginBtn">下一步</a>{{--href="javascript:;"--}}
        </div>
    </div>
</div>
@endsection
@section("my-js")
@endsection




