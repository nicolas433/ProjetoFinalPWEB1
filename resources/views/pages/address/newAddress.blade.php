@extends('layouts.homeAdmin')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Novo endereço
                    </div>
    
                    <div class="card-body">
                        <form action="/address" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="addressName">Numero da casa*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="addressName"
                                    id="addressName"
                                    placeholder="Digite o numero da casa"
                                >
                            </div>
                            <div class="form-group">
                                <label for="addressName">Numero do apartamento</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="addressName"
                                    id="addressName"
                                    placeholder="Digite o numero do apartamento"
                                >
                            </div>
                            <div class="form-group">
                                <label for="addressName">Rua*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="addressName"
                                    id="addressName"
                                    placeholder="Digite o nome da Rua"
                                >
                            </div>
                            <div class="form-group">
                                <label for="addressName">Bairro*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="addressName"
                                    id="addressName"
                                    placeholder="Digite o nome do Bairro"
                                >
                            </div>
                            <div class="form-group">
                                <label for="addressName">Cidade*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="addressName"
                                    id="addressName"
                                    placeholder="Digite o nome da Cidade"
                                >
                            </div>
                            <div class="form-group">
                                <label for="addressName">Ponto de referencia</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="addressName"
                                    id="addressName"
                                    placeholder="Digite um ponto de referencia"
                                >
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <a href="/addresss" class="btn btn-danger btn-sm">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>          
@endsection