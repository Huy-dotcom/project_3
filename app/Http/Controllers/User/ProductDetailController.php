<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function index($id){

        $productDetail = Product::where('id',$id)->first();
        $brand = Brand::where('id',$productDetail->brand_id)->first();
        // $comments = Comment::where('product_id',$id)->orderBy('create_at','desc')->paginate(6);
        // $userInfoList = User::where('id',$comments->user_id)->get();
        $comments = DB::table('comments')
                ->select('*')
                ->join('users','users.id','=','comments.user_id')
                ->where('comments.product_id',$id)
                ->orderBy('created_at','desc')
                ->paginate(5);

        $commentCount = Comment::where('product_id',$id)->count();
        return view('user.productDetail',[
            'productDetail' => $productDetail,
            'brand' => $brand,
            'comments' => $comments,
            'commentCount' => $commentCount,
        ]);
    }
}
