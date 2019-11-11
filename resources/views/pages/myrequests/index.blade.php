@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Lista de solicitações', 'subtitle'=>'Lista de solicitações'])
                @endcomponent

                @if(count($requests) > 0)
                    <div class="card p-3">
                        @foreach($requests as $request)
                             <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                                <div class="price-actions">
                                    <span>{{ $request->id }}</span>
                                </div>
                            </div>
                        @endforeach

                        <a href="/menu/categories" class="btn btn-dark btn-sm mt-5">Adicionar mais itens</a>
                    
                        <div class="card p-3 fixed-bottom mt-5">
                            <a href="/selectaddress" class="btn btn-dark text-white btn-sm p-3">Realizar pedido</a>
                        </div>
                    </div>
                @else
                    <h1>Sem solicitações</h1>
                @endif
            </div>
        </div>
    </div>          
@endsection