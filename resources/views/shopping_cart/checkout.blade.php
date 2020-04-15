@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <a href="/shopping_cart/paid" class="w-100 btn btn-primary mb-5"> Buy </a>
        </div>
    </div>
    @foreach($shoppingCart->products as $product)
        <div class="mb-3 d-flex flex-row">
            <div class="offset-1 col-2">
                <img src="https://cdn.pixabay.com/photo/2018/01/05/00/20/test-image-3061864_960_720.png" class="img-thumbnail">
            </div>
            <div class="col-8 d-flex flex-column">
                <div class="h3 row justify-content-between">
                    <span><a class="text-dark" href="/product/{{ $product->id }}">{{ \Illuminate\Support\Str::limit($product->name, 45, $end="..") }}</a></span>
                    <span class="align-self-end text-success">{{ $product->price }} $</span>
                </div>
                <div class="h3 row justify-content-between">
                    <div class="col-10 h4">{{\Illuminate\Support\Str::limit($product->description, 250, "...") }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
