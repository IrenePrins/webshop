@extends('layouts.app')

@section('content')

    <div>
        <a href="/products"><button class="btn btn-primary">Ga terug</button></a>
        
    </div>
    <h3>Edit Your Product</h3>
    {!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name')!!}
            {!! Form::text('name', $product->title, ['class' => 'form-control', 'placeholder' => 'Name']) !!} 
            <span>{{ $errors->first('name')}}</span>
        </div>

        <div class="form-group">
        {!! Form::label('description', 'Description')!!}
        {!! Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description']) !!} 
        <span>{{ $errors->first('description')}}</span>
        </div>
        {!! Form::hidden('_method', 'PUT')!!}
        {!! Form::submit('Submit') !!}

    {!! Form::close() !!}
    
@endsection