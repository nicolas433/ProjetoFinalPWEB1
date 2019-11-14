@extends('layouts.homeUser')
 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>Cardápio</h2>
                
                @if(isset($categories))
                    <p class="description mb-5">Clique na opção desejada</p>
                    <div class="cards-category d-flex flex-wrap">
                        @foreach($categories as $category)
                            <a href="/menu/{{ $category->id }}/products" class="my-card card-category-item">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="my-card p-3 mt-3">
                        <h5>Ops! Não há cardápio cadastrado :( </h5>   
                    </div>
                @endif
                
            </div>
        </div>
    </div>          
@endsection