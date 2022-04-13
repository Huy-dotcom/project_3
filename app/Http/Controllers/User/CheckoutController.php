<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {

        if (!session()->has('cart')) {
            session()->put('cart', []);
            $cart = session()->get('cart');
        } else {
            $cart = session()->get('cart');
        }
        return view('user.checkout', [
            'cart' => $cart
        ]);
    }
    public function checkoutProcess(Request $request)
    {
        if ($request->get('address') == null) {
            return redirect()->back()->with('notice', 'chưa nhập địa chỉ');
        }

        $orderID = "";
        $OrderIDfake = "order_";
        $OrderCount = Order::all()->count();
        $orders = Order::all();
        // return dd($orders);
        for ($i = 0; $i <= $OrderCount; $i++) {
            if ($OrderCount == 0) {
                DB::table('orders')->insert([
                    'id' => $OrderIDfake . $i,
                    'user_id' => session()->get('user_id'),
                    'total' => $request->get('total'),
                    'address' => $request->get('address'),
                ]);
                $orderID = $OrderIDfake . $i;
                break;
            } else {
                foreach ($orders as $order) {
                    if ($OrderIDfake . $i != $order->id) {
                        DB::table('orders')->insert([
                            'id' => $OrderIDfake . $i,
                            'user_id' => session()->get('user_id'),
                            'total' => $request->get('total'),
                            'address' => $request->get('address'),
                        ]);
                        $orderID = $OrderIDfake . $i;
                        break;
                    }
                }
            }
        }

        // while(

        //     // Order::create([
        //         // 'id' => $OrderName,
        //         // 'user_id'=> session()->get('user_id'),
        //         // 'total' => $request->get('total'),
        //         // 'address' =>$request->get('address'),
        //     //     ]);
        // ){
        //     $OrderCount+=1;
        // };
        if ($orderID == "") {
            return redirect()->back()->with('notice', 'something went wrong');
        }

        if (session()->has('cart')) {
            $cart = session()->get('cart');
            foreach ($cart as $item) {
                OrderDetail::create([
                    'order_id' => $orderID,
                    'product_id' => $item['p_id'],
                    'qty' => $item['p_qty'],
                ]);
            }
            return view('user.thankyou');
        } else {
            return redirect()->back()->with('notice', 'Giỏ hàng trống');
        }
    }
}
