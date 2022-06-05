<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    public function addProduct(Request $req)
    {
        $product = new Product();
        $product->name = $req->name;
        $product->price = $req->price;
        $product->unit = $req->unit;
        $product->slug = $req->slug;
        $product->product_code = $req->product_code;
        $product->hot = 0;
        $product->content = $req->content;
        $images = [];
        foreach($req->file('imgs') as $file) {
            $imgName = $file->getClientOriginalName();
            $path = time().'.'.$imgName;
            $file->move(public_path('/products'), $path);
            $images[] = $path;
        }
        $imgnn = $req->img->getClientOriginalName();
        $pathh = time().'.'.$imgnn;
        $req->img->move(public_path('/products'), $pathh);
        array_unshift($images, $pathh);
        $product->imgs = json_encode($images);

        $category = Category::where('name', $req->cate_name)->first();
        if ($category) {
            $product->cate_id = $category->id;
        } else {
            $category = new Category();
            $category->name = $req->cate_name;
            $category->slug = $req->cate_slug;
            $category->save();
            $product->cate_id = $category->id;
        }
        $product->save();
        $products = Product::all();
        return response()->json($products);
    }
    public function getProducts() {
        $products = Product::all();
        return response()->json($products);
    }

    public function removeProduct($id) {
        $product = Product::find($id);
        File::delete(public_path("/products/" . $product->img));
        $product->delete();
        return response()->json(Product::all());
    }
}
