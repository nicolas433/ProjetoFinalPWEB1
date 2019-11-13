@extends('layouts.homeAdmin')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="container">
            
        </div>
    </div>
</div>

@section('javascript2')
<script>
    var currentData = null;

    function loadRequests(dados) {
        var div = document.querySelector('#container');
        var p = document.createElement('p');

        setInterval(() => {
            $.post("./api/solicitations",
            {
                id: 3
            },
            function(data, status){
                if(data != currentData){
                    currentData = data

                    var newData = JSON.parse(currentData);

                    newData.forEach((elem, index)=>{
                        console.log(elem);
                        $('#container').append(`<div class='card p-3 mb-3' id='card${elem.id}'></div>`);
                        $(`#card${elem.id}`).append(`<h3>Novo pedido</h3>`);
                        $(`#card${elem.id}`).append(`<p>ID: ${elem.id}</p>`);
                        $(`#card${elem.id}`).append(`<p>Cliente: ${elem.user}</p>`);
                        $(`#card${elem.id}`).append(`<p>Data de realização do pedido: ${elem.created_at}</p>`);
                        $(`#card${elem.id}`).append(`<p>Status do pedido: ${elem.status}</p>`);
                        $(`#card${elem.id}`).append(`<a href='/pedido/${elem.id}' class='btn btn-dark btn-sm'>Ver</a>`);
                    });
                } else {
                    console.log('iguais');
                }
            });
        }, 1000);
    }

    loadRequests(currentData);
</script>
@endsection

@endsection