@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Detalhes do pedido', 'subtitle'=>''])
                @endcomponent

                <div class="card p-3">
                    <h4>Informações do pedido</h4>

                    <div class="info-request">
                        <p>Protocolo: {{ $solicitation->id }}</p>
                        <div class="status">
                            <p>Cor do código</p>
                            <p>Status: {{ $status->status }}</p>
                            <p>Descrição: {{ $status->description }}</p>
                            <p>Data da realização do pedido: {{ $solicitation->created_at }}</p>
                        </div>
                    </div>
                    <hr>

                    <h4>Produtos e valor final</h4>
                    <hr>

                    <h4>Endereço de entrega</h4>
                </div>
            </div>
        </div>
    </div>          
@endsection