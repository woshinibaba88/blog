<?php 
namespace app\admin\controller;
use think\Controller;
class Common extends Controller{
    /**构造方法 */
    public function _initialize(){
        //判断是否有session
        if(!session("?adminInfo")){
            $this->error('请先登录',url('Login/login'));
        }
    }

    /**分类 */
    public function getCategory(){
        $cate_model=model('Category');//连接数据库
        $cateInfo=$cate_model->select();//查询
        $cateInfo=collection($cateInfo)->toArray();
        //print_r($cateInfo);exit;
        $arr=getCateInfo($cateInfo);
        return $arr;
    }
}
?>