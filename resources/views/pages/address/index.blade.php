@extends('layouts.homeUser')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Endereços cadastrados
                    </div>
    
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
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>          
@endsection