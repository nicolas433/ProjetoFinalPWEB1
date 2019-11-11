<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ShoppingBagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session()->has('bag')) {
            $bag = $request->session()->get('bag');
            
            // Busca os produtos que estão na sacola de compras
            $products = array();
            for($i=0; $i < count($bag); $i++){
                $product = Product::find($bag[$i]['productId']);
                array_push($products, $product);
            }

            // Adiciona a quantidade e o preço a cada produto
            for($i=0; $i < count($products); $i++){
                $products[$i]->amount = $bag[$i]['amount'];
                $products[$i]->totalValue = $products[$i]->price * $bag[$i]['amount'];
            }

            return view('pages.shoppingBag.index', compact(['products']));
            
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
        $productId = $request->input('productId');
        $amount = $request->input('amount');
        $totalValue = $request->input('totalValue');

        $amount = intval($amount);
        if ($amount < 1) {
            $amount = 1;
        }

        if (session()->has('bag')) {
            $request->session()->push('bag', [
                'productId' => $productId,
                'amount' => $amount,
                'totalValue' => $totalValue
            ]);

            $bag = $request->session()->get('bag');
            
            // Busca os produtos que estão na sacola de compras
            $products = array();
            for($i=0; $i < count($bag); $i++){
                $product = Product::find($bag[$i]['productId']);
                array_push($products, $product);
            }

            // Adiciona a quantidade e o preço a cada produto
            for($i=0; $i < count($products); $i++){
                $products[$i]->amount = $bag[$i]['amount'];
                $products[$i]->totalValue = $products[$i]->price * $bag[$i]['amount'];
            }

            return view('pages.shoppingBag.index', compact('products'));

        } else {
            return redirect('/home');
        }
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
    public function destroy(Request $request, $id)
    {
        if (session()->has('bag')) {
            $bag = $request->session()->get('bag');

            // Remove o produto escolhido do array bag
            for($i = 0; $i < count($bag); $i++){
                $key = array_search($id, $bag[$i]);
                if($key!==false){
                    unset($bag[$i]);
                    break;
                }
            }

            // Atualiza a sessão
            $request->session()->forget('bag');
            $request->session()->put('bag', $bag);

            return $this->index($request);
        }

        return redirect('/home');
    }
}
