<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        if (!session()->has('cart') ){
            session()->put('cart',[]);
            $cart = session()->get('cart');
        }else{
             $cart = session()->get('cart');
        }
        return view('user.checkout',[
            'cart' => $cart
        ]);
    }
    public function checkoutProcess(Request $request){
        Order::create([
            'user_id'=> session()->get('user_id'),
            'total' => $request->get('total'),
            'address' =>$request->get('address'),
        ]);
        $order = Order::where('user_id',session()->get('user_id'))->first();
        $orderId = $order->id;

        if(session()->has('cart')){
            $cart = session()->get('cart');
            foreach($cart as $item){
                OrderDetail::create([
                    'order_id' => $orderId,
                    'product_id' => $item['p_id'],
                    'qty' => $item['qty'],
                ]);
            }
            return view('user.thankyou');
        }else{
            return redirect()->back()->with('error','Giỏ hàng trống');
        }


    }
}
