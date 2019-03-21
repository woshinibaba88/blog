<?php 
namespace app\index\controller;
use think\Controller;
class text extends Controller
{
    /**文章列表展示 */
    public function textList(){
        /**分类ID */
        $cate_model=model('category');
        $cateInfo=$cate_model->select();
        $this->assign('cateInfo',$cateInfo);

        $cate_id=input('param.cate_id');
        $text_model=model('Text');
        $where=[
            'cate_id'=>$cate_id
        ];
        $textInfo=$text_model->where($where)->select();
        $this->assign('textInfo',$textInfo);
        
        
        return view();
    }
    //文章详情页面
    public function textContent(){
        $cate_model=model('category');
        $cateInfo=$cate_model->select();
        $this->assign('cateInfo',$cateInfo);

        $text_id=input("param.text_id");
        $where=[
            'text_id'=>$text_id
        ];
        $text_model=model("Text");
        $Info=$text_model->where($where)->find();


        $admin_id=session('adminInfo.admin_id');
        $cwhere=[
            'text_id'=>$text_id,
            'admin_id'=>$admin_id
        ];
        $count=[
            "text_id"=>$text_id
        ];
        $model=model('Text_admin');
        $cou=$model->where($where)->count();
        $res=$model->where($cwhere)->select();
        $this->assign('res',$res);
        $this->assign('cou',$cou);
        $this->assign('Info',$Info);
        return view();
    }
    //文章点赞
    public function textCon(){
       $text_id=input('param.text_id');
       $admin_id=session('adminInfo.admin_id');
       $where=[
            'text_id'=>$text_id,
            'admin_id'=>$admin_id
       ];
       $model=model('Text_admin');
       $res=$model->where($where)->select();
       if(empty($res)){
           $arr=$model->save($where);
           if($arr){
                echo 1;
           }else{
                echo 3;
           }
       }else{
                echo 2;
       }
    }
    //删除赞
    public function del(){
        $text_id=input('param.text_id');
       $admin_id=session('adminInfo.admin_id');
       $where=[
            'text_id'=>$text_id,
            'admin_id'=>$admin_id
       ];
       $model=model('Text_admin');
       $res=$model->where($where)->select();
       if(!empty($res)){
            $arr=$model->where($where)->delete();
            if($arr){
                echo 1;
            }else{
                echo 2;
            }
       }else{
           echo 3;
       }
    }
}
?>