@extends('layouts.homeUser')

@section('content')
<div onload="setValue()" class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Seleciona a quantidade', 'subtitle'=>'descrição'])
                @endcomponent

                <div class="card p-3">
                    <div class="desc">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <h4 style="display: inline" >Total&nbsp</h4>
                        <h4 style="display: inline" id="total">{{ $product->price }} </h4>
                        <h4 style="display: inline" >R$</h4>
                        <br>
                        <br>
                        <h4 style="display: inline" >Unid.&nbsp</h4>
                        <h4 style="display: inline" >{{ $product->price }} </h4>
                        <h4 style="display: inline" >R$</h4>
                    </div>
                    <div class="actions d-flex mt-5 justify-content-between">
                        <p>Quantidade:</p>
                        <div class="qtd">
                            <button type="button" class="btn btn-outline-dark btn-sm" onClick="decrementar('valor')">-</button>
                            <span id="valor" class="mx-2">1</span>
                            <button type="button" class="btn btn-outline-dark btn-sm" onClick="incrementar('valor')">+</button>
                        </div>
                    </div>
                </div>

                <div class="card p-3 fixed-bottom mt-5">
                    <form action="/shoppingbag" method="POST">
                        @csrf
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input id="subamount" type="hidden" name="amount" value="1">
                        <input id="subvalue" type="hidden" name="totalValue" value="{{ $product->price }}">
                        <button type="submit" class="btn btn-dark text-white btn-sm p-3 d-flex justify-content-between">
                            <span>Adicionar &nbsp </span>
                            <span id="sub">{{ $product->price }} </span><span>R$</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>  
    <script type="text/javascript">

        const preço = parseInt(total.innerText);

        function setValue(){
            let subvalue = document.getElementById("subvalue");
            subvalue.value = preço;
        }

        function incrementar(valor) {          
            let contador = document.getElementById(valor);
            let total = document.getElementById("total");
            let sub = document.getElementById("sub");
          

            contador.innerHTML = parseInt(contador.innerText) + 1;
            total.innerHTML = parseInt(total.innerText) + preço;
            sub.innerHTML = parseInt(sub.innerText) + preço;

            let subvalue = document.getElementById("subvalue");
            let subamount = document.getElementById("subamount");  
            subvalue.value = parseInt(total.innerText);
            subamount.value = parseInt(contador.innerText);
        }

        function decrementar(valor) {
            let contador = document.getElementById(valor);
            let total = document.getElementById("total");

            if (parseInt(total.innerText) == preço) {
                total.innerText = preço;
                sub.innerHTML = preço;
            } else {
                total.innerHTML = parseInt(total.innerText) - preço;
                sub.innerHTML = parseInt(sub.innerText) - preço;
            }

            if (contador.innerText == '1') {
                contador.innerText = '1'
            } else {
                contador.innerHTML = parseInt(contador.innerText) - 1;
            }

            let subvalue = document.getElementById("subvalue");
            let subamount = document.getElementById("subamount");  
            subvalue.value = parseInt(total.innerText);
            subamount.value = parseInt(contador.innerText);
        }
    </script>
@endsection

