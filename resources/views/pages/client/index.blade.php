@extends('layouts.homeAdmin')
 
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                <div class="card-header d-flex justify-content-between">
                        Clientes
                        <a href="/clients/todos" class="btn btn-dark btn-sm">Todos os clientes</a>
                        <a href="/clients/ativos" class="btn btn-dark btn-sm">Clientes ativos</a>
                        <a href="/clients/inativos" class="btn btn-dark btn-sm">Clientes inativos</a>
                    </div>
    
                    <div class="card-body">
                    @if(count($clients) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Nome</th>
                                    <th>Ativo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->operating }}</td>
                                        <td class="d-flex justify-content-left">
                                            <a
                                                href=""
                                                class="btn btn-primary btn-sm mr-2"
                                            >
                                                Editar
                                            </a>
                                            <form onsubmit="return confirm('Deseja realmente deletar esse cliente?')" action="/clients/delete/{{$client->id}}" method="POST">
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
                        <p>Não há clientes cadastrados</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection         