<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($id){

        $productDetail = Product::where('id',$id)->first();
        $brand = Brand::where('id',$productDetail->brand_id)->first();
        return view('user.productDetail',[
            'productDetail' => $productDetail,
            'brand' => $brand
        ]);
    }
}
