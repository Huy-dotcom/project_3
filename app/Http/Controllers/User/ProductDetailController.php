<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function index($id){
        $products = Product::all();
        $productDetail = Product::where('id',$id)->first();
        $brand = Brand::where('id',$productDetail->brand_id)->first();
        // $comments = Comment::where('product_id',$id)->orderBy('create_at','desc')->paginate(6);
        // $userInfoList = User::where('id',$comments->user_id)->get();
        $comments = DB::table('comments')
                ->select('comments.content','comments.created_at','users.name')
                ->join('users','users.id','=','comments.user_id')
                ->where('comments.product_id',$id)
                ->orderBy('comments.created_at','desc')
                ->paginate(5);

        $commentCount = Comment::where('product_id',$id)->count();
        return view('user.productDetail',[
            'productDetail' => $productDetail,
            'brand' => $brand,
            'comments' => $comments,
            'commentCount' => $commentCount,
            'products' => $products
        ]);
    }
    public function commenting(Request $request){
        if(!session()->has('user_id') || !session()->has('user_name')){
            return redirect()->back()->with('notice','bạn cần đăng nhập');
        }
        $comment = $request->get('comment');
        $pID = $request->get('id');
        $userID = session()->get('user_id');

        DB::table('comments')->insert([
            'user_id' => $userID,
            'product_id' => $pID,
            'content' => $comment,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('notice','đăng thành công');
    }
}
