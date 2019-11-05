@extends('layouts.homeUser')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Endereços cadastrados
                        <a href="/addresses/new" class="btn btn-dark btn-sm">Novo +</a>
                    </div>

                    @if(count($addresses) > 0)
                    <div class="card-body">
                        @foreach($addresses as $address)
                            <div class="card my-3 p-3">
                                <h2 class="font-weight-bold">
                                    {{ $address->street }},
                                    Nº {{ $address->house_number }}.
                                </h2>
                                <legend>
                                    {{ $address->neighborhood }}, 
                                    {{ $address->city }}.
                                </legend>
                                <div class="">
                                    @if ($address->apartment_number != null)
                                        <h5 class="card-title">Nº do apartamento: {{ $address->apartment_number }}</h5>
                                    @endif
                                    <p class="card-text">{{ $address->reference_point }}</p>

                                    <!-- Botoões -->
                                    <div class="d-flex justify-content-left">
                                        <a
                                            href="/addresses/edit/{{$address->id}}"
                                            class="btn btn-primary btn-sm mr-2"
                                        >
                                            Editar
                                        </a>
                                        <form onsubmit="return confirm('Deseja realmente deletar esse endereço?')" action="/addresses/delete/{{$address->id}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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