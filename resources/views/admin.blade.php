@extends('layouts.homeAdmin')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 d-flex flex-column align-items-center">
            @component('components.titles', ['title'=>'Lista de pedidos', 'subtitle'=>'Aqui são exibido todos os pedidos que estão sendo realizados no momento'])
            @endcomponent

            <div class="col-md-12" id="container">
                
            </div>
        </div>
    </div>
</div>

@section('javascript2')
<script>
    var currentData = null;

    function loadRequests() {
        setInterval(() => {
            $.post("./api/solicitations",
            {
                ok: true
            },
            function(data, status){
                if(data != currentData){
                    // Se não for a primeira iteração limpa o conteudo de #container
                    if (currentData != null) {
                        $('#container').empty();
                    }

                    currentData = data
                    var newData = JSON.parse(currentData);

                    newData.forEach((elem, index)=>{
                        if(elem.id != null){
                            $('#container').append(`<div class='card p-3 mb-3' id='card${elem.id}'></div>`);
                            $(`#card${elem.id}`).append(`<h3>Novo pedido</h3>`);
                            $(`#card${elem.id}`).append(`<p>ID: ${elem.id}</p>`);
                            $(`#card${elem.id}`).append(`<p>Cliente: ${elem.user}</p>`);
                            $(`#card${elem.id}`).append(`<p>Data de realização do pedido: ${elem.created_at}</p>`);
                            $(`#card${elem.id}`).append(`<p>Status do pedido: ${elem.status}</p>`);
                            $(`#card${elem.id}`).append(`<a href='/admin/requests/request/${elem.id}' class='btn btn-dark btn-sm'>Ver</a>`);
                        }
                    });
                }
            });
        }, 1000);
    }

    loadRequests();
</script>
@endsection

@endsection