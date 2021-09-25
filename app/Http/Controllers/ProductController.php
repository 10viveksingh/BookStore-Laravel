<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function addProduct(Request $req)
    {
        $product = new Product;
        $product->name=$req->input('name');
        $product->author=$req->input('author');
        $product->no_of_pages=$req->input('no_of_pages');
        $product->price=$req->input('price');
        $product->file_path=$req->file('file')->store('Products');
        $product->save();
        return $product;
    }

    function list()
    {
        
        //$product = Product::query()->orderByDesc('id')->paginate(4);
        //return response ($product, 200);

        return product::all();
        
    }

    function updateProduct($id,Request $req)
    {
        $product = Product::find($id);
        $product->name=$req->input('name');
        $product->author=$req->input('author');
        $product->no_of_pages=$req->input('no_of_pages');
        $product->price=$req->input('price');
        $product->file_path=$req->file('file')->store('Products');
        $product->save();
        return $product;
    }

    function getProduct($id)
    {
        return product::find($id);
    }




}