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
                        <form action="/products/{{$product->id}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="productName">Nome do produto</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="productName"
                                    id="productName"
                                    placeholder="Digite o nome da categoria"
                                    value="{{ $product->name }}"
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
                                    value="{{ $product->price }}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="productDescription">Descrição</label>
                                <textarea
                                    class="form-control" 
                                    rows="5" 
                                    id="productDescription"
                                    name="productDescription"
                                >{{ $product->description }}</textarea>
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
                                <label for="productPrice">Categoria</label>
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