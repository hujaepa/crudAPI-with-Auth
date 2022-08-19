<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /*
     * get all product response
     */
    public function index()
    {
        $products= Product::all();
        return response()->json($products);
    }

    /*
    * get product by id
    */
    public function show($productId)
    {
        $product = Product::find($productId);
        return response()->json($product);
    }
    
    /*
    * search
    */
    public function search(Request $request)
    {
        $product = Product::where("product_name","like","%$request->keyword%")->get();
        if (empty($product))
            return response()->json("No product found"); 
        return response()->json($product); 
    }
    
    /*
    * add
    */
    public function add(Request $request)
    {
        $product = new Product;
        $product->product_name = $request->name;
        $product->save();
        $msg = !empty($product->product_id) ? "Successfully save new product.": "Something is wrong. Failed to save new product";
        return response()->json($msg);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);//get the id
        $product->product_name = $request->name;
        $product->save();
        $msg = "Successfully updated product";
        return response()->json($msg);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        $msg = "Successfully deleted product";
        return response()->json($msg);
    }
}
