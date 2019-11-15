@extends('layouts.homeUser')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Meus endereços', 'subtitle'=>'Lista de endereços...'])
                @endcomponent

                <div class="col-xs-12 d-flex flex-column justify-content-center align-items-center py-3">
                    <a href="/addresses/new" class="my-btn-circle">
                        <i class="fas fa-plus"></i>
                    </a>
                    <p class="text-danger bold">novo endereço</p>
                </div>

                <div class="my-card">
                    @if(count($addresses) > 0)
                    <div class="card-body">
                        @foreach($addresses as $address)
                            <div class="my-3 p-3 d-flex justify-content-between align-items-center">
                                <div class="texts">
                                    <h2 class="titles m-0">
                                        Rua: {{ $address->street }},
                                        Nº {{ $address->house_number }},
                                        @if ($address->apartment_number != null)
                                            <p class="desc pt-3">Apto: {{ $address->apartment_number }}</p>
                                        @endif
                                    </h2>
                                    <legend class="m-0 desc">
                                        Bairro: {{ $address->neighborhood }}, 
                                        Cidade: {{ $address->city }}.
                                    </legend>
                                </div>
                                <div class="btns">
                                    <!-- Botoões -->
                                    <div class="d-flex justify-content-left">
                                        <a
                                            href="/addresses/edit/{{$address->id}}"
                                            class="btn btn-primary btn-sm mr-2"
                                        >
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form onsubmit="return confirm('Deseja realmente deletar esse endereço?')" action="/addresses/delete/{{$address->id}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    @else
                        <p class="p-3">Não há endereços cadastrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>          
@endsection