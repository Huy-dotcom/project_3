<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::join('users','orders.user_id','=','users.id')->get(['orders.*','users.name']);
        return view('admin.orders.list', compact('orders'));
    }

    public function show($id)
    {
        $orders_detail = OrderDetail::where('order_id',$id)
        ->join('products','products.id','=','order_details.product_id')
        ->get(['order_details.*','products.name','products.price']);
        $order = Order::find($id);
        return view('admin.orders.show', compact('orders_detail', 'order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('order.list')->with('success', 'Cập nhật trạng thái thành công.');
    }
}
