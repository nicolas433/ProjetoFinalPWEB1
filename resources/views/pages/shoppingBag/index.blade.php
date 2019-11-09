@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card p-3">
                    <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                        <div class="title-product">
                            1 <b>Pastel</b>
                        </div>
                        <div class="price-actions">
                            <span>R$ 2,00</span>
                            <a href="" class="ml-1">remover</a>
                        </div>
                    </div>

                    <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                        <div class="title-product">
                            1 <b>Coxinha</b>
                        </div>
                        <div class="price-actions">
                            <span>R$ 2,00</span>
                            <a href="" class="ml-1">remover</a>
                        </div>
                    </div>

                    <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                        <div class="title-product">
                            1 <b>Esfirra</b>
                        </div>
                        <div class="price-actions">
                            <span>R$ 2,00</span>
                            <a href="" class="ml-1">remover</a>
                        </div>
                    </div>

                    <div class="bag-item mt-5 d-flex flex-row justify-content-between align-items-center">
                        <div class="title-product">
                            <b>TOTAL:</b>
                        </div>
                        <div class="price-actions">
                            <span>
                                <b>R$ 6,00</b>
                            </span>
                        </div>
                    </div>

                    <!-- Botão para adicionar mais itens -->
                    <a href="/menu/categories" class="btn btn-dark btn-sm mt-5">Adicionar mais itens</a>
                </div>

                <!-- Mensagem que aparece caso não existam itens na sacola -->
                <!-- <h4>Não há itens na sacola</h4> -->

                <!-- Só deve aparecer caso hajam itens na sacola -->
                <div class="card p-3 fixed-bottom mt-5">
                    <a class="btn btn-dark text-white btn-sm p-3">Realizar pedido</a>
                </div>
            </div>
        </div>
    </div>          
@endsection