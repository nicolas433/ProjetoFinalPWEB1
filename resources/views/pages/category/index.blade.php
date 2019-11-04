@extends('layouts.homeAdmin')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Categorias
                        <a href="/categories/new" class="btn btn-dark btn-sm">Novo +</a>
                    </div>
    
                    <div class="card-body">
                    @if(count($categories) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Ultima atualização</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td class="d-flex justify-content-left">
                                            <a
                                                href="/categories/edit/{{$category->id}}"
                                                class="btn btn-primary btn-sm mr-2"
                                            >
                                                Editar
                                            </a>
                                            <form onsubmit="return confirm('Deseja realmente deletar essa categoria?')" action="/categories/delete/{{$category->id}}" method="POST">
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
                        <p>Não há categorias cadastradas</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection