@extends('layouts.homeUser')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Novo endereço
                    </div>
    
                    <div class="card-body">
                        <form action="/addresses" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="houseNumber">Numero da casa*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="houseNumber"
                                    id="houseNumber"
                                    placeholder="Digite o numero da casa"
                                >
                            </div>
                            <div class="form-group">
                                <label for="apartmentNumber">Numero do apartamento</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="apartmentNumber"
                                    id="apartmentNumber"
                                    placeholder="Digite o numero do apartamento"
                                >
                            </div>
                            <div class="form-group">
                                <label for="street">Rua*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="street"
                                    id="street"
                                    placeholder="Digite o nome da Rua"
                                >
                            </div>
                            <div class="form-group">
                                <label for="neighborhood">Bairro*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="neighborhood"
                                    id="neighborhood"
                                    placeholder="Digite o nome do Bairro"
                                >
                            </div>
                            <div class="form-group">
                                <label for="city">Cidade*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="city"
                                    id="city"
                                    placeholder="Digite o nome da Cidade"
                                >
                            </div>
                            <div class="form-group">
                                <label for="referencePoint">Ponto de referencia</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="referencePoint"
                                    id="referencePoint"
                                    placeholder="Digite um ponto de referencia"
                                >
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <a href="/home" class="btn btn-danger btn-sm">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>          
@endsection