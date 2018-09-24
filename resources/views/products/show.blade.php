@extends('layouts.app')


@section('content')
    <h3>Products</h3>
    @if(count($products)> 1)
        @foreach($products as $product)
        <div class="well">
                <h3><a href="/products/{{$product->id}}">{{$product->title}}</a></h3>
                <small>Toegevoegd op : {{$product->created_at}}</small>
        </div>
        @endforeach
    @else
        <p>No products found</p>
    @endif
@endsection 