@extends('layouts.app')


@section('content')

    <div>
        <a href="/products"><button class="btn btn-primary">Ga terug</button></a>
        
    </div>
    <h3>Add Your Product</h3>
    {{-- <form method="POST" action="/products/store">
        <div class="form-group">
            <input type="text" placeholder="name">        
        </div>
        <div class="form-group">
            <textarea type="text" rows="10" cols="100" placeholder="description"></textarea>       
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
       
    </form> --}}

    {!! Form::open(['url' => '/products']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name')!!}
            {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!} 
            <span>{{ $errors->first('name')}}</span>
        </div>

        <div class="form-group">
        {!! Form::label('description', 'Description')!!}
        {!! Form::textarea('hoi', '', ['class' => 'form-control', 'placeholder' => 'Description']) !!} 
        <span>{{ $errors->first('description')}}</span>
        </div>

        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
    
@endsection