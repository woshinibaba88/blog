@extends('master')
@section('title',"商品详情")
@section('content')
    <div class="page-group">
        <div id="page-photo-browser" class="page">
            <!--触屏版内页头部-->
            <div class="m-block-header" id="div-header">
                <strong id="m-title">商品详情</strong>
                <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
                <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
            </div>
        @foreach($data as $v)
            <!-- 焦点图 -->
                <div class="hotimg-wrapper">
                    <div class="hotimg-top"></div>
                    <section id="gallery" class="hotimg">
                        <ul class="slides" style="width: 600%; transition-duration: 0.4s; transform: translate3d(-828px, 0px, 0px);">
                            <li style="width: 414px; float: left; display: block;" class="clone">
                                <a href="https://img.1yyg.net/Poster/20170227170302909.png">
                                    <img src="https://img.1yyg.net/Poster/20170227170302909.png" alt="">
                                </a>
                            </li>
                            <li class="" style="width: 414px; float: left; display: block;">
                                <a href="https://img.1yyg.net/Poster/20170609151005929.jpg">
                                    <img src="https://img.1yyg.net/Poster/20170609151005929.jpg" alt="">
                                </a>
                            </li>
                            <li style="width: 414px; float: left; display: block;" class="flex-active-slide">
                                <a href="https://img.1yyg.net/Poster/20170605084728556.jpg"><img src="https://img.1yyg.net/Poster/20170605084728556.jpg" alt="">
                                </a>
                            </li>
                            <li style="width: 414px; float: left; display: block;" class="">
                                <a href="https://img.1yyg.net/Poster/20170518163741543.jpg"><img src="https://img.1yyg.net/Poster/20170518163741543.jpg" alt=""></a>
                            </li>
                            <li style="width: 414px; float: left; display: block;" class="">
                                <a href="https://img.1yyg.net/Poster/20170227170302909.png">
                                    <img src="https://img.1yyg.net/Poster/20170227170302909.png" alt="">
                                </a>
                            </li>
                            <li class="clone" style="width: 414px; float: left; display: block;">
                                <a href="https://img.1yyg.net/Poster/20170609151005929.jpg">
                                    <img src="https://img.1yyg.net/Poster/20170609151005929.jpg" alt="">
                                </a>
                            </li>
                        </ul>
                    </section>
                </div>
                <!-- 产品信息 -->
                <div class="pro_info">
                    <h2 class="gray6">

                        (第<em id='Period'>10363</em>潮)
                        {{$v->goods_name}}<span>{{$v->goods_desc}}</span>
                    </h2>
                    <div class="purchase-txt gray9 clearfix">
                        价值：￥{{$v->self_price}}
                    </div>
                    <div class="clearfix">

                        <div class="gRate">
                            <div class="Progress-bar">
                                <p class="u-progress" title="已完成90%">
                                    <span class="pgbar" style="width:90%;">
                                        <span class="pging"></span>
                                    </span>
                                </p>
                                <ul class="Pro-bar-li">
                                    <li class="P-bar01"><em>27</em>已参与</li>
                                    <li class="P-bar02"><em>30</em>总需人次</li>
                                    <li class="P-bar03"><em>{{$v->goods_num}}</em>剩余</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--本商品已结束-->

                </div>
        @endforeach
        <!--揭晓倒计时-->
            <div id="divLotteryTime" class="Countdown-con">
                <p class="declare">声明：所有商品及活动均与苹果公司（Apple Inc）无关。</p>
                <div class="state">
                    <em></em>
                    <span>我已阅读《潮购声明》</span>
                </div>
                <div class="guide">您还没有参与哦，试试吧！</div>
            </div>
            <div class="imgdetail">
                <div class="ann_btn">
                    <a href="">图文详情<s class="fr"></s></a>
                </div>
            </div>
            <div class="listtab tabs clearfix">
                <a href="javascript:;" class="active">参与记录</a>
                <a href="javascript:;">历史获得者</a>
            </div>



            <div class="ann_btn partcon" id="tabs-container">
                <div class="swiper-wrapper">
                    <div class="record-wrapp swiper-slide">
                        <!--所有参与记录-->
                        <div class="part-record">
                            <div class="ann_list">
                                <div class="fl">
                                    <img src="images/goods2.jpg" alt="">
                                </div>
                                <div class="fl">
                                    <h3>被小冉</h3>
                                    <p>2017-06-25 15:38:12:645</p>
                                </div>
                                <div class="fr people-num">
                                    <span>16人次</span><s class="fr"></s>
                                </div>
                            </div>
                            <div class="ann_list">
                                <div class="fl">
                                    <img src="images/goods2.jpg" alt="">
                                </div>
                                <div class="fl">
                                    <h3>被小冉</h3>
                                    <p>2017-06-25 15:38:12:645</p>
                                </div>
                                <div class="fr people-num">
                                    <span>16人次</span><s class="fr"></s>
                                </div>
                            </div>
                            <div class="ann_list">
                                <div class="fl">
                                    <img src="images/goods2.jpg" alt="">
                                </div>
                                <div class="fl">
                                    <h3>被小冉</h3>
                                    <p>2017-06-25 15:38:12:645</p>
                                </div>
                                <div class="fr people-num">
                                    <span>16人次</span><s class="fr"></s>
                                </div>
                            </div>
                            <div class="ann_list">
                                <div class="fl">
                                    <img src="images/goods2.jpg" alt="">
                                </div>
                                <div class="fl">
                                    <h3>被小冉</h3>
                                    <p>2017-06-25 15:38:12:645</p>
                                </div>
                                <div class="fr people-num">
                                    <span>16人次</span><s class="fr"></s>
                                </div>
                            </div>
                        </div>
                        <!-- 无内容时显示 -->
                        <div class="nocontent" style="display: none">
                            <div class="m_buylist m_get">
                                <ul id="ul_list">
                                    <div class="noRecords colorbbb clearfix">
                                        <s class="default"></s>您还没有参与记录哦~
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--历史获得者 -->
                    <div class="history-winwrapp mb48 swiper-slide">
                        <div class="history-win">
                            <div class="win-list clearfix">
                                <div class="win-left fl">
                                    <p class="chao">第2779潮购</p>
                                    <img src="images/goods2.jpg" alt="">
                                </div>
                                <div class="win-right fl">
                                    <p class="show-time">揭晓时间:2017-06-28 15:16:46:000</p>
                                    <p class="winner">获得者：<i>穿越狂信者</i></p>
                                    <p class="show-count">本潮购参与：1480人次</p>
                                    <p class="show-code">幸运潮购码：10003664</p>
                                </div>
                            </div>
                            <div class="win-list clearfix">
                                <div class="win-left fl">
                                    <p class="chao">第2779潮购</p>
                                    <img src="images/goods2.jpg" alt="">
                                </div>
                                <div class="win-right fl">
                                    <p class="show-time">揭晓时间: <i>2017-06-28 15:16:46:000</i></p>
                                    <p class="winner">获得者：<i>穿越狂信者</i></p>
                                    <p class="show-count">本潮购参与：<i>1480</i>人次</p>
                                    <p class="show-code">幸运潮购码：<i>10003664</i></p>
                                </div>
                            </div>
                        </div>
                        <!-- 无内容时显示 -->
                        <div class="nocontent" style="display: none">
                            <div class="m_buylist m_get">
                                <ul id="ul_list">
                                    <div class="noRecords colorbbb clearfix">
                                        <s class="default"></s>您还没有参与记录哦~
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="pro_foot">
                <a href="" class="">第10364潮正在进行中<span class="dotting"></span></a>
                <a href="" class="shopping">立即参与</a>
                <span href="" class="fr"><i><b num="1">1</b></i></span>
            </div>
        </div>
    </div>
    </div>
    @endsection
