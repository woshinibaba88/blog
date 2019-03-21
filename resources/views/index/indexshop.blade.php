@extends('master')
@section('title',"呵呵哒的商品列表")
@section('content')
    <body class="g-acc-bg" fnav="0" style="position: static">
<div class="page-group">
    <div id="page-infinite-scroll-bottom" class="page">

        <!--触屏版内页头部-->
        <div class="m-block-header" id="div-header" style="display: none">
            <strong id="m-title"></strong>
            <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
            <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
        </div>

        <div class="pro-s-box thin-bor-bottom" id="divSearch">
            <div class="box">
                <div class="border">
                    <div class="border-inner"></div>
                </div>
                <div class="input-box">
                    <i class="s-icon"></i>
                    <input type="text" placeholder="输入“汽车”试试" id="txtSearch" />
                    <i class="c-icon" id="btnClearInput" style="display: none"></i>
                </div>
            </div>
            <a href="javascript:;" class="s-btn" id="btnSearch">搜索</a>
        </div>

        <!--搜索时显示的模块-->
        <div class="search-info" style="display: none;">
            <div class="hot">
                <p class="title">热门搜索</p>
                <ul id="ulSearchHot" class="hot-list clearfix"><li wd='iPhone'><a class="items">iPhone</a></li><li wd='三星'><a class="items">三星</a></li><li wd='小米'><a class="items">小米</a></li><li wd='黄金'><a class="items">黄金</a></li><li wd='汽车'><a class="items">汽车</a></li><li wd='电脑'><a class="items">电脑</a></li></ul>
            </div>
            <div class="history" style="display: none">
                <p class="title">历史记录</p>
                <div class="his-inner" id="divSearchHotHistory">
                    <ul class="his-list thin-bor-top">
                        <li wd="小米移动电源" class="thin-bor-bottom"><a class="items">小米移动电源</a></li>
                        <li wd="苹果6" class="thin-bor-bottom"><a class="items">苹果6</a></li>
                        <li wd="苹果电脑" class="thin-bor-bottom"><a class="items">苹果电脑</a></li>
                    </ul>
                    <div class="cle-cord thin-bor-bottom" id="btnClear">清空历史记录</div>
                </div>
            </div>
        </div>

        <div class="all-list-wrapper">

            <div class="menu-list-wrapper" id="divSortList">
                <ul id="sortListUl" class="list">
                        <li sortid='0' class='current'><span class='items' id="bb">全部商品</span></li>
                    @foreach($cate as $v)
                        <li sortid='100' reletype='1' linkaddr=''>
                            <span class='items' id="cate_id"  cate_id="{{$v->cate_id}}">{{$v->cate_name}}</span>
                        </li>
                    @endforeach
                    <input type="hidden" id="_token" value="{{csrf_token()}}">
                </ul>
            </div>

            <div class="good-list-wrapper">
                <div class="good-menu thin-bor-bottom">
                    <ul class="good-menu-list" id="ulOrderBy">
                        <li orderflag="50"><a href="javascript:;" id="is_new">最新</a></li>
                        <li orderflag="50"><a href="javascript:;" id="self_price">价值</a><span> ↑</span></li>
                        <!--价值(由高到低30,由低到高31)-->
                    </ul>
                </div>

                <div class="good-list-inner">
                    <div id="pullrefresh" class="good-list-box  mui-content mui-scroll-wrapper">
                        <div class="goodList mui-scroll">
                            <ul id="ulGoodsList" class="mui-table-view mui-table-view-chevron">
                                @foreach($data as $v)
                                    <li id="23468">
                                        <a href="{{url('index/shopcontent/'.$v->goods_id)}}">
                                            <span class="gList_l fl">
                                                <img class="lazy" src="{{url($v->goods_img)}}">
                                            </span>
                                        </a>
                                        <div class="gList_r">
                                            <h3 class="gray6">{{$v->goods_name}}</h3>
                                            <em class="gray9">价值：￥{{$v->self_price}}</em>
                                            <div class="gRate">
                                                <div class="Progress-bar">
                                                    <p class="u-progress">
                                                    <span style="width: 91.91286930395593%;" class="pgbar">
                                                        <span class="pging"></span>
                                                    </span>
                                                    </p>
                                                    <ul class="Pro-bar-li">
                                                        <li class="P-bar01"><em>{{$v->goods_num}}</em>剩余</li>
                                                    </ul>
                                                </div>
                                                <a codeid="12785750" class="" canbuy="646" id="AddCar" goods_id="{{$v->goods_id}}"><s></s></a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="footer clearfix">
            <ul>
                <li class="f_home"><a href="{{url('index')}}" ><i></i>潮购</a></li>
                <li class="f_announced"><a href="{{url('index/indexshop')}}" class="hover"><i></i>全部商品</a></li>
                <li class="f_single"><a href="#" ><i></i>呵呵哒</a></li>
                <li class="f_car"><a id="btnCart" href="{{url('index/indexshopcar')}}" ><i></i>购物车</a></li>
                <li class="f_personal"><a href="{{url('index/indexuser')}}" ><i></i>我的潮购</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
@endsection
    <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
    <script>
        $(function(){
            $(document).on('click',"#cate_id",function(){
                var _this=$(this);
                var cate_id=_this.attr("cate_id");
                var _token=$("#_token").val();
                _this.parent("li").siblings("li").removeClass("current");
                _this.parent("li").addClass('current');
                $.post(
                    "{{url('index/indexshopajax')}}",
                    {_token:_token,cate_id:cate_id},
                    function(res){
                        $(".good-list-inner").html(res);
                    }
                )
            });
            $(document).on('click',"#bb",function(){
                var _this=$(this);
                var _token=$("#_token").val();
                _this.parent("li").siblings("li").removeClass("current");
                _this.parent("li").addClass('current');
                $.post(
                    "{{url('index/indexshop')}}",
                    {_token:_token},
                    function(res){
                        $("body").html(res);
                    }
                )
            });
            $(document).on('click',"#is_new",function(){
                var _token=$("#_token").val();
                $(this).css("color",'red');
                $("#self_price").css("color",'');
                $.post(
                    "{{url('index/isnew')}}",
                    {_token:_token},
                    function(res){
                        $(".good-list-inner").html(res);
                    }
                )
            });
            $(document).on('click',"#self_price",function(){
                var _token=$("#_token").val();
                var self_price=$(this).next().html();
                $("#is_new").css("color",'');
                var type='';
                if(self_price=='↑'){
                    type=1;
                    $(this).next().html("↓");
                }else{
                    type=2;
                    $(this).next().html("↑");
                }
                $(this).css("color",'red');
                $.post(
                    "{{url('index/price')}}",
                    {_token:_token,type:type},
                    function(res){
                        $(".good-list-inner").html(res);
                    }
                )
            });
            $(document).on("click","#AddCar",function(){
                var _token=$("#_token").val();
                var goods_id=$(this).attr("goods_id");
                //console.log(goods_id);
                $.post(
                    "{{url('index/addcar')}}",
                    {_token:_token,goods_id:goods_id},
                    function(res){
                        if(res==3){
                            location.href=("{{url('user/login')}}");
                        }
                    }
                )
            })
        })
    </script>

