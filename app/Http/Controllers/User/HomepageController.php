<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $saleList = Product::where('sale_price', '!=' , 0)->Where('sale_price','!=',null)->get();
        $saleListCount = Product::where('sale_price', '!=' , 0)->Where('sale_price','!=',null)->count();
        $productInOrder = Product::orderBy('updated_at','DESC')->get();
        $productInOrderCount = Product::orderBy('updated_at','DESC')->count();

        $category = Category::all();

        return view('user.homepage',[
            'saleList' => $saleList,
            'saleListCount' => $saleListCount,
            'productInOrder' => $productInOrder,
            'productInOrderCount' =>$productInOrderCount,
            'category' => $category
        ]);
    }
}
