@extends('layouts.homeAdmin')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Editar categoria
                    </div>
    
                    <div class="card-body">
                        <form action="/categories/{{$category->id}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="categoryName">Nome da categoria</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="categoryName"
                                    id="categoryName"
                                    placeholder="Digite o nome da categoria"
                                    value="{{ $category->name }}"
                                >
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <a href="/categories" class="btn btn-danger btn-sm">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>           
@endsection