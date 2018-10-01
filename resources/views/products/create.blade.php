@extends('layouts.app')


@section('content')

    <div>
        <a href="/products"><button class="btn btn-primary">Ga terug</button></a>
        
    </div>
    <h3>Add Your Product</h3>
    {!! Form::open(['url' => '/products']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name')!!}
            {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!} 
            <span>{{ $errors->first('name')}}</span>
        </div>

        <div class="form-group">
        {!! Form::label('description', 'Description')!!}
        {!! Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description']) !!} 
        <span>{{ $errors->first('description')}}</span>
        </div>

        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
    
@endsection