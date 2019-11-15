@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Detalhes do pedido', 'subtitle'=>''])
                @endcomponent

                <div class="my-card p-3">
                    <h4 class="titles bold mb-4">Informações do pedido</h4>

                    <div class="info-request">
                        <p class="desc">Protocolo: {{ $solicitation->id }}</p>
                        <div class="status">
                            <p class="titles">Status: {{ $status->title }}</p>
                            <p class="desc">Descrição: {{ $status->description }}</p>
                            <p class="desc">Data da realização do pedido: {{ $solicitation->created_at }}</p>
                        </div>
                    </div>
                    <hr>

                    <h4 class="titles bold mb-4">Produtos e valor final</h4>
                    <div class="info-products">
                        @php
                            $total = 0;
                        @endphp
                        @for($i = 0; $i < count($products); $i++)
                            <div class="bag-item mb-3">
                                <div class="title-product">
                                    <h3 class="titles">{{ $products[$i]->name }}</h3>
                                    <p class="desc">{{ $products[$i]->description }}</p>
                                </div>
                                <div class="price-actions d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="desc bold mb-0">Valor unitário: R${{ $products[$i]->price }}</p>
                                        <p class="desc bold">Quantidade: {{ $products[$i]->amount }}</p>
                                    </div>
                                    <div>
                                        <span class="prices">R$ {{ $products[$i]->totalValue }}</span>
                                        @php
                                            $total += $products[$i]->totalValue;
                                        @endphp
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endfor
                        <br>
                        <div class="bag-item mt-0 d-flex flex-row justify-content-between align-items-center">
                            <div class="title-product">
                                <h4 class="prices bold">Total</h4>
                            </div>
                            <div class="price-actions prices bold">
                                <span>R$ {{ $total }}</span>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4 class="titles bold mb-4">Endereço de entrega</h4>
                    <div class="info-address">
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

                    <div class="actions row mt-4 p-3">
                        <a href="/requests/request/cancel/{{ $solicitation->id }}" class="my-btn-secondary col-sm-12">Cancelar Pedido</a>
                    </div>
                </div>
            </div>
        </div>
    </div>          
@endsection