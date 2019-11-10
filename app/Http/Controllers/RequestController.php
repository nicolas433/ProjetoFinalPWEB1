<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Address;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.request.index');
    }

    // Método responsável por construir o a exibição do resumo do pedido
    public function orderSummary(Request $request) 
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

            $addressSelected = $request->input('addressSelected');
            $address = Address::find($addressSelected);

            if(isset($address)) {
                return view('pages.request.summary', compact(['products', 'address']));
            } else {
                return view('home');
            }

        } else {
            return view('home');
        }

        return view('pages.request.summary');
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
        return "Metodo de confirmação do pedido";
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
    public function destroy($id)
    {
        //
    }
}
