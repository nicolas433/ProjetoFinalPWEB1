@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1>Seu pedido foi realizado com sucesso!!</h1>
                <a href="/requests" class="btn btn-dark btn-sm">Acompanhar pedido</a>
                <a href="/menu/categories" class="btn btn-dark btn-sm">Fazer novo pedido</a>
            </div>
        </div>
    </div>
@endsection