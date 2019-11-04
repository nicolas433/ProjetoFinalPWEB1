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
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>R$ {{ $product->price }}</td>
                                        <td>{{ $product->active == 1 ? 'Sim' : 'Não' }}</td>
                                        <td>{{ $product->productName }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td class="d-flex justify-content-left">
                                            <!-- Botão para acionar o modal -->
                                            <a
                                                href
                                                class="btn btn-dark btn-sm mr-2"
                                                data-toggle="modal"
                                                data-target="#modalDesc{{ $product->id }}"
                                            >
                                                Ver mais
                                            </a>

                                            <!-- Modal para exibir a descrição do produto -->
                                            <div class="modal fade" id="modalDesc{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDescLabel{{ $product->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalDescLabel{{ $product->id }}">Título do modal</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $product->description }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Botão editar -->
                                            <a
                                                href="/products/edit/{{$product->id}}"
                                                class="btn btn-primary btn-sm mr-2"
                                            >
                                                Editar
                                            </a>

                                            <!-- Botão excluir -->
                                            <form action="/products/delete/{{$product->id}}" onsubmit="return confirm('Deseja realmente deletar esse produto?')" method="POST">
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

@section('javascript')
    <script type="text/javascript">
        
    </script>
@endsection