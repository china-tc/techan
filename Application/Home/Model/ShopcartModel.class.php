<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 烟消云散 <1010422715@qq.com> 
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;
use Think\Page;

/**
 * 登录用户的购物车类
 */
class ShopcartModel extends Model{

 /*
    查询购物车
    */  
public  function getcart() {
	    $user=D("Home/member");
	    $uid=$user->uid();
		$map["uid"]= $uid;
	    $cartlist=$this->where($map)->select();
		return $cartlist; 
}
       
 /*
    查询购物车中商品的种类
    */
	public  function getCnt(){
	  $user=D("Home/member");
	    $uid=$user->uid();
		$map["uid"]= $uid;
	     $cartlist=$this->where($map)->select();
		return count($cartlist); 
}
public  function getCntByuid(){
	    $user=D("Home/member");
	    $uid=$user->uid();
		$map["uid"]= $uid;
	    $cartlist=$this->where($map)->select();
		return count($cartlist); 
}
  /*
    查询登录用户购物车中商品的总金额
    */
  public function getPriceByuid() { 
	    
	    $uid=D("Home/member")->uid();
		$map["uid"]= $uid;
        //数量为0，价钱为0
        if ($this->getCnt() == 0) {
            return 0;
        }
		else{
        $total = 0.00;
        $data = $this->where($map)->select();
        foreach ($data as $k=>$val) {
			$id=$val['goodid'];
			$price=$val['price'];
            $total += $val['num'] * $price;
        }
		}
        return sprintf("%01.2f", $total);
    }
/* 查询登录用户购物车中商品的个数*/
 public function getNumByuid(){ 
	   $user=D("Home/member");
	    $uid=$user->uid();
		$map["uid"]= $uid;
        if ($this->getCnt() == 0) {
            //种数为0，个数也为0
            return 0;
        }
     else{
       $data=$this->where($map)->select();
        foreach ($data as $k=>$item)
			{
            $sum += $item['num'];
        }
		}
        return $sum;
    }
/* 登录用户增加购物车中商品的个数*/
public function inc($sort){
	    $user=D("Home/member");
	    $uid=$user->uid();
		$cart=D("shopcart");
		$num= $cart->where("sort='$sort'and uid='$uid'")->getField("num");
        $new=$num+1;
       $cart->where("sort='$sort'and uid='$uid'")->setField('num',$new);
return $new;
}
/* 登录用户减少购物车中商品的个数*/
public function dec($sort){
	    $user=D("Home/member");
	    $uid=$user->uid();
		$cart=D("shopcart");
		$num= $cart->where("sort='$sort'and uid='$uid'")->getField("num");
       $new=$num-1;
     $cart->where("sort='$sort'and uid='$uid'")->setField('num',$new);
return $new;

}
/* 登录用户删除购物车中商品的个数*/
public function deleteid($sort){
	    $user=D("Home/member");
	    $uid=$user->uid();
		$cart=D("shopcart");
		$result= $cart->where("sort='$sort'and uid='$uid'")->delete();

return $id;
}

}
