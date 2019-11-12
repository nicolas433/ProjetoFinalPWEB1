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
    function loadRequests() {
        var card = document.querySelector('#request-container');
        var li = document.createElement("li"); // cria a <li>
        var t = document.createTextNode("teste");

        setInterval(() => {
            $.getJSON('/api/solicitations', function(data) {
                console.log(data);
                li.appendChild(t);
                card.append(li);
            });
        }, 1000);
    }

    loadRequests();
</script>
@endsection

@endsection