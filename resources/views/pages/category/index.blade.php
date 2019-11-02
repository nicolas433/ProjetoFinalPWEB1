@extends('layouts.homeAdmin')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Categorias</div>
    
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
                                        <td>
                                            <a class="btn btn-primary btn-sm">Editar</a>
                                            <a class="btn btn-danger btn-sm">Excluir</a>
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