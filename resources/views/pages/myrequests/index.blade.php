@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Lista de solicitações', 'subtitle'=>'Lista de solicitações'])
                @endcomponent

                @if(count($requests) > 0)
                    @foreach($requests as $request)
                        <div class="card p-3 mb-3">
                             <div class="mb-3 d-flex flex-row justify-content-between align-items-center">
                                <div class="">
                                    <span>Protocolo: {{ $request->id }}</span>
                                    <div class="status">
                                        <span>Cor do código</span>
                                        <p>Status: {{ $request->status }}</p>
                                        <p>Data da realização do pedido: {{ $request->created_at }}</p>
                                    </div>
                                </div>
                                <div class="request-actions">
                                    <a href="/requests/request/{{ $request->id }}" class="btn btn-dark btn-sm">Ver</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1>Sem solicitações</h1>
                @endif
            </div>
        </div>
    </div>

@section('javascript3')
<script>
    setTimeout(() => {
        location.reload();
    }, 30000);
</script>
@endsection

@endsection