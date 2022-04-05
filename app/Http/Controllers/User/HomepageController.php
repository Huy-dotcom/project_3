<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $saleList = Product::where('sale_price', '!=' , 0)->Where('sale_price','!=',null)->get();
        $saleListCount = Product::whereNotNull('sale_price')->count();
        $productInOrder = Product::orderBy('updated_at','DESC')->get();
        return view('user.homepage',[
            'saleList' => $saleList,
            'saleListCount' => $saleListCount,
            'productInOrder' => $productInOrder

        ]);
    }
}
