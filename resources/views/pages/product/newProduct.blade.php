@extends('layouts.homeAdmin')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Novo produto
                    </div>
    
                    <div class="card-body">
                        <form action="/products" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="productName">Nome do produto</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="productName"
                                    id="productName"
                                    placeholder="Digite o nome do produto"
                                >
                            </div>

                            <div class="form-group">
                                <label for="productPrice">Preço</label>
                                <input
                                    type="number"
                                    step="0.01"
                                    class="form-control"
                                    name="productPrice"
                                    id="productPrice"
                                    placeholder="Digite o preço do produto"
                                >
                            </div>

                            <div class="form-group">
                                <label for="productDescription">Descrição</label>
                                <textarea
                                    class="form-control" 
                                    rows="5" 
                                    id="productDescription"
                                    name="productDescription"
                                ></textarea>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input
                                        type="checkbox" 
                                        class="form-check-input" 
                                        id="active" 
                                        name="active"
                                        checked
                                    >
                                    <label class="form-check-label" for="active">Ativo?</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="{{ $categories[0]->id }}">Selecione...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <a href="/products" class="btn btn-danger btn-sm">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>           
@endsection