@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Endereço', 'subtitle'=>'Selecione o endereço para a entrega'])
                @endcomponent

                @if(count($addresses) > 0)
                    <form action="/summary" method="POST" class="mb-5">
                        @csrf
                        <div class="my-card p-3 mb-3">
                        @foreach($addresses as $address)
                                <div class="form-check d-flex justify-content-between align-items-center">
                                    <input class="my-btn-radio" type="radio" name="addressSelected" id="addressSelected{{ $address->id }}" value="{{ $address->id }}" required >
                                    <label class="form-check-label ml-3" for="addressSelected{{ $address->id }}">
                                        <h2 class="font-weight-bold m-0">
                                            {{ $address->street }},
                                            Nº {{ $address->house_number }},
                                            @if ($address->apartment_number != null)
                                                <p class="card-title">Apto: {{ $address->apartment_number }}</p>
                                            @endif
                                        </h2>
                                        <legend class="m-0">
                                            {{ $address->neighborhood }}, 
                                            {{ $address->city }}.
                                        </legend>
                                    </label>
                                </div>
                                @if(count($addresses) > 1)
                                    <hr>
                                @endif
                                @endforeach
                                
                                <div class="col-xs-12 d-flex justify-content-center mt-2">
                                    <a href="/selectaddress/{{ 1 }}" class="my-btn-add col-md-12 mt-5">
                                        <i class="fas fa-plus"></i>
                                        Novo endereço
                                    </a>
                                </div>
                            </div>


                        <div class="card p-3 fixed-bottom mt-5">
                            <button type="submit" class="my-btn-primary">Ok</button>
                        </div>
                    </form>
                @else
                    <div>
                        <h3>Ops! Nenhum endereço cadastrado!</h3>
                        <h4>Cadastre um novo endereço para continuar</h4>
                        <a href="/selectaddress/{{ 1 }}" class="btn btn-dark btn-sm col-md-12">Cadastrar um endereço</a>
                    </div>
                @endif
            </div>
        </div>
    </div>          
@endsection