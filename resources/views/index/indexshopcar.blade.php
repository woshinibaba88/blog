@extends('master')
@section('title',"呵呵哒的潮购")
@section('content')
    <input name="hidUserID" type="hidden" id="hidUserID" value="-1" />
    <div>
        <!--首页头部-->
        <div class="m-block-header">
            <a href="/" class="m-public-icon m-1yyg-icon"></a>
            <a href="/" class="m-index-icon">编辑</a>
        </div>
        <!--首页头部 end-->
        <div class="g-Cart-list">
            <ul id="cartBody">
                @foreach($data as $v)
                <li>
                    <s class="xuan current" self_price="{{$v->self_price}}" car_id="{{$v->car_id}}" goods_id="{{$v->goods_id}}"></s>
                    <a class="fl u-Cart-img" href="/v44/product/12501977.do">
                        <img src="{{url($v->goods_img)}}" border="0" alt="">
                    </a>
                    <div class="u-Cart-r">
                        &nbsp;&nbsp;<b style="color:#d62728">{{$v->goods_name}}</b>
                        <span class="gray9">
                           &nbsp; 剩余<em style="color:red" id="goods_num">{{$v->goods_num}}</em>人次 &nbsp;&nbsp;&nbsp;&nbsp;<b style="color:dodgerblue">单价:{{$v->self_price}}</b>
                        </span>
                        <div class="num-opt" goods_num="{{$v->goods_num}}">
                            <em class="num-mius" id="enAdd"><i></i></em>
                            <input class="text_box" id="buy_num" car_id="{{$v->car_id}}" type="text" value="{{$v->buy_num}}" codeid="12501977">
                            <em class="num-add" id="deAdd"><i></i></em>
                        </div>
                        <a href="javascript:;" name="delLink" cid="12501977" isover="0" class="z-del" id="del" car_id="{{$v->car_id}}"><s></s></a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div id="divNone" class="empty "  style="display: none"><s></s><p>您的购物车还是空的哦~</p><a href="https://m.1yyg.com" class="orangeBtn">立即潮购</a></div>
        </div>
        <div id="mycartpay" class="g-Total-bt g-car-new" style="">
            <dl>
                <dt class="gray6">
                    <s class="quanxuan current"></s>全选
                    <p class="money-total">合计<em class="orange total"><span>￥</span>17.00</em></p>

                </dt>
                <dd>
                    <a href="javascript:;" id="a_paydel" class="orangeBtn w_account remove">删除</a>
                    <a href="javascript:;" id="a_payment" class="orangeBtn w_account">去结算</a>
                </dd>
            </dl>
        </div>
        <div class="hot-recom">
            <div class="title thin-bor-top gray6">
                <span><b class="z-set"></b>人气推荐</span>
                <em></em>
            </div>
            <div class="goods-wrap thin-bor-top">
                <ul class="goods-list clearfix">
                    @foreach($date as $v)
                    <li>
                        <a href="https://m.1yyg.com/v44/products/23458.do" class="g-pic">
                            <img src="{{url($v->goods_img)}}" width="136" height="136">
                        </a>
                        <p class="g-name">
                            <a href="https://m.1yyg.com/v44/products/23458.do">{{$v->goods_name}}</a>
                        </p>
                        <ins class="gray9">价值:￥{{$v->self_price}}</ins>
                        <div class="btn-wrap">
                            <div class="Progress-bar">
                                <p class="u-progress">
                                    <span class="pgbar" style="width:1%;">
                                        <span class="pging"></span>
                                    </span>
                                </p>
                            </div>
                            <div class="gRate" data-productid="23458">
                                <a href="javascript:;" id="AddCar" goods_id="{{$v->goods_id}}"><s></s></a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>



        <input type="hidden" id="_token" value="{{csrf_token()}}">
        <div class="footer clearfix">
            <ul>
                <li class="f_home"><a href="{{url('index')}}" ><i></i>潮购</a></li>
                <li class="f_announced"><a href="{{url('index/indexshop')}}" ><i></i>全部商品</a></li>
                <li class="f_single"><a href="#" ><i></i>呵呵哒</a></li>
                <li class="f_car"><a id="btnCart" href="{{url('index/indexshopcar')}}" class="hover"><i></i>购物车</a></li>
                <li class="f_personal"><a href="{{url('index/indexuser')}}" ><i></i>我的潮购</a></li>
            </ul>
        </div>
    </div>
@endsection
<script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
    <!---商品加减算总数---->
