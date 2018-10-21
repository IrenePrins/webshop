@extends('layouts.app')


@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h3>Products</h3>
    @if(count($products) > 0)
        @foreach($products as $product)
        <div class="card col-md-3">
                <img class="card-img-top" src="/storage/product_images/{{$product->image}}" alt="Image of the product">
                <div class="card-body">
                  <h5 class="card-title">{{$product->title}}</h5>
                <p class="card-text">{{$product->description}}</p>
                  <a href="/products/{{$product->id}}" class="btn btn-primary">Details</a>
                </div>
              </div>
        @endforeach
        {{$products->links()}}
    @else
        <p>No products found</p>
    @endif
@endsection