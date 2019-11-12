@extends('layouts.homeUser')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.titles', ['title'=>'Detalhes do pedido', 'subtitle'=>''])
                @endcomponent

                
            </div>
        </div>
    </div>          
@endsection