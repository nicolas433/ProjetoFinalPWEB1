@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                @component('components.titles', ['title'=>'Resumo do pedido', 'subtitle'=>''])
                @endcomponent

                @if(isset($products))
                    <div class="my-card p-3 mb-5">
                    @php
                        $total = 0;
                    @endphp
                        <h3 class="titles bold mb-4">Informações do pedido</h3>
                        @for($i = 0; $i < count($products); $i++)
                            <div class="bag-item d-flex flex-row justify-content-between align-items-center p-0">
                                <div class="title-product">
                                    <p class="titles m-0">{{ $products[$i]->name }}</p>
                                    <p class="desc m-0">Quantidade: {{ $products[$i]->amount }}</p>
                                </div>

                                <div class="price-actions d-flex justify-content-between align-items-start">
                                    <span class="titles">R$ {{ $products[$i]->totalValue }}</span>
                                    @php
                                        $total += $products[$i]->totalValue;
                                    @endphp
                                </div>
                            </div>
                            <hr>
                        @endfor
                            <div class="bag-item mb-3 pt-4 d-flex flex-row justify-content-between align-items-center">
                                <div class="title-product">
                                    <b class="titles bold">Total</b>
                                </div>
                                <div class="price-actions">
                                    <span class="prices bold">R$ {{ $total }}</span>
                                </div>
                            </div>
                        <hr>
                        @if (isset($address))
                            <h3 class="titles mb-3 bold">Informações do endereço de entrega</h3>
                            <div class="pt-2">
                                <h2 class="titles m-0">
                                    Rua: {{ $address->street }},
                                    Nº {{ $address->house_number }},
                                    @if ($address->apartment_number != null)
                                        <p class="desc">Apto: {{ $address->apartment_number }}</p>
                                    @endif
                                </h2>
                                <legend class="m-0 desc">
                                    Bairro: {{ $address->neighborhood }}, 
                                    Cidade: {{ $address->city }}.
                                </legend>
                            </div>
                        @endif

                        <div class="col-xs-12 d-flex justify-content-center mt-2">
                            <a href="/shoppingbag" class="my-btn-secondary mt-5" style="width: 100%;">Cancelar</a>
                        </div>

                        

                        <form action="/request" method="POST" class="card p-3 fixed-bottom mt-5">
                            @csrf
                            <input type="hidden" name="addressId" value="{{ $address->id }}">
                            <button class="my-btn-primary d-flex justify-content-between">
                                <span>Pedir!</span>
                                <span>R$ {{ $total }}</span>
                            </button>
                        </form>
                    </div>
                @else
                    <h1>Vazia</h1>
                @endif
            </div>
        </div>
    </div>
@endsection