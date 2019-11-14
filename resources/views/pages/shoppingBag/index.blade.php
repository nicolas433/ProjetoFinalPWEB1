@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                @component('components.titles', ['title'=>'Sacola de compras', 'subtitle'=>'descrição'])
                @endcomponent

                @if(count($products) > 0)
                    <div class="card p-3 mb-5">
                    @php
                        $total = 0;
                    @endphp
                        @for($i = 0; $i < count($products); $i++)
                            <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                                <div class="title-product">
                                    {{ $products[$i]->amount }} <b>{{ $products[$i]->name }}</b>
                                </div>
                                <div class="price-actions">
                                    <span>R$ {{ $products[$i]->totalValue }}</span>
                                    @php
                                        $total += $products[$i]->totalValue;
                                    @endphp
                                    <form action="/shoppingbag/{{ $products[$i]->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="ml-3">remover</a>
                                    </form>
                                </div>
                            </div>
                        @endfor
                        
                        <span>Valor final R$ {{ $total }}</span>

                        <a href="/menu/categories" class="my-btn-add mt-5">
                            <i class="fas fa-plus"></i>
                            Adicionar mais itens
                        </a>
                    
                        <div class="card p-3 fixed-bottom mt-5">
                            <a href="/selectaddress" class="my-btn-primary">Realizar pedido</a>
                        </div>
                    </div>
                @else
                    <h1>Sacola de compras vazia</h1>
                    <a href="/menu/categories" class="btn btn-dark btn-sm mt-5">Adicionar itens</a>
                @endif
            </div>
        </div>
    </div>          
@endsection