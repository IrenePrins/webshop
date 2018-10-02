@extends('layouts.app')


@section('content')
    <button class="btn btn-default"><a href="/products"> < all products</a></button>
    <h3>{{$product->title}}</h3>
    
    <div>
        {{$product->description}}
    </div>
    <hr>
    <small>Toegevoegd op : {{$product->created_at}}</small>

    <a href="{{$product->id}}/edit" class="btn btn-default btn-small">Edit Product</a>
    {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
   {!!Form::close()!!}

@endsection 