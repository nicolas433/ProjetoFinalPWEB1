@extends('layouts.homeUser')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-3">
                    <div class="desc">
                        <h4>Nome do produto</h4>
                        <p>Descrição do produto. asa sasa s ahs ahsahsasa hsahss aasas.</p>
                        <h4>R$ 2,00</h4>
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
                    <a class="btn btn-dark text-white btn-sm p-3 d-flex justify-content-between">
                        <span>Adicionar</span>
                        <span>R$ YY,YY</span>
                    </a>
                </div>
            </div>
        </div>
    </div>          
@endsection