@extends('layouts.homeUser')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (count($products) > 0)
                <div class="container">
                    <div class="row d-flex justify-content-end">
                        <a href="" class="btn btn-sm btn-dark">Sacola</a>
                    </div>
                </div>

                @foreach($products as $product)
                    <div class="card p-3 my-3">
                        <div class="c-header d-flex justify-content-between mb-1">
                            <h5>{{ $product->name }}</h5>
                            <h4>R$ {{ $product->price }}</h4>
                        </div>
                        <div class="c-body">
                            <a href="" class="btn btn-dark btn-sm">Adicionar a sacola</a>
                        </div>
                    </div>
                @endforeach

                <div class="card p-3 fixed-bottom mt-5">
                    <a class="btn btn-dark text-white btn-sm">Ver cardápio completo</a>
                </div>
            @else
            <div class="card">
                <h3>Ops! Não há cardápio cadastrado :( </h3>    
            </div>
            @endif
        </div>
    </div>
</div>
@endsection