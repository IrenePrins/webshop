@extends('layouts.app')


@section('content')
    <button class="btn btn-default"><a href="/products"> < all products</a></button>
    <h3>{{$product->title}}</h3>
    
    <div class="row">
        <div class="col-md-8 offset-md-2 col-md-8 offset-sm-4">
            <img style='width : 100%'src="/storage/product_images/{{$product->image}}"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h3>Description</h3>
            <p>{{$product->description}}<p>
        </div>
    </div>

    <div class="row">
            <div class="col-md-8 col-sm-8">
                <h3>Price</h3>
                <p>€{{$product->price}}<p>
            </div>
        </div>

    <hr>
    <small>Toegevoegd op : {{$product->created_at}}</small>
    @if(!Auth::guest())
        @if(Auth::user()->id == $product->user_id)
            <a href="{{$product->id}}/edit" class="btn btn-primary btn-small">Edit Product</a>



            {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif

@endsection 