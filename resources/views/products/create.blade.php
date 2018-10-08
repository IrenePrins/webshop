@extends('layouts.app')


@section('content')

    <div>
        <a href="/products"><button class="btn btn-primary">Ga terug</button></a>
        
    </div> <br>
    {{--  DIT MOET WEG --}}
    <div class="col-s-8">
        <h3>Add Your Product</h3>
        {!! Form::open(['url' => '/products']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title')!!}
                {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) !!} 
                <span>{{ $errors->first('title')}}</span>
            </div>

            <div class="form-group">
            {!! Form::label('description', 'Description')!!}
            {!! Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description']) !!} 
            <span>{{ $errors->first('description')}}</span>
            </div>

            {!! Form::label('price', 'Price')!!}
            {!! Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Price', 'step' => 'any', 'min' => '1']) !!}
            {{-- hier moet een max op komen nog --}}
            <span>{{ $errors->first('price')}}</span>

            {{-- {!! Form::label('Img', 'Image of the product')!!}
            {!!Form::file('image')!!} --}}
            <br><br>
            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            {{--werkt nog niet om img toe te voegen--}}
        {!! Form::close() !!}
    </div>
    
@endsection