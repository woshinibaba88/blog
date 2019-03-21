<?php
namespace app\admin\controller;
use think\Controller;
    class Text extends Common{
        //添加
        public function textAdd(){
            if(request()->isPost()&&request()->isAjax()){
               $data=input('post.');
            //    print_r($data) ;die;
               $model_text=model('Text');
               $res=$model_text->save($data);
               if($res){
                    successly('添加成功');
                }else{
                    fail('添加失败');
                }
            }else{
                $cateInfo=model('category')->select();
                $this->assign('cateInfo',$cateInfo);
                return view();
            }
           
        }
        // /***展示 */
        public function textShow(){

            return $this->fetch();
        }
        public function t_list(){
           
            $info=model('text')->select();
            // print_r($info);die;
            $arr=[
                'code'=>0,
                'data'=>$info
            ];
           echo json_encode($arr);
        }
       
    }
?>
