@extends('layouts.homeUser')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (count($products) > 0)
                @component('components.titles', ['title'=>'Cardápio', 'subtitle'=>'descrição'])
                @endcomponent

                <form id="filter">
                    <input
                        id="inputFilter"
                        type="text" 
                        placeholder="Buscar produtos por nome" 
                        name="name"
                        onkeyup="productsFilter()"
                    >
                </form>

                @foreach($products as $product)
                    <div class="card p-3 my-3 prod">
                        <div class="c-header d-flex justify-content-between mb-1">
                            <h5 class="productName">{{ $product->name }}</h5>
                            <h4>R$ {{ $product->price }}</h4>
                        </div>
                        <div class="c-body">
                            <a href="/menu/item/{{ $product->id }}" class="btn btn-dark btn-sm">Adicionar a sacola</a>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="card">
                <h3>Ops! Não há cardápio cadastrado :( </h3>    
            </div>
            @endif
        </div>
    </div>
</div>

    @section('javascriptUser')
        <script src="{{ asset('js/productsFilter.js') }}"></script>
    @endsection
@endsection