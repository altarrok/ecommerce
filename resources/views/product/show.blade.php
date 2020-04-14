@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5 ">
        <div class="col-7">
            <img src="https://cdn.pixabay.com/photo/2018/01/05/00/20/test-image-3061864_960_720.png" class="img-fluid">
        </div>
        <div class="col-5">
            <div class="d-flex flex-column h-100 pb-5">
                <span class="align-self-start h1 mb-4">{{ $product->name }}</span>
                <span class="align-self-end h2 text-success mb-5">{{ $product->price }} $</span>
                <span class="align-self-start h5 mb-3">{{ $product->description }}</span>
                <a class="align-self-center mt-auto w-50 btn btn-light"> <span class="h4">Add to <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z"/></svg></span></a>
            </div>
        </div>
    </div>
    <h1>Related products:</h1>
    <div class="row mt-5">
        @foreach($relatedProducts->splice(0, 4) as $relatedProduct)
            <div class="col-3 d-flex justify-content-center p-1 mb-4">
                <div class="w-100 p-4 border border-dark d-flex flex-column">
                    <span class="mb-3"><a href="/product/{{ $relatedProduct->id }}"><img class="img-thumbnail" src="https://cdn.pixabay.com/photo/2018/01/05/00/20/test-image-3061864_960_720.png"></a></span>
                    <span class="align-self-end h4 text-success font-weight-bold">{{ $relatedProduct->price }} $</span>
                    <span class="h3"><a class="text-dark" href="/product/{{ $relatedProduct->id }}">{{ \Illuminate\Support\Str::limit($relatedProduct->name, 16, $end="..") }}</a></span>
                    <span>{{ \Illuminate\Support\Str::limit($relatedProduct->description, 60, "...") }}</span>
                    <span></span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
