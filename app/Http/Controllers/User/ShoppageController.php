<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShoppageController extends Controller
{
    public function index(Request $request){
        $search = $request->get('search');
        $catId = $request->get('cat');
        if($catId != '' ){
            if(null != ($catId) && $request->get('cat') == 'all'){
                $product = Product::where('name','like',"%$search%")->paginate(8);
                $pCount = Product::where('name','like',"%$search%")->count();
            }else{
            $product = Product::where('category_id',$request->get('cat'))->where('name','like',"%$search%")->paginate(8);
            $pCount = Product::where('category_id',$request->get('cat'))->where('name','like',"%$search%")->count();
            }
        }else{
            $product = Product::where('name','like',"%$search%")->paginate(8);
            $pCount = Product::count();
        }
        $category = Category::all();
        return view('user.shoppage',[
            'category' => $category,
            'product' => $product,
            'pCount' => $pCount,
            'catId' => $catId,
            'search' => $search
        ]);
    }
}
