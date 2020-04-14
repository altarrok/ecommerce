@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h1 mb-1 font-weight-bold"> {{$sellerAccount->name}}</div>
    <div class="h3 mb-4">Welcome to our shop</div>
    <?php $count = $products->count() ?>
    @for($i = 0; $i < $count / 4 + 1; $i++)
        <div class="row">
            @foreach($products->splice(0, 4) as $product)
                <div class="col-3 d-flex justify-content-center p-1 mb-4">
                    <div class="w-100 p-4 border border-dark d-flex flex-column">
                        <span class="mb-3"><a href="/product/{{ $product->id }}"><img class="img-thumbnail" src="https://cdn.pixabay.com/photo/2018/01/05/00/20/test-image-3061864_960_720.png"></a></span>
                        <span class="align-self-end h4 text-success font-weight-bold">{{ $product->price }} $</span>
                        <span class="h3"><a class="text-dark" href="/product/{{ $product->id }}">{{ \Illuminate\Support\Str::limit($product->name, 16, $end="..") }}</a></span>
                        <span class="h5">{{ \Illuminate\Support\Str::limit($product->description, 60, "...") }}</span>
                        <span class="mt-auto">by <a class="text-dark" href="/seller/{{ $product->inventory->sellerAccount->id }}">{{ $product->inventory->sellerAccount->name }}</a></span>
                    </div>
                </div>
            @endforeach
        </div>
    @endfor
</div>
@endsection
