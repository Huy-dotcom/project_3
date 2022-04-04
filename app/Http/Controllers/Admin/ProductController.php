<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::select(
        'select p.*,c.name cate_title,b.name brand_title, s.name supplier_title from products p,categories c,brands b,suppliers s
         where p.category_id = c.id and p.brand_id = b.id and p.supplier_id = s.id'
        );
        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $suppliers = Supplier::all();
        return view('admin.products.add', compact('categories', 'brands', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $request->image->storeAs('/public/images/products', $request->image->getClientOriginalName());
                if ($request->type == 0) {
                    Product::create([
                        'type' => $request->type,
                        'name' => $request->name,
                        'price' => $request->price,
                        'url' => '/storage/images/products/' . $request->image->getClientOriginalName(),
                        'description' => $request->description,
                        'category_id' => $request->category_id,
                        'brand_id' => $request->brand_id,
                        'supplier_id' => $request->supplier_id,
                        'qty' => $request->qty
                     ]);
                } else {
                    Product::create([
                        'type' => $request->type,
                        'name' => $request->name,
                        'price' => $request->price,
                        'sale_price' => $request->price_sale,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'url' => '/storage/images/products/' . $request->image->getClientOriginalName(),
                        'description' => $request->description,
                        'category_id' => $request->category_id,
                        'brand_id' => $request->brand_id,
                        'supplier_id' => $request->supplier_id,
                        'qty' => $request->qty
                     ]);
                }
                return redirect()->route('product.list')->with("success","Thêm thành công");
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::find($id);
        $suppliers = Supplier::all();
        return view('admin.products.edit', compact('categories', 'brands', 'product', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $request->image->storeAs('/public/images/products', $request->image->getClientOriginalName());
                $product->url = '/storage/images/products/' .  $request->image->getClientOriginalName();
            }
        }
        $product->type = $request->type;
        $product->name = $request->name;
        if ($request->type == 0) {
            $product->price = $request->price;
        } else {
            $product->price = $request->price;
            $product->sale_price = $request->price_sale;
            $product->start_date = $product->start_date;
            $product->end_date = $product->end_date;
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->qty = $request->qty;
        $product->save();
        return redirect()->route('product.list')->with("success","Cập nhật thành công");
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.list')->with("success","Xóa thành công");
    }

    public function show($id)
    {
        $product = Product::find($id); 
        return view('admin.products.show', compact('product'));
    }

    public function updateStatus($id, $status)
    {
        Product::where('id', $id)->update(['status' => $status]);
        return redirect()->route('product.list')->with("success","Cập nhật trạng thái thành công");
    }
}
