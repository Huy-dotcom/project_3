<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderListController extends Controller
{
    public function index()
    {
        $allOrder = Order::orderBy('created_at', 'DESC')->get();
        $orderOnChecking = Order::where('status', '0')->get();
        $orderOnShipping = Order::where('status', '1')->get();
        $orderFinished = Order::where('status', '2')->get();
        $history = Order::where('status', '3')->orWhere('status', '2')->get();
        return view('user.orderManagement', [
            'allOrder' => $allOrder,
            'orderOnChecking' => $orderOnChecking,
            'orderOnShipping' => $orderOnShipping,
            'orderFinished' => $orderFinished,
            'history' => $history
        ]);
    }
    public function detail($id)
    {
        $products = DB::table('order_details')
            ->select('order_details.qty', 'products.name', 'products.price', 'products.sale_price', 'products.start_date', 'products.url', 'products.id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->where('order_id', $id)
            ->get();
        return view('user.orderDetail', [
            'products' => $products
        ]);
    }
    public function cancel($id)
    {
        Order::where('id', $id)
            ->update(['status' => 3]);
        return redirect()->back();
    }
}
