<?php 
namespace app\admin\controller;
class Category extends Common
{
    /**分类添加+添加执行 */
    public function cateAdd(){
        if(request()->isPost()&&request()->isAjax()){
            $data=input('post.');
           // dump($data);die;
            $cate_model=model('Category');
            $res=$cate_model->save($data);
           //echo $cate_model->getLastSql();die;
           if($res){
               successly('添加成功');
           }else{
               fail('添加失败');
           }
        }else{
            return view();
        } 
    }
    /**分类展示 */
    public function cateList(){
        $cate_model=model('Category');
        $cateInfo=$cate_model->select();
        $this->assign('cateInfo',$cateInfo);
        return view();
    }
}
?>