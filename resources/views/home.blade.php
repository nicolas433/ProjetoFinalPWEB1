@extends('layouts.homeUser')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cardápio</div>
 
                <div class="card-body">
                    @if (count($products) > 0)
                        <form action="">
                            
                        </form>
                    @else
                        <p>Não há cardápio</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection