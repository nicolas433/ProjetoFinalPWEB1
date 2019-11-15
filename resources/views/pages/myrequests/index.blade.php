@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Lista de solicitações', 'subtitle'=>'Lista de solicitações'])
                @endcomponent

                @if(count($requests) > 0)
                    @foreach($requests as $request)
                        <div
                            @if($request->status_id == 4)
                                class="my-card p-3 status-red mb-4"
                            @elseif($request->status_id < 4)
                                class="my-card p-3 status-blue mb-4"
                            @else
                                class="my-card p-3 mb-4"
                            @endif
                        >
                             <div class="mb-3 d-flex flex-column justify-content-between align-items-center">
                                <div class="">
                                    <span class="desc">Protocolo: {{ $request->id }}</span>
                                    <div class="status">
                                        <p class="titles">Status: {{ $request->status }}</p>
                                        <p class="desc pt-3">Data da realização do pedido: {{ $request->created_at }}</p>
                                    </div>
                                </div>
                                <div class="request-actions py-3">
                                    <a href="/requests/request/{{ $request->id }}" class="my-btn-add">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
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
    }, 10000);
</script>
@endsection

@endsection