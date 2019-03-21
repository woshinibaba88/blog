<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        /**前台首页 */

        //导航栏
        $cate_model=model('category');
        $cateInfo=$cate_model->select();
        $this->assign('cateInfo',$cateInfo);

        // //接收分类id 根据分类id查询文章Id 标题
        // $cate_id=input("param.cate_id");
        // $where=[
        //     'cate_id'=>$cate_id
        // ];
        $text_model=model('Text');
        $textInfo=$text_model->select();
        $this->assign('textInfo',$textInfo);
       
        return view();
    }
}
