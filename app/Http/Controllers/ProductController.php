<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->where('operating', '=', '1');
        
        foreach($products as $product) {
            $category = Category::find($product->category_id);
            $product->categoryName = $category->name;
        }  
        return view('pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->where('operating', '=', '1');
        return view('pages.product.newProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        if ($request->input('active') == 'on') {
            $product->active = 1;
        } else {
            $product->active = 0;
        }

        $product->name = $request->input('productName');
        $product->price = $request->input('productPrice');
        $product->description = $request->input('productDescription');
        $product->category_id = $request->input('category');
        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all()->where('operating', '=', '1');
        return view('pages.product.editProduct', compact('product', 'categories'));
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
        if(isset($product)) {
            if ($request->input('active') == 'on') {
                $product->active = 1;
            } else {
                $product->active = 0;
            }

            $product->name = $request->input('productName');
            $product->price = $request->input('productPrice');
            $product->description = $request->input('productDescription');
            $product->category_id = $request->input('category');
            $product->save();
            return redirect('/products');
        } else {
            return redirect('/products');
        }
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
        if(isset($product)) {
            $product->operating = '0';
            $product->save();
        }
        return redirect('/products');
    }
}
