@extends('layouts.homeUser')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Editar endereço', 'subtitle'=>''])
                @endcomponent

                <div class="my-card">
                    <div class="card-body">
                        <form action="/addresses/{{ $address->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="houseNumber">Numero da casa*</label>
                                <input
                                    type="text"
                                    class="my-form-control"
                                    name="houseNumber"
                                    id="houseNumber"
                                    placeholder="Digite o numero da casa"
                                    value="{{ $address->house_number }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="apartmentNumber">Numero do apartamento</label>
                                <input
                                    type="text"
                                    class="my-form-control"
                                    name="apartmentNumber"
                                    id="apartmentNumber"
                                    placeholder="Digite o numero do apartamento"
                                    value="{{ $address->apartment_number }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="street">Rua*</label>
                                <input
                                    type="text"
                                    class="my-form-control"
                                    name="street"
                                    id="street"
                                    placeholder="Digite o nome da Rua"
                                    value="{{ $address->street }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="neighborhood">Bairro*</label>
                                <input
                                    type="text"
                                    class="my-form-control"
                                    name="neighborhood"
                                    id="neighborhood"
                                    placeholder="Digite o nome do Bairro"
                                    value="{{ $address->neighborhood }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="city">Cidade*</label>
                                <input
                                    type="text"
                                    class="my-form-control"
                                    name="city"
                                    id="city"
                                    placeholder="Digite o nome da Cidade"
                                    value="{{ $address->city }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="referencePoint">Ponto de referencia</label>
                                <input
                                    type="text"
                                    class="my-form-control"
                                    name="referencePoint"
                                    id="referencePoint"
                                    placeholder="Digite um ponto de referencia"
                                    value="{{ $address->reference_point }}"
                                >
                            </div>

                            <button type="submit" class="my-btn-primary2">Salvar</button>
                            <a href="/addresses" class="my-btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>          
@endsection