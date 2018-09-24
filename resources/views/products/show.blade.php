@extends('layouts.app')


@section('content')
    <button class="btn btn-default"><a href="/products"> < all products</a></button>
    <h3>{{$product->title}}</h3>
    

    <div>
        {{$product->description}}
    </div>
    <hr>
    <small>Toegevoegd op : {{$product->created_at}}</small>
@endsection 