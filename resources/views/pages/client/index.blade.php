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
                                    <th>Nome</th>
                                    <th>Ativo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td id="clientEmail" >{{ $client->email }}</td>
                                        <td id="clientName"  >{{ $client->name }}</td>
                                        <td>{{ $client->operating }}</td>
                                        <td class="d-flex justify-content-left">

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
        var filtro = document.getElementById('filtroEmail');
        var tabela = document.getElementById('lista');

        filtro.onkeyup = function() {
            var nomeFiltro = filtro.value;
            for (var i = 1; i < tabela.rows.length; i++) {
                var conteudoCelula = tabela.rows[i].cells[0].innerText;
                console.log(tabela.rows[i].cells[0].innerText);
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                tabela.rows[i].style.display = corresponde ? '' : 'none';
            }
        };


    </script>

@endsection         