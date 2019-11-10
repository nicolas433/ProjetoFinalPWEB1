@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(isset($products))
                    <div class="card p-3 mb-5">
                        @for($i = 0; $i < count($products); $i++)
                            <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                                <div class="title-product">
                                    {{ $products[$i]->amount }} <b>{{ $products[$i]->name }}</b>
                                </div>
                                <div class="price-actions">
                                    <span>R$ {{ $products[$i]->totalValue }}</span>
                                </div>
                            </div>
                        @endfor
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

                        <a href="" class="btn btn-outline-dark btn-sm mt-5">Cancelar</a>

                        <div class="card p-3 fixed-bottom mt-5">
                            <button class="btn btn-dark d-flex justify-content-between">
                                <span>Pedir!</span>
                                <span>R$ XX,XX</span>
                            </button>
                        </div>
                    </div>
                @else
                    <h1>Vazia</h1>
                @endif
            </div>
        </div>
    </div>
@endsection