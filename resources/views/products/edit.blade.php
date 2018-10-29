@extends('layouts.app')

@section('content')

    <div>
        <a href="/products"><button class="btn btn-primary">Ga terug</button></a>
        
    </div>
    {{-- {{dd($errors)}} --}}
    <h3>Edit Your Product</h3>
    {!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Name')!!}
            {!! Form::text('title', $product->title, ['class' => 'form-control', 'placeholder' => 'title']) !!} 
            <span>{{ $errors->first('title')}}</span>
        </div>

        <div class="form-group">
        {!! Form::label('description', 'Description')!!}
        {!! Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description']) !!} 
        <span>{{ $errors->first('description')}}</span>
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price')!!}
            {!! Form::number('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
            {{-- hier moet een max op komen nog --}}
            <span>{{ $errors->first('price')}}</span>
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Category')!!}
            {!! Form::select('category',['Heels' => 'Heels', 'Boots' => 'Boots', 'Sandals' => 'Sandals', 'Sneakers' => 'Sneakers'], ['class' => 'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Image of the product')!!}
            {!! Form::file('image', ['class' => 'form-control'])!!}
            <span>{{ $errors->first('image')}}</span>
            <br><br>
        </div>

        {!! Form::hidden('_method', 'PUT')!!}

        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}
    
@endsection