@section("my-js")
    <script src="http://cdn.bootcss.com/flexslider/2.6.2/jquery.flexslider.min.js"></script>
    <script>
        $(function () {
        $('.hotimg').flexslider({
            directionNav: false,   //是否显示左右控制按钮
            controlNav: true,   //是否显示底部切换按钮
            pauseOnAction: false,  //手动切换后是否继续自动轮播,继续(false),停止(true),默认true
            animation: 'slide',   //淡入淡出(fade)或滑动(slide),默认fade
            slideshowSpeed: 3000,  //自动轮播间隔时间(毫秒),默认5000ms
            animationSpeed: 150,   //轮播效果切换时间,默认600ms
            direction: 'horizontal',  //设置滑动方向:左右horizontal或者上下vertical,需设置animation: "slide",默认horizontal
            randomize: false,   //是否随机幻切换
            animationLoop: true   //是否循环滚动
        });
        setTimeout($('.flexslider img').fadeIn());

        // 参与记录、历史获得者左右切换
        // $('.listtab a').click(function(){
        //     $(this).addClass('current').siblings('a').removeClass('current');
        //     if($('.partcon').css('display')=='block'){
        //         $('.partcon').css('display','none');
        //         $('.history-winwrapp').css('display','block');
        //     }else{
        //         $('.partcon').css('display','block');
        //         $('.history-winwrapp').css('display','none');
        //     }
        // })



        // 无内容判断
        if($('.partcon .part-record div.ann_list').length==0){
            $('.partcon .part-record').css('display','none');
            $('.partcon .nocontent').css('display','block');
        }else{
            $('.partcon .part-record').css('display','block');
            $('.partcon .nocontent').css('display','none');
        }


        if($('.history-winwrapp .history-win .win-list').length==0){
            $('.history-winwrapp .history-win').css('display','none');
            $('.history-winwrapp .nocontent').css('display','block');
        }else{
            $('.history-winwrapp .history-win').css('display','block');
            $('.history-winwrapp .nocontent').css('display','none');
        }

        // 滑动
        var tabsSwiper = new Swiper('#tabs-container',{
            speed:500,
            onSlideChangeStart: function(){
                $(".tabs .active").removeClass('active')
                $(".tabs a").eq(tabsSwiper.activeIndex).addClass('active')
            }
        })
        $(".tabs a").on('touchstart mousedown',function(e){
            e.preventDefault()
            $(".tabs .active").removeClass('active')
            $(this).addClass('active')
            tabsSwiper.slideTo( $(this).index() )
        })
        $(".tabs a").click(function(e){
            e.preventDefault()
        })
    })
    </script>
@endsection





