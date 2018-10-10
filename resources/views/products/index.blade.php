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
        <div class="well">
            <div class="row">
                <div class="col-md-4 col-sm4">
                    <img style='width : 100%'src="/storage/product_images/{{$product->image}}"/>
                </div>
                <div class="col-md-8 col-sm8">
                    <h3><a href="/products/{{$product->id}}">{{$product->title}}</a></h3>
                    <small>Toegevoegd op : {{$product->created_at}}</small>
                </div>
            </div>
                
        </div>
        @endforeach
        {{$products->links()}}
    @else
        <p>No products found</p>
    @endif
@endsection