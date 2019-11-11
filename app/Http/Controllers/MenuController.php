<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class MenuController extends Controller
{
    // Usado para exibir as categorias do cardápio ao cliente
    public function indexCategories()
    {
        $categories = Category::all()->where('operating', '=', '1');
        return view('pages.menu.categories', compact('categories'));
    }

    // Usado para exibir os produtos de uma categoria selecionada
    public function showProductsByCategory($categoryId)
    {
        $products = Product::all()->where('category_id', '=', $categoryId);
        if (isset($products)) {
            return view('pages.menu.productsByCategory', compact('products'));
        } else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        if (isset($product)) {
            return view('pages.menu.selectedItem', compact('product'));
        } else {
            return redirect('/home');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
