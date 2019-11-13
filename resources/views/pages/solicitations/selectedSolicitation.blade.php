@extends('layouts.homeAdmin')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Detalhes do pedido', 'subtitle'=>''])
                @endcomponent

                <div class="card p-3">
                    <h4>Informações do pedido</h4>

                    <div class="info-request">
                        <p>Protocolo: {{ $solicitation->id }}</p>
                        <div class="status">
                            <p>Cor do código</p>
                            <p>Status: {{ $status->title }}</p>
                            <p>Descrição: {{ $status->description }}</p>
                            <p>Data da realização do pedido: {{ $solicitation->created_at }}</p>
                        </div>
                    </div>
                    <hr>

                    <h4>Produtos e valor final</h4>
                    <div class="info-products">
                        @php
                            $total = 0;
                        @endphp
                        @for($i = 0; $i < count($products); $i++)
                            <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                                <div class="title-product">
                                    <b>{{ $products[$i]->name }}</b>
                                    <p>{{ $products[$i]->description }}</p>
                                    <p>Valor unitário: R${{ $products[$i]->price }}</p>
                                    <p>Quantidade: {{ $products[$i]->amount }}</p>
                                </div>
                                <div class="price-actions">
                                    <span>R$ {{ $products[$i]->totalValue }}</span>
                                    @php
                                        $total += $products[$i]->totalValue;
                                    @endphp
                                </div>
                            </div>
                        @endfor
                        <br>
                        <div class="bag-item mb-3 d-flex flex-row justify-content-between align-items-center">
                            <div class="title-product">
                                <b>Total</b>
                            </div>
                            <div class="price-actions">
                                <span>R$ {{ $total }}</span>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4>Endereço de entrega</h4>
                    <div class="info-address">
                        <p>Numero: {{ $address->house_number }}</p>
                        <p>Complemento: {{ $address->apartment_number }}</p>
                        <p>Rua: {{ $address->street }}</p>
                        <p>Bairro: {{ $address->neighborhood }}</p>
                        <p>Cidade: {{ $address->city }}</p>
                        <p>Ponto de referência: {{ $address->reference_point }}</p>
                    </div>
                    <hr>

                    <form action="/admin/requests/request/{{ $solicitation->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="status">Alterar status do pedido</label>
                            <select class="form-control" id="status" name="newStatus">
                                @foreach($allStatus as $s)
                                    <option value="{{ $s->id }}">{{ $s->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="actions row p-3">
                            <button type="submit" class="btn btn-dark btn-sm">Alterar status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>          
@endsection