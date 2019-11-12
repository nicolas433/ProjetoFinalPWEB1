@extends('layouts.homeAdmin')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
 
                <div class="card-body" id="request-container">
                    <h3>Admin page!</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@section('javascript2')
<script>
    // function loadRequests() {
    //     // var li = document.createElement("p"); // cria a <li>
    //     // var t = document.createTextNode("teste");

    //     setInterval(() => {
    //         $.getJSON('/api/solicitations', function(data) {
    //             console.log(data[0]);
    //             $("#request-container")
    //                 .append("<h1>Teste</h1>");
    //         });
    //     }, 1000);
    // }

    // loadRequests();
</script>
@endsection

@endsection