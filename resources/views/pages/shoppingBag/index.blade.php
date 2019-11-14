@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 mb-5 d-flex flex-column">
                @component('components.titles', ['title'=>'Sacola de compras', 'subtitle'=>'descrição'])
                @endcomponent

                @if(count($products) > 0)
                    <div class="my-card p-3 mb-5">
                    @php
                        $total = 0;
                    @endphp
                        @for($i = 0; $i < count($products); $i++)
                            <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                                <div class="title-product">
                                    <p class="titles m-0">{{ $products[$i]->name }}</p>
                                    <p class="desc m-0">Quantidade: {{ $products[$i]->amount }}</p>
                                </div>
                                <div class="price-actions d-flex justify-content-between align-items-center">
                                    <span class="prices">R$ {{ $products[$i]->totalValue }}</span>
                                    @php
                                        $total += $products[$i]->totalValue;
                                    @endphp
                                    <form action="/shoppingbag/{{ $products[$i]->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="ml-3 btn-trash"><i class="fas fa-trash"></i></a>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        @endfor
                        
                        <span>Valor final R$ {{ $total }}</span>

                        <div class="col-xs-12 d-flex justify-content-center mt-5">
                            <a href="/menu/categories" class="my-btn-add">
                                <i class="fas fa-plus"></i>
                                Adicionar mais itens
                            </a>
                        </div>
                    
                        <div class="card p-3 fixed-bottom mt-5">
                            <a href="/selectaddress" class="my-btn-primary">Realizar pedido</a>
                        </div>
                    </div>
                @else
                    <div class="my-card p-3 mb-5">
                        <h3 class="p-2">Sacola de compras vazia</h3>
                        <div class="col-xs-12 d-flex justify-content-center mt-5">
                            <a href="/menu/categories" class="my-btn-add">
                                <i class="fas fa-plus"></i>
                                Adicionar itens
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>          
@endsection