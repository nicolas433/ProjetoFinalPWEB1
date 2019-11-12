@extends('layouts.homeAdmin')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($solicitations) > 0)
                @foreach($solicitations as $solicitation)
                    <div class="card p-3">
                        <h3>Novo pedido!</h3>
                        <p>Protocolo: {{ $solicitation->id }}</p>
                        <p>Cliente: {{ $solicitation->user }}</p>
                        <a href="" class="btn btn-dark btn-sm">Ver</a>
                    </div>
                @endforeach
            @else
                <h4>Não há pedidos</h4>
            @endif
        </div>
    </div>
</div>

@section('javascript2')
<script>
    function loadRequests() {
        // var li = document.createElement("p"); // cria a <li>
        // var t = document.createTextNode("teste");

        setInterval(() => {
            $.getJSON('/api/solicitations', function(data) {
                console.log(data[0]);
                $("#request-container")
                    .append("<h1>Teste</h1>");
            });
        }, 1000);
    }

    loadRequests();
</script>
@endsection

@endsection