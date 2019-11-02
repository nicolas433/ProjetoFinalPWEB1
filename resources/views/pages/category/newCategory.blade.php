@extends('layouts.homeAdmin')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Nova categoria
                    </div>
    
                    <div class="card-body">
                        <form action="/categories" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="categoryName">Nome da categoria</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="categoryName"
                                    id="categoryName"
                                    placeholder="Digite o nome da categoria"
                                >
                            </div>
                            <button type="submit" class="btn btn-dark btn-sm">Salvar</button>
                            <a href="/categories" class="btn btn-light btn-sm">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>           
@endsection