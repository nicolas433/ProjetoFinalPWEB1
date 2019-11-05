@extends('layouts.homeUser')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Editar endereço
                    </div>
    
                    <div class="card-body">
                        <form action="/addresses/{{ $address->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="houseNumber">Numero da casa*</label>
                                <input
                                    type="text"
                                    class="form-control"
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
                                    class="form-control"
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
                                    class="form-control"
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
                                    class="form-control"
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
                                    class="form-control"
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
                                    class="form-control"
                                    name="referencePoint"
                                    id="referencePoint"
                                    placeholder="Digite um ponto de referencia"
                                    value="{{ $address->reference_point }}"
                                >
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <a href="/addresses" class="btn btn-danger btn-sm">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>          
@endsection