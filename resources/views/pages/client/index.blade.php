@extends('layouts.homeAdmin')
 
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" id="clients">
                <div class="card">


                    <div class="card-header d-flex justify-content-between">
                        <a href="/clients/todos" class="btn btn-dark btn-sm">Todos os clientes</a>
                        <a href="/clients/ativos" class="btn btn-dark btn-sm">Clientes ativos</a>
                        <a href="/clients/inativos" class="btn btn-dark btn-sm">Clientes inativos</a>
                    </div>
                
                
                    <div class="card-header d-flex justify-content-between">

                    </div>   

     
                    <div class="card-body">
                    @if(count($clients) > 0)
                        <table class="table" id="lista">
                            <thead>
                                <tr>
                                    <th>Email<div><input id="filtroEmail"/></div></th>
                                    <th>Nome<div><input id="filtroName"/></th>
                                    <th>Ativo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td id="clientEmail" >
                                            {{ $client->email }}
                                        </td>
                                        <td id="clientName"  >
                                            {{ $client->name }}
                                        </td>
                                        <td>{{ $client->operating }}</td>
                                        <td class="d-flex justify-content-left">
                                        <a
                                            href="/clients/requests/{{ $client->id }}"
                                            class="btn btn-primary btn-sm mr-2"
                                        >
                                            Histórico
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

    <script>
        var filtroEmail = document.getElementById('filtroEmail');
        var tableEmail = document.getElementById('lista');

        filtroEmail.onkeyup = function() {
            var nomeFiltro = filtroEmail.value;
            for (var i = 1; i < tableEmail.rows.length; i++) {
                var conteudoCelula = tableEmail.rows[i].cells[0].innerText;
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                tableEmail.rows[i].style.display = corresponde ? '' : 'none';
            }
        };
        //
        var filtroName = document.getElementById('filtroName');
        var tableName = document.getElementById('lista');

        filtroName.onkeyup = function() {
            var nomeFiltro = filtroName.value;
            for (var i = 1; i < tableName.rows.length; i++) {
                var conteudoCelula = tableName.rows[i].cells[1].innerText;
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                tableName.rows[i].style.display = corresponde ? '' : 'none';
            }
        };


    </script>

@endsection         