@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex mb-5">
        @foreach($product->categories as $category)
        <a class="text-dark" href="/category/{{$category->id}}">{{$category->name}}</a>&nbsp;&nbsp;&nbsp;&nbsp;
        @endforeach
    </div>
    <div class="row mb-5 ">
        <div class="col-7">
            <img src="https://cdn.pixabay.com/photo/2018/01/05/00/20/test-image-3061864_960_720.png" class="img-fluid border border-dark">
        </div>
        <div class="col-5">
            <div class="d-flex flex-column h-100 pb-5">
                <span class="align-self-start h1">{{ $product->name }}</span>
                <span class="mb-2">By: <a class="text-dark" href="/seller/{{ $product->inventory->sellerAccount->id }}">{{ $product->inventory->sellerAccount->name }}</a></span>
                <span class="align-self-end h2 text-success mb-5">{{ $product->price }} $</span>
                <span class="align-self-start h5 mb-3">{{ $product->description }}</span>
                <add-to-cart-button product_id="{{ $product->id }}" class="align-self-center mt-auto w-auto"></add-to-cart-button>
            </div>
        </div>
    </div>
    @if(!$relatedProducts->isEmpty())
    <div class="row mt-5"><h1>Related Products:</h1></div>
    @endif
    <div class="row">
        @foreach($relatedProducts->splice(0, 4) as $relatedProduct)
            <div class="col-3 d-flex justify-content-center p-1 mb-4">
                <div class="w-100 p-4 border border-dark d-flex flex-column">
                    <span class="mb-3"><a href="/product/{{ $relatedProduct->id }}"><img class="img-thumbnail" src="https://cdn.pixabay.com/photo/2018/01/05/00/20/test-image-3061864_960_720.png"></a></span>
                    <span class="align-self-end h4 text-success font-weight-bold">{{ $relatedProduct->price }} $</span>
                    <span class="h3"><a class="text-dark" href="/product/{{ $relatedProduct->id }}">{{ \Illuminate\Support\Str::limit($relatedProduct->name, 16, $end="..") }}</a></span>
                    <span>{{ \Illuminate\Support\Str::limit($relatedProduct->description, 60, "...") }}</span>
                    <span class="mt-auto">by <a class="text-dark" href="/seller/{{ $relatedProduct->inventory->sellerAccount->id }}">{{ $relatedProduct->inventory->sellerAccount->name }}</a></span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
