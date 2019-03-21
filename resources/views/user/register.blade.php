@extends('master')
@section('title',"注册")
@section('content')
    <!--触屏版内页头部-->
    <div class="m-block-header" id="div-header">
        <strong id="m-title">注册</strong>
        <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
        <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
    </div>
    <div class="wrapper">
        <input name="hidForward" type="hidden" id="hidForward" />
        <div class="registerCon">
            <ul>
                <li class="accAndPwd">
                    <dl>
                        <s class="phone"></s><input id="user_tel" name="user_tel" maxlength="11" type="number" placeholder="请输入您的手机号码" value="" />
                        <span class="clear">x</span>

                    </dl>
                    <dl>
                        <button class="sendcode" id="btn" style="float:right;width: 100px;height: 43px;">获取验证码</button>
                        <s class="phone"></s>
                        <input id="usercode" maxlength="4" type="number" placeholder="请输入您的验证码" value=""  style="float: right;width: 283px"/>
                    </dl>
                    <br>
                    <br>
                    <br>
                    <dl>
                        <s class="password"></s>
                        <input class="pwd" maxlength="11" id="user_pwds" type="password" placeholder="6-16位数字、字母组成" value="" />
                        <input class="pwd" maxlength="11" type="password" placeholder="6-16位数字、字母组成" value="" style="display: none" />
                        <span class="mr clear">x</span>
                        <s class="eyeclose"></s>
                    </dl>
                    <dl>
                        <s class="password"></s>
                        <input class="conpwd" maxlength="11" id="user_pwd" type="password" placeholder="请确认密码" value="" />
                        <input class="conpwd" maxlength="11"  type="password" placeholder="请确认密码" value="" style="display: none" />
                        <span class="mr clear">x</span>
                        <s class="eyeclose"></s>
                    </dl>
                    <dl class="a-set">
                        <i class="gou"></i><p>我已阅读并同意《666潮人购购物协议》</p>
                    </dl>

                </li>
                <li><a id="btnNext" href="javascript:;" class="orangeBtn loginBtn">注 册</a></li>
            </ul>
        </div>

<input type="hidden" id="_token" value="{{csrf_token()}}">
        <div class="footer clearfix" style="display:none;">
            <ul>
                <li class="f_home"><a href="/v44/index.do" ><i></i>云购</a></li>
                <li class="f_announced"><a href="/v44/lottery/" ><i></i>最新揭晓</a></li>
                <li class="f_single"><a href="/v44/post/index.do" ><i></i>晒单</a></li>
                <li class="f_car"><a id="btnCart" href="/v44/mycart/index.do" ><i></i>购物车</a></li>
                <li class="f_personal"><a href="/v44/member/index.do" ><i></i>我的云购</a></li>
            </ul>
        </div>
        <div class="layui-layer-move"></div>
    </div>
@endsection
<script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
<script>
    $(function(){
        //发送短信验证码
        $(document).on("click","#btn",function(){
            var _token=$("#_token").val();
            var user_tel=$("#user_tel").val();
            if(user_tel==''){
                alert("请输入手机号码");
                return false;
            }
            if(!(/^1[34578]\d{9}$/.test(user_tel))){
                alert("请输入正确的手机号码");
                return false;
            }
            $.post(
                "{{url('user/phone')}}",
                {_token:_token,user_tel:user_tel},
                function(res){
                    if(res==1){
                        alert("短信发送成功，请等待")
                    }else{
                        alert("短信发送失败");
                    }
                }
            )
        })
        //注册点击事件
        $(document).on("click","#btnNext",function(){
            var _token=$("#_token").val();
            var user_tel=$("#user_tel").val();
            var usercode=$("#usercode").val();
            var user_pwd=$("#user_pwd").val();
            var user_pwds=$("#user_pwds").val();
            if(user_tel==''){
                alert("请输入手机号码");
                return false;
            }
            if(!(/^1[34578]\d{9}$/.test(user_tel))){
                alert("请输入正确的手机号码");
                return false;
            }
            if(usercode==''){
                alert("请输入验证码");
                return false;
            }
            if(user_pwd==''){
                alert("请输入密码");
                return false;
            }
            if(user_pwds==''){
                alert("请确认密码");
                return false;
            }
            if(user_pwd!=user_pwds){
                alert("两次密码不一致");
                return false;
            }
            $.post(
                "{{url('user/registerdo')}}",
                {_token:_token,usercode:usercode,user_pwd:user_pwd,user_tel:user_tel},
                function(res){
                   if(res==1){
                        alert("手机号码错误");
                   }else if(res==2){
                       alert("验证码已过期，请重新获取");
                   }else if(res==3){
                       alert("验证码错误");
                   }else if(res==4){
                       history.back();
                   }else if(res==5){
                       alert("注册失败");
                   }
                }
            )
        })
    })
</script>



