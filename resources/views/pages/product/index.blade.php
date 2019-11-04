@extends('layouts.homeAdmin')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Produtos
                        <a href="/products/new" class="btn btn-dark btn-sm">Novo +</a>
                    </div>
    
                    <div class="card-body">
                    @if(count($products) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Ativo</th>
                                    <th>Categoria</th>
                                    <th>Ultima atualização</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>R$ {{ $category->price }}</td>
                                        <td>{{ $category->active == 1 ? 'Sim' : 'Não' }}</td>
                                        <td>{{ $category->categoryName }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td class="d-flex justify-content-left">
                                            <a
                                                href
                                                class="btn btn-dark btn-sm mr-2"
                                            >
                                                Ver mais
                                            </a>
                                            <a
                                                href="/products/edit/{{$category->id}}"
                                                class="btn btn-primary btn-sm mr-2"
                                            >
                                                Editar
                                            </a>
                                            <form action="/products/delete/{{$category->id}}" onsubmit="return confirm('Deseja realmente deletar esse produto?')" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Não há produtos cadastrados</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection