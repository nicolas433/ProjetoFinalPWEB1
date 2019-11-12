<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Address;
use App\Solicitation; // Pedido
use App\RequestProduct;
use App\Status;

class SolicitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $requests = Solicitation::all()->where( 'user_id', '=', $userId);

        foreach($requests as $request) {
            $status = Status::find($request->status_id);
            $request->status = $status->title;
            $request->status_id = $status->id;
        }
        
        return view('pages.myrequests.index', compact('requests'));
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
                return view('pages.myrequests.summary', compact(['products', 'address']));
            } else {
                return redirect('/home');
            }

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
        $solicitation = new Solicitation();

        if (!auth()->user()->id) {
            return redirect('/home');
        }

        $solicitation->client_confirm = 1;
        $solicitation->user_id = auth()->user()->id;
        $solicitation->address_id = $request->input('addressId');
        $solicitation->status_id = 1;
        $solicitation->save();

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

            // Cadastro dos registros da tabela request_products
            for($i=0; $i < count($products); $i++) {
                $requestProduct = new RequestProduct();
                $requestProduct->request_id = $solicitation->id;
                $requestProduct->product_id = $products[$i]->id;
                $requestProduct->amount = $products[$i]->amount;
                $requestProduct->total = $products[$i]->totalValue;
                $requestProduct->save();
            }

            // Limpa a sessão
            $request->session()->forget('bag');

            return view('pages.myrequests.requestDone');
            
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
        // Busca todas as informações de um pedido
        $solicitation = Solicitation::find($id);
        $address = Address::find($solicitation->address_id);
        $status = Status::find($solicitation->status_id);
        $requestProducts = RequestProduct::all()->where('request_id', '=', $solicitation->id);

        $products = [];
        foreach($requestProducts as $requestProduct) {
            $product = Product::find($requestProduct->product_id);
            array_push($products, $product);
        }

        // Adiciona a quantidade e o preço a cada produto
        for($i=0; $i < count($products); $i++){
            $products[$i]->amount = $requestProducts[$i]['amount'];
            $products[$i]->totalValue = $products[$i]->price * $requestProducts[$i]['amount'];
        }

        return view('pages.myrequests.selectedRequest', compact(['solicitation', 'address', 'status', 'products']));
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
