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
        
        {!! Form::label('price', 'Price')!!}
            {!! Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Price']) !!}
            {{-- hier moet een max op komen nog --}}
            <span>{{ $errors->first('price')}}</span>
            
            {!! Form::label('Img', 'Image of the product')!!}
            {!!Form::file('image')!!}
            <br><br>

            {!! Form::hidden('_method', 'PUT')!!}

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            {{--werkt nog niet om img toe te voegen--}}

    {!! Form::close() !!}
    
@endsection