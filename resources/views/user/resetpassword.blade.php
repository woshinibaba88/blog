@extends('master')
@section('title',"重置密码")
@section('content')
    <!--触屏版内页头部-->
    <div class="m-block-header" id="div-header">
        <strong id="m-title">重置密码</strong>
        <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
        <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
    </div>


    <div class="wrapper">
        <div class="registerCon">
            <ul>
                <li>
                    <s class="password"></s>
                    <input type="password" id="verifcode" placeholder="6-16位数字、字母组成" value="" maxlength="26" />
                    <span class="clear">x</span>
                </li>
                <li><a id="findPasswordNextBtn" href="javascript:void(0);" class="orangeBtn">确认重置</a></li>
            </ul>
        </div>

    </div>
@endsection
@section("my-js")
    <script>
        layui.use(['layer', 'laypage', 'element'], function(){
            var layer = layui.layer
                ,laypage = layui.laypage
                ,element = layui.element();
        })
    </script>
    <script>




        function resetpwd(){
            // 密码失去焦点
            $('#verifcode').blur(function(){
                reg=/^[0-9A-Za-z]{6,16}$/;
                var that = $(this);
                if( that.val()==""|| that.val()=="6-16位数字、字母组成"){
                    layer.msg('请重置密码！');
                }else if(!reg.test(that.val())){
                    layer.msg('请输入6-16位数字、字母组成的密码！');
                }
            })

        }
        resetpwd();



        $('.registerCon input').bind('keydown',function(){
            var that = $(this);
            if(that.val().trim()!=""){

                that.siblings('span.clear').show();
                that.siblings('span.clear').click(function(){
                    that.val("");
                    $(this).hide();
                })

            }else{
                that.siblings('span.clear').hide();
            }

        })
        // function show(){
        //     if($('.registerCon input').attr('type')=='password'){
        //         $(this).prev().prev().val($("#passwd").val());
        //     }
        // }
        // function hide(){
        //     if($('.registerCon input').attr('type')=='text'){
        //         $(this).prev().prev().val($("#passwd").val());
        //     }
        // }
        // $('.registerCon s').bind({click:function(){
        //     if($(this).hasClass('eye')){
        //         $(this).removeClass('eye').addClass('eyeclose');

        //         $(this).prev().prev().prev().val($(this).prev().prev().val());
        //         $(this).prev().prev().prev().show();
        //         $(this).prev().prev().hide();


        //     }else{
        //             console.log($(this  ));
        //             $(this).removeClass('eyeclose').addClass('eye');
        //             $(this).prev().prev().val($(this).prev().prev().prev().val());
        //             $(this).prev().prev().show();
        //             $(this).prev().prev().prev().hide();

        //          }
        //      }
        //  })
    </script>
@endsection







