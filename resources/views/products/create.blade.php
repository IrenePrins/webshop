@extends('layouts.app')


@section('content')
    <h3>Add Your Product</h3>
    
    {!! Form::open(['action' -> 'ProductsController@store', 'method' -> 'POST') !!}
    //Form::open(['action' => ['Controller@method', $user->id]])
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', ' ', ['class' -> 'form-control', 'placeholder' -> 'Title'])}}


    </div>
    {!! Form::close() !!}
@endsection