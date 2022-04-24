<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        // $products = Product::all();
        // Session::forget('product_id');
        // Session::flush();
        // $request->session()->forget('product_id');
        // session()->put('product_id',);
        // session()->forget('cart');

        if (!session()->has('cart') ){
            session()->put('cart',[]);
            $cart = session()->get('cart');
        }else{
             $cart = session()->get('cart');
        }
        // dd(Session()->get('cart'));
        //
        // return dd($cart);
        // $products = Product::whereIn('id', (array)$ids)->paginate(5);
        $products = Product::all();
        return view('user.cart',[
            'cart'=> $cart,
            'product' => $products
        ]);
        // \Log::info(print_r(session()->all(),true));

        // return print_r(session()->all(),true);
        // return print_r($products,true);

        // return view('user.test',[
        //     'test' => session()->get('product_id'),
        //     'test2' => session()->all()
        // ]);
        // return view('user.test2',[
        //     'test' => session()->get('product_id'),
        //     'test2' => session()->all()
        // ]);
    }



    public function addToCart(Request $request){

        $p_id = $request->get('id');

        $p_price = $request->get('price');
        $p_qty = (int)$request->get('product-quatity');

        if(!is_int($p_qty) || $p_qty == null || $p_qty == ''){
            if($request->ajax()){
                return response('Đặt thất bại. xin kiểm tra lại số lượng!');
            }
            return redirect()->back()->with('notice','đặt thất bại. xim kiểm tra lại số lượng');
        }
        $p_name = $request->get('name');
        $p_url = $request->get('url');

        // session()->put('product_id',[$id]);

        // session()->push('product_id',$id);

        // $userId = Session::get('user_id');

        if(!session()->has('cart')){
            session()->put('cart',[]);
            session()->push('cart',[
                'p_id'=>$p_id,
                'p_price'=>$p_price,
                'p_qty'=>$p_qty,
                'p_name'=>$p_name,
                'p_url'=>$p_url
            ]);
        }else{
            session()->push('cart',[
                'p_id'=>$p_id,
                'p_price'=>$p_price,
                'p_qty'=>$p_qty,
                'p_name'=>$p_name,
                'p_url'=>$p_url
            ]);
       }
    //    $cart = session()->get('cart');
    //     return view('user.test',[
    //         'cart' => $cart
    //     ]);

    // $request->session()->forget('cart');
        if($request->ajax()){
            return response('Đặt thành công.');
        }
        return redirect()->back()->with('notice','đã thêm vào giỏ!');
        // return print_r(session()->get('cart'));
        // return $p_url;
    }

    public function delete_cart_item($id){

        $cart = session()->get('cart');
        unset($cart[$id]);
        $cart = array_values($cart);
        session()->put('cart',$cart);
        // $cart = array_splice($cart,0,1);

        // $cart = array_splice($cart,0,1);
        // $cart = array_values($cart);
        //
        // dd($cart);
        // foreach($cart as $item){
        //     if(($key = array_search($id,$item)) !== false ){
        //         $key2 = array_search($key,$cart);
        //         // dd($key2);
        //         unset($cart[array_search($key,$cart)] );
        //         $cart = array_values($cart);
        //         break;
        //         // return dd($cart);
        //     }
        // }

        // return dd($cart);
        // if(($key = array_search($id, $cart->p_id) ) !== false ){
        //     return $key;
        //     unset($cart[$key]);
        // }

        return redirect()->back()->with('notice','đã xóa!');
    }


    public function update_cart_item(Request $request){
        $qty = $request->get('product-quatity');
        $index = $request->get('index');
        // $cart = session()->get('cart');
        $cart = session()->get('cart');
        $cart_item = $cart[$index];
        $cart_item_update  =  Arr::set($cart_item,'p_qty', $qty);
        $cart_update = [$index => $cart_item_update];
        $cart = array_replace($cart,$cart_update);
        $cart = array_values($cart);
        session()->put('cart',$cart);
        return redirect()->back()->with('notice','cập nhật thành công!');

    }
    // public function addToCartByAjax(Request $request){

    //     $p_id = $request->get('id');

    //     $p_price = $request->get('price');
    //     $p_qty = $request->get('qty');
    //     $p_name = $request->get('name');
    //     $p_url = $request->get('img');
    //         // dd($request->all());
    //     // session()->put('product_id',[$id]);

    //     // session()->push('product_id',$id);

    //     // $userId = Session::get('user_id');

    //     if(!session()->has('cart')){
    //         // session()->put('cart',[]);
    //         session()->put('cart',[
    //             'p_id'=>$p_id,
    //             'p_price'=>$p_price,
    //             'p_qty'=>$p_qty,
    //             'p_name'=>$p_name,
    //             'p_url'=>$p_url
    //         ]);
    //     }else{
    //         session()->push('cart',[
    //             'p_id'=>$p_id,
    //             'p_price'=>$p_price,
    //             'p_qty'=>$p_qty,
    //             'p_name'=>$p_name,
    //             'p_url'=>$p_url
    //         ]);
    //    }
    //     return response()->json(['status'=>'Thêm thành công']);

    // }
}
