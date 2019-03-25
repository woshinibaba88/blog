<?php

namespace App\Http\Controllers\Index;

use App\Model\Area;
use App\Model\Car;
use App\Model\Category;
use App\Model\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /*
    * @地址管理
    * */
    public function Address()
    {
        return view("address.address");
    }
    /*
    * @订单管理
    * */
    public function payment(Request $request)
    {
        $goods_id=rtrim($request->goods_id,',');
        session(['goods_id'=>$goods_id]);
        $cartmodel=new Car();
        $goodsmodel=new Goods();
        $data=$goodsmodel
            ->join('car','car.goods_id','=','goods.goods_id')
            ->where(['user_id'=>session('user_id')])
            ->get();
        $priceNum=0;
        foreach ($data as $k=>$v){
            $priceNum+=$v['self_price']*$v['buy_num'];
        }
         //dump($priceNum);die;
        //return view('payment',['data'=>$data],['priceNum'=>$priceNum]);

        return view("shop.payment",['goodsInfo'=>$data],['priceNum'=>$priceNum]);
    }
    /*
    * @收件人管理
    * */
    public function witeaddr()
    {
        $Area=new Area();
        $data=$Area->where("pid",'=','0')->get();
        return view("address.witeaddr",['date'=>$data]);
    }
}
