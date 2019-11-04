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
                                <label for="addressName">Nome do produto</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="addressName"
                                    id="addressName"
                                    placeholder="Digite o nome do produto"
                                >
                            </div>
                            <div class="form-group">
                                <label for="addressName">Nome do produto</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="addressName"
                                    id="addressName"
                                    placeholder="Digite o nome do produto"
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