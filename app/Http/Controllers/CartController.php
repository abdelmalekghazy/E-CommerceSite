<?php

namespace App\Http\Controllers;
use App\Models\Cart; 

use App\Models\Order;
use App\Models\orderdetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
        $user_id  = auth()->user() -> id;
        $cartProducts = Cart::with('product')->where('user_id',$user_id)->get();

        return view('products.cart',['cartProducts' => $cartProducts]);
    }
    public function addproducttocart($productid){
        $user_id  = auth()->user()->id;
    
        $result = Cart::where('user_id',$user_id)->where('product_id', $productid)->first();
        if($result){
            $result ->quantity +=1;
            $result ->save();
        }
        else{
    
        $newCart = new Cart();
        $newCart -> product_id = $productid;
        $newCart -> user_id = $user_id;
        $newCart -> quantity = 1;
        $newCart -> save();
        }
        return redirect('/cart');
    }
    public function Completeorder(){
        $user_id  = auth()->user() -> id;
        $cartProducts = Cart::with('product')->where('user_id',$user_id)->get();

        return view('/products.Completeorder',['cartProducts' => $cartProducts]);
    }
    public function previousorder(){
        $user_id = auth()->user()->id;
       $result = Order::with('orderdetail')->where('user_id',$user_id)->get();

        return view('/products.previousorder',['orders'=>$result]);
    }
    public function oredersdetails(){
        $user_id = auth()->user()->id;
       $result = Order::with('orderdetail')->where('user_id',$user_id)->get();
    
        return view('/products.oredersdetails', ['orders' => $result]);
    }
    
    
    public function orderstable(){
        
       $result = Order::with('orderdetail')->get();

        return view('/products.orderstable',['orders'=>$result]);
    }

    public function StoreOrder(Request $request){
        $user_id  = auth()->user() -> id;
        $newOrder = new Order();
      
        $newOrder-> name  = $request -> name;
        $newOrder-> address  = $request -> address;
        $newOrder-> email  = $request -> email;
        $newOrder-> phone  = $request -> phone;
        $newOrder-> note  = $request -> note;
       
       
        $newOrder-> user_id = $user_id ;
        $newOrder->save();
        $cartProducts = Cart::with('product')->where('user_id',$user_id)->get();

        foreach($cartProducts as $item ){
            $newOrderDetail = new orderdetail();
            $newOrderDetail -> product_id = $item -> product_id;
            $newOrderDetail -> price = $item -> product ->price;
            $newOrderDetail -> quantity = $item -> quantity;
            $newOrderDetail -> order_id =  $newOrder->id;
            $newOrderDetail ->save();
        }

        Cart::where('user_id', $user_id)->delete();


        return redirect('/');
    }

}
