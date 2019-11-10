@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(count($products) > 0)
                    <div class="card p-3">
                        @for($i = 0; $i < count($products); $i++)
                            <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                                <div class="title-product">
                                    {{ $products[$i]->amount }} <b>{{ $products[$i]->name }}</b>
                                </div>
                                <div class="price-actions">
                                    <span>R$ {{ $products[$i]->totalValue }}</span>
                                    <a href="/shoppingbag/{{ $products[$i]->id }}" class="ml-3">remover</a>
                                </div>
                            </div>
                        @endfor
                        
                        <a href="/menu/categories" class="btn btn-dark btn-sm mt-5">Adicionar mais itens</a>
                    </div>
                @else
                    <h1>Sacola de compras vazia</h1>
                @endif

                

                <!-- Mensagem que aparece caso não existam itens na sacola -->
                <!-- <h4>Não há itens na sacola</h4> -->

                <!-- Só deve aparecer caso hajam itens na sacola -->
                <div class="card p-3 fixed-bottom mt-5">
                    <a href="/selectaddress" class="btn btn-dark text-white btn-sm p-3">Realizar pedido</a>
                </div>
            </div>
        </div>
    </div>          
@endsection