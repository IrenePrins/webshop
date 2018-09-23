@extends('layouts.app')

@section('content')
    <h3>Products!!!!!!!!!!!!!</h3>
    @if(count($products)> 1)
        @foreach($products as $product)
        <div class="well">
                <h3>{{$product->title}}</h3>
        </div>
    @else
        <p>No products found.</p>
    @endif
@endsection