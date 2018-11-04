@extends('layouts.app')


@section('content')

    <div>
        <a href="/products"><button class="btn btn-primary">Ga terug</button></a>
        
    </div> <br>
    
    <div class="col-s-8">
        <h3>Add Your Product</h3>
        {!! Form::open(['url' => '/products', 'enctype' => 'multipart/form-data']) !!}

            {{-- title input--}}
            <div class="form-group">
                {!! Form::label('title', 'Title')!!}
                {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) !!} 
                <span>{{ $errors->first('title')}}</span>
            </div>

            {{-- description input--}}
            <div class="form-group">
            {!! Form::label('description', 'Description')!!}
            {!! Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description']) !!} 
            <span>{{ $errors->first('description')}}</span>
            </div>

            {{-- price input--}}
            {!! Form::label('price', 'Price')!!}
            {!! Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Price', 'step' => 'any', 'min' => '1']) !!}
            <span>{{ $errors->first('price')}}</span>

            {{-- category dropdown input--}}
            <div class="form-group">
                {!! Form::label('category', 'Category')!!}
                {!! Form::select('category', ['Heels' => 'Heels', 'Boots' => 'Boots', 'Sandals' => 'Sandals', 'Sneakers' => 'Sneakers'], null, ['placeholder' => 'Pick a category...', 'class' => 'form-control'])!!}
                {{ $errors->first('category')}}
            </div>

            {{-- image input --}}
            <div class="form-group">
                {!! Form::label('Img', 'Image of the product')!!}
                {!!Form::file('image', ['class' => 'form-control'])!!}
                {{ $errors->first('image')}}
                <br><br>
            </div>

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
           
        {!! Form::close() !!}
    </div>
    
@endsection