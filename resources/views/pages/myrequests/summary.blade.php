@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Resumo do pedido', 'subtitle'=>''])
                @endcomponent

                @if(isset($products))
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
                                </div>
                            </div>
                        @endfor
                        <br>
                            <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                                <div class="title-product">
                                    <b>Total</b>
                                </div>
                                <div class="price-actions">
                                    <span>R$ {{ $total }}</span>
                                </div>
                            </div>
                        <hr>
                        @if (isset($address))
                            <div>
                                <p class="font-weight-bold m-0">
                                    {{ $address->street }},
                                    Nº {{ $address->house_number }},
                                    @if ($address->apartment_number != null)
                                        <p class="card-title">Apto: {{ $address->apartment_number }}</p>
                                    @endif
                                </p>
                                <p class="m-0">
                                    {{ $address->neighborhood }}, 
                                    {{ $address->city }}.
                                </p>
                            </div>
                        @endif

                        <a href="/shoppingbag" class="btn btn-outline-dark btn-sm mt-5">Cancelar</a>

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