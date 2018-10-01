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
                <h3><a href="/products/{{$product->id}}">{{$product->title}}</a></h3>
                <small>Toegevoegd op : {{$product->created_at}}</small>
        </div>
        @endforeach
        {{$products->links()}}
    @else
        <p>No products found</p>
    @endif
@endsection