<script>
    $(function () {
       //加号
       $(document).on("click","#deAdd",function(){
           var _token=$("#_token").val();
           var car_id=$(this).prev().attr("car_id");
           var buy_num=parseInt($(this).prev().val());
           var goods_num=parseInt($(this).parent("div").attr("goods_num"));
            buy_num=buy_num + 1;
            $(this).prev().val(buy_num);
            if(buy_num>=goods_num){
                $(this).prev().val(goods_num);
            };
            $.post(
                "{{url('index/deadd')}}",
                {_token:_token,car_id:car_id,buy_num:buy_num},
                function(res){

                }
            )
       })
        //减号
        $(document).on("click","#enAdd",function(){
            var _token=$("#_token").val();
            var car_id=$(this).next().attr("car_id");
            var buy_num=parseInt($(this).next().val());
            buy_num=buy_num-1;
            console.log(buy_num);
            $(this).next().val(buy_num);
            if(buy_num<1){
                $(this).next().val(1);
            }
            $.post(
                "{{url('index/deadd')}}",
                {_token:_token,car_id:car_id,buy_num:buy_num},
                function(res){

                }
            )
        })
        //失焦事件
        $(document).on("blur","#buy_num",function(){
            var _token=$("#_token").val();
            var car_id=$(this).attr("car_id");
            var buy_num=parseInt($(this).val());
            var goods_num=parseInt($(this).parent("div").attr("goods_num"));
            var res=/^[0,9]\d*$/;
            if(buy_num>=goods_num){
                $(this).val(goods_num);
            }else if(buy_num<1){
                $(this).val(1);
            }else if(!res.test(buy_num)){
                $(this).val(1);
            }
            $.post(
                "{{url('index/deadd')}}",
                {_token:_token,car_id:car_id,buy_num:buy_num},
                function(res){

                }
            )
        })
        //加入购物车事件
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
                    location.href="{{url('index/indexshopcar')}}";
                }
            )
        })
        //
        // 全选
        $(".quanxuan").click(function () {
            if($(this).hasClass('current')){
                $(this).removeClass('current');
                $(".g-Cart-list .xuan").each(function () {
                    if ($(this).hasClass("current")) {
                        $(this).removeClass("current");
                    } else {
                        $(this).addClass("current");
                    }
                });
                GetCount();
            }else{
                $(this).addClass('current');

                $(".g-Cart-list .xuan").each(function () {
                    $(this).addClass("current");
                    // $(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
                });
                GetCount();
            }


        });
        // 单选
        $(".g-Cart-list .xuan").click(function () {
            if($(this).hasClass('current')){


                $(this).removeClass('current');

            }else{
                $(this).addClass('current');
            }
            if($('.g-Cart-list .xuan.current').length==$('#cartBody li').length){
                $('.quanxuan').addClass('current');

            }else{
                $('.quanxuan').removeClass('current');
            }
            // $("#total2").html() = GetCount($(this));
            GetCount();
            //alert(conts);
        });
        // 已选中的总额
        function GetCount() {
            var conts = 0;
            var aa = 0;
            $(".g-Cart-list .xuan").each(function () {
                if ($(this).hasClass("current")) {
                    for (var i = 0; i < $(this).length; i++) {
                        num= parseInt($(this).siblings('div').children('div').children('input').val());
                        price=parseInt($(this).attr("self_price"))
                        conts+=num*price;
                        // aa += 1;
                    }
                }
            });

            $(".total").html('<span>￥</span>'+(conts).toFixed(2));
        }
        GetCount();
        //删除
        $(document).on("click","#del",function(){
            var _token=$("#_token").val();
            var car_id=$(this).attr("car_id");
            $.post(
                "{{url('index/del')}}",
                {_token:_token,car_id:car_id},
                function(res){
                    if(res==1){
                        location.href="{{url('index/indexshopcar')}}";
                        $(this).parents("li").empty();
                    }else{

                    }
                }
            )
        })
        //批量删除
        $(document).on("click","#a_paydel",function() {
            var _token=$("#_token").val();
            var car_id='';
            $(".g-Cart-list .xuan").each(function () {
                if ($(this).hasClass("current")) {
                    for (var i = 0; i < $(this).length; i++) {
                        car_id+= $(this).attr("car_id")+',';
                    }
                }
            })
            console.log(car_id)
            $.post(
                "{{url('index/paydel')}}",
                {_token:_token,car_id:car_id},
                function(res){
                    location.href="{{url('index/indexshopcar')}}";
                }
            )
        })
        //结算
        $(document).on("click","#a_payment",function(){
            var _token=$("#_token").val();
            var goods_id='';
            $(".g-Cart-list .xuan").each(function () {
                if ($(this).hasClass("current")) {
                    for (var i = 0; i < $(this).length; i++) {
                        goods_id+= $(this).attr("goods_id")+',';
                    }
                }
            })
            console.log(goods_id)
            $.post(
                "{{url('address/payment')}}",
                {_token:_token,goods_id:goods_id},
                function(res){
                    location.href="{{url('address/payment')}}";
                }
            )
        })
    })
</script>