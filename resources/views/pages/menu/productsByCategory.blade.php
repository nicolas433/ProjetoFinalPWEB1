@extends('layouts.homeUser')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="prods">
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
                    <div class="my-card p-3 my-3">
                        <div class="c-header mb-1">
                            <div class="">
                                <h5>{{ $product->name }}</h5>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="d-flex justify-content-between pt-3">
                                <h4>R$ {{ $product->price }}</h4>
                                <a href="/menu/item/{{ $product->id }}" class="my-btn-secondary">Adicionar a sacola</a>
                            </div>
                        </div>
                    </div>

                    <h3 id="not-found" style="display:none;" >Nenhum produto encontrado</h3>
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