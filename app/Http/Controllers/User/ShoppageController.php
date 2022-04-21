<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ShoppageController extends Controller
{

    public function index(Request $request)
    {
        // session()->forget('cart');
        // session()->forget('user_id');
        // session()->forget('user_name');

        $rowPerPage = 9;
        if($request->ajax()){
            return $this->search($request,$rowPerPage);
        }
        else{return $this->getStaticDataForView($request,$rowPerPage);}
        // $search = $request->get('search');
        // $catId = $request->get('cat');
        // if ($catId != '') {
        //     if (null != ($catId) && $request->get('cat') == 'all') {
        //         $product = Product::where('status', '1')->where('name', 'like', "%$search%")->paginate(8);
        //         $pCount = Product::where('status', '1')->where('name', 'like', "%$search%")->count();
        //     } else {
        //         $product = Product::where('status', '1')->where('category_id', $request->get('cat'))->where('name', 'like', "%$search%")->paginate(8);
        //         $pCount = Product::where('status', '1')->where('category_id', $request->get('cat'))->where('name', 'like', "%$search%")->count();
        //     }
        // } else {
        //     $product = Product::where('status', '1')->where('name', 'like', "%$search%")->paginate(8);
        //     $pCount = Product::where('status', '1')->count();
        // }
        // $sortBy = $request->get('sortby');
        // if (isset($sortBy) && $sortBy != '') {
        //     switch ($sortBy){
        //         case 'date':
        //             $product = $product->sortByDesc('updated_at');
        //             break;
        //         case 'price':
        //             $product = $product->sortBy('price');
        //             break;
        //         case 'price-desc':
        //             $product = $product->sortByDesc('price');
        //             break;
        //         default:
        //             break;
        //     }
        // }
        // $category = Category::all();
        // return view('user.shoppage', [
        //     'category' => $category,
        //     'product' => $product,
        //     'pCount' => $pCount,
        //     'catId' => $catId,
        //     'search' => $search,
        //     'sortby' => $sortBy
        // ]);
    }
    public function search($request, $rowPerPage)
    {

        // dd($request->catlist);
        // query builder
        $query = Product::select('*');
        $rowPerPage = $request->row ?? $rowPerPage;
        // dd($request->search);
        // grade filter
        if (isset($request->catlist) && $request->catlist != 'all') {
            $query->where('category_id', $request->catlist);
        }
        if (isset($request->searchbar)) {
            $query->where('name','like', "%$request->searchbar%");
        }

        //sort
        if(isset($request->sort)){
            switch ($request->sort){
                case 'default':
                    break;
                case 'date':
                    $query->orderBy('updated_at','desc');
                    break;
                case 'price':
                    $query->orderBy('price','asc');
                break;
                case 'price-desc':
                    $query->orderBy('price','desc');
                break;
            }
        }
         // subject filter
        if (isset($request->brand)) {
            $query->where('brand_id', $request->brand);
        }
         // teacher filter
        if (isset($request->min) && isset($request->max)) {
            $query->where('price','>', $request->min)->where('price','<',$request->max);
        }

        // get list of assign match with key
        $product = $query->paginate($rowPerPage);
        // dd($product);


        $html = view('user.productList')
                ->with(['product' => $product])
                ->render();

        return response()->json(['html' => $html], 200);
    }

    public function getStaticDataForView($request,$rowPerPage)
    {
        $cat = $request->get('cat');
        $search = $request->get('search');
        if($search != null){
            $product = Product::where('name','like',"%$search%")->paginate($rowPerPage);
        }elseif($cat != null)
            $product = Product::where('category_id',$cat)->paginate($rowPerPage);
        elseif($search != null && $cat != null){
            $product = Product::where('name','like',"%$search%")->where('category_id',$cat)->paginate($rowPerPage);
        }else{
    	    $product = Product::paginate($rowPerPage);
        }
        $category = Category::all();
        $brand = Brand::all();
        $data = [
            'product' => $product,
            'category' => $category,
            'brand' => $brand,
            'search' => $search,
            'cat' => $cat
        ];

        return view('user.shoppage', $data);

    }
}
