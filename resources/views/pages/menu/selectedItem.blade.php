@extends('layouts.homeUser')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-3">
                    <div class="desc">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <h4>R$ {{ $product->price }}</h4>
                    </div>
                    <div class="actions d-flex mt-5 justify-content-between">
                        <p>Quantidade:</p>
                        <div class="qtd">
                            <button type="button" class="btn btn-outline-dark btn-sm">-</button>
                            <span class="mx-2">1</span>
                            <button type="button" class="btn btn-outline-dark btn-sm">+</button>
                        </div>
                    </div>
                </div>

                <div class="card p-3 fixed-bottom mt-5">
                    <form action="/shoppingbag" method="POST">
                        @csrf
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input type="hidden" name="amount" value="2">
                        <input type="hidden" name="totalValue" value="10">
                        <button type="submit" class="btn btn-dark text-white btn-sm p-3 d-flex justify-content-between">
                            <span>Adicionar</span>
                            <span>R$ YY,YY</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>          
@endsection