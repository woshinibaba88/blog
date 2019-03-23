<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="stylesheet" href="{{url('layui/css/layui.css')}}">
    <link href="{{url('css/index.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/comm.cs')}}s" rel="stylesheet" type="text/css" />
    <link href="{{url('css/member.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('css/mui.min_1.css')}}">
    <link href="{{url('css/goods.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/cartlist.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/fsgallery.css')}}" rel="stylesheet" charset="utf-8">
    <link rel="stylesheet" href="{{url('css/swiper.min.css')}}">
    <link href="{{url('css/login.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/find.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/findpwd.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/login.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/vccode.css')}}" rel="stylesheet" type="text/css" />

    {{--<link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{url('css/login.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{url('css/find.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<script src="{{url('js/jquery190_1.js')}}" language="javascript" type="text/javascript"></script>--}}
    <style>
        .Countdown-con {padding: 4px 15px 0px;}
    </style>
</head>
<body fnav="1" class="g-acc-bg">
    @yield("content")
</body>
<script src="{{url('layui/layui.js')}}"></script>
<script src="{{url('js/all.js')}}"></script>
<script src="{{url('js/index.js')}}"></script>
<script src="{{url('js/lazyload.min.js')}}"></script>
<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('js/swiper.min.js')}}"></script>
<script src="{{url('js/photo.js')}}" charset="utf-8"></script>
<script>
    @yield ("my-js")
</script>