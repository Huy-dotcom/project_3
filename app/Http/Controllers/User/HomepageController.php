<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $saleList = Product::whereNotNull('sale_price')->get();
        $saleListCount = Product::whereNotNull('sale_price')->count();
        $productInOrder = Product::orderBy('updated_at','DESC');
        return view('user.homepage',[
            'saleList' => $saleList,
            'saleListCount' => $saleListCount,
            'productInOrder' => $productInOrder

        ]);
    }
}
