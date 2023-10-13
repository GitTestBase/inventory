<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::select('id','cat_name')->where('status',1)->get();
        return view('admin.product')->with('category',$category);
    }

    public function add_product(Request $request)
    {
        $check_prod = Product::firstOrNew(['category_id'=>$request->CategoryName,'prod_name'=>$request->ProductName]); 

            $check_prod->category_id = $request->CategoryName;
            $check_prod->prod_name = $request->ProductName;
            $check_prod->price = $request->price;
            $check_prod->qty = $request->qty;
            $check_prod->status = $request->status;

        if(!$check_prod)
        {
            $check_prod->save();
            Session::flash('message', 'Product is added successfully!!'); 
        }
        else
        {
            $check_prod->update();
            Session::flash('message', 'Product is Updated successfully!!'); 
        }
    }
}
