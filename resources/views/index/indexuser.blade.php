@extends('master')
@section('title',"呵呵哒的潮购")
@section('content')
    <div class="welcome" style="display: none">
    <p>Hi，等你好久了！</p>
    <a href="{{url('user/login')}}" class="orange">登录</a>
    <a href="{{url('user/register')}}" class="orange">注册</a>
    </div>
    <div class="welcome">
        <i class="set"></i>
        <div class="login-img clearfix">
            <ul>
                <li><img src="images/goods2.jpg" alt=""></li>
                <li class="name">
                    <h3>兰兰</h3>
                    <p>ID：10030053</p>
                </li>
                <a href="{{url('user/user')}}"><li class="next fr"><s></s></li></a>
            </ul>
        </div>
        <div class="chao-money">
            <ul class="clearfix">
                <li class="br">
                    <p>潮购值</p>
                    <span>822</span>
                </li>
                <li class="br">
                    <p>余额（元）</p>
                    <span>0</span>
                </li>
                <li>
                    <a href="" class="recharge">去充值</a>
                </li>
            </ul>
        </div>

    </div>
    <!--获得的商品-->
    <!--导航菜单-->
    <div class="sub_nav marginB person-page-menu">
        <a href="/v44/member/goodsbuylist.do"><s class="m_s1"></s>潮购记录<i></i></a>
        <a href="/v44/member/orderlist.do"><s class="m_s2"></s>获得的商品<i></i></a>
        <a href="/v44/member/postlist.do"><s class="m_s3"></s>我的晒单<i></i></a>
        <a href="/v44/member/mywallet.do"><s class="m_s4"></s>我的钱包<i></i></a>
        <a href="{{url('address/address')}}"><s class="m_s5"></s>收货地址<i></i></a>
        <a href="/v44/help/help.do" class="mt10"><s class="m_s6"></s>帮助与反馈<i></i></a>
        <a href="/v44/help/help.do"><s class="m_s7"></s>二维码分享<i></i></a>
        <p class="colorbbb">客服热线：400-666-2110  (工作时间9:00-17:00)</p>
    </div>
    <div class="footer clearfix">
        <ul>
            <li class="f_home"><a href="{{url('index')}}" ><i></i>潮购</a></li>
            <li class="f_announced"><a href="{{url('index/indexshop')}}" ><i></i>全部商品</a></li>
            <li class="f_single"><a href="#" ><i></i>呵呵哒</a></li>
            <li class="f_car"><a id="btnCart" href="{{url('index/indexshopcar')}}" ><i></i>购物车</a></li>
            <li class="f_personal"><a href="{{url('index/indexuser')}}" class="hover"><i></i>我的潮购</a></li>
        </ul>
    </div>
@endsection
@section('my-js')
    <script>
        function goClick(obj, href) {
            $(obj).empty();
            location.href = href;
        }
        if (navigator.userAgent.toLowerCase().match(/MicroMessenger/i) != "micromessenger") {
            $(".m-block-header").show();
        }
    </script>
@endsection




