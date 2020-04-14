@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h1 mb-4">Welcome to Altayo Laravel System, here are some products:</div>
    @for($i = 0; $i < 4; $i++)
        <div class="row">
        @foreach($products->splice(0, 4) as $product)
                <div class="col-3 d-flex justify-content-center p-1 mb-4">
                    <div class="w-100 p-4 border border-dark d-flex flex-column">
                        <span class="mb-3"><a href="/product/{{ $product->id }}"><img class="img-thumbnail" src="https://cdn.pixabay.com/photo/2018/01/05/00/20/test-image-3061864_960_720.png"></a></span>
                        <span class="align-self-end h4 text-success font-weight-bold">{{ $product->price }} $</span>
                        <span class="h3"><a class="text-dark" href="/product/{{ $product->id }}">{{ \Illuminate\Support\Str::limit($product->name, 16, $end="..") }}</a></span>
                        <span>{{ \Illuminate\Support\Str::limit($product->description, 60, "...") }}</span>
                        <span></span>
                    </div>
                </div>
        @endforeach
        </div>
    @endfor
    <div class="row d-flex justify-content-center mt-2">
        {{$products->links()}}
    </div>
</div>
@endsection
