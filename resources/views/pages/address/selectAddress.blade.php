@extends('layouts.homeUser')
 
@section('content')
    <style>
        .form-check:after {
            content: "";
            clear: both;
        }

        .form-check {
            box-sizing: border-box;
            height: 70px;
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .form-check label {
            background: #fff no-repeat center center;
            cursor: pointer;
            display: block;
            font-size: 0;
            width: 93%;
            padding: 6px;

            left: 1px;
            position: absolute;
            right: 1px;
            top: 1px;
        }

        .form-check input:focus + label {
            outline: 4px solid red;
        }
    </style>

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
                                <div class="form-check d-flex justify-content-between align-items-center pb-3">
                                    <input class="my-btn-radio" type="radio" name="addressSelected" id="addressSelected{{ $address->id }}" value="{{ $address->id }}" required >
                                    <label class="form-check-label ml-3" for="addressSelected{{ $address->id }}">
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
                    <div class="d-flex flex-column align-items-center">
                        <h3 class="text-center text-danger p-5">Ops! Nenhum endereço cadastrado!</h3>
                        <a href="/selectaddress/{{ 1 }}" class="my-btn-add"><i class="fas fa-plus"></i> Cadastrar um endereço</a>
                    </div>
                @endif
            </div>
        </div>
    </div>          
@endsection